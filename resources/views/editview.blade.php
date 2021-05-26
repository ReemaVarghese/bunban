@extends("factheme")


@section("faccontent")
<div class="contanier">
<div class="row"><div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col-12 col-sm-6 col-lg-6 col-xl-6">
<form action="/update/{{$q->id}}" method="post">
<br><br>
{{csrf_field()}}
<table class="table table-borderless">
<tr>
    <td>Question</td>
    <td><input type="text" class="form-control" name="que" value="{{$q->question}}"></td>
</tr>
<tr>
    <td>Option 1</td>
    <td><input type="text" class="form-control" name="op1" value="{{$a->op1}}"></td>
</tr>
<tr>
    <td>Option 2</td>
    <td><input type="text" class="form-control" name="op2" value="{{$a->op2}}"></td>
</tr>
<tr>
    <td>Option 3</td>
    <td><input type="text" class="form-control" name="op3" value="{{$a->op3}}"></td>
</tr>
<tr>
    <td>Option 4</td>
    <td><input type="text" class="form-control" name="op4" value="{{$a->op4}}"></td>
</tr>
<tr>
    <td>Answer</td>
    <td><input type="text" class="form-control" name="ans" value="{{$a->ans}}"></td>
</tr>
<tr>
    <td></td>
    <td><button class="btn btn-success">UPDATE</button></td>
</tr>


</table></form>

</div>
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div></div></div>

@endsection