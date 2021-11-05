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
        echo "true";
    } else {
        echo "false";
    }
}else{
    echo "false";
}