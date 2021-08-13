<?php

include("../models/db_connect_pinturas.php");
class busquedaDatos extends conexionPinturas
{
    public $mysqli;
    public $counter;

    function __construct()
    {
        $this->mysqli = $this->conectarPinturas();
    }

    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }
    public function getClientes($search, $aColumns)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        if ($search["cliente"] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $search["cliente"] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        } else {
            $sWhere = "";
        }

        $sql = "WITH listaClientes AS(SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adPINTURAS2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adFLEX2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION 
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adPinturas_y_Complemen].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1),
          listadoClientes AS(
                SELECT * FROM listaClientes AS lc  $sWhere 
          
          )
          select * from listadoClientes ORDER BY CCODIGOCLIENTE ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH listaClientes AS(SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adPINTURAS2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adFLEX2020SADEC].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1
          UNION 
          SELECT CCODIGOCLIENTE
              ,CRFC
              ,CRAZONSOCIAL
              ,CFECHAALTA
          
              
          FROM [adPinturas_y_Complemen].[dbo].[admClientes] WHERE CTIPOCLIENTE = 1),
          listadoClientes AS(
                SELECT * FROM listaClientes AS lc $sWhere
          
          )
          select * from listadoClientes ORDER BY CCODIGOCLIENTE ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getProductos($search, $aColumns)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        if ($search["producto"] != "") {
            $sWhere = "WHERE (";
            for ($i = 0; $i < count($aColumns); $i++) {
                $sWhere .= $aColumns[$i] . " LIKE '%" . $search["producto"] . "%' OR ";
            }
            $sWhere = substr_replace($sWhere, "", -3);
            $sWhere .= ')';
        } else {
            $sWhere = "";
        }

        $sql = "WITH listaProductos AS(SELECT CCODIGOPRODUCTO
              ,CNOMBREPRODUCTO

          FROM [adPINTURAS2020SADEC].[dbo].[admProductos]
          UNION
          SELECT CCODIGOPRODUCTO
              ,CNOMBREPRODUCTO
          
              
          FROM [adFLEX2020SADEC].[dbo].[admProductos]
          UNION 
          SELECT CCODIGOPRODUCTO
              ,CNOMBREPRODUCTO

          FROM [adPinturas_y_Complemen].[dbo].[admProductos]),
          listadoProductos AS(
                SELECT * FROM listaProductos AS lc  $sWhere 
          
          )
          select * from listadoProductos ORDER BY CCODIGOPRODUCTO ASC OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH listaProductos AS(SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO

    FROM [adPINTURAS2020SADEC].[dbo].[admProductos]
    UNION
    SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO
    
        
    FROM [adFLEX2020SADEC].[dbo].[admProductos]
    UNION 
    SELECT CCODIGOPRODUCTO
        ,CNOMBREPRODUCTO

    FROM [adPinturas_y_Complemen].[dbo].[admProductos]),
    listadoProductos AS(
          SELECT * FROM listaProductos AS lc  $sWhere 
    
    )
    select * from listadoProductos ORDER BY CCODIGOPRODUCTO ASC";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
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
