<template>

  <div class="col-md-6">
    <div class="card mb-3 card-new" style="max-width: 540px;">
      <div class="row no-gutters">
        <div class="col-md-4">
          <img :src="company.logo" class="card-img img-card" width="50px" height="50px" alt="logo">
        </div>
        <div class="col-md-8">
          <div class="card-body">
            <h5 class="card-title" v-text="company.name"></h5>
            <p class="card-text p-card" v-text="company.description"></p>
            <p class="card-text p-card"><small class="" v-text="company.crypto_type"></small></p>
          </div>
        </div>
        <div class="col-md-12 ml-5 text-center">
          <star-rating read-only :max-rating="5" rounded-corners inactive-color="#dcdcdc" :glow="0" active-color="#fab802" :show-rating="false" v-model="company.calif" :star-size="50"></star-rating>
        </div>
        <div class="col-md-12 text-center">
          <a href="#" class="btn sabueso text-white" id="mapCompany" @click="showCompany()">Ver Detalles</a>
        </div>
      </div>
    </div>
  </div>

</template>
<script>
import StarRating from 'vue-star-rating'
    export default {
        props: ['company'],
        data(){
          return {
          }
        },
        
        components: {
            StarRating
        },

        methods: {
          showCompany() {
            this.$emit('show', this.company);
          }
        },

        mounted() {
        }
    }
</script>
