<template>
    <div>
        <div v-if="show">
            <search-component
                @search="searchCompany"
                :cities="cities">
            </search-component>

            <h1 v-if="companies != ''" class="title-result text-center">Resultados de la búsqueda</h1>

            <div class="container">
                <div class="row">
                    <result-component
                        v-for="company in companies"
                        :key="company.id"
                        :company="company"
                        @show="showCompany">
                    </result-component>
                </div>
            </div>
        </div>
        <div v-else>
            <company-show-component
                :company="company"
                :check_user="check_user">
            </company-show-component>
        </div>
    </div>

</template>

<script>
    export default {
        props: ['check_user'],
        data(){
            return {
                companies: [],
                company: [],
                cities: [],
                show: true
            }
        },
        methods: {
            getCity () {
                axios.get('/country/cities').then(response => {
                    this.cities = response.data;
                });
            },
            searchCompany(params) {
                axios.post('/companies/search', params).then(response => {
                    // console.log(this.ordenarDesc(response.data,'calif'))
                    //this.companies = this.ordenarDesc(response.data,'calif');
                    this.companies = response.data.sort( (a,b) => {
                        if (a.calif > b.calif) {
                            return -1;
                        }
                        if (a.calif < b.calif) {
                            return 1;
                        }
                        return 0;
                    });
                    
                }).catch(e => {
                    console.log(e);
                });
            },
            ordenarAsc(p_array_json, p_key) {
                p_array_json.sort(function (a, b) {
                    return a[p_key] > b[p_key];
                });
            },
            ordenarDesc(p_array_json, p_key) {
                this.ordenarAsc(p_array_json, p_key); 
                p_array_json.reverse(); 
            },
            showCompany(company) {
                this.show = false;
                this.company = company;
            }
        },

        mounted() {
            this.getCity();
        }
    }
</script>
