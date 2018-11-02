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
Route::group(['middleware'=>'auth'], function(){
    Route::get('/user/updateprofile', function () { return view('users/update'); });
    Route::post('/user/update', 'UpdateUser@update_user')->name('update');
    
    Route::resource('mypublications', 'MyPublicationsController')->only([
        'index', 'show', 'destroy', 'edit', 'create'
    ]);

    Route::post('mypublications/insert', 'MyPublicationsController@insert');

    Route::resource('rank/update', 'RankController')->only([
        'update'
    ]);
    Route::post('rank/update', 'RankController@update');
});

Route::resource('/', 'PublicationsController')->only([
    'index', 'show'
]);

Route::post('/', 'PublicationsController@search');

Route::resource('publications', 'PublicationsController')->only([
    'index', 'show'
]);


Route::get('morelike', 'PublicationsController@morelike');
Route::get('moredislike', 'PublicationsController@moredislike');
 //Route::post('publications/store', 'PublicationsController@insert');
/*
Route::get('/', function () {
    //return view('welcome');
    return view('layouts/master');
});
*/
/*
Route::get('/principal', function () {
    //return view('welcome');
    return view('principal');
});
*/

/*
Route::get('/user/create', function () {
    //return view('welcome');
    return view('users/create');
});
*/
/*
Route::get('/publication', function () {
    //return view('welcome');
    return view('publication/create');
});
*/
Auth::routes();

//Route::get('/home', 'HomeController@index')->name('home');


//Route::get('mypublications/{$id}', 'PublicationsController@show');//get publications for user
//Route::get('publications', 'PublicationsController@my_publications');
//Route::get('mypublications', ['uses' => 'PublicationsController@my_publications']);//get publications for user

//Route::get('mypublications/', ['uses' => 'PublicationsController@index']);