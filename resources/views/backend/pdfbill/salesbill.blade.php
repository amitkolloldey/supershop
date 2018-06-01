<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title>NeedsShop - Print Invoice</title>
</head>
<body>
<p align="center"><strong>NeedsShop - ITs ALL YOU NEED</strong></p>
<p align="center">Dhaka</p>
<p align="center">Phone: 0177710155555</p>
<hr>
<p >Date: {{Carbon\Carbon::now()->format('d-m-Y')}}</p>
<p>RefNo: {{ str_random(12) }}</p>
<hr>
<table border="0" align="center">
    <thead>
    <tr>
        <th>S.N.</th>
        <th>Product Name</th>
        <th>Quantity</th>
        <th>Price</th>
    </tr>
    </thead>
    <tbody>
    <?php $i=1 ?>
    @foreach($report as $all)
    <tr>
        <td>{{$i++}}</td>
        <td>{{$all->name}}</td>
        <td>{{$all->quantity}}</td>
        <td>{{$all->price}}</td>
    </tr>
    @endforeach
    <tr>
        <td colspan="3"> Grand Total </td>
        <td>
            <?php $total=0 ?>
            @if($report)
                @foreach($report as $s)
                    @php
                        $price = $s->price;
                        $total += $price;
                    @endphp
                @endforeach
               BDT. {{$total}}
            @endif
        </td>
    </tr>
    </tbody>
</table>
<br>
<p>Prepared by: {{Auth::user()->name}} Time: {{Carbon\Carbon::now()->toTimeString()}}</p>
<p align="center">Thank You</p>
</body>
</html>


