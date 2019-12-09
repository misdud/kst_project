<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        <div class="row mx-md-n2">
            <br />
            <div class="d-inline p-2  text-danger "><h5>У Вас пока нет заказов, попробуйте создать.</h5></div>
        </div>
<hr />
        <div>
         <a href="{{ route('orders.index') }}" class="btn btn-info" role="button">Перейти к созданию заказа</a>
         </div>
    </div>
</div>
