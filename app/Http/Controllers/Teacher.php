<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class Teacher extends Controller {

  public static function show($key = null, $key_type = null) {
    switch($key_type) {
      case 'id':
        // Return teacher by id
        $result = DB::select('SELECT * FROM professores WHERE id = :id', ['id' => $key]);
        return $result;
        break;
      case 'email':
        // Return teacher by email
        $result = DB::select('SELECT * FROM professores WHERE email = :email', ['email' => $key]);
        return $result;
      case 'name':
        $result = DB::select(
          "SELECT professores.id, professores.nome, professores.disciplina
            FROM professores, escolas
            WHERE professores.nome LIKE '%$key%' AND
            escolas.id = professores.escola_id
            ORDER BY professores.nome"
        );
        return $result;
      case null:
        $result = DB::select(
          "SELECT professores.id, professores.nome, professores.disciplina
            FROM professores, escolas
            WHERE escolas.id = professores.escola_id
            ORDER BY professores.nome"
        );
        return $result;
    }
  }

  public static function store($name, $email, $password, $subject, $school_id) {
    DB::insert(
      'INSERT INTO professores (nome, email, senha, disciplina, escola_id) VALUES (:name, :email, :password, :subject, :school_id)',
      ['name' => $name, 'email' => $email, 'password' => $password, 'subject' => $subject, 'school_id' => $school_id]
    );
  }

  public static function update() {

  }

  public static function delete(Request $request, $teacher_id) {
    // Delete the student
    DB::table('professores')->where('id', '=', $teacher_id)->delete();
    return redirect('app/teachers');
  }
}
