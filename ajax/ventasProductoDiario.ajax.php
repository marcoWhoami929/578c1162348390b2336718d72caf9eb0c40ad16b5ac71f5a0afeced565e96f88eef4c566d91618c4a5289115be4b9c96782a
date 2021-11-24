<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
$semana = strip_tags($_REQUEST['semana']);
if ($semana == "") {
    $week = date("W");
} else {
    $week = $semana;
}
$arreglo = array();
for ($i = 2; $i < 8; $i++) {

    $dia = date('d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
    array_push($arreglo, $dia);
}
if ($action == 'ventasProductoMonto') {

    include('../clases/detalleVentasDiario.php');
    $database = new detalleVentasDiario();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $producto = strip_tags($_REQUEST['producto']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "producto" => $producto, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "semana" => $week, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasProductoMonto($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasProducto">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <?php

                        for ($i = 2; $i < 8; $i++) {
                            echo "<th>" . date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day')) . "</th>";
                        }
                        ?>

                        <th>TOTAL GENERAL</th>
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
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {

                        $numDia1 +=  $row[(int)$arreglo[0]];
                        $numDia2 +=  $row[(int)$arreglo[1]];
                        $numDia3 +=  $row[(int)$arreglo[2]];
                        $numDia4 +=  $row[(int)$arreglo[3]];
                        $numDia5 +=  $row[(int)$arreglo[4]];
                        $numDia6 +=  $row[(int)$arreglo[5]];
                        $mesTotales += $row['Totales'];


                    ?>
                        <tr>
                            <th><?= $row['CCODIGOPRODUCTO']; ?></th>
                            <th><?= $row['CNOMBREPRODUCTO']; ?></th>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[0]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[1]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[2]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[3]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[4]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'>$ <?= number_format($row[(int)$arreglo[5]], 2) ?></td>
                            <th style="font-weight:bold;text-align:right">$<?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($numDia6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($mesTotales, 2) ?></th>
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
            echo $pagination->paginateVentasProductoMonto($vista);

            ?>
        </div>
    <?php
    }
}

if ($action == 'ventasProductoUnidades') {

    include('../clases/detalleVentasDiario.php');
    $database = new detalleVentasDiario();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $producto = strip_tags($_REQUEST['producto']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "producto" => $producto, "año" => $año, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "semana" => $week, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasProductoUnidades($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasProducto">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>NOMBRE</th>
                        <?php

                        for ($i = 2; $i < 8; $i++) {
                            echo "<th>" . date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day')) . "</th>";
                        }
                        ?>

                        <th>TOTAL GENERAL</th>
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
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {

                        $numDia1 +=  $row[(int)$arreglo[0]];
                        $numDia2 +=  $row[(int)$arreglo[1]];
                        $numDia3 +=  $row[(int)$arreglo[2]];
                        $numDia4 +=  $row[(int)$arreglo[3]];
                        $numDia5 +=  $row[(int)$arreglo[4]];
                        $numDia6 +=  $row[(int)$arreglo[5]];
                        $mesTotales += $row['Totales'];


                    ?>
                        <tr>
                            <th><?= $row['CCODIGOPRODUCTO']; ?></th>
                            <th><?= $row['CNOMBREPRODUCTO']; ?></th>
                            <td style='font-weight:bold;text-align:right'> <?= number_format($row[(int)$arreglo[0]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'> <?= number_format($row[(int)$arreglo[1]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'> <?= number_format($row[(int)$arreglo[2]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'> <?= number_format($row[(int)$arreglo[3]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'> <?= number_format($row[(int)$arreglo[4]], 2) ?></td>
                            <td style='font-weight:bold;text-align:right'> <?= number_format($row[(int)$arreglo[5]], 2) ?></td>
                            <th><?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($numDia1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($numDia2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($numDia3, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($numDia4, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($numDia5, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($numDia6, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">#<?= number_format($mesTotales, 2) ?></th>
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
            echo $pagination->paginateVentasProductoUnidades($vista);

            ?>
        </div>
<?php
    }
}

?>