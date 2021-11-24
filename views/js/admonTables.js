posicionarMenu();

$(window).scroll(function () {
  posicionarMenu();
});

function posicionarMenu() {
  var altura_del_header = $(".page-header").outerHeight(true);
  var altura_del_menu = $(".filterParams").outerHeight(true);

  if ($(window).scrollTop() >= 500) {
    $(".filterParams").addClass("fixed");
    $(".dataParams").css("margin-top", altura_del_menu + "px");
  } else {
    $(".filterParams").removeClass("fixed");
    $(".dataParams").css("margin-top", "0");
  }
}
/***USUARIOS CRUD */
function cargarUsuarios() {
  listaUsuarios = $(".tablaUsuarios").DataTable({
    ajax: "ajax/tablaUsuariosSistema.ajax.php",
    deferRender: true,
    retrieve: true,
    processing: true,
    iDisplayLength: 10,
    fixedHeader: true,
    order: [[0, "desc"]],
    /*"scrollX": true,*/
    lengthMenu: [
      [10, 25, 50, 100, 150, 200, 300, -1],
      [10, 25, 50, 100, 150, 200, 300, "All"],
    ],
    language: {
      sProcessing: "Procesando...",
      sLengthMenu: "Mostrar _MENU_ registros",
      sZeroRecords: "No se encontraron resultados",
      sEmptyTable: "Ningún dato disponible en esta tabla",
      sInfo: "Mostrando registros del _START_ al _END_ de un total de _TOTAL_",
      sInfoEmpty: "Mostrando registros del 0 al 0 de un total de 0",
      sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
      sInfoPostFix: "",
      sSearch: "Buscar:",
      sUrl: "",
      sInfoThousands: ",",
      sLoadingRecords: "Cargando...",
      oPaginate: {
        sFirst: "Primero",
        sLast: "Último",
        sNext: "Siguiente",
        sPrevious: "Anterior",
      },
      oAria: {
        sSortAscending:
          ": Activar para ordenar la columna de manera ascendente",
        sSortDescending:
          ": Activar para ordenar la columna de manera descendente",
      },
    },
  });
}
/*=============================================
ACTIVAR
=============================================*/

$(".tablaUsuarios").on("click", ".btnActivar", function () {
  var idUsuario = $(this).attr("idUsuario");
  var estadoUsuario = $(this).attr("estado");

  var datos = new FormData();
  datos.append("activarId", idUsuario);
  datos.append("estadoUsuario", estadoUsuario);

  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {},
  });

  if (estadoUsuario == 1) {
    $(this).addClass("btn-success");
    $(this).removeClass("btn-danger");
    $(this).html("Activado");
    $(this).attr("estado", 0);
  } else {
    $(this).removeClass("btn-success");
    $(this).addClass("btn-danger");
    $(this).html("Desactivado");
    $(this).attr("estado", 1);
  }
});
/*REGISTRO NUEVO USUARIO */
$(function () {
  /**ENVIO DE FORMULARIO DE REGISTRO */
  $("#formRegistroUsuario").on("submit", function (e) {
    e.preventDefault();
    var nombreUsuario = $("#nameUserCreate").val();
    var emailUsuario = $("#emailUserCreate").val();
    var grupoUsuario = $("#groupUserCreate").val();
    var perfilUsuario = $("#perfilUserCreate").val();

    var formData = new FormData();
    formData.append("nombreUsuario", nombreUsuario);
    formData.append("emailUsuario", emailUsuario);
    formData.append("grupoUsuario", grupoUsuario);
    formData.append("perfilUsuario", perfilUsuario);
    formData.append("accionUser", "create");

    $.ajax({
      url: "ajax/admonFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(".msg").html(
          "<center><img src='views/images/ajax-loader.gif' /></center>"
        );
      },
    })
      .done(function (res) {
        var response = res.replace(/['"]+/g, "");

        if (response == "ok") {
          $(".msg").html(
            "<div class='alert alert-success'>Registro de Usuario exitoso!</div>"
          );
          $("#formRegistroUsuario").trigger("reset");

          setTimeout(function () {
            $("#registroUsuario").modal("hide");
            $(".msg").html("");
            listaUsuarios.ajax.reload();
          }, 2000);
        } else if (response == "existe") {
          $(".msg").html(
            "<div class='alert alert-danger'>Existe un usuario registrado con ese correo</div>"
          );
        } else {
          $(".msg").html(
            "<div class='alert alert-danger'>Tuvimos problemas al registrar al usuario, comunicate con el administrador</div>"
          );
          setTimeout(function () {
            $("#registroUsuario").modal("hide");
            $(".msg").html("");
          }, 1000);
        }
      })
      .fail(function (res) {
        $(".msg").html(
          "<div class='alert alert-danger'>Tuvimos problemas al registrar al usuario, comunicate con el administrador</div>"
        );
      });
  });
  /***ENVIO DE FORMULARIO DE ACTUALIZACION */
  $("#formActualizarUsuario").on("submit", function (e) {
    e.preventDefault();
    var nombreUsuario = $("#nameUserEdit").val();
    var grupoUsuario = $("#groupUserEdit").val();
    var perfilUsuario = $("#perfilUserEdit").val();
    var idUsuario = $("#idUserEdit").val();

    var formData = new FormData();
    formData.append("nombreUsuario", nombreUsuario);
    formData.append("grupoUsuario", grupoUsuario);
    formData.append("perfilUsuario", perfilUsuario);
    formData.append("idUsuarioEdit", idUsuario);

    $.ajax({
      url: "ajax/admonFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(".msg").html(
          "<center><img src='views/images/ajax-loader.gif' /></center>"
        );
      },
    })
      .done(function (res) {
        var response = res.replace(/['"]+/g, "");
        if (response == "ok") {
          $(".msg").html(
            "<div class='alert alert-success'>Actualizacion de datos exitoso!</div>"
          );
          $("#formActualizarUsuario").trigger("reset");
          setTimeout(function () {
            $("#edicionUsuario").modal("hide");
            $(".msg").html("");
            listaUsuarios.ajax.reload();
          }, 1000);
        } else {
          $(".msg").html(
            "<div class='alert alert-danger'>Tuvimos problemas al actualizar los datos del usuario, comunicate con el administrador</div>"
          );
        }
      })
      .fail(function (res) {
        $(".msg").html(
          "<div class='alert alert-danger'>Tuvimos problemas al actualizar los datos del usuario, comunicate con el administrador</div>"
        );
      });
  });
  /***ACTUALIZAR CONTRASEÑA */
  $("#formActualizarPassword").on("submit", function (e) {
    e.preventDefault();
    var password = $("#passwordUser").val();
    var idUsuario = $("#userId").val();

    var formData = new FormData();
    formData.append("passwordUsuario", password);
    formData.append("idUsuarioUpdate", idUsuario);

    $.ajax({
      url: "ajax/admonFunctions.ajax.php",
      type: "post",
      dataType: "json",
      data: formData,
      cache: false,
      contentType: false,
      processData: false,
      beforeSend: function () {
        $(".msg").html(
          "<center><img src='views/images/ajax-loader.gif' /></center>"
        );
      },
    })
      .done(function (res) {
        var response = res.replace(/['"]+/g, "");
        if (response == "ok") {
          $(".msg").html(
            "<div class='alert alert-success'>Contraseña actualizada exitosamente!</div>"
          );

          setTimeout(function () {
            $(".msg").html("");
          }, 1000);
        } else if (response == "exist") {
          $(".msg").html(
            "<div class='alert alert-danger'>La contraseña es igual a la anterior</div>"
          );
        }
      })
      .fail(function (res) {
        $(".msg").html(
          "<div class='alert alert-danger'>Tuvimos problemas al actualizar la contraseña, comunicate con el administrador</div>"
        );
      });
  });
});
/**BUSCAR DATOS USUARIO */
function obtenerDatosUsuario(id) {
  var datos = new FormData();
  datos.append("idUsuario", id);

  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      var datos = JSON.parse(respuesta);

      $("#edicionUsuario").modal("show");
      $("#nameUserEdit").val(datos["nombre"]);
      $("#emailUserEdit").val(datos["email"]);
      $("#groupUserEdit").val(datos["grupo"]);
      $("#perfilUserEdit").val(datos["perfil"]);
      $("#idUserEdit").val(datos["id"]);
    },
  });
}

function miPerfil(id) {
  var datos = new FormData();
  datos.append("idUsuario", id);

  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      var datos = JSON.parse(respuesta);

      $("#nameUser").val(datos["nombre"]);
      $("#emailUser").val(datos["email"]);
    },
  });
}
/**ELIMINAR USUARIO */
function eliminarUsuario(id) {
  var datos = new FormData();
  datos.append("idUsuarioDelete", id);
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      var response = respuesta.replace(/['"]+/g, "");
      if (response == "ok") {
        listaUsuarios.ajax.reload();
        Swal.fire({
          icon: "success",
          title: "Usuario eliminado exitosamente",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          icon: "danger",
          title: "El usuario no pudo ser eliminado",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
  });
}
