<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        <div class="row mx-md-n2">
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Всех заявочных компаний:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5> <span class="align-middle">{{ $list_zakazs_count ?? '' }}</span></h5></div>
        </div>
        <br />
        <h5 class="text-info">В таблице  представлены все заявочные компании:</h5>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th>Название компании</th>
                    <th>Дата создания</th>
                    <th>Действует до</th>
                    <th>Период</th>
                    <th>Статус</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($list_zakazs as $zakaz)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $zakaz->zakazname }}</td>
                    <td>{{ date('d.m.y H:i',strtotime($zakaz->created_at))}}</td>
                    <td class="px-4">{{ date('d.m.y',strtotime($zakaz->dodate)) }}</td>
                    <td class="px-4">{{ date('j',(strtotime($zakaz->dodate) - strtotime($zakaz->created_at))) }}</td>

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