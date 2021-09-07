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
            <table class="table table-responsive table-striped table-hover " id="tableVentasYearToDay">
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
                <!--
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año1, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($año2, 2) ?></th>
                        <th style="font-weight:bold;text-align:right"></th>

                    </tr>
                </tfoot>
                -->
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