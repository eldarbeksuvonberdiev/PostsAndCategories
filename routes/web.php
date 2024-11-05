<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\OptionController;
use App\Http\Controllers\PollController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\VoteController;
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

Route::post('/option-create/{poll}',[OptionController::class,'store'])->name('option.create');

Route::get('/user-poll',[PollController::class,'user_index'])->name('user.poll.index');

Route::post('/user-poll-submit/{poll}',[VoteController::class,'poll_sumission'])->name('poll.submit');

Route::get('/statistic/{poll}',[OptionController::class,'statistic'])->name('statistic');