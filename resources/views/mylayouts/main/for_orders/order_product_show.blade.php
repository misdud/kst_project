          
<div class="card">
    <div class="card-header">{{ __('Заказ товара') }}</div>

    <div class="card-body justify-content-center">
        <form method="POST" action="{{ route('orders.store') }}">
            @csrf
            @method('POST')
            @if (session('message_edit_prod'))
            <div class="alert alert-success">
                <p class="text-center text-success ">Товар <b>{{ session('message_edit_prod') }}</b>  обнавлён в справочнике</p>
            </div>
            @endif
            <div class="form-group row">
                <label for="productname" class="col-md-4 col-form-label text-md-right">{{ __('Название товара') }}</label>
                <div class="col-md-6">
                    <input id="productname" type="text" class="form-control @error('productname') is-invalid @enderror" name="productname" value="{{ $product->productname }}" required autocomplete="productname" readonly>
                </div>
            </div>

            <div class="form-group row">
                <label for="productdiscr" class="col-md-4 col-form-label text-md-right">{{ __('Описание товара') }}</label>
                <div class="col-md-6">
                    <textarea class="form-control @error('productdiscr') is-invalid @enderror" name="productdiscr" id="productdiscr" rows="3" readonly>{{ $product->productdiscript }}</textarea>
 
                </div>
            </div>

            <div class="form-group row">
                <label for="init" class="col-md-4 col-form-label text-md-right">{{ __('Единица измерения товара') }}</label>
                <div class="col-md-6">
                    <select name='unit' class="custom-select mr-sm-2" id="init" readonly="">
                        <option selected value="{{ $product->units}}">{{ $product->units}}</option>
                    
                    </select>
                </div>
            </div>
            
         <div class="form-group row">
                <label for="count" class="col-md-4 col-form-label text-md-right">{{ __('Количество штук') }}</label>
                <div class="col-md-2">
                    <input id="count" type="number" min="1" max="10" class="form-control @error('productname') is-invalid @enderror" name="count" value="0" required >
                </div>
            </div>

            <input type="hidden" name="product_id"  value="{{$product->id}}">

            <div class="form-group row mb-0">
                <div class="col-md-6 offset-md-4">
                    <button type="submit" class="btn btn-danger">
                        {{ __('Заказать') }}
                    </button>
                    <a href="{{ route('orders.index') }}" class="btn btn-info" role="button">Вернуться к списку</a>
                </div>
            </div>
        </form>
    </div>
</div>
