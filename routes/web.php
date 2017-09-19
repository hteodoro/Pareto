<?php

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

use Illuminate\Http\Request;


Route::get('/', function() {
    // TODO: Retornar landing page
    return view('landing');
});

/********************************
    AUTH ROUTES
********************************/

Route::get('/login', function() {
    // TODO: Retornar página de login
    return view('login');
})->name('login');

Route::post('/login', 'Auth@login');

Route::get('/register', function() {
    // TODO: Retornar página de registro
    return view('register');
})->name('register');

Route::post('/register', 'Auth@register');

// Store all the info and create user
Route::post('/register/conclude', 'Auth@conclude');

/********************************
    APP ROUTES
********************************/

Route::prefix('/app')->group(function() {

  Route::get('/test', function() {
    // TODO: Retornar página de teste
    return "Test Page";
  })->name('test');

  Route::get('/students', function() {
    // TODO: Retornar página com lista de alunos
    return "Students Page";
  })->name('students');

  Route::get('/teachers', function() {
    // TODO: Retornar página com lista de professores (Especifico para escolas)
    return "Teachers Page";
  })->name('teachers');

  Route::get('/classes', function() {
    // TODO: Retornar página com lista de salas
    return "Classes Page";
  })->name('classes');

});

/********************************
    CLASS OPERATIONS
********************************/

Route::prefix('/app/classes')->group(function() {
  // Create new class
  Route::post('/add', 'Class@store');
  // Update an existent class
  Route::put('/update', 'Class@update');
  // Delete a class
  Route::delete('/delete', 'Class@delete');
});

/********************************
    MAP OPERATIONS
********************************/

Route::prefix('/app/map')->group(function() {

  Route::get('/student/{student_id}', function($student_id){
    // TODO: Retornar Página de Mapa de Desempenho de aluno com parametro 'student_id'
    return "Performance Map For $student_id";
  })->name('student_map');

  Route::get('/class/{class_id}', function($class_id) {
    // TODO: Retornar Página de Mapa de Desempenho de aluno com parametro 'student_id'
    return "Performance Map For $class_id";
  })->name('class_map');

});
