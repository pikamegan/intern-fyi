<?php

require_once 'common.php';
$dao = new reviewDAO();
$posts = $dao->getCompanyReviewsById($companyid); // Get an Indexed Array of Post objects

$reviews = [];
foreach( $posts as $post_object ) {
    $review = [];
    $review["companyID"] = $post_object->getcompanyid();
    $review["reviewID"] = $post_object->getreviewid();
    $review["jobTitle"] = $post_object->getjobtitle();
    $review["schoolEmail"] = $post_object->getschoolemail();
    $review["reviewDescription"] = $post_object->getreviewdesc();
    $review["overallRating"] = $post_object->getoverallrating();
    $review["postDateTime"] = $post_object->getpostdate();
    $reviews[] = $review;
}
// make posts into json and return json data
$postJSON = json_encode($reviews);
echo $postJSON;

?>

