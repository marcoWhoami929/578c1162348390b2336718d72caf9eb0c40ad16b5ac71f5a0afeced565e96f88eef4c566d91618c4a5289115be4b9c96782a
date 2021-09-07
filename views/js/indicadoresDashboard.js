/****FUNCION PARA FORMATEAR NUMEROS */
const format = (num) => {
  const n = String(num),
    p = n.indexOf(".");
  return n.replace(/\d(?=(?:\d{3})+(?:\.|$))/g, (m, i) =>
    p < 0 || i < p ? `${m},` : m
  );
};
(async () => {
  const respuestaRaw = await fetch(
    "ajax/indicadoresDashboard.ajax.php?ventas=semanal"
  );

  const respuesta = await respuestaRaw.json();

  $("#dashboardFlotillas").html(
    "$ " + format(respuesta.canales[0]["FLOTILLAS"])
  );
  $("#dashboardMayoreo").html(
    "$ " + format(respuesta.canales[1]["MAYOREO"].toFixed(2))
  );

  $("#dashboardRutas").html(
    "$ " + format(respuesta.canales[2]["RUTAS"].toFixed(2))
  );
  $("#dashboardTiendas").html(
    "$ " + format(respuesta.canales[3]["TIENDAS"].toFixed(2))
  );
  $("#dataCapu").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.tiendas[0]["PV CAPU"].toFixed(2))
  );
  $("#dataReforma").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.tiendas[1]["PV REFORMA"].toFixed(2))
  );
  $("#dataSanManuel").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.tiendas[2]["PV SAN MANUEL"].toFixed(2))
  );
  $("#dataSantiago").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.tiendas[3]["PV SANTIAGO"].toFixed(2))
  );
  $("#dataLasTorres").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.tiendas[4]["PV TORRES"].toFixed(2))
  );
  $("#dataFlotillas").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.canales[0]["FLOTILLAS"].toFixed(2))
  );
  $("#dataMayoreo").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.canales[1]["MAYOREO"].toFixed(2))
  );
  $("#dataRutas").html(
    "<i class='fa fa-dollar-sign m-r-15 text-c-green'></i>" +
      format(respuesta.canales[2]["RUTAS"].toFixed(2))
  );
})();
