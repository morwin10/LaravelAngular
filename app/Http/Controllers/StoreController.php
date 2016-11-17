<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categorie;
use App\Product;
use App\Store;
use App\Order;
use Input;
use Cart;
use Session;

class StoreController extends BaseController {
  // my
//  public function __construct() {
//    parent::__construct();
//    $this->middleware('store', ['only' => 'order']);
//  }

    public function getIndex(){
        Categorie::getCategories(self::$data);
        return view('master_1', self::$data);
    }
  
    public function products($categorie){
        Product::getProducts($categorie, self::$data);
        return view('master_1', self::$data);
    }
//
//  public function item($categorie, $product){
//    Product::get_item($product, self::$data);
//    return view('content.item', self::$data);
//  }
//
//  public function add_to_cart(){
//    Store::cart_add( Input::get('id') );
//  }
//
//  public function checkout(){
//      self::$data['cartCollection'] = Cart::getContent();
//      self::$data['title'] = 'Checkout page';
//      return view('content.checkout', self::$data);
//  }
//
//  public function update_cart(){
//      Store::update_cart(Input::all());
//  }
//  public function clear_cart(){
//      Cart::clear();
//      return redirect('store/checkout');
//  }
//  public function order(){
//      if(! Session::has('user_id')){
//        return redirect('user/login?ds=store/order');
//      } else {
//        Order::saveOrder();
//        return redirect('store');
//      }
//  }
}
