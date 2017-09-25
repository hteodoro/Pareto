<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class Student extends Controller {

  public static function show($key, $key_type) {
    switch($key_type) {
      case 'id':
        // Return student by id
        $result = DB::select('SELECT * FROM alunos WHERE id = :id', ['id' => $key]);
        return $result;
        break;
      case 'email':
        // Return student by email
        $result = DB::select('SELECT * FROM alunos WHERE email = :email', ['email' => $key]);
        return $result;
    }
  }

  public static function store($name, $email, $password, $class_id, $school_id) {
    DB::insert(
      'INSERT INTO alunos (nome, email, senha, sala_id, escola_id) VALUES (:name, :email, :password, :class_id, :school_id)',
      ['name' => $name, 'email' => $email, 'password' => $password, 'class_id' => $class_id, 'school_id' => $school_id]
    );
  }

  public static function update() {

  }

  public static function delete() {

  }
}
