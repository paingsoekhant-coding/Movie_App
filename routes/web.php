<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MoviesController;

Route::get('/',[MoviesController::class,'home'])->name('movie#home');
Route::get('/movies/{movie}',[MoviesController::class,'detail'])->name('movie#detail');



