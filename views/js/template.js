$(function () {
  var url = window.location.pathname;
  var ruta = url.split("/");
  switch (ruta[2]) {
    case "conceptosPinturas":
      cargarConceptosPinturas(1);
      break;
    case "conceptosFlex":
      cargarConceptosFlex(1);
      break;
    case "ultimosCostos":
      cargarUltimosCostos(1);

      break;
    case "ventasCliente":
      cargarVentasCliente(1, "");
      loadClients(1);

      break;
    case "ventasCanal":
      cargarVentasCanal(1);

      break;
    case "ventasAgente":
      cargarVentasAgente(1);

      break;
    case "ventasProducto":
      cargarVentasProductoMonto(1, "", "");
      cargarVentasProductoUnidades(1, "", "");
      loadClientsVenta(1);
      loadProductosVenta(1);

      break;
    case "ventasClienteAnual":
      cargarVentasClienteAnual(1);

      break;
    case "ventasCanalAnual":
      cargarVentasCanalAnual(1);

      break;
    case "ventasAgenteAnual":
      cargarVentasAgenteAnual(1);

      break;
    case "ventasProductoAnual":
      cargarVentasProductoMontoAnual(1);
      cargarVentasProductoUnidadesAnual(1);
      //loadProductos(1);
      break;
  }
});

function cargarConceptosPinturas(page) {
  var query = $("#name").val();
  var centroTrabajo = $("#centroTrabajo").val();
  var canalComercial = $("#canalComercial").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "conceptoPinturas",
    page: page,
    query: query,
    CCENTROTRABAJO: centroTrabajo,
    CCANALCOMERCIAL: canalComercial,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/conceptos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".datos_ajax").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarConceptosFlex(page) {
  var query = $("#name").val();
  var centroTrabajo = $("#centroTrabajo").val();
  var canalComercial = $("#canalComercial").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "conceptoFlex",
    page: page,
    query: query,
    CCENTROTRABAJO: centroTrabajo,
    CCANALCOMERCIAL: canalComercial,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/conceptos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".datos_ajax").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarUltimosCostos(page) {
  var query = $("#codigoProducto").val();
  var año = $("#anio").val();
  var empresa = $("#empresa").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ultimosCostos",
    page: page,
    query: query,
    anioCostos: año,
    empresa: empresa,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $.ajax({
    url: "ajax/ultimosCostos.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".datos_ajax").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function descargarReporteCostos() {
  var query = $("#codigoProducto").val();
  var año = $("#anio").val();
  var empresa = $("#empresa").val();
  location.href =
    "views/moduls/reporteador.php?reporteUltimosCostos=" +
    empresa +
    "&query=" +
    query +
    "&año=" +
    año;
}
function obtenerDatosCompra(idDocumento, empresa) {
  if (idDocumento === undefined) {
    alert("Sin Compra Asociada");
  } else {
    var datos = new FormData();
    datos.append("empresa", empresa);
    datos.append("idDocumento", idDocumento);
    $("#modalverdatosdocumento").modal();
    $.ajax({
      url: "ajax/admonFunctions.ajax.php",
      method: "POST",
      data: datos,
      cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function (respuesta) {
        var response = respuesta;

        var listaCabeceras = ["Fecha", "Serie", "Folio", "Proveedor"];

        body = document.getElementById("tablaDetalleCompra");

        thead = document.createElement("thead");

        theadTr = document.createElement("tr");

        for (var h = 0; h < listaCabeceras.length; h++) {
          var celdaThead = document.createElement("th");
          var textoCeldaThead = document.createTextNode(listaCabeceras[h]);
          celdaThead.appendChild(textoCeldaThead);
          theadTr.appendChild(celdaThead);
        }

        thead.appendChild(theadTr);

        tblBody = document.createElement("tbody");

        var arregloNombres = [
          "CFECHA",
          "CSERIEDOCUMENTO",
          "CFOLIO",
          "CRAZONSOCIAL",
        ];

        // Crea las celdas

        for (var i = 0; i < 1; i++) {
          // Crea las hileras de la tabla
          var hilera = document.createElement("tr");
          $("#conceptoCompra").html(response["CNOMBRECONCEPTO"]);
          for (var j = 0; j < arregloNombres.length; j++) {
            console.log(response[arregloNombres[j]]);

            var celda = document.createElement("td");
            if (arregloNombres[j] == "CFOLIO") {
              var valor = parseInt(response[arregloNombres[j]], 10);
            } else {
              var valor = response[arregloNombres[j]];
            }
            var textoCelda = document.createTextNode(valor);
            celda.appendChild(textoCelda);
            hilera.appendChild(celda);
          }

          // agrega la hilera al final de la tabla (al final del elemento tblbody)
          tblBody.appendChild(hilera);
        }

        // appends <table> into <body>
        body.appendChild(tblBody);
        body.appendChild(thead);
      },
    });
  }
}
$(".btnCerrarDetalleCompra").click(function () {
  var nodos = document.getElementById("tablaDetalleCompra");
  while (nodos.firstChild) {
    nodos.removeChild(nodos.firstChild);
  }
});
/*************INICIA TABLAS VENTAS MENSUALES*/
function cargarVentasCliente(page, cliente) {
  var query = cliente;
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var canal = $("#canal").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCliente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasClienteData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasCanal(page) {
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var agente = $("#agente").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    anio: anio,
    agente: agente,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanal.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasAgente(page) {
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var agente = $("#agente").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    anio: anio,
    agente: agente,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgente.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasAgenteData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoMonto(page, nombreCliente, codigoProducto) {
  var query = codigoProducto;
  var anio = $("#anio").val();
  var canal = $("#canal").val();
  var agente = $("#agente").val();
  var cliente = nombreCliente;
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    cliente: cliente,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProducto.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoUnidades(page, nombreCliente, codigoProducto) {
  var query = codigoProducto;
  var anio = $("#anio").val();
  var canal = $("#canal").val();
  var agente = $("#agente").val();
  var cliente = nombreCliente;
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    cliente: cliente,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProducto.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*************INICIA TABLAS VENTAS ANUALES*/
function cargarVentasClienteAnual(page) {
  var query = $("#nombreCliente").val();
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var canal = $("#canal").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasClienteAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasClienteAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasCanalAnual(page) {
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var agente = $("#agente").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    anio: anio,
    agente: agente,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanalAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasCanalAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasAgenteAnual(page) {
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var agente = $("#agente").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    anio: anio,
    agente: agente,
    estatus: estatus,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgenteAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasAgenteAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoMontoAnual(page) {
  var query = $("#codigo").val();
  var canal = $("#canal").val();
  var agente = $("#agente").val();
  var cliente = $("#cliente").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    cliente: cliente,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoMontoAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasProductoUnidadesAnual(page) {
  var query = $("#codigo").val();
  var canal = $("#canal").val();
  var agente = $("#agente").val();
  var cliente = $("#cliente").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    cliente: cliente,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasProductoUnidadesAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/****BUSCADOR DE CLIENTE */
function loadClients(page) {
  var cliente = $("#nombreClienteSearch").val();
  var per_page = "10";
  var parametros = {
    action: "busquedaClientes",
    page: page,
    nombreClienteSearch: cliente,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
/****BUSCADOR DE CLIENTE */
function loadClientsVenta(page) {
  var cliente = $("#nombreClienteSearch").val();
  var per_page = "10";
  var parametros = {
    action: "busquedaClientesVenta",
    page: page,
    nombreClienteSearch: cliente,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".outer_div").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
/****BUSCADOR DE PRODUCTOS */
function loadProductosVenta(page) {
  var producto = $("#nombreProductoSearch").val();
  var per_page = "10";
  var parametros = {
    action: "busquedaProductosVenta",
    page: page,
    producto: producto,
    per_page: per_page,
  };
  $("#loader2").fadeIn("slow");
  $.ajax({
    url: "ajax/listaBusqueda.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader2").html(
        '<img src="views/images/ajax-loader.gif"> Cargando...'
      );
    },
    success: function (data) {
      $(".outer_div2").html(data).fadeIn("slow");
      $("#loader2").html("");
    },
  });
}
/****BUSCADOR DE CLIENTE */
function reedirigir(accion) {
  switch (accion) {
    case "cliente":
      window.location.href = "ventasCliente";
      break;
    case "canal":
      window.location.href = "ventasCanal";
      break;
    case "agente":
      window.location.href = "ventasAgente";
      break;
    case "producto":
      window.location.href = "ventasProducto";
      break;
    case "clienteAnual":
      window.location.href = "ventasClienteAnual";
      break;
    case "canalAnual":
      window.location.href = "ventasCanalAnual";
      break;
    case "agenteAnual":
      window.location.href = "ventasAgenteAnual";
      break;
    case "productoAnual":
      window.location.href = "ventasProductoAnual";
      break;
  }
}
