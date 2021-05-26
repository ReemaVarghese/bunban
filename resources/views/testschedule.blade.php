@extends("factheme")


@section("faccontent")
<div class="container">
<div class="row">
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3"></div>
<div class="col col-12 col-sm-6 col-lg-6 col-xl-6">

<br><br>
<form action="/addschedule1" method="post">
{{csrf_field()}}
<tabel class="table table-borderless">
<tr>
    <td>Quiz name</td>
    <td> <input type="text" class="form-control" name="quiz_name"> 
    <span style="color:red" >@error('quiz_name') {{$message}} @enderror</span>
    </td><br>
</tr>
<tr>
    <td>Schedule</td>
    <td><input type="date" class="form-control" name="schedule_date"> 
    <span style="color:red" >@error('schedule_date') {{$message}} @enderror</span>
    </td><br>
</tr>
<tr>
    <td></td>
    <td><button class="btn btn-success">ADD</button></td>
</tr>




</tabel>


</form>








</div>
<div class="col col-12 col-sm-3 col-lg-3 col-xl-3">




</div></div></div>



@endsection