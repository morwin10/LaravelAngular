@extends('cms.master')

@section('cms_content')

<h4 class="text-primary">Here you can Add Categorie :</h4> <br>

<form method="post" action="{{ url('cms/categories') }}" enctype="multipart/form-data">
    {!! csrf_field() !!}
  <div class="form-group">
    <div class="row">
      <div class="col-sm-6">
        <label for="title">Title:</label>
        <input name="title" type="title" class="form-control" id="inputEmail3" placeholder="Categorie Title">
         <br>
        <label for="article">Article:</label> 
        <textarea name="article" class="form-control" rows="6">{{ Input::old('article') }}</textarea>
        <br><label for="file">Image :</label>
            <span class="btn btn-default btn-file">
              <input type="file" name="file">
            </span>
        <br><br><input type="submit" class="btn btn-success" name="submit" value="Add Now !" > 
      </div>
    </div>
  </div>
</form>
 

@endsection