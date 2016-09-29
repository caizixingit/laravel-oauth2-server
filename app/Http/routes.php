<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/


/** @class Illuminate\Support\Facades\Route Route */
Route::get('/', function () {
    return view('welcome');
});

Route::get('/now', function(){
    return date('Y-m-d');
});

Route::auth();

Route::get('/home', 'HomeController@index');
Route::get('/', 'HomeController@index');

//http://laravel-china.org/docs/5.1/routing#route-groups
Route::group(['middleware' => 'auth', 'namespace' => 'Admin', 'prefix' => 'admin'], function() {
    Route::get('/', 'HomeController@index');
    Route::resource('article', 'ArticleController');
});

Route::group(['namespace' => 'Server', 'prefix' => 'server'], function(){
    Route::get('/authorize', 'AuthorizeController@oAuthorize');
    Route::post('/authorize', 'AuthorizeController@authorizeFormSubmit');
    Route::post('/grant', 'TokenController@token');
    Route::get('/access', 'ResourceController@resource');
});

Route::group(['namespace' => 'Client', 'prefix' => 'client'], function(){
    Route::get('/receive_authcode/{show_refresh_token?}', 'ReceiveAuthorizationCodeController@receiveAuthorizationCode');
    Route::get('/request_token_with_authcode/{code}', 'RequestTokenController@requestTokenWithAuthCode');
    Route::get('/request_token_with_refresh_token/{refresh_token}', 'RequestTokenController@requestTokenWithRefreshToken');
    Route::get('/request_token_with_usercredentials', 'RequestTokenController@requestTokenWithUserCredentials');
    Route::get('/request_resource/{token?}', 'RequestResourceController@requestResource');
    Route::get('/authorize_redirect_implicit', 'ReceiveImplicitTokenController@receiveImplicitToken');
});
