          
<div class="card">
    <div class="card-header">{{ __('Изменение пользователя') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('edit_bd_user', ['id'=>$edit_user['id']]) }}">
            @method('PUT')
            @csrf
            @if(session('message') == 'Пароль и поля изменены')
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            @if(session('message') == 'Вы ничего не изменили')
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
            @endif
            @if(session('message') == 'Пользователь заблокирован')
            <div class="alert alert-danger">
                {{ session('message') }}
            </div>
            @elseif( session('message') == 'Пользователь активирован')
            <div class="alert alert-success">
                {{ session('message') }}
            </div>
            @endif
            <div class="form-group row">
                <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Полное имя') }}</label>

                <div class="col-md-6">
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$edit_user['name'] ?? 'нет данных'}}" required autocomplete="name" autofocus>

                    @error('name')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="login" class="col-md-4 col-form-label text-md-right">{{ __('Логин') }}</label>

                <div class="col-md-6">
                    <input id="login" type="text" class="form-control" name="login" value="{{ $edit_user['login'] ?? 'нет данных' }}"  readonly>


                </div>
            </div>

            <div class="form-group row">

                <label for="activ" class="col-md-4 col-form-label text-md-right">{{ __('Статус') }}</label>
                @if($edit_user['activ'])
                <div class="col-md-6">
                    <input id="activ" type="text" class="form-control" name="activ" value="Активирован" required autocomplete="activ" readonly>
                </div>
                @else
                <div class="col-md-6">
                    <input id="activ" type="text" class="form-control" name="activ" value="Заблокирован" required autocomplete="activ" readonly>
                </div>
                @endif
            </div>

            <div class="form-group row">
                <label for="activ" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">
                    @if($edit_user['activ']==1)
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"  name="activuser" value="0" >Заблокировать
                        </label>

                    </div>
                    @else
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="activuser" value="1">Активировть
                        </label>
                    </div>
                    @endif
                </div>
            </div>







            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Изменить пароль') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password"  autocomplete="new-password">

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Дата создания') }}</label>

                <div class="col-md-6">
                    <input id="created_at" type="text" class="form-control" name="created_at" value="" placeholder="{{ $edit_user['created_at'] ?? 'нет данных' }}" readonly>

                </div>
            </div>
            <div class="form-group row">
                <label for="updated_at" class="col-md-4 col-form-label text-md-right">{{ __('Дата обновления') }}</label>

                <div class="col-md-6">
                    <input id="updated_at" type="text" class="form-control" name="login" value="" placeholder="{{ $edit_user['updated_at'] ?? 'нет данных' }}" readonly>

                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Изменить') }}
                    </button>
                    <a href="{{ route('show_users') }}" class="btn btn-info" role="button">Вернуться к списку</a>
                </div>
            </div>
        </form>
    </div>
</div>

<br />
<br />

<div class="card">
    <div class="card-header">{{ __('Роли пользователя') }}</div>

    <div class="card-body justify-content-center">
        {{  $edit_user['id'] }}
        <form method="POST" action="{{ route('role_add', ['id'=>$edit_user['id']]) }}">
            @method('POST')
            @csrf

            @isset($message_role)
            <div class="alert alert-success">
                {{ $message_role }}
            </div>
            @endisset

            <div class="form-group row">
                <label for="role" class="col-md-4 col-form-label text-md-right">{{ __('Роли пользователя ') }}</label>

                <div class="col-md-6">
                    <input class="form-control" name='role' type="text" placeholder="{{ $rol_user}}" readonly>
                </div>

            </div>

            <div class="form-group row">

                <label for="activ" class="col-md-4 col-form-label text-md-right">{{ __('Роли') }}</label>

                <div class="col-md-6">

                    <select name='role_id' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        @if($roles->count()>0)
                        <option value='' selected>Выберите из списка доступные роли</option>
                        @foreach($roles as $role)
                        <option value="{{ $role->id }}">{{ $role->rolename }}</option>

                        @endforeach
                        @else
                        Роли не найдены (требуется создать)
                        @endif
                    </select>
                </div>

            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Добавить') }}
                    </button>
                    <a href="{{ route('show_users') }}" class="btn btn-info" role="button">Вернуться к списку</a>

                </div>
            </div>
        </form>
        <br />
        <div class="form-group row mb-0">
            <div class="col-md-6 offset-md-4">
                <form action="{{ route('role_delete',['id'=>$edit_user['id']]) }}" method="POST">
                    @method('DELETE')
                    @csrf

                    <input  type="hidden" name='user_dell_id' value="{{  $edit_user['id']}}" />
                    <button type="submit" class="btn  btn-danger">
                        {{ __('Удалить все роли  у пользователя') }}
                    </button>
                </form>
            </div>
        </div>

    </div>
</div>
<br />
<br />

<div class="card">
    <div class="card-header">{{ __('Указание отдела для  пользователя') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('otdel_edit') }}">
            @method('PUT')
            @csrf

            <div class="form-group row">
                <label for="otdel" class="col-md-4 col-form-label text-md-right">{{ __('Текущий отдел работы пользователя') }}</label>

                <div class="col-md-6">
                    <input class="form-control"  name ='otdel' type="text" placeholder="{{ $edit_user->otdel->otdelfullname }}" readonly>
                </div>

            </div>

            <div class="form-group row">

                <label for="otdel_id" class="col-md-4 col-form-label text-md-right">{{ __('Выберите для смены текущего') }}</label>

                <div class="col-md-6">

                    <select name='otdel_id' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        @if($otdels->count()>0)
                        @foreach($otdels as $otdel)
                        <option value="{{ $otdel->id }}">{{ $otdel->otdelfullname }}</option>

                        @endforeach
                        @else
                        Отделы не найдены (требуется создать)
                        @endif
                    </select>
                     <input  type="hidden" name='user_id' value="{{  $edit_user['id']}}" />
                </div>

            </div>

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-secondary">
                        {{ __('Изменить') }}
                    </button>
                    <a href="{{ route('show_users') }}" class="btn btn-info" role="button">Вернуться к списку</a>

                </div>
            </div>
        </form>
 
  

    </div>
</div>