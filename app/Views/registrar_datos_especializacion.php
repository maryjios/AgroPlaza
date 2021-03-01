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
                                <form id="formularioDatosCertificacion" enctype="multipart/form-data" method="post" autocomplete="off">

                                    <input type="hidden" id="id" value="<?php echo $vendedor ?>">

                                    <div class="text-center">
                                        <label>¿Que quieres vender?</label>
                                    </div>

                                    <div class="row text-center">
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


                                    <div class="row mt-5" id="divProfesion">
                                        <label class="ml-2">Profesion:</label><br>
                                        <input type="text" class="form-control" name="n_especializacion" id="n_especializacion"></textarea>
                                    </div>

                                    <div class="row mt-5">
                                        <label class="ml-2">Descripción:</label>
                                        <textarea class="form-control bg-light" name="descripcion" id="descripcion" class="" cols="30" rows="4" placeholder="Cuentanos mas de ti..."></textarea>
                                    </div>

                                    <br>

                                    <div class="col-12 custom-file" id="divInputFile">
                                        <input type="file" class="custom-file-input" id="certificado">
                                        <label class="custom-file-label" for="exampleInputFile" data-browse="📁 Seleccionar Archivo">Ningun archivo seleccionado...</label>
                                    </div>

                                    <button type="submit" id="insertar" class="btn btn-primary float-right mt-4">Completar Registro</button>

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

    <!-- AdminLTE input file custom -->
    <script src="<?php echo base_url('public/plugins/bs-custom-file-input/bs-custom-file-input.min.js') ?>"></script>


    <script>
        $(document).ready(iniciar);

        function iniciar() {
            $('#datosEspecialista').hide();

            $("input[name='loQueVaAVender']").on('click', mostrarInputFile);

            $("#formularioDatosCertificacion").submit(CompletarRegistroVendedor);
        }


        function mostrarInputFile() {
            valor_seleccionado = $("input[name='loQueVaAVender']:checked").val();

            if (valor_seleccionado != 'Productos' && valor_seleccionado != undefined) {
                $('#divInputFile').slideDown();
            } else {
                $('#divInputFile').slideUp();

            }
        }

        function CompletarRegistroVendedor(e) {
            e.preventDefault();

            id = $("#id").val();
            documento = $("#documento").val();
            n_especializacion = $("#n_especializacion").val();
            descripcion = $("#descripcion").val();
            certificado = $("#certificado").val();

        }
    </script>

    <script type="text/javascript">
        $(document).ready(function() {
            bsCustomFileInput.init();
        });
    </script>
</body>

</html>