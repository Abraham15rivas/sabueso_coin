<template>

    <div class="container-fluid mtop">
        <div class="row justify-content-center">

            <payment-form-component
                @new="addPayment">
            </payment-form-component>

            <div class="col-md-6">
                <div class="card card-new registro">
                    <div class="card-header text-center">Todas los pagos registradas</div>
                    <div class="card-body" v-if="payments != ''">

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col" class="text-center">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                
                                    <payment-list-component 
                                        v-for="(payment, index) in payments" 
                                        :key="index"
                                        :index="index"
                                        :payment="payment"
                                        @delete="deletePayment(index, ...arguments)"
                                        @update="updatePayment(index)">
                                    </payment-list-component>
                                
                                </tbody>
                            </table>
                        </div> 

                    </div>
                    <div class="card-body text-center" v-else>
                        <span>No hay registros</span>
                    </div>

                </div>
            </div>

        </div>
    </div>

</template>

<script>
    export default {
        data(){
            return {
                payments: [],
            }
        },

        methods: {
            addPayment(payment) {
                this.payments.push(payment);
            },

            deletePayment(index) {
                this.payments.splice(index, 1);
            },

            updatePayment(index, payment) {
                this.payments[index] = payment;
            },
            getPayments(){                
                axios.get('/admin/get-payments').then(response => {
                    this.payments = response.data;
                }).catch(e => {
                    console.log(e);
                });
            }
        },

        mounted() {
            this.getPayments();
        }
    }
</script>
