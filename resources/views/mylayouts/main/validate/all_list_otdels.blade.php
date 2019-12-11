<div class="card">
    <div class="card-header">{{$header}}</div>
    <div class="card-body">

        @if(count($group_otdel_orders)>0)
         <div class="row mx-md-n2">
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Заявочная компания:</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-success text-white"><h5> <span class="align-middle">{{ $zakaz->zakazname }}</span></h5></div>
         <div class="d-inline p-2 mt-3 ml-2 mb-3 rounded-left bg-secondary text-white"><h5><span class="align-middle">Статус:</span></h5></div>
         @if($zakaz->zakazactiv==1)
           <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-success text-white"><h5> <span class="align-middle">Активна</span></h5></div>
         @else
         <div class="d-inline p-2 mt-3 ml-1 mb-3  rounded-right bg-danger text-white"><h5> <span class="align-middle">Закрыта</span></h5></div>
         @endif
         
         </div>
        <div class="row mx-md-n2">
            <p class="text-primary px-2">Период действия: <span class="text-dark">{{ date('d.m.Y',strtotime($zakaz->created_at)) }}
               -  {{ date('d.m.Y',strtotime($zakaz->dodate))   }}</span></p>   
        </div>
        
        <br />
        <h5 class="text-info">В таблице представлены отделы которые участвовали в этой компании</h5>            
        <table class="table table-hover">
            <thead class="thead-light">
                <tr>
                    <th>#</th>
                    <th></th>
                    <th>Количество позиций</th>
                    <th>Отдел</th>
                    <th>Действие</th>
                </tr>
            </thead>
            <tbody>
                
                @foreach ($group_otdel_orders as $otdel)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td></td>
                    <td class="px-4" style="background-color: #FFFADC" >{{ $otdel->count() }}</td>
                       @foreach($otdel as $otd)
                       <td>{{ $otd->otdel->otdelfullname }}</td>
                       <td><a href="{{ route('valids.edit',['valid'=>$otd->otdel->id])}}" class="btn btn-outline-secondary" role="button">Редактировать</a></td>
                        @break
                        @endforeach
                    
                </tr>
                @endforeach
            </tbody>
        </table> 
        @else
        <p>Нет участников</p>
        @endif
        <a href="{{ route('valids.index') }}" class="btn btn-info" role="button">Вернуться к списку</a>

    </div>
</div>