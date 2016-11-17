<?php



#Store
Route::get('store/{categorie}', 'StoreController@products');
Route::controller('store', 'StoreController');

# pages



Route::get('store/checkout', 'StoreController@checkout');
Route::get('store/add_to_cart', 'StoreController@add_to_cart');

Route::get('store/update_cart', 'StoreController@update_cart');
Route::get('store/clear_cart', 'StoreController@clear_cart');
Route::get('store/order', 'StoreController@order');

Route::get('store/{categorie}/{product}', 'StoreController@item');

//Route::controller('user', 'UserController');

Route::resource('cms/categories', 'CategoriesController');

#cms
Route::controller('cms', 'CmsController');



        // Route::get('login', 'Auth\AuthController@showLoginForm'); // 
        // Route::get('logout', 'Auth\AuthController@logout');

        // // Registration Routes...
        // Route::get('register', 'Auth\AuthController@showRegistrationForm'); // 
        Route::post('user/register', 'AuthAPI\AuthController@register');
        Route::get('user/register/{email}', 'AuthAPI\AuthController@emailExist');

        // // Password Reset Routes...
        // Route::get('password/reset/{token?}', 'Auth\PasswordController@showResetForm'); //
        // Route::post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
        // Route::post('password/reset', 'Auth\PasswordController@reset');
        



        



 Route::group(['middleware' => 'throttle:30'], function () {

Route::post('user/login', 'AuthAPI\AuthController@login');

       /// Route::controller('user', 'Auth\AuthController');
        Route::get('{page?}','PagesController@boot');
 });


