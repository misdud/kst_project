<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        <div class="jumbotron jumbotron-fluid">
            <div class="container">
                <h2>Добро пожаловать Админыч</h2>
                <p>Выбери режим работы</p>  
            </div>
        </div>

        <div class="row">
            <div class="col-4">
                <div class="jumbotron">
                    <div class=' text-right'><a href="{{ route('show_users')}}" class="btn btn-outline-primary btn-block" role="button"> $ Работа с пользователями</a></div>

                </div>
            </div>
            <div class="col-4">
                <div class="jumbotron">
                    <div class=' text-right'><a href="{{ route('roles_main')}}" class="btn btn-outline-primary btn-block " role="button"> $ Работа с ролями</a></div>
                </div>
            </div>
            <div class="col-4">
                <div class="jumbotron">
                    <div class=' text-right'><a href="{{ route('zakaz_list')}}" class="btn btn-outline-primary btn-block" role="button"> $ Заявки на канцелярию</a></div>
                </div>
            </div>
        </div>

    </div>


</div>

