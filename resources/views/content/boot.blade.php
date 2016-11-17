
@extends('master_1')

@section('content')

<div class="row">

   <div class="col-md-12">
     <h3> $content['title'] </h3>  
     <p> $content['body'] </p>
   </div>
  
<!--  else-->
  <div class="col-md-12"><i>No contents ..</i></div>

</div>

@endsection

