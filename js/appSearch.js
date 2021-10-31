//map functions start==========================
var userLat = -34.397;
var userLong = 150.644;
const apiKey = 'AIzaSyCzFIE4IcUd35I_HeFWhbmEFZpNnx4SogA';
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
            // console.log(error.message);
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
            searchQuery: null,
            allCompanies: null,
            displayCompanies: [],
            errorMessage: null,
            // currentImgSrc: "../img/AtoZ.svg",
            // currentFilterImg: "../img/filter.svg",
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
            filterLocationValues: {
                // "Nearest to you": 00,
                "CBD": 1000,
                "North": 2000,
                "East": 3000,
                "West": 4000
            },
            filterIndustry: [],
            filterIndustryValues: [
                "Internet",
                "Technology",
                "Electronics",
                "Banking",
                "Energy",
                "Others"
            ]
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
                    this.allCompanies = response.data;
                    this.displayCompanies = response.data;
                    console.log(this.displayCompanies);
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
                    this.allCompanies = response.data;
                    this.displayCompanies = response.data;
                    console.log(this.displayCompanies);
                    this.sortCompaniesMethod();
                })
                .catch(error => {
                    this.errorMessage = error.message;
                });
        },
        filterMethod() {
            if (this.allCompanies.length > 0) {
                // console.log("filter");
                this.displayCompanies = [];
                for (index in this.allCompanies) {
                    company = this.allCompanies[index];
                    if (this.filterIndustry.includes(company.companyInfo.industry)) {
                        this.displayCompanies.push(company);
                    };
                }
                this.sortCompaniesMethod()
            }
        }

    },
    created() {
        //deep copy
        this.getSearchQuery()
        if (this.searchQuery == null) {
            this.getAllCompanies();
        } else {
            this.getSearchedCompanies();
        }
        this.filterIndustry = JSON.parse(JSON.stringify(this.filterIndustryValues))
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
            maxScrollHeight: '', //to be done
            isSelected: false,
            companyPage: encodeURI("./company.html?cid=" + this.company.companyID + "&cname=" + this.company.companyName),
            writeReviewPage: encodeURI("./WriteAReview.html?cid=" + this.company.companyID + "&cname=" + this.company.companyName),

            //for map related stuff
            locationNeighborhood: '',
            country: '',
            userLng: '',
            userLat: '',
            distance: '',
            postalCode: ''

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
        // showAll() {
        //     console.log("clicked")
        //     if (this.isSelected == false){
        //         changeState()
        //     }
        // }

        //for map related stuff
        getLocationAndDistance() {
            let addr = this.company.companyName
            if (addr != null && addr.length > 0) {
                let geoUrl = encodeURI(
                    'https://maps.googleapis.com/maps/api/geocode/json?address=' +
                    addr + "HQ Singapore" +
                    '&key=' +
                    apiKey);
                axios.get(geoUrl)
                    .then(response => {
                        for (obj of response.data.results[0].address_components) {
                            if (obj.types[0] == 'neighborhood') {
                                this.locationNeighborhood = obj.short_name
                            }
                            if (obj.types[0] == 'country') {
                                this.country = obj.short_name
                            }
                            if (obj.types[0] == 'postal_code') {
                                this.postalCode = obj.short_name
                            }
                        }
                        if (this.country != 'SG') {
                            this.locationNeighborhood = ''
                            this.postalCode = ''
                        } else {
                            lat = response.data.results[0].geometry.location.lat;
                            lng = response.data.results[0].geometry.location.lng;
                            this.distance = this.getDistance(lng, lat, this.userLng, this.userLat)
                        }

                        // this.locationAddress = response.data.results[0].formatted_address;
                        // this.displayall = JSON.stringify(response.data)
                    })
                    .catch(error => {
                        // process error object
                        // console.log('faied');
                    });
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
                return String(parseFloat(straightLineDist.toFixed(2))) + ' km'
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
        }
    },

    created() {
        this.getUserLocation()
        this.getLocationAndDistance()
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
                    {{locationNeighborhood}}
                </div>
                <div class="col">
                    <img v-if="distance.length > 0" src="../img/mapMarkIcon_black.svg" style="height: 20px; width: 20px;">
                    {{distance}}
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