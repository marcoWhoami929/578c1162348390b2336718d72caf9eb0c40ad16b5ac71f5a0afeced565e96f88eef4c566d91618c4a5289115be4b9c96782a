<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasYearToDay') {

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasYearToDay($tables, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <th>2020</th>
                        <th>2021</th>
                        <th>CRECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $año1 = 0;
                    $año2 = 0;
                    $añoTotales = 0;
                    foreach ($datos as $key => $row) {
                        $año1 += $row['2020'];
                        $año2 += $row['2021'];
                    ?>
                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2020'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2021'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"><?= number_format($row['Crecimiento'], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right"></th>

                    </tr>
                </tfoot>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'ventasYearToWeek') {
    $arreglo = array();
    $arreglo2 = array();
    $arreglo3 = array();
    $arreglo4 = array();
    $week = date('W');
    $year = 2020;
    for ($day = 1; $day < 7; $day++) {
        $diaElegido = date('Y-m-d', strtotime($year . "W" . ($week) . $day));
        array_push($arreglo, $diaElegido);
        $dia = date('d', strtotime($year . "W" . ($week) . $day));
        $mes = date('m', strtotime($year . "W" . ($week) . $day));
        $año = date('Y', strtotime($year . "W" . ($week) . $day));
        $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
        array_push($arreglo3, $fecha);
    }
    for ($i = 2; $i < 8; $i++) {

        $diaElegido2 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
        array_push($arreglo2, $diaElegido2);
        $dia2 = date('d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
        $mes2 = date('m', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
        $año2 = date('Y', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
        $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
        array_push($arreglo4, $fecha2);
    }
    $arregloFecha1 = array();
    $arregloFecha2 = array();
    for ($day = 1; $day < 7; $day++) {
        $fecha1 = date('Y-m-d', strtotime($year . "W" . ($week) . $day));
        array_push($arregloFecha1, $fecha1);
    }
    for ($i = 2; $i < 8; $i++) {
        $fecha2 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
        array_push($arregloFecha2, $fecha2);
    }

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasYearToWeek($tables, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <?php

                        echo "<th>" . $arregloFecha1[0] . "</th>";
                        echo "<th>" . $arregloFecha2[0] . "</th>";
                        echo "<th>" . $arregloFecha1[1] . "</th>";
                        echo "<th>" . $arregloFecha2[1] . "</th>";
                        echo "<th>" . $arregloFecha1[2] . "</th>";
                        echo "<th>" . $arregloFecha2[2] . "</th>";
                        echo "<th>" . $arregloFecha1[3] . "</th>";
                        echo "<th>" . $arregloFecha2[3] . "</th>";
                        echo "<th>" . $arregloFecha1[4] . "</th>";
                        echo "<th>" . $arregloFecha2[4] . "</th>";
                        echo "<th>" . $arregloFecha1[5] . "</th>";
                        echo "<th>" . $arregloFecha2[5] . "</th>";


                        ?>
                        <th>CRECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $numDia1 = 0;
                    $numDia2 = 0;
                    $numDia3 = 0;
                    $numDia4 = 0;
                    $numDia5 = 0;
                    $numDia6 = 0;
                    $numDia7 = 0;
                    $numDia8 = 0;
                    $numDia9 = 0;
                    $numDia10 = 0;
                    $numDia11 = 0;
                    $numDia12 = 0;

                    foreach ($datos as $key => $row) {
                        $numDia1 +=  $row[$arreglo3[0]];
                        $numDia2 +=  $row[$arreglo4[0]];
                        $numDia3 +=  $row[$arreglo3[1]];
                        $numDia4 +=  $row[$arreglo4[1]];
                        $numDia5 +=  $row[$arreglo3[2]];
                        $numDia6 +=  $row[$arreglo4[2]];
                        $numDia7 +=  $row[$arreglo3[3]];
                        $numDia8 +=  $row[$arreglo4[3]];
                        $numDia9 +=  $row[$arreglo3[4]];
                        $numDia10 +=  $row[$arreglo4[4]];
                        $numDia11 +=  $row[$arreglo3[5]];
                        $numDia12 +=  $row[$arreglo4[5]];

                    ?>

                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[0]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[0]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[1]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[1]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[2]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[2]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[3]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[3]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[4]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[4]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[$arreglo3[5]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row[$arreglo4[5]], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"> <?= number_format($row["Crecimiento"], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia12, 2) ?></th>
                        <th style="font-weight:bold;text-align:right"></th>

                    </tr>
                </tfoot>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'ventasYearToMonth') {

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas

    $vista = strip_tags($_REQUEST['vista']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $per_page = intval($_REQUEST['per_page']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("estatus" => $estatus, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasYearToMonth($tables, $campos, $search);

    $countAll = $database->getCounter();
    $row = $countAll;

    if ($row > 0) {
        $numrows = $countAll;;
    } else {
        $numrows = 0;
    }
    $total_pages = ceil($numrows / $per_page);

    //Recorrer los datos recuperados

    if ($numrows > 0) {
    ?> <div class="fixedColumns">
            <table class="table table-responsive table-striped table-hover ">
                <thead>
                    <tr>
                        <th>CANAL</th>
                        <?php
                        $meses = ["ENE", "ENE", "FEB", "FEB", "MAR", "MAR", "ABR", "ABR", "MAY", "MAY", "JUN", "JUN", "JUL", "JUL", "AGO", "AGO", "SEP", "SEP", "OCT", "OCT", "NOV", "NOV", "DIC", "DIC"];

                        for ($i = 0; $i < 24; $i++) {
                            echo "<th>" . $meses[$i] . "</th>";
                        }

                        ?>
                        <th>CRECIMIENTO</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $numMes1 = 0;
                    $numMes2 = 0;
                    $numMes3 = 0;
                    $numMes4 = 0;
                    $numMes5 = 0;
                    $numMes6 = 0;
                    $numMes7 = 0;
                    $numMes8 = 0;
                    $numMes9 = 0;
                    $numMes10 = 0;
                    $numMes11 = 0;
                    $numMes12 = 0;
                    $numMes13 = 0;
                    $numMes14 = 0;
                    $numMes15 = 0;
                    $numMes16 = 0;
                    $numMes17 = 0;
                    $numMes18 = 0;
                    $numMes19 = 0;
                    $numMes20 = 0;
                    $numMes21 = 0;
                    $numMes22 = 0;
                    $numMes23 = 0;
                    $numMes24 = 0;
                    foreach ($datos as $key => $row) {
                        $numMes1 +=  $row["2020-1"];
                        $numMes2 +=  $row["2021-1"];
                        $numMes3 +=  $row["2020-2"];
                        $numMes4 +=  $row["2021-2"];
                        $numMes5 +=  $row["2020-3"];
                        $numMes6 +=  $row["2021-3"];
                        $numMes7 +=  $row["2020-4"];
                        $numMes8 +=  $row["2021-4"];
                        $numMes9 +=  $row["2020-5"];
                        $numMes10 +=  $row["2021-5"];
                        $numMes11 +=  $row["2020-6"];
                        $numMes12 +=  $row["2021-6"];
                        $numMes13 +=  $row["2020-7"];
                        $numMes14 +=  $row["2021-7"];
                        $numMes15 +=  $row["2020-8"];
                        $numMes16 +=  $row["2021-8"];
                        $numMes17 +=  $row["2020-9"];
                        $numMes18 +=  $row["2021-9"];
                        $numMes19 +=  $row["2020-10"];
                        $numMes20 +=  $row["2021-10"];
                        $numMes21 +=  $row["2020-11"];
                        $numMes22 +=  $row["2021-11"];
                        $numMes23 +=  $row["2020-12"];
                        $numMes24 +=  $row["2021-12"];

                    ?>

                        <tr>
                            <th><?= $row['canalComercial']; ?></th>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-1"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-1"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-2"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-2"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-3"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-3"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-4"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-4"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-5"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-5"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-6"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-6"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-7"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-7"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-8"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-8"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-9"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-9"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-10"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-10"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-11"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-11"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row["2020-12"], 2) ?></td>
                            <td style='font-weight:bold;text-align:right;background:#F5CBA7;'>$ <?= number_format($row["2021-12"], 2) ?></td>
                            <td style="font-weight:bold;text-align:right"> <?= number_format($row["Crecimiento"], 2) ?>%</td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes7, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes8, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes9, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes10, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes11, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes12, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes13, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes14, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes15, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes16, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes17, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes18, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes19, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes20, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes21, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes22, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes23, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numMes24, 2) ?></th>
                        <th style="font-weight:bold;text-align:right"></th>

                    </tr>
                </tfoot>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateVentasYearToDay($vista);

            ?>
        </div>
<?php
    }
}

?>