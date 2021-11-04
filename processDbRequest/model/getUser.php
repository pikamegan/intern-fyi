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

$user["firstName"] = $userObj->getFirstName();
$user["lastName"] = $userObj->getLastName();
$user["genderID"] = $userObj->getGenderID();
$user["country"] = $userObj->getCountry();
$user["school"] = $userObj->getSchool();
$user["schoolEmail"] = $userObj->getSchoolEmail();
$user["profilePictureUrl"] = $userObj->getProfilePictureUrl();
$user["reviewsNo"] = $userObj->getReviewsNo();

$userJSON = json_encode($user);
echo $userJSON;
