<?php
  namespace App\Objects;

  class User {
    // Variables to store info
    private $email;
    private $password;
    private $user_type;
    private $school_id;

    public function __construct($email, $password, $user_type, $school_id) {
      $this->email = $email;
      $this->password = $password;
      $this->user_type = $user_type;
      $this->school_id = $school_id;
    }

    // Get info methods
    public function getEmail() {
      return $this->email;
    }

    public function getPassword() {
      return $this->password;
    }

    public function getType() {
      return $this->user_type;
    }

    public function getSchoolId() {
      return $this->school_id;
    }
  }

 ?>
