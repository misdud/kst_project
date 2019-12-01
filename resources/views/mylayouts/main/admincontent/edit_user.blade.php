          
<div class="card">
    <div class="card-header">{{ __('Изменение пользователя') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('edit_user',['id'=>5]) }}">
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
                    <input id="login" type="text" class="form-control @error('login') is-invalid @enderror" name="login" value="{{ $edit_user['login'] ?? 'нет данных' }}" laceholder="{{ $edit_user['activ'] ?? 'нет данных' }}" readonly>

                    @error('login')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="activ" class="col-md-4 col-form-label text-md-right">{{ __('Статус') }}</label>

                <div class="col-md-6">
                    <input id="activ" type="text" class="form-control @error('activ') is-invalid @enderror" name="activ" value="{{ $edit_user['activ'] ?? 'нет данных' }}" required autocomplete="activ">

                    @error('activ')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


   



            <div class="form-group row">
                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Пароль') }}</label>

                <div class="col-md-6">
                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

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
                    <input id="login" type="text" class="form-control @error('created_at') is-invalid @enderror" name="created_at" value="" placeholder="{{ $edit_user['created_at'] ?? 'нет данных' }}" readonly>

                </div>
            </div>
            <div class="form-group row">
                <label for="updated_at " class="col-md-4 col-form-label text-md-right">{{ __('Дата обновления') }}</label>

                <div class="col-md-6">
                    <input id="login" type="text" class="form-control @error('updated_at') is-invalid @enderror" name="login" value="" placeholder="{{ $edit_user['updated_at'] ?? 'нет данных' }}" readonly>

                </div>
            </div>
            
            
            
            



            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Изменить') }}
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>