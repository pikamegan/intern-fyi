<?php
session_start();

require_once 'common.php';

$userDAO = new userDAO();
$_SESSION["changePWError"] = "";
$_SESSION["successChangePW"] = "";

if (isset($_POST['pwOne']) && isset($_POST['pwTwo'])) {
    $pw1 = $_POST['pwOne'];
    $pw2 = $_POST['pwTwo'];
    $email = '';
    if ($pw1 === $pw2 && !empty($_POST["pwOne"])) {

        
        $password = test_input($_POST["password"]);
        $cpassword = test_input($_POST["cpassword"]);
        if (strlen($_POST["password"]) <= 8) {
            $passwordErr = "Your Password Must Contain At Least 8 Characters!";
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Number!";
        }
        elseif(!preg_match("#[A-Z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Capital Letter!";
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            $passwordErr = "Your Password Must Contain At Least 1 Lowercase Letter!";
        } else {
            $cpasswordErr = "Please Check You've Entered Or Confirmed Your Password!";
        }
        

        if (isset($_SESSION['email'])) {
            $email = $_SESSION['email'];
        }

        $status = $userDAO->updatePassword($email, $pw1);

        if ($status){
            $_SESSION["successChangePW"] = "<div class='card-body text-center'>
            <img src='../IMG/successInSpeechBubble.svg' alt='success image' class=''>
            <p class = 'text-success'>Password Successfully changed
            </p>
            <a href='myProfile.php'><button type='button' class='btn successBtn mx-2 mb-1'>Back to Profile Page</button></a>
            </div>";
            header("Location: ../../HTML/updatePw.php");
            exit;
        
        } else{
            $_SESSION["changePWError"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Sorry, we are unable to change your password at this moment</p>";
            header("Location: ../../HTML/updatePw.php");
            exit;
        }
        
    }else{
        $_SESSION["changePWError"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Please ensure your passwords matches and length is more than 8 characters</p>";
        header("Location: ../../HTML/updatePw.php");
        exit;
    }
}


?>