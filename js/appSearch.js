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

appSearch.component('company-row', {
    props: ['companyinfo'],
    template:
        `<div class="row py-3 shadow">
            <div class="col">
                <img :src="companyinfo.imgUrl" style="height: 100px; width: 100px; float: left">
                <div>
                    {{ companyinfo.id }}
                </div>
                <div>
                    {{ companyinfo.name }}
                </div>
            </div>
        </div>`
})

const vmSearch = appSearch.mount('#appSearch');