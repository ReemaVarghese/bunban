@extends("stdtheme")

@section("stdcontent")

<br><br><br>
<div class="contanier">
<div class="row">
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3">
<br><br>
</div>
<div class="col col col-12 col-sm-6 col-lg-6 col-lg-6">
<form action="/studmark" method="post">
<br><br>
{{ csrf_field() }}
<table class="table table-dark table-striped">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Result</th>
    <th>      </th>
</tr>
@foreach($m as $ans)
<tr>
    <td>{{ $ans->id}}</td>
    <td>{{ $ans->s_name    }}</td>
    <td>{{ $ans->result  }}</td>
  <td> </td>
</tr>

@endforeach
</table>

</form>


</div>
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
</div>
</div>







@endsection