<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> Salary Document</title>
</head>
<body>
<h2 align="center">Expenses Sheet</h2>
<table border="1" width="100%" class="table table-striped table-bordered table-hover" id="categorytable">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Expenses Name</th>
        <th>Party Name</th>
        <th>Total Amount</th>
        <th>Paid Amount</th>
        <th>Due Amount</th>
        <th>Product Name</th>
        <th> Date</th>
    </tr>
    </thead>
    <tbody>
    <?php $i = 1 ?>
    @foreach($allexpenses as $pc)
        <tr>
            <th> {{$i++}}</th>
            <td> {{$pc->expenses_name}}</td>
            <td> {{$pc->party_name}}</td>
            <td> {{$pc->totalamount}}</td>
            <td> {{$pc->paidamount}}</td>
            <td> {{$pc->dueamount}}</td>
            <td> {{$pc->product_name}}</td>
            <td> {{$pc->created_at}}</td>
        </tr>
    @endforeach
    <tr>
        <td colspan="3">Total </td>
        <td>
            <?php $total=0 ?>
            @if($allexpenses)
                @foreach($allexpenses as $s)
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
            @if($allexpenses)
                @foreach($allexpenses as $s)
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
            @if($allexpenses)
                @foreach($allexpenses as $s)
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
    </tr>
    </tbody>
</table>
</body>
</html>


