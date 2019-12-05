<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        <div class=' text-right'><a href="{{ route('registr_user')}}" class="btn btn-outline-primary btn-block" role="button"> + Добавить пользователя</a></div>
        <br/>
        <h2>Список всех пользователей</h2>
        
        <p>В таблице представлены пользователи системы:</p>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Отдел</th>
                    <th>Login</th>
                    <th>Статус</th>
                    <th>Изменить</th>
                </tr>
            </thead>
            <tbody>
          @forelse ($users as $user)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $user->name }}</td>
            <td>{{ $user->otdel->otdelname }}</td>
            <td>{{ $user->login}}</td>
             @if($user->activ)
                <td class="table-success">Активен</td>
             @else
                <td class="table-warning">Заблокирован</td>
             @endif
            <td><a href="{{ route('edit_user',['id'=>$user->id])}}" class="btn btn-outline-secondary" role="button">Изменить</a></td>
          </tr>
            @empty
            <p>Пользователи не найдены</p>
          @endforelse

            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $users->links() }}</div>
        

        
    </div>
</div>