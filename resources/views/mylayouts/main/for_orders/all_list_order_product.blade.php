<div class="card shadow-sm">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

         <div class="row mx-md-n2">
        @if($is_isset_zakaz==TRUE)

         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Заявочная компания:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-success text-white"><h5> <span class="align-middle">открыта до {{ date('d.m.Y', strtotime($do_date_zakaz))}}</span></h5></div>

        @else

         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Заявочная компания:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-danger text-white"><h5>  <span class="align-middle">закрыта</span></h5></div>

        @endif
         </div>
        
        @if(session('order'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>Товар << <span class="text-danger">{{ session('order') }}</span> >> добавлен в заказ! </strong> <a href="{{ route('myorders.index')}}" class="alert-link"> <span class="text-primary">Посмотреть свои заказы</span></a>.
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
        @endif

        @if(count($products)>0)
        <br />
        <h2>Выберите товар из справочника "Канцелярия" </h2>
        <br />
        <span class="d-block p-2  rounded-top bg-info text-white">Всего товаров {{ $product_count ?? ''}}:</span>       
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название товара</th>
                    <th>Крат. описание</th>
                    <th>Ед. изм.</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @endif  

                @forelse ($products as $product)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $product->productname }}</td>
                    <td>{{ mb_substr($product->productdiscript, 0, 35) }}</td>
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