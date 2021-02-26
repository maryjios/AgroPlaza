 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
   <!-- Content Header (Page header) -->
   <section class="content-header">
     <div class="container-fluid">
       <div class="row mb-2">
         <div class="col-sm-6">
           <h1>Registrar Administrador</h1>
         </div>
       </div>
     </div><!-- /.container-fluid -->
   </section>
   <!-- Main content -->
   <section class="content">
     <div class="container-fluid">
       <!-- <div class="row">
        <div class="col-6">
          
          <div class="alert alert-info alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <h5><i class="icon fas fa-info"></i> Alert!</h5>
            Info alert preview. This alert is dismissable.
          </div>
        </div>
      </div> -->
       <div class="row">
         <!-- left column -->
         <div class="col">
           <!-- general form elements -->
           <div class="card card-primary">
             <div class="card-header">
               <h3 class="card-title">Nuevo</h3>
             </div>
             <!-- /.card-header -->
             <form id="form_nuevoAdmin" method="post" action="#" autocomplete="of">
               <div class="card-body">
                 <div class="row">
                   <div class="form-group col">
                     <input type="text" class="form-control form-control-border" id="documento" placeholder="Cedula" required>
                   </div>
                   <div class="form-group col">
                     <input type="text" class="form-control form-control-border border-width-2" id="nombres" placeholder="Nombres" required>
                   </div>
                 </div>
                 <div class="row">
                   <div class="form-group col">
                     <input type="text" class="form-control form-control-border border-width-2" id="apellidos" placeholder="Apellidos" required>
                   </div>
                   <div class="form-group col">
                     <input type="text" class="form-control form-control-border border-width-2" id="direccion" placeholder="Direccion" required>
                   </div>
                 </div>
                 <div class="row">
                   <div class="form-group col">
                     <input type="text" class="form-control form-control-border border-width-2" id="telefono" placeholder="Telefono" required>
                   </div>
                   <div class="form-group col">
                     <input type="email" class="form-control form-control-border border-width-2" id="email" placeholder="Correo" required>
                   </div>
                 </div>

                 <div class="form-group">
                   <select class="custom-select form-control-border" id="genero">
                     <option value="0" disabled selected>Seleccione Genero</option>
                     <option>Femenino</option>
                     <option>Masculino</option>
                     <option>Otro</option>
                   </select>
                 </div>
                 <div class="card-footer">
                   <button type="submit" class="btn btn-info col-md-2">Registrar</button>
                   <button type="button" class="btn btn-default">Atras</button>
                 </div>
               </div>
             </form>
             <!-- /.card-body -->
           </div>
         </div>
         <!--/.col (left) -->
         <!--/.col (right) -->
       </div>
       <!-- /.row -->
     </div><!-- /.container-fluid -->
   </section>
   <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->

 <script>
   $(document).ready(iniciar);

   function iniciar() {
     $("#form_nuevoAdmin").submit(formRegistrarAdmin);
   }

   function formRegistrarAdmin(e) {
     e.preventDefault();

     enviarInfoNuevoAdmin();
   }

   function enviarInfoNuevoAdmin() {

     email = $("#email").val();
     documento = $("#documento").val();
     nombres = $("#nombres").val();
     apellidos = $("#apellidos").val();
     direccion = $("#direccion").val();
     telefono = $("#telefono").val();
     genero = $("#genero").val();

     if (documento != "" && nombres != "") {
       $.ajax({
           url: '<?php echo base_url('/ModuloUsuarios/InsertarAdmin'); ?>',
           type: "POST",
           dataType: "text",
           data: {
             email: email,
             documento: documento,
             nombres: nombres,
             apellidos: apellidos,
             direccion: direccion,
             telefono: telefono,
             genero: genero,

           },
         })
         .done(function(data) {

           if (data == "FAIL#DOCUMENTO") {
             alert("El documento ingresado ya existe...");

           } else if (data == "FAIL#EMAIL") {

             alert("El email ingresado ya existe...");

           } else if (data == "OK#CORRECT#DATA") {
             alert("Registro Exitoso!");

             $("#documento").val("");
             $("#nombres").val("");
             $("#apellidos").val("");
             $("#direccion").val("");
             $("#telefono").val("");
             $("#email").val("");
             $("#genero").val("");
           }
         })
         .fail(function(data) {
           console.log("error en el proceso");
           console.log(data);
         });
     }
   }
 </script>