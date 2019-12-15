
<style>
    *{ font-family: DejaVu Sans !important;}
        table{border-collapse: collapse;
          border: 1pt solid #191919;}
      tr {align:right !important;}
      th {border:1px solid #191919 !important;}
      td {border:1px solid #191919 !important;}
  </style>
   <p style="float:right; font-size: 12px; color: #ccc !important">dudko@kst.kali</p>
  <h4>УП "Калийспецтранс" {{date('d.m.Y H:i',time())}}</h4>
  <h4>Отдел: {{ $otdel ?? ''}} </h4>
        <p>Список товаров по закупке: <b>&laquo;{{ $zakaz_name ?? ''}}&raquo; </b>
            <br />
            Дата создания закупки {{ date('d.m.y',strtotime($zakaz_date)) }}  </p>          
         <table>
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Наименование</th>
                    <th scope="col">Ед.изм.</th>
                    <th scope="col">Кол. заказов</th>
                    <th scope="col">Всего заказано</th>
                    <th scope="col">Всего одобрено</th>
                    <th scope="col">Разница</th>
                    <th scope="col">План выдачи</th>
                </tr>
            </thead>
            <tbody >
                
                @foreach($result as $prod=>$col_prod)
                @php
                    $user_count = 0;
                    $valid_count = 0;
                    $unit='';
                @endphp
                <tr>
                   <td>{{ $loop->iteration }}</td>
                    <td>{{$prod }}</td>

                    @foreach($col_prod as $prod)
                    @php
                        $user_count +=$prod->count;
                        $valid_count +=$prod->count_good;
                        $unit=$prod->product->units;
                    @endphp

                    @endforeach
                    <td>{{ $unit }}</td>
                    <td>{{ $col_prod->count() }}</td>
                    <td>{{ $user_count }}</td>
                    <td>{{ $valid_count }}</td>
                    <td>{{ ($user_count-$valid_count)*(-1) }}</td>
                    @if($user_count == $valid_count)
                    <td>{{ $valid_count }}</td>
                    @else
                    <td>{{ $valid_count }}</td>
                    @endif

                </tr>
                @endforeach
  

            </tbody>
        </table>

    </div>
</div>