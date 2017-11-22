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
use Illuminate\Support\Facades\DB;


Route::get('/', function() {
    // TODO: Retornar landing page
    return view('landing');
});

Route::get('/contact', function() {
    return view('contact');
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

// Do User logout
Route::get('/logout', 'Auth@logout')->middleware('check_auth');

/********************************
    APP ROUTES
********************************/

Route::prefix('/app')->group(function() {

  Route::get('/test', function() {
    // TODO: Retornar página de teste
    return view('test');
  })->name('test')->middleware('check_auth', 'student_access');

  Route::get('/test/do', function() {
    return view('dotest');
  })->name('doTest')->middleware('check_auth', 'student_access');

  Route::get('/students', function() {
    // TODO: Retornar página com lista de alunos
    return view('students');
  })->name('students')->middleware('check_auth', 'high_access');

  Route::get('/teachers', function() {
    // TODO: Retornar página com lista de professores (Especifico para escolas)
    return view('teachers');
  })->name('teachers')->middleware('check_auth', 'school_access');

  Route::get('/classes', function() {
    // TODO: Retornar página com lista de salas
    return view('classes');
  })->name('classes')->middleware('check_auth', 'high_access');

});

/**********************************
    CLASS OPERATIONS AND PAGES
**********************************/
Route::prefix('/app/classes')->group(function() {
  // Create new class
  Route::post('/add', 'Class@store')->middleware('check_auth')->middleware('check_auth', 'school_access');
  // Update an existent class
  Route::put('/update', 'Class@update')->middleware('check_auth')->middleware('check_auth', 'school_access');
  // Delete a class
  Route::delete('/delete', 'Class@delete')->middleware('check_auth')->middleware('check_auth', 'school_access');
});

/********************************
    MAP OPERATIONS
********************************/

Route::prefix('/app/map')->group(function() {

  Route::get('/student/{student_id}', function($student_id){
    // TODO: Retornar Página de Mapa de Desempenho de aluno com parametro 'student_id'
    return view('student_map');
  })->name('student_map')->middleware('check_auth');

  Route::get('/class/{class_id}', function($class_id) {
    // TODO: Retornar Página de Mapa de Desempenho de aluno com parametro 'student_id'
    return view('class_map');
  })->name('class_map')->middleware('check_auth', 'high_access');

});

/*********************************
    TEST OPERATIONS
*********************************/

Route::get('/performance', 'Performance@store')->middleware('check_auth');


/*********************************
    DEVELOPMENT TESTING
*********************************/

Route::get('/testing', function(Request $request) {

  return $request->input('name');

});
