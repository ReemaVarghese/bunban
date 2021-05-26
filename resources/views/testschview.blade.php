@extends("factheme")

@section("faccontent")
<div class="contanier">
<div class="row">
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col col-12 col-sm-6 col-lg-6 col-lg-6">
<br><br>
<form action="/viewschedule" method="post">
{{ csrf_field() }}
<table class="table table-dark table-striped">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Scheduled date</th>
    <th>        </th>
    <!-- <th>         </th> -->
</tr>
@foreach($s as $ans)
<tr>
    <td>{{ $ans->id}}</td>
    <td>{{ $ans->quizname    }}</td>
    <td>{{ $ans->schedule }}</td>
    <td><a href="/deleteviewschedule/{{$ans->id}}" class="btn btn-danger">DELETE</a></td>
</tr>

@endforeach
</table>

</form>


</div>
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
</div>
</div>

@endsection