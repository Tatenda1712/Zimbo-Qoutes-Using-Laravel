<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QoutesController;
use App\Http\Controllers\AuthController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
//get all Qoutes
Route::get('qoutes' , [QoutesController::class,'getQoutes']);

//get specfic qoutes
Route::get('qoute/{id}' , [QoutesController::class,'getQouteById']);

// login users 
Route::post('login' , [AuthController::class,'login']);

//register users
Route::post('register' , [AuthController::class,'register']);

//delete qoutes
Route::delete('deleteqoute/{id}' , [QoutesController::class,'deleteQoute']);

//update qoutes
Route::put('updateqoute/{id}' , [QoutesController::class,'updateQoute']);

//add qoutes
Route::post('addqoute' , [QoutesController::class,'addQoute']);

//like qoute
Route::post('likeqoute/{id}' , [QoutesController::class,'addLike']);

//unlike qoute
Route::post('unlikeqoute/{id}' , [QoutesController::class,'substractLike']);
