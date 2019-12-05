<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        <div class=' text-right'><a href="{{ route('role_creat')}}" class="btn btn-outline-primary btn-block" role="button"> + Добавить роль</a></div>
        <br />

        @if(count($roles)>0)
        <h2>Список всех имеющихся ролей</h2>

        <p>Для корректной работы системы обязательно должны быть роли: <b>admin, moder_kanc, menjr_kanc, user_all</b></p>            
        <p>В таблице представлены пользователи системы:</p>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>№</th>
                    <th>Название роли</th>
                    <th>Описание роли</th>
                    <th>Пользователи</th>
                </tr>
            </thead>

            <tbody>
                @foreach($roles as $role)    
                <tr>
                    <td>{{ $role->id }}</td>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $role->rolename }}</td>
                    <td>{{ $role->inforole}}</td>

                    <td><a href="{{ route('show_users_role',['id'=>$role->id])}}" class="btn btn-outline-secondary" role="button">Список пользователей</a></td>
                </tr>

                @endforeach

            </tbody>
        </table> 

        @else
        <p>Пока ролей нет в системе - выполните SEED ROLES для загрузки ролей по умолчанию для корректной работы системы. </p>
        <p>Либо создайте (4) роли с именами:</p>
        <ul class="list-group">
            <li class="list-group-item">1. admin</li>
            <li class="list-group-item">2. moder_kanc</li>
            <li class="list-group-item">3. menjr_kanc</li>
            <li class="list-group-item">4. user_all</li>
        </ul> 
        @endif

    </div>
</div>

