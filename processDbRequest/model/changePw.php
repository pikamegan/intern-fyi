<?php

require_once 'common.php';

$email = $_POST['email'];
$pw = $_POST['pw'];
$userDAO = new userDAO();
if ($userDAO->updatePassword($email, $pw)){
    alert("Password updated. You are logged out");
    $_SESSION = [];
    // window.location.assign('../../HTML/home.html');
    // exit();

} 

?>