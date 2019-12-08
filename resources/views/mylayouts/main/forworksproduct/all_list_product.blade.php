<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        
        <div class=' text-right'><a href="{{ route('products.create')}}" class="btn btn-outline-primary btn-block" role="button"> + Добавиь товар в справочник "Канцелярия"</a></div>
        <br/>

         <br />

        @if(count($products)>0)
        <h2>Справочник "Канцелярия" </h2>
        
        <p class="text-info">Всего товаров {{ $product_count?? '&'}}:</p>            
        
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название товара</th>
                    <th>Единица измерения</th>
                    <th>Статус</th>
                    <th>Изменить</th>
                </tr>
            </thead>
            <tbody>
          @endif  
          
          @forelse ($products as $product)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $product->productname }}</td>
            <td>{{ $product->units }}</td>
             @if($product->productactiv == 1)
                <td class="table-success">Активен для заказа</td>
                <td><a href="{{ route('products.edit',['product'=>$product->id])}}" class="btn btn-outline-secondary" role="button">Изменить</a></td>
             @else
                <td class="table-warning">Закрыт для заказа</td>
                 <td><a href="{{ route('products.edit',['product'=>$product->id])}}" class="btn btn-outline-secondary" role="button">Изменить</a></td>
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