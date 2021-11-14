<?php
session_start();

require_once 'common.php';

$userDAO = new userDAO();
$_SESSION["changePWError"] = "";

if (isset($_POST['pwOne']) && isset($_POST['pwTwo'])) {
    $pw1 = $_POST['pwOne'];
    $pw2 = $_POST['pwTwo'];
    $email = '';
    if ($pw1 === $pw2) {

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }

        $status = $userDAO->updatePassword($email, $pw1);

        if ($status){

            header("Location: ../../HTML/myProfile.php");
            exit;
        
        } else{
            $_SESSION["changePWError"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Sorry, we are unable to change your password at this moment</p>";
            header("Location: ../../HTML/updatePw.php");
            exit;
        }
        
    }else{
        $_SESSION["changePWError"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Please ensure your passwords match</p>";
        header("Location: ../../HTML/updatePw.php");
        exit;
    }
}


?>