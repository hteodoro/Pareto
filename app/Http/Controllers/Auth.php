<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\Student;
use App\Http\Controllers\Teacher;
use App\Http\Controllers\School;

use App\Objects\User;

class Auth extends Controller {

    public function login(Request $request) {

      $requests = $request->all();

      foreach($requests as $value) {
        if(empty($value) || !isset($request->user_type)) {
          return redirect('login')->with('auth_status', 'Preencha todos os campos...');
        }
      }

      $user_type = $request->user_type;
      $email = strtolower($request->email);
      $password = $request->password;

      $user_result = $this->getUser($email, $user_type);

      if(!empty($user_result)) {
        foreach($user_result as $user) {

          // TODO: Utilizar Hash:check() para comparar senhas com hash
          if($password == $user->senha) {
            return $this->buildSessions($user, $user_type);
          }

          else {
            // Redirecionando para página de login caso senha esteja errada
            return redirect('login')->with('auth_status', 'Sua senha está errada...');
          }
        }
      }

      else {
        // Redirecionando para página de login caso usuário não exista
        return redirect('login')->with('auth_status', 'Não existe nenhum usuário com esse email.');
      }

    }


    public function register(Request $request) {

      // Getting all the request values
      $requests = $request->all();

      // Checking if something is empty
      foreach($requests as $value) {
        if(empty($value) || !isset($request->user_type)) {
          // FlashMessage when something is empty
          return redirect('register')->with('auth_status', 'Preencha todos os campos...');
        }
      }

      // Getting the user type from the request
      $user_type = $request->user_type;
      // Getting email from the request
      $email = strtolower($request->email);
      // Getting passwords from the request
      $password = $request->password;
      $repeat_password = $request->repeat_password;
      // Getting the school identifier from the request
      $school_id = $request->school_id;

      $user = $this->getUser($email, $user_type);
      // Checking whether the user already exists or not
      if(empty($user)) {
        // Checking the school identifier
        $id_exists = $this->checkSchoolId($school_id, $user_type);

        // Redirect if the user is a school and the identifier already exists
        if($user_type == 'school' && $id_exists) {
          return redirect('register')->with('auth_status', 'Já existe uma escola registrada com esse identificador');
        }

        // Redirect if the user is not a school and the identifier doesn't exists
        elseif($user_type == 'teacher' && !$id_exists || $user_type == 'student' && !$id_exists) {
          return redirect('register')->with('auth_status', 'Não existe nenhuma escola com esse identificador');
        }

        if($password == $repeat_password) {
          // Create a User Object with all the info
          $user = new User($email, Hash::make($password), $user_type, $school_id);
          // Redirect to register/conclude with all info
          return view('conclude', ['user' => $user]);
        }

        else {
          // Redirecting with FlashMessage in case of diferrent passwords
          return redirect('register')->with('auth_status', 'As senhas não estão iguais...');
        }
      }

      else {
        // Redirecting with FlashMessage in case of email is already in use
        return redirect('register')->with('auth_status', 'Esse email já está sendo utilizado por outro usuário');
      }

    }


    public function conclude(Request $request) {

    }


    public function getUser($key, $user_type) {
      switch($user_type) {
        case 'student':
          return Student::show($key, 'email');
          break;
        case 'teacher':
          return Teacher::show($key, 'email');
          break;
        case 'school':
          return School::show($key, 'email');
      }
    }

    public function checkSchoolId($id, $user_type) {
      // Checking if exists any school with this identifier
      $result = School::show($id, 'identifier');
      if(!empty($result)) {
        return true;
      } else {
        return false;
      }
    }


    public function buildSessions($user, $user_type) {
      switch($user_type) {
        case 'student':

          session([
            'id' => $user->id,
            'class_id' => $user->sala_id,
            'escola_id' => $user->escola_id
          ]);

          return redirect('/app/test');
          break;

        case 'teacher':

          session([
            'id' => $user->id,
            'escola_id' => $user->escola_id
          ]);

          return redirect('app/classes');
          break;

        case 'school':

          session([
            'id' => $user->id,
          ]);

          return redirect('app/classes');
      }
    }


}
