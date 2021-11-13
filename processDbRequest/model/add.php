<?php

require_once 'common.php';
require_once "./reviewDAO.php";

$status = false;
var_dump($_POST);

if (isset($_POST['companyid']) && isset($_POST['jobtitle']) && isset($_POST['schoolemail']) && isset($_POST['reviewdesc']) && isset($_POST['overallrating']) && isset($_POST['criteria1']) && isset($_POST['criteria2']) && isset($_POST['criteria3']) && isset($_POST['criteria4']) && isset($_POST['criteria5']) && isset($_POST['criteria6'])) {
    $companyid = $_POST['companyid'];
    $jobtitle = $_POST['jobtitle'];
    $schoolemail = $_POST['schoolemail'];
    $reviewdesc = $_POST['reviewdesc'];
    $overallrating = $_POST['overallrating'];
    $criteria1 = $_POST['criteria1'];
    $criteria2 = $_POST['criteria2'];
    $criteria3 = $_POST['criteria3'];
    $criteria4 = $_POST['criteria4'];
    $criteria5 = $_POST['criteria5'];
    $criteria6 = $_POST['criteria6'];
    echo $criteria6;

    $dao = new reviewDAO();
    $status = $dao->addreview($companyid, $jobtitle, $schoolemail, $reviewdesc, $overallrating, $criteria1, $criteria2, $criteria3, $criteria4, $criteria5, $criteria6);
    echo $status;
  }

?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <title>Review Submission Status</title>
  </head>
  <body>
    <h1>Hello, world!</h1>
    <?php
if ($status) {
    echo "<h1>Insertion was successful</h1>";
    echo "Click <a href='display.php'>here</a> to return to Main Page";
    header("Location: ../../HTML/company.php?cid=$companyid");
    exit;
} else {
    echo "<h1>Insertion was NOT successful</h1>";
    header("Location: ../../HTML/company.php?cid=$companyid");
    exit;

}

?>
</body>
</html>
