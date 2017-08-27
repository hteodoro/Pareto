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
    return "Landing Page";
});

/********************************
    AUTH ROUTES
********************************/

Route::get('/login', function() {
    // TODO: Retornar página de login
    return "Login Page";
})->name('login');

Route::post('/login', 'Auth@login');

Route::get('/register', function() {
    // TODO: Retornar página de registro
    return "Register Page";
})->name('register');

Route::post('/register', 'Auth@register');

Route::get('/register/confirm', function(Request $request) {
    // TODO: Retornar página de confirmação de registro
    return "Register Confirm Page";
})->name('register_confirm');

Route::post('/register/confirm', 'Auth@confirm');

/********************************
    APP ROUTES
********************************/

Route::prefix('/app')->group(function() {

  Route::get('/home', function() {
    // TODO: Retornar Home Page
    return "Home Page";
  })->name('home');

  Route::get('/test', function() {
    // TODO: Retornar página de teste
    return "Test Page";
  })->name('test');

  Route::get('/students', function() {
    // TODO: Retornar página com lista de alunos
    return "Students Page";
  })->name('students');

  Route::get('/classes', function() {
    // TODO: Retornar página com lista de salas
    return "Classes Page";
  })->name('classes');

});

/********************************
    CLASS OPERATIONS
********************************/

Route::prefix('/app/classes')->group(function() {

  Route::get('/add', function() {
    // TODO: Retornar página para adicionar sala
    return "Add Class Page";
  })->name('add_class');

  Route::get('/update', function() {
    // TODO: Retornar página para atualizar sala
    return "Update Class Page";
  })->name('update_class');

  Route::post('/add', 'Class@store');
  Route::post('/update', 'Class@update');

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
