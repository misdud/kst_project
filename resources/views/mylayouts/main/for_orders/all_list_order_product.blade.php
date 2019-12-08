<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        
        @if($is_isset_zakaz==TRUE)
         <br />
         <p class="p-3 mb-2 bg-light text-dark text-center border border-success rounded-pill">Заявочная компания объявлена  до <b>{{  date('d.m.Y', strtotime($do_date_zakaz))}}</b></p>
         <br />
        @else
         <br />
            <p class="p-3 mb-2 bg-warning text-dark text-center">Создать заказ нельзя, так-как не найдено открытой заявочной компании</p>
         <br />
         @endif

        @if(count($products)>0)
        <h2>Выберите товар из справочника "Канцелярия" </h2>
        
        <p class="text-info">Всего товаров {{ $product_count?? '&'}}:</p>            
        
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название товара</th>
                    <th>Единица измерения</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
          @endif  
          
          @forelse ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->productname }}</td>
            <td>{{ $product->units }}</td>
            @if($is_isset_zakaz==TRUE)
                  <td><a href="{{ route('orders.show',['order'=>$product->id])}}" class="btn btn-outline-secondary" role="button">Заказать</a></td>
            @else
                  <td><a href="{{ route('orders.index')}}" class="btn btn-outline-secondary" role="button">Отказано</a></td>
           @endif
          </tr>
            @empty
            <p>Товары не найдены</p>
          @endforelse

            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $products->links() }}</div>
        

        
    </div>
</div>