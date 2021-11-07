<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>

    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../js/actions.js" defer></script>
    <title>Help and FAQ</title>
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
    <div class="p-5 mb-4" style="background-color: #EAF5FF;">
        <div class="container-fluid py-5">
            <div class="row">
                <div class="col col-4 col-lg-4">
                    <h1 class="pageTitle mt-5 mx-5" style="text-align:left">How can we help you?</h1>
                </div>
                <div class="col col-8 col-lg-8">
                    <div class="input-group mt-5 py-3 justify-content-left" style="border-bottom: 2px solid #4E6AF0;">
                        <img src="../IMG/search.svg"></img>
                        <input type="text" placeholder="Describe your issue" class="border-0 display-5 searchFAQ">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <div class="row row-cols-3">
            <div class="mx-auto mb-2 col-xs-12 col-sm-12 col-md-4 m-sm-4 shadow-lg ms-lg-4 whiteBox">
                <h2 class="pt-4 mx-2 text-start fw-bold" style="color: #4E6AF0;">Reviews</h2>
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action ">Question 1</a>
                    <a href="#" class="list-group-item list-group-item-action">Question 2</a>
                    <a href="#" class="list-group-item list-group-item-action">Question 3</a>
                    <a href="help/reviews.html" class="list-group-item list-group-item-action text-muted">View all
                        questions</a>
                </ul>
            </div>
            <div class="mx-auto mb-2 col-xs-12 col-sm-12 col-md-4 m-sm-4 shadow-lg ms-lg-4 whiteBox">
                <h2 class="pt-4 mx-2 text-start fw-bold" style="color: #4E6AF0;">Company Profile</h2>
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action">Question 1</a>
                    <a href="#" class="list-group-item list-group-item-action">Question 2</a>
                    <a href="#" class="list-group-item list-group-item-action">Question 3</a>
                    <a href="help/company.html" class="list-group-item list-group-item-action text-muted">View all
                        questions</a>
                </ul>
            </div>
            <div class="mx-auto mb-2 col-xs-12 col-sm-12 col-md-4 m-sm-4 shadow-lg ms-lg-4 whiteBox">
                <h2 class="pt-4 mx-2 text-start fw-bold" style="color: #4E6AF0;">Policies</h2>
                <ul class="list-group list-group-flush">
                    <a href="#" class="list-group-item list-group-item-action ">Question 1</a>
                    <a href="#" class="list-group-item list-group-item-action">Question 2</a>
                    <a href="#" class="list-group-item list-group-item-action">Question 3</a>
                    <a href="help/policy.html" class="list-group-item list-group-item-action text-muted">View all
                        questions</a>
                </ul>
            </div>
        </div>
    </div>
    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>


</body>

</html>