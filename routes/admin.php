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
		Route::get('/', 'QceController@addFormView');
		Route::post('/addnew', 'QceController@addNew');

		Route::group(['prefix' => 'category'], function(){
			Route::get('/', 'QceController@qceCategoryView');

			Route::post('/crud', 'QceController@modifyCategoryResource');

			Route::group(['prefix' => 'question'], function(){
				Route::get('/', 'QceController@qceCategoryQuestionView');
				Route::post('/crud', 'QceController@modifyCategoryQuestionResource');
			});
		});
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

	Route::post('/logout', 'LogoutController@logout');
});