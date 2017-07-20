<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware'=>['web']], function(){

	Route::get('/{author?}', [
      'uses'=>'QuoteController@getIndex',
      'as'=>'home'
	]);


    Route::get('/delete/{quote_id}', [
    'uses'=>'QuoteController@deleteBlog',
    'as'=>'delete'	
    ]);



    Route::get('/blog/blog/{id?}',[
      'uses'=>'BlogController@getBlog',
      'as'=>'blog'
      ]);

    Route::get('/message/me',[
        'uses' => 'ContactController@getMessage',
        'as' =>'contact'
    ]);



    Route::post('/newblog', [
       'uses'=>'QuoteController@postQuote',
       'as' =>'create'
    ]);


    Route::post('/update',[
       'uses'=>'QuoteController@updateBlog',
       'as'=>'update'
    ]);

    Route::post('/send/message', [
      'uses'=> 'ContactController@sendMessage',
      'as'=>'sendmessage'
    ]);

     



});

