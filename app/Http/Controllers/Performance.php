<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Subject;

class Performance extends Controller {
    public static function store(Request $request) {
      // Getting all the subjects from the database
      $subjects = Subject::show();
      // Looping Though all of the subjects
      foreach($subjects as $subject) {
        // TODO:: Define the level of dificulty of the question
        // TODO:: Make a Switch to this (Above)
        // Inserting info to the dificulty table
        DB::insert(
          'INSERT INTO dificuldade (aluno_id, materia_id, dificuldade_nivel) VALUES (:aluno_id, :materia_id, :nivel)',
          ['aluno_id' => session('id'), 'materia_id' => $subject->id, 'nivel' => 4]
        );
      }

      // Returning message to AJAX (In JSON Form)
      return json_encode(true);
    }
}
