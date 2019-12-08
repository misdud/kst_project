          
<div class="card">
    <div class="card-header">{{ __('Изменение статуса заказов') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('zakaz_edit_db', ['id'=>$zakaz['id']]) }}">
            @method('PUT')
            @csrf

            <div class="form-group row">
                <label for="zakazname" class="col-md-4 col-form-label text-md-right">{{ __('Название заявки') }}</label>

                <div class="col-md-6">
                    <input id="zakazname" type="text" class="form-control @error('zakazname') is-invalid @enderror" name="zakazname" value="{{$zakaz['zakazname'] ?? 'нет данных'}}" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="zakazactiv" class="col-md-4 col-form-label text-md-right">{{ __('Статус') }}</label>
               @if($zakaz['zakazactiv'] == 1)
               <div class="col-md-6">
                    <input id="login" type="text" class="form-control" name="zakazactiv" value="Открыта" placeholder="Открыта" readonly>
                </div>
                @else
                <div class="col-md-6">
                    <input id="login" type="text" class="form-control" name="zakazactiv" value="Закрыта" placeholder="Закрыта" readonly>
                </div>
               @endif

             </div>

            <div class="form-group row">

                <label for="do_date" class="col-md-4 col-form-label text-md-right">{{ __('Действует до даты') }}</label>

              
                <div class="col-md-6">
                    <input id="activ" type="text" class="form-control" name="activ" value="{{ $zakaz['dodate'] ?? 'нет данных' }}" required autocomplete="activ" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="activ" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"  name="openclosezakaz" value="0" >Закрыть
                        </label>

                    </div>

                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="openclosezakaz" value="1">Открыть (если нет открытых)
                        </label>
                    </div>

                </div>
            </div>


            <div class="form-group row">
                <label for="created_at" class="col-md-4 col-form-label text-md-right">{{ __('Дата создания') }}</label>
                <div class="col-md-6">
                    <input id="created_at" type="text" class="form-control" name="created_at" value="" placeholder="{{ $zakaz['created_at'] ?? 'нет данных' }}" readonly>
                </div>
            </div>

            
            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    @if($zakaz['zakazactiv']!=0)
                    <button type="submit" class="btn btn-danger">
                        {{ __('Изменить') }}
                    </button>
                    <a href="{{ route('zakaz_list') }}" class="btn btn-info" role="button">Вернуться к списку</a>
                     @else
                    <button type="submit" class="btn btn-danger">
                        {{ __('Изменить') }}
                    </button>
                     <a href="{{ route('zakaz_list') }}" class="btn btn-info" role="button">Вернуться к списку</a>
                     @endif
                </div>
            </div>
        </form>
    </div>
</div>
