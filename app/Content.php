<?php namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App;
class Content extends Model
{

  static public function getContentPage($page ,&$data) {

      $data['contentPage'] = self::where('menu_url', $page )->first()->toJson();

          if ( \Request::input('angular') ) {
              echo $data['contentPage']; die;
          }
      }

}