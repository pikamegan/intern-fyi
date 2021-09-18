<?php

class ConnectionManager {

  public function getConnection() {
    $servername = 'localhost';
    $dbname = 'todo';
    $username = 'root';
    $password = '';
    $port = 3309;
    $url  = "mysql:host=$servername;dbname=$dbname;port=$port";

    return new PDO($url, $username, $password);
  }

}

?>
