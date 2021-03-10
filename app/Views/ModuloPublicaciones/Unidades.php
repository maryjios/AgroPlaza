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


                        </div>



                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="<?php echo base_url(); ?>/unidades/nuevo" class="btn btn-primary">Agregar</a>
                            <table id="example1" class="table table-bordered table-striped">
                                <thead>
                                    <tr>

                                        <th>Id</th>
                                        <th>Nombre</th>
                                        <th>Abreviatura</th>
                                        <th>Accionnes</th>
                                    </tr>
                                </thead>
                                <tbody id="unidades">

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
<div class="modal fade" id="editar_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Editar unidad</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="form-group col">
                        <input type="text" class="form-control form-control-border" id="id" placeholder="id">
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <input type="text" class="form-control form-control-border" id="nombre" placeholder="nombre" required>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col">
                        <input type="text" class="form-control form-control-border" id="abreviatura" placeholder="abreviatura" required>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                <button type="button" class="btn btn-primary cambios_modal">Actualizar</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal confirma-->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Eliminar Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>¿Desea Eliminar el registro?</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                <a class="btn btn-primary btn-ok">Si</a>
            </div>
        </div>
    </div>
</div>

<script>
    /*$(document).ready(function() {
      $("#").DataTable({
        "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"},
        "dom": 'Bfrtip',
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy","print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });

      listarPublicaciones();
    });
*/
    $(document).ready(iniciar);

    function iniciar() {
        listarUnidades();
    }

    function listarUnidades() {

        $.ajax({
            url: '<?php echo base_url('/ModuloPublicaciones/ConsultarUnidades'); ?>',
            type: 'POST',
            dataType: 'json',
            success: function(data) {

                let listarUnidades = "";
                for (var i = 0; i < data.length; i++) {

                    listarUnidades +=
                        '<tr>' +
                        '<td class="id">' + data[i].id + '</td>' +
                        '<td >' + data[i].nombre + '</td>' +
                        '<td >' + data[i].abreviatura + '</td>' +
                        '<td><button  type="button" class="btn btn-success mr-2 mod_edit"><i class="far fa-eye"></i></button><a class="btn btn-danger toastrDefaultSuccess"><i class="far fa-trash-alt"></i></a></td>' +
                        '</tr>';

                }

                $('#unidades').html(listarUnidades);

                $('.mod_edit').click(consultarUnidades);
                $('.eliminar').click(eliminarUnidades);



            }
        });

    }

    function consultarUnidades() {

        var id = $(this).parents("tr").find(".id").text();


        $('#editar_modal').modal();

        $.ajax({
                url: '<?php echo base_url('/ModuloPublicaciones/ConsultarUno'); ?>',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
            })
            .done(function(data) {

                for (var i = 0; i < data.length; i++) {
                    $('#id').val(data[i].id);
                    $('#nombre').val(data[i].nombre);
                    $('#abreviatura').val(data[i].abreviatura);


                }

            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        ('.cambios_modal').click(actualizar);

    }

    function actualizar() {
        var nombre = $('#nombre').val();
        var abreviatura = $('#abreviatura').val();

        $.ajax({
            url: '<?php echo base_url('/ModuloPublicaciones/Cambios'); ?>',
            type: 'POST',
            dataType: "text",
            data: {
                nombre: nombre,
                abreviatura: abreviatura
            }
        }).done(function(data) {
            console.log(data);

        }).fail(function() {
            console.log("error al enviar los datos");

        });
    }


    function eliminarUnidades() {

        var id = $(this).parents("tr").find(".id").text();
        alert(id)


        $.ajax({
                url: '<?php echo base_url('/ModuloPublicaciones/EliminarUni'); ?>',
                type: 'POST',
                dataType: 'text',
                data: {
                    id: id
                },
            })
            .done(function(data) {

                if (data == "Eliminado") {
                    alert("se elimino")
                }

            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

    }
</script>