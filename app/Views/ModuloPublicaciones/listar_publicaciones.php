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
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Editar publicación</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="row">
            <div class="form-group col">
              <select class="custom-select form-control-border" id="tipo_publicacion">
                <option value="PRODUCTO">Producto</option>
                <option value="SERVICIO">Servicio</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <input type="text" class="form-control form-control-border" id="titulo" placeholder="Titulo" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <textarea class="form-control" id="descripcion" placeholder="Descripción"></textarea>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <img src="" alt="Publicacion">
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <input type="number" class="form-control form-control-border" id="stock" placeholder="Stock" required>
            </div>
            <div class="form-group col">
              <select class="custom-select form-control-border" id="tipo_publicacion">
                <option value="PRODUCTO">Unidad</option>
                <option value="SERVICIO">###</option>
              </select>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <input type="number" class="form-control form-control-border" id="precio" placeholder="Precio" required>
            </div>
            <div class="form-group col">
              <input type="number" class="form-control form-control-border" id="precio_envio" placeholder="Precio de envio" required>
            </div>
          </div>
          <div class="row">
            <div class="form-group col">
              <input type="number" class="form-control form-control-border" id="descuento" placeholder="Descuento" required>
            </div>
            <div class="form-group col">
              <select class="custom-select form-control-border" id="tipo_publicacion">
                <option value="PRODUCTO">Ciudad</option>
                <option value="SERVICIO">###</option>
              </select>
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
            '<td><button type="button" class="btn btn-info mr-2 toastrDefaultSuccess editar "><i class="far fa-edit"></i></button><a type="button" href="<?php echo base_url('ModuloPublicaciones/ConsultaDetalle') ?>" class="btn btn-success mr-2 toastrDefaultSuccess detalle"><i class="far fa-eye"></i></a><button type="button" class="btn btn-danger toastrDefaultSuccess eliminar"><i class="far fa-trash-alt"></i></button></td>'+
          '</tr>';
        
        }

        $('#publicaciones').html(listarPublicacion);

        $('.editar').click(consultarPublicacion);
        $('.eliminar').click(eliminarPublicacion);

      }
    });
    
  }

  function consultarPublicacion() {

    var id = $(this).parents("tr").find(".id_publicacion").text();


    $('#editar_modal').modal();

    $.ajax({
      url: '<?php echo base_url('/ModuloPublicaciones/ConsultaIndividual');?>',
      type: 'POST',
      dataType: 'json',
      data: {id: id},
    })
    .done(function(data) {

      for (var i = 0; i < data.length; i++) {
        $('#titulo').val(data[i].titulo);
        $('#descripcion').val(data[i].descripcion);
        $('#stock').val(data[i].stock);
        $('#precio').val(data[i].precio);
        $('#precio_envio').val(data[i].precio_envio);
        $('#descuento').val(data[i].descuento);
       
      }

    })
    .fail(function() {
      console.log("error");
    })
    .always(function() {
      console.log("complete");
    });
    
  }

  function eliminarPublicacion(){

    var id = $(this).parents("tr").find(".id_publicacion").text();
    alert(id)


    $.ajax({
      url: '<?php echo base_url('/ModuloPublicaciones/EliminarPublicacion');?>',
      type: 'POST',
      dataType: 'text',
      data: {id: id},
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

  }

  </script>
  