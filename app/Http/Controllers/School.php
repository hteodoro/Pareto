<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class School extends Controller {

    public static function show($key, $key_type) {
      switch($key_type) {
        case 'id':
          // Return school by id
          break;
        case 'email':
          // Return school by email
          $result = DB::select('SELECT * FROM escolas WHERE email = :email', ['email' => $key]);
          return $result;
          break;
        case 'identifier':
          // Return school by identifier
          $result = DB::select('SELECT * FROM escolas WHERE identificador = :identifier', ['identifier' => $key]);
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
