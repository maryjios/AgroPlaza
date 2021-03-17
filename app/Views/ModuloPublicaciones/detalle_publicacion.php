  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-2">
            <h1>Publicación</h1>
          </div>
          <div class="col-sm-2">
            <a href="<?php echo base_url('/ModuloPublicaciones/ListarPublicaciones') ?>" type="button" class="btn btn-info">Volver</a>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="card card-solid">
        
        <div class="card-body">
          <div class="row">
            <div class="col-12 col-sm-6">
              <div class="col-12">
                <div class=" d-inline mr-5 primera_imagen">
                  <img  class="product-image" src="<?php echo base_url('/public/dist/img/publicaciones/publicacion').$publicacion['id'].'/'.$img['imagen'] ?>">
                </div>        
              </div>
              <div class="col-12 product-image-thumbs">

                <?php 
                   $path = "./public/dist/img/publicaciones/publicacion".$publicacion['id'];
                   if (file_exists($path)) {
                      $directorio = opendir($path);
                      while ($archivo = readdir($directorio)) {
                         if (!is_dir($archivo)) { ?>
                            <div class=" product-image-thumb">
                               <img src="<?php echo base_url('/public/dist/img/publicaciones/publicacion').$publicacion['id'].'/'.$archivo ?>"> 
                            </div>
                            
                      <?php }
                      }
                   }
                ?>
              </div>
            </div>
            <div class="col-12 col-sm-6">
              <h2 class="my-3"><?php echo $publicacion['titulo']; ?></h2>
              <hr>
              <div class="row">
                <div class="col">
                  <h4>Precio</h4>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                      <p><span>$ </span><?php echo $publicacion['precio']." * ".$publicacion['unidad']; ?></p>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <h4>Envio</h4>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <p><span><i class="fas fa-shipping-fast mr-3"></i></span><?php if ($publicacion['envio']=="NO") {
                      echo "No";
                    }else{
                      echo "Si";
                    }; ?>
                    </p>
                  </div>
                </div>
              </div>
              <div class="row mt-3">
                <div class="col">
                  <h4 class="text-success">Vendedor</h4>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <p><span><i class="fas fa-user-tag"></i></span>
                      <?php echo $publicacion['nombre_usuario'] ?>
                    </p>
                  </div>
                </div>
                <div class="col">
                  <h4 class="text-success">Ubicación</h4>
                  <div class="btn-group btn-group-toggle" data-toggle="buttons">
                    <p><span><i class="fas fa-map-marker-alt"></i></span>
                      <?php echo $publicacion['departamento'].", ".$publicacion['ciudad'] ?>
                    </p>
                  </div>
                </div>
              </div>

              <div class="row">
                <div class="col py-2 px-3 mt-4 bg-info">
                  <h4 class="mb-0">
                    Stock
                  </h4>
                  <h4 class="mt-0">
                    <small><?php if ($publicacion['stock'] >0) {
                      echo "Disponible";
                    }else{
                      echo "No disponible";
                    } ?></small>
                  </h4>
                </div>
              </div>

              <div class="mt-4">
                <div class="btn btn-primary btn-lg btn-flat">
                  <i class="fas fa-cart-plus fa-lg mr-2"></i>
                  Comprar
                </div>
              </div>
            </div>
          </div>
          <div class="row mt-4">
            <nav class="w-100">
              <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Descripción</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comentarios</a>
              </div>
            </nav>
            <div class="tab-content p-3" id="nav-tabContent">
              <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab">
                <p><?php echo $publicacion['descripcion']; ?></p>
              </div>
              <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab">
                <div class="card-footer card-comments">
                <div class="card-comment">
                  <!-- User image -->
                  <img src="<?php echo base_url('public/dist/img/user4-128x128.jpg') ?>" class="img-circle elevation-2" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      Maria Gonzales
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    It is a long established fact that a reader will be distracted
                    by the readable content of a page when looking at its layout.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
                <div class="card-comment">
                  <!-- User image -->
                  <img src="<?php echo base_url('public/dist/img/user2-160x160.jpg') ?>" class="img-circle elevation-2" alt="User Image">

                  <div class="comment-text">
                    <span class="username">
                      <?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?>
                      <span class="text-muted float-right">8:03 PM Today</span>
                    </span><!-- /.username -->
                    The point of using Lorem Ipsum is that it hrs a morer-less
                    normal distribution of letters, as opposed to using
                    'Content here, content here', making it look like readable English.
                  </div>
                  <!-- /.comment-text -->
                </div>
                <!-- /.card-comment -->
              </div>
              </div>
            </div>
          </div>


        </div>

      </div>

    </section>

  </div>
  <script>
    $(document).ready(function() {
      $('.product-image-thumb').on('click', function () {
        var $image_element = $(this).find('img')
      $('.product-image').prop('src', $image_element.attr('src'))
      $('.product-image-thumb.active').removeClass('active')
      $(this).addClass('active')
      })
    })
  </script>

 
