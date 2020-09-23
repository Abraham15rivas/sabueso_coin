<template>

    <div class="container-fluid mtop">
        <div class="row justify-content-center">

            <category-form-component
                @new="addCategory">
            </category-form-component>

            <div class="col-md-6">
                <div class="card card-new registro">
                    <div class="card-header text-center">Todas las categorias registradas</div>
                    <div class="card-body" v-if="categories != ''">

                        <div class="table-responsive">
                            <table class="table table-sm">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Nombre</th>
                                        <th scope="col">Descripción</th>
                                        <th scope="col" class="text-center">Opción</th>
                                    </tr>
                                </thead>
                                <tbody>
                                                
                                    <category-list-component 
                                        v-for="(category, index) in categories" 
                                        :key="category.id"
                                        :index="index"
                                        :category="category"
                                        @delete="deleteCategory(index, ...arguments)"
                                        @update="updateCategory(index)">
                                    </category-list-component>
                                
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
                categories: [],
            }
        },

        methods: {
            addCategory(category) {
                this.categories.push(category);
            },

            deleteCategory(index) {
                this.categories.splice(index, 1);
            },

            updateCategory(index, category) {
                this.categories[index] = category;
            },
            getCategories(){                
                axios.get('/admin/get-categories').then(response => {
                    this.categories = response.data;
                }).catch(e => {
                    console.log(e);
                });
            }
        },

        mounted() {
            this.getCategories();
        }
    }
</script>
