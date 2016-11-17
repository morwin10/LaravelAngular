@extends('cms.master')

@section('cms_content')
<h4 class="text-primary">Here you can Edit your Categories :</h4> <br>
<p><a href="{{ url('cms/categories/create') }}" class="btn btn-primary">Add new Categorie</a></p>

<table class="table">
  <th>Title</th>
  <th>Operation</th>
  @foreach($categories as $categorie)
  <tr>
      <td>{{ $categorie['title'] }}</td>
      <td>
        <a href="{{ url('cms/categories/' .$categorie['id'] . '/edit') }}">Edit</a> |
        <a href="{{ url('cms/categories/' .$categorie['id'])   }}">Delete</a>
      </td>
  </tr>
  @endforeach
</table>  

@endsection