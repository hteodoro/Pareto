<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchoolClass extends Controller {
  public static function show($key, $key_type) {
    switch($key_type) {
      case 'id':
        // Return the class by id
        $result = DB::select('SELECT * FROM salas WHERE id = :id', ['id' => $key]);
        return $result;
        break;
      case 'school_id':
        // Return the class by school_id
        $result = DB::select('SELECT * FROM salas WHERE escola_id = :school_id', ['school_id' => $key]);
        return $result;
        break;
      case 'name':
        // Return the class by name
        $result = DB::select('SELECT * FROM salas WHERE nome = :name', ['name' => $key]);
        return $result;
    }
  }

  public static function store($name, $school_id) {
    DB::insert(
      'INSERT INTO salas (nome, escola_id) VALUES (:name, :school_id)',
      ['name' => $name, 'school_id' => $school_id]
    );
  }

  public static function update() {

  }

  public static function delete() {

  }
}
