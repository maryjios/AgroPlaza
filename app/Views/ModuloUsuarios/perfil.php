<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="row">
            <div class="col">
              <H3>Bienvenido <?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?></H3>
            </div>
          </div>
          <div class="row mb-4">
            <div class="col border border-danger">
             <img class="img-fluid "  src="https://www.caracteristicas.co/wp-content/uploads/2016/04/campo-1-e1558303226877.jpg">
            </div>
          </div>
          <div class="row">
            <?php if($_SESSION['tipo_usuario']=="ADMINISTRADOR"){  ?>
              <!-- ./col -->
              <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                  <div class="inner">
                    <h3 id="n_usuarios"></h3>
                    <p>Usuarios Registrados</p>
                  </div>
                  <div class="icon">
                    <i class="ion ion-person-add"></i>
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
