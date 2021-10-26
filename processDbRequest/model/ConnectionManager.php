<?php
class ConnectionManager {
    public function getConnection() {        
        $dsn  = "mysql:host=localhost;dbname=wad2g5t2intern";
        return new PDO($dsn, "root", "");  
    }
}
?>