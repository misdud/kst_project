<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        @if(count($group_otdel_orders)>0)
         <div class="row mx-md-n2">
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Заявочная компания:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5> <span class="align-middle">{{ $zakaz->zakazname }}</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">cтатус:</span></h5></div>
         @if($zakaz->zakazactiv==1)
           <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-danger text-white"><h5> <span class="align-middle">активна</span></h5></div>
         @else
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-success text-white"><h5> <span class="align-middle">закрыта</span></h5></div>
         @endif

         </div>
        <div class="row mx-md-n2">
            <p class="text-primary px-2">Период действия компании: <span class="text-dark">{{ date('d.m.Y',strtotime($zakaz->created_at)) }}
               -  {{ date('d.m.Y',strtotime($zakaz->dodate))   }}</span></p>   
        </div>
         @if($zakaz->zakazactiv==1)
                <p class="pl-md-0">Статус <b>"Активна"</b>  означает - что пользватели еще не закончили формирование заказов и могут добовлять товары </p>
            @else
                <p class="pl-md-0">Статус <b>"Закрыта"</b>  означает - что пользватели  закончили формирование заказов и вам можно формировать отчёты</p>
         @endif 
         
       
        <br />
        <span class="d-block p-1  rounded-top bg-info text-white">В таблице представлены отделы которые участвовали в этой компании:</span>
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Кол-во заказ. поз.</th>
                    <th>Результат</th>
                    <th>Отдел</th>
                    <th>Действие</th>
                    <th>Отчёт</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($group_otdel_orders as $otdel)
                <tr>
                    <td>{{ $loop->iteration }}</td>

                    <td class="px-4" style="background-color: #FFFADC" >{{ $otdel->count() }}</td>
                       @foreach($otdel as $otd)
                                
                            @php
                                $n=0;
                            @endphp
                          @break
                        @endforeach
                        
                        @foreach($otdel as $ot)
                            @if($ot->valid=='no')
                                @php
                                    $n++;
                                @endphp
                            @endif
                        @endforeach
                        
                        @if($otdel->count('product_id') == ($otdel->count('valid')-$n))
                        <td  style="background-color: #93EEBA" > Проверено: {{ ($otdel->count('valid'))- $n }}</td>
                        @else
                         <td  style="background-color: #FFFADC" >Не проверено: {{ $n  }}</td>
                        @endif
                        <td>{{ $otd->otdel->otdelfullname }}</td>
                         <td><a href="{{ route('show_otd_rap',['id_zak'=>$zakaz->id,  'id_otdel'=>$otd->otdel->id]) }}" class="btn btn-outline-secondary" role="button">Посмотреть</a></td>
                         <td><a href="{{ route('otdel_pdf_zakaz',['id_zak'=>$zakaz->id,'id_otdel'=>$otd->otdel->id]) }}" class="btn btn-outline-success" role="button">Скачать PDF</a></td>
                </tr>
                @endforeach
            </tbody>
        </table> 
        @else
        <p>Нет участников</p>
        @endif
        <br />
        <a href="{{ route('show_index_raport') }}" class="btn btn-info" role="button">Вернуться к списку</a>
        <a href="{{ route('show_svod_zakaz',['id_zak'=>$zakaz->id]) }}" class="btn btn-outline-secondary" role="button">Смотреть сводный</a>
        <a href="{{ route('svod_zakaz_pdf',['id_zak'=>$zakaz->id]) }}" class="btn btn-outline-success" role="button">Скачать своднй PDF</a>

    </div>
</div>