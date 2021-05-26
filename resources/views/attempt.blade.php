@extends("stdtheme")

@section("stdcontent")
<!-- <h1>{{session('sname')->name}}</h1> -->
<div class="container">
<div class="row">
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col-12 col-sm-6 col-lg-6 col-xl-6">
<br><br>

<h5>All The Very Best Dear {{session('sname')->name}}...... <i class="bi bi-hand-thumbs-up-fill" style="font-size: 2rem; color: grey;"></i> <i style="font-size: 2rem; color: grey;" class="bi bi-emoji-sunglasses"></i></h5>

<br><br>
<form action="/mark" method="post">
{{csrf_field()}}
<table class="table table-borderless">
@foreach($a as $ans)
@foreach($q as $que)
   @if($que->id == $ans->id)
<tr>
    <td> <b>Q{{$que->id}}:    {{$que->question}}  </b> </td>
    <td>  </td>
</tr>
<tr>
    
    <td><div class="form-check">
  <input class="form-check-input" type="radio" value="{{$ans->op1}}" id="flexCheckDefault" name="ans[{{$que->id}}]">
  <label class="form-check-label" for="flexCheckDefault">
  {{$ans->op1}}
  </label>
</div></td>
</tr>
<tr>
    
    <td><div class="form-check">
  <input class="form-check-input" type="radio" value="{{$ans->op2}}" id="flexCheckDefault" name="ans[{{$que->id}}]">
  <label class="form-check-label" for="flexCheckDefault">
  {{$ans->op2}}
  </label>
</div></td>
</tr>
<tr>
    
    <td><div class="form-check">
  <input class="form-check-input" type="radio" value="{{$ans->op3}}" id="flexCheckDefault" name="ans[{{$que->id}}]">
  <label class="form-check-label" for="flexCheckDefault">
  {{$ans->op3}}
  </label>
</div></td>
</tr>
<tr>
    
    <td><div class="form-check">
  <input class="form-check-input" type="radio" value="{{$ans->op4}}" id="flexCheckDefault" name="ans[{{$que->id}}]">
  <label class="form-check-label" for="flexCheckDefault">
  {{$ans->op4}}
  </label>
</div></td>
</tr>


@endif
@endforeach
@endforeach
<tr>
    <td></td>
    <td><button class="btn btn-danger">SUBMIT</button></td>
</tr>


</table>

</form>






</div>
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
</div>
</div>


@endsection