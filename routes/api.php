<?php

use App\Http\Controllers\ElectionController;
use App\Http\Controllers\NomineeController;
use App\Http\Controllers\PositionController;
use App\Http\Controllers\ResultsController;
use App\Http\Controllers\VotersController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


Route::prefix("elections")->controller(ElectionController::class)->group(function (){
    Route::get("","index");
    Route::post("","store");
    Route::post("/update", 'update');
    Route::post("{id}/delete", 'destroy');
});

Route::prefix("results")->controller(ResultsController::class)->group(function (){
    Route::get("","index");
});

Route::prefix("nominees")->controller(NomineeController::class)->group(function (){
    Route::get("","index");
    Route::post("","store");
    Route::post("/update", 'update');
    Route::post("{id}/delete", 'destroy');
});

Route::prefix("positions")->controller(PositionController::class)->group(function (){
    Route::get("","index");
    Route::post("","store");
    Route::post("/update", 'update');
    Route::post("{id}/delete", 'destroy');
});

Route::prefix("voters")->controller(VotersController::class)->group(function (){
    Route::get("","index");
    Route::get("/vote","vote");
    Route::post("","store");
    Route::post("/update", 'update');
    Route::post("{id}/delete", 'destroy');
});


Route::post("vote",[ElectionController::class, 'vote']);


