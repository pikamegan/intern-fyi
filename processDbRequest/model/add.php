<?php

function validate_rating($input) {
  return is_numeric($input) && $input <= 5 && $input >= 1;
}

require_once 'common.php';
require_once "./reviewDAO.php";

$status = false;
// var_dump($_POST);

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
  // echo $criteria6;

    if (validate_rating($overallrating) && validate_rating($criteria1) && validate_rating($criteria2) && validate_rating($criteria3) && validate_rating($criteria4) && validate_rating($criteria5) && validate_rating($criteria6)) {
      $dao = new reviewDAO();
      $status = $dao->addreview($companyid, $jobtitle, $schoolemail, $reviewdesc, $overallrating, $criteria1, $criteria2, $criteria3, $criteria4, $criteria5, $criteria6);
      var_dump($status);
    }
}

if ($status) {
  header("Location: ../../HTML/company.php?cid=$companyid");
  exit;
} else {
  header("Location: ../../HTML/company.php?cid=$companyid");
  exit;
}
