<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">
        
        @if(session('openzaivka') == 0)
        <div class=' text-right'><a href="{{ route('zakaz_creat')}}" class="btn btn-outline-primary btn-block" role="button"> + Открыть заявочную компанию</a></div>
        <br/>
        @endif
        @if(count($zakazs)>0)
        <h2>Список всех заявак</h2>
        
        <p>В таблице представлены заявочные компании на канцелярию :</p>            
        
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>№</th>
                    <th>Имя</th>
                    <th>Дата действия</th>
                    <th>Дата создания</th>
                    <th>Статус</th>
                    <th>Изменить</th>
                </tr>
            </thead>
            <tbody>
          @endif  
          
          @forelse ($zakazs as $zakaz)
          <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $zakaz->zakazname }}</td>
            <td>{{ $zakaz->dodate }}</td>
            <td>{{ $zakaz->created_at}}</td>
             @if($zakaz->zakazactiv == 1)
                <td class="table-success">Активна</td>
                <td><a href="{{ route('zakaz_edit',['id'=>$zakaz->id])}}" class="btn btn-outline-secondary" role="button">Закрыть</a></td>
             @else
                <td class="table-warning">Закрыта</td>
                 <td><a href="{{ route('zakaz_list')}}" class="btn btn-outline-secondary" role="button">Изменить</a></td>
             @endif
           
          </tr>
            @empty
            <p>Заявки  не найдены</p>
          @endforelse

            </tbody>
        </table> 
        <div class="pagination justify-content-center">{{ $zakazs->links() }}</div>
        

        
    </div>
</div>