<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">



        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Ваш отдел:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $otd_user ?? ''}}</span></h5></div>
        </div>
        <br />
        <h4 class="text-primary">Все товары  отдела по закупке:  <span class="text-secondary"><b>&laquo;{{ $zakaz_name ?? ''}}&raquo; </b></span> </h4>   
        <br />
        <h5 class="text-info">Bсего {{ count($orders) ?? ''}}:</h5>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>ФИО</th>
                    <th>Название</th>
                    <th>Число</th>
                    <th>Число одоб.</th>
                    <th>Дата &#8593;</th>
                    <th>Статус</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->discriptorder }}</td>
                    <td>{{ $order->count }}</td>
                    <td>{{ $order->count_good }}</td>
                     <td>{{ date('d.m.Y H:i', strtotime($order->created_at)) }}</td>
                    @if($order->vakid == 'yes')
                    <td class="table-success">Проверен</td>
                   
                    @else
                    <td class="table-warning">Не проверен</td>
                    
                    @endif
                   
                </tr>

            @endforeach

            </tbody>
        </table> 

           <a href="{{ route('otdel_order_list') }}" class="btn btn-info" role="button">Вернуться назад</a>
                 
           {{ $orders->groupBy('product_id')}}

    </div>
</div>