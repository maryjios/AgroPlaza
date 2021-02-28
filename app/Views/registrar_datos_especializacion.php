<!DOCTYPE html>
<html>

<!-- aqui estoy dandole al codigo people ya casi terminada esta parte :v -->
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
                                <h3 class="mb-0">Completá los siguientes datos</h3>
                            </div>
                            <div class="card-body">
                                <form id="formulario_registro" class="" method="post" autocomplete="off">
                                    <label>¿Que quieres vender?</label>


                                    <div class="row">
                                        <div class="col-3">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Productos
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->
                                        <div class="col-4">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Servicios
                                                </label>
                                            </div>
                                        </div>

                                        <div class="col-5">
                                            <div class="form-check">
                                                <input class="form-check-input" type="checkbox" value="" id="defaultCheck1">
                                                <label class="form-check-label" for="defaultCheck1">
                                                    Productos y Servicios
                                                </label>
                                            </div>
                                        </div>
                                        <!-- /.col -->

                                    </div>

                                    <div class="row mt-5">
                                        <label class="ml-2">Descripción:</label>
                                        <textarea class="form-control bg-light" name="descricion" id="descricion" class="" cols="30" rows="4" placeholder="Cuentanos a que te dedicas..."></textarea>
                                    </div>

                                    <br>

                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="exampleInputFile">
                                        <label class="custom-file-label"  for="exampleInputFile">Subir targeta profesional</label>
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


    <script src="<?php echo base_url('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>

    <!-- <script>
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


        function contentDatosDeExtras() {
            $('#formulario_registro').hide();


        }
    </script> -->

    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>