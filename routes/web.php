<?php

use Illuminate\Support\Facades\Route;

Auth::routes();
Route::get('/', 
            [App\Http\Controllers\HomeController::class, 'index']) 
            ->name('index');

Route::get('/home', 
            [App\Http\Controllers\HomeController::class, 'home'])
            ->name('home');

Route::match(['get', 'post'], 
            'profile',
            [App\Http\Controllers\HomeController::class, 'profile'])
            ->name('profile');

Route::get('profile/view/', 
            [App\Http\Controllers\ProfileController::class, 'viewprofile'])
            ->name('profile.view');

Route::post('profile/save', 
            [App\Http\Controllers\ProfileController::class, 'saveprofile'])
            ->name('profile.save');
          
Route::get('contact/list',
            [App\Http\Controllers\ContactController::class, 'listcontact'])
            ->name('contact.list');
Route::get('contact/view', 
            [App\Http\Controllers\ContactController::class, 'viewcontact'])
            ->name('contact.view');
Route::post('contact/save', 
            [App\Http\Controllers\ContactController::class, 'savecontact'])
            ->name('contact.save');

Route::get('addresses/list', 
            [App\Http\Controllers\AddressController::class, 'listaddress'])
            ->name('address.list');
Route::get('addresses/view', 
            [App\Http\Controllers\AddressController::class, 'viewaddresses'])
            ->name('addresses.view');
Route::post('addresses/save', 
            [App\Http\Controllers\AddressController::class, 'saveaddresses'])
            ->name('addresses.save');

Route::get('sendmail', 
          [App\Http\Controllers\MailerController::class, 'sendemail'])
          ->name('mailer');


Route::get('shipments/', 'HomeController@shipments')->name('shipments');
Route::get('deliveries/', 'HomeController@deliveries')->name('deliveries');
Route::get('reviews/', 'HomeController@reviews')->name('reviews');