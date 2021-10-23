<?php
session_start();
$message = "";
if (count($_POST) > 0) {
    $con = mysqli_connect('127.0.0.1:3306', 'root', '', 'admin') or die('Unable To connect');
    $result = mysqli_query($con, "SELECT * FROM login_user WHERE user_name='" . $_POST["user_name"] . "' and password = '" . $_POST["password"] . "'");
    $row = mysqli_fetch_array($result);
    if (is_array($row)) {
        $_SESSION["id"] = $row['id'];
        $_SESSION["name"] = $row['name'];
    } else {
        $message = "Invalid Username or Password!";
    }
}
if (isset($_SESSION["id"])) {
    header("Location:index.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>

</body>
</html>
