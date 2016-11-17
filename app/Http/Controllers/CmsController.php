<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categorie;
class CmsController extends BaseController
{
  public function getDashboard(){
    return view('cms.dashboard');
  }

}
