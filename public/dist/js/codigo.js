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
      url: base_url+"/InsertAdmin",
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
      .done(function (data) {
        if (data == "OK#CORRECT#DATA") {
          alert("Registro Existoso");
          $("#documento").val("");
          $("#nombres").val("");
          $("#apellidos").val("");
          $("#direccion").val("");
          $("#telefono").val("");
          $("#email").val("");
          $("#genero").val("");
        } else{
          alert("Ocurrio un erorr en el insert");
        }
      })
      .fail(function (data) {
        console.log("error en el proceso");
        console.log(data);
      });
  }
}
