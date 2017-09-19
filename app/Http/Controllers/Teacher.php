<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Teacher extends Controller {

  public static function show($key, $key_type) {
    switch($key_type) {
      case 'id':
        // Return teacher by id
        $result = DB::select('SELECT * FROM professores WHERE id = :id', ['id' => $key]);
        return $result;
        break;
      case 'email':
        // Return teacher by email
        $result = DB::select('SELECT * FROM professores WHERE email = :email', ['email' => $key]);
        return $result;
    }
  }

  public static function store() {

  }

  public static function update() {

  }

  public static function delete() {

  }
}
