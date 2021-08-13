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
                                <div class="col-md-8">
                                    <div class="page-header-title">
                                        <h5 class="m-b-10">CONCEPTOS</h5>
                                        <p class="m-b-0">LISTADO DE CONCEPTOS DE CONFIGURACION</p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Conceptos</a>
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
                                                                        <div class="col-sm-4">
                                                                            <h2>Conceptos Pinturas</h2>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 140px;left: 50%">

                                                                </div>


                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-sm-12">
                                                                            <button type="button" class="btn btn-primary"><i class="fa fa-search" onclick="cargarConceptosPinturas(1);"></i></button>
                                                                            <div class="filter-group">
                                                                                <label>Nombre</label>
                                                                                <input type="text" class="form-control" id="name">
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Centro De Trabajo</label>

                                                                                <select class="form-control" id="centroTrabajo" onchange="cargarConceptosPinturas(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <?php
                                                                                    $tabla = "dbo.CONCEPTOSPINTURAS";
                                                                                    $centrosTrabajo = ControllerAdmon::ctrListarCentroTrabajo($tabla);

                                                                                    foreach ($centrosTrabajo as $key => $value) {
                                                                                        echo "<option value=" . str_replace(' ', '-', $value["CCENTROTRABAJO"]) . ">" . $value["CCENTROTRABAJO"] . "</option>";
                                                                                    }

                                                                                    ?>
                                                                                </select>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Canal Comercial</label>
                                                                                <select class="form-control" id="canalComercial" onchange="cargarConceptosPinturas(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <?php
                                                                                    $tabla = "dbo.CONCEPTOSPINTURAS";
                                                                                    $canalComercial = ControllerAdmon::ctrListarCanalComercial($tabla);
                                                                                    foreach ($canalComercial as $key => $value) {
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
                                                                            <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                        </div>

                                                                        <div class="col-sm-3 text-right">
                                                                            <div class="show-entries">
                                                                                <span>Mostrar</span>
                                                                                <select class="form-control" id="per_page" onchange="cargarConceptosPinturas(1);">
                                                                                    <option>5</option>
                                                                                    <option>10</option>
                                                                                    <option selected="">15</option>
                                                                                    <option>20</option>
                                                                                </select>

                                                                            </div>
                                                                        </div>


                                                                    </div>
                                                                </div>
                                                                <div class="datos_ajax">

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