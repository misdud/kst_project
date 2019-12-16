<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        <br/>
        <h2>Список всех пользователей</h2>
        
        <p>В таблице представлены пользователи  роли: <b>{{$roles->rolename}}</b></p>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>id</th>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Login</th>
                    <th>Отдел</th>
                </tr>
            </thead>
            <tbody>
          @forelse ($users_role as $user)
          <tr>
            <td>{{ $user->id }}</td>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->login}}</td>
            <td>{{ $user->otdel->otdelfullname ?? ''}}</td>
          </tr>
            @empty
            <p>Пользователи не найдены</p>
          @endforelse

            </tbody>
        </table>
        <div class = "center">
         <p ><a href="{{ route('roles_main') }}" class="btn btn-info" role="button">Вернуться назад</a></p>
        </div>
        <div class="pagination justify-content-center">{{ $users_role->links() }}</div>

    </div>
</div>