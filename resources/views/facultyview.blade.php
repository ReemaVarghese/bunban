@extends("adtheme")


@section("adcontent")
<div class="contanier">
<div class="row">
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col col-12 col-sm-6 col-lg-6 col-lg-6">
<form action="/viewstudent" method="post">
{{ csrf_field() }}
<br><br>
<table class="table table-dark table-striped">
<tr>
    <th>id</th>
    <th>Name</th>
    <th>Email</th>
    <th>Phone no</th>
    <th>Course</th>
    <th>Status</th>
    <th>        </th>
    <th>         </th>
</tr>
@foreach($s as $ans)
<tr>
    <td>{{ $ans->id}}</td>
    <td>{{ $ans->name    }}</td>
    <td>{{ $ans->mailid  }}</td>
    <td>{{ $ans->phone }}</td>
    <td>{{ $ans->course}}</td>
    <td>{{$ans->status}}</td>
    <td><a class="btn btn-warning" href="/editfacultyview/{{$ans->id}}">EDIT</a></td>
    <td><a href="/deletefacultyview/{{$ans->id}}" class="btn btn-danger">DELETE</a></td>
</tr>

@endforeach
</table>

</form>


</div>
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
</div>
</div>




@endsection