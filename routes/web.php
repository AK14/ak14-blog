<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

Route::get('/','HomeController@index');
Route::get('articles/{articles}','articlesController@show')->name('articles');
Route::get('categories/{categories}','HomeController@categories')->name('categories');

//путь для записи комментария к определенному посту
Route::post('articles/{articles}/comments','articlesController@addComment');

//профиль пользователя
Route::get('profile','UserController@profile')->name('profile');
Route::get('profile/edit','UserController@edit');
Route::post('profile/{user}',['uses'=>'UserController@save', 'as'=>'photo']);

//календарь
Route::get('calendar','HomeController@calendar');
// test calendar
Route::get('t-cal','test@event');


// путь для проверки Vue
Route::get('comments', function(){
    $comments =App\Comments::get();
   return $comments;
});

Route::get('book',function(){
    return view('layouts/comments');
});




Auth::routes();

Route::get('/home', 'HomeController@index');
