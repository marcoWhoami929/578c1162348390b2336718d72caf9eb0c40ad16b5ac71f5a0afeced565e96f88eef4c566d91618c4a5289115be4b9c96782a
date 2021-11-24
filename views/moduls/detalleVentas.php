<div id="pcoded" class="pcoded">
    <div class="pcoded-overlay-box"></div>
    <div class="pcoded-container navbar-wrapper">

        <div class="pcoded-main-container">
            <div class="pcoded-wrapper">

                <div class="pcoded-content">

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

                                                                <div class="row text-center" id="loader" style="position: absolute;top: 80px;left: 40%;color:white;font-size:22px">

                                                                </div>


                                                                <div class="table-filter">
                                                                    <div class="row">

                                                                        <div class="col-lg-12 col-md-12 col-sm-12">
                                                                            <div class="filter-group">
                                                                                <a href="dashboard">
                                                                                    <div class="homeCircle">
                                                                                        <center><i class="fa fa-home fa-2x"></i></center>
                                                                                    </div>
                                                                                </a>
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <label>Año</label>

                                                                                <select class="form-control" id="anio" onchange="cargarVentasClienteDiario(1,'');">

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
                                                                                <label>Dia</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <input type="date" id="fecha" class="form-control" onchange="cargarDetalleVentasCliente(1,'');">
                                                                            </div>
                                                                            <div class="filter-group">
                                                                                <label>Centro de Trabajo</label>
                                                                                <span class="filter-icon"><i class="fa fa-filter"></i></span>
                                                                                <select class="form-control" id="centroTrabajo" onchange="cargarDetalleVentasCliente(1,'');">
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
                                                                                <label>Mostrar</label>
                                                                                <select class="form-control" id="per_page" onchange="cargarDetalleVentasCliente(1,'');">

                                                                                    <option>15</option>
                                                                                    <option>20</option>
                                                                                    <option>50</option>
                                                                                    <option selected="">100</option>
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

                                                            </div>
                                                            <div class="container">
                                                                <div class="row justify-content-center">
                                                                    <div class="col-12 col-sm-12 col-md-12">
                                                                        <div class="px-0 pt-0 pb-0 mt-0 mb-3">
                                                                            <form id="form">
                                                                                <ul id="progressbar">


                                                                                    <li class="active" id="step1">
                                                                                        <strong>Ventas Clientes</strong>
                                                                                    </li>

                                                                                    <li id="step2"><strong>Ventas Productos</strong></li>
                                                                                </ul>
                                                                                <div class="progress">
                                                                                    <div class="progress-bar"></div>
                                                                                </div> <br>
                                                                                <fieldset id="detailSales">
                                                                                    <div class="ventasDetalleClientes">

                                                                                    </div>
                                                                                    <input type="button" id="next-step" name="next-step" class="next-step btn btn-primary" value="" />
                                                                                </fieldset>


                                                                                <fieldset>
                                                                                    <div class="finish">
                                                                                        <input type="button" name="previous-step" id="previous-step" class="previous-step btn btn-primary" value="Volver" />
                                                                                        <div class="ventasDetalleProductos">

                                                                                        </div>
                                                                                    </div>

                                                                                </fieldset>
                                                                            </form>
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

<style>
    h2 {
        color: #00BCD4;
    }

    #form {
        text-align: center;
        position: relative;
        margin-top: 20px
    }

    #form fieldset {
        background: white;
        border: 0 none;
        border-radius: 0.5rem;
        box-sizing: border-box;
        width: 100%;
        margin: 0;
        padding-bottom: 20px;
        position: relative
    }

    .finish {
        text-align: center
    }

    #form fieldset:not(:first-of-type) {
        display: none
    }



    .text {
        color: #00BCD4;
        font-weight: normal
    }

    #progressbar {
        margin-bottom: 30px;
        overflow: hidden;
        color: lightgrey
    }

    #progressbar .active {
        color: #00BCD4
    }

    #progressbar li {
        list-style-type: none;
        font-size: 15px;
        width: 25%;
        float: left;
        position: relative;
        font-weight: 400
    }

    #progressbar #step0 {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: #00BCD4;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar #step1:before {
        content: "1"
    }

    #progressbar #step2:before {
        content: "2"
    }

    #progressbar #step3:before {
        content: "3"
    }

    #progressbar #step4:before {
        content: "4"
    }

    #progressbar li:before {
        width: 50px;
        height: 50px;
        line-height: 45px;
        display: block;
        font-size: 20px;
        color: #ffffff;
        background: lightgray;
        border-radius: 50%;
        margin: 0 auto 10px auto;
        padding: 2px
    }

    #progressbar li:after {
        content: '';
        width: 100%;
        height: 2px;
        background: lightgray;
        position: absolute;
        left: 0;
        top: 25px;
        z-index: -1
    }

    #progressbar li.active:before,
    #progressbar li.active:after {
        background: #00BCD4
    }

    .progress {
        height: 10px
    }

    .progress-bar {
        background-color: #00BCD4
    }
</style>