<template>
   
    <tr v-if="!editMode">
        <th scope="row" v-text="(index + 1)"></th>
        <td><img class="img-table" :src="company.logo" alt="logo" width="30px" height="30px"></td>
        <td v-text="company.name"></td>
        <td v-text="company.description"></td>
        <td v-text="company.phone"></td>
        <td v-text="company.address"></td>
        <td v-text="company.web_page"></td>
        <td class="text-center">
            <button class="btn btn-primary buttom-edit" @click="onClickEdit()"><img class="icon-edit" :src="'/img/icons/lapiz.svg'" alt=""></button>
            <button class="btn btn-danger buttom-edit" @click="onClickDelete()"><img class="icon-delete" :src="'/img/icons/eliminar.svg'" alt=""></button>
        </td>
    </tr>
    <tr v-else>
        <th scope="row" v-text="(index + 1)"></th>        
        <td>
            <input type="text" class="form-control" placeorder="Descripción" v-model="company.logo" disabled>
        </td>
        <td>
            <input type="text" class="form-control" placeorder="Nombre" v-model="company.name">
        </td>
        <td>
            <input type="text" class="form-control" placeorder="Descripción" v-model="company.description">
        </td>
        <td>
            <input type="text" class="form-control" placeorder="Nombre" v-model="company.phone">
        </td>
        <td>
            <input type="text" class="form-control" placeorder="address" v-model="company.address">
        </td>
        <td>
            <input type="text" class="form-control" placeorder="web_page" v-model="company.web_page">
        </td>
        <td class="text-center">
            <button class="btn sabueso buttom-save" @click="onClickUpdate()"><img class="icon-save" :src="'/img/icons/guardar.svg'" alt=""></button>
            <button class="btn btn-danger  buttom-save" @click="onClickDelete()"><img class="icon-delete" :src="'/img/icons/eliminar.svg'" alt=""></button>
        </td>
    </tr>
          
</template>
<script>
    export default {

        props: ['company','index'],
        data(){
            return {
                editMode: false
            }
        },

        methods: {
            onClickDelete() {
                axios.delete(`/admin/companies/${this.company.id}`).then(response => {                    
                    this.$emit('delete');
                    console.log(response);
                }).catch(e => {
                    console.log(e);
                });
            },

            onClickEdit() {
                this.editMode = true;
            },

            onClickUpdate() {
                const params = {
                    name: this.company.name,
                    description: this.company.description,
                    logo: this.company.logo,
                    phone: this.company.phone,
                    web_page: this.company.web_page,
                    address: this.company.address
                };

                axios.put(`/admin/companies/${this.company.id}`, params).then(response => {
                    
                    this.editMode = false;
                    const company = response.data
                    this.$emit('update', company);

                    console.log(response);
                }).catch(e => {
                    console.log(e);
                });
            }
        },

        mounted() {
        }
    }
</script>