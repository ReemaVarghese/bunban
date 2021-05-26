@extends("adtheme")

@section("adcontent")
<div class="contanier">
<div class="row"><div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col-12 col-sm-6 col-lg-6 col-xl-6">
<form action="/updatefaculty/{{$f->id}}" method="post">
<br><br>
{{csrf_field()}}
<table class="table table-borderless">
<tr>
    <td>Name</td>
    <td><input type="text" class="form-control" name="name" value="{{$f->name}}"></td>
</tr>
<tr>
    <td> Mail</td>
    <td><input type="text" class="form-control" name="mail" value="{{$f->mailid}}"></td>
</tr>
<tr>
    <td>Phone no</td>
    <td><input type="text" class="form-control" name="phn" value="{{$f->phone}}"></td>
</tr>
<tr>
    <td>Course</td>
    <td><input type="text" class="form-control" name="cou" value="{{$f->course}}"></td>
</tr>

<tr>
    <td></td>
    <td><button class="btn btn-success">UPDATE</button></td>
</tr>


</table></form>

</div>
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div></div></div>

@endsection