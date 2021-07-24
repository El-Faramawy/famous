<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

// Route::group(
// [
// 	'prefix' => LaravelLocalization::setLocale(),
// 	'middleware' => [ 'localeSessionRedirect', 'localizationRedirect', 'localeViewPath' ]
// ], function(){
//



Route::group(['prefix' => 'admin'], function () {

//    Config::set('auth.defines', 'admin');
    //app()->setLocale('ar');

    Route::get('login',function (){
        if (Auth::guard('admin')->check()){
        return redirect('admin/home');
    }
            return view('Admin/auth/login');
});
    Route::post('do-log','AuthController@login')->name('do-log');
    /**
     *
     *
     * Auth System of Driver
     *
     *
     */

    /*  Route::post('login', 'DriverAuthController@doLogin')->name('driveLoginAction');
      Route::get('forgot/password', 'DriverAuthController@forgot_password')->name('driveForgetPasswordView');
      Route::post('forgot/password', 'DriverAuthController@forgot_password_post')->name('driveForgetPasswordAction');
      Route::get('reset/password/{token}', 'DriverAuthController@reset_password')->name('driveResetPasswordView');
      Route::post('reset/password/{token}', 'DriverAuthController@reset_password_final')->name('driveResetPasswordAction');*/



    //******* after login *******
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::get('log-out','AuthController@logout')->name('log-out');

        Route::get('/',function (){
            return redirect('admin/home');
        })->name('/');
        Route::get('home',function (){return view('Admin/home');})->name('home');

//        ======================================== Admin ====================================
        Route::get('show-admins','AdminController@get')->name('show-admins');
        Route::get('add-admin',function (){return view('Admin/Admin/create');})->name('add-admin');
        Route::post('store.admin','AdminController@store_admin')->name('store.admin');
        Route::post('admin_delete','AdminController@admin_delete')->name('admin_delete');
        Route::post('admin_edit','AdminController@admin_edit')->name('admin_edit');
        Route::post('admin_check.delete','AdminController@admin_check_delete')->name('admin_check.delete');
        Route::post('store.admin_update','AdminController@store_admin_update')->name('store.admin_update');

        Route::get('my_profile','AdminController@my_profile')->name('my_profile');
        Route::post('store-profile','AdminController@save_profile')->name('store-profile');


//        //        ============================  packages  ==========================================================
//        Route::get('/packages/{id}','Package_Controller@index')->name('packages');
//        Route::post('/add_package','Package_Controller@add_package')->name('add_package');
//        Route::post('/edit_package/{id}','Package_Controller@edit_package')->name('edit_package');
//        Route::post('/delete_package','Package_Controller@delete_package')->name('delete_package');
//        Route::post('/multi_delete_package','Package_Controller@multi_delete_package')->name('multi_delete_package');
//
//        //        ============================  languages  ==========================================================
//        Route::get('/languages','Language_Controller@index')->name('languages');
//        Route::post('/add_language','Language_Controller@add_language')->name('add_language');
//        Route::post('/edit_language/{id}','Language_Controller@edit_language')->name('edit_language');
//        Route::post('/delete_language','Language_Controller@delete_language')->name('delete_language');
//        Route::post('/multi_delete_language','Language_Controller@multi_delete_language')->name('multi_delete_language');
//
//        //        ============================  platforms  ==========================================================
//        Route::get('/platforms','Platform_Controller@index')->name('platforms');
//        Route::post('/add_platform','Platform_Controller@add_platform')->name('add_platform');
//        Route::post('/edit_platform/{id}','Platform_Controller@edit_platform')->name('edit_platform');
//        Route::post('/delete_platform','Platform_Controller@delete_platform')->name('delete_platform');
//        Route::post('/multi_delete_platform','Platform_Controller@multi_delete_platform')->name('multi_delete_platform');
//
//        //        ============================  game_types  ==========================================================
//        Route::get('/game_types','Game_type_Controller@index')->name('game_types');
//        Route::post('/add_game_type','Game_type_Controller@add_game_type')->name('add_game_type');
//        Route::post('/edit_game_type/{id}','Game_type_Controller@edit_game_type')->name('edit_game_type');
//        Route::post('/delete_game_type','Game_type_Controller@delete_game_type')->name('delete_game_type');
//        Route::post('/multi_delete_game_type','Game_type_Controller@multi_delete_game_type')->name('multi_delete_game_type');
//
//        //        ============================  areas  ==========================================================
//        Route::get('/areas','Area_Controller@index')->name('areas');
//        Route::post('/add_area','Area_Controller@add_area')->name('add_area');
//        Route::post('/edit_area/{id}','Area_Controller@edit_area')->name('edit_area');
//        Route::post('/delete_area','Area_Controller@delete_area')->name('delete_area');
//        Route::post('/multi_delete_area','Area_Controller@multi_delete_area')->name('multi_delete_area');
//
//        //        ========================================= slider ===============================
//        Route::get('slider','Slider_Controller@index')->name('slider');
//        Route::post('add_slider','Slider_Controller@add_slider')->name('add_slider');
//        Route::post('delete_image','Slider_Controller@delete_image')->name('delete_image');
//        Route::post('edit_image/{id}','Slider_Controller@edit_image')->name('edit_image');
//        Route::post('multi_delete_image','Slider_Controller@multi_delete_image')->name('multi_delete_image');


    });//end Middleware Admin


});//end Prefix
