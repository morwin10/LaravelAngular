@extends('cms.master')

@section('cms_content')
<h4>DELETE this categories ?</h4>
<form method="post" action="{{ url('cms/categories/' . $id) }}">
    
    {!! csrf_field() !!}
    {!! method_field('DELETE') !!}
    <div class="form-group">
    <div class="row">
      <div class="col-sm-6">

        <br><br><input type="submit" class="btn btn-success" name="submit" value="Delete" >
        <a href="{{ url('cms/categories/') }}" class="btn btn-danger" >Cancel</a>
        
      </div>
    </div>
  </div>
</form>

@endsection