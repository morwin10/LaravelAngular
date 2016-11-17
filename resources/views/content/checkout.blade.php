
@extends('master')

@section('content')
<div class="col-md-6">
    <h3>Checout</h3> <br/>
    @if($items = $cartCollection->toArray())
   
    <table class="table">
        <th>Item</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Sub total</th>
        
        @foreach($items as $row)
        <tr>
            <td>{{ $row['name'] }}</td>
            <td>
            <input type="button" size="1" value="-" class="apdate-cart-btn" data-op="minus" data-id="{{$row['id']}}">
            <input type="text" class="text-center" size="1" value="{{ $row['quantity'] }}" >
            <input type="button" size="1" value="+" class="apdate-cart-btn" data-op="plus" data-id="{{$row['id']}}">
            </td>
            <td>{{ $row['price'] }}</td>
            <td>{{ $row['quantity'] * $row['price'] }}</td>
        </tr>
        @endforeach
        <tr>
            <td>Total in the Cart : <b>{{ Cart::getTotal() }}</b></td>
        </tr>
        <tr>
            <td><a class="btn btn-primary" href="{{url('store/order')}}">Order Now</a></td>
            <td><a class="btn btn-default" href="{{url('store/clear_cart')}}">Claer Cart</a></td>
        </tr>
    </table>
    @else
    <p><i>no item in the cart...</i></p>
    @endif
</div>
@endsection
