<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b>Lista de pedidos cancelados</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
                <div class="btn-group col-2" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn btn-secondary dropdown-toggle form-control  bg-info" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    En proceso
                  </button>
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
                    <th>Valor total</th>
                    <th>Comprador</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th>
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
<div class="modal fade" id="detalle_pedido">
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




</script>