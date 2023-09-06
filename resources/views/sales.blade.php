<!DOCTYPE html>
<html>
<style>
table, th, td {
  border:1px solid black;
}
</style>
<body>
<button onclick="location.href='/newSale';">new sale</button>
<button onclick="location.href='/list';">show sales</button>
<h2>A basic HTML table</h2>

<table style="width:100%">
  <tr>
    <th>Time</th>
    <th>Sale Number</th>
    <th>Description</th>
    <th>Amount</th>
    <th>Currency</th>
  </tr>
<tr>

@foreach ($sales as $sale)
<tr>
  <td>{{ $sale->time }}</td>
  <td>{{ $sale->sale_number }}</td> 
  <td>{{ $sale->product_name }}</td>
  <td>{{ $sale->price }}</td>
  <td>{{ $sale->currency }}</td>

</tr>
@endforeach
</tr>

</table>

<p>To understand the example better, we have added borders to the table.</p>

</body>
</html>