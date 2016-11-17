<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
  static public function saveOrder(){
    $cartCollection = \Cart::getContent();
    
    $order = new self();
    $order->user_id = \Session::get('user_id');
    $order->data = $cartCollection->toJson();
    $order->save();
    \Cart::clear();
    \Session::flash('sm', 'Your order has been saved !');
  }
}
