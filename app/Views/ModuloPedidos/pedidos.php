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
                        <td><?php echo "<a type='button' href='".base_url('/ModuloPublicaciones/ConsultaDetalle?file=').$pedido['id']."' class='btn btn-success detalle'><i class='far fa-eye'></i></a><a type='button' href='".base_url('/ModuloPublicaciones/EditarPublicacion?id=').$pedido['id']."' class='btn btn-warning editar ml-1'><i class='far fa-edit'></i></a><button class='btn btn-danger eliminar ml-1'> <i class='far fa-trash-alt'></i></button>"  ?></td>
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
      $('.eliminar').click(eliminardatos);
      $('.editar').click(editardatos);
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

  
  