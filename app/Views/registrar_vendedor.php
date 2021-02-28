<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>AdminLTE 3 | Registration Page</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('public//plugins/fontawesome-free/css/all.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="<?php echo base_url('public/plugins/icheck-bootstrap/icheck-bootstrap.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('public/dist/css/adminlte.min.css') ?>">

</head>

<body>


    <nav class="navbar navbar-light" style="background-color: #ffe140;">
        <a class="navbar-brand" href="#">
            <img src="<?php echo base_url('public/dist/img/logo.png') ?>" alt="" style="margin-top: -3.5em; margin-bottom: -3.5em;">
        </a>
    </nav>


    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6 mx-auto">

                        <!-- form card login -->
                        <div class="card rounded-0">
                            <div class="card-header">
                                <h3 class="mb-0">Crear Cuenta</h3>
                            </div>
                            <div class="card-body">
                                <form id="formulario_registro" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="documento" placeholder="Documento de Identidad">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-address-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="nombres" placeholder="Nombre">
                                        <div class="input-group-append mr-2">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control" id="apellidos" placeholder="Apellidos">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Correo Electronico">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" id="telefono" placeholder="Telefono">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="direccion"  placeholder="Dirección">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-map-marker-alt"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <select name="genero" id="genero" class="form-control">
                                            <option value="0">Seleccione Genero</option>
                                            <option value="MASCULINO">Masculino</option>
                                            <option value="FEMENINO">Femenino</option>
                                            <option value="OTRO">Otro</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">

                                        <select name="departamento" id="departamento" class="form-control mr-3  ">
                                            <option value="0">Seleccione Departamento</option>

                                            <?php

                                            foreach ($departamentos as $departamentos) { ?>

                                                <option value="<?php echo $departamentos['id'] ?>"><?php echo $departamentos['nombre'] ?></option>

                                            <?php } ?>

                                        </select>


                                        <select name="ciudad" id="ciudad" class="form-control">
                                            <option value="0">Seleccione Ciudad</option>
                                        </select>
                                    </div>


                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" id="password" placeholder="Contraseña">
                                        <div class="input-group-append mr-2">
                                            <div class="input-group-text">
                                                <span class="fas fa-unlock"></span>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control" id="passwordconfirm" placeholder="Confirmar Contraseña">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-12">
                                            <div class="icheck-primary">
                                                <input type="checkbox" id="agreeTerms" name="terms" value="agree">
                                                <label for="agreeTerms">
                                                    Acepto los <a href="#">Terminos y Condiciones</a> y autorizo el uso de mis datos
                                                </label>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="row">
                                        <div class="col-5">
                                            <div class="icheck-primary">

                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-3">
                                            <a type="button" href="<?php echo base_url('Login'); ?>" class="btn btn-secondary btn-block">Ir al login</a>
                                        </div>

                                        <div class="col-4">
                                            <button type="submit" id="insertar" class="btn btn-primary aling-right">Continuar</button>
                                        </div>
                                        <!-- /.col -->
                                    </div>
                                </form>
                            </div>
                            <!--/card-block-->
                        </div>
                        <!-- /form card login -->
                    </div>
                </div>
                <!--/row-->
            </div>
            <!--/col-->
        </div>
        <!--/row-->
    </div>
    <!--/container-->


    <!-- jQuery -->
    <script src="<?php echo base_url('public/plugins/jquery/jquery.min.js') ?>"></script>
    <!-- Bootstrap 4 -->
    <script src="<?php echo base_url('public/plugins/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
    <!-- AdminLTE App -->
    <script src="<?php echo base_url('public/dist/js/adminlte.min.js') ?>"></script>

    <script>
        $(document).ready(iniciar);

        function iniciar() {
            $('#ciudad').attr("disabled", true);
            $('#insertar').attr("disabled", true);


            $("#departamento").on('change', elegirDepartamento);

            $("#formulario_registro").submit(formRegistrarVendedor);

        }

        function elegirDepartamento() {

            let departamento = $(this).val();
            var ciudades = $("#ciudad");

            if (departamento != '0') {

                $('#ciudad').attr("disabled", false);
                $('#insertar').attr("disabled", false);

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


        function formRegistrarVendedor(e) {
            e.preventDefault();

            enviarInfoNuevoVendedor();
        }

        function enviarInfoNuevoVendedor() {

            email = $("#email").val();
            documento = $("#documento").val();
            nombres = $("#nombres").val();
            apellidos = $("#apellidos").val();
            direccion = $("#direccion").val();
            telefono = $("#telefono").val();
            genero = $("#genero").val();
            ciudad = $("#ciudad").val();
            password = $("#password").val();


            if (documento != "" && nombres != "") {
                $.ajax({
                        url: '<?php echo base_url('/Inicio/insertarVendedor'); ?>',
                        type: "POST",
                        dataType: "text",
                        data: {
                            email: email,
                            password: password,
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

                            alert("El documento ingresado ya existe...");

                        } else if (data == "FAIL#EMAIL") {

                            alert("El email ingresado ya existe...");

                        } else if (data == "OK#CORRECT#DATA") {
                            contentDatosDeExtras();
                        }
                    })
                    .fail(function(data) {
                        alert("error en el proceso");
                        console.log(data);
                    });
            }
        }


        function contentDatosDeExtras(){
            $('#formulario_registro').hide();
            

        }
    </script>

</body>

</html>