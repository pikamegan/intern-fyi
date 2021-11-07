<!DOCTYPE html>

<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <script src="../js/actions.js" defer></script>

    <link rel="stylesheet" href="../CSS/in.css">
    <link rel="stylesheet" href="../CSS/footer.css">
    <link rel="stylesheet" href="../CSS/style.css">

    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>

    <title>Log In</title>

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
    <form class="form-signin" action="../processDbRequest/model/login.php" method="POST">
        <!-- Form header -->
        <div class="inHeadDiv">
            <div class="display-3 inHead">Log in</div>
            <h4 class="inSubHead">to post internship reviews.</h4>
        </div>

        <div class="inBodyDiv navbarTemplate">

            <!-- Inputs-->
            <div class="logininBodyInputs">

                <!-- Email -->
                <label class="sr-only">School email address</label>
                <input name="email" id="loginEmail" class="form-control loginField" type="email" placeholder="School email address" required="" autofocus="">

                <!-- Password -->
                <label class="sr-only" for="loginPw">Password</label>
                <input name="pw" id="loginPw" class="form-control loginField" type="email" placeholder="Password" required="" autofocus="">
                <i id="loginPwToggle" class="bi bi-eye-fill pwToggle"></i>

            </div>

            <!-- Extras -->
            <div class="row loginBodyExtras">
                <!-- Remember me-->
                <div class="col checkbox mb-3 loginBodyExtra">
                    <input id="loginRemCheck" type="checkbox" value="rememberCheck">
                    <label for="loginRemCheck">Remember me</label>
                </div>
                <!-- <div class="col" id="ResetPw">
                    <a id="resetPwLink" href="resetPw.html" class="loginBodyExtra">Forgot password?</a>
                </div> -->
            </div>
            <!-- Submit -->
            <button id="loginBtn" class="btn btn-primary" type="submit">Log in</button>
        </div>
    </form>

    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>

    <!-- jQuery first, Popper.js, Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>