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
              <h3 class="card-title">Lista de usuarios en Proceso </h3>
            </div>
            <div class="d-grid gap-2 d-md-flex mt-4 mr-4 justify-content-md-end">

              <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="btn btn-app bg-success mr-4">
                <i class="fas fa-lock-open"></i>
                Usuarios Activos</a>

              <a href="<?php echo base_url('/ModuloUsuarios/BuscarInactivos') ?>" class="btn btn-app bg-danger mr-4">
                <i class="fas fa-user-lock"></i>
                Usuarios Inactivos</a>

            </div>

            <!-- /.card-header -->
            <div class="card-body">
              <table id="" class="table table-striped table-valign-middle">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Tipo Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="tbodyusuarios">

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
<div class="modal fade " id="modal_editar">
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
          <input type="email" class="form-control" id="documento" name="documento_edit" disabled="">

          <!-- <input type="email" class="form-control" id="estado_edit" name="estado_edit" disabled=""> -->
        </div>
        <div class="form-group">
          <label>Estado</label>
          <select class="form-control" name="nuevo_estado">
            <option selected>Seleccione el nuevo estado</option>
            <option value="ACTIVO">Activo</option>
            <option value="INACTIVO">Inactivo</option>

          </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary admitir" data-dismiss="modal">Guardar cambios</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<script>
  $(document).ready(iniciar);

  function iniciar() {
    listarPendientes();

  }

  function listarPendientes() {
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/MostrarPendientes'); ?>',
      type: 'POST',
      dataType: "json",
      success: function(data) {

        var listarPendientes = "";
        if (data != 'error') {
          for (var i = 0; i < data.length; i++) {

            listarPendientes += '<tr>' +
              '<td>' + data[i].id + '</td>' +
              '<td>' + data[i].email + '</td>' +
              '<td class="doc">' + data[i].documento + '</td>' +
              '<td>' + data[i].nombres + '</td>' +
              '<td>' + data[i].apellidos + '</td>' +
              '<td>' + data[i].avatar + '</td>' +
              '<td>' + data[i].tipo_usuario + '</td>' +
              '<td><span class="btn btn-warning ">' + data[i].estado + '</span></td>' +
              '<td><button type="button" class="btn btn-primary mr-2 modal_edit" ><i class="far fa-eye"></i></button><a  class="btn btn-danger toastrDefaultSuccess"><i class="fas fa-user-lock"></i></a></td>' +
              '</tr>';
          }
        }
        $("#tbodyusuarios").html(listarPendientes);
        $(".modal_edit").click(buscarpenId);
      }
    });

  }

  function buscarpenId() {
    var docPen = $(this).parents("tr").find(".doc").text();
    $('#modal_editar').modal();

    $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/BuscarPenId'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          docPen: docPen
        }

      }).done(function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          $('#documento').val(data[i].documento);
          $('#nuevo_estado').val(data[i].estado);
        }
        $('.')
      })
      .fail(function() {
        console.log("error");
      });

    $(".admitir").click(actualizarpen);
  }


  function actualizarpen() {
    var doc = $('#documento').val();
    var new_estado = $('#nuevo_estado').val();

    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/ActualizarPen'); ?>',
      type: 'POST',
      dataType: "text",
      data: {
        doc: doc,
        new_estado: new_estado
      },
    }).done(function(data) {

      if (data == "USUARIO#ACTUALIZADO") {
        window.location = '<?php echo base_url('/ModuloUsuarios/BuscarPendientes'); ?>';
      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>