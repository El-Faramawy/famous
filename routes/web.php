<?php

use Illuminate\Support\Facades\Route;

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
Route::get('firebase-phone-authentication', 'FirebaseController@index');


Route::get('/', function () {
    return view('Site/index');
});
Route::get('about', function () {
    return view('Site/about');
});
Route::get('all-famous', function () {
    return view('Site/all-famous');
});
//Route::get('code/{id}', 'Site\UserController@code');
Route::get('contact', function () {
    return view('Site/contact');
});

Route::get('profile-edit', function () {
    return view('Site/profile-edit');
});
Route::get('profile-Notifications', function () {
    return view('Site/profile-Notifications');
});
Route::get('profile-orders', function () {
    return view('Site/profile-orders');
});
Route::get('profile-PreviousAds', function () {
    return view('Site/profile-PreviousAds');
});
Route::get('profile-rating', function () {
    return view('Site/profile-rating');
});
Route::get('register-famous', function () {
    return view('Site/register-famous');
});
Route::get('register-famous', function () {
    return view('Site/register-famous');
});
Route::get('terms', function () {
    return view('Site/terms');
});

//Auth::routes();


Route::get('register-user', 'Site\UserController@show_register_user')->name('register-user');
Route::get('register-famous', 'Site\UserController@show_register_famous')->name('register-famous');
Route::post('register_user', 'Site\UserController@register_user')->name('register_user');
Route::get('login','Site\UserController@login');
Route::post('post_login', 'Site\UserController@post_login')->name('post_login');
Route::post('check_phone', 'Site\UserController@check_phone')->name('check_phone');
Route::post('check_phone_login', 'Site\UserController@check_phone_login')->name('check_phone_login');

//===============================================================================================
Route::get('profile/{id}','Site\Profile@index');
//Route::get('confirm_code/{id}', 'Site\UserController@confirm_code')->name('confirm_code');

//Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'user:user'], function () {

});

require __DIR__.'/ali.php';
