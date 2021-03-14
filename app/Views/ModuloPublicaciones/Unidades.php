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
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#agregar_modal">Agregar</button>
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


<div class="modal fade" id="agregar_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel3">Registrar Unidad</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="form_nuevoUni" method="post" action="#" autocomplete="of">
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border" id="id_nuevo" placeholder="id">
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border" id="nombre_nuevo" placeholder="nombre" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border" id="abreviatura_nuevo" placeholder="abreviatura" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </form>
            </div>

        </div>
    </div>
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
                <button type="button" class="btn btn-primary cambios_modal" data-dismiss="modal">Actualizar</button>
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
                        '<td><button  type="button" class="btn btn-success mr-2 mod_edit"><i class="far fa-eye"></i></button><button class="btn btn-danger eliminar"><i class="far fa-trash-alt"></i></button></td>' +
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

        $('.cambios_modal').click(actualizar);

    }

    function actualizar() {
        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var abreviatura = $('#abreviatura').val();

        $.ajax({
            url: '<?php echo base_url('/ModuloPublicaciones/Cambios'); ?>',
            type: 'POST',
            dataType: "text",
            data: {
                id: id,
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


        // function formRegistrarVendedor(e) {
        //     e.preventDefault();
        //     enviarInfoNuevoVendedor();
        // }

        // function enviarInfoNuevoVendedor() {
        //     email = $("#email").val();
        //     documento = $("#documento").val();
        //     nombres = $("#nombres").val();


        //     if (documento != "" && nombres != "" && apellidos != "" && email != "" && direccion != "" && genero != "" && ciudad != "" && password != "" && loQueVaAVender != undefined) {

        //         var datos_formulario = new FormData($('#formulario_registro')[0]);

        //         $.ajax({
        //                 url: '<?php echo base_url('/Inicio/InsertarVendedor'); ?>',
        //                 type: "POST",
        //                 dataType: "text",
        //                 data: datos_formulario,
        //                 contentType: false,
        //                 processData: false
        //             })
        //             .done(function(data) {

        //                 if (data == "Eliminado") {
        //                     alert("se elimino")
        //                 }

        //             })
        //             .fail(function() {
        //                 console.log("error");
        //             })
        //         }



        //     }

        }
</script>