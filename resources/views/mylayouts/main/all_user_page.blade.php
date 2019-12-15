@extends('mylayouts.main.header_layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="nav-side-menu">
                <nav class="navbar bg-light justify-content-center ">
                    <!-- Links -->
                    <div class="bg-light border-right" id="sidebar-wrapper">
                        <span class="d-block p-2 rounded-top bg-secondary text-white"></span>
                        <div class="py-1 pt-2 sidebar-heading shadow " style="background-color: #CAD4DC"  ><h4><b>Заказы канцелярии:</b></h4> </div>
                        <div class="list-group list-group-flush  shadow">
                            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/shop.png" width="30" class="pr-2"/>Создание заказа</a>
                            <a href="{{ route('myorders.index') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/add_cart.png" width="30" class="pr-2"/>Мои заказы</a>
                            <a href="{{ route('otdel_order_list') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/list_users.png" width="30" class="pr-2"/>Заказы моего отдела</a>
                        </div>
                    </div>

                </nav>
            </div>
        </div>

        <div class="col-md-9">
    
            <p>Сработал {{ $formySwith }}</p>            
@switch($formySwith)

        {{-- For works orders --}}
  @case(13)
        @include( 'mylayouts.main.for_orders.all_list_order_product', ['header' => 'Выбор товара'])
        @break
  @case(14)
        @include( 'mylayouts.main.for_orders.order_product_show', ['header' => 'Оформление заказа'])
        @break
  @case(15)
        @include( 'mylayouts.main.for_orders.my_orders_list', ['header' => 'Участие в заявочных компаниях'])
        @break
  @case(16)
        @include( 'mylayouts.main.for_orders.no_orders', ['header' => 'Ваши заказы'])
        @break
  @case(17)
        @include( 'mylayouts.main.for_orders.my_orders_in_zakaz', ['header' => 'Ваши заказы в выбранной заявочной компании'])
        @break
  @case(18)
        @include( 'mylayouts.main.for_orders.show_orders_old', ['header' => 'Ваши заказы в выбранной заявочной компании'])
        @break
  @case(19)
        @include( 'mylayouts.main.for_orders.otdel_order_list', ['header' => 'Участие отдела в заявочных компаниях'])
        @break
  @case(20)
        @include( 'mylayouts.main.for_orders.otdel_order_show', ['header' => 'Все товары отдела в заявочной копании'])
        @break
  @case(21)
        @include( 'mylayouts.main.for_orders.get_pdf_zakaz_otdel')
        @break

    @default
       @include('mylayouts.main.default_page_roles.default_all_user_page', ['header' => 'Панель пользователя'])
@endswitch
            
            </div>
    </div>
</div>
@endsection

