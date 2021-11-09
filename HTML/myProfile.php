<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../js/actions.js" defer></script>
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <title>Your Profile</title>
</head>

<body>
    <!-- copy this part: start-->
    <div class="navbarTemplate">
        <div id="smallNavBar">
            <?php
session_start();

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    echo "<navigation-bar-small-login></navigation-bar-small-login>";
} else {
    header("Location: ./home.php");
    exit();
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
    header("Location: ./home.php");
    exit();
}
?>
        </div>
    </div>
    <!-- copy this part: end -->

    <h1 class="pageTitle my-5">Your Profile</h1>
    <?php

require_once '../processDbRequest/model/common.php';
$firstName = "";
$lastName = "";
$genderID = "";
$country = "";
$school = "";
$schoolEmail = "";
$profilePictureUrl = "";
$reviewsNo = "";

if (isset($_SESSION['email'])) {
    $dao = new userDAO();
    $userObj = $dao->getUserByEmail($_SESSION['email']);
    $firstName = $userObj->getFirstName();
    $lastName = $userObj->getLastName();
    $genderID = $userObj->getGenderID();
    $country = $userObj->getCountry();
    $school = $userObj->getSchool();
    $schoolEmail = $userObj->getSchoolEmail();
    $profilePictureUrl = $userObj->getProfilePictureUrl();
    $reviewsNo = $userObj->getReviewsNo();

}

?>
    <div class="container-fluid m-3 profile">
        <div class="row" >
            <div class="col col-12 col-lg-6 ">
                <div class="row personProfile shadow rounded rounded-3 container mb-3" style="width: 100%;">
                    <span style="position:absolute;right:0;top:-15px"><i class="bi bi-pencil fill-secondary"></i></span>
                    <div class="col col-sm-12 col-md-12 col-lg-6">
                        <!-- How to vertically align image? -->
                        <?php
                        
                        if (isset($_SESSION['piclink'])) {
                            $pic = $_SESSION['piclink'];
                            echo "<img src='$pic' style='width: 75%; height: 75%; border-radius: 50%;' class='m-3'>";
                        }

                        ?>
            
                    </div>
                    <div class="col col-12 col-xl-6">
                        <span style="position:absolute;right:0;top:-15px"></span>
                        <div class="m-5">
                            <?php

                                if ($firstName !== "" && $lastName !== "") {
                                    echo "<h3 class='text-start my-5'>$firstName $lastName</h3>";
                                }

                            ?>

                            <p style='font-weight: bold'>
                                <?php
                                    if ($genderID !== "" and $genderID == "M") {;
                                        echo "<span id='profileGender'>Male</span>";
                                    } elseif ($genderID !== "" and $genderID == "F") {
                                        echo "<span id='profileGender'>Female</span>";
                                    } elseif ($genderID !== "" and $genderID == "O") {
                                        echo "<span id='profileGender'>Other</span>";
                                    }
                                ?>

                            </p>

                            <p>Email:
                                <?php
                                    if ($schoolEmail !== "") {
                                        echo "<p class = 'underline' id='profileEmailAddress'>$schoolEmail</p>";
                                    }
                                ?>

                            </p>

                            <p>Password: <span id="profilePW">
                                <p class = "underline">********
                                    <span>
                                    <!-- <img class="text-end" src= "../IMG/changePWpen.svg" style="width: 100px; height: 50px; display: block-inline;" onclick="changePw()"> -->
                                    </span>
                                </p>
                            </span></p>
                        </div>

                    </div>
                </div>

            </div>
            <div class="col col col-12 col-lg-6">
                <!-- <div class="container m-0"> -->

                    <!-- University --> 
                    <div class="row h-50">
                        <div class="col col-12 text-center h-100">
                            <div class="shadow rounded rounded-3 mb-3 p-5 h-100 text-center">
                                <?php
                                    if ($school !== "") {
                                        echo "

                                            <div style='display: table; height: 70%; width: 100%; table-layout: auto'> 
                                                <div style='display: table-cell; width: 100%; vertical-align: middle; text-align: center;'>
                                                    <h1>University</h1>
                                                </div>
                                            </div>
                                            
                                            <p style='height: 30%'>$school</p>
                                        "; 

                                    } 
                                ?>

                            </div>
                        </div>
                    </div>

                    <!-- Country -->
                    <div class="row h-50">
                        <div class="col col-12 text-center">                            
                            <div class="shadow rounded rounded-3 mb-3 p-5 h-100">

                                <?php
                                        if ($country !== "") {

                                            echo "

                                                <div style='display: table; height: 70%; width: 100%; table-layout: auto'> 
                                                    <div style='display: table-cell; width: 100%; vertical-align: middle; text-align: center;'>
                                                        <h1>Country</h1>
                                                    </div>
                                                </div>
                                                <p style='height: 30%'>$country</p>
                                            "; 

                                        } 
                                    ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>
    <script>
        Vue.createApp({
            data() {
                return {
                    name: ''
                }
            },
            created() { // created is a hook that executes as soon as Vue instance is created

            }
        }).mount('.profile')
    </script>


</body>

</html>