<template>

   <div class="col-md-6">
      <div class="card card-new registro">
          
          <div class="card-header text-center">Registro de Pagos</div>

          <div class="card-body">

            <form action="" v-on:submit.prevent="addPayment()" method="POST">
          
                  <div class="row">
                  
                    <div class="col-sm-12">
                      <div class="form-group bmd-form-group">
                        <label class="bmd-label-floating">Nombre:</label>
                        <input type="text" class="form-control" name="name" v-model="name" required>
                      </div>
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
          }
        },
            
        methods: {
          addPayment() {
            const params = {
              name: this.name,
            };

            this.name = '';

            axios.post('/admin/payments', params)
                .then((response) => {
                const payment = response.data;
                this.$emit('new', payment);
            });
          }
        },

        mounted() {
            console.log('@abraham.r.j')
        }
    }
</script>
