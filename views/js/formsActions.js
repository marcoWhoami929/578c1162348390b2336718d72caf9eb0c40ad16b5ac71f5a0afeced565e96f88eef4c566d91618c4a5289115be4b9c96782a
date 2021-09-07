/*REGISTRO NUEVO CONCEPTOS */
$(function () {
  /**ENVIO DE FORMULARIO DE REGISTRO */
  $("#formRegistroConcepto").on("submit", function (e) {
    e.preventDefault();
    var nombreAgente = $("#nombreAgenteRegistro").val();
    var centroTrabajo = $("#nombreCentroTrabajoRegistro").val();
    var canalComercial = $("#nombreCanalComercialRegistro").val();
    var empresa = $("#empresaRegistro").val();

    var formData = new FormData();
    formData.append("nombreAgente", nombreAgente.toUpperCase());
    formData.append("centroTrabajo", centroTrabajo.toUpperCase());
    formData.append("canalComercial", canalComercial.toUpperCase());
    formData.append("empresa", empresa);

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
        $(".msg").html(res);
        var response = res.replace(/['"]+/g, "");

        if (response == "ok") {
          $(".msg").html(
            "<div class='alert alert-success'>Registro de concepto exitoso!</div>"
          );
          $("#formRegistroConcepto").trigger("reset");

          setTimeout(function () {
            $("#registroConcepto").modal("hide");
            $(".msg").html("");
            if (empresa == "PINTURAS") {
              cargarConceptosPinturas(1);
            } else {
              cargarConceptosFlex(1);
            }
          }, 2000);
        } else {
          $(".msg").html(
            "<div class='alert alert-danger'>Tuvimos problemas al registrar el concepto, comunicate con el administrador</div>"
          );
          setTimeout(function () {
            $("#edicionConcepto").modal("hide");
            $(".msg").html("");
          }, 2000);
        }
      })
      .fail(function (res) {
        $(".msg").html(
          "<div class='alert alert-danger'>Tuvimos problemas al registrar el concepto, comunicate con el administrador</div>"
        );
      });
  });
  /***ENVIO DE FORMULARIO DE ACTUALIZACION */
  $("#formActualizarConcepto").on("submit", function (e) {
    e.preventDefault();
    var idConcepto = $("#idConcepto").val();
    var nombreAgente = $("#nombreAgente").val();
    var centroTrabajo = $("#nombreCentroTrabajo").val();
    var canalComercial = $("#nombreCanalComercial").val();
    var empresa = $("#empresa").val();

    var formData = new FormData();
    formData.append("idConceptoEdit", idConcepto);
    formData.append("nombreAgenteEdit", nombreAgente.toUpperCase());
    formData.append("centroTrabajoEdit", centroTrabajo.toUpperCase());
    formData.append("canalComercialEdit", canalComercial.toUpperCase());
    formData.append("empresaEdit", empresa);

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
        $(".msg").html(res);
        var response = res.replace(/['"]+/g, "");
        if (response == "ok") {
          $(".msg").html(
            "<div class='alert alert-success'>Actualizacion de concepto exitoso!</div>"
          );
          $("#formActualizarConcepto").trigger("reset");
          setTimeout(function () {
            $("#edicionConcepto").modal("hide");
            $(".msg").html("");
            if (empresa == "PINTURAS") {
              cargarConceptosPinturas(1);
            } else {
              cargarConceptosFlex(1);
            }
          }, 2000);
        } else {
          $(".msg").html(
            "<div class='alert alert-danger'>Tuvimos problemas al actualizar el concepto, comunicate con el administrador</div>"
          );
        }
      })
      .fail(function (res) {
        $(".msg").html(
          "<div class='alert alert-danger'>Tuvimos problemas al registrar el concepto, comunicate con el administrador</div>"
        );
      });
  });
});
/**BUSCAR DATOS CONCEPTO */
function obtenerDatosConcepto(id, empresa) {
  var datos = new FormData();
  datos.append("idConcepto", id);
  datos.append("empresaConcepto", empresa);

  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    method: "POST",
    data: datos,
    cache: false,
    contentType: false,
    processData: false,
    success: function (respuesta) {
      var datos = JSON.parse(respuesta);

      $("#edicionConcepto").modal("show");
      $("#nombreAgente").val(datos["CNOMBREAGENTE"]);
      $("#nombreCentroTrabajo").val(datos["CCENTROTRABAJO"]);
      $("#nombreCanalComercial").val(datos["CCANALCOMERCIAL"]);
      $("#idConcepto").val(datos["CIDPARAM"]);
    },
  });
}
/**BUSCAR DATOS CONCEPTO */
function eliminarConcepto(id, empresa) {
  var datos = new FormData();
  datos.append("idConceptoDelete", id);
  datos.append("empresaConceptoDelete", empresa);

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
        if (empresa == "PINTURAS") {
          cargarConceptosPinturas(1);
        } else {
          cargarConceptosFlex(1);
        }
        Swal.fire({
          icon: "success",
          title: "Concepto eliminado exitosamente",
          showConfirmButton: false,
          timer: 1500,
        });
      } else {
        Swal.fire({
          icon: "success",
          title: "El concepto no pudo ser eliminado",
          showConfirmButton: false,
          timer: 1500,
        });
      }
    },
  });
}
