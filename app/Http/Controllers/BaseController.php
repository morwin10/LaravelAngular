<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Menu;
class BaseController extends Controller
{
  static public $data = ['title' => 'Laravel']; 
  
  function __construct() {    
    self::$data['main_menu'] = (! \Request::input('angular')) ? Menu::all()->toJson() : null;
  }

  
}
