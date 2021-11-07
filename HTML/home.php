<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <!-- JavaScript for CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="../js/actions.js" defer></script>
    <title>Intern FYI</title>
    <style>
        .show-read-more .more-text {
            display: none;
        }

        img.positionCard {
            height: 80px;
            margin-top: 20px;
            margin-bottom: 10px;
        }

        div.cardBold {
            font-weight: 900;
        }

        .criteriaTooltip .criteriaTooltipText {
            visibility: hidden;
            width: 140px;
            background-color: rgba(0, 0, 0, 0.8);
            color: #fff;
            text-align: center;
            padding: 2px;
            border-radius: 10px;

            position: absolute;
            z-index: 1;

            /* option 1: without anything */

            /* i think option 2 looks the best tbh, maybe yall want to change the color */

            /* option 2: cover the whole card */
            width: 168px;
            height: 222px;
            border-radius: 10px;
            top: -3px;
            left: -3px;
            padding: 10px;

            /* option 3: top of the card */
            /* bottom: 105%;
            left: 50%; */
        }

        .criteriaTooltip:hover .criteriaTooltipText {
            visibility: visible;
        }
    </style>
</head>
<body>
    <!-- copy this part: start-->
    <div class ="navbarTemplate">
        <div id="smallNavBar">
            <?php
                session_start();
            
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    echo "<navigation-bar-small-login></navigation-bar-small-login>";
                } else {
                    echo "<navigation-bar-small-logout></navigation-bar-small-logout>";
                }
            ?>
        </div>
        <div id="bigNavBar">
            <?php
                if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                    $url = $_SESSION['piclink'];
                    echo "<navigation-bar-big-login>
                    <img class='img-fluid m-0' src= '$url' style='width: 60px; height: 60px;'>
                    </navigation-bar-big-login>";
                } else {
                    echo "<navigation-bar-big-logout></navigation-bar-big-logout>";
                }
            ?>
        </div>
    </div>
    <!-- copy this part: end -->
    
    <div class="container">

        <div class="row mt-2">
            <div class="col-3 d-none d-xl-block d-xxl-block">
                <img style="height:600px; z-index: -1;" class="preventSelect" src="../img/Saly-15.svg">
                <!-- <img style="height:600px; z-index: -1;" class="preventSelect" src="../img/climbingBoy_cropped.svg"> -->
            </div>
            <div class="col">
                <div class="container">
                    <div class="row mb-1">
                        <div class="col">
                            <h3 style="text-align: center" class="text-uppercase fw-bolder homeHeader">
                                Best intern review site around
                            </h3>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <h1 class="homeBlueTitle">
                                Climb Higher with Intern FYI
                            </h1>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="col">
                            <h4 class="indexText">
                                Thousands of students are searching for internship, internal information, company
                                reviews, and
                                company culture. See what others are looking for on Intern.FYI today.
                            </h4>
                        </div>
                    </div>
                    <div class="row mb-5">
                        <div class="text-center col">
                            <button class="btn btn-primary" onclick="location.href='../HTML/WriteAReview.html';">Write a
                                Review Now</button>
                        </div>
                    </div>
                    <div class="row mb-1">
                        <div class="col">
                            <h3 class="homeHeader">How Intern.FYI Works for You</h3>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="row mb-5 shadow">
            <div class="col-md-3 col-6 my-3 text-center" onclick="location.href='../HTML/search.php';">
                <img src="../img/search.svg" class="preventSelect p-2">
                <p class="indexText">Find the right<br>Internship</p>
            </div>
            <div class="col-md-3 col-6 my-3 text-center" onclick="location.href='../HTML/WriteAReview.html';">
                <img src="../img/chat.svg" class="preventSelect p-2">
                <p class="indexText">Review<br>Companies</p>
            </div>
            <div class="col-md-3 col-6 my-3 text-center">
                <img src="../img/read.svg" class="preventSelect p-2">
                <p class="indexText">Read<br>Reviews</p>
            </div>
            <div class="col-md-3 col-6 my-3 text-center">
                <img src="../img/eye.svg" class="preventSelect p-2 pt-3 pb-4">
                <p class="indexText">Compare<br>Companies</p>
            </div>
        </div>

        <div class="row mb-5">
            <div class="col align-self-start">
                <h4 class="homeHeader">Rank by Category</h4>
            </div>
        </div>
        <!-- WIP -->
        <div class="row shadow mb-5 pt-3">

            <div class="col-xl-2 col-md-4 col-6 px-0 mb-3">
                <div class="mx-auto pay"
                    style="width: 168px;height: 222px; border-radius: 10px; text-align: center; position: relative;">
                    <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                        <img src="../img/help.svg" class="preventSelect">
                        <span class="criteriaTooltipText help">
                            5 stars for good pay, relative to your job role
                        </span>
                    </div>
                    <div>
                        <img src="../img/PayRatingCategoryIcon.svg" class="preventSelect positionCard">
                        <!-- 
                            <img src="../img/PayRatingCategoryIcon.svg" class="preventSelect positionCard">
                            <img src="../img/SkillEarnedRatingCategoryIcon.svg" class="preventSelect positionCard">
                            <img src="../img/CompanyCultureRatingCategoryIcon.svg" class="preventSelect positionCard">
                            <img src="../img/FoodRatingCategoryIcon.svg" class="preventSelect positionCard">
                            <img src="../img/MentorshipRatingCategoryIcon.svg" class="preventSelect positionCard">
                            <img src="../img/FlatHeirarchyRatingCategoryIcon.svg" class="preventSelect positionCard"> 
                        -->
                    </div>

                    <h6 style="color: white;">Pay</h6>

                    <div style="background-color:white;margin-top:10px;height: 70px;padding-top: 10px;">
                        <div>
                            The company <div class="cardBold">pays well</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 px-0 mb-3">
                <div class="mx-auto skillsLearned"
                    style="width: 168px;height: 222px; border-radius: 10px; text-align: center; position: relative;">
                    <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                        <img src="../img/help.svg" class="preventSelect">
                        <span class="criteriaTooltipText help">
                            5 stars for learning useful work reated skills
                        </span>
                    </div>

                    <div>
                        <img class="preventSelect positionCard" src="../img/SkillEarnedRatingCategoryIcon.svg">
                    </div>

                    <h6 style="color: white;">Skills Learned</h6>

                    <div style="background-color:white;margin-top:10px;height: 70px;">
                        <div>
                            The company helped me learn <div class="cardBold">new skills</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 px-0 mb-3">
                <div class="mx-auto companyCulture"
                    style="width: 168px;height: 222px; border-radius: 10px; text-align: center; position: relative;">
                    <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                        <img src="../img/help.svg" class="preventSelect">
                        <span class="criteriaTooltipText help">
                            5 stars for friendliness and cohesion
                        </span>
                    </div>

                    <div>
                        <img src="../img/CompanyCultureRatingCategoryIcon.svg" class="preventSelect positionCard">
                    </div>

                    <h6 style="color: white;">Company Culture</h6>

                    <div style="background-color:white;margin-top:10px;height: 70px;">
                        <div>
                            <div class="cardBold">The company's level of cohesion and friendliness</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-2 col-md-4 col-6 px-0 mb-3">
                <div class="mx-auto food"
                    style="width: 168px;height: 222px; border-radius: 10px; text-align: center; position: relative;">
                    <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                        <img src="../img/help.svg" class="preventSelect">
                        <span class="criteriaTooltipText help">
                            5 stars for reasonable food prices in the area
                        </span>
                    </div>

                    <div>
                        <img src="../img/FoodRatingCategoryIcon.svg" class="preventSelect positionCard">
                    </div>

                    <h6 style="color: white;">Food</h6>

                    <div style="background-color:white;margin-top:10px;height: 70px;padding-top: 10px;">
                        <div>
                            <div class="cardBold">The price of nearby food</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 px-0 mb-3">
                <div class="mx-auto mentorship"
                    style="width: 168px;height: 222px; border-radius: 10px; text-align: center; position: relative;">
                    <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                        <img src="../img/help.svg" class="preventSelect">
                        <span class="criteriaTooltipText help">
                            5 stars for good guidance and superiors
                        </span>
                    </div>

                    <div>
                        <img src="../img/MentorshipRatingCategoryIcon.svg" class="preventSelect positionCard">
                    </div>

                    <h6 style="color: white;">Mentorship</h6>

                    <div style="background-color:white;margin-top:10px;height: 70px;padding-top: 3px;">
                        <div style="font-size: 14px;">
                            The Company provides <div class="cardBold">in-person training or mentorship</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-2 col-md-4 col-6 px-0 mb-3">
                <div class="mx-auto flatHierarchy"
                    style="width: 168px;height: 222px; border-radius: 10px; text-align: center; position: relative;">
                    <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                        <img class="help" src="../img/help.svg" class="preventSelect">
                        <span class="criteriaTooltipText help">
                            5 stars for respecting job roles and your internship role
                        </span>
                    </div>

                    <div>
                        <img src="../img/FlatHeirarchyRatingCategoryIcon.svg" class="preventSelect positionCard">
                    </div>

                    <h6 style="color: white;">Flat Hierarchy</h6>

                    <div style="background-color:white;margin-top:10px;height: 70px;">
                        <div>
                            <div class="cardBold">The company maintains little hierarchy</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- WIP -->

        <div class="row mb-5">
            <div class="col align-self-start">
                <h4 class="homeHeader">Trending Companies</h4>
            </div>
        </div>

        <div class="appHome">
            <div class="row mb-5 shadow">
                <company-card v-for="company in rand4companies" :companyinfo="homeCompanyCardsRelavantInfo(company)">
                </company-card>
            </div>
        </div>
    </div>

    <!-- rand 1 not working for some reason -->
    <!-- <company-card :companyinfo="one()"></company-card> -->
    <!-- <company-card :companyinfo="homeCompanyCardsRelavantInfo(rand1company())"></company-card> -->

    <div class="footerComp" style="margin-top: 50px;">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php"></intern-footer>
    </div>
</body>

</html>