<?php namespace App\Helpers;

use Illuminate\Database\Eloquent\Model;

class General extends Model
{
  static public function make_url($str){
    $str = trim($str);
    $str = strtolower($str);
    return $str = str_replace(' ', '-', $str);
    
  }
  
  static public function set_active_style(){
    
    if ($menu['url'] == Request::segment(1) || $menu['url'] == '/' ){
        return 'active';
    }
    
    
  }
}
