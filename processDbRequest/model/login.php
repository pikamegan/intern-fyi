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

        $dao = new userDAO();
        $userObj = $dao->getUserByEmail($email); // Get an Indexed Array of user objects
        
        var_dump($_SESSION['piclink']);
        $_SESSION['piclink'] =  $userObj->getProfilePictureUrl();
    

        header("Location: ../../HTML/home.php");
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
