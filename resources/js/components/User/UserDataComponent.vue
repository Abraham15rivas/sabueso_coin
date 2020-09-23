<template>

    <div class="col-md-6">
        <div class="card card-new registro">
            <div class="card-header text-center">Mis datos</div>
            <div class="card-body">

                <div v-if="!editMode">
                    <p>Nombre y Apellido: {{ dataUser.name +' '+ dataUser.surname }}</p>
                    <p>Cédula: {{ dataUser.nacionalidad +' - '+ dataUser. cedula }}</p>
                    <p>Fecha de Nacimiento: {{ dataUser.date_birth }}</p>
                    <p>Teléfono: {{ dataUser.phone }}</p>
                    <p>Estado: {{ dataUser.nation }}</p>
                    <p>Dirección: {{ dataUser.address }}</p>
                    <div class="col-12 text-center">
                        <button class="btn btn-primary buttom-edit" @click="onClickEdit()"><img class="icon-edit" :src="'/img/icons/lapiz.svg'" alt=""></button>
                    </div>    
                </div>

                <div v-else>
                    
                    <user-field-component :dataUser="dataUser" :cities="cities"/>

                    <div class="col-12 text-center">
                        <button class="btn sabueso buttom-save" @click="onClickUpdate()"><img class="icon-save" :src="'/img/icons/guardar.svg'" alt=""></button>
                    </div>
                </div>

            </div>
        </div>
    </div>               

</template>

<script>
    export default {
        props: ['dataUser','cities','user_id'],
        data(){
            return {
                editMode: false,
            }
        },

        methods: {
            onClickEdit() {
                this.editMode = true;
            },

            onClickUpdate() {
                const params = {
                    name: $('#name').val(),
                    surname: $('#surname').val(),
                    nacionalidad: $('#nacionaildad').val(),
                    cedula: $('#cedula').val(),
                    date_birth: $('#date_birth').val(),
                    phone: $('#phone').val(),
                    nation: $('#nation').val(),
                    address: $('#address').val(),
                    user_id: this.user_id
                }
                
                axios.put(`/profiles/${this.dataUser.id}`, params)
                .then(response => {                    
                    this.editMode = false;
                    this.$emit('update');

                }).catch(e => {
                    console.log(e);
                });
            }
        },

        mounted() {
            console.log('@abraham.r.j');
        }
    }
</script>
