<?php

include("../models/db_connect_flex.php");
class ultimosCostosFlex extends ConexionFlex
{
    public $mysqli;
    public $counter;

    function __construct()
    {
        $this->mysqli = $this->conectarFlex();
    }

    public function countAll($sql)
    {
        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return count($query);
    }
    public function getData($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $sWhere = " CCODIGOPRODUCTO LIKE '%" . $search['query'] . "%' and CIDDOCUMENTODE = '19' and CIDCLIENTEPROVEEDOR != 3";

        $sql = "WITH COSTOS AS(SELECT  admpro.CIDPRODUCTO,admpro.CCODIGOPRODUCTO,admpro.CNOMBREPRODUCTO, 
        
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END ) as AÑO,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END ) as MES,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CULTIMOCOSTOH ELSE 0 END ELSE 0 END ) as CULTIMOCOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END ) as CFECHACOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN 1 ELSE 0 END ELSE 0 END ) as EXISTE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admmov.CIDDOCUMENTODE ELSE 19 END ELSE 19 END ) as CIDDOCUMENTODE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END ) as CIDCLIENTEPROVEEDOR
        ,CASE admmov.CIDDOCUMENTO  WHEN 19 THEN ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
                       ORDER BY admcos.CFECHACOSTOH asc) ELSE 1 END AS filtro1
                       
        FROM dbo.admProductos as admpro LEFT JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CULTIMOCOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cots WHERE filtro1 = 1 AND $sWhere) 
        
                       select * from filtroCostos  PIVOT(SUM(CULTIMOCOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY CIDPRODUCTO asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH COSTOS AS(SELECT  admpro.CIDPRODUCTO,admpro.CCODIGOPRODUCTO,admpro.CNOMBREPRODUCTO, 
        
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END ) as AÑO,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END ) as MES,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CULTIMOCOSTOH ELSE 0 END ELSE 0 END ) as CULTIMOCOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END ) as CFECHACOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN 1 ELSE 0 END ELSE 0 END ) as EXISTE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admmov.CIDDOCUMENTODE ELSE 19 END ELSE 19 END ) as CIDDOCUMENTODE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END ) as CIDCLIENTEPROVEEDOR
        ,CASE admmov.CIDDOCUMENTO  WHEN 19 THEN ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
                       ORDER BY admcos.CFECHACOSTOH asc) ELSE 1 END AS filtro1
                       
        FROM dbo.admProductos as admpro LEFT JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CULTIMOCOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cots WHERE filtro1 = 1 AND $sWhere) 
        
                       select * from filtroCostos  PIVOT(SUM(CULTIMOCOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY CIDPRODUCTO asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getIdDocuments($tables, $campos, $search)
    {

        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $año = $search['año'];
        $sWhere = " CCODIGOPRODUCTO LIKE '%" . $search['query'] . "%' and CIDDOCUMENTODE = '19' and CIDCLIENTEPROVEEDOR != 3";

        $sql = "WITH COSTOS AS(SELECT  admpro.CIDPRODUCTO,admpro.CCODIGOPRODUCTO,admpro.CNOMBREPRODUCTO, 
        
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END ) as AÑO,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END ) as MES,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admmov.CIDDOCUMENTO ELSE 0 END ELSE 0 END ) as CIDDOCUMENTO,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END ) as CFECHACOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN 1 ELSE 0 END ELSE 0 END ) as EXISTE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admmov.CIDDOCUMENTODE ELSE 19 END ELSE 19 END ) as CIDDOCUMENTODE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END ) as CIDCLIENTEPROVEEDOR
        ,CASE admmov.CIDDOCUMENTO  WHEN 19 THEN ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
                       ORDER BY admcos.CFECHACOSTOH asc) ELSE 1 END AS filtro1
                       
        FROM dbo.admProductos as admpro LEFT JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CIDDOCUMENTO,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cots WHERE filtro1 = 1 AND $sWhere) 
        
                       select * from filtroCostos  PIVOT(MAX(CIDDOCUMENTO) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY CIDPRODUCTO asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";

        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return $query;
    }
    public function getUltimoCosto($idProducto, $año)
    {

        switch ($año) {
            case '2013':
                $meses = "2013";
                break;
            case '2014':
                $meses = "2013";
                break;
            case '2015':
                $meses = "2013,2014";
                break;
            case '2016':
                $meses = "2013,2014,2015";
                break;
            case '2017':
                $meses = "2013,2014,2015,2016";
                break;
            case '2018':
                $meses = "2013,2014,2015,2016,2017";
                break;
            case '2019':
                $meses = "2013,2014,2015,2016,2017,2018";
                break;
            case '2020':
                $meses = "2013,2014,2015,2016,2017,2018,2019";
                break;
            case '2021':
                $meses = "2013,2014,2015,2016,2017,2018,2019,2020";
                break;
        }

        $sql = "WITH consulta as (SELECT  admpro.CIDPRODUCTO,admcos.CULTIMOCOSTOH,admmov.CIDDOCUMENTO,admcos.CFECHACOSTOH,MONTH(admcos.CFECHACOSTOH) as mes,YEAR(admcos.CFECHACOSTOH) as año,ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
        ORDER BY admcos.CFECHACOSTOH desc) as filtro1 FROM dbo.admProductos as admpro LEFT OUTER JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT OUTER JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT OUTER JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO WHERE YEAR(admcos.CFECHACOSTOH) IN($meses) AND admmov.CIDDOCUMENTODE = '19' and admcos.CIDPRODUCTO = $idProducto and admdoc.CIDCLIENTEPROVEEDOR != 3)

     select TOP(1) CFECHACOSTOH,CULTIMOCOSTOH,CIDDOCUMENTO from consulta where filtro1 = 1 ORDER BY AÑO DESC,MES DESC";

        $query = $this->mysqli->query($sql);
        $query = $query->fetch();

        return $query;
    }
    public function getDataReporteUltimosCostos($codigoProducto, $añoElegido)
    {

        $año = $añoElegido;
        $sWhere = " CCODIGOPRODUCTO LIKE '%" . $codigoProducto . "%' and CIDDOCUMENTODE = '19' and CIDCLIENTEPROVEEDOR != 3";

        $sql = "WITH COSTOS AS(SELECT  admpro.CIDPRODUCTO,admpro.CCODIGOPRODUCTO,admpro.CNOMBREPRODUCTO, 
        
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END ) as AÑO,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END ) as MES,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CULTIMOCOSTOH ELSE 0 END ELSE 0 END ) as CULTIMOCOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CFECHACOSTOH ELSE 0 END ELSE 0 END ) as CFECHACOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN 1 ELSE 0 END ELSE 0 END ) as EXISTE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admmov.CIDDOCUMENTODE ELSE 19 END ELSE 19 END ) as CIDDOCUMENTODE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END ) as CIDCLIENTEPROVEEDOR
        ,CASE admmov.CIDDOCUMENTO  WHEN 19 THEN ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
                       ORDER BY admcos.CFECHACOSTOH asc) ELSE 1 END AS filtro1
                       
        FROM dbo.admProductos as admpro LEFT JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CULTIMOCOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cots WHERE filtro1 = 1 AND $sWhere) 
        
                       select * from filtroCostos  PIVOT(SUM(CULTIMOCOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY CIDPRODUCTO asc";

        $query = $this->mysqli->query($sql);
        $query = $query->fetchAll();
        return $query;
    }
    public function getFechaReporteUltimosCostos($codigoProducto, $añoElegido)
    {

        $año = $añoElegido;
        $sWhere = " CCODIGOPRODUCTO LIKE '%" . $codigoProducto . "%' and CIDDOCUMENTODE = '19' and CIDCLIENTEPROVEEDOR != 3";

        $sql = "WITH COSTOS AS(SELECT  admpro.CIDPRODUCTO,admpro.CCODIGOPRODUCTO,admpro.CNOMBREPRODUCTO, 
        
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN YEAR(admcos.CFECHACOSTOH) ELSE $año END ELSE $año END ) as AÑO,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN MONTH(admcos.CFECHACOSTOH) ELSE 1 END ELSE 1 END ) as MES,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admcos.CFECHACOSTOH ELSE NULL END ELSE NULL END ) as CFECHACOSTOH,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN 1 ELSE 0 END ELSE 0 END ) as EXISTE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admmov.CIDDOCUMENTODE ELSE 19 END ELSE 19 END ) as CIDDOCUMENTODE,
        (CASE admcos.CIDPRODUCTO WHEN admcos.CIDPRODUCTO THEN case WHEN YEAR(admcos.CFECHACOSTOH) = $año THEN admdoc.CIDCLIENTEPROVEEDOR ELSE 0 END ELSE 0 END ) as CIDCLIENTEPROVEEDOR
        ,CASE admmov.CIDDOCUMENTO  WHEN 19 THEN ROW_NUMBER() OVER(PARTITION BY admcos.CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,admcos.CFECHACOSTOH),0)
                       ORDER BY admcos.CFECHACOSTOH asc) ELSE 1 END AS filtro1
                       
        FROM dbo.admProductos as admpro LEFT JOIN dbo.admCostosHistoricos as admcos ON admpro.CIDPRODUCTO = admcos.CIDPRODUCTO LEFT JOIN dbo.admMovimientos as admmov ON admcos.CIDMOVIMIENTO = admmov.CIDMOVIMIENTO LEFT JOIN dbo.admDocumentos as admdoc ON admmov.CIDDOCUMENTO = admdoc.CIDDOCUMENTO),
        
                       filtroCostos as(select CIDPRODUCTO,CCODIGOPRODUCTO,CNOMBREPRODUCTO,MES,CFECHACOSTOH,ROW_NUMBER() OVER(PARTITION BY CIDPRODUCTO,DATEADD(MONTH,DATEDIFF(MONTH,0,CFECHACOSTOH),0)
                       ORDER BY CFECHACOSTOH desc) as filtro2 FROM COSTOS as cots WHERE filtro1 = 1 AND $sWhere) 
        
                       select * from filtroCostos  PIVOT(MAX(CFECHACOSTOH) FOR MES in([1],[2],[3],[4],[5],[6],[7],[8],[9],[10],[11],[12])) as pivotTable  where filtro2 = 1  ORDER BY CIDPRODUCTO asc";

        $query = $this->mysqli->query($sql);
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
