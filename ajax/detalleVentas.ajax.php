<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'detalleVentasCliente') {

    include('../clases/detalleVentas.php');
    $database = new detalleVentas();
    //Recibir variables enviadas
    $centroTrabajo = strip_tags($_REQUEST['centroTrabajo']);
    $agente = strip_tags($_REQUEST['agente']);
    $canal = strip_tags($_REQUEST['canal']);
    $cliente = strip_tags($_REQUEST['cliente']);
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
    $search = array("centroTrabajo" => $centroTrabajo, "agente" => $agente, "canal" => $canal, "cliente" => $cliente, "año" => $año, "dia" => $dia, "per_page" => $per_page, "offset" => $offset);
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
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {

                        $iva += $row['IVA'];
                        $total += $row['Total'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><a onclick="detalleProductosVenta(<?= $row['CIDDOCUMENTO']; ?>,'<?= $row['Empresa']; ?>')"><?= $row['CRAZONSOCIAL']; ?></a></th>
                            <td><?= $row['CNOMBRECONCEPTO']; ?></td>
                            <td><?= $row['CSERIEDOCUMENTO']; ?></td>
                            <td><?= (int)$row['CFOLIO'] ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['IVA'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Total'], 2) ?></td>

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
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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
    $empresa = strip_tags($_REQUEST['empresa']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.admDocumentos";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("idDocumento" => $idDocumento, "empresa" => $empresa, "per_page" => $per_page, "offset" => $offset);
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
                        <th>#</th>
                        <th>CODIGO</th>
                        <th>PRODUCTO</th>
                        <th>UNIDAD MEDIDA</th>
                        <th>UNIDADES</th>
                        <th>PRECIO</th>
                        <th>VENTA</th>
                        <th>IVA</th>
                        <th>TOTAL</th>


                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    $precio = 0;
                    $iva = 0;
                    $total = 0;
                    $desglose = 0;
                    $totales = 0;
                    foreach ($datos as $key => $row) {
                        $precio += $row['CPRECIO'];
                        $iva += $row['CIMPUESTO1'];
                        $total += $row['CTOTAL'];
                        $desglose += $row['Desglose'];

                    ?>
                        <tr>
                            <th><?= number_format($row['CNUMEROMOVIMIENTO'], 0); ?></th>
                            <td><?= $row['CCODIGOPRODUCTO']; ?></td>
                            <td><?= $row['CNOMBREPRODUCTO']; ?></td>
                            <td><?= $row['Unidad']; ?></td>
                            <td><?= number_format($row['CUNIDADESCAPTURADAS'], 2); ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CPRECIO'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['Desglose'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CIMPUESTO1'], 2) ?></td>
                            <td style="font-weight:bold;text-align:right">$<?= number_format($row['CTOTAL'], 2) ?></td>

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
                        <th style="font-weight:bold;text-align:right">$<?= number_format($precio, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($desglose, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($iva, 2) ?></th>
                        <th style="font-weight:bold;text-align:right">$<?= number_format($total, 2) ?></th>


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