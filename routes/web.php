<?php

use App\Http\Controllers\JobController;
use App\Http\Controllers\RegisteredUserController;
use App\Http\Controllers\SalaryController;
use App\Http\Controllers\SearchController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\TagController;
use Illuminate\Support\Facades\Route;


//HOME
Route::get('/', [JobController::class, 'index']);
Route::get('/salary', [SalaryController::class, 'index']);
Route::view('/career', 'careers');
Route::view('/company', 'company');



Route::middleware('guest')->group(
    function () {
        Route::get('/register', [RegisteredUserController::class, 'create']);
        Route::post('/register', [RegisteredUserController::class, 'store']);

        Route::get('/login', [SessionController::class, 'create']);
        Route::post('/login', [SessionController::class, 'store']);
    }
);


//MiddleWare -> Login
Route::delete('/logout', [SessionController::class, 'destroy'])->middleware('auth');
Route::post('/job', [JobController::class, 'store'])->middleware('auth');
Route::get('/job/create', [JobController::class, 'create'])->middleware('auth');



//Searches
Route::get('/search', SearchController::class);
Route::get('/tag/{tag:name}', TagController::class);
