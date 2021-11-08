<?php

require_once 'common.php';

class userDAO
{

    public function getUserByEmail($userEmail)
    {
        // STEP 1
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // STEP 2
        $sql = "SELECT
                    *
                FROM intern
                WHERE
                schoolEmail = :userEmail";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':userEmail', $userEmail, PDO::PARAM_STR);

        // STEP 3
        $stmt->execute();
        $stmt->setFetchMode(PDO::FETCH_ASSOC);

        // STEP 4
        $user_object = null;
        if ($row = $stmt->fetch()) {
            $user_object =
            new user(
                $row['firstName'],
                $row['lastName'],
                $row['genderID'],
                $row['country'],
                $row['school'],
                $row['schoolEmail'],
                $row['password'],
                $row['profilePictureUrl'],
                $row['reviewsNo']);
        }

        // CREATE TABLE `intern` (
        //     `firstName` varchar(50) NOT NULL,
        //     `lastName` varchar(50) NOT NULL,
        //     `genderID` varchar(1) NOT NULL,
        //     `country` varchar(100) NOT NULL,
        //     `school` varchar(100) NOT NULL,
        //     `schoolEmail` nvarchar(255) NOT NULL,
        //     `password` nvarchar(50) NOT NULL,
        //     `profilePictureUrl` varchar(2083) NOT NULL,
        //     `reviewsNo` int NOT NULL,)

        // STEP 5
        $stmt = null;
        $conn = null;

        // STEP 6
        return $user_object;
    }

    public function addUser($firstName, $lastName, $genderID, $school, $schoolEmail, $password, $profilePictureUrl)
    {

        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $imgGirl = ['../IMG/avatar7.svg', '../IMG/avatar3.svg', '../IMG/avatar5.svg', '../IMG/avatar6.svg', '../IMG/avatar9_female.svg', '../IMG/avatar10_female.svg', '../IMG/avatar15_female.svg'];
        $imgMale = ['../IMG/avatar1.svg', '../IMG/avatar2.svg', '../IMG/avatar4.svg', '../IMG/avatar8.svg', '../IMG/avatar11_male.svg', '../IMG/avatar12_male.svg', '../IMG/avatar13_male.svg', '../IMG/avatar14_male.svg'];

        $url = '';
        if ($genderID == "M") {
            $randomNum = rand(0,count($imgGirl)-1);
            $url = $imgGirl[$randomNum];
        }else{
            $randomNum = rand(0,count($imgMale)-1);
            $url = $imgMale[$randomNum];
        }

        $sql = "INSERT INTO `intern`(`firstName`, `lastName`, `genderID`, `country`, `school`, `schoolEmail`, `password`, `profilePictureUrl`, `reviewsNo`) VALUES (:firstName,:lastName,:genderID, 'Singapore' ,:school,:schoolEmail,:password,:profilePictureUrl,0)";

        // STEP 2
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':firstName', $firstName, PDO::PARAM_STR);
        $stmt->bindParam(':lastName', $lastName, PDO::PARAM_STR);
        $stmt->bindParam(':genderID', $genderID, PDO::PARAM_STR);
        $stmt->bindParam(':school', $school, PDO::PARAM_STR);
        $stmt->bindParam(':schoolEmail', $schoolEmail, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        $stmt->bindParam(':profilePictureUrl', $url, PDO::PARAM_STR);
        //STEP 3
        $status = $stmt->execute();

        // STEP 4
        $stmt = null;
        $conn = null;

        // STEP 5
        return $status;
    }

    public function authenticate($email, $password)
    {
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        $sql = "SELECT * FROM `intern` WHERE schoolEmail = :email and password=:password";

        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);

        $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $stmt->execute();

        $user_object = null;
        if ($row = $stmt->fetch()) {
            $user_object =
            new user(
                $row['firstName'],
                $row['lastName'],
                $row['genderID'],
                $row['country'],
                $row['school'],
                $row['schoolEmail'],
                $row['password'],
                $row['profilePictureUrl'],
                $row['reviewsNo']);
        }

        $stmt = null;
        $conn = null;

        return $user_object;
    }

    public function updatePassword($email, $password)
    {
        // Code here
        $result = true;

        // connect to database
        $connMgr = new ConnectionManager();
        $conn = $connMgr->getConnection();

        // prepare update
        $sql = "UPDATE intern set password =:password where schoolEmail = :email";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);
        $stmt->bindParam(':password', $password, PDO::PARAM_STR);
        

        $result = $stmt->execute();
        // close connections
        $stmt = null;
        $conn = null;

        return $result;

    }
}
