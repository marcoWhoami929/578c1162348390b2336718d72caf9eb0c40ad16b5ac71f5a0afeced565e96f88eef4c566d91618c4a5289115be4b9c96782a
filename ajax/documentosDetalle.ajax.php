<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'documentosDetalle') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['año']);
    $estatus = strip_tags($_REQUEST['estatus']);
    $canal = strip_tags($_REQUEST['canal']);
    $centro = strip_tags($_REQUEST['centro']);
    $agente = strip_tags($_REQUEST['agente']);
    $per_page = intval($_REQUEST['per_page']);
    $campo = strip_tags($_REQUEST['campo']);
    $orden = strip_tags($_REQUEST['orden']);
    $mes = strip_tags($_REQUEST['mes']);
    $abonado = strip_tags($_REQUEST['abonado']);

    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("query" => $query, "año" => $año, "mes" => $mes, "abonado" => $abonado, "estatus" => $estatus, "canal" => $canal, "centro" => $centro, "agente" => $agente, "per_page" => $per_page, "offset" => $offset, "campo" => $campo, "orden" => $orden);
    //consulta principal para recuperar los datos
    $datos = $database->getDocumentosDetalle($tables, $campos, $search);

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
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>FECHA</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>ABONO</th>
                        <th>PENDIENTE</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    $pendiente = 0;
                    $totalPendiente = 0;
                    $totalAbonado = 0;
                    foreach ($datos as $key => $row) {

                        $iva += $row['IVA'];
                        $total += $row['Total'];
                        $desglose += $row['Desglose'];
                        $totalPendiente += $row['Total'] - $row['1'];
                        $pendiente = $row['Total'] - $row['1'];
                        $totalAbonado += $row['1'];
                        if ($pendiente > -1 and $pendiente < 1) {
                            $color = "#1E6F21";
                        } else {
                            $color = "#F06770";
                        }

                    ?>
                        <tr style="background:<?php echo $color ?>;color:#ffffff">
                            <th><a onclick="detalleProductosVenta(<?= $row['CIDDOCUMENTO']; ?>)"><?= $row['CRAZONSOCIAL']; ?></a></th>
                            <td><?= $row['CNOMBRECONCEPTO']  ?></td>
                            <td><?= substr($row['CFECHA'], 0, 10) ?></td>
                            <td><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($pendiente, 2) ?></td>

                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th>Total General</th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right"></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($totalAbonado, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($totalPendiente, 2) ?></th>


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
            echo $pagination->paginateVentasCliente($vista);

            ?>
        </div>
<?php
    }
}

?>