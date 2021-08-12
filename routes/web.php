<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CVController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard',[CVController::class,'dashboard']);
Route::get('/login',[CVController::class,'login']);
Route::get('/register',[CVController::class,'register']);
Route::get('/info_personelle',[CVController::class,'info_personelle']);
Route::get('/experience_pro',[CVController::class,'experience_pro']);
Route::get('/education_formation',[CVController::class,'education_formation']);
