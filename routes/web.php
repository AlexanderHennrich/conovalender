<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AktuellController;
use App\Http\Controllers\AnswerController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\QuestionController;
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
// Landing
Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

//Auth
Auth::routes();

//Aktuelle Seite + Antworten
Route::get('/aktuell',[AktuellController::class,'index']);
Route::post('/answer',[AnswerController::class,'store']);
Route::patch('/answer/{answer}',[AnswerController::class,'update']);


// Adminbereich
Route::get('/admin',[AdminController::class,'index']);
// Questions
Route::resource('question',QuestionController::class);
// User
Route::resource('user',UserController::class);

//Comments
Route::post('/comments',[CommentController::class,'store']);
