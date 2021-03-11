<!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-2">
            <h1 class="m-0">Publicaciones</h1>
          </div><!-- /.col -->
          <div class="col-sm-6 ">
            <a class=" btn btn-danger btn-sm " href="<?php echo base_url('ModuloPublicaciones/PublicacionesInactivas')?>">Eliminadas</a>
          </div><!-- /.col -->
          <div class="col-12">
            <div class="card">
              <!-- /.card-header -->
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
                        <td><?php echo "<button class='btn btn-success detalle'><i class='far fa-eye'></i></button><button class='btn btn-warning editar ml-1'><i class='far fa-edit'></i></button><button class='btn btn-danger eliminar ml-1'> <i class='far fa-trash-alt'></i></button>" ?></td>
                      </tr>
                    <?php endforeach ?>
                    
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div><!-- /.content-header -->
  </div>
  <!-- Modal Editar-->
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
            <div class="form-group col imagenes">
              <input id="fotos" type="file" name="fotos[]" multiple="multiple" accept="image/*" />
              <hr />
              <b>Vista Previa</b>
              <br />
              <br />
              <div class="dvPreview">
              </div>
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

  