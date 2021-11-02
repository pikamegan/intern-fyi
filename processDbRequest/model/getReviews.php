<?php

require_once 'common.php';

$id = '';

if (isset($_GET['companyid'])) {
    $id = $_GET['companyid'];

    $dao = new reviewDAO();
    $post = $dao->getCompanyReviewsById($id); // Get an Indexed Array of Post objects

    $review = [];
    $review["companyID"] = $post->getcompanyid();
    $review["reviewID"] = $post->getreviewid();
    $review["jobTitle"] = $post->getjobtitle();
    $review["schoolEmail"] = $post->getschoolemail();
    $review["reviewDescription"] = $post->getreviewdesc();
    $review["overallRating"] = $post->getoverallrating();
    $review["postDateTime"] = $post->getpostdate();

    // make post into json and return json data
    var_dump($_GET['companyid']);
    $postJSON = json_encode($review);
    echo $postJSON;
}

?>



<?php
// require_once 'common.php';

// $dao = new reviewDAO();
// $post = $dao->getAll(); // Get an Indexed Array of Post objects

// $reviews = [];
// foreach ($post as $post) {
//     $review = [];
//     $review["companyID"] = $post->getcompanyid();
//     $review["reviewID"] = $post->getreviewid();
//     $review["jobTitle"] = $post->getjobtitle();
//     $review["schoolEmail"] = $post->getschoolemail();
//     $review["reviewDescription"] = $post->getreviewdesc();
//     $review["overallRating"] = $post->getoverallrating();
//     $review["postDateTime"] = $post->getpostdate();
//     $reviews[] = $review;
// }
// // make post into json and return json data
// $postJSON = json_encode($reviews);
// echo $postJSON;
?>



