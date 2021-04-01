<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Lista de Unidades Activas</b></h2>
                <div class="d-grid d-md-flex  justify-content-md-end">
                    <button type="button" id="agregar" class="btn btn-success mr-4">Agregar</button>
                    <a class=" btn btn-danger mr-4" href="<?php echo base_url('ModuloPublicaciones/UnidadesInactivas')?>"><i class="fas fa-balance-scale"></i>
                  Unidades Inactivas</a>
                </div>
              </div>
              <div class="card-body" id="actualizar">
                <table id="unidades" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Nombre</th>
                    <th>Abreviatura</th>
                    <th>Cantidad x Unidad</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody id="lista" >

                    <?php foreach ($datos as $dato ): ?>
                      <tr>
                        <td class="id"><?php echo $dato['id'] ?></td>
                        <td><?php echo $dato['nombre'] ?></td>
                        <td><?php echo $dato['abreviatura'] ?></td>
                        <td><?php echo $dato['cantidad*unidad'] ?></td>
                        <td><?php echo $dato['estado'] ?></td>
                        <td><?php echo "<button type='button'class='btn btn-warning editar ml-1'><i class='far fa-edit'></i></button><button class='btn btn-danger eliminar ml-1'> <i class='far fa-trash-alt'></i></button>" ?></td>
                      </tr>
                    <?php endforeach ?>
                    
                  </tbody>
                </table>
              </div>
            </div>
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>

  <!-- Modal registrar-->
  <div class="modal fade" id="agregar_modal" >
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLabel3">Registrar Unidad</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
              </div>
              <div class="modal-body">
                  <form id="form_nuevoUni" method="post"  autocomplete="of">
                      <div class="row">
                          <div class="form-group col">
                              <input type="text" class="form-control form-control-border" id="nombre_nuevo" placeholder="Nombre" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col">
                              <input type="text" class="form-control form-control-border" id="abreviatura_nuevo" placeholder="Abreviatura" required>
                          </div>
                      </div>
                      <div class="row">
                          <div class="form-group col">
                              <input type="text" class="form-control form-control-border" id="cantidad_unidad" placeholder="Cuanto desea vender por unidad" required>
                          </div>
                      </div>
                      <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                          <button type="submit" class="btn btn-primary guardar" data-dismiss="modal">Guardar</button>
                      </div>
                  </form>
              </div>

          </div>
      </div>
  </div>

  <!-- Modal editar -->
  <div class="modal fade" id="editar_modal">
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
                            <input type="hidden" name="id" id="id">
                          <input type="text" class="form-control form-control-border"  id="nombre" placeholder="nombre" required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col">
                          <input type="text" class="form-control form-control-border" id="abreviatura" placeholder="abreviatura" required>
                      </div>
                  </div>
                  <div class="row">
                      <div class="form-group col">
                          <input type="text" class="form-control form-control-border" id="c_unidad" placeholder="Cuanto desea vender por unidad" required>
                      </div>
                  </div>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
                  <button type="button" class="btn btn-primary " id="cambios_modal" data-dismiss="modal">Actualizar</button>
              </div>
          </div>
      </div>
  </div>

  <script >
    $(document).ready(iniciar);
  
    function iniciar() {
      $('#unidades').DataTable({
            "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"},
            "responsive": true, "autoWidth": false,
            "ordering":true,
            "aoColumnDefs": [
            { 'bSortable': false, 'aTargets': [ 3 ] },
            { 'bSortable': false, 'aTargets': [ 4 ] }
            ],
        });
        $("#agregar").click(formRegistrarUnidad);
        $(".editar").click(consultarUnidad);
        $(".eliminar").click(eliminarUnidades);
    }

    function formRegistrarUnidad() {

        $("#agregar_modal").modal("show");

        $(".guardar").on("click", enviarInfoNuevaUnidad);
               
    }

    function enviarInfoNuevaUnidad() {

        nombre          = $("#nombre_nuevo").val();
        abreviatura     = $("#abreviatura_nuevo").val();
        cantidad_unidad =  $("#cantidad_unidad").val();
        tabla_unidades  = $("#unidades").DataTable();

        if (nombre != "" && abreviatura != "") {

            $.ajax({
                url: '<?php echo base_url('/ModuloPublicaciones/InsertarUnidad'); ?>',
                type: "POST",
                dataType: "text",
                data: {
                    nombre_nuevo: nombre,
                    abreviatura_nuevo: abreviatura,
                    cantidad_unidad: cantidad_unidad

                },
            })
            .done(function(data) {
                if (data.trim() == "##Ok##insert") {
                    location.reload();
                    //alert("se inserto un nuevo registro")
                    //tabla_unidades.ajax.reload(null,false);
                    
                }else {
                    alert("No se ha registrado");
                }
            })
            .fail(function(data) {
                console.log(data);
            });
        }

    }


    function consultarUnidad() {

        var id = $(this).parents("tr").find(".id").text();
        $("#editar_modal").modal("show");

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
                    $('#c_unidad').val(data[i].cantidad_unidad);

                }
            })
            .fail(function() {
                console.log("error");
            })
            .always(function() {
                console.log("complete");
            });

        $('#cambios_modal').click(actualizarUnidad);

    }

    function actualizarUnidad() {

        var id = $('#id').val();
        var nombre = $('#nombre').val();
        var abreviatura = $('#abreviatura').val();
        var cantidad_unidad= $('#c_unidad').val();


        $.ajax({
            url: '<?php echo base_url('/ModuloPublicaciones/EditarUnidad'); ?>',
            type: 'POST',
            dataType: "text",
            data: {
                id: id,
                nombre: nombre,
                abreviatura: abreviatura,
                cantidad_unidad: cantidad_unidad
            },
        }).done(function(data) {

            
            if (data.trim()=="##Ok#Edit") {
                location.reload();
            }else{
                alert("No se pudo actualizar la unidad");
            }

        }).fail(function() {
            console.log("error al enviar los datos");

        }).always(function() {
            console.log("complete");
        });
    }

    
    function eliminarUnidades() {
        $(this).parents('tr').attr('id', 'por_eliminar');
        var id = $(this).parents("tr").find(".id").text();
        rowId = $(this).parents("tr").attr('id');

        $.ajax({
            url: '<?php echo base_url('/ModuloPublicaciones/EliminarUnidad'); ?>',
            type: 'POST',
            dataType: 'text',
            data: {
                id: id
            },
        })
        .done(function(data) {

            if (data.trim()=="Eliminado") {
              Swal.fire({
                title: 'Desea eliminar este registro?',
                showCancelButton: true,
                confirmButtonText: `Aceptar`,
              }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                  Swal.fire('Eliminado!', '', 'success');
                  $("#unidades").DataTable().rows($("#"+rowId)).remove();
                  $("#unidades").DataTable().search("").columns().search("").draw();
                } 
              })
              
            }else{
              alert("No se pudo eliminar el registro");
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

  