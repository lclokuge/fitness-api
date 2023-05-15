<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\UserActivitiesController;
use App\Http\Controllers\sysuserController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/user/getAllUsers', [UserController::class, 'getAllUsers']);
Route::post('/user/create', [UserController::class, 'create']);
Route::get('/user/getUser/{id}', [UserController::class, 'getUser']);
Route::post('user/updateUser/{id}', [UserController::class, 'updateUser']);
//Route::get('/user/getAllUsers', 'UserController@getAllUsers');

Route::post('user/deleteUser/{id}', [UserController::class,'deleteUser']);

Route::get('activity/getAllUserActivities', [UserActivitiesController::class,'getAllUserActivities']);
Route::post('activity/create', [UserActivitiesController::class,'create']);
Route::get('activity/getActivitiesByid/{id}', [UserActivitiesController::class,'getActivitiesByid']);

Route::post('activity/updateUserActivity/{id}', [UserActivitiesController::class, 'updateUserActivity']);
Route::post('activity/deleteUserActivity/{id}', [UserActivitiesController::class,'deleteUserActivity']);
Route::post('system/login', [sysuserController::class,'login']);