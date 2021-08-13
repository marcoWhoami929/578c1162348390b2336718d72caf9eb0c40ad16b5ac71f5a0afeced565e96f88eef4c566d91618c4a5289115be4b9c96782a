<?php
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'busquedaClientes') {

    include('../clases/busquedaDatos.php');
    $database = new busquedaDatos();
    //Recibir variables enviadas
    $cliente = strip_tags($_REQUEST['nombreClienteSearch']);
    $per_page = intval($_REQUEST['per_page']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("cliente" => $cliente, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOCLIENTE", "CRAZONSOCIAL"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getClientes($search, $aColumns);

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
            <table class="table table-responsive table-striped table-hover " id="tableListaClientes">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>RFC</th>
                        <th>RAZON SOCIAL</th>
                        <th>FECHA ALTA</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {

                    ?>
                        <tr>
                            <th><?= $row['CCODIGOCLIENTE'] ?></th>
                            <td style="font-weight:bold"><?= $row['CRFC'] ?></td>
                            <td style="font-weight:bold"><?= $row['CRAZONSOCIAL'] ?></td>
                            <td style="font-weight:bold"><?= $row['CFECHAALTA'] ?></td>
                            <td><button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cargarVentasCliente(1,'<?php echo $row['CRAZONSOCIAL'] ?>')"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateListaClientes();

            ?>
        </div>
    <?php
    }
}
if ($action == 'busquedaClientesVenta') {

    include('../clases/busquedaDatos.php');
    $database = new busquedaDatos();
    //Recibir variables enviadas
    $cliente = strip_tags($_REQUEST['nombreClienteSearch']);
    $per_page = intval($_REQUEST['per_page']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("cliente" => $cliente, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOCLIENTE", "CRAZONSOCIAL"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getClientes($search, $aColumns);

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
            <table class="table table-responsive table-striped table-hover " id="tableListaClientes">
                <thead>
                    <tr>
                        <th>CODIGO</th>
                        <th>RFC</th>
                        <th>RAZON SOCIAL</th>
                        <th>FECHA ALTA</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {

                    ?>
                        <tr>
                            <th><?= $row['CCODIGOCLIENTE'] ?></th>
                            <td style="font-weight:bold"><?= $row['CRFC'] ?></td>
                            <td style="font-weight:bold"><?= $row['CRAZONSOCIAL'] ?></td>
                            <td style="font-weight:bold"><?= $row['CFECHAALTA'] ?></td>
                            <td><button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cargarVentasProductoMonto(1,'<?php echo $row['CRAZONSOCIAL'] ?>','');cargarVentasProductoUnidades(1,'<?php echo $row['CRAZONSOCIAL'] ?>','')"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateListaClientesVenta();

            ?>
        </div>
    <?php
    }
}
if ($action == 'busquedaProductosVenta') {

    include('../clases/busquedaDatos.php');
    $database = new busquedaDatos();
    //Recibir variables enviadas
    $producto = strip_tags($_REQUEST['producto']);
    $per_page = intval($_REQUEST['per_page']);
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;
    $search = array("producto" => $producto, "per_page" => $per_page, "offset" => $offset);

    $aColumns = array("CCODIGOPRODUCTO", "CNOMBREPRODUCTO"); //Columnas de busqueda
    //consulta principal para recuperar los datos
    $datos = $database->getProductos($search, $aColumns);

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
            <table class="table table-responsive table-striped table-hover " id="tableListaClientes">
                <thead>
                    <tr>
                        <th>CODIGO PRODUCTO</th>
                        <th>NOMBRE PRODUCTO</th>
                        <th></th>

                    </tr>
                </thead>
                <tbody>
                    <?php
                    $finales = 0;
                    foreach ($datos as $key => $row) {

                    ?>
                        <tr>
                            <th><?= $row['CCODIGOPRODUCTO'] ?></th>
                            <td style="font-weight:bold"><?= $row['CNOMBREPRODUCTO'] ?></td>
                            <td><button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="cargarVentasProductoMonto(1,'','<?php echo $row['CCODIGOPRODUCTO'] ?>');cargarVentasProductoUnidades(1,'','<?php echo $row['CCODIGOPRODUCTO'] ?>')"><i class="fa fa-plus" style="color:white"></i></button></td>
                        </tr>
                    <?php
                        $finales++;
                    }

                    ?>

                </tbody>

            </table>

        </div>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateListaProductosVenta();

            ?>
        </div>
<?php
    }
}

?>