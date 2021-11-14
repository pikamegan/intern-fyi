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
        <form action= "../processDbRequest/model/changePw.php" method="POST">
            <div id="changePw1" class="form-row signupRow">
                    <div class="col">
                        <label for="pwOne" class="form-label">Password<span style="color:red">*</span></label>
                        <input name="pwOne" id="pwOne" class="form-control signupField" type="password" placeholder="Password" required autofocus="">
                        <i id="pwOneToggle" class="bi bi-eye-fill pwToggle" onclick="pwToggle(pwOne,pwOneToggle)"></i>
                    </div>
            </div>

            <div id="changePw2" class="form-row signupRow">
                <div class="col">
                    <label for="pwTwo" class="form-label">Confirm password<span style="color:red">*</span></label>
                    <input name="pwTwo" id="pwTwo" class="form-control signupField" type="password" placeholder="Confirm password" oninput="isPasswordMatch()" required autofocus="">
                    <i id="pwTwoToggle" class="bi bi-eye-fill pwToggle" onclick="pwToggle(pwTwo, pwTwoToggle)"></i>
                </div>
            </div>

            <?php
            
                if (isset($_SESSION["errorList"])) {
                    
                    foreach ($_SESSION["errorList"] as $value) {
                        echo "<p class='text-danger m-1' style='font-size: small; display: none;' id='roleMsg'>$value</p>";
                    }
                    $_SESSION["errorList"] = "";
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


    </script>


</body>

</html>