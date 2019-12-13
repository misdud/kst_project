<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Заявочная компания:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $zakaz->zakazname ?? ''}}</span></h5></div>
        

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

        @if(count($orders_zakaz)>0)
        <span class="d-block p-1  rounded-top bg-info text-white ">Всего заказов в этой компании {{ count($orders_zakaz) ?? ''}} (согласованные):</span> 

        @else
        <h5 class="text-info">Товаров (согласованных) в этой заявочной компании не найдено.</h5>
        @endif

        <table class="table table-sm table-info shadow-sm">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Ед.изм.</th>
                    <th scope="col">Кол. заказов</th>
                    <th scope="col">Всего заказано</th>
                    <th scope="col">Всего одобрено</th>

                </tr>
            </thead>
            <tbody>
                
                @foreach($group_orders as $prod=>$col_prod)
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
                    
                   

                </tr>
                @endforeach
  

            </tbody>
        </table>
  
        <a href="{{ route('show_otdels_raport',['id_zakr'=>$zakaz->id]) }}" class="btn btn-primary" role="button">Вернуться назад</a>
        <a href="{{ route('svod_zakaz_pdf',['id_zak'=>$zakaz->id]) }}" class="btn btn-success" role="button">Скачать cводный PDF</a>
    </div>
</div>