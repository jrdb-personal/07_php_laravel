<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;



Route::resource('items', ItemController::class);