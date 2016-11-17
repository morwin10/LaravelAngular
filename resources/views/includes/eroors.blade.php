@foreach($errors->all() as $error)

<div class="container eroor">
  <div class="col-md-4 alert alert-danger">
    <ul><li>{{$error}}</li></ul>
  </div>
</div>      
        
@endforeach
