<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h2 class="card-title"><b>Lista de pedidos Solicitados</b></h2>
                <div class="d-grid d-md-flex  justify-content-md-end">
                  <div class="btn-group col-2" role="group">
                      <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle form-control  bg-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Solicitados
                      </button>
                      <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                        <a class="dropdown-item" href="<?php echo base_url('ModuloPedidos/PedidosEnProceso') ?>">En proceso</a>
                         <a class="dropdown-item" href="<?php echo base_url('ModuloPedidos/PedidosEntregados') ?>">Entregados</a>
                      </div>
                    </div>
                </div>
              </div>
              <div class="card-body" id="actualizar">
                <table id="pedidos" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor envio</th>
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
                        <td>
                          <form method="post">
                            <input type="number" class="form-control col-6 v_envio" value="<?php echo $pedido['valor_envio'] ?>">
                          </form>
                        </td>
                        <td><?php echo $pedido['valor_total'] ?></td>
                        <td><?php echo $pedido['nombre_usuario'] ?></td>
                        <td><?php echo $pedido['fecha_insert'] ?></td>
                        <td><?php echo $pedido['estado_pedido'] ?></td>
                        <td>
                          <button type="button" class="btn btn-success detalle">
                            <i class="far fa-eye"></i>
                          </button>
                          <?php if($_SESSION['tipo_usuario']!="ADMINISTRADOR") { ?>
                          <div class="btn-group">
                            <button type="button" class="btn btn-warning">Pasar a:</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu" style="">
                              <button class="dropdown-item proceso" >En proceso </button>
                              <button class="dropdown-item cancelado" >Cancelado</button>
                            </div>
                          </div>
                        <?php } ?>
                        </td>
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
                <h5 id="titulo"></h5>
                <img id="img_producto" src="" class="rounded img-size-50 mr-2">
              </div>
            </div>
            <div class="row mt-2">
              <div class="col img-thumbnail">
                <div class="position-relative rounded p-3 bg-success" style="height: 230px">
                  <div class="ribbon-wrapper">
                    <div class="ribbon bg-primary">
                      +
                    </div>
                  </div>
                  <h6>Cantidad: <span id="cantidad"></span></h6>
                  <h6>Precio producto: $ <span id="valor_compra"></span></h6>
                  <h6>Subtotal: $ <span id="valor_subtotal"></span></h6>
                  <h6>Envio: $ <span id="valor_envio"></span></h6>
                  <h6>Descuento: $ <span id="descuento"></span></h6>
                  <hr>
                  <h6>Total: $ <span id="total"></span></h6>
                  <hr>
                  <h6>Comprador: <span id="comprador"></span></h6>
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
      $('#pedidos').DataTable({
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
      $(".proceso").click(pasar_a_proceso); 
      $(".cancelado").click(pasar_a_cancelado);
      $(".v_envio").blur(editarEnvio); 
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
      .done(function(data) {
        console.log(data);
        for (var i =0; i< data.length; i++) {
          img = '<?php echo base_url('public/dist/img/publicaciones/').'/publicacion'?>'+data[i].id_publicacion+ "/"+data[i].imagen;
          $("#img_producto").attr('src', img);
          $("#titulo").text(data[i].titulo);
          $("#cantidad").text(data[i].cantidad);
          $("#valor_compra").text(data[i].valor_compra);
          $("#valor_envio").text(data[i].valor_envio);
          subtotal= (data[i].cantidad * data[i].valor_compra);
          $("#valor_subtotal").text(subtotal);
          descuento = (parseInt(data[i].descuento)/100) * parseInt(subtotal);
          total = (subtotal +parseInt(data[i].valor_envio))-descuento;
          $("#descuento").text(descuento);
          $("#total").text(total);
          $("#comprador").text(data[i].nombre_usuario);
        }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }

    function pasar_a_proceso(){
      $(this).parents('tr').attr('id', 'en_proceso');
      var id = $(this).parents("tr").find(".id").text();
      rowId = $(this).parents("tr").attr('id');
      $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/PasarEnProceso');?>',
        type: 'POST',
        dataType: 'text',
        data: {id: id},
      }).done(function(data) {
        
        if (data.trim()=="Ok") {
          $("#pedidos").DataTable().rows($("#"+rowId)).remove();
          $("#pedidos").DataTable().search("").columns().search("").draw();
        }else{
          alert("No se pudo pasar a 'en proceso', el registro");
        }

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
    }
    
    function pasar_a_cancelado(){
      $(this).parents('tr').attr('id', 'en_cancelado');
      var id = $(this).parents("tr").find(".id").text();
      rowId = $(this).parents("tr").attr('id');
      $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/PasarCancelado');?>',
        type: 'POST',
        dataType: 'text',
        data: {id: id},
      }).done(function(data) {
        
        if (data.trim()=="Ok") {
          $("#pedidos").DataTable().rows($("#"+rowId)).remove();
          $("#pedidos").DataTable().search("").columns().search("").draw();
        }else{
          alert("No se pudo pasar a 'cancelado', el registro");
        }

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

    }


    function editarEnvio(){
      id = $(this).parents("tr").find(".id").text();
      nuevo_costo = $(this).parents("tr").find(".v_envio").val();
      $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/EditarPedidos');?>',
        type: 'POST',
        dataType: 'text',
        data: {id: id, nuevo_costo : nuevo_costo},
      })
      .done(function(data) {
        alert(data)
        Swal.fire({
          text: "Se ha modificado el costo de envio del pedido",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Aceptar',

        })
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
      
    }

  </script>

  
  