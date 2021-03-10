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
        <div class="card card-success">
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
                            <input type="email" class="form-control form-control-border border-width-2" id="email" placeholder="Correo" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border border-width-2" id="nombres" placeholder="Nombres" required>
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border border-width-2" id="apellidos" placeholder="Apellidos" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border border-width-2" id="telefono" placeholder="Telefono" required>
                        </div>
                        <div class="form-group col">
                            <select class="custom-select form-control-border" id="genero">
                                <option value="" disabled selected>Seleccione Genero</option>
                                <option value="FEMENINO">Femenino</option>
                                <option value="MASCULINO">Masculino</option>
                                <option value="OTROS">Otro</option>
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col">
                            <select name="departamento" id="departamento" class="form-control mr-3  ">
                                <option value="" disabled selected id="departamento-vacio">Seleccione Departamento</option>
                                <?php
                                foreach ($departamentos as $departamentos) { ?>
                                    <option value="<?php echo $departamentos['id'] ?>"><?php echo $departamentos['nombre'] ?></option>
                                <?php } ?>
                            </select>
                        </div>
                        <div class="form-group col">
                            <select name="ciudad" id="ciudad" class="form-control">
                                <option value="" selected>Seleccione Ciudad</option>
                            </select>
                        </div>
                        <div class="form-group col">
                            <input type="text" class="form-control form-control-border border-width-2" id="direccion" placeholder="Direccion" required>
                        </div>
                    </div>
                    <div class="card-footer">
                        <button type="submit" class="btn btn-success col-md-2">Registrar</button>
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
    $('#ciudad').attr("disabled", true);
    $("#departamento").on('change', elegirDepartamento);
}

function elegirDepartamento() {
    let departamento = $(this).val();
    var ciudades = $("#ciudad");

    if (departamento != '0') {
        $('#ciudad').attr("disabled", false);

        $.ajax({
            url: '<?php echo base_url('/Inicio/getCiudades'); ?>',
            type: "POST",
            dataType: "json",
            data: {
                departamento: departamento,
            },
        })
        .done(function(data) {
            ciudades.find('option').remove();

            $(data).each(function(i, v) { // indice, valor
                ciudades.append('<option value="' + v.id + '">' + v.nombre + '</option>');
            });
        })
        .fail(function(data) {
            console.log("error en el proceso");
            alert("sdsd");
        });
    }
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
    ciudad = $("#ciudad").val();

    if (documento != "" && nombres != "" && email != "" && apellidos != "" && direccion != "" && telefono != "" && genero != "" && ciudad != "") {
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
                ciudad: ciudad
            },
        })
        .done(function(data) {

            if (data == "FAIL#DOCUMENTO") {
                Swal.fire({
                    icon: 'error',
                    title: 'Ya esta registrado en el sistema!',
                    text: 'El documento ingresado ya esta registrado.'
                })
            } else if (data == "FAIL#EMAIL") {
                Swal.fire({
                    icon: 'error',
                    title: 'Ya esta registrado en el sistema!',
                    text: 'El correo ingresado ya esta registrado.'
                })
            } else if (data == "OK#CORRECT#DATA") {
                Swal.fire({
                    icon: 'success',
                    title: 'Exitoso!',
                    text: 'Los datos del usuario han sido registrados.'
                })

                $("#documento").val("");
                $("#nombres").val("");
                $("#apellidos").val("");
                $("#direccion").val("");
                $("#telefono").val("");
                $("#email").val("");
                $("#genero").val("");
                $("#ciudad").val("");

                $("#ciudad").append('<option value="" selected>Seleccione Ciudad</option>');
                $('#ciudad').attr("disabled", true);

                $("#departamento").find('option').removeAttr("selected");
                $("#departamento-vacio").attr("selected", "true");
            }
        })
        .fail(function(data) {
            Swal.fire({
                icon: 'error',
                title: 'Ocurrio algo!',
                text: 'Ha ocurrido un error en el servidor, no se pudo registrar la información.'
            })
            console.log(data);
        });
    }
}
</script>
