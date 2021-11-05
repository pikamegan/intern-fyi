<?php
require_once 'common.php';

if (isset($_POST['email']) && isset($_POST['pw'])){
    $email = $_POST['email'];
    $pw = $_POST['pw'];
    
    $userDAO = new userDAO();
    $userObj = $userDAO->authenticate($email, $pw);
    
    if (isset($userObj)) {
        $_SESSION['email'] = $email;
        $_SESSION['pw'] = $pw;
        $postJSON = json_encode("true");
        echo "true";
        header("Location: ../../HTML/home.html?login=success");
        exit();
    } else {
        header("Location: ../../HTML/home.html?login=failed");
        exit();
    }
}else{
    header("Location: ../../HTML/login.html?login=PlsEnterAllFields");
    exit();
}