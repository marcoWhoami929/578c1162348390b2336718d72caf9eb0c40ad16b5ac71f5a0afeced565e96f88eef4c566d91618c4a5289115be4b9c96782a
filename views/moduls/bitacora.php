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
                                        <h5 class="m-b-10">BITACORA</h5>
                                        <p class="m-b-0"></p>

                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <ul class="breadcrumb">
                                        <li class="breadcrumb-item">
                                            <a href="dashboard"> <i class="fa fa-home"></i> </a>
                                        </li>
                                        <li class="breadcrumb-item"><a href="#!">Bitacora</a>
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

                                                        <div class="card-block table-border-style">
                                                            <div class="table-wrapper">
                                                                <div class="table-title">
                                                                    <div class="row">
                                                                        <div class="col-sm-4">
                                                                            <h2>Bitacora General</h2>

                                                                        </div>

                                                                    </div>
                                                                </div>

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:#00BCD4;font-size:22px">

                                                                </div>


                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">


                                                                            <div class="filter-group">
                                                                                <button type="button" class="btn btn-primary" onclick="cargarBitacora(1);"><i class="fa fa-search"></i></button>

                                                                                <label>Nombre</label>
                                                                                <input type="text" class="form-control" id="nombre">

                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Acciones</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control" id="accion" onchange="cargarBitacora(1);">
                                                                                    <option value="">Todos</option>
                                                                                    <option value="1">Acceso Sistema</option>
                                                                                    <option value="2">Salida Sistema</option>
                                                                                    <option value="3">Descarga Reporte</option>
                                                                                    <option value="4">Visualizacion Vista</option>
                                                                                </select>

                                                                            </div>

                                                                            <div class="filter-group">
                                                                                <label>Mostrar</label>
                                                                                <select class="form-control" id="per_page" onchange="cargarBitacora(1);">

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



                                                                    </div>

                                                                </div>

                                                            </div>

                                                            <div class="bitacora">

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