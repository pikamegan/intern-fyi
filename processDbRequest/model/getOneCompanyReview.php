<?php
require_once 'common.php';

$companyNo = "";

if (isset($_GET['companyNo'])){
    $companyNo = $_GET['companyNo'];
    $dao = new reviewDAO();
    $reviewofcompany = $dao->getCompanyReviewsById($companyNo); // Get an Indexed Array of Post objects
    
    $reviews = [];
    var_dump($reviewofcompany);

    
    $review = [];
    $review["companyID"] = $reviewofcompany-> getcompanyid();
    $review["reviewID"] = $reviewofcompany-> getreviewid();
    $review["jobTitle"] = $post-> etjobtitle();
    $review["schoolEmail"] = $reviewofcompany-> getschoolemail();
    $review["reviewDescription"] = $reviewofcompany->getreviewdesc();
    $review["overallRating"] = $reviewofcompany-> getoverallrating();
    $review["postDateTime"] = $reviewofcompany-> getpostdate();
    $reviews[] = $review;
    
    // make post into json and return json data
    $postJSON = json_encode($reviews);
    echo $postJSON;
}



?>
