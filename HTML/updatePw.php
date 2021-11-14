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

    <h1 class="pageTitle mt-5">Change Your Password</h1>
    <div class="container shadow-lg p-3 mb-5 mt-5 rounded">
        <form action= "../processDbRequest/model/changePw.php" method="POST" >
            <p>New Password

                <input type="password" class = "w-100" name="pwOne">
            </p>
            <p>Confirm New Password

                <input type="password" class = "w-100" name="pwTwo">
            </p>

            <?php
                if (isset($_SESSION["changePWError"])) {
                    echo $_SESSION["changePWError"];
                }
            ?>

            <input class="btn btn-primary w-100 p-3 mt-3 form-control" type= "submit" name ="submit" value="Submit">

        </form>
    </div>
    <script>

    </script>

</body>

</html>