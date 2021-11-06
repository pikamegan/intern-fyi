<?php
require_once 'common.php';

session_start();

$_SESSION['loggedin'] = false;

if (isset($_POST['email']) && isset($_POST['pw'])) {
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $userDAO = new userDAO();
    $userObj = $userDAO->authenticate($email, $pw);

    if (isset($userObj)) {
        $_SESSION['email'] = $email;
        $_SESSION['pw'] = $pw;
        $_SESSION['loggedin'] = true;
        header("Location: ../../HTML/home.php?login=success");
        exit();
    } else {
        $postJSON = json_encode("false");
        echo $postJSON;
        header("Location: ../../HTML/login.html");
        exit();
    }
} else {
    $postJSON = json_encode("false");
    echo $postJSON;
    header("Location: ../../HTML/login.html?login=PlsEnterAllFields");
    exit();
}
?>