
<style>
    *{ font-family: DejaVu Sans !important;}
  </style>
   <p style="float:right; font-size: 12px; color: #ccc !important">dudko@kst.kali</p>
  <h4>УП "Калийспецтранс" {{date('d.m.Y H:i',time())}}</h4>
  <h4>Отдел: {{ $otd_user ?? ''}} </h4>
        <p>Список товаров по закупке: <b>&laquo;{{ $zakaz_name ?? ''}}&raquo; </b>
            <br />
            Дата создания закупки {{ $zakaz_date }}  </p>          
         <table style="border:1px solid #CCC !important;">
            <thead style="border:1px solid #CCC !important;">
                <tr style="border:1px solid #CCC !important;">
                    <th style="border:1px solid #CCC !important;" scope="col">#</th>
                    <th style="border:1px solid #CCC !important;" scope="col">Наименование</th>
                    <th style="border:1px solid #CCC !important;" scope="col">Кол. заказов</th>
                    <th style="border:1px solid #CCC !important;" scope="col">Всего заказано</th>
                    <th style="border:1px solid #CCC !important;" scope="col">Всего одобрено</th>
                    <th style="border:1px solid #CCC !important;" scope="col">Разница</th>
                    <th style="border:1px solid #CCC !important;" scope="col">План выдачи</th>
                </tr>
            </thead>
            <tbody style="border:1px solid #CCC !important;">
                
                @foreach($result as $prod=>$col_prod)
                @php
                    $user_count = 0;
                    $valid_count = 0;
                @endphp
                <tr>
                   <td style="border:1px solid #CCC !important;">{{ $loop->iteration }}</td>
                    <td style="border:1px solid #CCC !important;">{{$prod }}</td>
                    <td style="border:1px solid #CCC !important;">{{ $col_prod->count() }}</td>
                    @foreach($col_prod as $prod)
                    @php
                        $user_count +=$prod->count;
                        $valid_count +=$prod->count_good;
                    @endphp

                    @endforeach
                    <td style="border:1px solid #CCC !important;">{{ $user_count }}</td>
                    <td style="border:1px solid #CCC !important;">{{ $valid_count }}</td>
                    <td style="border:1px solid #CCC !important;">{{ $user_count-$valid_count }}</td>
                    @if($user_count == $valid_count)
                    <td style="border:1px solid #CCC !important;">{{ $valid_count }}</td>
                    @else
                    <td style="border:1px solid #CCC !important;">{{ $valid_count }}</td>
                    @endif

                </tr>
                @endforeach
  

            </tbody>
        </table>

    </div>
</div>