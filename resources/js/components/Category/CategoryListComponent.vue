<template>

    <tr v-if="!editMode">
        <th scope="row" v-text="(index + 1)"></th>
        <td v-text="category.name"></td>
        <td v-text="category.description"></td>
        <td class="text-center">
            <button class="btn btn-primary buttom-edit" @click="onClickEdit()"><img class="icon-edit" :src="'/img/icons/lapiz.svg'" alt=""></button>
            <button class="btn btn-danger buttom-edit" @click="onClickDelete()"><img class="icon-delete" :src="'/img/icons/eliminar.svg'" alt=""></button>
        </td>
    </tr>
    <tr v-else>
        <th scope="row" v-text="(index + 1)"></th>
        <td>
            <input type="text" class="form-control" placeorder="Nombre" v-model="category.name">
        </td>
        <td>
            <input type="text" class="form-control" placeorder="Descripción" v-model="category.description">
        </td>
        <td class="text-center">
            <button class="btn sabueso buttom-save" @click="onClickUpdate()"><img class="icon-save" :src="'/img/icons/guardar.svg'" alt=""></button>
            <button class="btn btn-danger  buttom-save" @click="onClickDelete()"><img class="icon-delete" :src="'/img/icons/eliminar.svg'" alt=""></button>
        </td>
    </tr>               

</template>

<script>
    export default {

        props: ['category','index'],
        data(){
            return {
                editMode: false
            }
        },

        methods: {
            onClickDelete() {
                axios.delete(`/admin/categories/${this.category.id}`).then(response => {
                    
                    this.$emit('delete');
                }).catch(e => {
                    console.log(e);
                });
            },

            onClickEdit() {
                this.editMode = true;
            },

            onClickUpdate() {
                const params = {
                    name: this.category.name,
                    description: this.category.description
                };
                
                axios.put(`/admin/categories/${this.category.id}`, params).then(response => {
                    
                    this.editMode = false;
                    const category = response.data
                    this.$emit('update', category);

                }).catch(e => {
                    console.log(e);
                });
            }
        },

        mounted() {
        }
    }
</script>
