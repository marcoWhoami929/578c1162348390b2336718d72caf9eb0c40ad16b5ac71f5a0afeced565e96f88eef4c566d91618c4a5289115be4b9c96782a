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

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>


                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">


                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn btn-primary" onclick="cargarConceptosPinturas(1);"><i class="fa fa-search"></i></button>

                                                                                <label>Nombre</label>
                                                                                <input type="text" class="form-control" id="name">

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Centro De Trabajo</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorCentroTrabajo" id="centroTrabajo" onchange="cargarConceptosPinturas(1);">
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
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control selectorCanalComercial" id="canalComercial" onchange="cargarConceptosPinturas(1);">
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
                                                                            <div class="filter-group">
                                                                                <label>Mostrar</label>
                                                                                <select class="form-control" id="per_page" onchange="cargarConceptosPinturas(1);">

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
                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#registroConcepto"><i class="fa fa-plus"></i> Nuevo</button>
                                                                            </div>

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
<!-- Modal Edicion-->
<div class="modal fade" id="edicionConcepto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backgroundModal">
                <h5 class="modal-title">Edición Concepto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formActualizarConcepto" enctype="multipart/form-data">
                    <div class="form-group">
                        <input type="hidden" class="form-control" id="idConcepto" placeholder="">
                        <label for="nombreAgente">Nombre Agente</label>
                        <input type="text" class="form-control" id="nombreAgente" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nombreCentroTrabajo">Centro de Trabajo</label>
                        <input type="text" class="form-control" id="nombreCentroTrabajo" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nombreCanalComercial">Canal Comercial</label>
                        <input type="text" class="form-control" id="nombreCanalComercial" placeholder="">
                        <input type="hidden" class="form-control" id="empresa" value="PINTURAS">
                        <div class="msg"></div>
                    </div>
                    <div class="form-group">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Actualizar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>
<!-- Modal Registro-->
<div class="modal fade" id="registroConcepto" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header backgroundModal">
                <h5 class="modal-title">Nuevo Concepto</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form id="formRegistroConcepto" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="nombreAgente">Nombre Agente</label>
                        <input type="text" class="form-control" id="nombreAgenteRegistro" placeholder="" style="text-transform:uppercase;" required>
                    </div>
                    <div class="form-group">
                        <label for="nombreCentroTrabajo">Centro de Trabajo</label>
                        <input type="text" class="form-control" id="nombreCentroTrabajoRegistro" placeholder="" style="text-transform:uppercase;">
                    </div>
                    <div class="form-group">
                        <label for="nombreCanalComercial">Canal Comercial</label>
                        <input type="text" class="form-control" id="nombreCanalComercialRegistro" placeholder="" style="text-transform:uppercase;">
                        <input type="hidden" class="form-control" id="empresaRegistro" value="PINTURAS">
                        <div class="msg"></div>
                    </div>
                    <div class="form-group">

                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                        <button type="submit" class="btn btn-primary">Registrar</button>
                    </div>
                </form>

            </div>

        </div>
    </div>
</div>