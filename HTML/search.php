<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <!-- axios -->
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>
    <script src="../js/actions.js" defer></script>
    <!-- axios -->
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
    <title>Search</title>
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

    <div class="container-fluid mt-4" id="appSearch">
        <div class="row">
            <div class="col-lg-3 shadow mb-5 pt-3" style="border-radius: 10px;">
                <div class="container-fluid">
                    <div class='row'>
                        <div class="col-lg-12 col-md-4 mb-2">
                            <div>
                                Sort by:
                            </div>
                            <ul v-on:change="sortCompaniesMethod" style="list-style: none;" class="ms-1">
                                <li v-for="(value, name) in sortCompaniesValues">
                                    <label>
                                        <input v-model="sortCompanies" :value="value" type="radio">
                                        {{name}}
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-4 mb-2">
                            <div>
                                Industry:
                            </div>
                            <ul v-on:change="filterMethod" style="list-style: none;" class="ms-1">
                                <li v-for="industry in filterIndustryValues">
                                    <label>
                                        <input type="checkbox" v-model="filterIndustry" :value="industry">
                                        {{industry}}
                                    </label>
                                </li>
                            </ul>
                        </div>

                        <div class="col-lg-12 col-md-4 mb-2">
                            <div>
                                Location:
                            </div>
                            <ul style="list-style: none;" class="ms-1">

                                <li v-on:change="filterMethod">
                                    <label>
                                        <input type="checkbox" class="me-1" v-model="isClose" :value="true">Close to me
                                    </label>
                                </li>

                                <li v-for="value in filterLocationValues" v-on:change="filterMethod">
                                    <label>
                                        <input type="checkbox" v-model="filterLocation" :value="value">
                                        {{value}}
                                    </label>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col mb-5">
                <div v-if="displayCompanies.length > 0">
                    <company-row-list :companylist="displayCompanies"></company-row-list>
                </div>

                <div v-if="displayCompanies.length == 0" class="text-center">
                    <img class="my-5" src="../IMG/noCompanyFound.svg">
                    <div>
                        Oops, no company found!
                        <div>
                            <a href="search.php" class="">
                                Search all instead
                            </a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>
    
    <script src="../js/appSearch.js"></script>

    <!-- JavaScript for CSS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-U1DAWAznBHeqEIlVSCgzq+c9gqGAJn5c/t99JyeKa9xxaYpSvHU5awsuZVVFIhvj" crossorigin="anonymous"></script>
</body>

</html>