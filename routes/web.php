<?php

use Illuminate\Support\Facades\Route;

Auth::routes();

Route::get('/', 'HomeController@index')->name('index');

Route::get('profile/view', 'HomeController@viewprofile')->name('profile.view');
Route::post('profile/save', 'HomeController@saveprofile')->name('profile.save');


Route::get('contact/view', 'HomeController@viewcontact')->name('contact.view');
Route::post('contact/save', 'HomeController@savecontact')->name('contact.save');


Route::get('addresses/list', 'HomeController@listaddresses')->name('addresses.list');
Route::get('addresses/view', 'HomeController@viewaddresses')->name('addresses.view');
Route::post('addresses/save', 'HomeController@saveaddresses')->name('addresses.save');


Route::get('shipments/', 'HomeController@shipments')->name('shipments');
Route::get('deliveries/', 'HomeController@deliveries')->name('deliveries');
Route::get('reviews/', 'HomeController@reviews')->name('reviews');