<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        <div class="jumbotron jumbotron-fluid border rounded shadow-sm">
            <div class="container ">
                <h2>Добро пожаловать {{ $user ?? ''}}</h2>
                <p>Выбери режим работы</p>  
            </div>
        </div>


       <br />
       <div class="row">
            <div class="col-4">
                     <div class="border-left border-right  rounded-bottom rounded-top shadow-sm" style="background-color: #E8E8E8">
                        <span class="d-block p-2  rounded-top  text-white border-2"  style="background-color: #C5C5C5"></span>
                            <span class="d-block p-1  text-white border-2"  style="background-color: #FFF8B0"></span>
                            <img src="img/shop.png" class="mx-auto d-block pt-2"/>
                                <button type="button" class="btn btn-lg btn-block"><a href="{{ route('orders.index')}}" class="btn btn-outline-secondary btn-block" role="button">Создание заказа</a></button>
                        <span class="d-block p-1  rounded-bottom text-white"  style="background-color:#C5C5C5"></span>       
                    </div>
            </div>


        </div>

    </div>


</div>

