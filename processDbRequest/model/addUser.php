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
        $_SESSION["errorPW"] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>Please ensure your passwords match</p>";
        header("Location: ../../HTML/signup.php");
        exit;
    }

    $dao = new userDAO();
    $userObj = $dao->getUserByEmail($schoolEmail);

    if ($pw1 === $password && $userObj === null) {
        $dao = new userDAO();
        $_SESSION["errorPW"] = "";
        $status = $dao->addUser($firstName,$lastName,$genderID,$school,$schoolEmail,$password,$profilePictureUrl);

        $_SESSION['email'] = $schoolEmail;
        $_SESSION['loggedin'] = true;

        $dao = new userDAO();
        $userObj = $dao->getUserByEmail($schoolEmail); // Get an Indexed Array of user objects
        
        $_SESSION['piclink'] =  $userObj->getProfilePictureUrl();
    
        $_SESSION['errorUser'] = "";
        $_SESSION['errorUser'] = '';
        header("Location: ../../HTML/home.php");
        exit();
    }

    if ($userObj !== null) {
        $_SESSION['errorUser'] = "<p class='text-danger m-1 text-center' style='font-size: small; display: block;'>User Email Exists</p>";
        header("Location: ../../HTML/signup.php");
        exit();
    }

}

?>