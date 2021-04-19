<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h2 class="card-title"><b>Lista de pedidos Solicitados</b></h2>
              <div class="d-grid d-md-flex  justify-content-md-end">
                <div class="btn-group col-2" role="group">
                  <button id="btnGroupDrop1" type="button" class="btn dropdown-toggle form-control  bg-warning" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    Solicitados
                  </button>
                  <div class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                    <a class="dropdown-item" href="<?php echo base_url('ModuloPedidos/PedidosEnProceso') ?>">En proceso</a>
                    <a class="dropdown-item" href="<?php echo base_url('ModuloPedidos/PedidosEntregados') ?>">Entregados</a>
                  </div>
                </div>
              </div>
            </div>
            <div class="card-body" id="actualizar">
              <table id="pedidos" class="table table-bordered table-striped">
                <thead>
                  <tr>
                    <th>Id</th>
                    <th>Producto</th>
                    <th>Precio $</th>
                    <th>Cantidad</th>
                    <th>Valor envio $</th>
                    <th>Comprador</th>
                    <th>Fecha de pedido</th>
                    <th>Estado</th>
                    <th>Acciones</th>
                  </tr>
                </thead>
                <tbody id="lista">

                  <?php foreach ($pedidos as $pedido) : ?>
                    <tr>
                      <td class="id"><?php echo $pedido['id'] ?></td>
                      <td class="titulo"><?php echo $pedido['titulo'] ?></td>
                      <td class="valor_total"> <?php echo number_format($pedido['precio'])  ?></td>
                      <td class="cantidad"><?php echo $pedido['cantidad'] ?></td>
                      <td class="valor_envio">
                        <form method="post">
                          <input type="number" class="form-control col-7 v_envio" value="<?php echo $pedido['valor_envio'] ?>" <?php echo ($_SESSION['tipo_usuario'] == "ADMINISTRADOR") ? "disabled" : ""; ?>>
                        </form>
                      </td>
                      <td class="nombre_usuario"><?php echo $pedido['nombre_usuario'] ?></td>
                      <td class="fecha_insert"><?php echo $pedido['fecha_insert'] ?></td>
                      <td class="estado"><?php echo $pedido['estado_pedido'] ?></td>
                      <td>
                        <button type="button" class="btn btn-success detalle">
                          <i class="far fa-eye"></i>
                        </button>
                        <?php if ($_SESSION['tipo_usuario'] != "ADMINISTRADOR") { ?>
                          <div class="btn-group">
                            <button type="button" class="btn btn-warning">Pasar a:</button>
                            <button type="button" class="btn btn-warning dropdown-toggle dropdown-icon" data-toggle="dropdown" aria-expanded="false">
                              <span class="sr-only">Toggle Dropdown</span>
                            </button>
                            <div class="dropdown-menu" role="menu">
                              <button class="dropdown-item proceso">En proceso </button>
                              <button class="dropdown-item cancelado">Cancelado</button>
                            </div>
                          </div>
                          <button type="button" class="btn btn-info abrir_chat">
                            <i class="far fa-comments"></i>
                            <span class="badge badge-danger navbar-badge mensajes_nuevos"></span>
                          </button>
                        <?php } ?>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div><!-- /.content-header -->
</div>

<!-- Modal detalle pedido -->
<div class="modal fade" id="detalle_pedido">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pedido</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <div class="row">
            <div class="col text-center img-thumbnail">
              <h5 id="titulo"></h5>
              <img id="img_producto" src="" class="rounded img-size-50 mr-2">
            </div>
          </div>
          <div class="row mt-2">
            <div class="col img-thumbnail">
              <div class="position-relative rounded p-3 bg-success" style="height: 280px">
                <div class="ribbon-wrapper">
                  <div class="ribbon bg-primary">
                    +
                  </div>
                </div>
                <h6>Cantidad: <span id="cantidad"></span></h6>
                <h6>Precio producto: <span id="valor_compra"></span></h6>
                <hr>
                <h6>Subtotal:  <span id="valor_subtotal"></span></h6>
                <h6>Envio:  <span id="valor_envio"></span></h6>
                <h6>Descuento:  <span id="descuento"></span></h6>
                <hr>
                <h6>Total:  <span id="total"></span></h6>
                <hr>
                <h6>Comprador: <span id="comprador"></span></h6>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- Modal chat pedido -->
<div class="modal fade" id="chat_pedido">
  <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Chat (Pedido #<span id="id_pedido_chat"></span>)</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="container-fluid">
          <!-- chat -->
          <div class="card direct-chat direct-chat-primary" id="div_chat">
            <div class="card-header ui-sortable-handle" style="cursor: move;">
              <h3 class="card-title" id="nombre_cliente">Chat</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body" style="display: block;">
              <!-- Conversations are loaded here -->
              <div class="direct-chat-messages">

              </div>
              <!--/.direct-chat-messages-->
            </div>
            <!-- /.card-body -->
            <div class="card-footer" style="display: block;">
              <form action="#" method="post" id="enviar_msg_chat" autocomplete="off">
                <div class="input-group">
                  <input type="text" id="mensaje_chat" name="message" placeholder="Escribir mensaje ..." class="form-control">
                  <span class="input-group-append">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                  </span>
                </div>
              </form>
              <!-- /.card-footer-->
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  var WebSocket_URL;
  var client;

  $(document).ready(iniciar);

  function iniciar() {
    $('#pedidos').DataTable({
      "language": {
        "url": "//cdn.datatables.net/plug-ins/1.10.22/i18n/Spanish.json"
      },
      "responsive": true,
      "autoWidth": false,
      "ordering": true,
      "aoColumnDefs": [{
          'bSortable': false,
          'aTargets': [7]
        },
        {
          'bSortable': false,
          'aTargets': [8]
        }
      ],
    });

    $('.detalle').click(verPedido);
    $(".proceso").click(pasar_a_proceso);
    $(".cancelado").click(pasar_a_cancelado);
    $(".v_envio").blur(editarEnvio);
    $(".abrir_chat").click(abrirChat);
    $("#enviar_msg_chat").submit(guardarMensajeServidor);
  }

  function abrirChat() {
    $("#chat_pedido").modal("show");
    $("#nombre_cliente").html($(this).parents("tr").find(".nombre_usuario").html());
    $("#id_pedido_chat").html($(this).parents("tr").find(".id").html());
    $("#mensaje_chat").val("");
    $("#mensaje_chat").focus();

    $(".direct-chat-messages").html("");

    cargarMensajes();
  }

  function cargarMensajes() {
    id_pedido = $("#id_pedido_chat").html();

    $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/CargarMensajesChat'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
          pedido: id_pedido
        },
      })
      .done(function(data) {
        console.log(data)
        id_sesion = <?php echo $_SESSION["id"]; ?>;
        alert(id_sesion + "");

        $(data).each(function(i, v) {
          if (id_sesion == v.id_usuario) {
            contenedor_msg = "right";
            posicion_fecha = "left";
          } else {
            contenedor_msg = "left";
            posicion_fecha = "right";
          }

          usuario = v.nombre + " " + v.apellido;

          textHtml = '<div class="direct-chat-msg ' + contenedor_msg + '">';
          textHtml += '<div class="direct-chat-infos clearfix">'
          textHtml += '<span class="direct-chat-name float-' + contenedor_msg + '">' + usuario + '</span>';
          textHtml += '<span class="direct-chat-timestamp float-' + posicion_fecha + '">' + v.fecha + '</span>';
          textHtml += '</div>';
          textHtml += '<img class="direct-chat-img" src="<?php echo base_url('public/dist/img/avatar') . '/'; ?>' + v.avatar + '" alt="avatar">';
          textHtml += '<div class="direct-chat-text">';
          textHtml += v.mensaje;
          textHtml += '</div>';
          textHtml += '</div>';

          $(".direct-chat-messages").append(textHtml);
        })
      })
      .fail(function(data) {
        console.log(data);

        alert("Ha ocurrido una falla en el servidor")
      })
      .always(function() {
        console.log("complete");
        conexionMqtt();
      });
  }

  function conexionMqtt() {
    // Opciones de coneccion
    const options = {
      connectTimeout: 10000,
      clienteId: "<?php echo 'user_id_' . $_SESSION['id'] ?>",
      keepalive: 60,
      clean: true,
    }

    // WebSocket connect url
    WebSocket_URL = 'ws://18.221.49.32:8083/mqtt';
    client = mqtt.connect(WebSocket_URL, options);

    id_pedido = $("#id_pedido_chat").html();

    client.on('connect', () => {
      console.log('MQTT conectado por Web Socket. Exitoso!');
      // Suscripcion
      client.subscribe('chat_pedido_' + id_pedido, {
        qos: 0
      }, (error) => {
        if (!error) {
          console.log('Suscripcion Exitosa');
        } else {
          console.log('Falla en la Suscripcion');
        }
      });
    });

    client.on('message', (topic, message) => {

      var result = "";
      for (var i = 0; i < message.length; i++) {
        //console.log ("Convirtiendo: "+message[i]+" en -> "+String.fromCharCode(message[i]))
        result += String.fromCharCode(message[i]);
      }
      //console.log(result);
      datosMessage = JSON.parse(result);
      if (topic == ('chat_pedido_' + id_pedido) && datosMessage.id != "<?php echo $_SESSION["id"]; ?>") {

        textHtml = '<div class="direct-chat-msg">';
        textHtml += '<div class="direct-chat-infos clearfix">'
        textHtml += '<span class="direct-chat-name float-left">' + datosMessage.usuario + '</span>';
        textHtml += '<span class="direct-chat-timestamp float-right">' + datosMessage.fecha.split(' ')[1] + '</span>';
        textHtml += '</div>';
        textHtml += '<img class="direct-chat-img" src="<?php echo base_url('public/dist/img/avatar') . '/'; ?>' + datosMessage.avatar + '" alt="avatar">';
        textHtml += '<div class="direct-chat-text">';
        textHtml += decodeURIComponent(escape(datosMessage.mensaje));
        textHtml += '</div>';
        textHtml += '</div>';
        $(".direct-chat-messages").append(textHtml);

        $('.direct-chat-messages').scrollTop($('.direct-chat-messages').prop('scrollHeight'));
      }
    });
  }

  function guardarMensajeServidor(e) {
    e.preventDefault();

    mensaje = $("#mensaje_chat").val();

    if (mensaje != "") {
      var fechaActual = new Date();
      usuario = "<?php echo explode(" ", $_SESSION["nombres"])[0] . " " . explode(" ", $_SESSION["apellidos"])[0]; ?>";
      fecha = fechaActual.getFullYear() + "-" + ((fechaActual.getMonth() < 10) ? "0" : "") + fechaActual.getMonth() + "-" + ((fechaActual.getDay() < 10) ? "0" : "") + fechaActual.getDay() + " " + ((fechaActual.getHours() < 10) ? "0" : "") + fechaActual.getHours() + ":" + ((fechaActual.getMinutes() < 10) ? "0" : "") + fechaActual.getMinutes() + ":" + ((fechaActual.getSeconds() < 10) ? "0" : "") + fechaActual.getSeconds();
      id = "<?php echo $_SESSION["id"]; ?>";
      avatar = "<?php echo $_SESSION["avatar"]; ?>";
      datos = {
        'id': id,
        'usuario': usuario,
        'mensaje': mensaje,
        'fecha': fecha,
        'avatar': avatar
      };

      pedido = $("#id_pedido_chat").html();

      $.ajax({
          url: '<?php echo base_url('/ModuloPedidos/GuardarMensajeChat'); ?>',
          type: 'POST',
          dataType: 'json',
          data: {
            pedido: pedido,
            usuario: id,
            mensaje: mensaje
          },
        })
        .done(function(data) {
          console.log(data);

          if (data == "OK##INSERT##CHAT") {
            textHtml = '<div class="direct-chat-msg right">';
            textHtml += '<div class="direct-chat-infos clearfix">'
            textHtml += '<span class="direct-chat-name float-right">' + usuario + '</span>';
            textHtml += '<span class="direct-chat-timestamp float-left">' + fecha.split(' ')[1] + '</span>';
            textHtml += '</div>';
            textHtml += '<img class="direct-chat-img" src="<?php echo base_url('public/dist/img/avatar') . '/' . $_SESSION["avatar"]; ?>" alt="avatar">';
            textHtml += '<div class="direct-chat-text">';
            textHtml += mensaje;
            textHtml += '</div>';
            textHtml += '</div>';
            $(".direct-chat-messages").append(textHtml);

            $('.direct-chat-messages').scrollTop($('.direct-chat-messages').prop('scrollHeight'));

            enviarMensajeMQTT(datos, pedido);
          } else {
            alert("Ha ocurrido un error al guardar el mensaje")
          }
        })
        .fail(function(data) {
          console.log(data);

          alert("Ha ocurrido una falla en el servidor")
        })
        .always(function() {
          console.log("complete");
        });
    }

  }

  function enviarMensajeMQTT(datos, id_pedido) {
    client.publish('chat_pedido_' + id_pedido, JSON.stringify(datos), (error) => {
      console.log(error || 'Mensaje enviado a Broker MQTT.');
      if (!error) {
        $("#mensaje_chat").val("");
      }
    });
  }

  function verPedido() {
    $("#detalle_pedido").modal("show");
    var id = $(this).parents("tr").find(".id").text();
    $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/DetallePedido'); ?>',
        type: 'POST',
        dataType: 'json',
        data: {
          id: id
        },
      })
      .done(function(data) {
        console.log(data);
        const formatterPeso = new Intl.NumberFormat('en-US', {
              style: 'currency',
              currency: 'USD',
              minimumFractionDigits: 0
            })
        for (var i = 0; i < data.length; i++) {
          img = '<?php echo base_url('public/dist/img/publicaciones/') . '/publicacion' ?>' + data[i].id_publicacion + "/" + data[i].imagen;
          $("#img_producto").attr('src', img);
          $("#titulo").text(data[i].titulo);
          $("#cantidad").text(data[i].cantidad);
          $("#valor_compra").text(formatterPeso.format(data[i].precio));
          $("#valor_envio").text(formatterPeso.format(data[i].valor_envio));
          subtotal = (data[i].cantidad * data[i].precio);
          $("#valor_subtotal").text(formatterPeso.format(subtotal));
          descuento = (parseInt(data[i].descuento) / 100) * parseInt(subtotal);
          total = (subtotal + parseInt(data[i].valor_envio)) - descuento;
          $("#descuento").text(formatterPeso.format(descuento));
          $("#total").text(formatterPeso.format(total));
          $("#comprador").text(data[i].nombre_usuario);
        }
      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
  }

  function pasar_a_proceso() {
    $(this).parents('tr').attr('id', 'en_proceso');
    var id = $(this).parents("tr").find(".id").text();
    rowId = $(this).parents("tr").attr('id');
    $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/PasarEnProceso'); ?>',
        type: 'POST',
        dataType: 'text',
        data: {
          id: id
        },
      }).done(function(data) {

        if (data.trim() == "Ok") {
          $("#pedidos").DataTable().rows($("#" + rowId)).remove();
          $("#pedidos").DataTable().search("").columns().search("").draw();
        } else {
          alert("No se pudo pasar a 'en proceso', el registro");
        }

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });
  }

  function pasar_a_cancelado() {
    $(this).parents('tr').attr('id', 'en_cancelado');
    var id = $(this).parents("tr").find(".id").text();
    rowId = $(this).parents("tr").attr('id');
    $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/PasarCancelado'); ?>',
        type: 'POST',
        dataType: 'text',
        data: {
          id: id
        },
      }).done(function(data) {

        if (data.trim() == "Ok") {
          $("#pedidos").DataTable().rows($("#" + rowId)).remove();
          $("#pedidos").DataTable().search("").columns().search("").draw();
        } else {
          alert("No se pudo pasar a 'cancelado', el registro");
        }

      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

  }


  function editarEnvio() {
    id = $(this).parents("tr").find(".id").text();
    nuevo_costo = $(this).parents("tr").find(".v_envio").val();
    $.ajax({
        url: '<?php echo base_url('/ModuloPedidos/EditarPedidos'); ?>',
        type: 'POST',
        dataType: 'text',
        data: {
          id: id,
          nuevo_costo: nuevo_costo
        },
      })
      .done(function(data) {
        Swal.fire({
          text: "Se ha modificado el costo de envio del pedido",
          icon: 'success',
          confirmButtonColor: '#3085d6',
          confirmButtonText: 'Aceptar',

        })


      })
      .fail(function() {
        console.log("error");
      })
      .always(function() {
        console.log("complete");
      });

  }
</script>