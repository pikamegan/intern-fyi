<?php
require_once 'common.php';

$dao = new reviewDAO();
$post = $dao->getAll(); // Get an Indexed Array of Post objects

$companyNo = $_GET['companyNo'];

$reviews = [];
foreach ($post as $post) {
    $review = [];
    $review["companyID"] = $post->getcompanyid();
    if ($review["companyID"] == $companyNo) {
        $review["reviewID"] = $post->getreviewid();
        $review["jobTitle"] = $post->getjobtitle();
        $review["schoolEmail"] = $post->getschoolemail();
        $review["reviewDescription"] = $post->getreviewdesc();
        $review["overallRating"] = $post->getoverallrating();

        $review["criteria1"] = $post->getcriteria1();
        $review["criteria2"] = $post->getcriteria2();
        $review["criteria3"] = $post->getcriteria3();
        $review["criteria4"] = $post->getcriteria4();
        $review["criteria5"] = $post->getcriteria5();
        $review["criteria6"] = $post->getcriteria6();

        $review["postDateTime"] = $post->getpostdate();
        $reviews[] = $review;
    }
}
// make post into json and return json data
$postJSON = json_encode($reviews);
echo $postJSON;
?>



