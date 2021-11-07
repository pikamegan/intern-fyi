<!DOCTYPE html>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <!-- Bootstrap Font Icon CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="../CSS/style.css">
    <link rel="stylesheet" href="../CSS/in.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="../js/actions.js" defer></script>
    <title>Sign Up</title>
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
    <form class="form-signin" action="../processDbRequest/model/addUser.php" method="POST">
        <!-- Form header -->
        <div class="inHeadDiv">
            <div class="display-3 inHead">Sign up</div>
            <h4 class="inSubHead">to post internship reviews.</h4>
        </div>

        <div class="inBodyDiv">
            <div id="signupName" class="form-row signupRow">
                <div class="col col-12 mb-3">
                    <label class="sr-only" for="signupFirstName">First name</label>
                    <input id="signupFirstName" name="fname" class="form-control signupField" type="text" placeholder="First name" required autofocus="">
                </div>

                <div class="col col-12 mb-3">
                    <label class="sr-only " for="signupLastName">Last name</label>
                    <input id="signupLastName" name="lname" class="form-control signupField" type="text" placeholder="Last name" required autofocus="">

                </div>

                <div class="col col-12 avatar">
                    <label class="sr-only " for="signupGender">Gender</label>
                    <div id="signupGender" class="dropdown">
                        <select name="gender" id="genders" class="form-control" v-model="gender" @click="changeAvatar" required>
                            <option value="Gender" selected>Gender</option>
                            <option value="M">Male</option>
                            <option value="F">Female</option>
                        </select>
                    </div>
                    <input type="hidden" name="avatarURL" :value="avatarImgURL" />
                </div>

            </div>

            <div id="signupSchool" class="form-row signupRow">
                <div class="col col-12 mb-3">
                    <label class="sr-only " for="signupSchoolName">School name</label>
                    <input id="signupSchoolName" name="school" class="form-control signupField" type="text" placeholder="School" required autofocus="">
                </div>
                <div class="col col-12 mb-3">
                    <label class="sr-only " for="schoolEmail">School Email</label>
                    <input id="schoolEmail" name="schoolEmail" class="form-control signupField" type="email" placeholder="School email" required autocomplete="email">

                </div>
            </div>

            <div id="signupPw1" class="form-row signupRow">
                <div class="col">
                    <label class="sr-only" for="signupPw1Input">Password</label>
                    <input id="signupPw1Input" class="form-control signupField" type="password" placeholder="Password" required autofocus="" oninput="checkPasswordRequirement()">
                    <i id="signupPw1Toggle" class="bi bi-eye-fill pwToggle" onclick="pwToggle(signupPw1Input,signupPw1Toggle)"></i>
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


            <div id="signupPw2" class="form-row signupRow">
                <div class="col">
                    <label class="sr-only " for="signupPw2Input">Confirm password</label>
                    <input name="pw" id="signupPw2Input" class="form-control signupField" type="password" placeholder="Confirm password" oninput="isPasswordMatch()" required autofocus="">
                    <i id="signupPw2Toggle" class="bi bi-eye-fill pwToggle" onclick="pwToggle(signupPw2Input,signupPw2Toggle)"></i>
                </div>
            </div>
            <!-- Remove password-desc-required class when requirement is met & the reverse -->
            <div id="pwConfirmError"></div>

            <!-- Extras -->
            <div class="form-row signupBodyExtras">
                <!-- Mailing list -->
                <div class="col checkbox mb-3 loginBodyExtra mt-1">
                    <input id="loginMailingCheck" type="checkbox" value="rememberCheck">
                    <label id="loginMailingLabel" for="loginMailingCheck">I'd like to receive emails on new reviews and
                        companies</label>
                </div>
            </div>

            <!-- Submit -->
            <div class="form-row">
                <button id="signupBtn" class="btn btn-primary d-block" type="submit">Sign up</button>
                <p id="signupDisclaimer">
                    <small>By signing up, you agree to our <strong>Terms</strong>, <strong>Data Policy</strong> and
                        <strong>Cookies Policy</strong>.</small>
                </p>

            </div>
        </div>
    </form>

    <p id="signupToLogin">Already have an account? <a href="./login.php">Log in</a></p>



    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>



    <!-- jQuery first, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous">
    </script>


    <!-- Changing between password input types-->
    <script>
        const avatar = Vue.createApp({
            data() {
                return {
                    // add properties here
                    gender: "Gender",
                    avatarImgURL: "../IMG/avatar1.svg"
                }
            },
            methods: {
                changeAvatar() {

                    if (this.gender === "M") {
                        this.avatarImgURL = "../IMG/avatar1.svg"
                    } else if (this.gender === "F") {
                        this.avatarImgURL = "../IMG/avatar3.svg"
                    }
                }
            }
        }).mount('.avatar')

        function pwToggle(pwInput, pwToggleBtn) {
            if (pwInput.type === "password") {
                pwInput.type = "text";
                $(pwToggleBtn).toggleClass("bi-eye-fill bi-eye-slash-fill");
            } else {
                pwInput.type = "password";
                $(pwToggleBtn).toggleClass("bi-eye-slash-fill bi-eye-fill");
            }
        }

        function checkPasswordRequirement(inputField) {
            let fName = document.getElementById("signupFirstName").value
            let lName = document.getElementById("signupLastName").value
            let userPWInput = document.getElementById("signupPw1Input").value
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
            let errorMsg5 = "At least one non-alphanumeric character (~`!@#$%^%&*-+?)";
            let errorMsg6 = "Password cannot contain first or last name";

            // 0. Empty input
            if (userPWInput.length <= 0) {
                document.getElementById("error1").innerHTML = "";
                document.getElementById("error2").innerHTML = "";
                document.getElementById("error3").innerHTML = "";
                document.getElementById("error4").innerHTML = "";
                document.getElementById("error5").innerHTML = "";
                document.getElementById("error6").innerHTML = "";
            }

            // 1. Password length
            if (userPWInput.length >= 8) {
                errorMsgSuccess("error1", errorMsg1);


            } else {
                errorMsgFailure("error1", errorMsg1);
            }

            // 2. Uppercase 
            if (hasUpperC(userPWInput)) {
                errorMsgSuccess("error2", errorMsg2);
            } else {
                errorMsgFailure("error2", errorMsg2);
            }

            // 3. Lowercase
            if (hasLowerC(userPWInput)) {
                errorMsgSuccess("error3", errorMsg3);
            } else {
                errorMsgFailure("error3", errorMsg3);
            }


            // 4. Number
            if (hasNum(userPWInput)) {
                errorMsgSuccess("error4", errorMsg4);
            } else {
                errorMsgFailure("error4", errorMsg4);
            }

            // 5. Non-alphanumeric
            if (hasNonAlpha(userPWInput)) {
                errorMsgSuccess("error5", errorMsg5);
            } else {
                errorMsgFailure("error5", errorMsg5);
            }

            // 6. Name 
            if (hasProfileName(userPWInput, fName + '.' + lName)) {
                errorMsgSuccess("error6", errorMsg6);
            } else {
                errorMsgFailure("error6", errorMsg6);
            }


        }

        function errorMsgSuccess(errorID, errorMsgNo) {
            document.getElementById(errorID).innerHTML = "<i class='bi bi-check text-success'></i>";
            document.getElementById(errorID).innerHTML += "<div class='errorMsg d-inline text-success'>" + errorMsgNo + "</div>";
        }

        function errorMsgFailure(errorID, errorMsgNo) {
            document.getElementById(errorID).innerHTML = "<i class='bi bi-x fa fa-xxl text-danger'</i>";
            document.getElementById(errorID).innerHTML += "<div class='errorMsg d-inline text-danger'>" + errorMsgNo + "</div>"
        }

        function hasLowerC(input) {
            // console.log(input);
            for (let string of input) {
                if ((string === string.toLowerCase()) && isNaN(string)) {
                    return true;
                }
            }
            return false;

        }

        function hasUpperC(input) {
            for (let string of input) {
                if ((string === string.toUpperCase()) && isNaN(string)) {
                    // console.log(string);
                    return true;

                }
            }
            return false;
        }

        function hasNum(input) {
            for (let str of input) {
                if (isNaN(str) === false) {
                    return true;
                }
            }
            return false;
        }

        function hasNonAlpha(input) {
            let nonAlphaList = ["~", "`", "!", "@", "#", "$", "%", "^", "%", "&", "*", "-", "+", "?"]
            for (let nonAlpha of nonAlphaList) {
                if (input.indexOf(nonAlpha) !== -1) {
                    // console.log(nonAlpha);
                    return true;
                }
            }
            return false;
        }

        // Does not work, change conditional
        function hasProfileName(input, fullName) {
            const nameArray = fullName.split('.');

            if (input.indexOf(nameArray[0]) == -1 && input.indexOf(nameArray[1]) == -1) {
                // returns -1 when the name is not in the fname or lname
                return false;
            } else {
                console.log(fullName);
                return true;
            }

        }

        function isPasswordMatch() {
            let userPWInput = document.getElementById("signupPw1Input").value;
            let userPWInput2 = document.getElementById("signupPw2Input").value;
            let criteriaPasswordMatch = document.getElementById("confirm-password-same");
            let pwConfirmMsg = "Passwords match";

            if (userPWInput === userPWInput2) {
                errorMsgSuccess("pwConfirmError", pwConfirmMsg);
            } else {
                errorMsgFailure("pwConfirmError", pwConfirmMsg);

            }

        }
    </script>




</body>