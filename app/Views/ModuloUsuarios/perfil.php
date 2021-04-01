<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="card col-12">
          <div class="row">
         
            <div class=" card-header col">
              <h3><b> Bienvenido</b> <?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?></h3>
            </div>
          </div>
           <br>
          <div class="row mb-4">
            <div class="col ">
             <img class="img-fluid"  src="https://www.allianz-assistance.es/blog/viajes/datos-eje-cafetero-colombia/_jcr_content/root/stage/stageimage.img.jpeg/1579783414426/datos-eje-cafetero-colombia-stage.jpeg">
            </div>
          </div>
          <div class="row">
            <?php if($_SESSION['tipo_usuario']=="ADMINISTRADOR"){  ?>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                  <div class="inner">
                    <h3 id="n_usuarios"></h3>
                    <p>Usuarios Registrados</p>
                  </div>
                  <div class="icon">
                    <i class="fas fa-users"></i>
                  </div>
                  <a  class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3 id="pendientes"></h3>
                    <p>Usuarios Pendientes</p>
                  </div>
                  <div class="icon">
                  <i class="fas fa-user-clock"></i>
                  </div>
                  <a  class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                  <div class="inner">
                    <h3 id="n_pedidos"></h3>

                    <p>Numero de pedidos</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-bag"></i>
                  </div>
                  <a class="small-box-footer"><i class="fas fa-arrow-circle-right"></i></a>
                </div>
              </div>
              <!-- ./col -->
            <?php } ?>

                
            
          </div>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div><!-- /.content-header -->
</div>
<script >
  $(document).ready(iniciar);

  function iniciar() {
  
     
//  Cantidad de usuarios activos
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/CantidadUsuarios');?>',
      type: 'POST',
      dataType: 'text',
      success:function (data) {
        $("#n_usuarios").text(data);
      }
      
    });
    //  Cantidad de usuarios Pendientes
    $.ajax({
      url: '<?php echo base_url('/ModuloUsuarios/CantidadPendientes');?>',
      type: 'POST',
      dataType: 'text',
      success:function (data) {
        $("#pendientes").text(data);
      }
      
    });
  
  
    //  Cantidad de pedidos activos

    id_usuario = '<?php echo $_SESSION['id'] ?>';
    //alert(id_usuario)
    $.ajax({
      url: '<?php echo base_url('/ModuloPedidos/TotalPedidos');?>',
      type: 'POST',
      dataType: 'text',
      data: {
        id_usuario : id_usuario
      },
      success:function (data) {
        $("#n_pedidos").text(data);
      }
      
    });
  }

 

</script>
