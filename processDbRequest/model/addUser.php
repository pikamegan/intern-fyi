<?php

require_once 'common.php';
require_once "./userDAO.php";

$status = false;
var_dump($_POST);

if (isset($_POST['']) && isset($_POST[''])) {
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
    echo "<h1>Insertion was successful (User Created)</h1>";
    echo "Click <a href='display.php'>here</a> to return to Main Page";
} else {
    echo "<h1>Insertion was NOT successful</h1>";

}

// header("Location: Go to home html");
// exit;

?>
</body>
</html>