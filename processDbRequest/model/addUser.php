<?php

session_start();
require_once 'common.php';
require_once "./userDAO.php";

$status = false;
// var_dump($_POST);
$_SESSION["errorPW"] = "";

if (isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['gender'])  && isset($_POST['school'])  && isset($_POST['schoolEmail']) && isset($_POST['pw'])  && isset($_POST['avatarURL'])&& isset($_POST['pw1'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $genderID = $_POST['gender'];
    $school = $_POST['school'];
    $schoolEmail = $_POST['schoolEmail'];
    $password = $_POST['pw'];
    $pw1 = $_POST['pw1'];
    $profilePictureUrl = $_POST['avatarURL'];

    if ($pw1 !== $password) {
        $_SESSION["errorPW"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Password Mismatch</p>";
        header("Location: ../../HTML/signup.php");
        exit;
    }
    if ($pw1 === $password) {
        $dao = new userDAO();
        $_SESSION["errorPW"] = "";
        $status = $dao->addUser($firstName,$lastName,$genderID,$school,$schoolEmail,$password,$profilePictureUrl);
        header("Location: ../../HTML/myProfile.php");
        exit;
    }

}

?>