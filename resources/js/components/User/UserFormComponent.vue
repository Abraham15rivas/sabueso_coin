<template>

   <div class="col-md-6">
      <div class="card card-new registro">
          
          <div class="card-header text-center">Registro de perfil</div>

          <div class="card-body">
            <form id="form_profile" action="" v-on:submit.prevent="addData()" method="POST">
          
                <div class="row">
                
                    <div class="col-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="name">Nombre:</label>
                            <input type="text" class="form-control" name="name" id="name" placeholder="Abraham" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="surname">Apellido:</label>
                            <input type="text" class="form-control" name="surname" id="surname" placeholder="Rivas" required>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="nacionalidad">Nacionalidad:</label>
                            <select class="custom-select input-select-form mt-2" name="nacionalidad" id="nacionalidad">
                                <option class="option-select" value="V" selected>V</option>
                                <option class="option-select" value="E">E</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group bmd-form-group text-center">
                            <label class="bmd-label-floating" for="cedula">Cédula:</label>
                            <input type="number" class="form-control" name="cedula" id="cedula" placeholder="123456789" required>
                        </div>
                    </div>
                    <div class="col-5">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="date_birth">Fecha de nacimiento:</label>
                            <input type="date" class="form-control" name="date_birth" id="date_birth" required>
                        </div>
                    </div>
                        <div class="col-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="phone">Teléfono:</label>
                            <input type="text" class="form-control" name="phone" id="phone" placeholder="04161234567" required>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="nation">Estado:</label>
                            <select class="custom-select input-select-form mt-2" name="nation" id="nation">
                                <option class="option-select" selected>Seleccionar</option>
                                <option class="option-select" v-for="city in cities" :key="city.id" v-text="city.name"></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="form-group bmd-form-group">
                            <label class="bmd-label-floating" for="address">Dirección:</label>
                            <input type="text" class="form-control" name="address" id="address" placeholder="Dirección" required>
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
        props: ['cities'],
        data() {
          return {
          }
        },
            
        methods: {
          addData() {
            let form = $('#form_profile')[0];
            let data = new FormData(form);

            axios.post('/profiles', data)
                .then((response) => {
                const profile = response.data;
                this.$emit('new', profile);
                form.reset();
            });
          },
            
        },

        mounted() {
            
            if ("geolocation" in navigator) {
                console.log('la geolocalización está disponible')
            } else {
                console.log('la geolocalización NO está disponible')
            }
            console.log('@abraham.r.j')
        }
    }
</script>
