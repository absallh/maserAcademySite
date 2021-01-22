<?php
  class database {
    private $DB = "football_academy";
    private $DBHost = "localhost";
    private $DBUser = "root";
    private $DBPass = "";

    private function connect_to_DB(){
      $mysqli = new mysqli($this->DBHost, $this->DBUser, $this->DBPass, $this->DB);
      if($mysqli->connect_error){
        echo '<script>alert("can not connect with DB!!");</script>';
        exit;
      }
      return $mysqli;
    }

    private function makeOneRowQuery($query){
      $result;
      $mysqli = $this->connect_to_DB();
      $res = $mysqli->query($query);
      if($res->num_rows == 1){
        if ($row = $res->fetch_assoc()){
          $result = $row;
        }
      }else{
        $mysqli->close();
        return -1;
      }
      $mysqli->close();
      return $result;
    }

    private function insertData ($sql){
      $mysqli = $this->connect_to_DB();
      $result = $mysqli->query($sql);
      $mysqli->close();
      return $result;
    }

    public function getPersonData ($email){
      $sql = "SELECT * FROM person WHERE mail = '$email';";
      return $this->makeOneRowQuery($sql);
    }

    public function updateLastActiveTime ($email){
      $now = date('Y-m-d H:i:s');
      $sql = "UPDATE person SET lastActive= '$now' WHERE mail = '$email';";
      $this->insertData($sql);
    }

    public function login($userName, $password){
      $sql = "SELECT permission FROM person WHERE mail = '$userName' AND person_password = '$password';";
      $result = $this->makeOneRowQuery($sql);
      return $result['permission'];
    }

    public function signup ($email, $firstName, $lastName, $password, $birthday, $phone){
      $now = date('Y-m-d H:i:s');
      $sql = "INSERT INTO person(mail, firstName, lastName, lastActive,
          permission, person_password, age, phone) VALUES ('$email', '$firstName', '$lastName',
         '$now', 2, '$password', '$birthday', '$phone');";
      if($this->insertData($sql)){
        return true;
      }else {
        return false;
      }
    }
  }
 ?>
