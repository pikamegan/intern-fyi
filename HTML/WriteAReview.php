<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Bootstrap Bundle with Popper -->
    <script defer src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <link rel="stylesheet" href="../CSS/style.css">
    <script src="https://unpkg.com/vue@next"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>

    <script>
        if (window.location.href.search("cid=") == -1) {
            window.location.assign('?cid=1')
        }
    </script>

    <title>Write a Company Review</title>
</head>

<body onload="showCriteria()" class="onPopup">
    <!-- copy this part: start-->
    <div class="navbarTemplate">
        <div id="smallNavBar">
            <?php
            session_start();

            if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
                echo "<navigation-bar-small-login></navigation-bar-small-login>";
            } else {
                header("Location: ./signup.php");
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
                header("Location: ./signup.php");
                exit();
            }
            ?>
        </div>
    </div>
    <!-- copy this part: end -->

    <h1 class="pageTitle mt-5">Write a Company Review</h1>

    <div class="container appHome">

        <div class="p-sm-5 mb-4 bg-light shadow-lg feedbackBg">
            <div class="container-fluid px-sm-5 py-5">

                <form name="review_form" action="../processDbRequest/model/add.php" method="POST" id="reviewForm">
                    <!-- remove role="form" to test -->
                    <div class="d-flex align-items-end flex-column bd-highlight mb-3" style="height: 40px;">
                        <div class="bd-highlight">
                            <img src="../IMG/deletebutton.svg" onclick="resetDraft('clearReview')" alt="Clear draft" class="img-fluid pointer" style="width: 50px; height: 50px;">
                        </div>
                    </div>
                    <div class="row justify-content-start mb-5">
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4 mb-3">

                            <label for="company" class="form-label">Company<span style="color:red">*</span></label>
                            <select id="company" name="companyid" class="form-select pointer" aria-describedby="companyid" required>
                                <!-- filled in with js -->
                            </select>
                            <!-- hidden fields -->
                            <?php
                            
                            if (isset($_SESSION['email'])) {
                                $email = $_SESSION['email'];
                                echo "<input type='hidden' id='hiddenEmail' name='schoolemail' value='$email'>";
                            }
                            ?>
                            
                        </div>
                        <div class="col-12 col-sm-12 col-md-4 col-lg-4">
                            <label for="role" class="form-label">Role/Title<span style="color:red">*</span></label>
                            <input type="role" name="jobtitle" class="form-control" id="role" required>
                            <p class="text-danger m-1" style="font-size: small; display: none;" id="roleMsg">Fill in what your job position was at the company</p>
                        </div>
                    </div>

                    <div class="card text-center">
                        <div class="card-header bg-info">Overall Rating</div>
                        <div class="card-body">
                            <h5 class="card-title"></h5>
                            <p class="card-text">How would you rate your experience at this company overall?</p>
                            <div class="row mb-1 text-center">

                                <div class="p-2 bd-highlight d-flex flex-grow-1 justify-content-around">

                                    <img src="../IMG/1bad.svg" alt="sad face" style="width: 40px; height: 40px;">
                                    <label class="inlineLabel"><input type="radio" name="overallrating" class="inlineRadio pointer" value="1" required>1</label>
                                    <label class="inlineLabel"><input type="radio" name="overallrating" class="inlineRadio pointer" value="2" required>2</label>
                                    <label class="inlineLabel"><input type="radio" name="overallrating" class="inlineRadio pointer" value="3" required>3</label>
                                    <label class="inlineLabel"><input type="radio" name="overallrating" class="inlineRadio pointer" value="4" required>4</label>
                                    <label class="inlineLabel"><input type="radio" name="overallrating" class="inlineRadio pointer" value="5" required>5</label>
                                    <img src="../IMG/5happy.svg" alt="happy face" style="width: 40px; height: 40px;">

                                </div>
                            </div>
                        </div>
                    </div>
                    <p class="text-center text-danger m-1" style="display: none;" id="overallMsg">Please rate your overall experience</p>


                    <label for="button" class="form-label mt-5">Category Rating (1 Low, 5 Very High)</label>
                    <div class="accordion" id="accordionExample"></div>

                    <div class="row mt-5">
                        <div class="mb-3">
                            <label for="comment" class="form-label">Review</label>
                            <textarea v-model="review" name="reviewdesc" class="form-control" aria-label="comment" style="height:300px;" placeholder="Minimum 10 characters" required></textarea>
                            <p class="text-center text-danger m-1" style="display: none;" id="reviewMsg">Please enter at least 10 characters</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="d-flex justify-content-center">
                            <div v-if="review.length < 10">
                                <button id ="submitBtn" disabled class="opacity-50 btn text-white top-50 start-50 customBtn" onclick="validate_form()">Submit Your Review</button>
                            </div>
                            <div v-if="review.length >= 10">
                                <button id ="submitBtn" class="btn text-white top-50 start-50 customBtn" onclick="validate_form()">Submit Your Review</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="clearReview" class="container">
        <div class="row justify-content-center">
            <div class="col-6">
                <div class="card warningPopup">
                    <div class="card-header text-end"><img src="../IMG/X_close.svg" alt="close" class="w-10 pointer" onclick="closePopup('clearReview')"></div>
                    <div class="card-body text-white text-center">
                        <h5 class="card-title">Review Cancellation</h5>
                        <p class="card-text">Are you sure you want to clear this draft?</p>
                        <button type="button" class="btn clearBtn mx-2 mb-1" onclick="clearReview()">Yes, clear
                            draft</button>
                        <button type="button" class="btn keepBtn mx-2 mb-1" onclick="closePopup('clearReview')">No, keep
                            editing</button>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>
    <!-- JavaScript for CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>

    <script src="../js/actions.js"></script>
    <script src="../js/appHome.js"></script>
</body>

</html>