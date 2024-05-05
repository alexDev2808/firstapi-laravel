<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/students', function() {
    return 'Students list';
});

Route::get('/students/{id}', function() {
    return 'Obteniendo estudiante';
});

Route::post('/students', function() {
    return 'Creando estudiantes';
});

Route::patch('/students/{id}', function() {
    return 'Actualizando estudiante';
});

Route::delete('/students/{id}', function() {
    return 'Eliminando estudiante';
});