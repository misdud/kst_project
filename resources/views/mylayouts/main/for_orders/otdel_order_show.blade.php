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
                    <th>Ед.изм.</th>
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
                    <td>{{ $order->product->units }}</td>
                    <td>{{ date('d.m.Y H:i', strtotime($order->created_at)) }}</td>
                    @if($order->valid == 'yes')
                    <td class="table-success">Проверен</td>

                    @else
                    <td class="table-warning">Не проверен</td>

                    @endif

                </tr>

                @endforeach

            </tbody>
        </table> 
        <br />
        <br />
        <br />
        <hr />
         Итоги:
        <table class="table table-sm table-info">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Кол. заказов</th>
                    <th scope="col">Всего заказано</th>
                    <th scope="col">Всего одобрено</th>
                    <th scope="col">Разница</th>
                    <th scope="col">План выдачи</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($result as $prod=>$col_prod)
                @php
                    $user_count = 0;
                    $valid_count = 0;
                @endphp
                <tr>
                   <td>{{ $loop->iteration }}</td>
                    <td>{{$prod }}</td>
                    <td>{{ $col_prod->count() }}</td>
                    @foreach($col_prod as $prod)
                    @php
                        $user_count +=$prod->count;
                        $valid_count +=$prod->count_good;
                    @endphp

                    @endforeach
                    <td>{{ $user_count }}</td>
                    <td>{{ $valid_count }}</td>
                    
                    @if($order->valid == 'yes')
                    <td>{{ ($user_count-$valid_count)*(-1) }}</td>

                    @else
                    <td class="table-warning">Не проверен</td>

                    @endif
                    


                    @if($user_count <= $valid_count)
                    <td class="table-success">{{ $valid_count }}</td>
                    @else
                    <td class="table-warning">{{ $valid_count }}</td>
                    @endif

                </tr>
                @endforeach
  

            </tbody>
        </table>
          <a href="{{ route('otdel_order_list') }}" class="btn btn-info" role="button">Вернуться назад</a>
          <a href="{{ route('get_pdf_zakaz_otdel',['id_zak'=>$zakaz_id]) }}" class="btn btn-success" role="button">Скачать PDF</a>
         

    </div>
</div>