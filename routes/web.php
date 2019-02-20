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

Route::get('/', 'frontend\HomepageController@index');
Auth::routes();

Route::get('/home', 'super\ChatController@index')->name('home');

Route::get('/user/activation/{token}', 'Auth\RegisterController@userActivation');

//chat
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
//banner
Route::get('bannerview', 'super\BannerController@index')->name('bannerview');
Route::get('api/banner', 'super\BannerController@databanner')->name('api.banner');

//super route
Route::group(['middleware' => ['admin','auth']], function () {
    //main page
    Route::get('homesuper', 'super\HomeController@index')->name('homesuper');
    Route::get('userview', 'super\UserController@index')->name('userview');
    Route::get('categoryview', 'super\CategoryController@index')->name('categoryview');
    Route::get('postview', 'super\PostController@index')->name('postview');

    Route::resource('/user', 'super\UserController');
    Route::resource('/adddosen', 'super\AdddosenController');
    Route::resource('/post', 'super\PostController');
    Route::resource('/category', 'super\CategoryController');

    Route::resource('/banner', 'super\BannerController');
    Route::get('api/banner', 'super\BannerController@databanner')->name('api.banner');

    Route::get('edituser/{id}', 'super\HomeController@edituser')->name('edituser');
    Route::PUT('updateuser/{id}', 'super\HomeController@updateuser')->name('updateuser');
    //api
    Route::get('api/mahasiswa', 'super\UserController@data')->name('api.mahasiswa');
    Route::get('api/category', 'super\CategoryController@data')->name('api.category');
    Route::get('api/adddosen', 'super\AdddosenController@dataadd')->name('api.adddosen');
});

//dosen route
Route::group(['middleware' => ['dosen','auth']], function () {
    //main page
    Route::get('homedosen', 'dosen\HomeController@index')->name('homedosen');
    Route::get('vdosen', 'dosen\HomeController@dosenview')->name('vdosen');
    Route::get('vmahasiswa', 'dosen\HomeController@mahasiswaview')->name('vmahasiswa');
    Route::get('dosenshow/{id}', 'dosen\HomeController@dosenshow');
    Route::get('mahasiswashow/{id}', 'dosen\HomeController@mahasiswashow');

    Route::get('postviewdosen', 'dosen\PostController@index')->name('postviewdosen');
    //resource
    Route::resource('/postdosen', 'dosen\PostController');
    Route::get('editdsn/{id}', 'dosen\HomeController@editdsn')->name('editdsn');
    Route::PUT('updatedsn/{id}', 'dosen\HomeController@updatedsn')->name('updatedsn');

    //api
    Route::get('api/vmahasiswa', 'dosen\HomeController@datamhs')->name('api.vmahasiswa');
    Route::get('api/vdosen', 'dosen\HomeController@datadsn')->name('api.vdosen');
});


Route::group(['middleware' => ['mahasiswa','auth']], function () {
    //main page
    Route::get('homemahasiswa', 'mahasiswa\HomeController@index')->name('homemahasiswa');
    Route::get('dsnv', 'mahasiswa\HomeController@dsnv')->name('dsnv');
    Route::get('mhsv', 'mahasiswa\HomeController@mhsv')->name('mhsv');

    Route::get('postviewmahasiswa', 'mahasiswa\PostController@index')->name('postviewmahasiswa');
    Route::resource('/postmhs', 'mahasiswa\PostController');

    Route::get('dsns/{id}', 'mahasiswa\HomeController@dsns');
    Route::get('mhss/{id}', 'mahasiswa\HomeController@mhss');

    Route::get('editmhs/{id}', 'mahasiswa\HomeController@editmhs')->name('editmhs');
    Route::PUT('updatemhs/{id}', 'mahasiswa\HomeController@updatemhs')->name('updatemhs');
    //api
    Route::get('api/dsnv', 'mahasiswa\HomeController@tabledsn')->name('api.dsnv');
    Route::get('api/mhsv', 'mahasiswa\HomeController@tablemhs')->name('api.mhsv');
});

//frontedn route
Route::group(['namespace' => 'frontend'], function () {
    Route::get('beranda', 'HomepageController@index')->name('beranda');
    Route::get('read/{id}', 'HomepageController@read')->name('read');
    Route::get('readbanner/{id}', 'HomepageController@readbanner')->name('readbanner');
    Route::get('read/category/{id}', 'HomepageController@category')->name('category');
    Route::resource('comment', 'CommentController',['only'=>['update','destroy']]);
    Route::post('comment/create/{berita}', 'CommentController@add')->name('threadcomment.store');
    Route::post('reply/create/{comment}', 'CommentController@addReply')->name('replycomment.store');    
    
});
