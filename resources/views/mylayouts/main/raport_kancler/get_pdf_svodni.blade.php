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
        <p>Список товаров по закупке: <b>&laquo;{{ $zakaz->zakazname ?? ''}}&raquo; </b>
            <br />
            Дата создания закупки {{ date('d.m.y H:i',strtotime($zakaz->created_at)) }}  </p>          

        <table class="table table-sm table-info shadow-sm">
            <thead style="border:1px solid #191919;" >
                <tr >
                    <th>№</th>
                    <th>Наименование</th>
                    <th>Ед.изм.</th>
                    <th>Кол. заказов</th>
                    <th>Всего заказано</th>
                    <th>Всего принято</th>

                </tr>
            </thead>
            <tbody style="border:1px solid #191919;">
                
                @foreach($group_orders as $prod=>$col_prod)
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
                        $unit = $prod->product->units;
                    @endphp

                    @endforeach
                     <td>{{ $unit }}</td>
                     <td align="right" >{{ $col_prod->count() }}</td>
                    <td align="right">{{ $user_count }}</td>
                    <td align="right">{{ $valid_count }}</td>
                </tr>
                @endforeach

            </tbody>
        </table>
