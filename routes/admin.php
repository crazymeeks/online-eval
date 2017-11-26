<?php

Route::group(['prefix' => 'admin', 'namespace' => 'Admin'], function(){

	/*
	 |------------------------------------------
	 | Admin home page
	 |------------------------------------------
	 */
	Route::get('/', 'HomeController@indexView');


	/*
	 |------------------------------------------
	 | QCE
	 |------------------------------------------
	 */
	Route::group(['prefix' => 'qce'], function(){
		Route::get('/research', 'QceController@researchView');
	});

	/*
	 |------------------------------------------
	 | Admin Login
	 |------------------------------------------
	 */
	Route::group(['prefix' => 'login'], function(){
		Route::get('/', 'LoginController@loginView');
		Route::post('/post-login', 'LoginController@postAuthenticate');
	});
});