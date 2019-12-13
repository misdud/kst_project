<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">



        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Ваш отдел:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $otdel->otdelfullname ?? ''}}</span></h5></div>
        </div>
        <br />
        <h4 class="text-primary">Все участия отдела <span class="text-secondary"><b>&laquo;{{ $otdel->otdelfullname ?? ''}}&raquo; </b></span> в заявочных компаниях. </h4>   
        <br />
         <span class="d-block p-2  rounded-top bg-info text-white">В таблице представлены заявочные компании в которых  участвовал отдел, всего {{ count($list_group) ?? ''}}:</span>           
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дата действия</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                    <th>Кол.поз.</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>


                @foreach ($zakazs as $zakaz)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $zakaz->zakazname }}</td>
                    <td>{{ date('d.m.Y',strtotime($zakaz->dodate)) }}</td>
                    <td>{{ date('d.m.Y H:i',strtotime($zakaz->created_at))}}</td>
                    @if($zakaz->zakazactiv == 1)
                    <td class="table-success">Активна</td>
                   
                    @else
                    <td class="table-warning">Закрыта</td>
                    
                    @endif
                    <td>{{ $zakaz->orders()->where('otdel_id', $otdel->id)->count()}}</td>
                    <td><a href="{{ route('otdel_orders_zakaz',['id_zakaz'=>$zakaz->id])}}" class="btn btn-outline-secondary" role="button">Посмотреть</a></td>
                </tr>

            @endforeach

            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $zakazs->links() }}</div>



    </div>
</div>