
@extends('master')

@section('content')

<div class="row">
  
  <div class="col-md-12">
    
    @if($product)
    
      <h3>{{ $product['title'] }}</h3>
      <p><img border="0" width="250" src="{{ asset('assets/img/' . $product['image']) }}"></p>
      <p>{!! $product['article'] !!}</p>
      <p><b>Price on site: </b>{{ $product['price'] }}$</p>
      <p>
        <input @if( Cart::get($product['id']) ) disabled="disabled"  @endif data-id="{{ $product['id'] }}" type="button" class="btn btn-success add-to-cart" value="Add to cart">
        <a href="{{ url('store/checkout')}}" class="btn btn-primary">Checkout</a>
      </p>
    
    @else
    
    <p> <i>No product...</i> </p>
    
    @endif
    
  </div>
  
</div>

@endsection
