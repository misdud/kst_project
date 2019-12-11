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
         <p class="pl-md-2">Статус <b>"Закрыта"</b>  означает - что пользватели  закончили формирование заказов и вам можно согласовывать</p>
         @endif      
        </div>  
        
        
        
        <br />
        @if(session('msg_del'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong> <span class="text-danger">{{ session('msg_del') }}</span> </strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      @if(session('msg_valid_order'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Согласован товар: <span class="text-danger"> {{ session('msg_valid_order') }} </span></strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(count($otdel_orders)>0)
        <h5 class="text-info">Всего найдено {{ count($otdel_orders) ?? ''}}:</h5>            

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>ФИО</th>
                    <th>Товар</th>
                    <th>Ед.изм.</th>
                    <th>Кол-во</th>
                    <th>Действие</th>
                    <th>Изменить</th>
                    <th>Статус</th>
          
                    <th></th>
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
                    <td>
                        <div >
                        <form action="{{ route('valids.update',['valid'=>$order['id']]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <input style="width: 35px;" type="number" name='valid_count' max="{{ $order->count +1 }}" min="0" minlength="5" value="{{  $order->count}}" />
                            <input type="submit" value="&#10004;" />
       
                        </form>
                        </div>
                    </td>
                    @else
                    <td>Согл-но: {{ $order->count_good}}</td>
                    @endif
                   @if($order->valid == 'yes')
                    <td>
                        <div >
                        <form action="{{ route('valids.update',['valid'=>$order['id']]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <input style="width: 35px;" type="number" name='valid_count' max="{{ $order->count_good +1 }}" min="0" minlength="5" value="{{  $order->count_good}}" />
                            <input type="submit" value="&#10004;" />
       
                        </form>
                        </div>
                    </td>
                     @else
                    <td>Не согл-но</td>
                    @endif
                      
                    @if($order->valid == 'no')
                    
                    <td class="table-warning">Не проверен</td>
                    <td>
                        <form action="{{ route('valids.destroy',['valid'=>$order->id]) }}" method="POST">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="btn  btn-danger">
                                {{ __('Удалить') }}
                            </button>
                        </form>
                    </td>

                    @else
                    <td class="table-success">Проверен</td>
                    <td ></td>
                  
                    @endif
                </tr>
                @endforeach
            </tbody>
        </table> 
        @else
        <h5 class="text-info">Ваших товаров в этой заявочной компании не найдено.</h5>
        <br />
        @endif
        <a href="{{ route('valids.show',['valid'=>$zakaz->id]) }}" class="btn btn-primary" role="button">Вернуться назад</a>
        <a href="{{ route('myorders.index') }}" class="btn btn-info" role="button">Вернуться назад</a>
    </div>
</div>