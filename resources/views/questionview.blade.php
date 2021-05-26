@extends("factheme")

@section("faccontent")
<div class="contanier">
<div class="row">

<div class="col col col-12 col-sm-9 col-lg-9 col-lg-9">
<br><br>
<form action="/viewquestion" method="post">
{{ csrf_field() }}
<table class="table table-dark table-striped">
<tr>
    <th>id</th>
    <th>Question</th>
    <th>Option 1</th>
    <th>Option 2</th>
    <th>Option 3</th>
    <th>Option 2</th>
    <th>Answer</th>
    <th>          </th>
    <th>     </th>
    <th></th>
</tr>
@foreach($a as $ans)
@foreach($q as $que)
   @if($que->id == $ans->id)
<tr>
    <td>{{ $que->id}}</td>
    <td>{{ $que->question    }}</td>
    <td>{{ $ans->op1  }}</td>
    <td>{{ $ans->op2 }}</td>
    <td>{{ $ans->op3 }}</td>
    <td>{{ $ans->op4 }}</td>
    <td>{{ $ans->ans }}</td>
    <td><a class="btn btn-warning" href="/editview/{{$que->id}}">EDIT</a></td>
    <td><a href="/deleteview/{{$que->id}}" class="btn btn-danger">DELETE</a></td>
  <td> </td>
</tr>
@endif
@endforeach
@endforeach
</table>

</form>


</div>
<div class="col col col-12 col-sm-3 col-lg-3 col-xl-3">
<br><br>

<div class="card" style="width: 18rem;">
  <img src="data:image/jpeg;base64,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" class="card-img-top" alt="...">
  <div class="card-body">
    <h5 class="card-title">Add Question Wisely</h5>
    <p class="card-text">A sentence in an interrogative form, addressed to someone in order to get information in reply.A good question is framed in a clear, easily understandable language, without any vagueness. Students should understand what is wanted from the question even when they don't know the answer to it. ... ', the same question becomes clear and specific.</p>
  </div>
</div>


</div>
</div>
</div>




@endsection