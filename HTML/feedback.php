<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS/style.css">
    <script src="../js/actions.js" defer></script>
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Feedback</title>
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
    <h1 class="pageTitle mt-5 mb-5">Your Feedback is Valued</h1>

    <div class="container">
        <div class="p-5 mb-4 bg-light feedbackBg shadow-lg">
            <div class="container-fluid py-5">
                <form name="feedback_form" id="feedback_form">
                    <div class="row">
                        <div class="col col-12 col-lg-6">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name<span style="color:red">*</span></label>
                                <input type="text" class="form-control" placeholder="What should we call you?" name="name" id="name" required>
                                <p class="text-danger m-1" style="font-size: small; display: none;" id="nameMsg">Please give us something to call you</p>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email<span style="color:red">*</span></label>
                                <input type="email" class="form-control" placeholder="How should we contact you?" name="email" id="email" required>
                                <p class="text-danger m-1" style="font-size: small; display: none;" id="emailMsg">Please give us a way to contact you</p>
                            </div>
                            <div class="mb-3">
                                <label for="type" class="form-label">Type of Feedback<span style="color:red">*</span></label>
                                <select id="type" name="subject" class="form-select" aria-describedby="feedbackHelp" required>
                                    <option value="complaint">Complaint</option>
                                    <option value="compliment">Compliment</option>
                                    <option value="suggestion">General Suggestion</option>
                                    <option value="feature">New Feature Suggestion</option>
                                    <option value="question" selected>Question</option>
                                    <option value="bug">Website Bug/Malfunction</option>
                                </select>
                                <div id="feedbackHelp" class="form-text">If more than one option applies to your
                                    feedback, select the most relevant option</div>
                            </div>
                        </div>
                        <div class="col col-lg-6">
                            <div class="mb-3">
                                <img src="../IMG/feedback_form_page.svg" alt="Typing Feedback Image" class="img-fluid d-none d-lg-block mb-5 mx-5 px-5">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="mb-3">
                            <label for="feedback" class="form-label">Feedback<span style="color:red">*</span></label>
                            <textarea class="form-control" name="body" placeholder="Do include as many details as possible" id="feedback" aria-label="Feedback here" style="height:300px;" required></textarea>
                            <p class="text-danger m-1" style="font-size: small; display: none;" id="feedbackMsg">Please enter more than 10 characters in your feedback</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <button class="btn text-white top-50 start-50 customBtn" id="submitBtn" onclick="validateFeedback()">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="submitFeedback" class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card submitPopup">
                    <div class="card-header text-end"><img src="../IMG/X_close.svg" alt="close" class="w-10 pointer" onclick="enableForm()"></div>
                    <div class="card-body text-white text-center">
                        <div class="row">
                            <div class="col-3">
                                <img src="../IMG/successInSpeechBubble.svg" alt="success image" class="d-none d-sm-block">
                            </div>
                            <div class="col-7">
                                <h5 class="card-title">Thank you!</h5>
                                <p class="card-text">Your feedback has been submitted!</p>
                            </div>
                        </div>
                        <a href="home.php"><button type="button" class="btn successBtn mx-2 mb-1">Back to Home</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>

</body>

</html>