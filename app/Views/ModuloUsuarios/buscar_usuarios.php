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
              <h3 class="card-title">Lista de usuarios activos</h3>
            </div>
            <div class="d-grid d-md-flex mt-4 mr-4 ml-2 justify-content-md-end">
              <a href="<?php echo base_url('/ModuloUsuarios/BuscarInactivos') ?>" class="btn btn-app bg-danger mr-4">
                <i class="fas fa-user-lock"></i>
                Usuarios Inactivos</a>
              <a href="<?php echo base_url('/ModuloUsuarios/BuscarPendientes') ?>" class="btn btn-app bg-warning mr-4">
                <i class="fas fa-user-clock"></i>
                Usuarios Pendientes</a>
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
                    <th>Avatar</th>
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

<div class="modal fade " id="mod_editar">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header ">
        <h4 class="modal-title "><b>Datos Nuevo Usuario</b></h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

        <div class="form-group row md-2">
          <div class="form-group col-6">
            <label for="exampleInputEmail1">Documento</label>
            <input type="text" class="form-control" id="documento_us" name="documento_us" disabled>
          </div>
          <div class="form-group col-6">
            <label for="exampleInputEmail1">Email</label>
            <input type="email" class="form-control" id="email_us" name="email_us" disabled>
          </div>
        </div>
        <div class="form-group">
          <label>Estado</label>
          <input type="text" class="form-control" id="estado_us" name="estado_us" disabled>

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
    listarusuarios();

  }

  function listarusuarios() {
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/MostrarUsuarios'); ?>',
      type: 'POST',
      dataType: "json",
      success: function(data) {

        var listarusuarios = "";
        if (data != 'error') {
          for (var i = 0; i < data.length; i++) {
            listarusuarios += '<tr>' +
              '<td>' + data[i].id + '</td>' +
              '<td>' + data[i].email + '</td>' +
              '<td class="doc">' + data[i].documento + '</td>' +
              '<td>' + data[i].nombres + '</td>' +
              '<td>' + data[i].apellidos + '</td>' +
              '<td>' + data[i].avatar + '</td>' +
              '<td>' + data[i].tipo_usuario + '</td>' +
              '<td><span class="btn btn-success td_estado">' + data[i].estado + '</span></td>' +
              '<td><button  type="button" class="btn btn-primary mr-2 mod_estado"><i class="far fa-eye"></i></button><a class="btn btn-danger toastrDefaultSuccess desactivar"><i class="fas fa-user-lock"></i></a></td>' +
              '</tr>';
          }
        }

        $("#tbodyusuarios").html(listarusuarios);
        $(".mod_estado").click(buscarporId);
        $(".desactivar").click(inactivarusuario);
      }
    });
  }

  function buscarporId() {
    var doc = $(this).parents("tr").find(".doc").text();
    $('#mod_editar').modal();
    // var $estado = $(this).parents("tr").find(".td_estado").text();
    // alert(doc);

    $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/BuscarusuId'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          doc: doc
        }

      }).done(function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          $('#documento_us').val(data[i].documento);
          $('#estado_us').val(data[i].estado);

        }
      })
      .fail(function() {
        console.log("error");
      });
    $(".act_cambios").click(actualizarest);

  }


  function inactivarusuario() {

    var doc = $(this).parents("tr").find(".doc").text();
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/DesactivarUs'); ?>',
      type: 'POST',
      dataType: "text",
      data: {
        doc: doc
      },

    }).done(function(data) {
      if (data == "OK#UPDATE") {
        window.location = '<?php echo base_url('/ModuloUsuarios/BuscarInactivos'); ?>';
      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>