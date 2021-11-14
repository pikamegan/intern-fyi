<?php
session_start();

require_once 'common.php';

$userDAO = new userDAO();
$_SESSION["PWdunmatch"] = "";

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
            alert("Password successfully changed! Please sign in again :)");
            
            session_start(); #start session

            session_unset(); // removes all the variables from the RAM. Array becomes empty.But keeps information

            session_destroy(); //destroy sessions. Remove info from the disk.

            header("Location: ../../HTML/home.php");
            exit;
        
        } else{
            alert("Error in changing password");
            header("Location: ../../HTML/updatePw.php");
            exit;
        }
        
    }else{
        $_SESSION["PWdunmatch"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Please ensure your passwords match</p>";
        header("Location: ../../HTML/updatePw.php");
        exit;
    }
}


?>