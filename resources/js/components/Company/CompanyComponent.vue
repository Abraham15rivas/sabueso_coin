<template>

    <div class="container-fluid mtop">
        <div class="row justify-content-center">

            <company-form-component 
                :payments="payments" 
                :categories="categories"
                :cities="cities"
                @new="addCompany">
            </company-form-component>

            <div class="col-md-12 mt-5">
                <div class="card card-new registro">
                    <div class="card-header text-center" style="">Todas las empresas registradas</div>
                    <div class="card-body" v-if="companies != ''">

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Logo</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col">Teléfono</th>
                                        <th scope="col">Dirección</th>
                                        <th scope="col">Página Web</th>
                                        <th scope="col" class="text-center">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <company-list-component
                                        v-for="(company, index) in companies"
                                        :key="company.id"
                                        :index="index"
                                        :company="company"
                                        @delete="deleteCompany(index, ...arguments)"
                                        @update="updateCompany(index)">
                                    </company-list-component>

                                </tbody>
                            </table>
                        </div>

                    </div>
                    <div class="card-body text-center" v-else>
                        <span>No hay registros</span>
                    </div>

                </div>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                companies: [],
                categories:[],
                payments:[],
                cities: []
            }
        },

        methods: {
            addCompany(company) {
                this.companies.push(company);
            },

            deleteCompany(index) {
                this.companies.splice(index, 1);
            },

            updateCompany(index, company) {
                this.companies[index] = company;
            },
            getCompanies(){
                axios.get('/admin/get-companies').then(response => {
                    this.companies = response.data;
                }).catch(e => {
                    console.log(e);
                });
            },
            getCategories(){
                axios.get('/admin/get-categories').then(response => {
                    this.categories = response.data;
                }).catch(e => {
                    console.log(e);
                });
            },
            getPayments(){
                axios.get('/admin/get-payments').then(response => {
                    this.payments = response.data;
                }).catch(e => {
                    console.log(e);
                });
            },
            getCity () {
                axios.get('/country/cities').then(response => {
                    this.cities = response.data;
                });
            },
        },

        mounted() {
            this.getCompanies();
            this.getCategories();
            this.getPayments();
            this.getCity();
        }
    }
</script>