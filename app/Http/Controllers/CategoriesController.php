<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CMSNewCategorie;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Categorie;

class CategoriesController extends BaseController
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
      self::$data['categories'] = Categorie::all();
      return view('cms.categories', self::$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return view('cms.create_categorie');
    }

    public function store(CMSNewCategorie $request)
    {
      Categorie::addCategorie($request);
      return redirect('store');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id)
    {   
        self::$data['id'] = $id;
        return view('cms.delete_categorie',  self::$data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id)
    {
        
        return view('cms.edit_categorie', self::$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request  $request
     * @param  int  $id
     * @return Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id)
    {
      Categorie::destroy($id);
      \Session::flash('sm', 'the Categorie has been delete');
      return redirect('cms/categories');
    }
}
