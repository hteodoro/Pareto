<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Login extends Controller {

   public function login(Request $request) {
    $username = $request->username;
    $password = $request->password;

    return $username . " " . $password;
  }

}
