<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b>Lista de pedidos cancelados y finalizados</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
              </div>
            </div>
            <div class="card-body" id="actualizar">
              <table id="pedidos" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Cantidad</th>
                    <th>Valor total</th>
                    <th>Comprador</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th>
                    <th>Ver</th>
                  </tr>
                </thead>
                <tbody id="lista">

                  <?php foreach ($pedidos as $pedido) : ?>
                    <tr>
                      <td class="id"><?php echo $pedido['id'] ?></td>
                      <td><?php echo $pedido['titulo'] ?></td>
                      <td><?php echo $pedido['cantidad'] ?></td>
                      <td><?php echo $pedido['valor_total'] ?></td>
                      <td><?php echo $pedido['nombre_usuario'] ?></td>
                      <td><?php echo $pedido['fecha_insert'] ?></td>
                      <td><?php echo $pedido['estado_pedido'] ?></td>
                      <td><?php echo '<button type="button" class="btn btn-success detalle"><i class="far fa-eye"></i></button>' ?></td>
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

<script>

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




</script>