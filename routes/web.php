<?php

use app\Http\HomeController;
use web\Config\Route;

Route::get('/',[HomeController::class,'index']);

Route::get('/home',[HomeController::class,'index']);

