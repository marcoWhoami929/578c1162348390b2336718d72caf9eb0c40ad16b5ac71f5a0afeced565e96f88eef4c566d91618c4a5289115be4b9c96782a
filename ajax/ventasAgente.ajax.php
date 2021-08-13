<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasAgente') {
    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $año = strip_tags($_REQUEST['anio']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("año" => $año, "estatus" => $estatus, "agente" => $agente, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasAgente($tables, $campos, $search);

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
                        <th>AGENTE</th>
                        <th>ENERO</th>
                        <th>FEBRERO</th>
                        <th>MARZO</th>
                        <th>ABRIL</th>
                        <th>MAYO</th>
                        <th>JUNIO</th>
                        <th>JULIO</th>
                        <th>AGOSTO</th>
                        <th>SEPTIEMBRE</th>
                        <th>OCTUBRE</th>
                        <th>NOVIEMBRE</th>
                        <th>DICIEMBRE</th>
                        <th>TOTALES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $mes1 = 0;
                    $mes2 = 0;
                    $mes3 = 0;
                    $mes4 = 0;
                    $mes5 = 0;
                    $mes6 = 0;
                    $mes7 = 0;
                    $mes8 = 0;
                    $mes9 = 0;
                    $mes10 = 0;
                    $mes11 = 0;
                    $mes12 = 0;
                    $mesTotales = 0;

                    foreach ($datos as $key => $row) {
                        $mes1 += $row['1'];
                        $mes2 += $row['2'];
                        $mes3 += $row['3'];
                        $mes4 += $row['4'];
                        $mes5 += $row['5'];
                        $mes6 += $row['6'];
                        $mes7 += $row['7'];
                        $mes8 += $row['8'];
                        $mes9 += $row['9'];
                        $mes10 += $row['10'];
                        $mes11 += $row['11'];
                        $mes12 += $row['12'];
                        $mesTotales += $row['Totales'];
                    ?>
                        <tr>
                            <th><?= $row['NombreAgente']; ?></th>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['3'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['4'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['5'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['6'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['7'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['8'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['9'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['10'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['11'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['12'], 2) ?></td>
                            <th style="font-weight:bold;">$<?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }
                    ?>
                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold">$<?= number_format($mes1, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes2, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes3, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes4, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes5, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes6, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes7, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes8, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes9, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes10, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes11, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mes12, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($mesTotales, 2) ?></th>
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
            echo $pagination->paginateVentasAgente();

            ?>
        </div>
<?php
    }
}

?>