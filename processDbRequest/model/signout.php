<?php

session_start(); #start session

session_unset(); // removes all the variables from the RAM. Array becomes empty.But keeps information

session_destroy(); //destroy sessions. Remove info from the disk.

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Out</title>
</head>
<body>
    <script>
        //redirect to home after signing out
        let alertMsg = `Signed out successfully! Bye Bye`;
        alert(alertMsg)
        window.location.assign('../../HTML/home.php')
    </script>
</body>
</html>
