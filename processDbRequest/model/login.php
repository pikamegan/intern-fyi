<?php
require_once 'common.php';

$successLogin = false;

if (isset($_POST['email']) && isset($_POST['pw'])) {
    $email = $_POST['email'];
    $pw = $_POST['pw'];

    $userDAO = new userDAO();
    $userObj = $userDAO->authenticate($email, $pw);

    if (isset($userObj)) {
        $_SESSION['email'] = $email;
        $_SESSION['pw'] = $pw;
        $successLogin = true;
        // $postJSON = json_encode("true");
        // echo $postJSON;
    } else {
        $postJSON = json_encode("false");
        echo $postJSON;
        // header("Location: ../../HTML/home.html?login=failed");
        // exit();
    }
} else {
    $postJSON = json_encode("false");
    echo $postJSON;
    // header("Location: ../../HTML/login.html?login=PlsEnterAllFields");
    // exit();
}
?>

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
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj"
        crossorigin="anonymous"></script>
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>

    <link rel="stylesheet" href="../../CSS/style.css">
    <script src="../../js/actions.js" defer></script>
    <!-- axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <title>Help and FAQ</title>
    <title></title>
    </head>
    <body>
    <h1></h1>
    <!-- below is working -->
    <div class ="navbarTemplate">
        <div id="smallNavBar">
            <?php
                if ($successLogin) {
                    echo "<navigation-bar-small-login></navigation-bar-small-login>";
                } else {
                    echo "<navigation-bar-small-logout v-else></navigation-bar-small-logout>";
                }
            ?>
        </div>
        <div id="bigNavBar">
            <?php
            if ($successLogin) {
                echo "<navigation-bar-big-login :imgsrc = 'profileImg($email)'></navigation-bar-big-login>";
            } else {
                echo "<navigation-bar-big-logout v-else></navigation-bar-big-logout>";
            }
            ?>
        </div>
    </div>

    <script>
        let urlGetUser = './getUser.php'
        let userEmail = 'esther.2020@scis.smu.edu.sg'
        let userPicture = '';
        

        axios
            .get(urlGetUser, {
                params: {
                    email: userEmail,
                }
            })
            .then((response) => {
                const myJSON = JSON.stringify(response.data);
                console.log(response.data.profilePictureUrl);
                userPicture = response.data.profilePictureUrl;
            })
            .catch((error) => {
                // process error object
                console.log(error.message);
            });

        console.log(userPicture);
    </script>
    
</body>
</html>