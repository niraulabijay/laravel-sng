<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::group([
    'namespace' => 'API',

], function() {

//    Route::get('user', 'UserController@index');
    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    // Route::get('/brands','BrandController@getBrands');
    // Route::get('/brand/front/{slug}','BrandController@getFrontData');
    // Route::get('/destinations','FrontController@destinations');
    Route::get('/faqs','FrontController@faqs');



    Route::get('/packages','CmsController@packages');
    Route::get('/package/single/{slug}','CmsController@singlePackage');
    Route::get('/video-gallery','CmsController@videoGallery');
    Route::get('/restaurant','CmsController@restaurant');
    Route::get('/teams','CmsController@teams');
    Route::get('/gallery','FrontController@gallery');

    Route::get('/homepage','SiteController@homepage');
    //Booking
    Route::post('/booking','BookingController@search');

    Route::group([
        'middleware' => 'jwt-auth'
    ], function (){
        Route::post('get-user-by-token', 'AuthController@getUserByToken');
        Route::post('refresh', 'AuthController@refresh');
        Route::post('logout', 'AuthController@logout');
        Route::post('user-info', 'AuthController@userInfoStore');
        Route::get('get-userinfo', 'AuthController@getUserInfo');
        Route::post('get-userinfobykey', 'AuthController@getUserInfoByKey');
    });

});
