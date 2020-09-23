<template>
    
    <div class="row">
    
        <div class="col-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="name">Nombre:</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Abraham" v-model="dataUser.name" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="surname">Apellido:</label>
                <input type="text" class="form-control" name="surname" id="surname" placeholder="Rivas" v-model="dataUser.surname" required>
            </div>
        </div>
        <div class="col-2">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="nacionalidad">Nacionalidad:</label>
                <select class="custom-select input-select-form mt-2" name="nacionalidad" id="nacionalidad" v-model="dataUser.nacionalidad">
                    <option class="option-select" value="V" selected>V</option>
                    <option class="option-select" value="E">E</option>
                </select>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group bmd-form-group text-center">
                <label class="bmd-label-floating" for="cedula">Cédula:</label>
                <input type="number" class="form-control" name="cedula" id="cedula" placeholder="123456789" v-model="dataUser.cedula" required>
            </div>
        </div>
        <div class="col-5">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="date_birth">Fecha de nacimiento:</label>
                <input type="date" class="form-control" name="date_birth" id="date_birth" v-model="dataUser.date_birth" required>
            </div>
        </div>
            <div class="col-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="phone">Teléfono:</label>
                <input type="text" class="form-control" name="phone" id="phone" placeholder="04161234567" v-model="dataUser.phone" required>
            </div>
        </div>
        <div class="col-6">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="nation">Estado:</label>
                <select class="custom-select input-select-form mt-2" name="nation" id="nation" v-model="dataUser.nation">
                    <option class="option-select" v-for="city in cities" :key="city.id" v-text="city.name"></option>
                </select>
            </div>
        </div>
        <div class="col-12">
            <div class="form-group bmd-form-group">
                <label class="bmd-label-floating" for="address">Dirección:</label>
                <input type="text" class="form-control" name="address" id="address" placeholder="Dirección" v-model="dataUser.address" required>
            </div>
        </div>

    </div>

</template>            
 <script>
    export default {
        props:['dataUser','cities'],
        data(){
            return {
            }
        },    
        mounted() {
            console.log('ready');
        }
    }
 </script>