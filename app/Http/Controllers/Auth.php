<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

use App\Http\Controllers\User;

class Auth extends Controller{

    public function login(Request $request) {
      if($request->has('username')) {
        $username = $request->username;
      }

      if($request->has('password')) {
        $password = $request->password;
      }

      //TODO: Validar valores de request

      $user_result = $this->getUser($username, 'username');

      if(!empty($user_result)) {
        foreach($user_result as $user) {
          if(Hash::check($password, $user->user_pass)) {
            return "Bem vindo $username!";
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
      if($request->has('username')) {
        $username = $request->username;
      }

      if($request->has('password')) {
        $password = $request->password;
      }

      if($request->has('repeat_password')) {
        $repeatPassword = $request->repeat_password;
      }

      //TODO: Validar valores de request

      $user = $this->getUser($username, 'username');
      // Se não for retornado nenhum valor à $user, significa que usuário não existe
      if(empty($user)) {
        // Inserindo novo usuário no banco de dados
        if($password == $repeatPassword) {
          User::store($username, Hash::make($password));
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
      if($type == 'id') {
        // Selecionando user por id
        $result = DB::select("SELECT * FROM usuarios WHERE id = :id" , ['id' => $key]);
        return $result;
      }

      elseif($type == 'username') {
        // Selecionando user por username
        $result = DB::select("SELECT * FROM usuarios WHERE user_name = :username", ['username' => $key]);
        return $result;
      }

      else {
        return null;
      }
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
