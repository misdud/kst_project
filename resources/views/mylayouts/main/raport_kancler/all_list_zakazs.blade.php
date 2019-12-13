<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        <div class="row mx-md-n2">
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Всего заявочных компаний:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-info text-white"><h5> <span class="align-middle">{{ $list_zakazs_count ?? '' }}</span></h5></div>
        </div>
        <br />
        
        <span class="d-block p-1  rounded-top bg-info text-white">Выберите заявочную компанию для просмотра отчета</span>  
        <table class="table table-hover shadow-sm">
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
                    <td><a href="{{ route('show_otdels_raport',['id_zakr'=>$zakaz->id])}}" class="btn btn-outline-secondary" role="button">Перейти к отчётам</a></td>
                </tr>
                @endforeach
            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $list_zakazs->links() }}</div>

    </div>
</div>