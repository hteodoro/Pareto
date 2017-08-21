<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class User extends Controller {

  public static function store($email, $name, $password) {
    // Inserindo usuário na tabela
    DB::insert('INSERT INTO usuarios (email, nome, senha) VALUES(?, ?, ?)', [$email, $name, $password]);
  }

  public static function show($queryInfo = null) {
    if($queryInfo == null) {
      $result = DB::select("SELECT * FROM usuarios");
      return $result;
    }

    else {
      if($queryInfo['type'] == 'id') {
        // Selecionando user por id
        // TODO: Utilizar método show() em Controllers\User
        $result = DB::select("SELECT * FROM usuarios WHERE id = :id" , ['id' => $queryInfo['key']]);
        return $result;
      }

      elseif($queryInfo['type'] == 'email') {
        // Selecionando user por email
        // TODO: Utilizar método show() em Controllers\User
        $result = DB::select("SELECT * FROM usuarios WHERE email = :email", ['email' => $queryInfo['key']]);
        return $result;
      }

      else {
        return null;
      }
    }

  }


}
