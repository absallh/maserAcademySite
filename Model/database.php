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

    public function publishAPost($content_txt, $publisher){
      $result = -1;
      $sql = "INSERT INTO posts (publisher, text_content, publish_time) VALUES
      ('$publisher', '$content_txt', CURRENT_TIMESTAMP());";
      $mysqli = $this->connect_to_DB();
      if ($mysqli->query($sql)) {
        $sql = "SELECT MAX(id) FROM posts WHERE publisher = '$publisher' AND text_content = '$content_txt';";
        $res = $mysqli->query($sql);
        if ($res->num_rows == 1) {
          if ($row = $res->fetch_assoc()) {
            $result = $row['MAX(id)'];
          }
        }else {
          $mysqli->close();
          return -1;
        }
      }else {
        $mysqli->close();
        return -1;
      }
      $mysqli->close();
      return $result;
    }

    public function deletePost($postId){
      $sql = "DELETE FROM personwatchedpost WHERE post_id = $postId;";
      $this->insertData($sql);
      $sql = "DELETE FROM comments WHERE post_id = $postId;";
      $this->insertData($sql);
      $sql = "DELETE FROM postmedia WHERE post_id = $postId;";
      $this->insertData($sql);
      $sql = "DELETE FROM posts WHERE id = $postId;";
      $this->insertData($sql);
    }

    public function getPostMedia($postId)
    {
      $sql = "SELECT media_path, media_type FROM postmedia WHERE post_id = $postId;";
      return $this->makeMultiRowQuery($sql);
    }

    public function uploadMadia($postId, $filePath, $fileType)
    {
      $sql = "INSERT INTO postmedia (post_id, media_path, media_type) VALUES
            ($postId, '$filePath', '$fileType')";
      return $this->insertData($sql);
    }

    public function updatePostContent($post_id, $content)
    {
      $sql = "UPDATE posts SET text_content = '$content' WHERE id = $post_id;";
      return $this->insertData($sql);
    }

    public function getPersonData ($email){
      $sql = "SELECT mail, firstName, lastName, age, phone, lastActive, permission,
              (SELECT theNumber FROM playernumber WHERE playernumber.player = person.mail)
              AS theNumber FROM person WHERE mail = '$email';";
      return $this->makeOneRowQuery($sql);
    }

    public function getPayHistory($email)
    {
      $sql = "SELECT payedDate FROM payed WHERE person = '$email' ORDER BY payedDate DESC;";
      return $this->makeMultiRowQuery($sql);
    }

    public function getTopPostComments($post_id)
    {
      $sql = "SELECT mail, firstName, lastName, commentTime, content FROM comments
              JOIN person ON person.mail = comments.person AND post_id = $post_id ORDER BY commentTime ASC LIMIT 10;";
      return $this->makeMultiRowQuery($sql);
    }

    public function commentOnPost($post_id, $comment_txt, $publisher)
    {
      $sql = "INSERT INTO comments(person, commentTime, content, post_id)
              VALUES ('$publisher', CURRENT_TIMESTAMP(), '$comment_txt', $post_id);";
      return $this->insertData($sql);
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
      $sql = '';
      if ($password == '') {
        $sql = "UPDATE person SET firstName='$firstName', lastName='$lastName',
                age= '$age', phone='$phone' WHERE mail = '$email';";
      }else {
        $sql = "UPDATE person SET firstName='$firstName', lastName='$lastName',
                age= '$age', phone='$phone', person_password='$password' WHERE mail = '$email';";
      }
      return $this->insertData($sql);
    }

    public function AdminUpdateMemberInfo($oldEmail, $newEmail, $password, $fname, $lastname, $age, $phone, $t_shirt, $oldT_shirt)
    {
      $mysqli = $this->connect_to_DB();
      $result = $mysqli->query("SET FOREIGN_KEY_CHECKS = 0;");
      $sql = '';
      if ($password == '') {
        $sql = "UPDATE payed LEFT JOIN (person LEFT JOIN playernumber ON
                person.mail = playernumber.player) ON person.mail = payed.person
                SET person.mail = '$newEmail', payed.person = '$newEmail',
                playernumber.player = '$newEmail', person.firstName = '$fname' ,
                person.lastName = '$lastname', person.age = '$age', person.phone='$phone',
                playernumber.theNumber = $t_shirt WHERE
                payed.person = '$oldEmail';";
      }else {
        $sql = "UPDATE payed LEFT JOIN (person LEFT JOIN playernumber ON
                person.mail = playernumber.player) ON person.mail = payed.person
                SET person.mail = '$newEmail', payed.person = '$newEmail',
                playernumber.player = '$newEmail', person.firstName = '$fname' ,
                person.lastName = '$lastname', person.age = '$age', person.phone='$phone',
                person.person_password = '$password', playernumber.theNumber = $t_shirt WHERE
                payed.person = '$oldEmail';";
      }
      $result2 = $mysqli->query($sql);
      $mysqli->close();
      return ($result2 && $result);
    }

    public function selectMemberPayed($email)
    {
      $sql = "INSERT INTO payed(person, payedDate) VALUES ('$email', CURRENT_TIMESTAMP());";
      return $this->insertData($sql);
    }

    public function deletePayed($email)
    {
      $sql = "DELETE FROM payed WHERE person = '$email' AND payedDate =
              (SELECT MAX(payedDate) FROM payed WHERE person = '$email')";
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

    public function allMembers()
    {
      $sql = "SELECT mail, firstName, lastName, DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), age)), '%Y')+0 AS age,
              (SELECT COUNT(person) FROM payed WHERE person = person.mail AND
              payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY)) AS payed,
              (SELECT theNumber FROM playernumber WHERE playernumber.player = person.mail) AS number
              FROM person WHERE permission = 2";
      return $this->makeMultiRowQuery($sql);
    }

    public function searchOnMembers($key)
    {
      if (is_numeric($key)) {
        $sql = "SELECT mail, firstName, lastName, DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), age)), '%Y')+0 AS age,
                (SELECT COUNT(person) FROM payed WHERE person = person.mail AND
                payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY))
                AS payed, (SELECT theNumber FROM playernumber WHERE playernumber.player = person.mail)
                AS number FROM person LEFT JOIN playernumber ON person.mail = playernumber.player
                WHERE permission = 2 AND (DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), age)), '%Y')+0 = $key
                OR phone LIKE '%$key%' OR playernumber.theNumber = $key);";
      }
      else {
        $sql = "SELECT mail, firstName, lastName, DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), age)), '%Y')+0
                AS age, (SELECT COUNT(person) FROM payed WHERE person = person.mail AND
                payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY))
                AS payed, (SELECT theNumber FROM playernumber WHERE playernumber.player = person.mail)
                AS number FROM person WHERE permission = 2 AND (mail LIKE '%$key%' OR
               CONCAT(firstName, ' ', lastName) LIKE '%$key%');";
      }
      return $this->makeMultiRowQuery($sql);
    }

    public function getPayedMember()
    {
      $sql = "SELECT mail, firstName, lastName, DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), age)), '%Y')+0
              AS age, 1 AS payed, (SELECT theNumber FROM playernumber WHERE
              playernumber.player = person.mail) AS number FROM person JOIN payed
              ON payed.person = person.mail AND payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY);";
      return $this->makeMultiRowQuery($sql);

    }

    public function getNotPayedMember()
    {
      $sql = "SELECT mail, firstName, lastName, DATE_FORMAT(FROM_DAYS(DATEDIFF(now(), age)), '%Y')+0
              AS age, 0 AS payed, (SELECT theNumber FROM playernumber WHERE
              playernumber.player = person.mail) AS number FROM person WHERE
              permission = 2 AND (person.mail) NOT IN (SELECT payed.person FROM
              payed WHERE payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY));";
      return $this->makeMultiRowQuery($sql);
    }

    public function isPayed($email)
    {
      $sql = "SELECT COUNT(person) FROM payed WHERE person = '$email' AND
              payed.payedDate >= date_add(CURDATE(),interval -DAY(CURDATE())+1 DAY);";
      $result = $this->makeOneRowQuery($sql);
      return ($result['COUNT(person)'] != 0);
    }
  }
 ?>
