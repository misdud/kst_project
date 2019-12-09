          
<div class="card">
    <div class="card-header">{{ __('Создание товара') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('products.store') }}">
            @csrf
            @if (session('message_cr_prod'))
            <div class="alert alert-success">
                <p class="text-center text-success ">Товар <b>{{ session('message_cr_prod') }}</b>  добавлен в справочник</p>
            </div>
            @endif
            <div class="form-group row">
                <label for="productname" class="col-md-4 col-form-label text-md-right">{{ __('Название товара') }}</label>

                <div class="col-md-6">
                    <input id="productname" type="text" class="form-control @error('productname') is-invalid @enderror" name="productname" value="{{ old('productname') }}" required autocomplete="productname" autofocus placeholder="Введите название">

                    @error('productname')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="product" class="col-md-4 col-form-label text-md-right">{{ __('Описание товара') }}</label>
                <div class="col-md-6">
                    <textarea class="form-control @error('productdiscr') is-invalid @enderror" name="productdiscr" id="product" rows="3" placeholder="Введите описание"></textarea>

                    @error('productdiscr')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="inlineFormCustomSelect" class="col-md-4 col-form-label text-md-right">{{ __('Единица измерения') }}</label>
                <div class="col-md-6">
                    <select name='unit' class="custom-select mr-sm-2" id="inlineFormCustomSelect">
                        <option selected value="штук">шт.</option>
                        <option value="пачка">пачка</option>
                        <option value="см.">см.</option>
                        <option value="коробка">коробка</option>
                        <option value="упаковка">упаковка</option>
                    </select>
                </div>
            </div>


            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Создать') }}
                    </button>
                    <a href="{{ route('products.index') }}" class="btn btn-info" role="button">Вернуться к списку</a>
                </div>
            </div>
        </form>
    </div>
</div>

