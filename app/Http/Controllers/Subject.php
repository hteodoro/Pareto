<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Subject extends Controller{
    public static function show($key = null, $key_type = null) {
      switch($key_type) {
        case 'id':
          $result = DB::select('SELECT nome FROM materias WHERE id = :id', ['id' => $key]);
          return $result;
          break;
        case 'name':
          $result = DB::select('SELECT id FROM materias WHERE nome = :name', ['name' => $key]);
          return $result;
          break;
        case null:
          $result = DB::select('SELECT * FROM materias');
          return $result;
      }
    }
}
