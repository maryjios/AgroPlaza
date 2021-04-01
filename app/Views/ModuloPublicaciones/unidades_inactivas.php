<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b>Lista de unidades inactivas</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
                <a class=" btn btn-success mr-4" href="<?php echo base_url('ModuloPublicaciones/Unidades')?>"><i class="fas fa-balance-scale-left"></i>
                Unidades Activas</a>
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
                    <th>Activar</th>
                  </tr>
                </thead>
                <tbody id="lista" >
                  <?php foreach ($unidades as $unidad ): ?>
                    <tr>
                      <td class="id"><?php echo $unidad['id'] ?></td>
                      <td><?php echo $unidad['nombre'] ?></td>
                      <td><?php echo $unidad['abreviatura'] ?></td>
                      <th><?php echo $unidad['cantidad*unidad'] ?></th>
                      <td><?php echo "<button class='btn btn-info activar ml-1'><i class='fas fa-hand-pointer'></i></button>" ?></td>
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
    $('#unidades').DataTable({
      "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"},
      "responsive": true, "autoWidth": false,
      "ordering":true,
      "aoColumnDefs": [
      { 'bSortable': false, 'aTargets': [ 3 ] }
      ],
    });

    $('.activar').click(activarPublicacion);
  }

  function activarPublicacion() {
   
    $(this).parents('tr').attr('id', 'por_eliminar');
    var id = $(this).parents("tr").find(".id").text();
    rowId = $(this).parents("tr").attr('id');
    $.ajax({
      url: '<?php echo base_url('/ModuloPublicaciones/ActivarUnidad');?>',
      type: 'POST',
      dataType: 'text',
      data: {id: id},
    }).done(function(data) {
  
      if (data.trim()=="Actualizado") {
        Swal.fire({
          title: 'Desea activar este registro?',
          showCancelButton: true,
          confirmButtonText: `Aceptar`,
        }).then((result) => {
          /* Read more about isConfirmed, isDenied below */
          if (result.isConfirmed) {
            Swal.fire('Activado!', '', 'success');
            $("#unidades").DataTable().rows($("#"+rowId)).remove();
            $("#unidades").DataTable().search("").columns().search("").draw();
          } 
        })
        
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

