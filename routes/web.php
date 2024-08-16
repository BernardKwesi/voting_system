<?php


use App\Http\Controllers\VotersController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'results'])->name('home');
Route::get('/elections', [App\Http\Controllers\HomeController::class, 'elections'])->name('elections');
Route::get('/nominees', [App\Http\Controllers\HomeController::class, 'nominees'])->name('nominees');
Route::get('/positions', [App\Http\Controllers\HomeController::class, 'positions'])->name('positions');
Route::get('/results', [App\Http\Controllers\HomeController::class, 'results'])->name('results');
Route::get('/voters', [App\Http\Controllers\HomeController::class, 'voters'])->name('voters');
Route::get('/users', [App\Http\Controllers\HomeController::class, 'users'])->name('users');


Route::post("vote", [VotersController::class, 'vote'])->name("vote");
