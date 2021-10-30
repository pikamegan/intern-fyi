
<?php

class review
{
    private $companyid;
    private $reviewid;
    private $jobtitle;
    private $schoolemail;
    private $reviewdesc;
    private $overallrating;
    private $criteria1;
    private $criteria2;
    private $criteria3;
    private $criteria4;
    private $criteria5;
    private $criteria6;
    private $totalup;
    private $totaldown;
    private $isvulgar;

    public function __construct($companyid, $reviewid, $jobtitle, $schoolemail, $reviewdesc, $overallrating, $criteria1, $criteria2, $criteria3, $criteria4, $criteria5, $criteria6, $totalup, $totaldown, $isvulgar)
    {
        $this->companyid = $companyid;
        $this->reviewid = $reviewid;
        $this->jobtitle = $jobtitle;
        $this->schoolemail = $schoolemail;
        $this->reviewdesc = $reviewdesc;
        $this->overallrating = $overallrating;
        $this->criteria1 = $criteria1;
        $this->criteria2 = $criteria2;
        $this->criteria3 = $criteria3;
        $this->criteria4 = $criteria4;
        $this->criteria5 = $criteria5;
        $this->criteria6 = $criteria6;
        $this->totalup = $totalup;
        $this->totaldown = $totaldown;
        $this->isvulgar = $isvulgar;
    }

    public function getcompanyid()
    {
        return $this->companyid;
    }

    public function getreviewid()
    {
        return $this->reviewid;
    }

    public function getjobtitle()
    {
        return $this->jobtitle;
    }

    public function getschoolemail()
    {
        return $this->schoolemail;
    }

    public function getreviewdesc()
    {
        return $this->reviewdesc;
    }

    public function getoverallrating()
    {
        return $this->overallrating;
    }

    public function getcriteria1()
    {
        return $this->criteria1;
    }

    public function getcriteria2()
    {
        return $this->criteria2;
    }

    public function getcriteria3()
    {
        return $this->criteria3;
    }

    public function getcriteria4()
    {
        return $this->criteria4;
    }

    public function getcriteria5()
    {
        return $this->criteria5;
    }

    public function getcriteria6()
    {
        return $this->criteria6;
    }

    public function gettotalup()
    {
        return $this->totalup;
    }

    public function gettotaldown()
    {
        return $this->totaldown;
    }

    public function  getisvulgar()
    {
        return $this->isvulgar;
    }

}

?>