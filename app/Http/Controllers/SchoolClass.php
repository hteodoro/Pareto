<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class SchoolClass extends Controller {
  public static function show($key = null, $key_type = null) {
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
          $result = DB::select("SELECT salas.id, salas.nome FROM salas WHERE salas.nome LIKE '%$key%' ORDER BY salas.nome");
          return $result;
          break;
        case null:
          $result = DB::select("SELECT salas.id, salas.nome FROM salas ORDER BY salas.nome");
          return $result;
    }
  }

  public static function store($name, $school_id) {
    DB::insert(
      'INSERT INTO salas (nome, escola_id) VALUES (:name, :school_id)',
      ['name' => $name, 'school_id' => $school_id]
    );
  }

  public static function add($class_name) {
    DB::insert(
      'INSERT INTO salas (nome, escola_id) VALUES (:name, :school_id)',
      ['name' => $class_name, 'school_id' => session('id')]
    );
    return redirect('/app/classes');
  }

  public static function update($class_id, $class_name) {
    // Update the class with the passed ID
    DB::table('salas')->where('id', '=', $class_id)->update(['nome' => $class_name]);
    return redirect('app/classes');
  }

  public static function delete($class_id) {
    // Delete the class
    DB::table('salas')->where('id', '=', $class_id)->delete();
    return redirect('app/classes');
    // Delete all the students in that class
    DB::table('alunos')->where('sala_id', '=', $class_id)->delete();
  }
}
