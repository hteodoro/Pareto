<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchoolClass extends Controller {
  public static function show() {

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
