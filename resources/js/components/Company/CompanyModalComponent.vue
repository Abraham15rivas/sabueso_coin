<template>

    <div class="modal fade" id="ModalMap" tabindex="-1" role="dialog" aria-labelledby="ModalMapTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title text-dark" id="exampleModalLongTitle">Elige ubicación en el mapa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span class="text-dark" aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <div class="from-horizontal">

                        <div class="form-group row">
                            <div class="col-sm-3">
                                <label class="control-label ubi text-dark">Ubicación:</label>
                            </div>
                            <div class="col-sm-9">
                                <input type="text" class="form-control cl" id="ModalMapAddress">
                            </div>
                        </div>

                        <div id="ModalMapPreview" class="map-modal"></div>

                        <div class="clearfix"> &nbsp; </div>
                    </div>
                </div>
                
                <div class="modal-footer">
                    <div class="row">                    
                        <div class="form-group col-md-6">
                            <label for="modalMapLat" class="cl">Latitud:</label>
                            <input type="text" class="form-control" id="ModalMapLat">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="modalMapLong" class="cl">Longitud:</label>
                            <input type="text" class="form-control" id="ModalMapLng">
                        </div>
                        <div class="form-group col-md-12 text-center">
                            <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar</button>
                        </div>                
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
                
            }
        },

        mounted() {
            $('#ModalMap').on('shown.bs.modal', function () {
                $('#ModalMapAddress').trigger('focus')
            });

            console.log('Modal listo, (Abraham Rivas) @abraham.r.j')
        }
    }
</script>
