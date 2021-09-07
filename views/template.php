<?php
session_start();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MATRIZ ADMON | 2021</title>
    <link rel="icon" href="views/images/favicon.ico" type="image/x-icon">
    <!-- Google font-->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:400,600,700" rel="stylesheet">
    <!-- waves.css -->
    <link rel="stylesheet" href="views/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- Required Fremwork -->
    <link rel="stylesheet" type="text/css" href="views/css/bootstrap/css/bootstrap.min.css">
    <!-- waves.css -->
    <link rel="stylesheet" href="views/pages/waves/css/waves.min.css" type="text/css" media="all">
    <!-- themify icon -->
    <link rel="stylesheet" type="text/css" href="views/icon/themify-icons/themify-icons.css">
    <!-- font-awesome-n -->
    <link rel="stylesheet" type="text/css" href="views/css/font-awesome-n.min.css">
    <link rel="stylesheet" type="text/css" href="views/css/font-awesome.min.css">
    <!-- scrollbar.css -->
    <link rel="stylesheet" type="text/css" href="views/css/jquery.mCustomScrollbar.css">
    <!-- Style.css -->
    <link rel="stylesheet" type="text/css" href="views/css/style.css">
    <!-- Select.css -->
    <link rel="stylesheet" type="text/css" href="views/css/select.css">
    <!-- tagsinput.css -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.css" rel="stylesheet" type="text/css" crossorigin="anonymous" />
    <!-- go diagram -->
    <?php
    if ($_GET["ruta"] == "dashboard2") {
        echo " <link rel='stylesheet' type='text/css' href='views/assets/css/style.css'>";
    } else {
    }

    ?>
    <!--- Datatable css-->
    <!---<link rel="stylesheet" type="text/css" href="views/css/datatable/datatable.css">-->

    <!-- Required Jquery -->
    <script type="text/javascript" src="views/js/jquery/jquery.min.js "></script>
    <script type="text/javascript" src="views/js/jquery-ui/jquery-ui.min.js "></script>
    <script type="text/javascript" src="views/js/popper.js/popper.min.js"></script>
    <script type="text/javascript" src="views/js/bootstrap/js/bootstrap.min.js "></script>
    <!-- waves js -->
    <script src="views/pages/waves/js/waves.min.js"></script>
    <!-- jquery slimscroll js -->
    <script type="text/javascript" src="views/js/jquery-slimscroll/jquery.slimscroll.js"></script>
    <script type="text/javascript" src="views/js/common-pages.js"></script>
    <!-- slimscroll js -->
    <script src="views/js/jquery.mCustomScrollbar.concat.min.js "></script>

    <!-- menu js -->
    <script src="views/js/pcoded.min.js"></script>
    <script src="views/js/vertical/vertical-layout.min.js"></script>

    <script type="text/javascript" src="views/js/script.js"></script>
    <!-- Sweet Alert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <!-- Select.js -->
    <script src="views/js/select.js"></script>
    <!-- shortcut.js -->
    <script src="views/js/shortcut.js"></script>
    <!-- forms actions.js -->
    <script src="views/js/formsActions.js"></script>
    <!-- highcharts -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/drilldown.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <!-- tags input -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-tagsinput/0.8.0/bootstrap-tagsinput.js"></script>



    <!-- go diagram-->
    <?php
    if ($_GET["ruta"] == "dashboard2") {
        echo "<script src='views/assets/js/goSamples.js'></script>";
        echo "<script src='views/assets/js/go.js'></script>";
    } else {
    }

    ?>

    <!-- Datatable js-->
    <!--<script src="views/js/datatable/datatable.js"></script>-->


</head>

<body themebg-pattern="theme1">
    <!-- Pre-loader start -->
    <div class="theme-loader">
        <div class="loader-track">
            <div class="preloader-wrapper">
                <div class="spinner-layer spinner-blue">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
                <div class="spinner-layer spinner-red">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-yellow">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>

                <div class="spinner-layer spinner-green">
                    <div class="circle-clipper left">
                        <div class="circle"></div>
                    </div>
                    <div class="gap-patch">
                        <div class="circle"></div>
                    </div>
                    <div class="circle-clipper right">
                        <div class="circle"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Pre-loader end -->
    <!-- HEADER -->
    <?php
    if (isset($_SESSION["validarSesionBackend"]) && $_SESSION["validarSesionBackend"] === "ok") {

        echo '<div class="wrapper">';
        // CABEZOTE
        include "moduls/header.php";
        // LATERAL
        include "moduls/sidebar.php";
        // CONTENIDO
        if (isset($_GET["ruta"])) {
            $carpeta = "views/moduls/";
            $class = $carpeta . $_GET["ruta"] . '.php';

            if (!file_exists($class)) {
                include "moduls/404.php";
            } else {
                include $class;
            }
        } else {

            include "moduls/dashboard.php";
        }
    } else {

        include "moduls/login.php";
    }
    echo '</div>';
    ?>
    <!-- JS PERSONALIZADO -->
    <script src="views/js/template.js"></script>
    <?php
    if ($_GET["ruta"] == "dashboard") {
        echo "<script src='views/js/chart.js'></script>";
        echo "<script src='views/js/indicadoresDashboard.js'></script>";
    } else {
    }

    ?>


</body>

</html>