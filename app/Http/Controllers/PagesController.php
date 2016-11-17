<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Content;

class PagesController extends BaseController {

    public function boot($page = '/'){
        Content::getContentPage($page, self::$data);
        return view('master_1', self::$data);
    }
  
}
