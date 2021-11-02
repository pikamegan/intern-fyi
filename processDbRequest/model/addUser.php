<?php

require_once 'common.php';
require_once "./userDAO.php";

$status = false;
var_dump($_POST);

if (isset($_POST['fname']) && isset($_POST['lname'])  && isset($_POST['gender'])  && isset($_POST['school'])  && isset($_POST['schoolEmail']) && isset($_POST['pw'])  && isset($_POST['avatarURL'])) {
    $firstName = $_POST['fname'];
    $lastName = $_POST['lname'];
    $genderID = $_POST['gender'];
    $school = $_POST['school'];
    $schoolEmail = $_POST['schoolEmail'];
    $password = $_POST['pw'];
    $profilePictureUrl = $_POST['avatarURL'];

    $dao = new userDAO();
    $status = $dao->addUser($firstName,$lastName,$genderID,$school,$schoolEmail,$password,$profilePictureUrl);
}

?>
<html>
<body>
    <?php
if ($status) {
    echo "<h1>USER Insertion was successful</h1>";
    echo "Click <a href='display.php'>here</a> to return to Main Page";
    // header("Location: ../../HTML/login.html?success=success");
    // exit;
} else {
    echo "<h1>USER Insertion was NOT successful</h1>";
    // header("Location: ../../HTML/login.html?success=failure");
    // exit;
}
?>
</body>
</html>