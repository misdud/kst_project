<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        @if(count($all_zakaz_user)>0)

        <div class="row mx-md-n2">
            <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Ваш отдел:</span></h5></div>
            <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5><span class="align-middle">{{ $otdel ?? ''}}</span></h5></div>
        </div>
        <br />  
         <span class="d-block p-2  rounded-top bg-info text-white">В таблице представлены заявочные компании в которых вы участвовали, всего {{ $all_count ?? ''}}:</span> 
        <table class="table table-hover shadow-sm">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Наименование</th>
                    <th>Дата действия</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                @endif  

                @forelse ($all_zakaz_user as $zakaz)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $zakaz->zakazname }}</td>
                    <td>{{ date('d.m.Y',strtotime($zakaz->dodate)) }}</td>
                    <td>{{ date('d.m.Y H:i',strtotime($zakaz->created_at))}}</td>
                    @if($zakaz->zakazactiv == 1)
                    <td class="table-success">Активна</td>
                    <td><a href="{{ route('myorders.edit',['myorder'=>$zakaz->id])}}" class="btn btn-outline-secondary" role="button">Изменить</a></td>
                    @else
                    <td class="table-warning">Закрыта</td>
                    <td><a href="{{ route('myorders.show',['myorder'=>$zakaz->id])}}" class="btn btn-outline-secondary" role="button">Посмотреть</a></td>
                    @endif

                </tr>
                @empty
            <p>Ваше участие в заявочной компании еще не состоялось</p>
            @endforelse

            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $all_zakaz_user->links() }}</div>



    </div>
</div>