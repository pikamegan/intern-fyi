<?php
session_start();

require_once 'common.php';

$userDAO = new userDAO();
// $_SESSION["changePWError"] = "";
$_SESSION["successChangePW"] = "";
$errorList = array();
$_SESSION["errorList"] = "";

if (isset($_POST['pwOne']) && isset($_POST['pwTwo'])) {
    $pw1 = $_POST['pwOne'];
    $pw2 = $_POST['pwTwo'];
    $email = '';

    if($pw1 === $pw2) {
        if (strlen($pw1) <= 8) {
            array_push($errorList, 'Your Password Must Contain At Least 8 Characters!');
        } elseif (!preg_match("#[0-9]+#", $pw1)) {
            array_push($errorList, "Your Password Must Contain At Least 1 Number!");
        } elseif (!preg_match("#[A-Z]+#", $pw1)) {
            array_push($errorList, "Your Password Must Contain At Least 1 Capital Letter!");
        } elseif (!preg_match("#[a-z]+#", $pw1)) {
            array_push($errorList, "Your Password Must Contain At Least 1 Lowercase Letter!");
        } else {
            array_push($errorList, "Please Check You've Entered Or Confirmed Your Password!");
        }
    }else{
        array_push($errorList, "Please ensure your passwords matches");
    }


    if (isset($_SESSION['email'])) {
        $email = $_SESSION['email'];
    }

    if (sizeof($errorList) === 0) {
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
            array_push($errorList, "Sorry, we are unable to change your password at this moment");
            $_SESSION["errorList"] = $errorList;
            header("Location: ../../HTML/updatePw.php");
            exit;
        }
    }else{
        $_SESSION["errorList"] = $errorList;
        header("Location: ../../HTML/updatePw.php");
        exit;
    }

} else {
    array_push($errorList, "Please Check You've Entered Or Confirmed Your Password!");
    $_SESSION["errorList"] = $errorList;
    header("Location: ../../HTML/updatePw.php");
    exit;
}


?>