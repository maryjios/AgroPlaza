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
              
                  </tbody>
                </table>
                <div id="mensaje">
                  
                </div>
              </div>
              <!-- /.card-body -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>
  <!-- Modal -->
  <div class="modal fade" id="editar_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Publicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="col">
              <h4 id="titulo"></h4>
            </div>
          <div class="row">
            <div class="col">
              <p id="descripcion"></p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p><?php echo "stock" ?></p>
            </div>
            <div class="col">
              <p><?php echo "unidad" ?></p>
            </div>
            <div class="col">
              <p><?php echo "precio" ?></p>
            </div>
            <div class="col">
              <p><?php echo "precio de envio" ?></p>
            </div>
            <div class="col">
              <p><?php echo "descuento" ?></p>
            </div>
          </div>
          <div class="row">
            <div class="col">
              <p>vendedor</p>
            </div>
            <div class="col">
              <p>Fecha publicacion</p>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary">Actualizar</button>
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

  function iniciar(){
    listarPublicaciones();
  }

  function listarPublicaciones() {

    $.ajax({
      url: '<?php echo base_url('/ModuloPublicaciones/ConsultarPublicaciones');?>',
      type: 'POST',
      dataType: 'json',
      success: function(data) {
        
        let listarPublicacion="";
        for (var i = 0; i < data.length; i++) {
          
          listarPublicacion+=
          '<tr>' +
            '<td class="id_publicacion">' + data[i].id_publicaciones + '</td>' +
            '<td >' + data[i].titulo + '</td>' +
            '<td >' + data[i].tipo_publicacion + '</td>' +
            '<td >' + data[i].nombre_usuario +' '+data[i].apellido_usuario + '</td>' +
            '<td >' + data[i].fecha_insert + '</td>' +
            '<td >' + data[i].estado_publicacion + '</td>' +
            '<td><button type="button" class="btn btn-info mr-2 toastrDefaultSuccess detalle "><i class="far fa-eye"></i></button><button type="button" class="btn btn-info toastrDefaultSuccess detalle"><i class="far fa-edit"></i></button></td>'+
          '</tr>';
        
        }

        $('#publicaciones').html(listarPublicacion);

        $('.detalle').click(consultarPublicacion);

      }
    });
    
  }

  function consultarPublicacion() {

    var id = $(this).parents("tr").find(".id_publicacion").text();
    
    //alert(id);

    $('#editar_modal').modal();

    $.ajax({
      url: '<?php echo base_url('/ModuloPublicaciones/ConsultaIndividual');?>',
      type: 'POST',
      dataType: 'json',
      data: {id: id},
    })
    .done(function(data) {
      console.log(data);
    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    

  }

  </script>
  