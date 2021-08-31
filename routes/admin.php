<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;




Route::group(['prefix' => 'admin'], function () {
    Route::get('login', function () {
        if (Auth::guard('admin')->check()) {
            return redirect('admin/home');
        }
        return view('Admin/auth/login');
    });
    Route::post('do-log', 'AuthController@login')->name('do-log');


    //******* after login *******
    Route::group(['middleware' => 'admin:admin'], function () {

        Route::get('log-out', 'AuthController@logout')->name('log-out');

        Route::get('/', function () {
            return redirect('admin/home');
        })->name('/');
        Route::get('home', 'HomeController@index')->name('home');
        Route::post('design_delete', 'HomeController@design_delete')->name('design_delete');


        ###################### Admin ##########################
        Route::get('show-admins','AdminController@get')->name('show-admins');
        Route::get('add-admin',function (){return view('Admin/Admin/create');})->name('add-admin');
        Route::post('store.admin','AdminController@store_admin')->name('store.admin');
        Route::post('admin_delete','AdminController@admin_delete')->name('admin_delete');
        Route::post('admin_edit/{id}','AdminController@admin_edit')->name('admin_edit');
        Route::post('admin_check.delete','AdminController@admin_check_delete')->name('admin_check.delete');
        Route::post('store.admin_update','AdminController@store_admin_update')->name('store.admin_update');
        Route::get('my_profile','AdminController@my_profile')->name('my_profile');
        Route::post('store-profile','AdminController@save_profile')->name('store-profile');


        ###################### Famous ##########################
        Route::get('famous', [\App\Http\Controllers\Admin\FamousController::class, 'index'])->name('famous');
        Route::post('edit_famous', [\App\Http\Controllers\Admin\FamousController::class, 'update'])->name('edit_famous');
        Route::post('delete_one_famous', [\App\Http\Controllers\Admin\FamousController::class, 'delete_one'])->name('delete_one_famous');
        Route::post('delete_all_famous', [\App\Http\Controllers\Admin\FamousController::class, 'delete_all'])->name('delete_all_famous');
        ## VIP famous ##
        Route::get('VIPFamous', [\App\Http\Controllers\Admin\FamousController::class, 'VIP'])->name('VIPFamous');
        Route::post('deactivate_one_famous', [\App\Http\Controllers\Admin\FamousController::class, 'deactivate_one_famous'])->name('deactivate_one_famous');
        Route::post('deactivate_all_famous', [\App\Http\Controllers\Admin\FamousController::class, 'deactivate_all_famous'])->name('deactivate_all_famous');
        ## new famous ##
        Route::get('newFamous', [\App\Http\Controllers\Admin\FamousController::class, 'newFamous'])->name('newFamous');
        Route::post('allow_all_famous', [\App\Http\Controllers\Admin\FamousController::class, 'allow_all_famous'])->name('allow_all_famous');
        Route::post('accept_one_famous', [\App\Http\Controllers\Admin\FamousController::class, 'accept_one_famous'])->name('accept_one_famous');

        ## package ##
        Route::post('remove_package', [\App\Http\Controllers\Admin\FamousController::class, 'remove_package'])->name('remove_package');



        ###################### Clients ##########################
        Route::get('clients', [\App\Http\Controllers\Admin\ClientController::class, 'index'])->name('clients');
        Route::post('delete_one_client', [\App\Http\Controllers\Admin\ClientController::class, 'delete_one'])->name('delete_one_client');
        Route::post('delete_all_clients', [\App\Http\Controllers\Admin\ClientController::class, 'delete_all'])->name('delete_all_clients');

        ###################### Jobs ##########################
        Route::get('jobs', [\App\Http\Controllers\Admin\JobsClient::class, 'index'])->name('jobs');
        Route::post('add_job', [\App\Http\Controllers\Admin\JobsClient::class, 'create'])->name('add_job');
        Route::post('update_job', [\App\Http\Controllers\Admin\JobsClient::class, 'update'])->name('update_job');
        Route::post('delete_job', [\App\Http\Controllers\Admin\JobsClient::class, 'delete_one'])->name('delete_job');


        ###################### Sliders ##########################
        Route::get('slider',[\App\Http\Controllers\Admin\SliderController::class,'index'])->name('sliders');
        Route::post('create_slider',[\App\Http\Controllers\Admin\SliderController::class,'create'])->name('create_slider');
        Route::post('update_slider',[\App\Http\Controllers\Admin\SliderController::class,'update'])->name('update_slider');
        Route::post('delete_one_slider',[\App\Http\Controllers\Admin\SliderController::class,'delete_one'])->name('delete_slider');
        Route::post('delete_all_sliders',[\App\Http\Controllers\Admin\SliderController::class,'delete_all'])->name('delete_all_sliders');


        ###################### Sliders ##########################
        Route::get('info',[\App\Http\Controllers\Admin\InfoController::class,'index'])->name('info');
        Route::post('edit_info',[\App\Http\Controllers\Admin\InfoController::class,'update'])->name('edit_info');

        ###################### About ##########################
        Route::get('about_us',[\App\Http\Controllers\Admin\AboutController::class,'index'])->name('about_us');
        Route::post('create_about',[\App\Http\Controllers\Admin\AboutController::class,'create'])->name('create_about');
        Route::post('update_about',[\App\Http\Controllers\Admin\AboutController::class,'update'])->name('update_about');
        Route::post('delete_one_about',[\App\Http\Controllers\Admin\AboutController::class,'delete_one'])->name('delete_about');
        Route::post('delete_all_about',[\App\Http\Controllers\Admin\AboutController::class,'delete_all'])->name('delete_all_abouts');


        ###################### Rating ##########################
        Route::get('rates',[\App\Http\Controllers\Admin\RateController::class,'index'])->name('rates');
        Route::post('delete_rate',[\App\Http\Controllers\Admin\RateController::class,'delete'])->name('delete_rate');


        ###################### counter ##########################
        Route::get('counter',[\App\Http\Controllers\Admin\CounterController::class,'index'])->name('counter');
        Route::get('add_counter',[\App\Http\Controllers\Admin\CounterController::class,'add'])->name('add_counter');
        Route::post('create_counter',[\App\Http\Controllers\Admin\CounterController::class,'create'])->name('create_counter');
        Route::post('delete_one_counter',[\App\Http\Controllers\Admin\CounterController::class,'delete_one'])->name('delete_one_counter');
        Route::post('delete_all_counter',[\App\Http\Controllers\Admin\CounterController::class,'delete_all'])->name('delete_all_counter');
        Route::post('update_counter',[\App\Http\Controllers\Admin\CounterController::class,'update'])->name('update_counter');

        ###################### offers ##########################
        Route::get('offers',[\App\Http\Controllers\Admin\OfferController::class,'index'])->name('offers');
        Route::post('delete_all_offers',[\App\Http\Controllers\Admin\OfferController::class,'delete_all'])->name('delete_all_offers');
        Route::post('delete_one_offers',[\App\Http\Controllers\Admin\OfferController::class,'delete_one'])->name('delete_one_offers');

        ###################### packages ##########################
        Route::get('packages',[\App\Http\Controllers\Admin\packageController::class,'index'])->name('packages');

        ###################### ADS ##########################
        Route::get('ADS',[\App\Http\Controllers\Admin\AdsController::class,'index'])->name('ADS');
        Route::get('Previous-ads',[\App\Http\Controllers\Admin\AdsController::class,'previous'])->name('Previous-ads');



    });





});//end Prefix
