<?php
session_start();

require_once 'common.php';

$userDAO = new userDAO();


if (isset($_POST['pwOne']) && isset($_POST['pwTwo'])) {
    $pw1 = $_POST['pwOne'];
    $pw2 = $_POST['pwTwo'];
    $email = '';
    if ($pw1 === $pw2) {

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }

        if ($userDAO->updatePassword($email, $pw1)){
            window.location.assign('signout.php');
            exit();
        
        } 
        
    }else{
        $_SESSION["PWdunmatch"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Please ensure your passwords match</p>";
        window.location.assign('../../HTML/myProfile.php');
        exit();

    }
}


?>