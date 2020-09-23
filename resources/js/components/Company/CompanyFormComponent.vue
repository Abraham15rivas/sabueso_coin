<template>

  <div class="col-md-12">
    <div class="card card-new registro">

      <div class="card-header text-center">Registro de Empresa</div>

      <div class="card-body">

        <form id="formCompany" v-on:submit.prevent="addCompany()" method="POST" enctype="multipart/form-data">

          <div class="form-group row justify-content-center">

            <div class="col-md-10 text-center" v-if="logo">
              <label class="col-form-label color">Vista Previa del Logo</label>
              <img class="rounded mx-auto d-block" width="5px" height="5px" :src="img" alt="logo">
            </div>

            <div class="col-md-12 mb-5 mt-5"></div>

            <div class="col-md-4">
              <label for="logo" class="col-form-label color">Logo</label>
              <input id="logo" name="logo" type="file" class="form-control input-company-form" @change="image" accept="image/*" required>
            </div>

            <div class="col-md-4">
              <label for="name" class="col-form-label color">Nombre Empresa</label>
              <input id="name" type="text" name="name" class="form-control input-company-form" placeholder="Ingrese el nombre" required autofocus>
            </div>

            <div class="col-md-4">
              <label for="description" class="col-form-label color">Descripción</label>
              <input id="description" name="description" type="text" class="form-control input-company-form" placeholder="Agregue una descripción" required>
            </div>

            <div class="col-md-2">
                <label for="phone" class="col-form-label color">Teléfono</label>
                <input id="phone" type="number" name="phone" class="form-control input-company-form" placeholder="Ingrese número telefónico" required>
            </div>

            <div class="col-md-4">
                <label for="web_page" class="col-form-label color">Página Web</label>
                <input id="web_page" type="url" name="web_page" class="form-control input-company-form" placeholder="Ingrese la página web" required>
            </div>

            <div class="col-md-3">
                <label for="facebook" class="col-form-label color">Facebook</label>
                <input id="facebook" type="text" name="facebook" class="form-control input-company-form" placeholder="Facebook (Opcional)" >
            </div>
            <div class="col-md-3">
                <label for="twitter" class="col-form-label color">Twitter</label>
                <input id="twitter" type="text" name="twitter" class="form-control input-company-form" placeholder="Twitter (Opcional)" >
            </div>
            <div class="col-md-3">
                <label for="instagram" class="col-form-label color">Instagram</label>
                <input id="instagram" type="text" name="instagram" class="form-control input-company-form" placeholder="Instagram (Opcional)">
            </div>

            <div class="col-md-3">
              <label for="nation" class="col-form-label color">Estado</label>
              <select class="custom-select input-select-form mt-2" name="nation" id="inputGroupSelect01">
                <option class="option-select" selected>Seleccionar</option>
                <option class="option-select" v-for="city in cities" :key="city.id" v-text="city.name"></option>
              </select>
            </div>

            <div class="col-md-3">
              <label for="municipality" class="col-form-label color">Municipio</label>
              <input id="municipality" type="text" class="form-control input-company-form" name="municipality" placeholder="Indique el Municipio" required>
            </div>

            <div class="col-md-3">
              <label for="parish" class="col-form-label color">Parroquía</label>
              <input id="parish" type="text" class="form-control input-company-form" name="parish" placeholder="Indique la Parroquia" required>
            </div>

            <div class="col-md-5">
              <label for="address" class="col-form-label color">Dirección</label>
              <input id="address" type="text" class="form-control input-company-form" name="address" placeholder="Indique la Dirección" required>
            </div>

            <div class="col-md-5">
              <div class="row">
                  <div class="col-9">
                    <label for="upn_coordinates" class="col-form-label color">Coordenadas UTM</label>
                    <input id="upn_coordinates" name="upn_coordinates" type="text" class="form-control input-company-form" v-model="utm" placeholder="Ingrese las coordenadas" required>
                  </div>

                  <div class="col-3 text-center new-abi">
                    <!-- Button trigger modal -->
                    <button type="button" id="map" class="btn btn-success buttom-form" data-toggle="modal" data-target="#ModalMap"><img class="icon-map-form" :src="'/img/icons/map.svg'" alt=""></button>
                  </div>
              </div>
            </div>

            <div class="col-2 text-center">
              <label for="glufco" class="col-form-label color">Punto Glufco:</label>
              <input type="checkbox" id="glufco" name="glufco" v-model="glufco">
            </div>
            
            <div class="col-md-5">
              <div class="row">
                <div class="col-12">
                  <label for="categories" class="col-form-label color">Categorias</label>
                </div>
                <div class="col-12">
                  <select name="categories[]" class="js-example-basic-multiple category" id="category_id" multiple="multiple" required>
                      <option v-for="(item, index) in categories" :key="index" :value="item.id" v-text="item.name"></option>
                  </select>
                </div>
              </div>
            </div>

            <div class="col-md-5">
              <div class="row">
                <div class="col-12">
                  <label for="payment_type" class="col-form-label color">Tipos de pagos</label>
                </div>
                <div class="col-12">
                  <select name="payments_type[]" class="js-example-basic-multiple pay" id="payment_type" @change="seleccionar" multiple="multiple" required>
                      <option v-for="(item, index) in payments" :key="index" :value="item.id" v-text="item.name"></option>
                  </select>
                </div>
                <div class="col-12" v-for="(item,index) of selectPayments" :key="index">
                  <label for="payment_address" class="col-form-label color">Dirección de Pago:{{item}}</label>
                  <input id="payment_address" :name="'payment_address'+index" type="text" class="form-control input-company-form">
                </div>
              </div>
            </div>

            <div class="col-md-2 text-center">
              <div class="row">
                <div class="col-12">
                  <label></label>
                </div>
                <div class="col-12">
                  <button type="submit" class="btn btn-primary buttom-form"><img class="icon-register-form" :src="'/img/icons/notas.svg'" alt=""></button>
                  <a href="/home" class="btn btn-danger buttom-form"><img class="icon-cancel-form" :src="'/img/icons/home-run.svg'" alt=""></a>
                </div>
              </div>
            </div>

          </div>

        </form>

        <!-- Modal -->
        <company-modal-component/>
        
      </div>
    </div>
  </div>

</template>

<script>
    export default {
        props:['payments','categories','cities'],
        data() {
          return {
            selectPayments: [],
            upn_coordinates: [],
            miniatureImage: '',
            logo: null,
            glufco:false,
          }
        },

        methods: {

          seleccionar(){
            var value = $("#payment_type").select('data');
            console.log(value);
          },

          image(e) {
            let file = e.target.files[0];
            this.logo = file;
            this.loadImage(file);
          },

          loadImage(file) {
            let reader = new FileReader();
            reader.onload = (e) => {
              this.miniatureImage = e.target.result;
            }
            reader.readAsDataURL(file);
          },
          addCompany() {
            let form = $('#formCompany')[0];
            let data = new FormData(form);
            data.append('glufco',this.glufco ? 'si' : 'no');

            axios.post('/admin/companies', data)
                .then((response) => {
                const company = response.data;
                this.$emit('new', company);
                form.reset();
                this.selectPayments = '';
                this.upn_coordinates = '';
                this.miniatureImage = '';
                this.logo = null;
                // Para vaciar los select of Select2
                $('#payment_type').val(null).trigger('change');
                $('#category_id').val(null).trigger('change');
            });
          },
        },

        computed: {
          img() {
            return this.miniatureImage;
          },
          utm() {
            return this.upn_coordinates;
          }
        },

        mounted() {
          // Payment Type
          let self = this;
          $("#payment_type").select2({
              placeholder: 'Seleccione un tipo de pago',
              tags: true,
              tokenSeparators: [',']
          }).on("select2:select", function (e) {
            if(self.selectPayments.indexOf(e.params.data.id) < 0){
              self.selectPayments.push(e.params.data.id);
            }
          }).on("select2:unselect", function (e) {
            if(self.selectPayments.indexOf(e.params.data.id) >= 0){
              self.selectPayments.splice(self.selectPayments.indexOf(e.params.data.id),1);
            }
          });
          // Select Category
          $("#category_id").select2({
              placeholder: 'Seleccione una categoria',
              tags: true,
              tokenSeparators: [',']
          });
          // chexbox
          $('#glufco').prop('indeterminate', true)

        }
    }
</script>
