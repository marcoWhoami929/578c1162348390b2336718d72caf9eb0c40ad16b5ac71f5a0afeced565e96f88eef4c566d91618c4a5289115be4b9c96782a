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
                                        <h5 class="m-b-10">ANALISIS DE VENTAS</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>

                                <div class="col-lg-3 col-md-3 col-sm-3">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Ventas Por Producto</a>
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
                                                            <h5></h5>
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
                                                                    <div class="row">
                                                                        <div class="col-lg-4 col-md-4 col-sm-4">
                                                                            <h2>Ventas Por Producto</h2>

                                                                        </div>

                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('cliente')">
                                                                            <i class="fa fa-user fa-3x" aria-hidden="true"></i>
                                                                        </div>


                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('canal')">
                                                                            <i class="fa fa-bookmark fa-3x" aria-hidden="true"></i>
                                                                        </div>

                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('agente')">
                                                                            <i class="fa fa-handshake-o fa-3x" aria-hidden="true"></i>
                                                                        </div>
                                                                        <div class="col-lg-2 col-md-2 col-sm-2 boxSales" onclick="reedirigir('producto')">
                                                                            <i class="fa fa-archive fa-3x" aria-hidden="true"></i>
                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>


                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">

                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Año</label>

                                                                                <select class="form-control" id="anio" onchange="cargarVentasProductoMonto(1,'','');cargarVentasProductoUnidades(1,'','');">

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
                                                                                <label>Canal</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control" id="canal" onchange="cargarVentasProductoMonto(1,'','');cargarVentasProductoUnidades(1,'','');">
                                                                                    <option value=""></option>
                                                                                    <option value="SIN ASIGNAR">SIN ASIGNAR</option>
                                                                                    <option value="FLOTILLAS">FLOTILLAS</option>
                                                                                    <option value="MAYOREO">MAYOREO</option>
                                                                                    <option value="RUTAS">RUTAS</option>
                                                                                    <option value="TIENDAS">TIENDAS</option>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Agente</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorAgentes" id="agente" onchange="cargarVentasProductoMonto(1,'','');cargarVentasProductoUnidades(1,'','');">
                                                                                    <option value="">Todos</option>
                                                                                    <?php

                                                                                    $agente = new ModelAmdon();
                                                                                    $agentes = $agente->mdlObtenerListaAgentes();

                                                                                    foreach ($agentes as $key => $value) {
                                                                                        echo "<option value='" . $value["CNOMBREAGENTE"] . "'>" . $value['CNOMBREAGENTE'] . "</option>";
                                                                                    }
                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" id="searchClienteVenta" class="btn btn-primary" data-toggle="modal" data-target="#modalClientesVenta"> <i class="fa fa-search"></i>Buscar cliente</button>


                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" id="searchProductoVenta" class="btn btn-primary" data-toggle="modal" data-target="#modalProductosVenta"> <i class="fa fa-search"></i>Buscar producto</button>


                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <button type="button" id="limpiarProductosVenta" class="btn btn-primary" onclick="cargarVentasProductoMonto(1,'','');cargarVentasProductoUnidades(1,'','');"><i class="fa fa-trash"></i>Limpiar</button>

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="cargarVentasProductoMonto(1,'','');cargarVentasProductoUnidades(1,'','');">

                                                                                    <option selected="">15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option>100</option>
                                                                                    <option>500</option>
                                                                                    <option>1000</option>
                                                                                    <option>1500</option>
                                                                                    <option>2000</option>
                                                                                </select>
                                                                            </div>


                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">


                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="ventasProductoMontoData">

                                                                </div>
                                                                <div class="ventasProductoUnidadesData">

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
<div class="modal" id="modalClientesVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
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
                                <input type="text" class="form-control" id="nombreClienteSearch" placeholder="Buscar cliente" onkeyup="loadClientsVenta(1)">
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
<div class="modal" id="modalProductosVenta" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Buscar Producto</h5>
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
                                <input type="text" class="form-control" id="nombreProductoSearch" placeholder="Buscar producto" onkeyup="loadProductosVenta(1)">
                            </div>

                        </div>
                    </div>
                </form>
                <div id="loader2" style="position: absolute;	text-align: center;	top: 55px;	width: 100%;display:none;"></div><!-- Carga gif animado -->
                <div class="outer_div2"></div><!-- Datos ajax Final -->
            </div>
            <div class="modal-footer">

                <button type="button" class="btn btn-secondary" data-dismiss="modal">Salir</button>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    shortcut.add("Ctrl+B", function() {
        document.getElementById("searchClienteVenta").click();
    });
    shortcut.add("Ctrl+X", function() {
        document.getElementById("searchProductoVenta").click();
    });
    shortcut.add("Ctrl+Z", function() {
        document.getElementById("limpiarProductosVenta").click();
    });

    $(document).ready(function() {
        $('.selectorAgentes').select2();
    });
</script>