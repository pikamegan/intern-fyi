<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
   
    <script type='text/javascript' src='../js/config.js'></script>
    <script src="../js/actions.js" defer></script>
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>


    <link rel="stylesheet" href="../CSS/style.css">
    <title>Company</title>

    <script>
        if (window.location.href.search("cid=") == -1) {
            window.location.assign('?cid=1')
        }
    </script>
</head>

<body onscroll="scrollFunction()" onload="loadCompanyPage()">


    <!-- copy this part: start-->
    <div class="navbarTemplate">
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

    <button id="scrollTop" onclick="scrollToTop()"><img src="../IMG/next_right.svg" alt="scroll to top"></button>

    <h1 class="pageTitle mt-5 companyName">Company Name</h1> <!-- changed with JS -->

    <div class="container mt-5">
        <div class="row mt-5 d-flex justify-content-around">
            <div class="col-10 col-sm-10 col-md-5 col-lg-5 aboutCompany">
                <div><img src="" id="companyPhoto" class="w-100 p-2" style="border-radius: 24px;"></div>

                <div class="d-flex bd-highlight">
                    <div class="p-2 flex-grow-1 bd-highlight companyName">Company Name</div> <!-- changed with JS -->
                    <div class="p-2 bd-highlight"><a href="" target="_blank" id="linkedinLink"><img src="../IMG/linkedin.svg" alt="LinkedIn logo"></a></div>
                </div>

                <div class="d-flex bd-highlight text-muted">
                    <div class="p-2 bd-highlight"><img src="../IMG/location_icon.svg" alt="location icon"></div>
                    <div class="p-2 bd-highlight" id="companyLocation">Location Name</div>
                </div>

                <h4 class="mt-3 mx-2">About the Company</h4>
                <p class="mt-3 mx-2 text-start fw-lighter" id="companyInfo">Lorem Ipsum is simply dummy text of the
                    printing and
                    typesetting industry. Lorem Ipsum has been the industry's standard dummy text ever since the 1500s
                </p>

                <div class="d-flex bd-highlight pt-2 mt-3 mb-2">
                    <div class="p-2 bd-highlight flex-grow-1" id="companyReviewNum"><img src="../IMG/review_icon.svg" alt="Review icon"></div>
                    <div class="p-2 bd-highlight"><a href="" target="_blank" id="companyWebsite" class="text-decoration-none text-muted">Job openings ></a>
                    </div>
                </div>
            </div>

            <!-- Criteria card -->
            <div class="col-10 col-sm-10 col-md-6 col-lg-6 aboutCompany">
                <h3 class="py-2 text-center" id="companyRating">Overall Rating: <img src="../IMG/star.svg" alt="star" class="d-inline-block"></h3>
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-3 mt-4 mb-3 d-flex justify-content-around">

                    <!-- Criteria 1 -->
                    <div class="col mt-1 mb-3">
                        <div class="hoverCard pay px-0 py-3 mb-2" style="border-radius: 10px; text-align: center; position: relative;">
                            <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                                <img src="../IMG/help.svg" class="preventSelect">
                                <span class="criteriaTooltipText">
                                    5 stars for good pay, relative to your job role
                                </span>
                            </div>
                            <div>
                                <img src="../IMG/PayRatingCategoryIcon.svg" class="preventSelect positionCard">
                            </div>

                            <h6 style="color: white;">Pay</h6>

                            <div class="d-flex align-items-center justify-content-center" style="background-color:#FBFCF7; margin-top:10px; height:70px;">
                                <img src="../IMG/star.svg" alt="star">
                                <p class="text-center m-0 px-2" id="payRating">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Criteria 2 -->
                    <div class="col mt-1 mb-3">
                        <div class="hoverCard skillsLearned px-0 py-3" style="border-radius: 10px; text-align: center; position: relative;">
                            <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                                <img src="../IMG/help.svg" class="preventSelect">
                                <span class="criteriaTooltipText">
                                    5 stars for learning useful work-related skills
                                </span>
                            </div>

                            <div>
                                <img class="preventSelect positionCard" src="../IMG/SkillEarnedRatingCategoryIcon.svg">
                            </div>

                            <h6 style="color: white;">Skills Learned</h6>

                            <div class="d-flex align-items-center justify-content-center" style="background-color:#FBFCF7; margin-top:10px; height:70px;">
                                <img src="../IMG/star.svg" alt="star">
                                <p class="text-center m-0 px-2" id="skillsRating">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Criteria 3 -->
                    <div class="col mt-1 mb-3">
                        <div class="hoverCard companyCulture px-0 py-3" style="border-radius: 10px; text-align: center; position: relative;">
                            <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                                <img src="../IMG/help.svg" class="preventSelect">
                                <span class="criteriaTooltipText">
                                    5 stars for friendliness and cohesion
                                </span>
                            </div>

                            <div>
                                <img src="../IMG/CompanyCultureRatingCategoryIcon.svg" class="preventSelect positionCard">
                            </div>

                            <h6 style="color: white;">Company Culture</h6>

                            <div class="d-flex align-items-center justify-content-center" style="background-color:#FBFCF7; margin-top:10px; height:70px;">
                                <img src="../IMG/star.svg" alt="star">
                                <p class="text-center m-0 px-2" id="cultureRating">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Criteria 4 -->
                    <div class="col mt-1 mb-3">
                        <div class=" hoverCard food px-0 py-3" style="border-radius: 10px; text-align: center; position: relative;">
                            <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                                <img src="../IMG/help.svg" class="preventSelect">
                                <span class="criteriaTooltipText">
                                    5 stars for reasonable food prices in the area
                                </span>
                            </div>

                            <div>
                                <img src="../IMG/FoodRatingCategoryIcon.svg" class="preventSelect positionCard">
                            </div>

                            <h6 style="color: white;">Food</h6>

                            <div class="d-flex align-items-center justify-content-center" style="background-color:#FBFCF7; margin-top:10px; height:70px;">
                                <img src="../IMG/star.svg" alt="star">
                                <p class="text-center m-0 px-2" id="foodRating">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Criteria 5 -->
                    <div class="col mt-1 mb-3">
                        <div class="hoverCard mentorship px-0 py-3" style="border-radius: 10px; text-align: center; position: relative;">
                            <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                                <img src="../IMG/help.svg" class="preventSelect">
                                <span class="criteriaTooltipText">
                                    5 stars for good guidance and superiors
                                </span>
                            </div>

                            <div>
                                <img src="../IMG/MentorshipRatingCategoryIcon.svg" class="preventSelect positionCard">
                            </div>

                            <h6 style="color: white;">Mentorship</h6>

                            <div class="d-flex align-items-center justify-content-center" style="background-color:#FBFCF7; margin-top:10px; height:70px;">
                                <img src="../IMG/star.svg" alt="star">
                                <p class="text-center m-0 px-2" id="mentorRating">5</p>
                            </div>
                        </div>
                    </div>

                    <!-- Criteria 6 -->
                    <div class="col mt-1 mb-3">
                        <div class="hoverCard flatHierarchy px-0 py-3" style="border-radius: 10px; text-align: center; position: relative;">
                            <div class="criteriaTooltip" style="position: absolute; left: 3px; top: 3px;">
                                <img src="../IMG/help.svg" class="preventSelect">
                                <span class="criteriaTooltipText">
                                    5 stars for respecting job roles and your internship role
                                </span>
                            </div>

                            <div>
                                <img src="../IMG/FlatHeirarchyRatingCategoryIcon.svg" class="preventSelect positionCard">
                            </div>

                            <h6 style="color: white;">Flat Hierarchy</h6>

                            <div class="d-flex align-items-center justify-content-center" style="background-color:#FBFCF7; margin-top:10px; height:70px;">
                                <img src="../IMG/star.svg" alt="star">
                                <p class="text-center m-0 px-2" id="hierarchyRating">5</p>
                            </div>
                        </div>
                    </div>



                </div>
            </div>
        </div>
    </div>

    <div class="container p-4">
        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-2 row-cols-lg-2">
            <div class="col pt-2 mt-3 mb-2">
                <div class="p-2 bd-highlight">
                    <h1 class="text-center" id="totalReviewNum">Reviews</h1>
                </div>
            </div>
            <div class="col pt-2 mt-3 mb-2">
                <div class="p-2 bd-highlight text-center">
                    <a href="" id="writeReviewBtn">
                        <button class="btn text-white customBtn attentionSeeking">
                            <h5 class="mb-0">Write a Review Now</h5>
                        </button>
                    </a>
                </div>
            </div>
        </div>

        <!-- reviews -->
        <div class="container mt-5 mb-5 p-5 shadow-lg rounded-3" id="reviewsBox">
            <!-- load reviews through javascript -->
        </div>
    </div>

    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>



</body>

</html>