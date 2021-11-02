<?php
spl_autoload_register(
    function ($class) {
        require_once "model/$class.php";
    }
);
?>

<?php

// to be changed
header("Access-Control-Allow-Origin: *");

if (isset($_GET['request'])) {

    $requestName = $_GET['request'];
    $companyid = $_GET['companyid'];

    if ($requestName == 'getAllReviews') {
        $dao = new reviewDAO();
        $allReviews = $dao->getCompanyReviewsById($companyid);
        echo json_encode($allReviews);
    }
}
?>