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

Route::get('/', function () {
    return "Landing Page";
});

Route::get('/home', function() {
    return view('home');
})->name('home');

/*************************
  Rotas de Autenticação
*************************/

Route::get('/login', function() {
    return view('login');
})->name('login');

Route::post('/login', 'Auth@login');

Route::get('/register', function() {
    return view('register');
})->name('register');

Route::post('/register', 'Auth@register');
