<?php

use App\Http\Controllers\MateriController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('/materi',[MateriController::class,'index']);
Route::get('/materi/{id}',[MateriController::class,'show']);
Route::post('/materi',[MateriController::class,'store']);
Route::get('/materi/del/{id}',[MateriController::class,'destroy']);
Route::get('/materi/edit/{id}',[MateriController::class,'update']);

