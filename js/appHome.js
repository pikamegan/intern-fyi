const app = Vue.createApp({
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
        myRandomInts(quantity, max) {
            const arr = [];
            while (arr.length < quantity) {
                var candidateInt = Math.floor(Math.random() * max);
                if (arr.indexOf(candidateInt) === -1) arr.push(candidateInt);
            }
            return arr;
        },
        homeCompanyCardsRelavantInfo(company) {
            if (company != null) {
                relevantInfo = {
                    name: company.companyName,
                    desc: company.companyInfo.companyDescription,
                    reviewNum: company.companyRatings.totalNumReviews,
                    overallRating: company.companyRatings.overallRating,
                    imgUrl: company.companyInfo.imageLink
                };
                return relevantInfo;
            }
        },
        // one() {
        //     if (this.allCompanies != null) {
        //         return this.homeCompanyCardsRelavantInfo(this.rand1company);
        //     }
        // },// i really cant figure out why one() and rand1company() gives error in console...
        // rand1company() { 
        //     if (this.allCompanies != null) {
        //         return this.rand4companies[0];
        //     }
        // }

    },
    created() {
        this.getAllCompanies();
    },
    computed: {
        companyNames() {
            if (this.allCompanies != null) {
                companyNames = [];
                for (index in this.allCompanies) {
                    companyName = this.allCompanies[index].companyName;
                    companyNames.push(companyName);
                }
                return companyNames;
            }
        },
        rand4companies() {
            if (this.allCompanies != null) {
                rand4companies = [];
                chosenCompanies = this.myRandomInts(4, this.allCompanies.length);
                for (companyId of chosenCompanies) {
                    rand4companies.push(this.allCompanies[companyId]);
                }
                return rand4companies;
            }
        }


    }
})

app.component('company-card', {
    props: ['companyinfo'],
    template:
        `<div class="col-xl-3 col-sm-6 my-3">
            <div class="card mx-auto border border-white rounded-3" style="width: 250px;">
            <div class = "text-center">
            <img class="card-img-top rounded-4 img-fluid" :src="companyinfo.imgUrl" alt="Card image cap" style="width: 100px;">
            </div>
                <div class="card-body">
                    <h5 class="card-title text-center">
                        {{ companyinfo.name }}
                    </h5>
                    <div class="card-text text-center">
                        {{ companyinfo.desc }}
                    </div>
                    <div class="card-text text-center">
                        {{ companyinfo.reviewNum }} Reviews
                    </div>
                    <div class="card-text text-center">
                        {{ companyinfo.overallRating }} Stars
                    </div>
                </div>
            </div>
        </div>`
})

const vm = app.mount('#appHome');