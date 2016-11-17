
@extends('master')

@section('content')

<div class="row">
    <div class="container"> <br>
    <div class="col-md-12">
        
        <div class="input-group">
          <input type="text" class="form-control" placeholder="Search for...">
          <span class="input-group-btn">
            <button class="btn btn-default" type="button">Go!</button>
          </span>
        </div>
        
    </div> <br>
    @if($categories )
    
    
      @foreach ($categories as $user)
      
      <div class="col-lg-3 col-md-4 col-xs-6 thumb">
        <span class="thumbnail">
          <a href="{{ $user['url'] }}">
              <div class="text-center text-primary text-muted"><b>{{$user['title']}}</b></div> </a>
              <input type="text" class="form-control" placeholder="Search in the {{$user['title']}}" onclick="return false">
              <a href="{{ $user['url'] }}"> <img class="img-responsive" src="http://placehold.it/400x300" alt=""></a>
        </span>
      </div>
      
      @endforeach
    @else
    
    <i>No Categories..</i>
    
    @endif


       
</div>
    
@endsection
