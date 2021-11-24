<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->

                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="page-wrapper">
                                <!-- Page-body start -->
                                <div class="page-body">
                                    <div class="row">
                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                            <?php
                                            $week = date("W");
                                            echo "<h4 class='m-b-0' style='color:#00BCD4'>SEMANA " . $week . "</h4>";

                                            $arreglo = [];
                                            for ($i = 2; $i < 8; $i++) {
                                                $dia2 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
                                                array_push($arreglo, $dia2);
                                            }

                                            echo "<h5 class='m-b-0' style='color:#00BCD4'>PERIODO " . $arreglo[0] . " - " . $arreglo[5] . "</h5>";
                                            ?>
                                        </div>
                                        <div class="col-sm-12 col-xl-12 m-b-30">
                                            <h4 class="sub-title">Elegir que se muestra en el tablero</h4>
                                            <span>VENTAS DIARIAS</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesDay" name="checkSalesDay" onClick="accionesVista('ventasDay')">
                                                <span class="slider round"></span>
                                            </label>
                                            <span>VENTAS YEAR TO DAY</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesYearDay" name="checkSalesYearDay" onClick="accionesVista('ventasYearToDay')">
                                                <span class="slider round"></span>
                                            </label>
                                            <span>VENTAS YEAR TO WEEK</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesYearWeek" name="checkSalesYearWeek" onClick="accionesVista('ventasYearToWeek')">
                                                <span class="slider round"></span>
                                            </label>
                                            <span>VENTAS YEAR TO MONTH</span>
                                            <label class="switch">
                                                <input type="checkbox" id="checkSalesYearMonth" name="checkSalesYearMonth" onClick="accionesVista('ventasYearToMonth')">
                                                <span class="slider round"></span>
                                            </label>
                                        </div>
                                        <div class="col-xl-12 col-md-12">
                                            <div class="row">

                                                <!-- sale card start -->
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-green total-card">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">FLOTILLAS</h5>
                                                                <h4 id="dashboardFlotillas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-orenge total-card">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">E-COMMERCE</h5>
                                                                <h4 id="dashboardEcommerce"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-purple total-card">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">CEDIS</h5>
                                                                <h4 id="dashboardMayoreo"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-red total-card">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">RUTAS</h5>
                                                                <h4 id="dashboardRutas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-2">
                                                    <div class="card bg-c-blue total-card">
                                                        <div class="card-block">
                                                            <div class="text-left">
                                                                <h5 class="m-b-0" style="color:white">TIENDAS</h5>
                                                                <h4 id="dashboardTiendas"></h4>

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('CAPU')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">CAPU</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataCapu"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('REFORMA')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">REFORMA</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataReforma"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('SAN MANUEL')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">SAN MANUEL</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataSanManuel"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('SANTIAGO')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">SANTIAGO</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataSantiago"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('LAS TORRES')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">LAS TORRES</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataLasTorres"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('FLOTILLAS')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">FLOTILLAS</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataFlotillas"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('CEDIS')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">CEDIS</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataMayoreo"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div class="card text-center order-visitor-card divVentaData" onclick="redireccionAcion('RUTAS')">
                                                        <div class="card-block">
                                                            <h6 class="m-b-0">RUTAS</h6>
                                                            <h4 class="m-t-15 m-b-15" id="dataRutas"></h4>
                                                            </h4>
                                                            <p class="m-b-0">VENTA ACUMULADA</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoVentasDiariasBar"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">
                                                    <figure class="highcharts-figure">
                                                        <div id="graficoVentasDiariasPie"></div>

                                                    </figure>
                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <?php
                                                            $hoy = date("Y-m-d", strtotime($fecha_actual . "- 1 days"));
                                                            $anterior = date("Y-m-d", strtotime($fecha_actual . "- 1 year -1 days"));
                                                            echo "<h4>YEAR TO DAY </h4><h5 class='m-b-0'>$anterior VS $hoy</h5>";
                                                            ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="ventasYearToDay">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-6 col-md-6 col-lg-6">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <figure class="highcharts-figure">

                                                                <div id="graficoYearToDayBar"></div>

                                                            </figure>
                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <?php
                                                            $arreglo = array();
                                                            $arreglo2 = array();
                                                            $week = date('W');
                                                            $year = 2020;
                                                            for ($day = 1; $day < 7; $day++) {
                                                                $dia = date('Y-m-d', strtotime($year . "W" . ($week) . $day)) . "\n";
                                                                array_push($arreglo, $dia);
                                                            }
                                                            for ($i = 2; $i < 8; $i++) {

                                                                $dia2 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
                                                                array_push($arreglo2, $dia2);
                                                            }

                                                            $anterior = $arreglo[0] . " - " . $arreglo[5];
                                                            $hoy = $arreglo2[0] . " - " . $arreglo2[5];
                                                            echo "<h4>YEAR TO WEEK</h4><h5 class='m-b-0'>$anterior VS $hoy</h5>";
                                                            ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="ventasYearToWeek">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div id="graficoYearToWeekBar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <?php
                                                            $hoy = "2021";
                                                            $anterior = "2020";
                                                            echo "<h4>YEAR TO MONTH</h4><h5 class='m-b-0'>$anterior VS $hoy</h5>";
                                                            ?>
                                                            <div class="col-lg-12 col-md-12 col-sm-12">
                                                                <div class="ventasYearToMonth">

                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <div class="col-sm-12 col-md-12 col-lg-12">

                                                    <div class="card text-center">
                                                        <div class="card-block">
                                                            <div class="col-sm-12 col-md-12 col-lg-12">
                                                                <div id="graficoYearToMonthBar"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                    <!-- Page-body end -->
                                </div>
                                <div id="styleSelector"> </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <style type="text/css">
        .highcharts-figure,
        .highcharts-data-table table {
            min-width: 310px;
            max-width: 800px;
            margin: 1em auto;
        }

        #graficoVentasDiariasBar {
            height: 400px;
        }

        #graficoVentasDiariasPie {
            height: 400px;
        }

        .highcharts-data-table table {
            font-family: Verdana, sans-serif;
            border-collapse: collapse;
            border: 1px solid #EBEBEB;
            margin: 10px auto;
            text-align: center;
            width: 100%;
            max-width: 500px;
        }

        .highcharts-data-table caption {
            padding: 1em 0;
            font-size: 1.2em;
            color: #555;
        }

        .highcharts-data-table th {
            font-weight: 600;
            padding: 0.5em;
        }

        .highcharts-data-table td,
        .highcharts-data-table th,
        .highcharts-data-table caption {
            padding: 0.5em;
        }

        .highcharts-data-table thead tr,
        .highcharts-data-table tr:nth-child(even) {
            background: #f8f8f8;
        }

        .highcharts-data-table tr:hover {
            background: #f1f7ff;
        }
    </style>