@extends('mylayouts.main.header_layout')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-3">
            <div class="nav-side-menu">
                <nav class="navbar bg-light justify-content-center">
                    <!-- Links -->
                    <div class="bg-light border-right" id="sidebar-wrapper">
                        <div class="sidebar-heading" ><h4><b>Пользователи:</b></h4> </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('show_users') }}" class="list-group-item list-group-item-action bg-light">Список всех ({{ session('count_users')?? '&'}})</a>
                            <a href="{{ route('roles_main') }}" class="list-group-item list-group-item-action bg-light">Роли пользователей </a>
                        </div>
                        <br />
                        <div class="sidebar-heading" ><h4><b>Компании:</b></h4> </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('zakaz_list') }}" class="list-group-item list-group-item-action bg-light">Управление заказами</a>
                        </div>
                        <br />
                        <div class="sidebar-heading" ><h4><b>Номенклатура:</b></h4> </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-light">Управление справочником канцелярии</a>
                        </div>
                        <br />
                        <div class="sidebar-heading" ><h4><b>Заказы канцелярии:</b></h4> </div>
                        <div class="list-group list-group-flush">
                            <a href="{{ route('orders.index') }}" class="list-group-item list-group-item-action bg-light">Создание заказа</a>
                            <a href="{{ route('myorders.index') }}" class="list-group-item list-group-item-action bg-light">Мои заказы</a>
                            <a href="{{ route('otdel_order_list') }}" class="list-group-item list-group-item-action bg-light">Заказы моего отдела</a>
                        </div>
                    </div>

                </nav>
            </div>
        </div>

        <div class="col-md-9">
    
            <p>Сработал {{ $formySwith }}</p>            
@switch($formySwith)

    @case(1)
        @include('mylayouts.main.admincontent.users_all', ['header' => 'Работа с пользователями'])
        @break

    @case(2)
        @include( 'mylayouts.main.admincontent.registr_user', ['header' => 'Добавление пользователя'])
        @break
        
   @case(3)
        @include( 'mylayouts.main.admincontent.edit_user', ['header' => 'Изменение пользователя'])
        @break
                
   @case(4)
        @include( 'mylayouts.main.admincontent.role_all', ['header' => 'Работа с ролями в системе'])
        @break
        
   @case(5)
        @include( 'mylayouts.main.admincontent.role_add', ['header' => 'Добавление роли'])
        @break
        
   @case(6)
        @include( 'mylayouts.main.admincontent.role_list', ['header' => 'Пользователи роли'])
        @break
        
        {{--For zakaz --}}
   @case(7)
        @include( 'mylayouts.main.forzakazkanc.all_list_zakaz', ['header' => 'Заявочные компании'])
        @break
   @case(8)
        @include( 'mylayouts.main.forzakazkanc.form_create', ['header' => 'Открытие заявки'])
        @break
   @case(9)
        @include( 'mylayouts.main.forzakazkanc.edit_zakaz', ['header' => 'Изменение статуса'])
        @break
        
        {{-- For works product --}}
   @case(10)
        @include( 'mylayouts.main.forworksproduct.all_list_product', ['header' => 'Работа с справочником канцелярии'])
        @break
   @case(11)
        @include( 'mylayouts.main.forworksproduct.show_form_create', ['header' => 'Работа с справочником канцелярии'])
        @break
   @case(12)
        @include( 'mylayouts.main.forworksproduct.show_form_edit', ['header' => 'Изменение товара'])
        @break
        
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

    @default
       @include('mylayouts.main.admincontent.default_admin_page', ['header' => 'Панель администратора'])
@endswitch
            
            </div>
    </div>
</div>
@endsection

