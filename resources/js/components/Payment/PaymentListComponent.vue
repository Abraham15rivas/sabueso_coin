<template>

    <tr v-if="!editMode">
        <th scope="row" v-text="(index + 1)"></th>
        <td v-text="payment.name"></td>
        <td class="text-center">
            <button class="btn btn-primary buttom-edit" @click="onClickEdit()"><img class="icon-edit" :src="'/img/icons/lapiz.svg'" alt=""></button>
            <button class="btn btn-danger buttom-edit" @click="onClickDelete()"><img class="icon-delete" :src="'/img/icons/eliminar.svg'" alt=""></button>
        </td>
    </tr>
    <tr v-else>
        <th scope="row" v-text="(index + 1)"></th>
        <td>
            <input type="text" class="form-control" placeorder="Nombre" v-model="payment.name">
        </td>
        <td class="text-center">
            <button class="btn sabueso buttom-save" @click="onClickUpdate()"><img class="icon-save" :src="'/img/icons/guardar.svg'" alt=""></button>
            <button class="btn btn-danger  buttom-save" @click="onClickDelete()"><img class="icon-delete" :src="'/img/icons/eliminar.svg'" alt=""></button>
        </td>
    </tr>               

</template>

<script>
    export default {

        props: ['payment', 'index'],
        data(){
            return {
                editMode: false
            }
        },

        methods: {
            onClickDelete() {
                axios.delete(`/admin/payments/${this.payment.id}`).then(response => {
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
                    name: this.payment.name,
                };
                
                axios.put(`/admin/payments/${this.payment.id}`, params)
                .then(response => {                    
                    this.editMode = false;
                    const payment = response.data
                    this.$emit('update', payment);

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
