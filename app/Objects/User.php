<?php
  namespace App\Objects;

  use Illuminate\Support\Facades\DB;
  use App\Http\Controllers\School;

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
      if($this->getType() == 'student' || $this->getType() == 'teacher') {
        // Querying school by identifier and return the id
        $result = DB::select("SELECT id FROM escolas WHERE identificador = :identifier", ['identifier' => $this->school_id]);
        // Returning all values of id that were found
        foreach($result as $id_value) {
          return $id_value->id;
        }

      } elseif($this->getType() == 'school') {
        // Return the school identifier
        return $this->school_id;
      }

    }
  }

 ?>
