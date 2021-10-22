const appSearch = Vue.createApp({
    data() {
        return {
            allCompanies: null,
            errorMessage: null
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
        // homeCompanyCardsRelavantInfo(company) {
        //     if (company != null) {
        //         relevantInfo = {
        //             name: company.companyName,
        //             desc: company.companyInfo.companyDescription,
        //             reviewNum: company.companyRatings.totalNumReviews,
        //             overallRating: company.companyRatings.overallRating,
        //             imgUrl: company.companyInfo.imageLink
        //         };
        //         return relevantInfo;
        //     }
        // },
        searchCompanyRelavantInfo(company) {
            if (company != null) {
                relevantInfo = {
                    name: company.companyName,
                    id: company.companyID,
                    imgUrl: company.companyInfo.imageLink
                };
                return relevantInfo;
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
            isSelected: false
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
        companyPage() {
            // return encodeURI("./company.html?cid=" + this.company.companyID)
            return encodeURI("./company.html?cname=" + this.company.companyName)
        }

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
                <div class="col">
                    {{company.companyName}}
                </div>
                <div class="col-auto align-items-end">
                    {{company.companyRatings.overallRating}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;">
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-xl-2 col-lg-3 col-md-5">
                    company.location
                </div>
                <div class="col">
                    <img src="../img/mapMarkIcon_black.svg" style="height: 20px; width: 20px;">
                    company.distance
                </div>
            </div>
            <div class="row justify-content-start">
                <div class="col-xl-2 col-lg-3 col-md-5">
                    <img src="../img/pen_write_review.svg" style="height: 20px; width: 20px;">
                    <a href="#">
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
        <div class="container">
            <div class="row">
                <div class="col">
                    {{company.companyRatings.numberOfClicks}} clicks <br>
                    {{company.companyRatings.totalNumReviews}} reviews
                </div>
                <div class="col">
                    <img src="../img/pay_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    Good Pay:
                    {{company.companyRatings.averageCriteria1}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>

                    <img src="../img/skills_companyReview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    New Skills:
                    {{company.companyRatings.averageCriteria2}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;">
                </div>
                <div class="col">
                    <img src="../img/companyculture_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    Friendly:
                    {{company.companyRatings.averageCriteria3}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>

                    <img src="../img/food_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    Food Price:
                    {{company.companyRatings.averageCriteria4}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;">
                </div>
                <div class="col">
                    <img src="../img/mentorship_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    Mentorship:
                    {{company.companyRatings.averageCriteria5}}
                    <img src="../img/star.svg" style="height: 20px; width: 20px;"><br>

                    <img src="../img/flatheirachy_companyreview.svg" style="width: 40px; height: 40px; padding: 0px;">
                    Flat Hierarchy:
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