@extends("stdtheme")

@section("stdcontent")

<br><br><br>
<form action="/mark" method="post">


<table class="table table-borderless">
{{csrf_field()}}
@foreach($a as $ans)
@foreach($q as $que)
   @if($que->id == $ans->id)

   <tr>
       <td>Q{{$que->id}}</td>
       <th>{{$que->question}}</th>
       <th>{{$ans->ans}}</th>
   </tr>

@endif
@endforeach
@endforeach
<tr>
    <td></td>
    <td></td>
    
    <!-- //<td><button class="btn btn-success">BACK</button></td> -->
</tr>


</table></form>






@endsection