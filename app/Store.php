<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use Cart;
use Session;

class Store extends Model {
  
  static public function cart_add($id){
      
      if( ! Cart::get($id) ){
          
          if($prodact = Product::find($id)){
          $prodact = $prodact->toArray();
          Cart::add($prodact['id'], $prodact['title'], $prodact['price'], 1, []);
          Session::flash('sm',$prodact['title']. 'Addad to Cart');
          }
      }
  }
  static public function update_cart($get){      
      if(!empty($get['id']) && !empty($get['op']) && $cart =  Cart::get($get['id'])){
          if($get['op'] == 'plus'){
              Cart::update($get['id'], ['quantity' => 1]);
          }elseif ($get['op'] == 'minus') {
              if($cart['quantity'] -1 == 0){
                  Cart::remove($get['id']);
              }else{
                Cart::update($get['id'], ['quantity' => -1]);  
              }
                
            }
      }
  }
  
}
