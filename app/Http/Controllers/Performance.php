<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Subject;

class Performance extends Controller {

    public static function show($item_id, $item_type, $subject_id = null, $performance_level = null) {
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
        /*****
          Checar quantos alunos da sala tem o
          nível de dificuldade especificado
          na matéria especificada
        *****/
        // TODO:: Get the number of students in the class
        $total_result = DB::select("SELECT COUNT(id) as 'total' FROM alunos WHERE sala_id = :class_id", ['class_id' => $item_id]);
        // Variable to store the actual number of students
        $students_total = 0;
        // Foreach to loop the total_result
        foreach($total_result as $total) {
          // Storing the actual number of students
          $students_total = $total->total;
        }
        // TODO:: Get the number of students with the specified difficulty
        $performance_total = DB::select(
          "SELECT COUNT(dificuldade.relacao_id) as 'total' FROM dificuldade, alunos
            WHERE materia_id = :subject_id AND
            dificuldade_nivel = :performance_level AND
            alunos.sala_id = :class_id AND
            alunos.id = dificuldade.aluno_id",
          ['subject_id' => $subject_id, 'performance_level' => $performance_level, 'class_id' => $item_id]
        );

        $performance_number = 0;

        foreach($performance_total as $total) {
          $performance_number = $total->total;
        }

        // TODO:: Calculate the amount in percentage
        $amount_percentage = ($performance_number / $students_total) * 100;
        // TODO:: Return the amount
        return $amount_percentage;
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
