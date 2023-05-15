<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

//Route::resource('/user/getAllUsers',UserController::class);
//Route::post('/user/create', [UserController::class, 'create']);
//Route::get('/user/getUser/{id}', [UserController::class, 'getUser']);
//Route::post('user/updateUser/{id}', [UserController::class, 'updateUser']);
//Route::post('system/login', [sysuserController::class,'login']);
