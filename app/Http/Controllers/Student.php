<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;


class Student extends Controller {

  public static function show($key = null, $key_type = null) {
    switch($key_type) {
      case 'id':
        // Return student by id
        $result = DB::select('SELECT * FROM alunos WHERE id = :id', ['id' => $key]);
        return $result;
        break;
      case 'email':
        // Return student by email
        $result = DB::select('SELECT * FROM alunos WHERE email = :email', ['email' => $key]);
        return $result;
        break;
      case 'name':
        $result = DB::select(
          "SELECT alunos.id, alunos.nome, salas.nome as 'sala', escolas.nome as 'escola'
            FROM alunos, salas, escolas
            WHERE alunos.nome LIKE '%$key%' AND
            salas.id = alunos.sala_id AND
            escolas.id = alunos.escola_id
            ORDER BY salas.nome, alunos.nome"
        );
        return $result;
        break;
      case null:
        $result = DB::select(
          "SELECT alunos.id, alunos.nome, salas.nome as 'sala', escolas.nome as 'escola'
            FROM alunos, salas, escolas
            WHERE salas.id = alunos.sala_id AND
            escolas.id = alunos.escola_id
            ORDER BY salas.nome, alunos.nome"
        );
        return $result;
    }
  }

  public static function store($name, $email, $password, $class_id, $school_id) {
    DB::insert(
      'INSERT INTO alunos (nome, email, senha, sala_id, escola_id) VALUES (:name, :email, :password, :class_id, :school_id)',
      ['name' => $name, 'email' => $email, 'password' => $password, 'class_id' => $class_id, 'school_id' => $school_id]
    );
  }

  public static function update() {

  }

  public static function delete(Request $request, $student_id) {
    // Delete the student
    DB::table('alunos')->where('id', '=', $student_id)->delete();
    return redirect('app/students');
    // Delete student performance information
    DB::table('dificuldade')->where('aluno_id', '=', $student_id)->delete();
  }

}
