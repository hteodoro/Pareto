<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class School extends Controller {

    public static function show($key, $key_type) {
      switch($key_type) {
        case 'id':
          // Return school by id
          $result = DB::select('SELECT * FROM escolas WHERE id = :id', ['id' => $key]);
          return $result;
          break;
        case 'email':
          // Return school by email
          $result = DB::select('SELECT * FROM escolas WHERE email = :email', ['email' => $key]);
          return $result;
          break;
        case 'identifier':
          // Return school by identifier
          $result = DB::select('SELECT * FROM escolas WHERE identificador = :identifier', ['identifier' => $key]);
          return $result;
      }
    }

    public static function store($name, $email, $password, $school_id) {
      DB::insert(
        'INSERT INTO escolas (nome, email, senha, identificador) VALUES (:name, :email, :password, :school_id)',
        ['name' => $name, 'email' => $email, 'password' => $password, 'school_id' => $school_id]
      );
    }

    public static function update(Request $request, $item) {
      switch($item) {

        case 'name':
          DB::table('escolas')->where('id', '=', session('id'))->update(['nome' => $request->update_name]);
          break;

        case 'email':
          DB::table('escolas')->where('id', '=', session('id'))->update(['email' => $request->update_email]);
          break;

        case 'password':
          // Getting info from the school with the passed id
          $result = DB::table('escolas')->where('id', '=', session('id'))->get();
          // Variable to store school password
          $password = '';
          // Looping through the result
          foreach($result as $school) {
            // Storing the actual school password value
            $password = $school->senha;
          }
          // Checking if the password is correct
          if(Hash::make($request->actual_password) == $password) {
            DB::table('escolas')->where('id', '=', session('id'))->update(['password' => Hash::make($request->update_password)]);
          } else {
            // TODO: Redirect to the perfil page
            return redirect('app/perfil')->with('update_status', 'Sua senha atual está errada');
          }
          break;

        case 'id':
          DB::table('escolas')->where('id', '=', session('id'))->update(['identificador' => $request->update_school_id]);
      }
    }

    public static function delete($school_id) {
      // Deleting the school register
      DB::table('escolas')->where('id', '=', $school_id)->delete();
      // Deleting all teachers registered in the school
      DB::table('professores')->where('escola_id', '=', $school_id)->delete();
      // Deleting all students registered in the school
      DB::table('alunos')->where('escola_id', '=', $school_id)->delete();
    }

}
