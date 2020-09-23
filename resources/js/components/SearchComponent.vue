<template>

  <div class="container-search mt-5">
    <div class="buscador">
      <h1><span>S</span>abueso<span>C</span>oin!</h1>
      <p>Busca en Sabueso!.</p>
      <form id="form" @keyup="searchCompany()" method="post">
        <input type="text" name="buscador" id="buscadorPrincipal" placeholder="Busca en Sabueso o escribe una URL" v-model="name">
          
          <select class="select-index" id="inputGroupSelect01">
            <option class="option-select" selected>Seleccionar...</option>
            <option class="" v-for="city in cities" :key="city.id" v-text="city.name"></option>
          </select>
          
      </form>
    </div>
  </div>

</template>
<script>
    export default {
        props: ['cities'],
        data() {
          return {
            'name': '',
          }
        },
            
        methods: {
          searchCompany() {

            const params = {
              name: this.name,
            };

            this.$emit('search', params);           
          }

        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
