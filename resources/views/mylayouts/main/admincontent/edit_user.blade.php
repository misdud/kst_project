          
<div class="card">
    <div class="card-header">{{ __('Изменение пользователя') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('edit_bd_user', ['id'=>$edit_user['id']]) }}">
            @method('PUT')
            @csrf
            
            @if (session('message'))
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
                    <input id="login" type="text" class="form-control" name="login" value="{{ $edit_user['login'] ?? 'нет данных' }}" laceholder="{{ $edit_user['activ'] ?? 'нет данных' }}" readonly>


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
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control" name="password" value="" autocomplete="password">

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