          
<div class="card">
                <div class="card-header">{{ __('Создание роли') }}</div>

                <div class="card-body justify-content-center">
                    <form method="POST" action="{{ route('role_creat') }}">
                        @csrf
                          @if (session('message'))
                          <div class="alert alert-success">
                              {{ session('message') }}
                          </div>
                          @endif
                        <div class="form-group row">
                            <label for="rolename" class="col-md-4 col-form-label text-md-right">{{ __('Имя роли на латынице') }}</label>

                            <div class="col-md-6">
                                <input id="rolename" type="text" class="form-control @error('rolename') is-invalid @enderror" name="rolename" value="{{ old('rolename') }}" required autocomplete="rolename" autofocus>

                                @error('rolename')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="inforole" class="col-md-4 col-form-label text-md-right">{{ __('Краткая инфа о роли') }}</label>

                            <div class="col-md-6">
                                <input id="inforole" type="text" class="form-control @error('inforole') is-invalid @enderror" name="inforole" value="{{ old('login') }}" required autocomplete="inforole">

                                @error('inforole')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Создать') }}
                                </button>
                                <a href="{{ route('roles_main') }}" class="btn btn-info" role="button">Вернуться назад</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>