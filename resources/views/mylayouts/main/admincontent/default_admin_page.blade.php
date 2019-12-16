<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        <div class="jumbotron jumbotron-fluid border rounded shadow-sm">
            <div class="container ">
                <h2>Добро пожаловать {{ $user ?? ''}}</h2>
                <p>Выберите режим работы</p>  
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">

                            <img src="img/users.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('show_users')}}" class="btn btn-outline-secondary btn-block" role="button">Работа с пользователями</a></button>
                    </div>
            </div>
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">

                            <img src="img/calendar.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('zakaz_list')}}" class="btn btn-outline-secondary btn-block" role="button">Управление заказами</a></button>
                    </div>
            </div>
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">

                            <img src="img/list.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('products.index')}}" class="btn btn-outline-secondary btn-block" role="button">Справочник канцелярии</a></button>
                    </div>
            </div>
        </div>
       <div class="row pt-3">
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">
                            <img src="img/shop.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('orders.index')}}" class="btn btn-outline-secondary btn-block" role="button">Создание заказа</a></button>
                    </div>
            </div>
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">
                            <img src="img/handshake.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('valids.index')}}" class="btn btn-outline-secondary btn-block" role="button">Проверка компаний</a></button>
                    </div>
            </div>
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">
                            <img src="img/raport.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('show_index_raport')}}" class="btn btn-outline-secondary btn-block" role="button">Отчёты</a></button>
                    </div>
            </div>
            
        </div>

    </div>


</div>

