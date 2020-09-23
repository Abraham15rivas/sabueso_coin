<template>
    <div class="row mtop">

        <div class="col-6 p-0">
            <div class="card-detalles">

                 <div class="col-md-12">
                     <div class="card card-new registro">
                        <div class="card-header text-center">Datos</div>
                        <div class="card-body">

                            <div class="col-md-12 text-center">
                                <img class="img-detalles" :src="company.logo" alt="logo">
                            </div>

                            <div class="card-body-detalles">
                                <h5 class="card-title-detalles" v-text="company.name"></h5>
                                <p class="card-text" v-text="company.description"></p>
                                <p class="card-text" v-text="company.phone"></p>
                                <p class="card-text" v-text="company.crypto_type"></p>

                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-md-12 p-2">
                    <div class="card card-new registro">
                        <div class="card-header text-center">Calificaciones</div>

                        <div class="card-body" v-if="ratings != ''">
                            <span v-for="(rating,index) in ratings" :key="rating.id">
                                <p><strong>{{rating.user.username}}</strong>: {{ rating.comments }}</p>
                                <star-rating read-only :max-rating="5" v-model="ratings[index].start"  rounded-corners inactive-color="#dcdcdc" :glow="0" active-color="#fab802" :show-rating="false" :star-size="25"></star-rating>
                                <br>
                            </span>
                        </div>

                        <div class="card-body" v-if="comentar">
                            <form action="" v-on:submit.prevent="rating()" method="POST">
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="form-group bmd-form-group">
                                            <label class="bmd-label-floating">Calificación</label>
                                            <star-rating :max-rating="5" v-model="start" rounded-corners inactive-color="#dcdcdc" :glow="0" active-color="#fab802" :show-rating="false" :star-size="40"></star-rating>
                                        </div>
                                    </div>

                                    <div class="col-sm-12">
                                        <textarea class="form-control" rows="3" placeholder="Comentario (50 caracteres máximos)" name="comments" v-model="comments" required></textarea>
                                    </div>
                                </div>

                                <div class="text-center mt-2">
                                    <a href="/" class="btn btn-success text-white">Volver</a>
                                    <button type="submit" class="btn sabueso">Votar</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-6 p-0">
            <map-show-component :company="company"/>
        </div>

    </div>
</template>
<script>

import StarRating from 'vue-star-rating'

    export default {
        props: ['company','check_user'],
        data(){
            return {
                ratings: [],
                comentar:false,
                comments: '',
                start: 1
            }
        },
        components: {
            StarRating
        },
        methods: {
            iniciarMap(){
                
            },
            rating() {
                const params = {
                    comments: this.comments,
                    start: this.start,
                    company_id: this.company.id
                }

                axios.post('/home/rating', params)
                        .then((response) => {
                    this.ratings = response.data;
                    this.comentar = false;
                });
                this.comments = '';
                this.start = 1;
            },
            loadRatings(){
                if (this.check_user === true)
                    axios.get(`/home/load/ratings/${this.company.id}`)
                            .then((response) => {
                        this.ratings = response.data;
                    });
            },
            searchRatings() {
                if (this.check_user === true)
                    axios.get(`/home/search/ratings/${this.company.id}`)
                            .then((response) => {
                        this.comentar = response.data.length > 0 ? false : true;
                    });
            }
        },

        mounted() {
            this.loadRatings();
            this.searchRatings();
        }
    }
</script>