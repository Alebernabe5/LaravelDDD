<?php

use Illuminate\Support\Facades\Route;
use Src\admin\user\infrastructure\controllers\CreateUserPOSTController;
use Src\admin\user\infrastructure\controllers\GetUserByIdGETController;


Route::get('/{id}', [CreateUserPOSTController::class, 'index']);
Route::post('/store', [CreateUserPOSTController::class, 'index']);
