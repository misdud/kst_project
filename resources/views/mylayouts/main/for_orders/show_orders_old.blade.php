<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">


        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Ваш отдел:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $otdel ?? ''}}</span></h5></div>
        </div>  
        <br />
        
         <span class="d-block p-2  rounded-top bg-info text-white">Всего найдено {{ count($orders_user) ?? ''}}:</span>   
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название товара</th>
                    <th>Кол-во затребовано</th>
                    <th>Кол-во одобрено</th>
                    <th>Статус проверки</th>
                    <th>Дата создания</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($orders_user as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->discriptorder }}</td>
                    <td>{{ $order->count }}</td>
                    <td>{{ $order->count_good }}</td>
                    @if($order->valid == 'no')
                    <td class="table-warning">Не проверена</td>
                    @else
                    <td class="table-success">Проверена</td>
                    @endif
                    <td>{{ date('d.m.Y H:i',strtotime($order->created_at))}}</td>
                    
                </tr>
               
      
            @endforeach
 
            </tbody>
        </table> 
     
      <a href="{{ route('myorders.index') }}" class="btn btn-info" role="button">Вернуться назад</a>



    </div>
</div>