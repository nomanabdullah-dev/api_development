<?php

use App\Http\Controllers\Api\ClasseController;
use App\Http\Controllers\Api\SubjectController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::apiResource('classe', ClasseController::class);
Route::apiResource('subject', SubjectController::class);
