<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

use App\Http\Controllers\Subject;

class Performance extends Controller {
    public static function store(Request $request) {

      $knowledge_level = '';

      $multiply = $request->input('Multiplicação');

      switch(true) {
        case $multiply < 1:
          $knowledge_level = "Muita Dificuldade";
          break;
        case $multiply >= 1 && $multiply< 4:
          $knowledge_level = "Dificuldade";
          break;
        case $multiply >= 4 && $multiply < 6.5:
          $knowledge_level = "Mediano";
          break;
        case $multiply >= 6.5 && $multiply < 10:
          $knowledge_level = "Facilidade";
          break;
        case $multiply >= 10:
          $knowledge_level = "Muita facilidade";
      }

      DB::insert(
        'INSERT INTO dificuldade (aluno_id, materia_id, dificuldade_nivel) VALUES (:aluno_id, :materia_id, :nivel)',
        ['aluno_id' => session('id'), 'materia_id' => 1, 'nivel' => $knowledge_level]
      );

      $division = $request->input('Divisão');

      switch(true) {
        case $division  < 1:
          $knowledge_level = "Muita Dificuldade";
          break;
        case $division  >= 1 && $division  < 4:
          $knowledge_level = "Dificuldade";
          break;
        case $division >= 4 && $division  < 6.5:
          $knowledge_level = "Mediano";
          break;
        case $division  >= 6.5 && $division  < 10:
          $knowledge_level = "Facilidade";
          break;
        case $division  >= 10:
          $knowledge_level = "Muita facilidade";
      }

      DB::insert(
        'INSERT INTO dificuldade (aluno_id, materia_id, dificuldade_nivel) VALUES (:aluno_id, :materia_id, :nivel)',
        ['aluno_id' => session('id'), 'materia_id' => 2, 'nivel' => $knowledge_level]
      );

      $fraction = $request->input('Fração');

      switch(true) {
        case $fraction < 1:
          $knowledge_level = "Muita Dificuldade";
          break;
        case $fraction >= 1 && $fraction < 4:
          $knowledge_level = "Dificuldade";
          break;
        case $fraction >= 4 && $fraction < 6.5:
          $knowledge_level = "Mediano";
          break;
        case $fraction >= 6.5 && $fraction < 10:
          $knowledge_level = "Facilidade";
          break;
        case $fraction >= 10:
          $knowledge_level = "Muita facilidade";
      }

      DB::insert(
        'INSERT INTO dificuldade (aluno_id, materia_id, dificuldade_nivel) VALUES (:aluno_id, :materia_id, :nivel)',
        ['aluno_id' => session('id'), 'materia_id' => 3, 'nivel' => $knowledge_level]
      );


      // Returning message to AJAX (In JSON Form)
      return json_encode(true);
    }
}
