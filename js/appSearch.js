//map functions start==========================
var userLat = -34.397;
var userLong = 150.644;
function showYourLocation() {
    let zipCode = document.getElementById("userZipCode").value
    console.log(zipCode);
    const url = `https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCzFIE4IcUd35I_HeFWhbmEFZpNnx4SogA&components=postal_code:${zipCode}`;
    axios
        .get(url)
        .then((response) => {
            // process response.data object
            // console.log(response.data);
            const myJSON = JSON.stringify(response.data);
            console.log(myJSON);
            userLong = response.data.results[0].geometry.location.lng
            userLat = response.data.results[0].geometry.location.lat
            // console.log(userLat);
            initMap()
        })
        .catch((error) => {
            // process error object
            console.log(error.message);
            //document.getElementById("displayString").innerText = "Something went wrong";
        });

}

var map;
console.log(userLat);
function initMap() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: { lat: userLat, lng: userLong },
        zoom: 15
    });
}
//map functions end==========================


const appSearch = Vue.createApp({
    data() {
        return {
            allCompanies: null,
            errorMessage: null,
            currentImgSrc: "../img/AtoZ.svg",
            currentFilterImg: "../img/filter.svg",
            sortCompanies: '0'
        }
    },
    methods: {
        getAllCompanies() {
            let url = `../processDbRequest/processCompanyRequest.php`;
            url = `../processDbRequest/tmpOutputProcessCompanyRequest.php`;
            // use the one above when connecting to connect to real db with php
            axios.get(url, {
                params: {
                    request: 'getAllCompanies',
                }
            })
                .then(response => {
                    this.allCompanies = response.data;
                })
                .catch(error => {
                    this.errorMessage = error.message;
                });
        },
        changeLetterSortImg() {
            if (this.currentImgSrc === "../img/AtoZ.svg") {
                this.currentImgSrc = "../img/ZtoA.svg";
            } else {
                this.currentImgSrc = "../img/AtoZ.svg";
            }
        },
        changeFilterImg() {
            if (this.currentFilterImg === "../img/filter.svg") {
                this.currentFilterImg = "../img/clearfilter.svg";
            } else {
                this.currentFilterImg = "../img/filter.svg";
            }
        }

    },
    created() {
        this.getAllCompanies();
    }
    // computed: {
    //     companyNames() {
    //         if (this.allCompanies != null) {
    //             companyNames = [];
    //             for (index in this.allCompanies) {
    //                 companyName = this.allCompanies[index].companyName;
    //                 companyNames.push(companyName);
    //             }
    //             return companyNames;
    //         }
    //     },
    // }
})

// appSearch.component('company-row', {
//     props: ['companyinfo'],
//     template:
//         `<div class="row py-3 shadow">
//             <div class="col">
//                 <img :src="companyinfo.imgUrl" style="height: 100px; width: 100px; float: left">
//                 <div>
//                     {{ companyinfo.id }}
//                 </div>
//                 <div>
//                     {{ companyinfo.name }}
//                 </div>
//             </div>
//         </div>`
// })

appSearch.component('company-row', {
    data() {
        return {
            myMaxHeight: null,
            maxScrollHeight: '', //to be done
            isSelected: false,
            companyPage: encodeURI("./company.html?cid=" + this.company.companyID + "&cname=" + this.company.companyName),
            writeReviewPage: encodeURI("./WriteAReview.html?cid=" + this.company.companyID + "&cname=" + this.company.companyName)
        };
    },
    props: ['company', 'selectedCompanyID'],
    computed: {
        changeState() {
            this.selectedCompanyID;
            if (this.isSelected) {
                this.isSelected = false;
                this.showInfomation();
            } else if (this.company.companyID == this.selectedCompanyID) {
                this.isSelected = true;
                this.showInfomation();
            }
        },
    },

    methods: {
        showInfomation() {
            if (this.myMaxHeight) {
                this.myMaxHeight = null;
            } else {
                // myMaxHeight = collapsibleContentSearch.scrollHeight + "px"; proably need do dom outside to get the scrollHeight
                this.myMaxHeight = "80px";
                // this.myMaxHeight = "200px";
            }
        },
        select() {
            if (this.isSelected) {
                this.$emit('select', null);
            } else {
                this.$emit('select', this.company.companyID);
            }
        },


    },
    template: `
<div class="row">
    <div class="collapsibleSearch shadow" @click='select' @select='changeState'>
        <img :src="company.companyInfo.imageLink" style="height: 100px; width: 100px; float: left; border-radius: 10px">
        <div class="container">
            <div class="row justify-content-between">
                <div class="col searchRowTitle">
                    {{company.companyName}}
                </div>
                <div class="col-auto align-items-end">
                    {{company.companyRatings.overallRating}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;">
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-xl-3 col-lg-4">
                    company.location
                </div>
                <div class="col">
                    <img src="../img/mapMarkIcon_black.svg" style="height: 20px; width: 20px;">
                    company.distance
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-xl-3 col-lg-4">
                    <img src="../img/pen_write_review.svg" style="height: 20px; width: 20px;">
                    <a :href="writeReviewPage">
                        Write a Review
                    </a>
                </div>
                <div class="col">
                    <img src="../img/eyeSeeCompanyReview.svg" style="height: 20px; width: 20px;">
                    <a :href="companyPage">
                        View Company Profile
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="collapsibleContentSearch" :style="{'max-height':myMaxHeight}" :scrollHeight='maxScrollHeight'>
        <div>
            <div class="row">
                <div class="col-xxl-2 col-xl-3 col-2 align-self-center">
                    <img src="../img/click.svg" style="width: 25px; height: 25px; padding: 1px;">
                    {{company.companyRatings.numberOfClicks}}
                    <div class="d-none d-xl-inline">
                        clicks 
                    </div><br>
                    
                    <img src="../img/review.svg" style="width: 25px; height: 25px; padding: 1px;">
                    {{company.companyRatings.totalNumReviews}}
                    <div class="d-none d-xl-inline">
                        reviews
                    </div>
                </div>
                <div class="col">
                    <img src="../img/pay_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    <div class="d-none d-xxl-inline">
                        Good Pay:
                    </div>
                    {{company.companyRatings.averageCriteria1}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>

                    <img src="../img/skills_companyReview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    <div class="d-none d-xxl-inline">
                        New Skills:
                    </div>
                    {{company.companyRatings.averageCriteria2}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;">
                </div>
                <div class="col">
                    <img src="../img/companyculture_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    <div class="d-none d-xxl-inline">
                        Friendly:
                    </div>
                    {{company.companyRatings.averageCriteria3}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>

                    <img src="../img/food_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    <div class="d-none d-xxl-inline">
                        Food Price:
                    </div>
                    {{company.companyRatings.averageCriteria4}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;">
                </div>
                <div class="col">
                    <img src="../img/mentorship_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    <div class="d-none d-xxl-inline">
                        Mentorship:
                    </div>
                    {{company.companyRatings.averageCriteria5}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>

                    <img src="../img/flatheirachy_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    <div class="d-none d-xxl-inline">
                        Flat Hierarchy:
                    </div>
                    {{company.companyRatings.averageCriteria6}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>
                </div>
            </div>
        </div>
    </div>
</div>
`
});


appSearch.component('company-row-list', {
    data() {
        return {
            selectedCompanyID: null
        };
    },
    props: ['companylist'],
    methods: {
        selectCompany(companyID) {
            this.selectedCompanyID = companyID;
            // console.log(this.selectedCompanyID);
        }
    },
    template:
        `<div class="container">
        <company-row 
        v-for="company in companylist" 
        :company="company" 
        @select="selectCompany"
        :selectedCompanyID="selectedCompanyID"
        ></company-row>
        </div>`
});


const vmSearch = appSearch.mount('#appSearch');