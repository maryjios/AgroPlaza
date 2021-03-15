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
              <h2 class="card-title "><b> Lista de usuarios Inactivos</b></h2>
            
            <div class="d-grid d-md-flex  justify-content-md-end">

              <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios') ?>" class="btn  bg-success mr-4">
                <i class="fas fa-lock-open"></i>
                Usuarios Activos</a>

              <a href="<?php echo base_url('/ModuloUsuarios/BuscarPendientes') ?>" class="btn  bg-warning mr-4">
                <i class="fas fa-user-clock"></i>
                Usuarios Pendientes</a>
            </div>
          </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="usuarios_inactivos" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Email</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Avatar</th>
                    <th>Tipo Usuario</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
               <tbody id="tbodyusuarios">
                  <?php foreach ($datos as $dato) { ?>

                    <tr>
                      <td class="doc_in"><?php echo $dato['id']; ?></td>
                      <td ><?php echo $dato['email']; ?></td>
                      <td ><?php echo $dato['documento']; ?></td>
                      <td><?php echo $dato['nombres'].' '.$dato['apellidos']; ?></td>
                      <td><?php echo $dato['avatar']; ?></td>
                      <td><?php echo $dato['tipo_usuario']; ?></td>
                      <td><span class="btn bg-danger"><?php echo $dato['estado']; ?></span></td>
                      <td><button type="button" class="btn btn-success toastrDefaultSuccess activar" data-toggle="modal"  data-target="#modal-confirma"  data-placement="top" class="btn btn-danger"><i class="fas fa-trash-restore"></i></button></td>
                    </tr>
                  <?php } ?>
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

<!-- INICIO DEL MODAL CON LOS DATOS DE LOS USUARIOS INACTIVOS -->
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
<!-- FIN DEL MODAL CON LOS DATOS DE LOS USUARIOS INACTIVOS -->


<script>
  $(document).ready(iniciar);

  function iniciar() {
    $('#usuarios_inactivos').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
      },
      "responsive": true,
      "autoWidth": false,
      "ordering": true,
      "aoColumnDefs": [{
          'bSortable': false,
          'aTargets': [1]  },
        {
          'bSortable': false,
          'aTargets': [6] },
        {
          'bSortable': false,
          'aTargets': [7]
        }
      ],
    });
      $(".mod_edit").click(buscarinacId);
      $(".activar").click(restaurarestado);
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
        Swal.fire({
          text: "Se ha modificado el estado del Usuario",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Aceptar',

        }).then((result) => {

          window.location = '<?php echo base_url('/ModuloUsuarios/BuscarUsuarios'); ?>';
        })
      } else {
        alert('no funciona');
      }
    }).fail(function() {
      alert("error al enviar ");
    });
  }
</script>