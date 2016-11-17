
@extends('master')

@section('content')

<div class="row">
  <div class="col-md-4">
      <h2>Sign up for new Account</h2>
      <form action="{{url('user/signup')}}" method="post">
          {!! csrf_field() !!}
        <div class="form-group">
          <label for="name">Name :</label>
          <input type="text" value="{{Input::old('name')}}" class="form-control" name="name" placeholder="Name">
        </div>
          
        <div class="form-group">
          <label for="email">Email Address :</label>
          <input type="text" value="{{Input::old('email')}}" class="form-control" name="email" placeholder="Email">
        </div>
          
        <div class="form-group">
          <label for="password">Password :</label>
          <input type="password" class="form-control" name="password" placeholder="Password">
        </div>
          
        <div class="form-group">
          <label for="password">Confirm Password :</label>
          <input type="password" class="form-control" name="re_password" placeholder="Confirm Password">
        </div>
          
          <input type="submit" class="btn btn-primary" name="submit" value="Sign up">&nbsp
          
          
      </form>
      
    </div>

</div>
    
@endsection