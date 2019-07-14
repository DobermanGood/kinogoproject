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

// FilmController
Route::get('/', 'FilmController@index')->name('films.index');
Route::get('/films/{id}', 'FilmController@show')->name('films.show')->where('id', '[1-9]+');
Route::get('/films/order/{by}/{value}', 'FilmController@order')->name('films.order');//->where(['by' => '[a-z]+', 'value' => '[А-Яа-я1-9]+']);

// ГОЛОСОВАНИЕ
Route::middleware('auth')->post('/films/{id}/vote', 'FilmController@vote')->name('films.vote')->where('id', '[1-9]+');

//CommentController
Route::get('comments/films/{id}', 'CommentController@films')->name('comments.films')->where('id', '[1-9]+');
Route::get('comments/users/{id}', 'CommentController@users')->name('comments.users')->where('id', '[1-9]+');

//GenreController
Route::get('/genres/{id}', 'GenreController@show')->name('genres.show')->where('id', '[1-9]+');

// Профиль
Route::group(['prefix' => 'profile/{name}'], function() {
    Route::get('/', 'ProfileController@show')->name('profile.show')->where('name', '[A-Za-zА-Яа-я]+');
    Route::get('/edit', 'ProfileController@edit')->name('profile.edit')->where('name', '[A-Za-zА-Яа-я]+');
    Route::put('/update', 'ProfileController@update')->name('profile.update')->where('name', '[A-Za-zА-Яа-я]+');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::group(['prefix' => 'admin'], function () {
    Voyager::routes();
});
