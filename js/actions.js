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
    let criteria = {"Pay": "This job pays well", 
        "Skills Learned": "The company helped me learn new skills", 
        "Company Culture": "The company's level of cohesion and friendliness", 
        "Food": "The price of nearby food", 
        "Mentorship": "The company provides in-person training or mentorship", 
        "Flat Hierarchy": "The company maintains little hierarchy"}
    
    let counter = 1
    for (criterion in criteria) {
        document.getElementById('btn'+counter).innerHTML += `<strong>${criterion}</strong>`
        document.getElementById('body'+counter).innerHTML += `${criteria[criterion]}`
        counter += 1
    }
}


// Vue instance
const navigationBar = Vue.createApp({
    data() {
        return {
        }
    },
    methods: {
        checkNavWidth() {
            if (window.screen.width >= 767) {
                // small
                return true
            } else {
                // big
                return false
            }
        }
    },
})


//Components
navigationBar.component('navigationBarSmallLogin', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: ``
})

navigationBar.component('navigationBarSmallLogout', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: ``
})

navigationBar.component('navigationBarBigLogin', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: ``
})


navigationBar.component('navigationBarBigLogout', {
    data() {  // data option of the component
        return {
        }
    },
    methods: {
    },
    template: ``
})

navigationBar.mount('#navbarTemplate')



