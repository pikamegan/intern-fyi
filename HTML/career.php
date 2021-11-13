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

    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="../js/actions.js" defer></script>
    <title>Careers</title>

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

    <h1 class="pageTitle mt-5">Careers</h1>
    <div class="container mt-5 m-auto center">
        <h1 class="secondaryTitle ms-lg-4">Why work with us</h1>
        <div class="row mt-5 mx-auto">
            <div class="mx-auto mb-2 col-xs-12 col-sm-12 col-md-4 m-sm-4 shadow-lg ms-lg-4 whiteBox">
                <div class="text-center smallBox mt-5 mb-3 smallPurpleBox smallBox">Good Pay</div>
                <p class="mx-2 text-start fw-bold">Competitive Pay</p>
                <p class="mx-2 text-start fw-lighter m-0">We offer the best pay in the industry! We will never underpay or undercut you. Because we value your skills.
                </p>
            </div>
            <div class="mx-auto mb-2 col-xs-12 col-sm-12 col-md-4 m-sm-4 bigGreyBox ms-lg-4">
                <div class="text-center mx-2 smallBox mt-5 mb-3 smallOrangeBox smallBox">Friendly Office</div>
                <p class="mx-2 text-start fw-bold">Nice People</p>
                <p class="mx-2 text-start fw-lighter m-0">Our company believes in creating an inclusive environment. Any toxic employees are immediately fired. We believe in low hierarchy and positive vibes. 
                </p>
            </div>
            <div class="mx-auto mb-2 col-xs-12 col-sm-12 col-md-4 m-sm-4 bigGreyBox ms-lg-4">
                <div class="text-center mx-2 smallBox mt-5 mb-3 smallGreenBox smallBox">Free Food</div>
                <p class="mx-2 text-start fw-bold">Corporate Cafeteria</p>
                <p class="mx-2 text-start fw-lighter m-0">We believes in providing free food and drinks for our hard working employees.
                </p>
            </div>
        </div>
    </div>
    <br>
    <br>
    <div class="container-fluid mt-3 mb-5 careerDiv">
        <div class="row">
            <div class="col-sm-12 col-lg-5 col-md-12">
                <img class="img-fluid p-5 mx-auto mx-auto d-block" src="../IMG/ouroffice_Career.svg">
            </div>
            <div class="col-sm-12 col-lg-7 text-start mt-lg-5 mt-sm-1">
                <div class="container">
                    <p class="text-start mt-lg-5 ms-sm-1 blueTitle">
                        Our Office
                    </p>
                    <h3 class="text-start secondaryTitle ">We have a great office!</h3>
                    <p class="text-start mb-sm-3">Our staffs are friendly and our office is comfortable. Where else is a better place to work. We provide free food. 40 days child care leave. And we have an office gym and swimming pool.</p>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <!-- Listening to Events, add 'counter' to Vue Object -->
    <div class="container careerDiv rounded-3 mb-4" id="careerGame">
        <div class="row">
            <div class="col mb-4">
                <h3 class="text-center secondaryTitle">Paid Company Travel</h3>
                <p class="text-center w-50 m-auto">
                    Every year our staffs go on a company sponsored trip. Last year we went to Switzerland. Try navigating through Switzerland by pressing left and right keys.
                </p>
                <div class="text-center">
                    <button id="guy" @click="changeCharacterImg($event)" type="button" class="btn btn-light m-1"><img src="../IMG/boyIcon.svg" style="width: 50px; height: 50px;"></button>

                    <button id="girl" @click="changeCharacterImg($event)" type="button" class="btn btn-light m-1"><img src="../IMG/girlIcon.svg" style="width: 50px; height: 50px;"></button>
                </div>
                <div style="position:relative;">
                    <img class="img-fluid secondImage" id="personImg" :src="imgOfCharacterSrc" style="height: '50'; width: '50';">
                    <img class="img-fluid mx-auto d-block mb-4 firstImage" src="../IMG/theFarm.svg">
                </div>
                <img src= "../IMG/leftKeyBoard.svg" style="width: 100px; height: 100px;">
                <img src= "../IMG/rightKeyBoard.svg" style="width: 100px; height: 100px;">
            </div>
        </div>
    </div>
    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>

    <script>
        const career = Vue.createApp({
            data() {
                return {
                    // add properties here
                    imgOfCharacterSrc: "../IMG/guyCharacter.svg"
                }
            },
            methods: {
                changeCharacterImg(buttonInfo) {
                    // console.log(buttonInfo.currentTarget.id);
                    this.imgOfCharacterSrc = "../IMG/" + buttonInfo.currentTarget.id + "Character.svg"
                    // console.log(this.imgOfCharacterSrc);
                }
            }
        }).mount('#careerGame')



        document.addEventListener('keydown', (e) => {
            let buttonPressed = e.key

            if (buttonPressed == "ArrowRight") {
                rightKeyPressed()
                // console.log("pressed"); working
            } else if (buttonPressed == "ArrowLeft") {
                leftKeyPressed()
            }
        });

        var element = document.getElementById("personImg");
        element.style.left = '30%';

        function leftKeyPressed() {
            var element = document.getElementById("personImg");
            if (element.style.left > "25%") {
                element.style.left = parseInt(element.style.left) - 5 + '%';
                // console.log(element.style.left);
            }
        }

        function rightKeyPressed() {
            var element = document.getElementById("personImg");
            if (element.style.left < "70%") {
                element.style.left = parseInt(element.style.left) + 5 + '%';
                // console.log(element.style.left);
            }

        }

        /***************************************************************************************
         *    CITING
         *    Author: StackOverFlow
         *    Availability: https://stackoverflow.com/questions/21790295/move-an-image-with-the-arrow-keys-using-javascript
         ***************************************************************************************/
    </script>

</body>

</html>