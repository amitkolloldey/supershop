<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<h2 align="center">Assets Report From {{$start}} To {{$end}}</h2>
<table border="1" align="center" cellpadding="5">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Goods Name</th>
        <th>Party Name</th>
        <th>Total Amount</th>
        <th>Paid Amount</th>
        <th>Due Amount</th>
        <th>Purchase Date</th>
        <th>Purchase By</th>
        <th>Status</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($report as $pc)
    <tr>
        <th> {{$i++}}</th>
        <td> {{$pc->goods_name}}</td>
        <td> {{$pc->party_name}}</td>
        <td> {{$pc->totalamount}}</td>
        <td> {{$pc->paidamount}}</td>
        <td> {{$pc->dueamount}}</td>
        <td> {{$pc->created_at}}</td>
        <td> {{$pc->created_by}}</td>
        <td>
            @if($pc->status == 'vat')
                <span class="label label-success"> vat </span>
            @endif
            @if($pc->status == 'pan')
                <span class="label label-success"> pan </span>
            @endif
            @if($pc->status == 'normal')
                <span class="label label-success"> normal </span>
            @endif
        </td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"> Grand Total </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->totalamount;
                        $total += $price;
                    @endphp
                @endforeach
               BDT. {{$total}}
            @endif
        </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->paidamount;
                        $total += $price;
                    @endphp
                @endforeach
               BDT. {{$total}}
            @endif
        </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->dueamount;
                        $total += $price;
                    @endphp
                @endforeach
               BDT. {{$total}}
            @endif
        </td>
        <td></td>
        <td></td>
        <td></td>
    </tr>
    </tbody>
</table>
</body>
</html>


