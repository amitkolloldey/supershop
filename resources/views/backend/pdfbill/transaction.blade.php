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
<h2 align="center">Banking Deposite Transaction</h2>
<table border="1" align="center" cellpadding="5">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Total Amount</th>
        <th>Deposite Amount</th>
        <th>Remaining to Deposite</th>
        <th>Deposite by</th>
        <th>Deposite Date</th>
        <th>Bank Name</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($alltransaction as $all)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$all->totalamount}}</td>
        <td>{{$all->depositeamount}}</td>
        <td>{{$all->remainingamount}}</td>
        <td>{{$all->deposite_by}}</td>
        <td>{{$all->deposite_date}}</td>
        <td>{{$all->bank_name}}</td>
    </tr>
    @endforeach
    <tr>
        <td>Total</td>
        <td>
            <?php $total=0 ?>
            @if($alltransaction)
                @foreach($alltransaction as $s)
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
            @if($alltransaction)
                @foreach($alltransaction as $s)
                    @php
                        $price = $s->depositeamount;
                        $total += $price;
                    @endphp
                @endforeach
               BDT. {{$total}}
            @endif
        </td>
        <td>
            <?php $total=0 ?>
            @if($alltransaction)
                @foreach($alltransaction as $s)
                    @php
                        $price = $s->remainingamount;
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


