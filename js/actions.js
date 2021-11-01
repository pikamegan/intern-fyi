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
    window.location = "../HTML/home.html"
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

function validate_form() {

    // There are 3 ways to access a Form Input Field
    var writtenreview = document.forms['review_form'].reviewdesc.value;     // This works if input field has NAME attribute
    //var s = document.forms['entry_form']['my_subject'].value; // This works if input field has ID attribute
    //var s = document.entry_form.subject.value;                 // This works if input field has NAME attribute
    console.log(writtenreview)
    if( writtenreview.length < 11 ) {
        alert("Written Review must be contain at least 10 characters");
        var is_valid = false;
        form.addEventListener('submit', function (event) {
            if (!is_valid) {
              event.preventDefault()
              event.stopPropagation()
            }
        })
    }
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

    getAllCompanies()
}

// the 2 scroll functions below are adapted from: https://www.w3schools.com/howto/howto_js_scroll_to_top.asp
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

function resetDraft(id) {
    let popup = document.getElementById(id)
    let bodyScroll = document.getElementsByClassName("onPopup")
    let selectBtn = document.getElementsByClassName("form-select")
    let inputs = document.getElementsByClassName("form-control")
    let radioBtns = document.getElementsByClassName("inlineRadio")
    let accordions = document.getElementsByClassName("accordion-button")

    popup.style.display = "block"
    bodyScroll[0].style.overflow = "hidden"
    selectBtn[0].disabled = true

    for (input of inputs) {
        input.disabled = true
    }

    for (radioBtn of radioBtns) {
        radioBtn.disabled = true
    }

    for (accordion of accordions) {
        accordion.disabled = true
    }
}

function clearReview() {
    let draft = document.getElementById("reviewForm")

    draft.reset()
    closePopup("clearReview")
}

var submitted = false

function submitReview() {
    let submit = document.getElementById("submitReview")
    submit.style.display = "block"
    resetDraft("submitReview")
    
    submitted = true
}

function submitFeedback() {
    let submit = document.getElementById("submitFeedback")
    submit.style.display = "block"

    disableForm()
}

function disableForm() {
    let body = document.getElementsByTagName("body")[0]
    body.style.overflow = "hidden"

    let inputs = document.getElementsByClassName("form-control")
    for (input of inputs) {
        input.disabled = true
    }
    let selectBtn = document.getElementsByClassName("form-select")
    selectBtn[0].disabled = true

    let submitBtn = document.getElementById("submitBtn")
    submitBtn.disabled = true
}

function enableForm() {
    let submit = document.getElementById("submitFeedback")
    submit.style.display = "none"

    let body = document.getElementsByTagName("body")[0]
    body.style.overflow = "auto"

    let inputs = document.getElementsByClassName("form-control")
    for (input of inputs) {
        input.disabled = false
    }
    let selectBtn = document.getElementsByClassName("form-select")
    selectBtn[0].disabled = false

    let submitBtn = document.getElementById("submitBtn")
    submitBtn.disabled = false

    scrollToTop()
}

function closePopup(id) {
    let popup = document.getElementById(id)
    let bodyScroll = document.getElementsByClassName("onPopup")
    let selectBtn = document.getElementsByClassName("form-select")
    let inputs = document.getElementsByClassName("form-control")
    let radioBtns = document.getElementsByClassName("inlineRadio")
    let accordions = document.getElementsByClassName("accordion-button")

    popup.style.display = "none"
    bodyScroll[0].style.overflow = "auto"
    selectBtn[0].disabled = false

    for (input of inputs) {
        input.disabled = false
    }

    for (radioBtn of radioBtns) {
        radioBtn.disabled = false
    }

    for (accordion of accordions) {
        accordion.disabled = false
    }

    scrollToTop()
}

function loadCompanyPage() {
    let url = `../processDbRequest/processCompanyRequest.php`
    url = `../processDbRequest/tmpOutputProcessCompanyRequest.php`
    // use the one above when connecting to connect to real db with php
    axios.get(url, {
        params: {
            request: 'getAllCompanies',
        }
    })
        .then(response => {
            this.allCompanies = response.data
            let companyName = document.getElementsByClassName("companyName")
            let nameStr = "Company Name"

            let companyInfo = document.getElementById("companyInfo")
            let infoStr = ""

            let companyLocation = document.getElementById("companyLocation")
            let locationStr = ""

            let companyReviewNum = document.getElementById("companyReviewNum")
            let reviewNumStr = ""

            let companyRating = document.getElementById("companyRating")
            let overallRatingStr = ""

            let payRating = document.getElementById("payRating")
            let payRatingStr = ""

            let skillsRating = document.getElementById("skillsRating")
            let skillsRatingStr = ""

            let cultureRating = document.getElementById("cultureRating")
            let cultureRatingStr = ""

            let foodRating = document.getElementById("foodRating")
            let foodRatingStr = ""

            let mentorRating = document.getElementById("mentorRating")
            let mentorRatingStr = ""

            let hierarchyRating = document.getElementById("hierarchyRating")
            let hierarchyRatingStr = ""

            let totalReviewNum = document.getElementById("totalReviewNum")
            let totalReviewStr = ""

            for (company of this.allCompanies) {
                if (getCompanyNameFromURL() == company.companyName.toLowerCase()) {
                    nameStr = `${company.companyName}`
                    infoStr = `${company.companyInfo.companyDescription}`
                    locationStr = `${company.companyInfo.location}`
                    reviewNumStr = ` ${company.companyRatings.totalNumReviews} people reviewed`
                    overallRatingStr = ` ${company.companyRatings.overallRating}`
                    payRatingStr = `${company.companyRatings.averageCriteria1}`
                    skillsRatingStr = `${company.companyRatings.averageCriteria2}`
                    cultureRatingStr = `${company.companyRatings.averageCriteria3}`
                    foodRatingStr = `${company.companyRatings.averageCriteria4}`
                    mentorRatingStr = `${company.companyRatings.averageCriteria5}`
                    hierarchyRatingStr = `${company.companyRatings.averageCriteria6}`
                    totalReviewStr = `(${company.companyRatings.totalNumReviews})`
                }
            }
            for (input of companyName) {
                input.innerHTML = nameStr
            }

            companyInfo.innerHTML = infoStr
            companyLocation.innerHTML = locationStr
            companyReviewNum.innerHTML += reviewNumStr

            companyRating.innerHTML += overallRatingStr

            payRating.innerHTML = payRatingStr
            skillsRating.innerHTML = skillsRatingStr
            cultureRating.innerHTML = cultureRatingStr
            foodRating.innerHTML = foodRatingStr
            mentorRating.innerHTML = mentorRatingStr
            hierarchyRating.innerHTML = hierarchyRatingStr

            totalReviewNum.innerHTML += totalReviewStr

        })

        .catch(error => {
            this.errorMessage = error.message
        });
}

function getCompanyNameFromURL() {
    let link = decodeURI(window.location.href)
    let firstNum = link.search("cname=")
    let cleanLink = link.slice(firstNum + 6).toLowerCase()
    cleanLink = cleanLink.replace("#", "")
    return cleanLink
}

function getAllCompanies() {
    let url = `../processDbRequest/processCompanyRequest.php`
    url = `../processDbRequest/tmpOutputProcessCompanyRequest.php`
    // use the one above when connecting to connect to real db with php
    axios.get(url, {
        params: {
            request: 'getAllCompanies',
        }
    })
        .then(response => {
            this.allCompanies = response.data
            var companyList = document.getElementById("company")
            let str = ""
            for (company of this.allCompanies) {
                if (getCompanyFromURL() == company.companyName.toLowerCase()) {
                    str += `<option value=${company.companyName} selected>${company.companyName}</option>`
                } else {
                    str += `<option value=${company.companyName}>${company.companyName}</option>`
                }
            }

            companyList.innerHTML += str
        })
        .catch(error => {
            this.errorMessage = error.message
        });


}

function getCompanyFromURL() {
    let link = window.location.href
    let firstNum = link.search("company")
    return link.slice(firstNum + 8).toLowerCase()
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
            searchQuery: ''
        }
    },
    methods: {
        toSearchPage() {
            window.location = encodeURI("../HTML/search.html" + "?sname=" + this.searchQuery)
        }
    },
    template: `<!-- SMALL navigation bar for width smaller or = to 767  (USER LOGINed)-->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
        <div class="container-fluid d-inline-block">
        <div class="input-group my-2">
            <a class="navbar-brand" href="../HTML/home.html">
            <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
        </a>
        <input @keyup.enter="toSearchPage" v-model="searchQuery" id = "searchBox" type="search" class="form-control rounded rounded-2" placeholder="Search..." aria-label="Search"
            aria-describedby="search-addon" />
        <button @click="toSearchPage" type="button" class="btn btn-success" id="searchButton">
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
            searchQuery: ''
        }
    },
    methods: {
        toSearchPage() {
            window.location = encodeURI("../HTML/search.html" + "?sname=" + this.searchQuery)
        }
    },
    template: `<!-- SMALL navigation bar for width smaller or = to 767  (USER LOGOUTed)-->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
        <div class="container-fluid d-inline-block">

        <div class="input-group my-2">
            <a class="navbar-brand" href="../HTML/home.html">
            <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
            </a>
            <input @keyup.enter="toSearchPage" v-model="searchQuery" id = "searchBox" type="search" class="form-control rounded rounded-2" placeholder="Search..." aria-label="Search"
            aria-describedby="search-addon" />
            <button @click="toSearchPage" type="button" class="btn btn-success" id="searchButton">
            <div style="background-image: url(../img/search-magnifiying-glass.svg);width: 25px;height: 23px;"></div>
            </button>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
            aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
        </div>
        </div>
        <div class="collapse navbar-collapse text-center" id="navbarCollapse">
        <a href="./signup.html">Register</a><br>
        <a href="./login.html">Login</a><br>
        <a href="./WriteAReview.html">Write a Review &#9998;</a><br>
    </div>
    </nav>
    <!-- end of small navigation bar -->`
})

navigationBar.component('navigation-bar-big-login', {
    data() {  // data option of the component
        return {
            searchQuery: ''
        }
    },
    methods: {
        toSearchPage() {
            window.location = encodeURI("../HTML/search.html" + "?sname=" + this.searchQuery)
        }
    },
    template: `<nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../HTML/home.html">
        <img src="../IMG/Website-Logo.svg" style="height:40px;">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="input-group my-2">
            <input @keyup.enter="toSearchPage" v-model="searchQuery" id = "searchBox" type="search" class="form-control rounded" placeholder="Search for Company or Industry"
            aria-label="Search" aria-describedby="search-addon" />
            <button @click="toSearchPage" type="button" class="btn btn-success" id="searchButton">
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
            searchQuery: ''
        }
    },
    methods: {
        toSearchPage() {
            window.location = encodeURI("../HTML/search.html" + "?sname=" + this.searchQuery)
        }
    },
    template: `<!-- Big Nav Bar width > 767 and Logout -->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../HTML/home.html">
        <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
        aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarCollapse">
        <div class="input-group my-2">
            <input @keyup.enter="toSearchPage" v-model="searchQuery" id = "searchBox" type="search" class="form-control rounded" placeholder="Search for Company or Industry"
            aria-label="Search" aria-describedby="search-addon" />
            <button @click="toSearchPage" type="button" class="btn btn-success" id="searchButton">
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

navigationBar.mount('.navbarTemplate')


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


const footer = Vue.createApp({
    data() {
        return {

        }
    },
    methods: {
        goHome(url) {
            console.log('%c went inside! ', 'background: #222; color: #bada55',
                'into function');
            window.location = url
        }
    },
});

footer.component('intern-footer', {
    data() {
        return {
        }
    },
    methods: {

    },
    props: ['home', 'abt', 'career', 'help', 'feedback'], // only lower case
    template: `
    <footer class="footer mt-auto py-3 bg-white">
      <div class="container">
        <div class="row py-5">
          <div class="col-lg-4 col-md-5">
            <h2 style="text-align:left;" v-on:click="$emit('gotohome', home)" >Intern.FYI</h2>
            <p>
              Intern at better companies. <br>
              And have a better experience.
            </p>
          </div>

          <div class="col-lg-2 col-md-3 my-2">
            <h4>Company</h4>
            <div>
              <a class="footer-links" :href="abt" style="color: inherit;
            text-decoration: none;">About Us</a>
            </div>
            <div>
              <a class="footer-links" :href="career" style="color: inherit;
            text-decoration: none;">Careers</a>
            </div>
          </div>

          <div class="col-lg-2 col-md-3 my-2">
            <h4>Contact</h4>
            <div>
              <a class="footer-links" :href="help" style="color: inherit;
            text-decoration: none;">Help/FAQ</a>
            </div>
            <div>
              <a class="footer-links" :href="feedback" style="color: inherit;
            text-decoration: none;">Leave Feedback</a>
            </div>
          </div>
        </div>

        <div class="row my-3">
          <div class="col" style="text-align:center;">
            All rights <a href="mailto:Intern.FYI.contact@gmail.com" style="color: inherit;
            text-decoration: none;">Intern.FYI.contact@gmail.com</a>
          </div>
        </div>
      </div>
    </footer>
  <!-- end of footer -->`
})

//MUST mount
const constFooter = footer.mount('.footerComp');

