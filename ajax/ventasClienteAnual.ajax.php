<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'ventasCliente') {

    include('../clases/detalleVentasAnual.php');
    $database = new detalleVentasAnual();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "estatus" => $estatus, "canal" => $canal, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasCliente($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasClienteAnual">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>2013</th>
                        <th>2014</th>
                        <th>2015</th>
                        <th>2016</th>
                        <th>2017</th>
                        <th>2018</th>
                        <th>2019</th>
                        <th>2020</th>
                        <th>2021</th>

                        <th>TOTAL GENERAL</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $año1 = 0;
                    $año2 = 0;
                    $año3 = 0;
                    $año4 = 0;
                    $año5 = 0;
                    $año6 = 0;
                    $año7 = 0;
                    $año8 = 0;
                    $año9 = 0;

                    $añoTotales = 0;
                    foreach ($datos as $key => $row) {
                        $año1 += $row['2013'];
                        $año2 += $row['2014'];
                        $año3 += $row['2015'];
                        $año4 += $row['2016'];
                        $año5 += $row['2017'];
                        $año6 += $row['2018'];
                        $año7 += $row['2019'];
                        $año8 += $row['2020'];
                        $año9 += $row['2021'];
                        $añoTotales += $row['Totales'];
                    ?>
                        <tr>
                            <th><?= $row['NombreCliente']; ?></th>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2013'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2014'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2015'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2016'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2017'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2018'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2019'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2020'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['2021'], 2) ?></td>
                            <th>$<?= number_format($row['Totales'], 2) ?></th>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold">$<?= number_format($año1, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año2, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año3, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año4, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año5, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año6, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año7, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año8, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($año9, 2) ?></th>
                        <th style="font-weight:bold">$<?= number_format($añoTotales, 2) ?></th>
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
            echo $pagination->paginateVentasClienteAnual();

            ?>
        </div>
<?php
    }
}

?>