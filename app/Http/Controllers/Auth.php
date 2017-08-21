<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\User;

class Auth extends Controller {

    public function login(Request $request) {

      $requests = $request->all();

      foreach($requests as $value) {
        if(empty($value)) {
          return $this->flashSession('auth_status', 'Preencha todos os campos...', 'login');
        }
      }

      $email = strtolower($request->email);
      $password = $request->password;


      $user_result = $this->getUser($email, 'email');

      if(!empty($user_result)) {
        foreach($user_result as $user) {
          if(Hash::check($password, $user->senha)) {
            return "Bem vindo $user->nome!";
            //TODO: Redirecionar para a Home page
          }

          else {
            // Redirecionando para página de login caso senha esteja errada
            return $this->flashSession('auth_status', 'A senha está errada...', 'login');
          }
        }
      }

      else {
        // Redirecionando para página de login caso usuário não exista
        return $this->flashSession('auth_status', 'Esse usuário não existe...', 'login');
      }

    }


    public function register(Request $request) {

      $requests = $request->all();

      foreach($requests as $value) {
        if(empty($value)) {
          return $this->flashSession('auth_status', 'Preencha todos os campos...', 'register');
        }
      }

      $email = strtolower($request->email);
      $name = strtolower($request->name);
      $password = $request->password;
      $repeatPassword = $request->repeat_password;


      $user = $this->getUser($email, 'email');
      // Se não for retornado nenhum valor à $user, significa que usuário não existe
      if(empty($user)) {
        // Inserindo novo usuário no banco de dados
        if($password == $repeatPassword) {
          User::store($email, $name, Hash::make($password));
          // Redirecionando para home
          return redirect()->route('home');
        }

        else {
          // Redirecionamento caso as senhas não estejam iguais
          return $this->flashSession('auth_status', 'As senhas não estão iguais...', 'register');
        }
      }

      else {
        // Redirecionamento caso o username já esteja em uso
        return $this->flashSession('auth_status', 'Esse username já está sendo utilizado', 'register');
      }

    }


    public function getUser($key, $type) {
      return User::show(['type' => $type, 'key' => $key]);
    }


    public function flashSession($sessionKey, $sessionMessage = '', $route) {
      // Checando se valores necessários não estão nulos ou vazios
      if(!empty($sessionKey) && !empty($route)) {
        // Criando flash message a partir de um session
        session()->flash($sessionKey, $sessionMessage);
        return redirect()->route($route);
      } else {
        return "Informações de redirecionamento insuficientes";
      }
    }


}
