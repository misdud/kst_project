@extends('mylayouts.main.header_layout')

@section('content')
<div class="container-fluid">
    <div class="row bg-warning">
     <div class="col-3">
     </div> 
        <div class="col-8">
            <h4 class="pt-3">У Вас нет прав(роли) на просмотр, обратитесь к администратору. </h4>
          @isset($done)
          <p class="align-center">Истёк пробный период!</p>
          @endisset
        </div>
        <div class="col-3">
            
        </div> 

    </div>

    </div>
@endsection

