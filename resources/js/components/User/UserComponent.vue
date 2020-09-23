<template>

    <div class="container-fluid mtop">
        <div class="row justify-content-center">

            <user-data-component
                v-if="dataUser != ''"
                :dataUser="dataUser"
                :cities="cities"
                :user_id="user_id"
                @update="updateUser">
            </user-data-component>

            <user-form-component
                v-else-if="dataUser == ''"
                @new="addUser"
                :cities="cities">
            </user-form-component>

            <div class="col-md-6">
                <div class="card card-new registro">
                    <div class="card-header text-center">Comentarios</div>
                    <div class="card-body" v-if="coments != ''">                        

                        <coment-component
                            v-for="(coment, index) in coments" 
                            :key="index"
                            :coment="coment"
                            :index="index">
                        </coment-component>                           

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
        props: ['user_id'],
        data(){
            return {
                dataUser: [],
                cities: [],
                coments: []
            }
        },

        methods: {
            addUser(user) {
                this.dataUser = user;
            },
            updateUser() {
                this.getUser();
            },
            getUser() {
                axios.get(`/profiles/${this.user_id}`).then(response => {
                    this.dataUser = response.data;
                })
            },
            getCity() {
                axios.get('/country/cities').then(response => {
                    this.cities = response.data;
                });
            },
            async getComent() {
                try {
                    const response = await axios.get('/coments')
                    this.coments = response.data
                } catch (error) {
                    console.log(error)
                }
            }
        },
        created() {
            this.getUser();
            this.getCity();
            this.getComent()
        }
    }
</script>
