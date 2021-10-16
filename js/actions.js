// if (window.navigator.onLine) {
//     console.log("you are online");
// } else {
//     console.log("you are offline");
//     window.location = "../HTML/internetstopped.html"
// }
//Above code is not working as expected... need more working

function gotoWriteAReview() {
    window.location = "../HTML/WriteAReview.html"
}

function gotoSignUpPage() {
    window.location = "../HTML/signup.html"
}

function gotoSignInPage() {
    window.location = "../HTML/signin.html"
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




