<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class User extends Controller {

  public static function store($username, $password) {
    // Inserindo usuário na tabela
    DB::insert('INSERT INTO usuarios (user_name, user_pass) VALUES(?, ?)', [$username, $password]);
  }

}
