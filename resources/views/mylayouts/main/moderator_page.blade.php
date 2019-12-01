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
                                <a href="#" class="list-group-item list-group-item-action bg-light">Dashboard</a>
                                <a href="#" class="list-group-item list-group-item-action bg-light">Shortcuts</a>
                                <a href="#" class="list-group-item list-group-item-action bg-light">Overview</a>
                                <a href="#" class="list-group-item list-group-item-action bg-light">Events</a>
                               
                            </div>
                        </div>

                    </nav>
            </div>
</div>
        


        <div class="col-md-9">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
        

                    Moderator page
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

