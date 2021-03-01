<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Publicaciones</h1>
          </div><!-- /.col -->
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Titulo</th>
                    <th>Tipo</th>
                    <th>Vendedor</th>
                    <th>Fecha de publicación</th>
                    <th>Estado</th>
                    <th class="text-info">Detalle</th>
                  </tr>
                  </thead>
                  <tbody id="publicaciones">
                    <?php foreach ($resultados as $resultado): ?>
                      <tr>
                        <td><?php echo $resultado['id_publicaciones'] ?></td>
                        <td><?php echo $resultado['titulo'] ?></td>
                        <td><?php echo $resultado['tipo_publicacion'] ?></td>
                        <td><?php echo $resultado['nombres']." ".$resultado['apellidos'] ?></td>
                        <td><?php echo $resultado['fecha_insert'] ?></td>
                        <td><?php echo $resultado['estado_publicacion'] ?></td>
                        <td><button type='button' class='btn btn-info editar'><i class="far fa-eye"></i></button>
                      </tr>
                    <?php endforeach ?>
                  </tbody>
                </table>
                <div>
                  <?php print_r($resultados)?>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>
  <script>
  $(function () {
    $("#example1").DataTable({
      "language": {"url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"},
      "dom": 'Bfrtip',
      "responsive": true, "lengthChange": false, "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
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
  });
  </script>
  <script>
    $(document).ready(inicio);

    function inicio() {
      $.ajax({

      });
    }
  </script>
  