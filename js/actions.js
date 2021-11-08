function changePw(){
    window.location = "../processDbRequest/model/signout.php"
}

function signOut() {
    window.location = "../processDbRequest/model/signout.php"
}

function gotoSignUpPage() {
    window.location = "../HTML/signup.php"
}

function gotoSignInPage() {
    window.location = "../HTML/login.php"
}


function gotoHomePage() {
    window.location = "../HTML/home.php"
}


function gotoMyProfile() {
    window.location = "../HTML/myProfile.php"
}

function gotoWriteAReview() {
    window.location = "../HTML/WriteAReview.php"
}

function gotoSearch() {
    window.location = "../HTML/search.php"
}

function openForm() {
    document.getElementById("feedbackPopUp").style.display = "block";
}

function closeForm() {
    document.getElementById("feedbackPopUp").style.display = "none";
}

function validate_form() {
    let role = document.forms['review_form'].jobtitle.value
    let roleMsg = document.getElementById("roleMsg")
    if (role.length == 0) {
        roleMsg.style.display = "block"
    } else {
        roleMsg.style.display = "none"
    }

    let overallRadio = document.forms['review_form'].overallrating.value
    let overallMsg = document.getElementById("overallMsg")
    if (overallRadio.length == 0) {
        overallMsg.style.display = "block"
    } else {
        overallMsg.style.display = "none"
    }

    for (let i = 1; i < 7; i++) {
        let criteriaRadio = `criteria${i}`
        let thisRadio = document.forms['review_form'][criteriaRadio]
        let criteriaMsg = document.getElementById(`criteria${i}Msg`)

        if (thisRadio.value == "") {
            criteriaMsg.style.display = "block"
        } else {
            criteriaMsg.style.display = "none"
        }
    }

    let review = document.forms['review_form'].reviewdesc.value
    let reviewMsg = document.getElementById("reviewMsg")
    if (review.length < 11) {
        reviewMsg.style.display = "block"
    } else {
        reviewMsg.style.display = "none"
    }
}


function validateRegistrationForm() {

    let fname = document.forms['register_form'].fname.value
    let lname = document.forms['register_form'].lname.value
    let gender = document.forms['register_form'].gender.value
    let school = document.forms['register_form'].school.value
    let schoolEmail = document.forms['register_form'].schoolEmail.value
    let pw1 = document.forms['register_form'].pw1.value
    let pw2 = document.forms['register_form'].pw.value

    let fnameMsg = document.getElementById("firstnameError")
    if (fname.length == 0) {
        fnameMsg.style.display = "block"
    } else {
        fnameMsg.style.display = "none"
    }

    let lnameMsg = document.getElementById("lastnameError")
    if (lname.length == 0) {
        lnameMsg.style.display = "block"
    } else {
        lnameMsg.style.display = "none"
    }

    let genderMsg = document.getElementById("genderError")
    if (gender == "Gender") {
        // console.log(gender.length);
        genderMsg.style.display = "block"
    } else {
        genderMsg.style.display = "none"
    }

    let schoolMsg = document.getElementById("schoolError")
    if (school.length == 0) {
        schoolMsg.style.display = "block"
    } else {
        schoolMsg.style.display = "none"
    }

    let schoolEmailMsg = document.getElementById("schoolnameError")
    if (schoolEmail.length == 0) {
        schoolEmailMsg.style.display = "block"
    } else {
        schoolEmailMsg.style.display = "none"
    }

    let pwFirstMsg = document.getElementById("pwOneError")
    if (pw1.length == 0) {
        pwFirstMsg.style.display = "block"
    } else {
        pwFirstMsg.style.display = "none"
    }

    let pwMsg = document.getElementById("pwCError")
    if (pw2.length == 0) {
        pwMsg.style.display = "block"
    } else {
        pwMsg.style.display = "none"
    }
}

function showCriteria() {
    getAllCompanies()

    let criteria = {
        "Pay": "This job pays well",
        "Skills Learned": "The company helped me learn new skills",
        "Company Culture": "The company's level of cohesion and friendliness",
        "Food": "The price of nearby food is reasonable",
        "Mentorship": "The company provides in-person training or mentorship",
        "Flat Hierarchy": "The company maintains little hierarchy, leading to better communication between employees"
    }

    let criteriaImg = [
        'pay_companyreview.svg', 'skills_companyreview.svg', 'companyculture_companyreview.svg', 'food_companyreview.svg',
        'mentorship_companyreview.svg', 'flathierarchy_companyreview.svg'
    ]

    let criteriaStr = ``
    let counter = 1

    for (criterion in criteria) {
        criteriaStr += `<div class="accordion-item">
        <h2 class="accordion-header=" id="heading${counter}">
            <button class="accordion-button" type="button" data-bs-toggle="collapse"
                data-bs-target="#collapse${counter}" aria-expanded="true" aria-controls="collapse${counter}">
                <strong>${criterion}</strong>
            </button>
        </h2>
        <div id="collapse${counter}" class="accordion-collapse collapse show" aria-labelledby="heading${counter}"
            data-bs-parent="#accordionExample">
            <div class="accordion-body px-5">
                <div class="row mb-1 align-items-center">
                    <div class="col-12 col-md-6 justify-content-center"><img
                            src="../img/${criteriaImg[counter - 1]}" alt="${criterion} criteria"
                            class="img-fluid d-none d-sm-block"></div>
                    <div class="col-12 col-md-6 d-flex bd-highlight flex-column mb-3">
    
                        <div class="p-2 bd-highlight text-center">${criteria[criterion]}</div>
                        <div class="p-2 bd-highlight d-flex justify-content-around">
    
                            <img src="../IMG/1bad.svg" alt="sad face"
                                style="width: 40px; height: 40px;">
                            <label class="inlineLabel"><input type="radio" name="criteria${counter}"
                                    class="inlineRadio pointer" value="1" required>1</label>
                            <label class="inlineLabel"><input type="radio" name="criteria${counter}"
                                    class="inlineRadio pointer" value="2" required>2</label>
                            <label class="inlineLabel"><input type="radio" name="criteria${counter}"
                                    class="inlineRadio pointer" value="3" required>3</label>
                            <label class="inlineLabel"><input type="radio" name="criteria${counter}"
                                    class="inlineRadio pointer"  value="4" required>4</label>
                            <label class="inlineLabel"><input type="radio" name="criteria${counter}"
                                    class="inlineRadio pointer" value="5" required>5</label>
                            <img src="../IMG/5happy.svg" alt="happy face"
                                style="width: 40px; height: 40px;">
    
                        </div>
                        <p class="text-center text-danger" style="display: none;" id="criteria${counter}Msg">Please select a value</p>
                    </div>
                </div>
    
            </div>
        </div>
        </div>`
        counter += 1
    }

    document.getElementById("accordionExample").innerHTML += criteriaStr


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


function validateFeedback() {
    let name = document.forms['feedback_form'].name.value
    let nameMsg = document.getElementById("nameMsg")
    if (name.length == 0) {
        nameMsg.style.display = "block"
        nameMsg.scrollIntoView({block: "center"})
    } else {
        nameMsg.style.display = "none"
    }

    let email = document.forms['feedback_form'].email.value
    let emailMsg = document.getElementById("emailMsg")
    if (email.length == 0) {
        emailMsg.style.display = "block"
        emailMsg.scrollIntoView({block: "center"})
    } else {
        emailMsg.style.display = "none"
    }

    let feedback = document.forms['feedback_form'].feedback.value
    let feedbackMsg = document.getElementById("feedbackMsg")
    if (feedback.length < 11) {
        feedbackMsg.style.display = "block"
    } else {
        feedbackMsg.style.display = "none"
    }
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
    axios.get(url, {
        params: {
            request: 'getAllCompanies',
        }
    })
        .then(response => {
            this.allCompanies = response.data
            let companyName = document.getElementsByClassName("companyName")
            let nameStr = "Company Name"

            let companyPhoto = document.getElementById("companyPhoto")

            let companyWebsite = document.getElementById("companyWebsite")
            let companyLinkedin = document.getElementById("linkedinLink")

            let companyInfo = document.getElementById("companyInfo")
            let infoStr = ""

            let companyLocation = document.getElementById("companyLocation")
            let locationStr = ""

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

            for (company of this.allCompanies) {
                if (getCompanyIdFromURL() == company.companyID) {
                    var idStr = `${company.companyID}`
                    nameStr = `${company.companyName}`
                    var photoStr = `${company.companyInfo.imageLink}`
                    infoStr = `${company.companyInfo.companyDescription}`
                    var readMore = `${company.companyInfo.companyWebsite}`
                    var linkedinStr = `${company.companyInfo.companyLinkedinLink}`
                    locationStr = `${company.companyInfo.location}`
                    overallRatingStr = ` ${company.companyRatings.overallRating}`
                    payRatingStr = `${company.companyRatings.averageCriteria1}`
                    skillsRatingStr = `${company.companyRatings.averageCriteria2}`
                    cultureRatingStr = `${company.companyRatings.averageCriteria3}`
                    foodRatingStr = `${company.companyRatings.averageCriteria4}`
                    mentorRatingStr = `${company.companyRatings.averageCriteria5}`
                    hierarchyRatingStr = `${company.companyRatings.averageCriteria6}`
                }
            }
            for (input of companyName) {
                input.innerHTML = nameStr
            }

            companyPhoto.src = photoStr
            companyWebsite.href = readMore
            companyLinkedin.href = linkedinStr

            companyInfo.innerHTML = infoStr
            companyLocation.innerHTML = locationStr

            companyRating.innerHTML += overallRatingStr

            payRating.innerHTML = payRatingStr
            skillsRating.innerHTML = skillsRatingStr
            cultureRating.innerHTML = cultureRatingStr
            foodRating.innerHTML = foodRatingStr
            mentorRating.innerHTML = mentorRatingStr
            hierarchyRating.innerHTML = hierarchyRatingStr

            let writeReviewBtn = document.getElementById("writeReviewBtn")
            writeReviewBtn.href = encodeURI("./WriteAReview.php?cid=" + idStr + "&cname=" + nameStr)

            getAllReviews(idStr)

        })

        .catch(error => {
            this.errorMessage = error.message
        });
}


function getAllCompanies() {
    let url = `../processDbRequest/processCompanyRequest.php`
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
                if (getCompanyIdFromURL() == company.companyID) {
                    str += `<option value=${company.companyID} selected>${company.companyName}</option>`
                } else {
                    str += `<option value=${company.companyID}>${company.companyName}</option>`
                }
            }

            companyList.innerHTML += str

        })
        .catch(error => {
            this.errorMessage = error.message
        });
}


function getAllReviews(companyId) {
    let url = '../processDbRequest/model/getReviews.php'
    let companyNo = companyId
    axios.get(url, {
        params: {
            companyNo: companyNo,
        }
    })
        .then(response => {
            this.posts = response.data

            let reviewStr = ``

            let companyReviewNum = document.getElementById("companyReviewNum")
            companyReviewNum.innerHTML += `${posts.length} people reviewed`

            let totalReviewNum = document.getElementById("totalReviewNum")
            totalReviewNum.innerHTML += `(${posts.length})`



            for (let i = posts.length - 1; i >= 0; i--) {
        
                let reviewdesc = posts[i].reviewDescription
                let jobTitle = posts[i].jobTitle


                let overallRating = posts[i].overallRating
                let criteria1 = posts[i].criteria1
                let criteria2 = posts[i].criteria2
                let criteria3 = posts[i].criteria3
                let criteria4 = posts[i].criteria4
                let criteria5 = posts[i].criteria5
                let criteria6 = posts[i].criteria6

                let postDate = posts[i].postDateTime
                let postYear = (postDate.slice(0, 4))
                let postMonth = (postDate.slice(5, 7)) - 1 // minus 1 due to months starting from 0
                let postDay = (postDate.slice(8, 10))
                let postHour = (postDate.slice(11, 13))
                let postMinute = (postDate.slice(14, 16))
                let postSecond = (postDate.slice(17, 19))

                let date2compare = new Date()
                date2compare.setFullYear(postYear)
                date2compare.setMonth(postMonth)
                date2compare.setDate(postDay)
                date2compare.setHours(postHour)
                date2compare.setMinutes(postMinute)
                date2compare.setSeconds(postSecond)

                const date = new Date()
                const [month, day, year] = [date.getMonth(), date.getDate(), date.getFullYear()]
                const [hour, minutes, seconds] = [date.getHours(), date.getMinutes(), date.getSeconds()]

                let timeDifference = date.getTime() - date2compare.getTime()
                let dayDifference = Math.ceil(timeDifference / (1000 * 3600 * 24))
                var dayStr = `${dayDifference} days ago`

                if (dayDifference == 1) {
                    dayStr = `${dayDifference} day ago`
                }
                else if (dayDifference == 0) {
                    dayStr = `Today`
                }

                reviewStr += `

                <div class="card text-center mb-5">
                    <div class="card-header">
                        <p><strong>Overall Rating:  <img src="../IMG/star.svg" alt="star"> ${overallRating}</strong></p>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title text-start mb-3">
                            <img src="" alt="User profile image" style="width: 48px; height: 48px;" id="userImg${i}">
                            <strong>${jobTitle}</strong>
                        </h5>
                        <div class="card-subtitle mb-2 ps-1 text-muted text-start d-flex justify-content-around flex-wrap">
                            <p>Pay: 💰 ${criteria1} </p>
                            <p>Skills: 📚 ${criteria2} </p>
                            <p>Culture: 🎉 ${criteria3} </p>
                            <p>Food: 🍕 ${criteria4} </p>
                            <p>Mentorship: 🤝 ${criteria5} </p>
                            <p>Hierarchy: 📊 ${criteria6} </p>
                        </div>
                        <p class="card-text text-start ps-1">${reviewdesc}</p>
                    </div>
                    <div class="card-footer text-muted">
                        ${dayStr}
                    </div>
                </div>
                `
                let url = `../processDbRequest/model/getUserImg.php`
                axios.get(url, {
                    params: {
                        email: posts[i].schoolEmail,
                    }
                })
                    .then(response => {
                        this.review = response.data
                        let imgStr = this.review.profilePictureUrl
                        let imgUrl = document.getElementById(`userImg${i}`)
                        imgUrl.src = imgStr
                    })
                    .catch(error => {
                        this.errorMessage = error.message
                    });

                let reviewsBox = document.getElementById("reviewsBox")
                reviewsBox.innerHTML = reviewStr
            }
        })
        .catch(error => {
            console.log(error)
            let noReviewStr = `Reviews cannot be shown at this time. Come back later!`

            let reviewsBox = document.getElementById("reviewsBox")
            reviewsBox.innerHTML = noReviewStr
        })
}


function getCompanyIdFromURL() {
    let link = decodeURI(window.location.href)
    let firstNum = link.search("cid=")
    var cleanLink = ""
    if (link.search("&") == -1) {
        cleanLink = link.slice(firstNum + 4)
    } else {
        let lastNum = link.search("&")
        cleanLink = link.slice(firstNum + 4, lastNum)
    }
    cleanLink = cleanLink.replace("#", "")
    return cleanLink
}

function loadFAQ() {
    let questions = {
        'Reviews': 
            {'Are the reviews on this site reliable?': 'Yes! The site admins check through the reviews after they are uploaded to ensure that there are no inappropriate or irrelevant comments made about a company. We do not condone any form of misinformation or slander. If you see any review that does not seem to meet community guidelines, do feel free to get in touch with us by clicking the "Contact Us" button. However, if you see a review that rates a company badly, keep in mind that these reflect the subjective experience of the intern, and are not necessarily true for every intern at that company.', 

            'How do I write a review?': 'You can go directly to the "Write a Review" button in the navigation bar at the top of your screen. You can also go to the company page and click the "Write a Review" button, or click the "Write a Review" button in the search results for the company you want to review.',

            'Who can see my reviews?': 'All visitors to the website will be able to see your review, whether or not they have an account with us. However, your profile details will be kept private (only your real profile picture will be shown with your review. Other details such as your name and email will be kept hidden from other users unless you choose to reveal it in the content of your review.'
        },

        'Company Profile': 
            {'How do I know if the information on a company profile is accurate?': '', 
            'Can I remove my company from the site?': '',
            'I do not see the company I want to review, how can I add a company to the site?': ''
        },

        'Policies': 
            {'Why did my review get deleted?': 'A user or us admin may have found your review inappropriate and thus deleted it. You can click the contact us button, and we will look over the review again.', 

            'Why is my account suspended?': 'Our system may have detected unusual activity from your account, forcing us to temporarily suspend your account. If you believe this is an error, please let us know by clicking the contact us button.',

            'How many reviews can I write a day?': 'You can write as many reviews as you want, but if we detect that you are spamming our servers or writing false reviews, we will be forced to suspend your account.'
        }
    }
}

// Vue instance
const navigationBar = Vue.createApp({
    data() {
        return {
        }
    },
    methods: {

    },
    created() {
    }
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
            window.location = encodeURI("../HTML/search.php" + "?sname=" + this.searchQuery)
        }
    },
    template: `<!-- SMALL navigation bar for width smaller or = to 767  (USER LOGINed)-->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
        <div class="container-fluid d-inline-block">
        <div class="input-group my-2">
            <a class="navbar-brand" href="../HTML/home.php">
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
        <a href="../HTML/myProfile.php">My Profile</a><br>
        <a href="../HTML/WriteAReview.php">Write a Review &#9998;</a><br>
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
            window.location = encodeURI("../HTML/search.php" + "?sname=" + this.searchQuery)
        }
    },
    template: `<!-- SMALL navigation bar for width smaller or = to 767  (USER LOGOUTed)-->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
        <div class="container-fluid d-inline-block">
            <div class="input-group my-2">
                <a class="navbar-brand" href="../HTML/home.php">
                <img src="../IMG/Website-Logo.svg" style="height:40px;" onclick="gotoHomePage()">
                </a>
                <input @keyup.enter="toSearchPage" v-model="searchQuery" id = "searchBox" type="search" class="form-control rounded rounded-2" placeholder="Search..." aria-label="Search"
                aria-describedby="search-addon" />
                <button @click="toSearchPage" type="button" class="btn btn-success" id="searchButton">
                <div style="background-image: url(../img/search-magnifiying-glass.svg);width: 25px;height: 23px;">
                </div>
                </button>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse"
                aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
            </div>
        </div>
        <div class="collapse navbar-collapse text-center" id="navbarCollapse">
            <a href="../HTML/signup.php">Register</a><br>
            <a href="../HTML/login.php">Login</a><br>
            <a href="../HTML/WriteAReview.php">Write a Review &#9998;</a><br>
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
            window.location = encodeURI("../HTML/search.php" + "?sname=" + this.searchQuery)
        },
    },
    template: `<nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../HTML/home.php">
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
        <button class="btn btn-primary my-2 mx-1 p-1" style="width:170px;" id="reviewBtn" onclick="gotoWriteAReview()">
            Write review
        </button>
        <button class="btn btn-secondary my-2 mx-1" style="width:170px;" onclick="signOut()">
            Logout
        </button>
        <button class="btn rounded-circle" id="userBtn" onclick="gotoMyProfile()">
            <slot></slot>
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
            window.location = encodeURI("../HTML/search.php" + "?sname=" + this.searchQuery)
        }
    },
    template: `<!-- Big Nav Bar width > 767 and Logout -->

    <nav class="navbar navbar-expand-md navbar-light bg-white" aria-label="Navbar">
    <div class="container-fluid">
        <a class="navbar-brand" href="../HTML/home.php">
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

navigationBar.mount('.navbarTemplate');


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

