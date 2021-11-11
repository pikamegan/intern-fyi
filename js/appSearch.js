//map functions start==========================
// var userLat = -34.397;
// var userLong = 150.644;
// function showYourLocation() {
//     let zipCode = document.getElementById("userZipCode").value
//     console.log(zipCode);
//     const url = `https://maps.googleapis.com/maps/api/geocode/json?key=AIzaSyCzFIE4IcUd35I_HeFWhbmEFZpNnx4SogA&components=postal_code:${zipCode}`;
//     axios
//         .get(url)
//         .then((response) => {
//             // process response.data object
//             // console.log(response.data);
//             const myJSON = JSON.stringify(response.data);
//             // console.log(myJSON);
//             userLong = response.data.results[0].geometry.location.lng
//             userLat = response.data.results[0].geometry.location.lat
//             // console.log(userLat);
//             initMap()
//         })
//         .catch((error) => {
//             // process error object
//             // console.log(error.message);
//             //document.getElementById("displayString").innerText = "Something went wrong";
//         });

// }

// var map;
// console.log(userLat);
// function initMap() {
//     map = new google.maps.Map(document.getElementById('map'), {
//         center: { lat: userLat, lng: userLong },
//         zoom: 15
//     });
// }
//map functions end==========================

// uncomment for testing / deploying
// const apiKey = 'AIzaSyCzFIE4IcUd35I_HeFWhbmEFZpNnx4SogA';
const appSearch = Vue.createApp({
    data() {
        return {
            searchQuery: null,
            allCompanies: [],
            displayCompanies: [],
            errorMessage: null,
            sortCompanies: "overallRating",
            sortCompaniesValues: {
                "Overall": "overallRating",
                "Good Pay": "averageCriteria1",
                "New Skills": "averageCriteria2",
                "Friendly": "averageCriteria3",
                "Food Price": "averageCriteria4",
                "Mentorship": "averageCriteria5",
                "Flat Hierarchy": "averageCriteria6"
            },
            filterLocation: [],
            filterLocationValues: [
                "CBD",
                "Central",
                "North East",
                "North",
                "East",
                "West",
                "Others"
            ],
            filterIndustry: [],
            filterIndustryValues: [
                "Internet",
                "Technology",
                "Electronics",
                "Banking",
                "Energy",
                "Others"
            ],
            isClose: false,
            userLng: '',
            userLat: '',
        }
    },
    methods: {
        getSearchQuery() {
            const queryString = window.location.search;
            const urlParams = new URLSearchParams(queryString);

            let queryName1 = 'sname'
            if (urlParams.has(queryName1) && urlParams.get(queryName1) != "") {
                this.searchQuery = urlParams.get(queryName1)
            }
        },
        sortCompaniesMethod() {
            if (this.displayCompanies.length > 0) {
                // console.log("sort");
                sortBy = this.sortCompanies;
                if (this.displayCompanies != null) {
                    this.displayCompanies.sort((a, b) => {
                        return parseFloat(b.companyRatings[sortBy]) - parseFloat(a.companyRatings[sortBy]);
                    });
                }
            }
        },
        getAllCompanies() {
            let url = `../processDbRequest/processCompanyRequest.php`;
            // url = `../processDbRequest/tmpOutputProcessCompanyRequest.php`;
            // use the one above when connecting to connect to real db with php
            axios.get(url, {
                params: {
                    request: 'getAllCompanies',
                }
            })
                .then(response => {
                    for (i = 0; i < response.data.length; i++) {
                        this.getLocationAndDistance(response.data[i])
                    }
                    this.sortCompaniesMethod();
                })
                .catch(error => {
                    this.errorMessage = error.message;
                });
        },
        getSearchedCompanies() {
            let url = `../processDbRequest/processCompanyRequest.php`;
            // url = `../processDbRequest/tmpOutputProcessCompanyRequest.php`;
            // use the one above when connecting to connect to real db with php
            axios.get(url, {
                params: {
                    request: 'search',
                    sname: this.searchQuery
                }
            })
                .then(response => {
                    for (i = 0; i < response.data.length; i++) {
                        this.getLocationAndDistance(response.data[i])
                    }
                    this.sortCompaniesMethod();
                })
                .catch(error => {
                    this.errorMessage = error.message;
                });
        },
        getRegion(postalCode) {
            // region estimation from postal code
            //http://danielchoy.blogspot.com/2017/03/singapore-postal-codes-and-district.html
            //https://en.wikipedia.org/wiki/Postal_codes_in_Singapore#Postal_districts
            if (postalCode == null || postalCode.length == 0) {
                return "Others"
            }
            sector = parseInt(String(postalCode).substring(0, 2))
            if (sector >= 1 && sector <= 8) {
                return "CBD"
            } else if (sector >= 9 && sector <= 16) {
                return "Central"
            } else if (sector >= 17 && sector <= 23) {
                return "CBD"
            } else if (sector >= 24 && sector <= 45) {
                return "Central"
            } else if ((sector >= 46 && sector <= 52) || sector == 81) {
                return "East"
            } else if ((sector >= 53 && sector <= 57) || sector == 82 || (sector >= 79 && sector <= 80)) {
                return "North East"
            } else if (sector >= 58 && sector <= 59) {
                return "Central"
            } else if (sector >= 60 && sector <= 71) {
                return "West"
            } else if ((sector >= 72 && sector <= 73) || (sector >= 75 && sector <= 78)) {
                return "North"
            }
            return "Others"
        },

        //for map related stuff
        getLocationAndDistance(companyObj) {
            let addr = companyObj.companyName
            let locationPlaceholder = {
                locationNeighborhood: '',
                country: '',
                distance: '',
                postalCode: '',
                region: "Others"
            }
            if (typeof apiKey !== 'undefined') {
                let geoUrl = encodeURI(
                    'https://maps.googleapis.com/maps/api/geocode/json?address=' +
                    addr + " HQ Singapore" +
                    '&key=' +
                    apiKey);
                axios.get(geoUrl)
                    .then(response => {
                        for (obj of response.data.results[0].address_components) {
                            if (obj.types[0] == 'neighborhood') {
                                locationPlaceholder.locationNeighborhood = obj.short_name
                            }
                            if (obj.types[0] == 'country') {
                                locationPlaceholder.country = obj.short_name
                            }
                            if (obj.types[0] == 'postal_code') {
                                locationPlaceholder.postalCode = obj.short_name
                            }
                        }
                        if (locationPlaceholder.country != 'SG') {
                            locationPlaceholder.locationNeighborhood = ''
                            locationPlaceholder.postalCode = ''
                        } else {
                            lat = response.data.results[0].geometry.location.lat;
                            lng = response.data.results[0].geometry.location.lng;
                            locationPlaceholder.distance = this.getDistance(lng, lat, this.userLng, this.userLat)
                            locationPlaceholder.region = this.getRegion(locationPlaceholder.postalCode)
                        }
                        companyObj.location = locationPlaceholder
                        this.allCompanies.push(companyObj)
                        this.displayCompanies.push(companyObj)
                        this.sortCompaniesMethod();
                    })
                    .catch(error => {
                        this.errorMessage = error.message;
                    });
            } else {
                companyObj.location = locationPlaceholder
                this.allCompanies.push(companyObj)
                this.displayCompanies.push(companyObj)
            }
        },
        getDistance(lng1, lat1, lng2, lat2) {
            // distance approximate source
            // https://www.thoughtco.com/degree-of-latitude-and-longitude-distance-4070616
            // distance at equator: 
            // Latitude: 1 deg = 110.567 km
            // Longitude: 1 deg = 111.321 km
            if (lng1.length != 0 && lat1.length != 0 && lng2.length != 0 && lat2.length != 0) {
                latDiff = Math.abs(lat1 - lat2)
                lngDiff = Math.abs(lng1 - lng2)
                horizontalDist = latDiff * 110.567
                verticalDist = lngDiff * 111.321
                straightLineDist = Math.sqrt(horizontalDist ** 2 + verticalDist ** 2)
                return parseFloat(straightLineDist.toFixed(2))
            } else {
                return ''
            }
        },
        getUserLocation() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition((position) => {
                    this.userLng = position.coords.longitude
                    this.userLat = position.coords.latitude
                });
            }
        },

        filterMethod() {
            if (this.allCompanies.length > 0) {
                // console.log("filter");
                this.displayCompanies = [];
                for (index in this.allCompanies) { // default all true
                    company = this.allCompanies[index];
                    if (this.filterIndustry.includes(company.companyInfo.industry)) {
                        this.displayCompanies.push(company);
                    };
                }

                let tmpArr = [];
                for (index in this.displayCompanies) { // default all true
                    company = this.displayCompanies[index];
                    if (company.location.region == 'All' || this.filterLocation.includes(company.location.region)) { // make get region
                        tmpArr.push(company);
                    };
                }
                this.displayCompanies = tmpArr;
                if(this.isClose) { // default false
                    let tmpArr = [];
                    for (index in this.displayCompanies) {
                        company = this.displayCompanies[index];
                        if (company.location.distance == '' || company.location.distance < 10) {
                            tmpArr.push(company);
                        };
                    }
                    this.displayCompanies = tmpArr;
                }
                this.sortCompaniesMethod()
            }
        }

    },
    created() {
        //deep copy
        this.getSearchQuery()
        this.getUserLocation()
        if (this.searchQuery == null) {
            this.getAllCompanies();
        } else {
            this.getSearchedCompanies();
        }
        this.filterIndustry = JSON.parse(JSON.stringify(this.filterIndustryValues))
        this.filterLocation = JSON.parse(JSON.stringify(this.filterLocationValues))
    },
    computed: {
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

    }
})

appSearch.component('company-row', {
    data() {
        return {
            myMaxHeight: null,
            myRotate: 'myRotateOff preventSelect',
            maxScrollHeight: '', //to be done
            isSelected: false,
            companyPage: encodeURI("./company.php?cid=" + this.company.companyID + "&cname=" + this.company.companyName),
            writeReviewPage: encodeURI("./WriteAReview.php?cid=" + this.company.companyID + "&cname=" + this.company.companyName),
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
                this.myRotate = 'myRotateOff preventSelect';
            } else {
                // myMaxHeight = collapsibleContentSearch.scrollHeight + "px"; proably need do dom outside to get the scrollHeight
                this.myMaxHeight = "80px";
                this.myRotate = 'myRotate preventSelect';
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
        // showAll() {
        //     console.log("clicked")
        //     if (this.isSelected == false){
        //         changeState()
        //     }
        // }
    },

    created() {
        // this.getLocationAndDistance()
        // console.log(this.company)
    },


    template: `
<div class="row">
    <div class="collapsibleSearch shadow" @click='select' @select='changeState'>
        <a :href="companyPage">
            <img :src="company.companyInfo.imageLink" style="height: 100px; width: 100px; float: left; border-radius: 10px" class='preventSelect'>
        </a>
        <div class="container-fluid">
            <div class="row justify-content-between">
                <div class="col searchRowTitle">
                    {{company.companyName}}
                </div>
                <div class="col-auto align-items-end">
                    {{company.companyRatings.overallRating}}
                    <img src="../IMG/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'>
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-xl-3 col-lg-4">
                    {{company.location.locationNeighborhood}}
                </div>
                <div v-if="company.location.distance != ''" class="col">
                    <img src="../IMG/mapMarkIcon_black.svg" style="height: 20px; width: 20px;" class='preventSelect'>
                    {{company.location.distance}} km away from you
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-xl-3 col-lg-4">
                    <a :href="writeReviewPage">
                    <img src="../IMG/pen_write_review.svg" style="height: 20px; width: 20px;" class='preventSelect'>
                        Write a Review
                    </a>
                </div>
                <div class="col">
                    <a :href="companyPage">
                    <img src="../IMG/eyeSeeCompanyReview.svg" style="height: 20px; width: 20px;" class='preventSelect'>
                        View Company Profile
                    </a>
                </div>
            </div>
            <div class="row justify-content-end">
                <div class="col">
                    <img src="../IMG/arrow_down.svg" style="height: 30px; width: 30px;float: right;" :class="myRotate">
                </div>
            </div>
        </div>
    </div>
    <div class="collapsibleContentSearch" :style="{'max-height':myMaxHeight}" :scrollHeight='maxScrollHeight'>
        <div>
            <div class="row">
                <div class="col-xxl-2 col-xl-3 col-2 align-self-center">
                    <img src="../IMG/click.svg" style="width: 25px; height: 25px; padding: 1px;" class='preventSelect'>
                    {{company.companyRatings.numberOfClicks}}
                    <div class="d-none d-xl-inline">
                        clicks 
                    </div><br>
                    
                    <img src="../img/review.svg" style="width: 25px; height: 25px; padding: 1px;" class='preventSelect'>
                    {{company.companyRatings.totalNumReviews}}
                    <div class="d-none d-xl-inline">
                        reviews
                    </div>
                </div>
                <div class="col">
                    <img src="../img/pay_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;" class='preventSelect'>
                    <div class="d-none d-xxl-inline">
                        Good Pay:
                    </div>
                    {{company.companyRatings.averageCriteria1}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'><br>

                    <img src="../img/skills_companyReview.svg" style="width: 40px; height: 40px; padding: 0px;" class='preventSelect'>
                    <div class="d-none d-xxl-inline">
                        New Skills:
                    </div>
                    {{company.companyRatings.averageCriteria2}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'>
                </div>
                <div class="col">
                    <img src="../img/companyculture_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;" class='preventSelect'>
                    <div class="d-none d-xxl-inline">
                        Friendly:
                    </div>
                    {{company.companyRatings.averageCriteria3}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'><br>

                    <img src="../img/food_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;" class='preventSelect'>
                    <div class="d-none d-xxl-inline">
                        Food Price:
                    </div>
                    {{company.companyRatings.averageCriteria4}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'>
                </div>
                <div class="col">
                    <img src="../img/mentorship_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;" class='preventSelect'>
                    <div class="d-none d-xxl-inline">
                        Mentorship:
                    </div>
                    {{company.companyRatings.averageCriteria5}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'><br>

                    <img src="../img/flathierarchy_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;" class='preventSelect'>
                    <div class="d-none d-xxl-inline">
                        Flat Hierarchy:
                    </div>
                    {{company.companyRatings.averageCriteria6}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px; margin-bottom: 5px;" class='preventSelect'><br>
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
        }
    },
    template:
        `<div class="container-fluid">
        <company-row 
        v-for="company in companylist" 
        :company="company" 
        @select="selectCompany"
        :selectedCompanyID="selectedCompanyID"
        ></company-row>
        </div>`
});


const vmSearch = appSearch.mount('#appSearch');