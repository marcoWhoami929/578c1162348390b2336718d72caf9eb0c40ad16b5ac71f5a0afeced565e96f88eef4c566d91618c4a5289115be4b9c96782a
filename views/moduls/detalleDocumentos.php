<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">
                    <!-- Page-header start -->
                    <div class="page-header">
                        <div class="page-block">
                            <div class="row align-items-center">
                                <div class="col-lg-8 col-md-8 col-sm-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">DETALLE DOCUMENTOS</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Detalle Documentos</a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Page-header end -->
                    <div class="pcoded-inner-content">
                        <!-- Main-body start -->
                        <div class="main-body">
                            <div class="pcoded-inner-content">
                                <div class="main-body">
                                    <div class="page-wrapper">
                                        <div class="page-body">
                                            <div class="row">
                                                <div class="col-sm-12">
                                                    <div class="card">
                                                        <div class="card-header">
                                                            <h3>Detalle De Documentos Mensual</h3>
                                                            <div class="card-header-right">
                                                                <ul class="list-unstyled card-option">
                                                                    <li>
                                                                        <i class="fa fa fa-wrench open-card-option"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-window-maximize full-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-minus minimize-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-refresh reload-card"></i>
                                                                    </li>
                                                                    <li>
                                                                        <i class="fa fa-trash close-card"></i>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="table-title">

                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>


                                                                <div class="table-filter filterParams">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div style="width: 70%; margin: auto;">

                                                                                <input id="arregloClientes">



                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Año</label>

                                                                                <select class="form-control" id="anio" onchange="cargarDetalleDocumentos(1);">

                                                                                    <option value="2013">2013</option>
                                                                                    <option value="2014">2014</option>
                                                                                    <option value="2015">2015</option>
                                                                                    <option value="2016">2016</option>
                                                                                    <option value="2017">2017</option>
                                                                                    <option value="2018">2018</option>
                                                                                    <option value="2019">2019</option>
                                                                                    <option value="2020">2020</option>
                                                                                    <option value="2021" selected="">2021</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Mes</label>

                                                                                <select class="form-control" id="mesDetalle" onchange="cargarDetalleDocumentos(1);">

                                                                                    <option value="1">Enero</option>
                                                                                    <option value="2">Febrero</option>
                                                                                    <option value="3">Marzo</option>
                                                                                    <option value="4">Abril</option>
                                                                                    <option value="5">Mayo</option>
                                                                                    <option value="6">Junio</option>
                                                                                    <option value="7">Julio</option>
                                                                                    <option value="8">Agosto</option>
                                                                                    <option value="9">Septiembre</option>
                                                                                    <option value="10">Octubre</option>
                                                                                    <option value="11">Noviembre</option>
                                                                                    <option value="12">Diciembre</option>

                                                                                </select>
                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <label>Estatus</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control" id="estatus" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="0">0</option>
                                                                                    <option value="1">1</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Agente</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorAgentes" name="agente[]" multiple="multiple" id="agente" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $agente = new ModelAdmon();
                                                                                    $agentes = $agente->mdlObtenerListaAgentes();

                                                                                    foreach ($agentes as $key => $value) {
                                                                                        echo "<option value='" . $value["CNOMBREAGENTE"] . "'>" . $value['CNOMBREAGENTE'] . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Centro</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorCentro" name="centro[]" multiple="multiple" id="centroTrabajo" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $centroTrabajo = new ModelAdmon();
                                                                                    $listaCentros = $centroTrabajo->mdlListarCentrosTrabajo();
                                                                                    foreach ($listaCentros as $key => $value) {
                                                                                        if ($value["CCENTROTRABAJO"] == "") {
                                                                                            $centro = "VACIO";
                                                                                        } else {
                                                                                            $centro = $value["CCENTROTRABAJO"];
                                                                                        }

                                                                                        echo "<option value='" . $centro . "'>" . $value["CCENTROTRABAJO"] . "</option>";
                                                                                    }

                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Canal</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorCanal" name="canal[]" multiple="multiple" id="canal" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $canalComercial = new ModelAdmon();
                                                                                    $canales = $canalComercial->mdlListarCanalesComerciales();
                                                                                    foreach ($canales as $key => $value) {
                                                                                        if ($value["CCANALCOMERCIAL"] == "") {
                                                                                            $canal = "VACIO";
                                                                                        } else {
                                                                                            $canal = $value["CCANALCOMERCIAL"];
                                                                                        }

                                                                                        echo "<option value=" . $canal . ">" . $value["CCANALCOMERCIAL"] . "</option>";
                                                                                    }

                                                                                    ?>
                                                                                </select>

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" id="searchClient" class="btn btn-primary" data-toggle="modal" data-target="#modalClientes"> <i class="fa fa-search"></i>Buscar cliente</button>


                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="cargarDetalleDocumentos(1);">

                                                                                    <option>15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option>100</option>
                                                                                    <option>500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                    <option selected="">5000</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Campo Orden</span>
                                                                                <select class="form-control" id="campoOrden" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="fecha">Fecha</option>
                                                                                    <option value="monto">Total General</option>
                                                                                    <option value="cliente">Cliente</option>
                                                                                    <option value="folio">Folio Factura</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Orden</span>
                                                                                <select class="form-control" id="orden" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="asc">Asc</option>
                                                                                    <option value="desc">Desc</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Abonado</span>
                                                                                <select class="form-control" id="abonado" onchange="cargarDetalleDocumentos(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <option value="con">Con Abono</option>
                                                                                    <option value="sin">Sin Abono</option>

                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <a onclick="generarReporteDetalleDocumentos('ventasDetalleDocumentos')"><i class="fa fa-file-excel-o fa-3x" aria-hidden="true"></i></a>
                                                                            </div>

                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="ventasDocumentosDetalle dataParams">

                                                                </div>


                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="styleSelector"> </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal" id="modalClientes" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar Cliente</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form class="form-horizontal">
                    <div class="form-group">
                        <div class="col-lg-12 col-md-12 col-sm-12"></div>
                        <div class="row">
                            <div class="col-lg-9 col-md-9 col-sm-9">
                                <input type="hidden" class="form-control" id="clasificacionVenta">
                                <input type="hidden" class="form-control" id="clasificacionVenta2">
                                <input type="text" class="form-control" id="nombreClienteSearch" placeholder="Buscar cliente" onkeyup="loadClients(1)">
                            </div>

                        </div>
                    </div>
                </form>
                <div id="loader2" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="outer_div"></div><!-- Datos ajax Final -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    /*ACCESOS DIRECTOS CLIENTES*/
    shortcut.add("Ctrl+B", function() {
        document.getElementById("searchClient").click();
    });

    /**ELIMINAR ELEMENTOS ARREGLO CLIENTES */
    $('#arregloClientes').tagEditor({
        initialTags: JSON.parse(localStorage.getItem("arrayClientes")),
        delimiter: ', ',
        forceLowercase: false,
        beforeTagDelete: function(field, editor, tags, val) {
            var arrayClientes = localStorage.getItem("arrayClientes");
            removeItemFromArregloBusqueda(arrayClientes, val, "arrayClientes")
        }

    });
</script>