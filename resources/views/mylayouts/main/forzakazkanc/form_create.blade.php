          
<div class="card">
                <div class="card-header">{{ __('Открытие заявки ') }}</div>

                <div class="card-body justify-content-center">
                    <form method="POST" action="{{ route('zakaz_creat_regist') }}">
                        @csrf
                        @method('POST')

                        <div class="form-group row">
                            <label for="zakazname" class="col-md-4 col-form-label text-md-right">{{ __('Имя заявки (можно не указывать)') }}</label>

                            <div class="col-md-6">
                                <input id="zakazname" type="text" value="Плановая закупка" class="form-control @error('zakazname') is-invalid @enderror" name="zakazname" value="{{ old('zakazname') }}">

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="dodatezaivka" class="col-md-4 col-form-label text-md-right">{{ __('Дата закрытия заявки') }}</label>

                            <div class="col-md-6">
                                <input id="login" type="date" class="form-control @error('dodatezaivka') is-invalid @enderror" name="dodatezaivka" value="{{ old('dodatezaivka') }}" required autocomplete="dodatezaivka">

                                @error('dodatezaivka')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Открыть заказ') }}
                                </button>
                                <a href="{{ route('zakaz_list') }}" class="btn btn-info" role="button">Вернуться назад</a>
                            </div>
                        </div>
 
                    </form>
                </div>
            </div>