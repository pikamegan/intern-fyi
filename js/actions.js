// if (window.navigator.onLine) {
//     console.log("you are online");
// } else {
//     console.log("you are offline");
//     window.location = "../HTML/internetstopped.html"
// }
//Above code is not working as expected... need more working
console.log(window.innerWidth);

function gotoWriteAReview() {
    window.location = "../HTML/WriteAReview.html"
}

function gotoSignUpPage() {
    window.location = "../HTML/signup.html"
}

function gotoSignInPage() {
    window.location = "../HTML/login.html"
}


function gotoHomePage() {
    window.location = "../index.html"
}


function gotoMyProfile() {
    window.location = "../HTML/myProfile.html"
}

function gotoSearch() {
    window.location = "../HTML/search.html"
}


function openForm() {
    document.getElementById("feedbackPopUp").style.display = "block";
}

function closeForm() {
    document.getElementById("feedbackPopUp").style.display = "none";
}

function showCriteria() {
    let criteria = {
        "Pay": "This job pays well",
        "Skills Learned": "The company helped me learn new skills",
        "Company Culture": "The company's level of cohesion and friendliness",
        "Food": "The price of nearby food",
        "Mentorship": "The company provides in-person training or mentorship",
        "Flat Hierarchy": "The company maintains little hierarchy"
    }

    let counter = 1
    for (criterion in criteria) {
        document.getElementById('btn' + counter).innerHTML += `<strong>${criterion}</strong>`
        document.getElementById('body' + counter).innerHTML += `${criteria[criterion]}`
        counter += 1
    }
}

// the 2 scroll functions are adapted from: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
function scrollFunction() {
    let scrollBtn = document.getElementById("scrollTop")
    if (document.body.scrollTop > 200 || document.documentElement.scrollTop > 200) {
        scrollBtn.style.display = "block";
    } else {
        scrollBtn.style.display = "none";
    }
}

function scrollToTop() {
    document.body.scrollTop = 0; // For Safari
    document.documentElement.scrollTop = 0; // For Chrome, Firefox, IE and Opera
}

function resetDraft() {
    
    let clearReview = document.getElementById("clearReview")
    clearReview.style.display = "block"
}

function clearReview() {
    let draft = document.getElementById("reviewForm")
    draft.reset()
    closePopup()
}

function closePopup() {
    let clearReview = document.getElementById("clearReview")
    clearReview.style.display = "none"

}

// Vue instance
const navigationBar = Vue.createApp({
    data() {
        return {

        }
    },
    methods: {
        isLogined() {
            return false
            //later can put axios to php, https://phpforever.com/vuejs/login-example-in-vuejs-and-php/
        }
    },
})

//Components
navigationBar.component('navigation-bar-small-login', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: `<!-- SMALL navigation bar for width smaller or = to 767  (USER LOGINed)-->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
        <div class="container-fluid d-inline-block">
        <div class="input-group my-2">
            <a class="navbar-brand" href="../index.html">
            <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
        </a>
        <input type="search" class="form-control rounded rounded-2" placeholder="Search..." aria-label="Search"
            aria-describedby="search-addon" />
        <button type="button" class="btn btn-success" id="searchButton">
            <div style="background-image: url(../img/search-magnifiying-glass.svg);width: 25px;height: 23px;"></div>
        </button>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        </div>
    </div>
    <div class="collapse navbar-collapse text-center" id="navbarCollapse">
        <a href="">Logout</a><br>
        <a href="../HTML/myProfile.html">My Profile</a><br>
        <a href="../HTML/WriteAReview.html">Write a Review &#9998;</a><br>
    </div>
    </nav>
    <!-- end of small navigation bar -->`
})

navigationBar.component('navigation-bar-small-logout', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: `<!-- SMALL navigation bar for width smaller or = to 767  (USER LOGOUTed)-->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
        <div class="container-fluid d-inline-block">

        <div class="input-group my-2">
            <a class="navbar-brand" href="../index.html">
            <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
            </a>
            <input type="search" class="form-control rounded rounded-2" placeholder="Search..." aria-label="Search"
            aria-describedby="search-addon" />
            <button type="button" class="btn btn-success" id="searchButton">
            <div style="background-image: url(../img/search-magnifiying-glass.svg);width: 25px;height: 23px;"></div>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
        <div class="collapse navbar-collapse text-center" id="navbarCollapse">
        <a href="../HTML/signup.html">Register</a><br>
        <a href="../HTML/lgin.html">Login</a><br>
        <a href="../HTML/WriteAReview.html">Write a Review &#9998;</a><br>
    </div>
    </nav>
    <!-- end of small navigation bar -->`
})

navigationBar.component('navigation-bar-big-login', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: `<nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">
        <img src="../IMG/Website-Logo.svg" style="height:40px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="input-group my-2">
            <input type="search" class="form-control rounded" placeholder="Search for Industy, Company or Role"
            aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-success" id="searchButton">
            <div style="background-image: url(../img/search-magnifiying-glass.svg);width: 25px;height: 23px;"></div>
            </button>
        </div>
        <button class="btn btn-primary my-2 mx-4 p-1" style="width:170px;" id="reviewBtn" onclick="gotoWriteAReview()">
            Write review
        </button>
        <button class="btn border-secondary rounded-circle me-2" id="userBtn" onclick="gotoMyProfile()">
            ZT
        </button>

        </div>
    </div>
    </nav>`
})

navigationBar.component('navigation-bar-big-logout', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: `<!-- Big Nav Bar width > 767 and Logout -->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../index.html">
        <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="input-group my-2">
            <input type="search" class="form-control rounded" placeholder="Search for Industy, Company or Role"
            aria-label="Search" aria-describedby="search-addon" />
            <button type="button" class="btn btn-success" id="searchButton">
            <div style="background-image: url(../img/search-magnifiying-glass.svg);width: 25px;height: 23px;"></div>
            </button>
        </div>
        <button class="btn btn-secondary my-2 mx-4" id="loginBtn" onclick="gotoSignInPage()">
            Login
        </button>
        <button class="btn btn-primary me-2" id="signUpBtn" onclick="gotoSignUpPage()">
            Signup
        </button>

        </div>
    </div>
    </nav>
    <!-- end of navigation bar -->`
})


navigationBar.mount('#navbarTemplate')


function showSpeechBubble(e) {
    let id = e.id + "SpeechBox"
    // console.log(id);
    let speechBubble = document.getElementById(id)

    if (speechBubble.classList.contains("hide")) {

        speechBubble.classList.remove("hide");


    } else {
        speechBubble.classList.add("hide");
    }

}

