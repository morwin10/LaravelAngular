
@extends('master')

@section('content')

<div class="row">
  <div class="col-md-4">
      <h2>Sign in with your account - </h2>
      <form action="{{url('user/singin')}}" method="post">
          @if(!empty($ds)) <input type="hidden" name="ds" value="{{$ds}}"> @endif
          {!! csrf_field() !!}
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="text" value="{{Input::old('email')}}" class="form-control" name="email" placeholder="Email">
        </div>
          
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
          
          <input type="submit" class="btn btn-primary" name="submit" value="Sign in">&nbsp
          <a href="" >Forgot Password ?</a>
          
      </form>
      
    </div>

</div>
    
@endsection