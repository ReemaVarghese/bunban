@extends("factheme")


@section("faccontent")
<div class="contanier">
<div class="row"><div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col-12 col-sm-6 col-lg-6 col-xl-6">
<br><br>
<form action="/deleteschedule/{{$f->id}}" method="post">
{{csrf_field()}}
<table class="table table-borderless">
<tr>
    <td>Name</td>
    <td><input type="text" class="form-control" name="que" value="{{$f->quizname}}"></td>
</tr>
<tr>
    <td>Scheduled date</td>
    <td><input type="text" class="form-control" name="op1" value="{{$f->schedule}}"></td>
</tr>
    <td></td>
    <td><button class="btn btn-success">DELETE</button></td>
</tr>


</table></form>

</div>
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div></div></div>

@endsection