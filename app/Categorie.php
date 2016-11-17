<?php namespace App;

use Input;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model {

  // Relationship to products ( getProducts )
  public function products()
  {
    return $this->hasMany('App\Product');
  }

  static public function getCategories(&$data){

    $data['contentPage'] = self::all()->toJson();

    if( \Request::input('angular') ) {

      echo $data['contentPage']; die;

    }
  }




  static public function addCategorie($request){
    $file_name = '';
    if(Input::hasFile('file') && Input::file('file')->isValid()){
      $file = Input::file('file');
      $file_name = str_random(23) . '.' . $file->getClientOriginalExtension();
      $file->move(public_path('assets\img'), $file_name);
    }
    $categorie = new self();
    $categorie->title = $request['title'];
    $categorie->article = $request['article'];
    $categorie->url = General::make_url($request['title']);
    $categorie->image = !empty($file_name) ? $file_name : 'default.jpg';
    $categorie->save();
    \Session::flash('sm','Saved !');
  }
}
