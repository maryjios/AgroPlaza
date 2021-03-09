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
        <a class="navbar-brand" href="<?php echo base_url() ?>">
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
                                <form id="formulario_registro" enctype="multipart/form-data" method="post">
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="documento" id="documento" placeholder="Documento de Identidad">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-address-card"></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="nombres" id="nombres" placeholder="Nombre">
                                        <div class="input-group-append mr-2">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>

                                        <input type="text" class="form-control" name="apellidos" id="apellidos" placeholder="Apellidos">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-user"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="email" class="form-control" name="email" id="email" placeholder="Correo Electronico">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-envelope"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="number" class="form-control" name="telefono" id="telefono" placeholder="Telefono">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-phone"></span>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="input-group mb-3">
                                        <input type="text" class="form-control" name="direccion" id="direccion" placeholder="Dirección">
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
                                            <option value="OTROS">Otro</option>
                                        </select>
                                    </div>

                                    <div class="input-group mb-3">

                                        <select name="departamento" id="departamento" class="form-control mr-3  ">
                                            <option value="">Seleccione Departamento</option>

                                            <?php

                                            foreach ($departamentos as $departamentos) { ?>

                                                <option value="<?php echo $departamentos['id'] ?>"><?php echo $departamentos['nombre'] ?></option>

                                            <?php } ?>

                                        </select>


                                        <select name="ciudad" id="ciudad" class="form-control">
                                            <option value="">Seleccione Ciudad</option>
                                        </select>
                                    </div>


                                    <div class="input-group mb-3">
                                        <input type="password" class="form-control" id="password" name="password" placeholder="Contraseña">
                                        <div class="input-group-append mr-2">
                                            <div class="input-group-text">
                                                <span class="fas fa-unlock"></span>
                                            </div>
                                        </div>

                                        <input type="password" class="form-control" id="passwordconfirm" placeholder="Confirmar Contraseña">
                                        <div class="input-group-append">
                                            <div class="input-group-text">
                                                <span class="fas fa-lock"></span>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="text-center mt-4">
                                        <label>¿Que quieres vender?</label>
                                    </div>

                                    <div class="row text-center mb-5">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input radio" name="loQueVaAVender" type="radio" value="Productos">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Productos
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input radio" name="loQueVaAVender" type="radio" value="Servicios">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Servicios
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="form-check text-left">
                                                <input class="form-check-input radio    " name="loQueVaAVender" type="radio" value="Productos y Servicios">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Productos y Servicios
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                    </div>

                                    <div id="datosEspecialista" class="mb-4 mt-2">

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
                                            <a type="button" href="<?php echo base_url(); ?>" class="btn btn-secondary btn-block">Ir al login</a>
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

    <!-- Custument input -->
    <script src="<?php echo base_url('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>



    <script>
        $(document).ready(iniciar);

        function iniciar() {


            $('#ciudad').attr("disabled", true);

            $("#departamento").on('change', elegirDepartamento);

            $("#formulario_registro").submit(formRegistrarVendedor);

            $("input[name='loQueVaAVender']").on('click', mostrarInputFile);

            preview();

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


        function mostrarInputFile() {
            valor_seleccionado = $("input[name='loQueVaAVender']:checked").val();

            if (valor_seleccionado != 'Productos' && valor_seleccionado != undefined) {

                datos = `<div class="row mt-5" id="divProfesion">
                                        <label class="ml-2">Profesion:</label><br>
                                        <input type="text" class="form-control" name="n_especializacion" id="n_especializacion"></textarea>
                                    </div>

                                    <div class="row mt-5">
                                        <label class="ml-2">Descripción:</label>
                                        <textarea class="form-control bg-light" name="descripcion" id="descripcion" class="" cols="30" rows="4" placeholder="Cuentanos mas de ti..."></textarea>
                                    </div>

                                    <br>
                                    <div>
                                        <input type="file" class="form-control" id="certificado" name="foto_certificado" accept="image/*">
                                        <br>
                                        <br>
                                        <img id="frame" src="" width="100px" height="100px"/>
                                        <p class="text-danger">El formato de la imagen debe ser jpg, png o jpeg</p>
                                    </div>
                                   `;

                //    <div class="col-12 custom-file" id="divInputFile">
                //         <input type="file" class="custom-file-input" id="certificado">
                //         <label class="custom-file-label" for="exampleInputFile" data-browse="📁 Seleccionar Archivo">Ningun archivo seleccionado...</label>
                //     </div>

                $('#datosEspecialista').html(datos);
                $('#datosEspecialista').show();
                $('#frame').hide();
                $('#certificado').on('change', preview);

            } else {
                $('#datosEspecialista').hide();

            }
        }

        function preview() {
            $('#frame').show();
            frame.src = URL.createObjectURL(event.target.files[0]);
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
            certificado = $("#certificado").val();


            if (documento != "" && nombres != "" && apellidos != "" && email != "" && direccion != "" && genero != "" && ciudad != "" && password != "") {

                var datos_formulario = new FormData($('#formulario_registro')[0]);

                $.ajax({
                        url: '<?php echo base_url('/Inicio/InsertarVendedor'); ?>',
                        type: "POST",
                        dataType: "text",
                        data: datos_formulario,
                        contentType: false,
                        processData: false
                    })
                    .done(function(data) {

                        console.log(data);
                        if (data == "FAIL#DOCUMENTO") {

                            alert("El documento ingresado ya existe...");

                        } else if (data == "FAIL#EMAIL") {

                            alert("El email ingresado ya existe...");

                        } else if (data == "OK#CORRECT#DATA") {
                            
                            alert("DEBES ESPERAR TU VALIDACION")

                        } else if (data == "OK#INVALID#DATA") {

                            alert("Ocurrio un error al insertar la información en el servidor...");

                        } else if ("ERROR#TIPO#INCORRECTO") {

                            alert("Por favor ingrese un formato valido para la imagen...");

                        } else if ("ERROR#SUBIENDO#CERTIFICADO") {

                            alert("Se ha presentado un error al subir la foto, intentalo de nuevo.");
                        }
                    })
                    .fail(function(data) {
                        alert("error en el proceso");
                        console.log(data);
                    });
            } else {

                alert('todos los campos son oblicatorios')
            }
        }
    </script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>