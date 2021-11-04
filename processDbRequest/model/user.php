<?php

class user
{
    private $firstName;
    private $lastName;
    private $genderID;
    private $country;
    private $school;
    private $schoolEmail;
    private $password;
    private $profilePictureUrl;
    private $reviewsNo;

    public function __construct($firstName,$lastName,$genderID,$country,$school,$schoolEmail,$password,$profilePictureUrl,$reviewsNo)
    {
        $this->firstName = $firstName;
        $this->lastName = $lastName;
        $this->genderID = $genderID;
        $this->country = $country;
        $this->school = $school;
        $this->schoolEmail = $schoolEmail;
        $this->password = $password;
        $this->profilePictureUrl = $profilePictureUrl;
        $this->reviewsNo = $reviewsNo;
    }




    /**
     * Get the value of firstName
     */ 
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Get the value of lastName
     */ 
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Get the value of genderID
     */ 
    public function getGenderID()
    {
        return $this->genderID;
    }

    /**
     * Get the value of country
     */ 
    public function getCountry()
    {
        return $this->country;
    }

    /**
     * Get the value of school
     */ 
    public function getSchool()
    {
        return $this->school;
    }

    /**
     * Get the value of schoolEmail
     */ 
    public function getSchoolEmail()
    {
        return $this->schoolEmail;
    }

    /**
     * Get the value of password
     */ 
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Get the value of profilePictureUrl
     */ 
    public function getProfilePictureUrl()
    {
        return $this->profilePictureUrl;
    }

    /**
     * Get the value of reviewsNo
     */ 
    public function getReviewsNo()
    {
        return $this->reviewsNo;
    }
}

?>
