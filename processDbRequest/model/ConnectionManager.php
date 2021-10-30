<?php
// class ConnectionManager
// {

//     public function getConnection()
//     {
//         $servername = 'localhost';
//         $username = 'root';
//         $password = '';
//         $dbname = '';
//         $port = '3309';

//         // Create connection
//         $pdoObject = new PDO(
//             "mysql:host=$servername;dbname=$dbname;port=$port",
//             $username,
//             $password);

//         $pdoObject->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//         // if fail, exception will be thrown

//         // Return connection object
//         return $pdoObject; // PDO object (containing MySQL connection info)
//     }

// }

?>




<?php

//works for tim

class ConnectionManager
{
    public function getConnection()
    {
        $dsn  = "mysql:host=localhost;dbname=wad2g5t2intern";
        return new PDO($dsn, "root", "");
    }
}
?>
