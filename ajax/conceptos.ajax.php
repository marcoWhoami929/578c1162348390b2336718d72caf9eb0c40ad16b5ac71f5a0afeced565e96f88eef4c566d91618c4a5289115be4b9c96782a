<?php
error_reporting(E_ALL);
$action = (isset($_REQUEST['action']) && $_REQUEST['action'] != NULL) ? $_REQUEST['action'] : '';
if ($action == 'conceptoPinturas') {

    include('../clases/conceptos.php');
    $database = new conceptos();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $CCENTROTRABAJO = strip_tags($_REQUEST['CCENTROTRABAJO']);
    $CCANALCOMERCIAL = strip_tags($_REQUEST['CCANALCOMERCIAL']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.CONCEPTOSPINTURAS";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $parametros = array("param1" => "CNOMBREAGENTE");
    $search = array("query" => $query, "CCENTROTRABAJO" => $CCENTROTRABAJO, "CCANALCOMERCIAL" => $CCANALCOMERCIAL, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getData($tables, $campos, $search, $parametros);
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
?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE AGENTE</th>
                    <th>CENTRO DE TRABAJO</th>
                    <th>CANAL COMERCIAL</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {

                ?>
                    <tr>
                        <td><?= $row['CIDPARAM']; ?></td>
                        <td><?= $row['CNOMBREAGENTE']; ?></td>
                        <td><?= $row['CCENTROTRABAJO'] ?></td>
                        <td> <?= $row['CCANALCOMERCIAL'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="obtenerDatosConcepto(<?= $row['CIDPARAM']; ?>,'PINTURAS')"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" onclick="eliminarConcepto(<?= $row['CIDPARAM']; ?>,'PINTURAS')"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginatePinturas();

            ?>
        </div>
    <?php
    }
}
if ($action == 'conceptoFlex') {

    include('../clases/conceptos.php');
    $database = new conceptos();
    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $CCENTROTRABAJO = strip_tags($_REQUEST['CCENTROTRABAJO']);
    $CCANALCOMERCIAL = strip_tags($_REQUEST['CCANALCOMERCIAL']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "dbo.CONCEPTOSFLEX";
    $campos = "*";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $parametros = array("param1" => "CNOMBREAGENTE");
    $search = array("query" => $query, "CCENTROTRABAJO" => $CCENTROTRABAJO, "CCANALCOMERCIAL" => $CCANALCOMERCIAL, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getData($tables, $campos, $search, $parametros);
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
    ?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>NOMBRE AGENTE</th>
                    <th>CENTRO DE TRABAJO</th>
                    <th>CANAL COMERCIAL</th>
                    <th>ACCIÓN</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {

                ?>
                    <tr>
                        <td><?= $row['CIDPARAM']; ?></td>
                        <td><?= $row['CNOMBREAGENTE']; ?></td>
                        <td><?= $row['CCENTROTRABAJO'] ?></td>
                        <td> <?= $row['CCANALCOMERCIAL'] ?></td>
                        <td>
                            <button type="button" class="btn btn-primary" onclick="obtenerDatosConcepto(<?= $row['CIDPARAM']; ?>,'FLEX')"><i class="fa fa-edit"></i></button>
                            <button type="button" class="btn btn-danger" onclick="eliminarConcepto(<?= $row['CIDPARAM']; ?>,'FLEX')"><i class="fa fa-trash"></i></button>
                        </td>
                    </tr>
                <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateFlex();

            ?>
        </div>
    <?php
    }
}
if ($action == 'bitacora') {

    include('../clases/conceptos.php');
    $database = new conceptos();

    //Recibir variables enviadas
    $query = strip_tags($_REQUEST['query']);
    $accion = strip_tags($_REQUEST['accion']);
    $per_page = intval($_REQUEST['per_page']);
    $tables = "bitacora";
    $campos = "bi.*,acc.accion as Evento";
    $vista = "cargarBitacora";
    //Variables de paginación
    $page = (isset($_REQUEST['page']) && !empty($_REQUEST['page'])) ? $_REQUEST['page'] : 1;
    $adjacents  = 4; //espacio entre páginas después del número de adyacentes
    $offset = ($page - 1) * $per_page;

    $search = array("query" => $query, "accion" => $accion, "per_page" => $per_page, "offset" => $offset);
    //consulta principal para recuperar los datos
    $datos = $database->getBitacora($tables, $campos, $search);
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
    ?>
        <table class="table table-striped table-hover ">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Usuario</th>
                    <th>Evento</th>
                    <th>Accion</th>
                    <th>Fecha</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $finales = 0;
                foreach ($datos as $key => $row) {

                ?>
                    <tr>
                        <td><?= $row['id']; ?></td>
                        <td><?= $row['usuario']; ?></td>
                        <td><?= $row['Evento'] ?></td>
                        <td> <?= $row['accion'] ?></td>
                        <td> <?= $row['fecha'] ?></td>

                    </tr>
                <?php
                    $finales++;
                }
                ?>
            </tbody>
        </table>
        <div class="clearfix">
            <?php
            $inicios = $offset + 1;
            $finales += $inicios - 1;
            echo '<div class="hint-text">Mostrando ' . $inicios . ' al ' . $finales . ' de ' . $numrows . ' registros</div>';


            include '../clases/pagination.php'; //include pagination class
            $pagination = new Pagination($page, $total_pages, $adjacents);
            echo $pagination->paginateBitacora($vista);

            ?>
        </div>
<?php
    }
}

?>