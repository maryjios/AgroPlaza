
<!-- !prueba de pull sin push -->
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Contenido</h1>
        </div><!-- /.col -->
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">DataTable with default features</h3>
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
   listarusuarios();
  
}

function listarusuarios() {
  $.ajax({
    url: '<?php echo base_url('/ModuloUsuarios/MostrarUsuarios');?>',
    type: 'POST',
    dataType:"json",
     success: function(data) {

       var listarusuarios="";
       
       for (var i = 0; i < data.length; i++) {
         
         listarusuarios+='<tr>' +
         '<td>' + data[i].email + '</td>' +
         '<td>' + data[i].documento + '<input type="hidden" value="'+data[i].id+'"class="id"> </td>' +
         '<td>' + data[i].nombres + '</td>' +
         '<td>' + data[i].apellidos + '</td>' +
         '<td>' + data[i].direccion + '</td>' +
         '<td>' + data[i].telefono + '</td>' +
         '<td>' + data[i].genero + '</td>' +
         '<td>' + data[i].avatar + '</td>' +
         '<td>' + data[i].tipo_usuario + '</td>' +
         '<td><span class="td_estado">'+data[i].estado+'</span></td>'+
         '<td><a href="" class="btn btn-primary" data-toggle="modal" data-target="#modal-default"><i class="fas fa-user-edit"></i></a></td>'+
         '<td><a  class="btn btn-danger toastrDefaultSuccess"><i class="fas fa-trash-alt"></i></a></td>'+
         '</tr>';
         if(data[i].estado=='ACTIVO'){
          $(".td_estado").css("background","green")

         }else{
          $(".td_estado").css("background","red")
         }
     }
      $("#tbodyusuarios").html(listarusuarios);
    }   
  });
}
$(function() {
    const Toast = Swal.mixin({
      toast: true,
      position: 'top-end',
      showConfirmButton: false,
      timer: 3000
    });

    $('.toastrDefaultSuccess').click(function() {
      toastr.success('Se ha eliminado correctamente')
    });
   
  });

</script>