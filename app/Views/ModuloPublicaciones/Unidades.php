<!-- !prueba de pull sin push -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">

                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Lista Unidades</h3>
                        </div>
                        <div>

                            <a href="<?php echo base_url(); ?>/unidades/nuevo" class="btn btn-primary">Agregar</a>
                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <table id="" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Abreviatura</th>
                                        <th>Opcion</th>
                                        <th>Opcion</th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyunidades">

                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div><!-- /.col -->
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
</div>
<div class="modal fade " id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Datos Usuarios</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    <label for="exampleInputEmail1">Documento</label>
                    <input type="email" class="form-control" id="documento_edit" name="documento_edit" disabled="">
                </div>
                <div class="form-group">
                    <label>Estado</label>
                    <select class="form-control" name="estado_edit">
                        <option value="Activo">Activo</option>
                        <option value="Inactivo">Inactivo</option>
                        <option value="Pendiente">Pendiente</option>
                    </select>
                </div>
            </div>
            <div class="modal-footer justify-content-between">
                <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<script>
    $(document).ready(iniciar);

    function iniciar() {
        listarunidades();

    }

    function listarunidades() {
        $.ajax({
            url: '<?php echo base_url('/ModuloPublicaciones/MostrarUnidades'); ?>',
            type: 'POST',
            dataType: "json",
            success: function(data) {

                var listarunidades = "";

                for (var i = 0; i < data.length; i++) {

                    listarunidades += '<tr>' +
                        '<td>' + data[i].id + '</td>' +
                        '<td>' + data[i].nombre + '<input type="hidden" value="' + data[i].id + '"class="id"> </td>' +
                        '<td>' + data[i].abreviatura + '</td>' +


                }
                $("#tbodyunidades").html(listarunidades);
            }
        });

    }
</script>