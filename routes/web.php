<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/',[CategoryController::class,'index']);


Route::get('/post',[PostController::class,'index']);


Route::get('/poll',[PollController::class,'index'])->name('poll.index');
Route::post('/poll-create',[PollController::class,'store'])->name('poll.create');
Route::put('/poll-edit/{poll}',[PollController::class,'update'])->name('poll.edit');
Route::delete('/poll-delete/{poll}',[PollController::class,'destroy'])->name('poll.delete');
