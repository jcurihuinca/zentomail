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

Route::group(['middlewareGroups' => ['web']], function () {

	// Route::get('login', 'AuthController@login');

	Route::auth();

	Route::get('/', 'HomeController@index');


});

// ROUTES ONLY GOD
Route::group(['middlewareGroups' => ['web'], 'middleware' => ['god']], function () {

});

// ROUTES ONLY BUSINESS
Route::group(['middlewareGroups' => ['web'], 'middleware' => ['business']], function () {
	// paypal
	Route::get('payment', array(
		'as' => 'payment',
		'uses' => 'PaypalController@postPayment',
		));
	Route::get('payment/status', array(
		'as' => 'payment.status',
		'uses' => 'PaypalController@getPaymentStatus',
		));



	Route::get('business/my-account', 'BusinessController@getMyAccount');
	Route::post('business/my-account', 'BusinessController@postMyAccount');

	Route::get('campaings/edit', 'CampaingsController@edit');
	// Route::post('campaings/upload-image', 'CampaingsController@uploadImage');
	Route::post('images/upload', ['as' => 'upload-post', 'uses' =>'ImageController@postUpload']);
	Route::post('upload/delete', ['as' => 'upload-remove', 'uses' =>'ImageController@deleteUpload']);

});

// ROUTES ONLY AGENT
Route::group(['middlewareGroups' => ['web'], 'middleware' => ['agent']], function () {

});
