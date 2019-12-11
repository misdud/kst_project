<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        <br />
        <div class="row mx-md-n2">
            <h4 class="text-primary px-2">Заявочные компании  </h4>   
        </div>
        <br />
        <h5 class="text-info">В таблице представлены заявочные компании, всего найдено  {{ count($list_zakazs) ?? ''}}:</h5>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Название</th>
                    <th>Дата действия</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($list_zakazs as $zakaz)
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
                    <td><a href="{{ route('valids.show',['valid'=>$zakaz->id])}}" class="btn btn-outline-secondary" role="button">Посмотреть</a></td>
                </tr>
                @endforeach
            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $list_zakazs->links() }}</div>

    </div>
</div>