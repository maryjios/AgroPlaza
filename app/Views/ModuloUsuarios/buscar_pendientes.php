
<!-- !prueba de pull sin push -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">

        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Lista de usuarios en Proceso </h3>
            </div>
            <div class="d-grid gap-2 d-md-flex mt-4 mr-4 justify-content-md-end">
               
               <a href="<?php echo base_url('/ModuloUsuarios/BuscarUsuarios')?>" class="btn btn-success mr-4">
               <i class="fas fa-unlock"></i>
               Usuarios Activos</a>
               <a href="<?php echo base_url('/ModuloUsuarios/BuscarInactivos')?>" class="btn btn-danger mr-4">
               <i class="fas fa-user-lock"></i>
                Usuarios Inactivos</a>
               
            </div> 
        
            <!-- /.card-header -->
            <div class="card-body">
            <table id="" class="table table-bordered table-striped">
                <thead>
                  <tr>
                   
                    <th>Email</th>
                    <th>Documento</th>
                    <th>Nombres</th>
                    <th>Apellidos</th>
                    <th>Direccion</th>
                    <th>Telefono</th>
                    <th>Genero</th>
                    <th>Avatar</th>
                    <th>Tipo Usuario</th>
                    <th>Estado</th>
                    <th>opcion</th>
                    <th>opcion</th>
                  </tr>
                </thead>
                <tbody id="tbodyusuarios">
                
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
<div class="modal fade " id="modal-default">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h4 class="modal-title">Editar Datos Usuarios</h4>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
           <div class="form-group">
             <label for="exampleInputEmail1">Documento</label>
             <input type="email" class="form-control" id="documento_edit" name="documento_edit" disabled="">
           </div>
            <div class="form-group">
              <label>Estado</label>
              <select class="form-control" name="estado_edit">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Pendiente">Pendiente</option>
              </select>
            </div>
        </div>
        <div class="modal-footer justify-content-between">
          <button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button>
          <button type="button" class="btn btn-primary" data-dismiss="modal">Guardar cambios</button>
        </div>
      </div>
      <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
  </div>
<script>

$(document).ready(iniciar);
function iniciar(){
  listarPendientes();
  
}

function listarPendientes() {
  $.ajax({
    url: '<?php echo base_url('/ModuloUsuarios/MostrarPendientes');?>',
    type: 'POST',
    dataType:"json",
     success: function(data) {

       var listarPendientes="";
       
       for (var i = 0; i < data.length; i++) {
         
         listarPendientes+='<tr>' +
         '<td>' + data[i].email + '</td>' +
         '<td>' + data[i].documento + '<input type="hidden" value="'+data[i].id+'"class="id"> </td>' +
         '<td>' + data[i].nombres + '</td>' +
         '<td>' + data[i].apellidos + '</td>' +
         '<td>' + data[i].direccion + '</td>' +
         '<td>' + data[i].telefono + '</td>' +
         '<td>' + data[i].genero + '</td>' +
         '<td>' + data[i].avatar + '</td>' +
         '<td>' + data[i].tipo_usuario + '</td>' +
         '<td><span class="btn btn-warning ">'+data[i].estado+'</span></td>'+
         '<td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="far fa-eye"></i></a></td>'+
         '<td><a  class="btn btn-danger toastrDefaultSuccess"><i class="fas fa-user-lock"></i></a></td>'+
         '</tr>';
         if(data[i].estado=='ACTIVO'){
          $(".td_estado").css("background","green")

         }else{
          $(".td_estado").css("background","red")
         }
     }
      $("#tbodyusuarios").html(listarPendientes);
    }   
  });

}





</script>