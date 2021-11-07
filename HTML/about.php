<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script defer src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.3/dist/umd/popper.min.js" integrity="sha384-eMNCOe7tC1doHpGoWe/6oMVemdAVTMs2xqW4mwXrXsW0L84Iytr2wi5v2QjrP/xp" crossorigin="anonymous"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.min.js" integrity="sha384-cn7l7gDp0eyniUwwAZgrzD06kc/tftFf19TOAs2zVinnD/C7E91j9yyk5//jjpt/" crossorigin="anonymous"></script>
    -->
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <link rel="stylesheet" href="../CSS/style.css">
    <title>About Us</title>
    <script src="../js/actions.js" defer></script>
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
    <h1 class="pageTitle">About Us</h1>
    <div class="container-fluid" id="aboutUsDiv">
        <div class="row">
            <div class="col-lg-6 col-sm-12 p-lg-5">
                <div class="p-lg-5 ">
                    <h3 id="aboutUsH1" class="pt-5 mb-3">Hi there! We are a startup formed by a group of SMU students.</h3>
                    <p id="aboutUsP " class="">We started working together in 2021 to develop a website to help
                        interns find the most suitable internships based on their preferred criteria.
                        We hope this will encourage companies to develop positive internship experiences for their
                        interns.</p>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 m-0 p-0 text-center">
                <img id="smuImg" class="float-end img-fluid m-0 p-0 w-100 h-100" src="../IMG/smu_aboutus.svg">
            </div>
        </div>
    </div>
    <div class="container mt-5 mb-5">
        <h1 class="secondaryTitle ms-lg-4">Our Team</h1>
        <div class="row row-cols-4 ">
            <div class="col greybox ms-lg-4 m-auto mb-sm-3 mb-3" style="position:relative;">
                <div id="timSpeechBox" style="position:absolute;" class="speech hide float-left mx-6 mt-0 container-fluid">
                    <img src="../IMG/speechBubbleTim.svg" style="width: 100px; height: 100;" class="mx-5 img-fluid">
                </div>
                <div class="myDIV" id="tim" onclick="showSpeechBubble(this)">
                    <img class="mx-auto d-block my-2 ourFaces" src="../IMG/tim.svg">
                    <p class="text-center fw-bold">Tim</p>
                    <p class="text-center fw-lighter m-0">Back-End Developer</p>
                </div>
            </div>
            <div class="col greybox ms-lg-4 m-auto mb-sm-3 mb-3" style="position:relative;">
                <div id="patSpeechBox" style="position:absolute;" class="speech hide float-left mx-6 mt-0 container-fluid">
                    <img src="../IMG/speechBubblePat.svg" style="width: 100px; height: 100;" class="mx-5 img-fluid">
                </div>
                <div id="pat" onclick="showSpeechBubble(this)">
                    <img class="mx-auto d-block my-2" src="../IMG/patricia.svg">
                    <p class="text-center fw-bold">Patricia</p>
                    <p class="text-center fw-lighter m-0">Data Engineer & Designer</p>
                </div>
            </div>
            <div class="col greybox ms-lg-4 m-auto mb-sm-3 mb-3" style="position:relative;">
                <div id="meganSpeechBox" style="position:absolute;" class="speech hide float-left mx-6 mt-0 container-fluid">
                    <img src="../IMG/speechBubbleMegan.svg" style="width: 100px; height: 100;" class="mx-5 img-fluid">
                </div>
                <div id="megan" onclick="showSpeechBubble(this)">
                    <img class="mx-auto d-block my-2" src="../IMG/megan.svg">
                    <p class="text-center fw-bold">Megan</p>
                    <p class="text-center fw-lighter m-0">Javascript Developer</p>
                </div>
            </div>
            <div class="col greybox ms-lg-4 m-auto mb-sm-3 mb-3" style="position:relative;">
                <div id="estherSpeechBox" style="position:absolute;" class="speech hide float-left mx-6 mt-0 container-fluid">
                    <img src="../IMG/speechBubbleEsther.svg" style="width: 100px; height: 100;" class="mx-5 img-fluid">
                </div>
                <div id="esther" onclick="showSpeechBubble(this)">
                    <img class="mx-auto d-block my-2" src="../IMG/esther.svg">
                    <p class="text-center fw-bold">Esther</p>
                    <p class="text-center fw-lighter m-0">Test Engineer & Designer</p>
                </div>
            </div>
        </div>
    </div>
    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>



</body>

</html>