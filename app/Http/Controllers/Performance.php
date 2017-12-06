<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Subject;

class Performance extends Controller {

    public static function show($item_id, $item_type) {
      // TODO: Return the student performance values in all subjects (with the subjects names)
      if($item_type == 'student') {
        $result = DB::table('dificuldade')
                      ->join('materias', 'dificuldade.materia_id', '=', 'materias.id')
                      ->select('materias.nome as name', 'dificuldade.dificuldade_nivel as performanceLevel')
                      ->where('aluno_id', '=', $item_id)
                      ->get();

        return $result;
      }

      elseif($item_type == 'class') {

      }

    }

    public static function store(Request $request) {
      // TODO:: Get the subject and performance value
      $subject = $request->input('subject');
      $performance = $request->input('performance');
      $level = '';

      switch(true) {
        case $performance < 1:
          $level = "Muita Dificuldade";
          break;
        case $performance >= 1 && $performance < 4:
          $level = "Dificuldade";
          break;
        case $performance >= 4 && $performance < 6.5:
          $level = "Mediano";
          break;
        case $performance >= 6.5 && $performance < 10:
          $level = "Facilidade";
          break;
        case $performance >= 10:
          $level = "Muita facilidade";
      }

      // TODO:: Get the Subject id
      $subject_id;
      $subjects = Subject::show($subject, 'name');

      foreach($subjects as $subject) {
        $subject_id = $subject->id;
      }

      // TODO:: Get the student id
      $student_id = session('id');

      // TODO:: Store the performance value on the Database
      DB::insert(
        'INSERT INTO dificuldade (aluno_id, materia_id, dificuldade_nivel) VALUES (:student_id, :subject_id, :level)',
        ['student_id' => $student_id, 'subject_id' => $subject_id, 'level' => $level]
      );
      
    }
}
