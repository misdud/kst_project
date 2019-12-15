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
                        @canany(['show_users_admin', 'show_mang_kanc_admin', 'show_moder_kanc_admin'])
                        @can('show_users_admin')
                        <div class="py-1 pt-2 sidebar-heading shadow " style="background-color: #CAD4DC"><h4><b>Пользователи:</b></h4> </div>
                        <div class="list-group list-group-flush shadow">
                            <a href="{{ route('show_users') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/users.png" width="30" class="pr-2"/>Пользователи сервиса ({{ session('count_users')?? '&'}})</a>
                            <a href="{{ route('roles_main') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/manager.png" width="30" class="pr-2"/>Роли пользователей </a>
                        </div>
                        @endcan
                        @can('show_mang_kanc_admin')
                        <div class="py-1 pt-2 sidebar-heading shadow" style="background-color: #CAD4DC" ><h4><b>Компании:</b></h4> </div>
                        <div class="list-group list-group-flush shadow">
                            <a href="{{ route('zakaz_list') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/calendar.png" width="30" class="pr-2"/>Управление заказами</a>
                        </div>
                        <div class="py-1 pt-2 sidebar-heading shadow" style="background-color: #CAD4DC" ><h4><b>Номенклатура:</b></h4> </div>
                        <div class="list-group list-group-flush shadow">
                            <a href="{{ route('products.index') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/list.png" width="30" class="pr-2"/>Управление справочником</a>
                        </div>
                        @endcan
                        <div class="py-1 pt-2 sidebar-heading shadow" style="background-color: #CAD4DC"><h4><b>Валидация заказов:</b></h4> </div>
                        <div class="list-group list-group-flush shadow">
                            @can('show_moder_kanc_admin')
                            <a href="{{ route('valids.index') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/handshake.png" width="30" class="pr-2"/>Проверка компаний</a>
                            @endcan
                            <a href="{{ route('show_index_raport') }}" class="list-group-item list-group-item-action bg-light pl-3"><img src="{{ URL::asset('/') }}img/raport.png" width="30" class="pr-2"/>  Отчеты</a>
                        </div>
                         @endcanany
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
        @break
        
        {{--##### FOR VALID #####--}}
  @case(22)
        @include( 'mylayouts.main.validate.all_list_zakaz', ['header' => 'Работа с  заявочными копаниями'])
        @break
  @case(23)
        @include( 'mylayouts.main.validate.all_list_otdels', ['header' => 'Работа с отделом'])
        @break
 @case(24)
        @include( 'mylayouts.main.validate.valid_orders', ['header' => 'Проверка отдела'])
        @break
        
        {{---### FOR RAPORT ###---}}
 @case(25)
        @include('mylayouts.main.raport_kancler.all_list_zakazs', ['header' => 'Работа с отчётами'])
        @break
 @case(26)
        @include('mylayouts.main.raport_kancler.all_list_otdel_raport', ['header' => 'Работа с отчётами по отделам'])
        @break
 @case(27)
        @include('mylayouts.main.raport_kancler.otdel_order_raport', ['header' => 'Детализация'])
        @break
 @case(28)
        @include('mylayouts.main.raport_kancler.show_svod', ['header' => 'Сводная по выбранной заявочной компании'])
        @break

    @default
       @include('mylayouts.main.admincontent.default_admin_page', ['header' => 'Панель администратора'])
@endswitch
            
            </div>
    </div>
</div>
@endsection

