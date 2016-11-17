
@extends('master')

@section('content')

<div class="row">
  
  @if(count($products) > 0)
  
    @foreach($products as $row)
    
    <div class="col-md-6">
      
      <h3>{{ $row['title'] }}</h3>
      <p><img border="0" width="250" src="{{ asset('assets/img/' . $row['image']) }}"></p>
      <p>{!! $row['article'] !!}</p>
      <p><b>Price on site: </b>{{ $row['price'] }}$</p>
      <p>
          <input @if(Cart::get($row['id'])) disabled="disabled" @endif data-id="{{ $row['id'] }}" type="button" class="btn btn-success add-to-cart" value="Add to cart">
        <a href="{{ url('store/' . $categorie . '/' . $row['url']) }}" class="btn btn-default">View details</a>
      </p>
      
    </div>
    
    @endforeach
  
  @else
  
  <div class="col-md-12"><i>No products for this category...</i></div>
  
  @endif
  
</div>


@endsection