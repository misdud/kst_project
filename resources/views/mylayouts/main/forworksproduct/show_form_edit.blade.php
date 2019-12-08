          
<div class="card">
    <div class="card-header">{{ __('Изменение товара') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('products.update',['product'=>$product->id]) }}">
            @csrf
            @method('PUT')
            @if (session('message_edit_prod'))
            <div class="alert alert-success">
                <p class="text-center text-success ">Товар <b>{{ session('message_edit_prod') }}</b>  обнавлён в справочнике</p>
            </div>
            @endif
            <div class="form-group row">
                <label for="productname" class="col-md-4 col-form-label text-md-right">{{ __('Название товара') }}</label>

                <div class="col-md-6">
                    <input id="productname" type="text" class="form-control @error('productname') is-invalid @enderror" name="productname" value="{{ $product->productname }}" required autocomplete="productname" readonly="">
                </div>
            </div>

            <div class="form-group row">
                <label for="productdiscr" class="col-md-4 col-form-label text-md-right">{{ __('Описание товара') }}</label>
                <div class="col-md-6">
                    <textarea class="form-control @error('productdiscr') is-invalid @enderror" name="productdiscr" id="productdiscr" rows="3" >{{ $product->productdiscript }}</textarea>

                    @error('productdiscr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="productac" class="col-md-4 col-form-label text-md-right">{{ __('Статус') }}</label>
                @if($product->productactiv == 1)
                <div class="col-md-6">
                    <input id="login" type="text" class="form-control" name="prodactiv1" value="Активен" placeholder="Активен для заказа" readonly>
                </div>
                @else
                <div class="col-md-6">
                    <input id="login" type="text" class="form-control" name="prodactiv1" value="Закрыт" placeholder="Закрыт для заказа" readonly>
                </div>
                @endif
            </div>
            

            <div class="form-group row">
                <label for="prodactiv" class="col-md-4 col-form-label text-md-right"></label>
                <div class="col-md-6">
                    @if($product->productactiv == 1)
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input"  name="prodactiv" value="0" >Закрыть
                        </label>
                    </div>
                    @else
                    <div class="form-check-inline">
                        <label class="form-check-label">
                            <input type="radio" class="form-check-input" name="prodactiv" value="1">Открыть для заказа
                        </label>
                    </div>
                    @endif
                </div>
            </div>

            <div class="form-group row">
                <label for="init" class="col-md-4 col-form-label text-md-right">{{ __('Единица измерения') }}</label>
                <div class="col-md-6">
                    <select name='unit' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected value="{{ $product->units}}">{{ $product->units}}</option>
                        <option value="штук">шт.</option>
                        <option value="пачка">пачка</option>
                        <option value="см.">см.</option>
                        <option value="коробка">коробка</option>
                        <option value="упаковка">упаковка</option>
                    </select>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Изменить') }}
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-info" role="button">Вернуться к списку</a>
                </div>
            </div>
        </form>
    </div>
</div>
