<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">


        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Ваш отдел:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $otdel ?? ''}}</span></h5></div>
        </div>  
        <br />
        @if(session('msg'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Товар <span class="text-danger">{{ session('msg') }}</span> был удалён!</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
      @if(session('msg2'))
        <div class="alert alert-info alert-dismissible fade show" role="alert">
            <strong>Количество товара<span class="text-danger"> {{ session('msg2') }} </span>изменено.</strong>
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif
        @if(count($orders_zakaz)>0)
        <h5 class="text-info">Всего найдено {{ count($orders_zakaz) ?? ''}}:</h5>            

        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Заказано</th>
                    <th>Редактировать</th>
                    <th>Одобрено</th>
                    <th>Статус</th>
          
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders_zakaz as $order)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $order->discriptorder }}</td>
                    <td>{{ $order->count }}</td>
                    
                     @if($order->valid == 'no')
                    <td>
                        <div >
                        <form action="{{ route('myorders.update',['myorder'=>$order['id']]) }}" method="POST">
                            @method('PUT')
                            @csrf

                            <input style="width: 50px;" type="number" name='mycount' max="10" min="1" minlength="5" value="{{  $order->count}}" />
                            <input type="submit" value="Изменить" />
       
                        </form>
                        </div>
                    </td>
                    @else
                    <td>Уже проверен</td>
                    @endif

                    <td>{{ $order->count_good}}</td>
                    
                    @if($order->valid == 'no')
                    
                    <td class="table-warning">Не проверен</td>
                    <td>
                        <form action="{{ route('myorders.destroy',['myorder'=>$order['id']]) }}" method="POST">
                            @method('DELETE')
                            @csrf

                            <input  type="hidden" name='product_id' value="{{  $order->product_id}}" />
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
        <a href="{{ route('orders.index') }}" class="btn btn-primary" role="button">Добавить товар</a>
        <a href="{{ route('myorders.index') }}" class="btn btn-info" role="button">Вернуться назад</a>
    </div>
</div>