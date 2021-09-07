(async () => {
  const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico1");

  const respuesta = await respuestaRaw.json();

  const $grafica = document.querySelector("#graficoVentasDiariasBar");

  const etiquetas = respuesta.etiquetas;
  const series = respuesta.series;

  // Create the chart
  Highcharts.chart($grafica, {
    chart: {
      type: "column",
    },
    title: {
      text: "Ventas Diarias Por Semana",
    },
    subtitle: {
      text: "Dar click en el canal para ver mas detalles",
    },
    accessibility: {
      announceNewData: {
        enabled: true,
      },
    },
    xAxis: {
      type: "category",
    },
    yAxis: {
      title: {
        text: "Ventas Totales Diarias",
      },
    },
    legend: {
      enabled: false,
    },
    plotOptions: {
      series: {
        borderWidth: 0,
        dataLabels: {
          enabled: true,
          format: "$ {point.y:.2f}",
        },
      },
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat:
        '<span style="color:{point.color}">{point.name}</span>: <b>$ {point.y:.2f}</b><br/>',
    },

    series: [
      {
        name: "Canales",
        colorByPoint: true,
        data: etiquetas,
      },
    ],
    drilldown: {
      series: [
        {
          name: "TIENDAS",
          id: "TIENDAS",
          data: series,
        },
      ],
    },
  });
})();
(async () => {
  const respuestaRaw = await fetch("ajax/dataCharts.php?grafico=grafico1");

  const respuesta = await respuestaRaw.json();

  const $grafica = document.querySelector("#graficoVentasDiariasPie");

  const etiquetas = respuesta.etiquetas;

  Highcharts.setOptions({
    colors: Highcharts.map(Highcharts.getOptions().colors, function (color) {
      return {
        radialGradient: {
          cx: 0.5,
          cy: 0.3,
          r: 0.7,
        },
        stops: [
          [0, color],
          [1, Highcharts.color(color).brighten(-0.3).get("rgb")], // darken
        ],
      };
    }),
  });

  // Build the chart
  Highcharts.chart($grafica, {
    chart: {
      plotBackgroundColor: null,
      plotBorderWidth: null,
      plotShadow: false,
      type: "pie",
    },
    title: {
      text: "Ventas Diarias Por Semana",
    },
    tooltip: {
      pointFormat: "{series.name}: <b>$ {point.y:.1f}</b>",
    },
    accessibility: {
      point: {
        valueSuffix: "%",
      },
    },
    plotOptions: {
      pie: {
        allowPointSelect: true,
        cursor: "pointer",
        dataLabels: {
          enabled: true,
          format: "<b>{point.name}</b>: {point.percentage:.1f} %",
          connectorColor: "silver",
        },
      },
    },
    series: [
      {
        name: "Canal",
        data: etiquetas,
      },
    ],
  });
})();
