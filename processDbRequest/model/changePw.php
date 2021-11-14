<?php
session_start();

require_once 'common.php';

$userDAO = new userDAO();
// $_SESSION["changePWError"] = "";
$_SESSION["successChangePW"] = "";
$_SESSION["errorLength"] = "";
$_SESSION["errorPWmismatch"] = "";

$noErrors = true;

if (isset($_POST['pwOne']) && isset($_POST['pwTwo'])) {
    $pw1 = $_POST['pwOne'];
    $pw2 = $_POST['pwTwo'];
    $email = '';

    if($pw1 !== $pw2) {
        $_SESSION["errorPWmismatch"] = " <p class='text-center text-danger m-1' style='display: none;' id='overallMsg'>Password Mismatch!</p>";
        $noErrors = false;
        header("Location: ../../HTML/updatePw.php");
        exit;
    }

    if(strlen($pw1) < 8 || strlen($pw2) < 8) {
        $_SESSION["errorLength"] = " <p class='text-center text-danger m-1' style='display: none;' id='overallMsg'>Password length must be as least 8 characters</p>";
        $noErrors = false;
        header("Location: ../../HTML/updatePw.php");
        exit;
    }

    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }

    if ($noErrors) {
        $status = $userDAO->updatePassword($email, $pw1);
    
        if ($status) {
            $_SESSION["successChangePW"] = "<div class='card-body text-center'>
                <img src='../IMG/successInSpeechBubble.svg' alt='success image' class=''>
                <p class = 'text-success'>Password Successfully changed
                </p>
                <a href='myProfile.php'><button type='button' class='btn successBtn mx-2 mb-1'>Back to Profile Page</button></a>
                </div>";
            header("Location: ../../HTML/updatePw.php");
            exit;
    
        } else {
            // array_push($errorList, "Sorry, we are unable to change your password at this moment");
            // $_SESSION["errorList"] = $errorList;
            header("Location: ../../HTML/updatePw.php");
            exit;
        }
    }

} else {
    // array_push($errorList, "Please Check You've Entered Or Confirmed Your Password!");
    // $_SESSION["errorList"] = $errorList;
    header("Location: ../../HTML/updatePw.php");
    exit;
}


?>