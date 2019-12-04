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
                            <a href="{{ route("show_users") }}" class="list-group-item list-group-item-action bg-light">Список всех ({{ session('count_users')?? '&'}})</a>
                            <a href="{{ route("roles_main") }}" class="list-group-item list-group-item-action bg-light">Роли пользователей </a>
                        </div>
                        <br />
                        <div class="sidebar-heading" ><h4><b>Роли:</b></h4> </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action bg-light">Список всех</a>
                            <a href="#" class="list-group-item list-group-item-action bg-light">Создать</a>
                            <a href="#" class="list-group-item list-group-item-action bg-light">Редактировать</a>
                        </div>
                        <br />
                        <div class="sidebar-heading" ><h4><b>Канцелярка:</b></h4> </div>
                        <div class="list-group list-group-flush">
                            <a href="#" class="list-group-item list-group-item-action bg-light">Список всех</a>
                            <a href="#" class="list-group-item list-group-item-action bg-light">Создать</a>
                            <a href="#" class="list-group-item list-group-item-action bg-light">Редактировать</a>
                        </div>
                    </div>

                </nav>
            </div>
        </div>

        <div class="col-md-9">
    
            <p>Сработало {{ $formySwith }}</p>            
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

    @default
       @include('mylayouts.main.admincontent.default_admin_page', ['header' => 'Работа администратора'])
@endswitch
            
            </div>
    </div>
</div>
@endsection

