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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/in.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="../js/actions.js" defer></script>
    <title>Change Your Password</title>

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
                window.location.assign('./home.php');
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
                window.location.assign('./home.php');
                exit();
            }
            ?>
        </div>
    </div>
    <!-- copy this part: end -->

    <h1 id="changePw" class="pageTitle mt-5">Change Your Password</h1>

    <?php
        if (isset($_SESSION["successChangePW"])) {
            echo $_SESSION["successChangePW"];
            $_SESSION["successChangePW"] = "";
        }
    ?>

    <div class="container shadow-lg p-3 mb-5 mt-5 rounded">
        <form action= "../processDbRequest/model/changePw.php" method="POST" >

            <div id="changePw1" class="form-row signupRow">
                    <div class="col">
                        <label for="pwOne" class="form-label">Password<span style="color:red">*</span></label>
                        <input name="pwOne" id="pwOne" class="form-control signupField" type="password" placeholder="Password" required autofocus="" oninput="checkPasswordRequirement()">
                        <i id="pwOneToggle" class="bi bi-eye-fill pwToggle" onclick="pwToggle(pwOne,pwOneToggle)"></i>
                        <p class="text-center text-danger m-1" style="display: none;" id="pwOneError">Please enter your password</p>
                    </div>
            </div>
            <!-- Remove password-desc-required class when requirement is met  & add when NOT met -->
            <div id="pwErrorMsgs">
                <div class="passwordrequirements mb-2">
                    <div id="error1"></div>
                    <div id="error2"></div>
                    <div id="error3"></div>
                    <div id="error4"></div>
                    <div id="error5"></div>
                    <div id="error6"></div>

                    <!-- /***************************************************************************************
                *    CITING
                *    Author: SMU
                *    Availability: https://live.smu.edu.sg/Account/ChangePassword
                ***************************************************************************************/ -->
                </div>
            </div>


            <div id="changePw2" class="form-row signupRow">
                <div class="col">
                    <label for="pwTwo" class="form-label">Confirm password<span style="color:red">*</span></label>
                    <input name="pwTwo" id="pwTwo" class="form-control signupField" type="password" placeholder="Confirm password" oninput="isPasswordMatch()" required autofocus="">
                    <i id="pwTwoToggle" class="bi bi-eye-fill pwToggle" onclick="pwToggle(pwTwo, pwTwoToggle)"></i>
                    <p class="text-center text-danger m-1" style="display: none;" id="pwCError">Please confirm your password</p>
                </div>
            </div>
            <!-- Remove password-desc-required class when requirement is met & the reverse -->
            <div id="pwConfirmError"></div>

            <?php
                if (isset($_SESSION["changePWError"])) {
                    echo $_SESSION["changePWError"];
                }
            ?>

            <input class="btn btn-primary w-100 p-3 mt-3 form-control" type= "submit" name ="submit" value="Submit">
        </form>
    </div>
    
    <!-- Changing between password input types-->
    <script>
        function pwToggle(pwInput, pwToggleBtn) {
            if (pwInput.type === "password") {
                pwInput.type = "text";
                $(pwToggleBtn).toggleClass("bi-eye-fill bi-eye-slash-fill");
            } else {
                pwInput.type = "password";
                $(pwToggleBtn).toggleClass("bi-eye-slash-fill bi-eye-fill");
            }
        }

        function checkPasswordRequirement() {
            let userPWInput = document.getElementById("pwOne").value
            let criteriaLength = document.getElementById("password-req-length")
            let criteriaUC = document.getElementById("password-req-ucase")
            let criteriaLC = document.getElementById("password-req-lcase")
            let criteriaNum = document.getElementById("password-req-numerals")
            let criteriaNonAlpha = document.getElementById("password-req-nonalpha")
            let criteriaNoProfileName = document.getElementById("password-req-displayname")

            let errorMsg1 = "8 or more characters";
            let errorMsg2 = "At least one uppercase letter";
            let errorMsg3 = "At least one lowercase letter";
            let errorMsg4 = "At least one number";
            let errorMsg5 = "At least one non-alphanumeric character (~`!@#$%^&*-+?)";

            let pwSuccess = true;

            // 0. Empty input
            if (userPWInput.length <= 0) {
                document.getElementById("error1").innerHTML = "";
                document.getElementById("error2").innerHTML = "";
                document.getElementById("error3").innerHTML = "";
                document.getElementById("error4").innerHTML = "";
                document.getElementById("error5").innerHTML = "";
                document.getElementById("error6").innerHTML = "";
                pwSuccess = false;
            }

            // 1. Password length
            if (userPWInput.length >= 8) {
                errorMsgSuccess("error1", errorMsg1);
            } else {
                errorMsgFailure("error1", errorMsg1);
                pwSuccess = false;
            }

            // 2. Uppercase
            if (hasUpperC(userPWInput)) {
                errorMsgSuccess("error2", errorMsg2);
            } else {
                errorMsgFailure("error2", errorMsg2);
                pwSuccess = false;
            }

            // 3. Lowercase
            if (hasLowerC(userPWInput)) {
                errorMsgSuccess("error3", errorMsg3);
            } else {
                errorMsgFailure("error3", errorMsg3);
                pwSuccess = false;
            }


            // 4. Number
            if (hasNum(userPWInput)) {
                errorMsgSuccess("error4", errorMsg4);
            } else {
                errorMsgFailure("error4", errorMsg4);
                pwSuccess = false;
            }

            // 5. Non-alphanumeric
            if (hasNonAlpha(userPWInput)) {
                errorMsgSuccess("error5", errorMsg5);
            } else {
                errorMsgFailure("error5", errorMsg5);
                pwSuccess = false;
            }

            return pwSuccess;

        }

        function errorMsgSuccess(errorID, errorMsgNo) {
            document.getElementById(errorID).innerHTML = "<i class='bi bi-check text-success'></i>";
            document.getElementById(errorID).innerHTML += "<div class='errorMsg d-inline text-success'>" + errorMsgNo + "</div>";
        }

        function errorMsgFailure(errorID, errorMsgNo) {
            document.getElementById(errorID).innerHTML = "<i class='bi bi-x fa fa-xxl text-danger'</i>";
            document.getElementById(errorID).innerHTML += "<div class='errorMsg d-inline text-danger'>" + errorMsgNo + "</div>"
        }

        function isAlpha(ch) {
            return /^[A-Z]$/i.test(ch);
        }

        function hasLowerC(input) {
            // console.log(input);
            for (let string of input) {
                if ((string === string.toLowerCase()) && isNaN(string) && isAlpha(string)) {
                    return true;
                }
            }
            return false;

        }


        function hasUpperC(input) {
            for (let string of input) {
                if ((string === string.toUpperCase()) && isAlpha(string)) {
                    // console.log(string);
                    return true;

                }
            }
            return false;
        }

        function hasNum(input) {
            // return !isNaN(parseFloat(input)) && isFinite(input);
            return input.match(/\d+/g);
        }

        function hasNonAlpha(input) {
            let nonAlphaList = ["~", "`", "!", "@", "#", "$", "%", "^", "&", "*", "-", "+", "?"]
            for (let nonAlpha of nonAlphaList) {
                if (input.indexOf(nonAlpha) !== -1) {
                    return true;
                }
            }
            return false;
        }

        function isPasswordMatch() {
            let userPWInput = document.getElementById("pwOne").value;
            let userPWInput2 = document.getElementById("pwTwo").value;
            let criteriaPasswordMatch = document.getElementById("confirm-password-same");
            let pwConfirmMsg = "Passwords match";

            if (userPWInput === userPWInput2) {
                errorMsgSuccess("pwConfirmError", pwConfirmMsg);
            } else {
                errorMsgFailure("pwConfirmError", pwConfirmMsg);

            }

        }

        document.getElementById("changePw").addEventListener("click", function(event) {
            if (checkPasswordRequirement() == false; ) {
                //if pw Fails
                event.preventDefault()
            }
        });


    </script>


</body>

</html>