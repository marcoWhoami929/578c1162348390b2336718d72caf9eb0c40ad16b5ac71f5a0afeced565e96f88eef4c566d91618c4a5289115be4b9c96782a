$(function () {
  $(".modal").on("shown.bs.modal", function () {
    $(this).find("input:first").focus();
  });
  //**obtener semana actual */
  currentdate = new Date();
  var oneJan = new Date(currentdate.getFullYear(), 0, 1);
  var numberOfDays = Math.floor((currentdate - oneJan) / (24 * 60 * 60 * 1000));

  resultWeek = moment().format("W");

  mesCurrent = currentdate.getMonth() + 1;
  url = window.location.pathname;
  ruta = url.split("/");

  switch (ruta[2]) {
    case "login":
      $('input[type="checkbox"]').on("change", function () {
        $('input[name="' + this.name + '"]')
          .not(this)
          .prop("checked", false);
      });
      break;
    case "":
      $('input[type="checkbox"]').on("change", function () {
        $('input[name="' + this.name + '"]')
          .not(this)
          .prop("checked", false);
      });
      break;
    case "conceptosPinturas":
      cargarConceptosPinturas(1);
      $(".selectorCentroTrabajo").select2();
      $(".selectorCanalComercial").select2();
      break;
    case "conceptosFlex":
      cargarConceptosFlex(1);
      $(".selectorCentroTrabajo").select2();
      $(".selectorCanalComercial").select2();
      break;
    case "ultimosCostos":
      cargarUltimosCostos(1);

      break;
    case "ventasClienteDiario":
      cargarVentasClienteDiario(1, "");
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Cliente Diario", 4);
      $("#semana").val(resultWeek);

      break;
    case "detalleVentas":
      cargarDetalleVentasCliente(1, "");
      agregarEvento("Visualizo Detalle De Ventas", 4);
      break;
    case "ventasCanalDiario":
      cargarVentasCanalDiario(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Canal Diario", 4);
      $("#semana").val(resultWeek);

      break;
    case "ventasAgenteDiario":
      cargarVentasAgenteDiario(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Agente Diario", 4);
      $("#semana").val(resultWeek);

      break;
    case "ventasProductoDiario":
      cargarVentasProductoMontoDiario(1, "", "");
      cargarVentasProductoUnidadesDiario(1, "", "");
      loadClients(1);
      loadProductosVenta(1);
      agregarEvento("Visualizo Ventas Por Producto Diario", 4);
      $("#semana").val(resultWeek);

      break;
    case "ventasLitreadoDiario":
      cargarVentasLitreadoMontoDiario(1, "", "");
      cargarVentasLitreadoUnidadesDiario(1, "", "");
      loadClients(1);
      loadProductosVenta(1);
      agregarEvento("Visualizo Ventas Por Litreado Diario", 4);
      $("#semana").val(resultWeek);

      break;
    case "ventasMarcaDiario":
      cargarVentasMarcaDiario(1, "");
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Marca Diario", 4);
      $("#semana").val(resultWeek);

      break;
    case "ventasClienteMensual":
      cargarVentasCliente(1, "");
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Cliente Mensual", 4);
      break;
    case "ventasCanalMensual":
      cargarVentasCanal(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Canal Mensual", 4);
      break;
    case "ventasAgenteMensual":
      cargarVentasAgente(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Agente Mensual", 4);
      break;
    case "ventasProductoMensual":
      cargarVentasProductoMonto(1, "", "");
      cargarVentasProductoUnidades(1, "", "");
      loadProductosVenta(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Producto Mensual", 4);
      break;
    case "ventasLitreadoMensual":
      cargarVentasLitreadoMonto(1, "", "");
      cargarVentasLitreadoUnidades(1, "", "");
      loadProductosVenta(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Litreado Mensual", 4);
      break;
    case "ventasMarcaMensual":
      cargarVentasMarcaMensual(1, "");
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Marca Mensual", 4);
      break;
    case "ventasClienteAnual":
      cargarVentasClienteAnual(1, "");
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Cliente Anual", 4);
      break;
    case "ventasCanalAnual":
      cargarVentasCanalAnual(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Canal Anual", 4);
      break;
    case "ventasAgenteAnual":
      cargarVentasAgenteAnual(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Agente Anual", 4);
      break;
    case "ventasProductoAnual":
      cargarVentasProductoMontoAnual(1, "", "");
      cargarVentasProductoUnidadesAnual(1, "", "");
      loadProductosVenta(1);
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Producto Anual", 4);
      break;
    case "ventasLitreadoAnual":
      cargarVentasLitreadoMontoAnual(1, "", "");
      cargarVentasLitreadoUnidadesAnual(1, "", "");
      loadClients(1);
      loadProductosVenta(1);
      agregarEvento("Visualizo Ventas Por Litreado Anual", 4);
      break;
    case "ventasMarcaAnual":
      cargarVentasMarcaAnual(1, "");
      loadClients(1);
      agregarEvento("Visualizo Ventas Por Marca Anual", 4);
      break;
    case "dashboard":
      var arregloAcciones = JSON.parse(localStorage.accionesTablero);

      if (arregloAcciones["ventasDay"] == 1) {
        grafico1VentasDiarias();
        grafico2VentasDiarias();
      }
      if (arregloAcciones["ventasYearToDay"] == 1) {
        cargarVentasYearToDay(1);
        graficoVentasYearToDay();
      }
      if (arregloAcciones["ventasYearToWeek"] == 1) {
        cargarVentasYearToWeek(1);
        graficoVentasYearToWeek();
      }
      if (arregloAcciones["ventasYearToMonth"] == 1) {
        cargarVentasYearToMonth(1);
        graficoVentasYearToMonth();
      }

      agregarEvento("Visualizo El Tablero Principal", 4);

      break;
    case "detalleDocumentos":
      $("#mesDetalle").val(mesCurrent);
      cargarDetalleDocumentos(1);
      cargarVentasCliente(1, "");
      loadClients(1);
      agregarEvento("Visualizo Detalle Documentos", 4);
      break;
    case "usuarios":
      cargarUsuarios();
      agregarEvento("Visualizo La Lista de Usuarios Actual", 4);
      break;
    case "miPerfil":
      let userId = $("#userId").val();
      miPerfil(userId);
      break;
    case "bitacora":
      cargarBitacora(1);
      break;
  }
  $(".selectorAgentes").select2();
  var agenteVenta = JSON.parse(localStorage.getItem("arrayAgentes"));
  $(".selectorAgentes").val(agenteVenta).trigger("change");
  $(".selectorAgentes").on("select2:select", function (e) {
    var agente = e.params.data.id;
    agregarDatosBusqueda(agente, "arrayAgentes");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorAgentes").on("select2:unselect", function (e) {
    var agente = e.params.data.id;
    var arreglo = localStorage.getItem("arrayAgentes");
    removeItemFromArregloBusqueda(arreglo, agente, "arrayAgentes");
  });
  $(".selectorCentro").select2();
  var centroTrabajo = JSON.parse(localStorage.getItem("arrayCentro"));
  $(".selectorCentro").val(centroTrabajo).trigger("change");
  $(".selectorCentro").on("select2:select", function (e) {
    var centro = e.params.data.id;
    agregarDatosBusqueda(centro, "arrayCentro");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorCentro").on("select2:unselect", function (e) {
    var centro = e.params.data.id;
    var arreglo = localStorage.getItem("arrayCentro");
    removeItemFromArregloBusqueda(arreglo, centro, "arrayCentro");
  });
  $(".selectorCanal").select2();
  var canalComercial = JSON.parse(localStorage.getItem("arrayCanal"));
  $(".selectorCanal").val(canalComercial).trigger("change");
  $(".selectorCanal").on("select2:select", function (e) {
    var canal = e.params.data.id;
    agregarDatosBusqueda(canal, "arrayCanal");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorCanal").on("select2:unselect", function (e) {
    var canal = e.params.data.id;
    var arreglo = localStorage.getItem("arrayCanal");
    removeItemFromArregloBusqueda(arreglo, canal, "arrayCanal");
  });
  $(".selectorMarca").select2();
  var marcas = JSON.parse(localStorage.getItem("arrayMarca"));
  $(".selectorMarca").val(marcas).trigger("change");
  $(".selectorMarca").on("select2:select", function (e) {
    var marca = e.params.data.id;
    agregarDatosBusqueda(marca, "arrayMarca");
  });
  //detectamos se opcion se quito funciona con select multiple
  $(".selectorMarca").on("select2:unselect", function (e) {
    var marca = e.params.data.id;
    var arreglo = localStorage.getItem("arrayMarca");
    removeItemFromArregloBusqueda(arreglo, marca, "arrayMarca");
  });
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
/*************INICIA TABLAS VENTAS DIARIAS*/
function cargarVentasClienteDiario(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasClienteDiario");
  var vista = "cargarVentasClienteDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasClienteDiario.ajax.php",
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
function cargarVentasCanalDiario(page) {
  var vista = "cargarVentasCanalDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasCanalDiario.ajax.php",
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
function cargarVentasAgenteDiario(page) {
  var vista = "cargarVentasAgenteDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasAgenteDiario.ajax.php",
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
function cargarVentasProductoMontoDiario(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasProductoMontoDiario");
  var vista = "cargarVentasProductoMontoDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }

  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoDiario.ajax.php",
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
function cargarVentasProductoUnidadesDiario(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasProductoUnidadesDiario");
  var vista = "cargarVentasProductoUnidadesDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasProductoDiario.ajax.php",
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
function cargarVentasLitreadoMontoDiario(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasLitreadoMontoDiario");
  var vista = "cargarVentasLitreadoMontoDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoMonto",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoUnidadesDiario(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasLitreadoUnidadesDiario");
  var vista = "cargarVentasLitreadoUnidadesDiario";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoUnidades",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasMarcaDiario(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasMarcaDiario");
  var vista = "cargarVentasMarcaDiario";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasMarca",
    page: page,
    query: query,
    anio: anio,
    semana: semana,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    marca: marca,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasMarcaDiario.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasMarcaDiario").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function formatoFecha(fecha, formato) {
  const map = {
    dd: fecha.getDate(),
    mm: fecha.getMonth() + 1,
    yy: fecha.getFullYear().toString().slice(-2),
    yyyy: fecha.getFullYear(),
  };
  return formato.replace(/dd|mm|yy|yyy/gi, (matched) => map[matched]);
}
function cargarDetalleVentasCliente(page, centro) {
  var vista = "cargarDetalleVentasCliente";
  var centroElegido = $("#centroTrabajo").val();
  if (centroElegido == "") {
    var centroTrabajo = localStorage.getItem("centroDetalle");
  } else {
    var centroTrabajo = $("#centroTrabajo").val();
  }

  if (centroTrabajo == "") {
    var agente = localStorage.getItem("agenteDetalle");
  } else {
    var agente = "";
  }
  if (centroTrabajo == "" && agente == "") {
    var canal = localStorage.getItem("canalDetalle");
  } else {
    var canal = "";
  }
  if (centroTrabajo == "" && agente == "" && canal == "") {
    var cliente = localStorage.getItem("clienteDetalle");
  } else {
    var cliente = "";
  }
  var anio = $("#anio").val();
  var dia = $("#fecha").val();
  if (dia == "") {
    const hoy = new Date();
    hoy.setDate(hoy.getDate());
    dia =
      hoy.getFullYear() +
      "-" +
      ("0" + (hoy.getMonth() + 1)).slice(-2) +
      "-" +
      hoy.getDate();
  } else {
    var dia = $("#fecha").val();
  }
  var per_page = $("#per_page").val();
  var parametros = {
    action: "detalleVentasCliente",
    page: page,
    centroTrabajo: centroTrabajo,
    agente: agente,
    canal: canal,
    cliente: cliente,
    anio: anio,
    dia: dia,
    vista: vista,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleClientes").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarDetalleVentasProducto(page, idDocumento, empresa) {
  var vista = "cargarDetalleVentasProducto";

  var per_page = $("#per_page").val();
  var parametros = {
    action: "detalleVentasProductos",
    page: page,
    idDocumento: idDocumento,
    empresa: empresa,
    vista: vista,
    per_page: per_page,
  };

  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/detalleVentas.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDetalleProductos").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*************INICIA TABLAS VENTAS MENSUALES*/
function cargarVentasCliente(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasCliente");
  var vista = "cargarVentasCliente";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
  var vista = "cargarVentasCanal";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
  var vista = "cargarVentasAgente";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
  $("#clasificacionVenta").val("cargarVentasProductoMonto");
  var vista = "cargarVentasProductoMonto";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
  $("#clasificacionVenta2").val("cargarVentasProductoUnidades");
  var vista = "cargarVentasProductoUnidades";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
function cargarVentasLitreadoMonto(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasLitreadoMonto");
  var vista = "cargarVentasLitreadoMonto";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoMonto",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreado.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoMontoData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoUnidades(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta2").val("cargarVentasLitreadoUnidades");
  var vista = "cargarVentasLitreadoUnidades";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoUnidades",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreado.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoUnidadesData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasMarcaMensual(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasMarcaMensual");
  var vista = "cargarVentasMarcaMensual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasMarca",
    page: page,
    query: query,
    anio: anio,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    marca: marca,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasMarcaMensual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasMarcaMensual").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/*************INICIA TABLAS VENTAS ANUALES*/
function cargarVentasClienteAnual(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasClienteAnual");
  var vista = "cargarVentasClienteAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCliente",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
  var vista = "cargarVentasCanalAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasCanal",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
  var vista = "cargarVentasAgenteAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasAgente",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
function cargarVentasProductoMontoAnual(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasProductoMontoAnual");
  var vista = "cargarVentasProductoMontoAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoMonto",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
function cargarVentasProductoUnidadesAnual(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasProductoUnidadesAnual");
  var vista = "cargarVentasProductoUnidadesAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasProductoUnidades",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
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
function cargarVentasLitreadoMontoAnual(page, nombreCliente, codigoProducto) {
  $("#clasificacionVenta").val("cargarVentasLitreadoMontoAnual");
  var vista = "cargarVentasLitreadoMontoAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoMonto",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoMontoAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasLitreadoUnidadesAnual(
  page,
  nombreCliente,
  codigoProducto
) {
  $("#clasificacionVenta2").val("cargarVentasLitreadoUnidadesAnual");
  var vista = "cargarVentasLitreadoUnidadesAnual";
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasLitreadoUnidades",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    producto: producto,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasLitreadoAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasLitreadoUnidadesAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function cargarVentasMarcaAnual(page, cliente) {
  $("#clasificacionVenta").val("cargarVentasMarcaAnual");
  var vista = "cargarVentasMarcaAnual";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var parametros = {
    action: "ventasMarca",
    page: page,
    query: query,
    canal: canal,
    agente: agente,
    centro: centro,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    marca: marca,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasMarcaAnual.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasMarcaAnualData").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/****BUSCADOR DE CLIENTE */
function loadClients(page) {
  var cliente = $("#nombreClienteSearch").val();
  var vista = $("#clasificacionVenta").val();
  var vista2 = $("#clasificacionVenta2").val();

  var per_page = "10";
  var parametros = {
    action: "busquedaClientes",
    page: page,
    nombreClienteSearch: cliente,
    vista: vista,
    vista2: vista2,
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
  var vista = $("#clasificacionVenta").val();
  var vista2 = $("#clasificacionVenta2").val();
  var per_page = "10";
  var parametros = {
    action: "busquedaProductosVenta",
    page: page,
    producto: producto,
    vista: vista,
    vista2: vista2,
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
/*************DETALLE DOCUMENTOS VENTAS*/
function cargarDetalleDocumentos(page) {
  $("#clasificacionVenta").val("cargarDetalleDocumentos");
  var vista = "cargarDetalleDocumentos";
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));

  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }

  var estatus = $("#estatus").val();
  var año = $("#anio").val();

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var mes = $("#mesDetalle").val();
  var abonado = $("#abonado").val();
  var parametros = {
    action: "documentosDetalle",
    page: page,
    query: query,
    año: año,
    canal: canal,
    centro: centro,
    agente: agente,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
    campo: campo,
    orden: orden,
    mes: mes,
    abonado: abonado,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/documentosDetalle.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {
      $("#loader").html("Cargando Porfavor Espere ........");
    },
    success: function (data) {
      $(".ventasDocumentosDetalle").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
/****BUSCADOR DE CLIENTE */
function reedirigir(accion) {
  switch (accion) {
    case "clienteDiario":
      window.location.href = "ventasClienteDiario";
      break;
    case "canalDiario":
      window.location.href = "ventasCanalDiario";
      break;
    case "agenteDiario":
      window.location.href = "ventasAgenteDiario";
      break;
    case "productoDiario":
      window.location.href = "ventasProductoDiario";
      break;
    case "productoLitreadoDiario":
      window.location.href = "ventasLitreadoDiario";
      break;
    case "marcaDiario":
      window.location.href = "ventasMarcaDiario";
      break;
    case "clienteMensual":
      window.location.href = "ventasClienteMensual";
      break;
    case "canalMensual":
      window.location.href = "ventasCanalMensual";
      break;
    case "agenteMensual":
      window.location.href = "ventasAgenteMensual";
      break;
    case "productoMensual":
      window.location.href = "ventasProductoMensual";
      break;
    case "productoLitreadoMensual":
      window.location.href = "ventasLitreadoMensual";
      break;
    case "marcaMensual":
      window.location.href = "ventasMarcaMensual";
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
    case "productoLitreadoAnual":
      window.location.href = "ventasLitreadoAnual";
      break;
    case "marcaAnual":
      window.location.href = "ventasMarcaAnual";
      break;
  }
}
function returnDashboard() {
  location.href = "dashboard";
}
function redireccionAcion(accion) {
  switch (accion) {
    case "SAN MANUEL":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "1 SAN MANUEL");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "REFORMA":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "3 REFORMA");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "CAPU":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "7 CAPU");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "SANTIAGO":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "6 SANTIAGO");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "LAS TORRES":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "9 TORRES");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "FLOTILLAS":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "CUENTAS CORPORATIVAS");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "MAYOREO":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "CEDIS");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      break;
    case "RUTAS":
      window.location.href = "detalleVentas";
      localStorage.setItem("centroDetalle", "RUTA 5");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");

      break;
  }
}
function redireccionAccionVentas(nombre, tipo) {
  switch (tipo) {
    case "Agentes":
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("agenteDetalle", nombre);
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "Canal":
      localStorage.setItem("canalDetalle", nombre);
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("clienteDetalle", "");
      window.open("detalleVentas", "_blank");
      break;
    case "Clientes":
      localStorage.setItem("canalDetalle", "");
      localStorage.setItem("agenteDetalle", "");
      localStorage.setItem("centroDetalle", "");
      localStorage.setItem("clienteDetalle", nombre);
      window.open("detalleVentas", "_blank");
      break;
  }
}
function detalleProductosVenta(idDocumento, empresa) {
  $(".next-step").click();
  var centro = localStorage.getItem("centroDetalle");
  cargarDetalleVentasProducto(1, idDocumento, empresa);
  document
    .getElementById("previous-step")
    .setAttribute("onclick", "cargarDetalleVentasCliente(1, '" + centro + "')");
}
function removeItemFromArregloBusqueda(array, item, nombreArreglo) {
  var arreglo = JSON.parse(array);

  for (var i in arreglo) {
    if (arreglo[i] == item) {
      arreglo.splice(i, 1);
      localStorage.setItem("" + nombreArreglo + "", JSON.stringify(arreglo));

      break;
    }
  }
  switch (ruta[2]) {
    case "ventasClienteDiario":
      cargarVentasClienteDiario(1, "");
      break;
    case "ventasCanalDiario":
      cargarVentasCanalDiario(1);
      break;
    case "ventasAgenteDiario":
      cargarVentasAgenteDiario(1);
      break;
    case "ventasProductoDiario":
      cargarVentasProductoMontoDiario(1, "", "");
      cargarVentasProductoUnidadesDiario(1, "", "");
      break;
    case "ventasLitreadoDiario":
      cargarVentasLitreadoMontoDiario(1, "", "");
      cargarVentasLitreadoUnidadesDiario(1, "", "");
      break;
    case "ventasMarcaDiario":
      cargarVentasMarcaDiario(1, "");
      break;
    case "ventasClienteMensual":
      cargarVentasCliente(1, "");
      break;
    case "ventasCanalMensual":
      cargarVentasCanal(1);
      break;
    case "ventasAgenteMensual":
      cargarVentasAgente(1);
      break;
    case "ventasProductoMensual":
      cargarVentasProductoMonto(1, "", "");
      cargarVentasProductoUnidades(1, "", "");
      break;
    case "ventasLitreadoMensual":
      cargarVentasLitreadoMonto(1, "", "");
      cargarVentasLitreadoUnidades(1, "", "");
      break;
    case "ventasMarcaMensual":
      cargarVentasMarcaMensual(1, "");
      break;
    case "ventasClienteAnual":
      cargarVentasClienteAnual(1, "");
      break;
    case "ventasCanalAnual":
      cargarVentasCanalAnual(1);
      break;
    case "ventasAgenteAnual":
      cargarVentasAgenteAnual(1);
      break;
    case "ventasProductoAnual":
      cargarVentasProductoMontoAnual(1, "", "");
      cargarVentasProductoUnidadesAnual(1, "", "");
      break;
    case "ventasLitreadoAnual":
      cargarVentasLitreadoMontoAnual(1, "", "");
      cargarVentasLitreadoUnidadesAnual(1, "", "");
      break;
    case "ventasMarcaAnual":
      cargarVentasMarcaAnual(1, "");
      break;
    case "detalleDocumentos":
      cargarDetalleDocumentos(1);
      break;
  }
}
function validateItemArray(array, item, nombreArreglo) {
  if (array.indexOf(item) === -1) {
    array.push(item);

    localStorage.setItem("" + nombreArreglo + "", JSON.stringify(array));
    var nombreCampo = "#" + nombreArreglo;
    switch (nombreArreglo) {
      case "arrayClientes":
        $("#arregloClientes").tagEditor("destroy");
        $("#arregloClientes").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayClientes")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayClientes = localStorage.getItem("arrayClientes");
            removeItemFromArregloBusqueda(arrayClientes, val, "arrayClientes");
          },
        });
        break;
      case "arrayProductos":
        $("#arregloProductos").tagEditor("destroy");
        $("#arregloProductos").tagEditor({
          initialTags: JSON.parse(localStorage.getItem("arrayProductos")),
          delimiter: ", ",
          forceLowercase: false,
          beforeTagDelete: function (field, editor, tags, val) {
            var arrayProductos = localStorage.getItem("arrayProductos");
            removeItemFromArregloBusqueda(
              arrayProductos,
              val,
              "arrayProductos"
            );
          },
        });
        break;
    }

    switch (ruta[2]) {
      case "ventasClienteDiario":
        cargarVentasClienteDiario(1, "");
        break;
      case "ventasCanalDiario":
        cargarVentasCanalDiario(1);
        break;
      case "ventasAgenteDiario":
        cargarVentasAgenteDiario(1);
        break;
      case "ventasProductoDiario":
        cargarVentasProductoMontoDiario(1, "", "");
        cargarVentasProductoUnidadesDiario(1, "", "");
        break;
      case "ventasLitreadoDiario":
        cargarVentasLitreadoMontoDiario(1, "", "");
        cargarVentasLitreadoUnidadesDiario(1, "", "");
        break;
      case "ventasMarcaDiario":
        cargarVentasMarcaDiario(1, "");
        break;
      case "ventasClienteMensual":
        cargarVentasCliente(1, "");
        break;
      case "ventasCanalMensual":
        cargarVentasCanal(1);
        break;
      case "ventasAgenteMensual":
        cargarVentasAgente(1);
        break;
      case "ventasProductoMensual":
        cargarVentasProductoMonto(1, "", "");
        cargarVentasProductoUnidades(1, "", "");
        break;
      case "ventasLitreadoMensual":
        cargarVentasLitreadoMonto(1, "", "");
        cargarVentasLitreadoUnidades(1, "", "");
        break;
      case "ventasMarcaMensual":
        cargarVentasMarcaMensual(1, "");
        break;
      case "ventasClienteAnual":
        cargarVentasClienteAnual(1, "");
        break;
      case "ventasCanalAnual":
        cargarVentasCanalAnual(1);
        break;
      case "ventasAgenteAnual":
        cargarVentasAgenteAnual(1);
        break;
      case "ventasProductoAnual":
        cargarVentasProductoMontoAnual(1, "", "");
        cargarVentasProductoUnidadesAnual(1, "", "");
        break;
      case "ventasLitreadoAnual":
        cargarVentasLitreadoMontoAnual(1, "", "");
        cargarVentasLitreadoUnidadesAnual(1, "", "");
        break;
      case "ventasMarcaAnual":
        cargarVentasMarcaAnual(1, "");
        break;
      case "detalleDocumentos":
        cargarDetalleDocumentos(1);
        break;
    }
  } else if (array.indexOf(item) > -1) {
    localStorage.setItem("" + nombreArreglo + "", JSON.stringify(array));
  }
}

function agregarDatosBusqueda(datoBusqueda, nombreArreglo) {
  var array = localStorage.getItem("" + nombreArreglo + "");

  if (array == undefined || array == "") {
    var nombreArray = [];
    localStorage.setItem("" + nombreArreglo + "", "[]");
    validateItemArray(nombreArray, datoBusqueda, "" + nombreArreglo + "");
  } else {
    var nombreArray = JSON.parse(localStorage.getItem("" + nombreArreglo + ""));
    validateItemArray(nombreArray, datoBusqueda, "" + nombreArreglo + "");
  }
}

var numeros = "0123456789";
function validarTipo(cadena) {
  for (i = 0; i < cadena.length; i++) {
    if (numeros.indexOf(cadena.charAt(i), 0) != -1) {
      return 1;
    }
  }
  return 0;
}
function cargarVentasYearToDay(page) {
  var vista = "cargarVentasYearToDay";

  var estatus = 0;
  var per_page = 10;
  var parametros = {
    action: "ventasYearToDay",
    page: page,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {},
    success: function (data) {
      $(".ventasYearToDay").html(data).fadeIn("slow");
    },
  });
}
function cargarVentasYearToWeek(page) {
  var vista = "cargarVentasYearToWeek";

  var estatus = 0;
  var per_page = 10;
  var parametros = {
    action: "ventasYearToWeek",
    page: page,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {},
    success: function (data) {
      $(".ventasYearToWeek").html(data).fadeIn("slow");
    },
  });
}
function cargarVentasYearToMonth(page) {
  var vista = "cargarVentasYearToMonth";

  var estatus = 0;
  var per_page = 10;
  var parametros = {
    action: "ventasYearToMonth",
    page: page,
    estatus: estatus,
    vista: vista,
    per_page: per_page,
  };
  $("#loader").fadeIn("slow");
  $("#loader").html("Cargando Porfavor Espere ........");

  $.ajax({
    url: "ajax/ventasYearToDay.ajax.php",
    data: parametros,
    beforeSend: function (objeto) {},
    success: function (data) {
      $(".ventasYearToMonth").html(data).fadeIn("slow");
    },
  });
}
function generarReporteDiario(vista) {
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var semana = $("#semana").val();

  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;

  location.href =
    "views/moduls/reporteador.php?reporteVentasDiarias=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&semana=" +
    semana +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&productos=" +
    producto +
    "&clientes=" +
    query +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&vista=" +
    vista;
}
function generarReporteMensual(vista) {
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));
  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var anio = $("#anio").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;

  location.href =
    "views/moduls/reporteador.php?reporteVentasMensuales=" +
    "&estatus=" +
    estatus +
    "&año=" +
    anio +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&productos=" +
    producto +
    "&clientes=" +
    query +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&vista=" +
    vista;
}
function generarReporteAnual(vista) {
  var arregloClientes = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloProductos = JSON.parse(localStorage.getItem("arrayProductos"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  var arregloMarca = JSON.parse(localStorage.getItem("arrayMarca"));

  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arregloProductos === null) {
    localStorage.setItem("arrayProductos", "[]");
    var producto = "";
  } else {
    if (arregloProductos == "[]") {
      var producto = "";
    } else {
      var producto = arregloProductos.toString();
    }
  }
  if (arregloClientes === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arregloClientes == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arregloClientes);
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  if (arregloMarca === null) {
    localStorage.setItem("arrayMarca", "[]");
    var marca = "";
  } else {
    if (arregloMarca == "[]") {
      var marca = "";
    } else {
      var marca = arregloMarca.toString();
    }
  }
  /****AGENTE-CENTRO DE TRABAJO-CANAL COMERCIAL */
  var estatus = $("#estatus").val();
  var per_page = $("#per_page").val();
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var page = 1;

  location.href =
    "views/moduls/reporteador.php?reporteVentasAnuales=" +
    "&estatus=" +
    estatus +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&productos=" +
    producto +
    "&clientes=" +
    query +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&marca=" +
    marca +
    "&vista=" +
    vista;
}
function generarReporteDetalleDocumentos(vista) {
  var arreglo = JSON.parse(localStorage.getItem("arrayClientes"));
  var arregloAgente = JSON.parse(localStorage.getItem("arrayAgentes"));
  var arregloCentro = JSON.parse(localStorage.getItem("arrayCentro"));
  var arregloCanal = JSON.parse(localStorage.getItem("arrayCanal"));
  agregarEvento("Descargo El Reporte " + vista + "", 3);
  if (arreglo === null) {
    localStorage.setItem("arrayClientes", "[]");
    var query = "";
  } else {
    if (arreglo == "[]") {
      var query = "";
    } else {
      var query = JSON.stringify(arreglo);
    }
  }

  if (arregloAgente === null) {
    localStorage.setItem("arrayAgentes", "[]");
    var agente = "";
  } else {
    if (arregloAgente == "[]") {
      var agente = "";
    } else {
      var agente = arregloAgente.toString();
    }
  }

  if (arregloCentro === null) {
    localStorage.setItem("arrayCentro", "[]");
    var centro = "";
  } else {
    if (arregloCentro == "[]") {
      var centro = "";
    } else {
      var centro = arregloCentro.toString();
    }
  }

  if (arregloCanal === null) {
    localStorage.setItem("arrayClientes", "[]");
    var canal = "";
  } else {
    if (arregloCanal == "[]") {
      var canal = "";
    } else {
      var canal = arregloCanal.toString();
    }
  }
  var estatus = $("#estatus").val();
  var año = $("#anio").val();
  var per_page = $("#per_page").val();
  var page = 1;
  var campo = $("#campoOrden").val();
  var orden = $("#orden").val();
  var mes = $("#mesDetalle").val();
  var abonado = $("#abonado").val();

  location.href =
    "views/moduls/reporteador.php?reporteVentasDetalle=" +
    "&estatus=" +
    estatus +
    "&año=" +
    año +
    "&agente=" +
    agente +
    "&canal=" +
    canal +
    "&centro=" +
    centro +
    "&per_page=" +
    per_page +
    "&page=" +
    page +
    "&campo=" +
    campo +
    "&orden=" +
    orden +
    "&mes=" +
    mes +
    "&abonado=" +
    abonado +
    "&clientes=" +
    query +
    "&vista=" +
    vista;
}
function cargarBitacora(page) {
  var query = $("#nombre").val();
  var accion = $("#accion").val();
  var per_page = $("#per_page").val();
  var parametros = {
    action: "bitacora",
    page: page,
    query: query,
    accion: accion,
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
      $(".bitacora").html(data).fadeIn("slow");
      $("#loader").html("");
    },
  });
}
function agregarEvento(accion, idAccion) {
  var formData = new FormData();
  formData.append("accionBitacora", accion);
  formData.append("idAccion", idAccion);
  $.ajax({
    url: "ajax/admonFunctions.ajax.php",
    type: "post",
    dataType: "json",
    data: formData,
    cache: false,
    contentType: false,
    processData: false,
  })
    .done(function (res) {
      var response = res.replace(/['"]+/g, "");
      if (response == "ok") {
      }
    })
    .fail(function (res) {});
}
