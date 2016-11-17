<?php namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model{


  static public function get_item($product, &$data){
    
    $data['product'] = null;
    
    if( $product = self::where('url' , '=', $product)->first() ){
      
      $data['product'] = $product->toArray();
      $data['title'] = $data['product']['title'];
      
    }
    
  }

  static public function getProducts($categorie, &$data){
    
      /* API -  id */
    if (is_numeric( $categorie ) ) { 
          echo Categorie::find( $categorie )->products->toJson(); 
          die;
    }

      /* Website | API - name */
    if( $categorie = Categorie::where('href', '=', $categorie)->first() ){ 
        $categorie = $categorie->toArray(); 

      if( $products = Categorie::find( $categorie['id'] )->products ){
          $data['contentPage'] = $products->toJson();
      }

      /** API name echo 
      * @param     if('api'){
      *  echo ; die;
      * }
      */
           
    }

  }
  
}
