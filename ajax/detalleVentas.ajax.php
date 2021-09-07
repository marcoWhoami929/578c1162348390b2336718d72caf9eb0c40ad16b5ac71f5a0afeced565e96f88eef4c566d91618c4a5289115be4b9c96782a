<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'detalleVentasCliente') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $centroTrabajo = strip_tags($_REQUEST['centroTrabajo']);
    $vista = strip_tags($_REQUEST['vista']);
    $año = strip_tags($_REQUEST['anio']);
    $dia = strip_tags($_REQUEST['dia']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("centroTrabajo" => $centroTrabajo, "año" => $año, "dia" => $dia, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleCliente($tables, $campos, $search);

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
            <table class="table table-responsive table-striped table-hover " id="tableVentasCliente">
                <thead>
                    <tr>
                        <th>CLIENTE</th>
                        <th>CONCEPTO</th>
                        <th>SERIE</th>
                        <th>FOLIO</th>
                        <th>AGENTE</th>
                        <th>IMPORTE</th>
                        <th>DESC</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>DESGLOSE</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $importe = 0;
                    $desc = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {
                        $importe += $row['Importe'];
                        $desc += $row['Descuento'];
                        $iva += $row['IVA'];
                        $total += $row['Total'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><a onclick="detalleProductosVenta(<?= $row['CIDDOCUMENTO']; ?>)"><?= $row['CRAZONSOCIAL']; ?></a></th>
                            <td><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td><?= (int)$row['CFOLIO'] ?></td>
                            <td><?= $row['Agente']; ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Importe'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Descuento'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
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
                        <th style="font-weight:bold;text-align:right">$<?= number_format($importe, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desc, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>

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
            echo $pagination->paginateDetalleVentasClientes($vista);

            ?>
        </div>
    <?php
    }
}
if ($action == 'detalleVentasProductos') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $vista = strip_tags($_REQUEST['vista']);
    $idDocumento = strip_tags($_REQUEST['idDocumento']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("idDocumento" => $idDocumento, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getVentasDetalleProducto($tables, $campos, $search);

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
                        <th>NUMERO</th>
                        <th>PRODUCTO</th>
                        <th>UNIDAD MEDIDA</th>
                        <th>UNIDADES</th>
                        <th>PRECIO</th>
                        <th>NETO</th>
                        <th>DESC</th>
                        <th>IVA</th>
                        <th>TOTAL</th>
                        <th>DESGLOSE</th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $precio = 0;
                    $neto = 0;
                    $desc = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {
                        $precio += $row['CPRECIO'];
                        $neto += $row['CNETO'];
                        $desc += $row['CDESCUENTO1'];
                        $iva += $row['CIMPUESTO1'];
                        $total += $row['CTOTAL'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><?= number_format($row['CNUMEROMOVIMIENTO'], 0); ?></th>
                            <td><?= $row['CNOMBREPRODUCTO']; ?></td>
                            <td><?= $row['Unidad']; ?></td>
                            <td><?= $row['CUNIDADES']; ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CPRECIO'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CNETO'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CDESCUENTO1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CIMPUESTO1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CTOTAL'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
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
                        <th style="font-weight:bold;text-align:right">$<?= number_format($precio, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($neto, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desc, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>

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
            echo $pagination->paginateDetalleVentasProductos($vista);

            ?>
        </div>
<?php
    }
}

?>