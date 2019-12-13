<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Заявочная компания:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $zakaz->zakazname ?? ''}}</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Отдел:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">
             @foreach($otdel_orders as $ot)
                    {{ $ot->otdel->otdelfullname}}
                    @php
                        $id_otdel=$ot->otdel->id;
                    @endphp
                @break
             @endforeach
             </span></h5></div>
         <br />
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">cтатус:</span></h5></div>
         @if($zakaz->zakazactiv==1)
           <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-danger text-white"><h5> <span class="align-middle">активна</span></h5></div>
           <p class="pl-md-2">Статус <b>"Активна"</b>  означает - что пользватели еще не закончили формирование заказов и могут добовлять товары </p>
         @else
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-success text-white"><h5> <span class="align-middle">закрыта</span></h5></div>
         <p class="pl-md-2">Статус <b>"Закрыта"</b>  означает - что пользватели  закончили формирование заказов и вам можно формировать отчёты</p>
         @endif      
        </div>  

        @if(count($otdel_orders)>0)
        <span class="d-block p-1  rounded-top bg-info text-white ">Всего найдено {{ count($otdel_orders) ?? ''}}:</span> 
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>Товар</th>
                    <th>Ед.изм.</th>
                    <th>Кол.</th>
                    <th>Соглосовано</th>
                    <th>Статус</th>
          
                </tr>
            </thead>
            <tbody>
                @foreach ($otdel_orders as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->user->name }}</td>
                    <td>{{ $order->discriptorder }}</td>
                    <td class="px-3">{{ $order->product->units }}</td>
                    <td class="px-4">{{ $order->count }}</td>
                    
                     @if($order->valid == 'no')
                     <td class="table-warning">Не согл-но</td>
                     @else
                       @if($order->count <= $order->count_good)
                            <td class="px-5">{{ $order->count_good}}</td>
                        @else     
                            <td class="px-5 text-danger ">{{ $order->count_good}}</td>
                       @endif
                     @endif

                      
                    @if($order->valid == 'no')
                    
                    <td class="table-warning">Не проверен</td>

                    @else
                    <td class="table-success">Проверен</td>
     
                  
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table> 
        @else
        <h5 class="text-info">Товаров в этой заявочной компании не найдено.</h5>
        @endif
        <hr/>
        <br/>
        <br/>
        
        Итоги:
        <table class="table table-sm table-info shadow-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Ед.изм.</th>
                    <th scope="col">Кол. заказов</th>
                    <th scope="col">Всего заказано</th>
                    <th scope="col">Всего одобрено</th>
                    <th scope="col">Разница</th>
                    <th scope="col">План выдачи</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach($res as $prod=>$col_prod)
                @php
                    $user_count = 0;
                    $valid_count = 0;
                    $unit='';
                @endphp
                <tr>
                   <td>{{ $loop->iteration }}</td>
                    <td>{{$prod }}</td>
                    
                    @foreach($col_prod as $prod)
                    @php
                        $user_count +=$prod->count;
                        $valid_count +=$prod->count_good;
                        $unit = $prod->product->units;
                    @endphp

                    @endforeach
                     <td>{{ $unit }}</td>
                    <td>{{ $col_prod->count() }}</td>
                    <td>{{ $user_count }}</td>
                    <td>{{ $valid_count }}</td>
                    
                    @if($valid_count != 0)
                      @if((($user_count-$valid_count)*(-1)) !=0)
                      <td>{{ ($user_count-$valid_count)*(-1) }} </td>

                      @else
                      <td></td>
                      @endif
                    @else
                    <td class="table-warning">Нет данных</td>

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
  
        <a href="{{ route('show_otdels_raport',['id_zakr'=>$zakaz->id]) }}" class="btn btn-primary" role="button">Вернуться назад</a>
        <a href="{{ route('otdel_pdf_zakaz',['id_zak'=>$zakaz->id,'id_otdel'=>$id_otdel]) }}" class="btn btn-success" role="button">Скачать PDF</a>
    </div>
</div>