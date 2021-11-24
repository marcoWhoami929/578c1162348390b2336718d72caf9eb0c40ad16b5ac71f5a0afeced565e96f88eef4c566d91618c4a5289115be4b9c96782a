<?php

include("../models/db_connect_param.php");
include("../models/db_connect.php");
class conceptos extends ConexionParametrosVenta
{
    public $mysqli;
    public $counter; //Propiedad para almacenar el numero de registro devueltos por la consulta

    function __construct()
    {
        $this->mysqli = $this->conectarParametros();
    }

    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }
    public function countAllBitacora($sql)
    {
        $query = Conexion::conectar()->prepare($sql);
        $query->execute();
        $query = $query->fetchAll();
        return count($query);
    }
    public function getData($tables, $campos, $search, $parametros)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $sWhere = " " . $tables . "." . $parametros['param1'] . " LIKE '%" . $search['query'] . "%'";

        if ($search['CCENTROTRABAJO'] != "") {
            $sWhere .= " and CAST($tables.CCENTROTRABAJO AS NVARCHAR(100)) = '" . str_replace('-', ' ', $search['CCENTROTRABAJO']) . "'";
        }
        if ($search['CCANALCOMERCIAL'] != "") {
            if ($search["CCANALCOMERCIAL"] == "VACIO") {
                $sWhere .= " and CAST($tables.CCANALCOMERCIAL AS NVARCHAR(100)) = ' '";
            } else {
                $sWhere .= " and CAST($tables.CCANALCOMERCIAL AS NVARCHAR(100)) = '" . str_replace('-', ' ', $search['CCANALCOMERCIAL']) . "'";
            }
        }
        $sWhere .= "ORDER BY CIDPARAM ASC";

        $sql = "SELECT $campos FROM  $tables WHERE $sWhere OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

        $query = $this->mysqli->query($sql);

        $sql1 = "SELECT $campos FROM  $tables WHERE $sWhere";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    public function getBitacora($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $sWhere = " bi.usuario LIKE '%" . $search['query'] . "%'";

        if ($search['accion'] != "") {
            $sWhere .= " and bi.idAccion = '" . $search["accion"] . "'";
        }

        $sWhere .= "ORDER BY bi.id ASC";

        $sql = "SELECT $campos FROM  $tables as bi INNER JOIN accionesbitacora as acc ON bi.idAccion = acc.id WHERE $sWhere LIMIT $per_page OFFSET $offset";

        $query = Conexion::conectar()->prepare($sql);

        $query->execute();

        $query = $query->fetchAll();

        $sql1 = "SELECT $campos FROM  $tables as bi INNER JOIN accionesbitacora as acc ON bi.idAccion = acc.id WHERE $sWhere";

        $nums_row = $this->countAllBitacora($sql1);

        //Set counter
        $this->setCounter($nums_row);
        return $query;
    }
    function setCounter($counter)
    {
        $this->counter = $counter;
    }
    function getCounter()
    {
        return $this->counter;
    }
}
