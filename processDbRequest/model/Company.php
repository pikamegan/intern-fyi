<?php
class Company
{
    public $companyID;
    public $companyName;
    public $companyInfo;
    public $companyRatings;
    public function __construct(
        $companyID,
        $companyName,

        $companyDescription,
        $companyLinkedinLink,
        $companyWebsite,
        $industry,
        $imageLink,
        $location,

        $numberOfClicks,
        $totalNumReviews,
        $overallRating,
        $averageCriteria1,
        $averageCriteria2,
        $averageCriteria3,
        $averageCriteria4,
        $averageCriteria5,
        $averageCriteria6
        )
    {
        $this->companyID = $companyID;
        $this->companyName = $companyName;
        $this->companyInfo = (object) array(
            'companyDescription' => $companyDescription,
            'companyLinkedinLink' => $companyLinkedinLink,
            'companyWebsite' => $companyWebsite,
            'industry' => $industry,
            'imageLink' => $imageLink,
            'location' => $location
        );
        $this->companyRatings = (object) array(
            'numberOfClicks' => $numberOfClicks,
            'totalNumReviews' => $totalNumReviews,
            'overallRating' => $overallRating,
            'averageCriteria1' => $averageCriteria1,
            'averageCriteria2' => $averageCriteria2,
            'averageCriteria3' => $averageCriteria3,
            'averageCriteria4' => $averageCriteria4,
            'averageCriteria5' => $averageCriteria5,
            'averageCriteria6' => $averageCriteria6
        );
    }
}
?>
