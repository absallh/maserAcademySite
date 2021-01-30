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

    private function makeMultiRowQuery($query){
      $result = array();
      $mysqli = $this->connect_to_DB();
      $res = $mysqli->query($query);
      if ($res->num_rows > 0) {
        while ($row = $res->fetch_assoc()) {
          array_push($result, $row);
        }
        $mysqli->close();
        return $result;
      }
      $mysqli->close();
      return -1;
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

    public function getTshirtNumber($email)
    {
      $sql = "SELECT theNumber FROM playernumber JOIN payed ON payed.person = playernumber.player
            AND player = '$email' AND payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY);";
      $result = $this->makeOneRowQuery($sql);
      if ($result == -1){
        return -1;
      }else {
        return $result['theNumber'];
      }
    }

    public function updateLastActiveTime ($email){
      $sql = "UPDATE person SET lastActive= CURRENT_TIMESTAMP() WHERE mail = '$email';";
      $this->insertData($sql);
    }

    public function login($userName, $password){
      $sql = "SELECT permission FROM person WHERE mail = '$userName' AND person_password = '$password';";
      $result = $this->makeOneRowQuery($sql);
      if ($result == -1) {
        return $result;
      }
      return $result['permission'];
    }

    public function updateInfo ($email, $password, $firstName, $lastName, $age, $phone){
      $sql = "UPDATE person SET firstName='$firstName', lastName='$lastName',
          age= '$age', phone='$phone', person_password='$password' WHERE mail = '$email';";
      return $this->insertData($sql);
    }

    public function signup ($email, $firstName, $lastName, $password, $birthday, $phone){
      $sql = "INSERT INTO person(mail, firstName, lastName, lastActive,
          permission, person_password, age, phone) VALUES ('$email', '$firstName', '$lastName',
         CURRENT_TIMESTAMP(), 2, '$password', '$birthday', '$phone');";
      return $this->insertData($sql);
    }

    public function showTopPosts()
    {
      $sql = "SELECT id, text_content, publish_time, firstName, lastName
        FROM posts JOIN person ON posts.publisher = person.mail ORDER BY publish_time DESC LIMIT 10;";
      return $this->makeMultiRowQuery($sql);
    }

    public function getCommentCount($postId)
    {
      $sql = "SELECT COUNT(comments.content) FROM comments JOIN posts
        ON comments.post_id = posts.id WHERE post_id = $postId;";
      $result =  $this->makeOneRowQuery($sql);
      return $result['COUNT(comments.content)'];
    }
  }
 ?>
