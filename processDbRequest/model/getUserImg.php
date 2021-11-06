<?php
require_once 'common.php';

$email = '';
if (isset($_GET['email'])) {
    $email = $_GET['email'];
}

$dao = new userDAO();
$userObj = $dao->getUserByEmail($email); // Get an Indexed Array of user objects

// make user into json and return json data
$user = [];

$user["profilePictureUrl"] = $userObj->getProfilePictureUrl();

$userJSON = json_encode($user);
echo $userJSON;
