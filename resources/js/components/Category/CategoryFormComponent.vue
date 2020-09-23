<template>

   <div class="col-md-6">
      <div class="card card-new registro">
          
          <div class="card-header text-center">Registro de Categorias</div>

          <div class="card-body">

            <form action="" v-on:submit.prevent="addCategory()" method="POST">
          
                  <div class="row">
                  
                    <div class="col-sm-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Nombre:</label>
                        <input type="text" class="form-control" name="name" v-model="name" required>
                      </div>
                    </div>
        
                    <div class="col-sm-12">
                      <textarea class="form-control" rows="5" placeholder="Descripción Corta (50 caracteres máximos)" name="description" v-model="description" required></textarea>
                    </div>
                  </div>
                  
                  <div class="text-center">
                    <button type="submit" class="btn sabueso buttom-form"><img class="icon-edit-form" :src="'/img/icons/notas.svg'" alt=""></button>
                    <a href="/home" class="btn btn-danger buttom-form"><img class="icon-cancel-form" :src="'/img/icons/home-run.svg'" alt=""></a>
                  </div>
                    
            </form>

        </div>

      </div>
    </div>

</template>

<script>
    export default {

         data() {
          return {
            'name': '',
            'description': ''
          }
        },
            
        methods: {
          addCategory() {

            const params = {
              name: this.name,
              description: this.description
            };
            
            this.name = '';
            this.description = '';

            axios.post('/admin/categories', params)
                .then((response) => {
                const category = response.data;
                this.$emit('new', category);
            });
          }
        },

        mounted() {
            console.log('Component mounted.')
        }
    }
</script>
