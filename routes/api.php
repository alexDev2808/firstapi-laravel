<?php

use App\Http\Controllers\API\StudentController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', [StudentController::class, 'index']);

Route::get('/students/{id}', [StudentController::class,'show']);

Route::post('/students', [StudentController::class,'store']);

Route::patch('/students/{id}', function() {
    return 'Actualizando estudiante';
});

Route::delete('/students/{id}', function() {
    return 'Eliminando estudiante';
});