<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Subject extends Controller{
    public static function show() {
      // Selecting all the subjects from the database
      $result = DB::select("SELECT * FROM materias");
      return $result;
    }
}
