<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Lista de Pedidos Solicitados</b></h2>
                <div class="d-grid d-md-flex  justify-content-md-end">
                  <!-- <a class=" btn btn-danger mr-4" href="<?php //echo base_url('ModuloPublicaciones/PublicacionesInactivas')?>"><i class="fas fa-user-lock"></i>
                  Publicaciones Inactivas</a> -->
                  <select class="form-control col-2 bg-info">
                    <option>Solicitados</option>
                    <option>En proceso</option>
                    <option>Finalizado</option>
                  </select>
                </div>
              </div>
              <div class="card-body" id="actualizar">
                <table id="publicaciones" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor total</th>
                    <th>Comprador</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                  </thead>
                  <tbody id="lista" >

                    <?php foreach ($pedidos as $pedido ): ?>
                      <tr>
                        <td class="id"><?php echo $pedido['id'] ?></td>
                        <td><?php echo $pedido['titulo'] ?></td>
                        <td><?php echo $pedido['cantidad'] ?></td>
                        <td><?php echo $pedido['valor_total'] ?></td>
                        <td><?php echo $pedido['nombre_usuario'] ?></td>
                        <td><?php echo $pedido['fecha_insert'] ?></td>
                        <td><?php echo $pedido['estado_pedido'] ?></td>
                        <td><?php echo '<button type="button" class="btn btn-success detalle"><i class="far fa-eye"></i></button>
                          <div class="btn-group">
                            <button type="button" class="btn btn-warning">Pasar a:</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                              <a class="dropdown-item" href="#">En proceso </a>
                              <a class="dropdown-item" href="#">Entregado</a>
                              <a class="dropdown-item" href="#">Finalizado</a>
                              <a class="dropdown-item" href="#">Cancelado</a>
                            </div>
                          </div>
                        '  ?></td>
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
  <!-- Modal detalle pedido -->
  <div class="modal fade" id="detalle_pedido" >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <div class="container-fluid">
            <div class="row">
              <div class="col text-center img-thumbnail">
                <h5>Producto</h5>
                <img src="https://www.lechepuleva.es/documents/13930/203222/pi%C3%B1a_g.jpg/c585227d-e694-464d-87d7-3f2143dd33d9?t=1423480442000" class="rounded img-size-50 mr-2">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col img-thumbnail">
                <div class="position-relative rounded p-3 bg-success" style="height: 200px">
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-primary">
                      +
                    </div>
                  </div>
                  <h6>Cantidad: <span>15 Kilos</span></h6>
                  <h6>Precio: $ <span>1500</span></h6>
                  <h6>Descuento: <span>0</span></h6>
                  <hr>
                  <h6>Total: $ <span>22500</span></h6>
                  <hr>
                  <h6>Comprador: <span>Leonardo Lopez</span></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
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
      $('.detalle').click(verPedido);
      $('.editar').click(editardatos);
    }


    function verPedido(){
      $("#detalle_pedido").modal("show");
      var id = $(this).parents("tr").find(".id").text();
      $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/DetallePedido'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
      })
      .done(function() {
        console.log("success");
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      

    }

    function eliminardatos() {

      $(this).parents('tr').attr('id', 'por_eliminar');
      var id = $(this).parents("tr").find(".id").text();
      rowId = $(this).parents("tr").attr('id');
      $.ajax({
        url: '<?php echo base_url('/ModuloPublicaciones/EliminarPublicacion');?>',
        type: 'POST',
        dataType: 'text',
        data: {id: id},
      }).done(function(data) {
        
        if (data=="Eliminado") {
          $("#publicaciones").DataTable().rows($("#"+rowId)).remove();
          $("#publicaciones").DataTable().search("").columns().search("").draw();
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

    };

    function editardatos() {

      var id = $(this).parents("tr").find(".id").text();

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


      $.ajax({
        url: '<?php echo base_url('/ModuloPublicaciones/ConsultaImagenes');?>',
        type: 'POST',
        dataType: 'json',
        data: {id: id},
      })
      .done(function(data) {

        $.each(data, function( index, value ) {
           $( ".Brand" ).append( "<img src='"+this+"' > class='imagen'" );
        });

       for (var i = 0; i < data.length; i++) {
          var img = "<img src='<?php echo base_url('public/dist/img/publicaciones/')?>"+'/'+data[i].imagen+"' class='rounded img-size-50 mr-2'>";
          $('.dvPreview').append(img);
          
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

  
  