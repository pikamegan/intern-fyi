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
    <link rel="stylesheet" href="../CSS/style.css">
    <!-- vue -->
    <script src="https://unpkg.com/vue@next"></script>
    <script src="../js/actions.js" defer></script>
    <title>Quiz</title>
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

    <h1 class="pageTitle mt-5">Quiz</h1>
    <div class="quiz">
        <div class="container shadow p-3 mb-5 rounded" style="width: auto;
height: auto;">
            <div class="m-5">
                <div v-for="heart in hearts" :key="heart" class="d-inline">
                    <span><img src="../IMG/heartQuiz.png" style="width: 40px; height: 40px; display: inline;" class="text-end mx-1 mb-3 float-end"></span>
                </div>
                <br><br>
                <div v-bind:class="{ 'bg-success': isCorrect, 'bg-danger': isWrong, 'bgPurple': isQuestion}">
                    <span class="badge" width="80%">
                    </span>
                    <br>
                </div>
                <div v-if="isQuestion && currentQ <= qAnswer.length">
                    <div class="m-5">
                        <h1 id="questionQuiz" class="textPurple text-start">{{questions[currentQ - 1]}}</h1>
                    </div>
                    <div class="m-5" v-for="(option, index) in questionOption['q'+ currentQ]":key="option">
                        <div class="container">
                            <div class="col">
                                <span class="fw-bolder fs-3">{{optionAlpha[index]}}</span>
                            </div>
                            <div class="col">
                                <p>&nbsp&nbsp&nbsp&nbsp<a value="option" @click="calculateScore(index)" class="text-decoration-underline fs-4">{{option}}</a></p>
                            </div>
                        </div>
                    </div>
                </div>
                <div v-if="isQuestion && currentQ > qAnswer.length && hearts > 0">
                    <div class="text-center m-5">
                        <img onclick="location.href='quiz.php';" class="float-end" src="../IMG/repeatGame.svg" style="width: 50px; height: 50px;">
                        <h1>&nbsp&nbspYou survived!</h1>
                        <h4 class="mb-3">{{numberCorrect}}/ 5 Marks</h4>
                    </div>
                    <div class="text-center m-5" v-if=" numberCorrect == 5 ">
                        <img src="../IMG/allcorrect.png" style="" class="img-fluid" style="width: 500px;">
                    </div>
                    <div class="text-center m-5" v-if=" numberCorrect == 4 ">
                        <img src="../IMG/Gold.png" style="" class="img-fluid" style="width: 500px;">
                    </div>
                    <div class="text-center m-5" v-if=" numberCorrect == 3 ">
                        <img src="../IMG/Silver.png" style="" class="img-fluid" style="width: 500px;">
                    </div>

                </div>
                <div v-if="isWrong && hearts > 0">
                    <h1 class="text-danger fw-bolder m-5">
                        Wrong! <img src="../IMG/wrongEmoji_quiz.png" style="width: 50px; height: 50px;">
                    </h1>
                    <h4 class="text-center">The Correct Answer is: <span></span></h4>
                    <div class="text-center mb-5" style="font-size: 100px;">
                        {{optionAlpha[qAnswer[currentQ-1]]}}

                        <br>
                        <h4 class="mb-5">{{questionOption['q'+ currentQ][qAnswer[currentQ-1]]}}</h4>
                    </div>
                    <div class="mt-5"><br><br>
                        <a class="text-decoration-underline fs-4 mt-5 text-end" @click="nextQuestion">
                            <img src="../IMG/nextQuiz.svg" style="width: 100px; height: 100px;">
                        </a>
                    </div>
                </div>
                <div v-if="isCorrect && currentQ <= qAnswer.length">
                    <h1 class="text-center text-success fw-bolder m-5">
                        Nice Job! <img src="../IMG/correctEmoji_quiz.png" style="width: 57px; height: 57px;">
                    </h1>
                    <div class="text-center mb-5" style="font-size: 100px;">
                        {{optionAlpha[qAnswer[currentQ-1]]}}

                        <br>
                        <h4 class="mb-5">{{questionOption['q'+ currentQ][qAnswer[currentQ-1]]}}</h4>
                    </div>
                    <div class="mt-5"><br><br>
                        <a class="text-decoration-underline fs-4 mt-5 text-end" @click="nextQuestion">
                            <img src="../IMG/nextQuiz.svg" style="width: 100px; height: 100px;">
                        </a>
                    </div>
                </div>
                <div v-if="isWrong && hearts <= 0">
                    <h1 class="text-danger fw-bolder mt-5">
                        Wrong! <img src="../IMG/wrongEmoji_quiz.png" style="width: 50px; height: 50px;">
                        <img onclick="location.href='quiz.php';" class="float-end" src="../IMG/repeatGame.svg" style="width: 50px; height: 50px;">

                    </h1>
                    <div class="text-center">
                        <img class="img-fluid" src="../IMG/Game-Over.svg" style="width: 600px; height: 600px;">
                    </div>

                </div>
            </div>
        </div>
    </div>

    <script>
        const quiz = Vue.createApp({
            data() {
                return {
                    // add properties here
                    currentQ: 1,
                    questionOption: {
                        q1: [
                                "Hobbies and interests",
                                "Contact details",
                                "Age",
                                "Passive language"
                            ],

                        q2: [
                                "Print out extra copies of your resume",
                                "Practice interview question",
                                "Prepare an outfit",
                                "Rely on surface level knowledge of the company"
                            ],

                        q3: [
                                "Job shadowing",
                                "Panel interview",
                                "Technical interview",
                                "Competency interview"
                                ],

                        q4: [
                                "Be two hours early",
                                "Eat",
                                "Apologise for not having enough experience",
                                "Prepare questions for the interviewer"
                            ],

                        q5: [
                            "Follow up with the hiring manager frequently",
                            "Post about the interview on social media ",
                            "Send a thank you note to the interviewers",
                            "Stop searching for new jobs"
                        ],
                    },

                    questions: [
                        "What should you include in your resume?",
                        "What should you NOT do to prepare for an interview?",
                        "What is NOT a type of interview?",
                        "What should you do in an interview?",
                        "What should you do after an interview?"
                    ],

                    hearts: 3,
                    isCorrect: false,
                    isWrong: false,
                    isQuestion: true,
                    optionAlpha: ["A", "B", "C", "D"],
                    qAnswer: [1, 3, 0, 3, 2], // 0 is A, 1 is B, 2 is C, 3 is D
                    numberCorrect: 0
                }
            },
            methods: {
                calculateScore($chosenAnswer) {
                    // 0 is A, 1 is B, 2 is C, 3 is D
                    let answer = this.qAnswer[this.currentQ - 1]
                    // console.log(answer);

                    if (answer !== $chosenAnswer) {
                        //console.log("wrong");
                        this.isQuestion = false
                        this.isCorrect = false
                        this.isWrong = true
                        this.hearts -= 1
                    } else {
                        //console.log("correct");
                        this.isQuestion = false
                        this.isCorrect = true
                        this.isWrong = false
                        this.numberCorrect += 1
                    }
                },
                nextQuestion() {
                    this.isQuestion = true
                    this.isCorrect = false
                    this.isWrong = false
                    this.currentQ += 1
                }
            }
        })
        const quizPage = quiz.mount('.quiz')
    </script>
    <div class="footerComp">
        <intern-footer home="home.php" abt="about.php" career="career.php" help="help.php" feedback="feedback.php" @gotohome="goHome"></intern-footer>
    </div>

</body>

</html>