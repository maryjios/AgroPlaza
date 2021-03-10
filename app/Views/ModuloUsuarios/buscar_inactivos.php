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
              <h3 class="card-title">Lista de usuarios Inactivos</h3>
            </div>
            <div class="d-grid gap-2 d-md-flex mt-4 mr-4 justify-content-md-end">

              <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="btn btn-app bg-success mr-4">
                <i class="fas fa-lock-open"></i>
                Usuarios Activos</a>

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
<div class="modal fade " id="mod_inactivos">
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
            <option selected>Seleccione el nuevo estado</option>
            <option value="ACTIVO">Activo</option>
            <option value="PENDIENTE">Pendiente</option>
          </select>
        </div>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cerrar</button>
        <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<!-- Modal -->
<div class="modal fade" id="modal-confirma" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content sm">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Retaurar Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>¿Desea Restaurar este Usuario?</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-ligth" data-dismiss="modal">Cancelar</button>
        <a class="btn btn-primary btn-ok" data-dismiss="modal">Si</a>
      </div>
    </div>
  </div>
</div>
<script>
  $(document).ready(iniciar);

  function iniciar() {
    listarinactivos();

  }

  function listarinactivos() {
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/MostrarInactivos'); ?>',
      type: 'POST',
      dataType: "json",
      success: function(data) {

        var listarinactivos = "";
        if (data != 'error') {
          for (var i = 0; i < data.length; i++) {

            listarinactivos += '<tr>' +
              '<td class="doc_in">' + data[i].id + '</td>' +
              '<td>' + data[i].email + '</td>' +
              '<td >' + data[i].documento + '</td>' +
              '<td>' + data[i].nombres + '</td>' +
              '<td>' + data[i].apellidos + '</td>' +
              '<td>' + data[i].avatar + '</td>' +
              '<td>' + data[i].tipo_usuario + '</td>' +
              '<td><span class="btn btn-danger ">' + data[i].estado + '</span></td>' +
              '<td><button type="button" class="btn btn-success toastrDefaultSuccess activar" data-toggle="modal"  data-target="#modal-confirma"  data-placement="top" class="btn btn-danger"><i class="fas fa-trash-restore"></i></button></td>' +
              '</tr>';

          }
        }

        $("#tbodyusuarios").html(listarinactivos);
        $(".mod_edit").click(buscarinacId);
        $(".activar").click(restaurarestado);
      }
    });
  }

  function buscarinacId() {
    var docum = $(this).parents("tr").find(".doc_in").text();
    $('#mod_inactivos').modal();


    $.ajax({
        url: '<?php echo base_url('/ModuloUsuarios/BuscarInacId'); ?>',
        type: 'POST',
        dataType: "json",
        data: {
          docum: docum
        }

      }).done(function(data) {
        console.log(data);
        for (var i = 0; i < data.length; i++) {
          $('#documento_edit').val(data[i].documento);
          $('#estado_edit').val(data[i].estado);
        }
      })
      .fail(function() {
        console.log("error");
      });

  }

  function restaurarestado() {

    var doc = $(this).parents("tr").find(".doc_in").text();
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/RestaurarUsuario'); ?>',
      type: 'POST',
      dataType: "text",
      data: {
        doc: doc
      },

    }).done(function(data) {
      if (data == "OK#UPDATE") {
        window.location = '<?php echo base_url('/ModuloUsuarios/BuscarUsuarios'); ?>';
      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>