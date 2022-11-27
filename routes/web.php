<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 
            [App\Http\Controllers\HomeController::class, 'index']
          )->name('index');

Route::get('/home', 
            [App\Http\Controllers\HomeController::class, 'home']
          )->name('home');

Route::get('profile/view/', 
            [App\Http\Controllers\HomeController::class, 'viewprofile']
          )->name('profile.view');

Route::post('profile/save', 
            [App\Http\Controllers\HomeController::class, 'saveprofile']
           )->name('profile.save');
          
Route::match(['get', 'post'], 
            'profile',
            [App\Http\Controllers\HomeController::class, 'profile']
            )->name('profile');  

Route::get('contact/view', 'HomeController@viewcontact')->name('contact.view');
Route::post('contact/save', 'HomeController@savecontact')->name('contact.save');

Route::get('addresses/list', 'HomeController@listaddresses')->name('addresses.list');
Route::get('addresses/view', 'HomeController@viewaddresses')->name('addresses.view');
Route::post('addresses/save', 'HomeController@saveaddresses')->name('addresses.save');

Route::get('shipments/', 'HomeController@shipments')->name('shipments');
Route::get('deliveries/', 'HomeController@deliveries')->name('deliveries');
Route::get('reviews/', 'HomeController@reviews')->name('reviews');