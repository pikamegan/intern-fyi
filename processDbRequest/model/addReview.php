<?php
require_once 'common.php';
$status = false;
$result = [];

if (isset($_POST['companyid']) && isset($_POST['jobtitle'])&& isset($_POST['schoolemail'])&& isset($_POST['reviewdesc'])&& isset($_POST['overallrating'])&& isset($_POST['criteria1'])&& isset($_POST['criteria2'])&& isset($_POST['criteria3'])&& isset($_POST['criteria4'])&& isset($_POST['criteria5'])&& isset($_POST['criteria6'])) {
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

    $result["reviewdesc"] = $reviewdesc;


    $dao = new reviewDAO();
    $status = $dao->add($companyid, $jobtitle, $schoolemail, $reviewdesc, $overallrating,$criteria1,$criteria2, $criteria3, $criteria4, $criteria5, $criteria6);

} else {
    try {
        $json = file_get_contents('php://input');
        $data = json_decode($json);


        $companyid = $data->companyid;
        $jobtitle = $data-> jobtitle;
        $schoolemail = $data-> schoolemail;
        $reviewdesc = $data-> reviewdesc;
        $overallrating = $data-> overallrating;
        $criteria1 = $data-> criteria1;
        $criteria2 = $data-> criteria2;
        $criteria3 = $data-> criteria3;
        $criteria4 = $data-> criteria4;
        $criteria5 = $data-> criteria5;
        $criteria6 = $data-> criteria6;

        $result["reviewdesc"] = $reviewdesc;

        $dao = new PostDAO();
        $status = $dao->add($subject, $entry, $mood);

    } catch (Exception $e) {
        $status = false;
    }

}

if ($status) {
    $result["status"] = "Post added successfully";
} else {
    $result["status"] = "Post was not added";
}

$postJSON = json_encode($result);
echo $postJSON;
