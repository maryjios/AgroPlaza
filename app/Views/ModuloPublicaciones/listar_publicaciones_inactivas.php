<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b>Lista de Publicaciones Inactivas</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
                <a class=" btn btn-success mr-4" href="<?php echo base_url('ModuloPublicaciones/ListarPublicaciones')?>"><i class="fas fa-lock-open"></i>
                Publicaciones Activas</a>
              </div>
            </div>
            <div class="card-body" id="actualizar">
              <table id="publicaciones" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Imagen</th>
                    <th>Titulo</th>
                    <th>Tipo</th>
                    <th>Vendedor</th>
                    <th>Fecha de publicación</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="lista" >

                  <?php foreach ($datos as $dato ): ?>
                    <tr>
                      <td class="id"><?php echo $dato['id_publicacion'] ?></td>
                      <td class="text-center"><img src="<?php echo base_url('public/dist/img/publicaciones/').'/publicacion'.$dato['id_publicacion'].'/'.$dato['imagen'] ?>" class="rounded img-size-50 mr-2"></td>
                      <td><?php echo $dato['titulo'] ?></td>
                      <td><?php echo $dato['tipo_publicacion'] ?></td>
                      <td><?php echo $dato['nombre_usuario'] ?></td>
                      <td><?php echo $dato['fecha_publicacion'] ?></td>
                      <td><?php echo $dato['estado_publicacion'] ?></td>
                      <td><?php echo "<button class='btn btn-success detalle'><i class='far fa-eye'></i></button><button class='btn btn-info activar ml-1'><i class='fas fa-hand-pointer'></i></button>" ?></td>
                    </tr>
                  <?php endforeach ?>

                </tbody>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->
</div>

<script >
  $(document).ready(iniciar);
  
  function iniciar() {
    $('#publicaciones').DataTable({
      "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"},
      "responsive": true, "autoWidth": false,
      "ordering":true,
      "aoColumnDefs": [
      { 'bSortable': false, 'aTargets': [ 1 ] },
      { 'bSortable': false, 'aTargets': [ 6 ] },
      { 'bSortable': false, 'aTargets': [ 7 ] }
      ],
    });

    $('.activar').click(activarPublicacion);
  }

  function activarPublicacion() {

    $(this).parents('tr').attr('id', 'por_eliminar');
    var id = $(this).parents("tr").find(".id").text();
    rowId = $(this).parents("tr").attr('id');
    $.ajax({
      url: '<?php echo base_url('/ModuloPublicaciones/ActivarPublicacion');?>',
      type: 'POST',
      dataType: 'text',
      data: {id: id},
    }).done(function(data) {

      if (data=="Actualizado") {
        $("#publicaciones").DataTable().rows($("#"+rowId)).remove();
        $("#publicaciones").DataTable().search("").columns().search("").draw();
      }else{
        alert("No se pudo actualizar el registro");
      }

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });

  };
</script>

