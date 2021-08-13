<?php
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
                            <!--<a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="fa fa-eye"></i></a>-->
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
                            <!--<a href="#" class="view" title="View Details" data-toggle="tooltip"><i class="fa fa-eye"></i></a>-->
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

?>