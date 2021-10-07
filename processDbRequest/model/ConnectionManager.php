<?php
class ConnectionManager {
    public function getConnection() {        
        $dsn  = "mysql:host=localhost;dbname=intern";
        return new PDO($dsn, "root", "");  
    }
}
?>