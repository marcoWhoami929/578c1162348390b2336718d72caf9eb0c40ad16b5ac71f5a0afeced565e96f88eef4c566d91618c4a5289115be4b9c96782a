<?php

include("../models/db_connect_pinturas.php");
class detalleVentasAnual extends ConexionPinturas
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

    public function getVentasCliente($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $estatus = $search['estatus'];
        $sWhere = " adm.CIDDOCUMENTODE IN(4,5,7,13)  and adm.CCANCELADO = '" . $estatus . "' and adm.CRAZONSOCIAL LIKE '%" . $search['query'] . "%' ";

        if ($search['canal'] != "") {

            $condicional = " WHERE CanalComercial = '" . $search['canal'] . "' ";
        } else {
            $condicional = "";
        }

        $sql = "DECLARE @centro NVARCHAR(50)
        WITH VentasPorMes AS(SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    UNION
                    SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO

                UNION

                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adm INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    ),
        VentasPorMesOrdenadas AS(
            SELECT 
            vm.NombreCliente,
            vm.Año,
            vm.Total
                
            FROM VentasPorMes AS vm $condicional
        )
        
        
        SELECT  *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
        FROM VentasPorMesOrdenadas PIVOT(SUM(Total) FOR año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable  order by NombreCliente asc  OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "DECLARE @centro NVARCHAR(50)
        WITH VentasPorMes AS(SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
        adm.CRAZONSOCIAL AS NombreCliente,
        CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
        WHEN 'TR'
        THEN 'PV TORRES'
        WHEN 'RF'
        THEN 'PV REFORMA'
        WHEN 'SG'
        THEN 'PV SANTIAGO'
        WHEN 'SM'
        THEN 'PV SAN MANUEL'
        WHEN 'CP'
        THEN 'PV CAPU'
        ELSE
        adma.CNOMBREAGENTE
        END AS NombreAgente,
        YEAR(adm.CFECHA)  AS Año,
        MONTH(adm.CFECHA) AS Mes,
        CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
        WHEN 'NOTA DE CR'
        THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
        WHEN 'DOCUMENTO '
        THEN SUM(adm.CTOTAL)
        ELSE
        SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
        case adm.CRAZONSOCIAL
        WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
        THEN
        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
        WHEN 'TR'
        THEN 'PV TORRES'
        WHEN 'RF'
        THEN 'PV REFORMA'
        WHEN 'SG'
        THEN 'PV SANTIAGO'
        WHEN 'SM'
        THEN 'PV SAN MANUEL'
        WHEN 'CP'
        THEN 'PV CAPU'
        ELSE
        adma.CNOMBREAGENTE
        END ))
        ELSE
            case admc.CNOMBRECONCEPTO
            WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA FX PUEBLA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DOCUMENTO PRUEBA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            ELSE
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            END 
            END AS centroTrabajo,
            case adm.CRAZONSOCIAL
        WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
        THEN
        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
        WHEN 'TR'
        THEN 'PV TORRES'
        WHEN 'RF'
        THEN 'PV REFORMA'
        WHEN 'SG'
        THEN 'PV SANTIAGO'
        WHEN 'SM'
        THEN 'PV SAN MANUEL'
        WHEN 'CP'
        THEN 'PV CAPU'
        ELSE
        adma.CNOMBREAGENTE
        END ))
        ELSE
            case admc.CNOMBRECONCEPTO
            WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA FX PUEBLA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DOCUMENTO PRUEBA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            ELSE
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            END 
            END AS canalComercial
            
    FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere

    GROUP BY 
        adm.CSERIEDOCUMENTO,adm.CFOLIO,
        YEAR(adm.CFECHA),
        MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
        UNION
        SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
        adm.CRAZONSOCIAL AS NombreCliente,
        CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
        WHEN 'TR'
        THEN 'PV TORRES'
        WHEN 'RF'
        THEN 'PV REFORMA'
        WHEN 'SG'
        THEN 'PV SANTIAGO'
        WHEN 'SM'
        THEN 'PV SAN MANUEL'
        WHEN 'CP'
        THEN 'PV CAPU'
        ELSE
        adma.CNOMBREAGENTE
        END AS NombreAgente,
        YEAR(adm.CFECHA)  AS Año,
        MONTH(adm.CFECHA) AS Mes,
        CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
        WHEN 'NOTA DE CR'
        THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
        WHEN 'DOCUMENTO '
        THEN SUM(adm.CTOTAL)
        ELSE
        SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
        case adm.CRAZONSOCIAL
        WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
        THEN
        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
        WHEN 'TR'
        THEN 'PV TORRES'
        WHEN 'RF'
        THEN 'PV REFORMA'
        WHEN 'SG'
        THEN 'PV SANTIAGO'
        WHEN 'SM'
        THEN 'PV SAN MANUEL'
        WHEN 'CP'
        THEN 'PV CAPU'
        ELSE
        adma.CNOMBREAGENTE
        END ))
        ELSE
            case admc.CNOMBRECONCEPTO
            WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA FX PUEBLA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DOCUMENTO PRUEBA V 3.3'
            THEN
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            ELSE
            (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            END 
            END AS centroTrabajo,
            case adm.CRAZONSOCIAL
        WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
        THEN
        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
        WHEN 'TR'
        THEN 'PV TORRES'
        WHEN 'RF'
        THEN 'PV REFORMA'
        WHEN 'SG'
        THEN 'PV SANTIAGO'
        WHEN 'SM'
        THEN 'PV SAN MANUEL'
        WHEN 'CP'
        THEN 'PV CAPU'
        ELSE
        adma.CNOMBREAGENTE
        END ))
        ELSE
            case admc.CNOMBRECONCEPTO
            WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA FX PUEBLA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'FACTURA MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            WHEN 'DOCUMENTO PRUEBA V 3.3'
            THEN
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            ELSE
            (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
            WHEN 'TR'
            THEN 'PV TORRES'
            WHEN 'RF'
            THEN 'PV REFORMA'
            WHEN 'SG'
            THEN 'PV SANTIAGO'
            WHEN 'SM'
            THEN 'PV SAN MANUEL'
            WHEN 'CP'
            THEN 'PV CAPU'
            ELSE
            adma.CNOMBREAGENTE
            END ))
            END 
            END AS canalComercial
            
    FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere

    GROUP BY 
        adm.CSERIEDOCUMENTO,adm.CFOLIO,
        YEAR(adm.CFECHA),
        MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
    UNION

    SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adm INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    ),
        VentasPorMesOrdenadas AS(
            SELECT 
            vm.NombreCliente,
            vm.Año,
            vm.Total
                
            FROM VentasPorMes AS vm $condicional
        )
        
        
        SELECT  *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
        FROM VentasPorMesOrdenadas PIVOT(SUM(Total) FOR año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable order by NombreCliente asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }

    public function getVentasCanal($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $estatus = $search['estatus'];
        if ($search['agente'] != "") {
            $condicional = "WHERE NombreAgente = '" . $search["agente"] . "'";
        } else {
            $condicional = "";
        }
        $sWhere = " adm.CIDDOCUMENTODE IN(4,5,7,13) and adm.CCANCELADO = '" . $estatus . "'  ";

        $sql = "DECLARE @centro NVARCHAR(50)
        WITH VentasPorMes AS(SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO

                UNION

                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION 

                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adm INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    ),
        VentasPorMesOrdenadas AS(
            SELECT 
            vm.CentroTrabajo,
                vm.Año,
                vm.Total,
				vm.CanalComercial
                
            FROM VentasPorMes AS vm $condicional
        )
        
        
        SELECT  *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
        FROM VentasPorMesOrdenadas PIVOT(SUM(Total) FOR año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable order by CanalComercial asc  OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "DECLARE @centro NVARCHAR(50)
        WITH VentasPorMes AS(SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION 
                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION
                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adm INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    ),
        VentasPorMesOrdenadas AS(
            SELECT 
            vm.CentroTrabajo,
                vm.Año,
                vm.Total,
				vm.CanalComercial
            FROM VentasPorMes AS vm $condicional
        )
        
        
        SELECT  *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
        FROM VentasPorMesOrdenadas PIVOT(SUM(Total) FOR año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable order by CanalComercial asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getVentasAgente($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $estatus = $search['estatus'];
        if ($search['agente'] != "") {
            $condicional = "WHERE NombreAgente = '" . $search["agente"] . "'";
        } else {
            $condicional = "";
        }

        $sWhere = " adm.CIDDOCUMENTODE IN(4,5,7,13) and adm.CCANCELADO = '" . $estatus . "' ";

        $sql = "DECLARE @centro NVARCHAR(50)
        WITH VentasPorMes AS(SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION
                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION
                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adm INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    ),
        VentasPorMesOrdenadas AS(
            SELECT 
            vm.NombreAgente,
            vm.Año,
            vm.Total
            FROM VentasPorMes AS vm $condicional
        )
        
        
        SELECT  *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
        FROM VentasPorMesOrdenadas PIVOT(SUM(Total) FOR año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable order by NombreAgente asc  OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "DECLARE @centro NVARCHAR(50)
        WITH VentasPorMes AS(SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION
                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adm INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                UNION
                SELECT adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    adm.CRAZONSOCIAL AS NombreCliente,
                    CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                    YEAR(adm.CFECHA)  AS Año,
                    MONTH(adm.CFECHA) AS Mes,
                    CASE SUBSTRING(admc.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'NOTA DE CR'
                    THEN (SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)*0) -SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2)
                    WHEN 'DOCUMENTO '
                    THEN SUM(adm.CTOTAL)
                    ELSE
                    SUM(adm.CTOTAL-adm.CIMPUESTO1-adm.CDESCUENTODOC1-adm.CDESCUENTODOC2) END AS Total,
                    case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adm.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adm.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
                        
                        FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adm INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as adma ON adm.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as admc ON adm.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adm.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO WHERE $sWhere
        
                GROUP BY 
                    adm.CSERIEDOCUMENTO,adm.CFOLIO,
                    YEAR(adm.CFECHA),
                    MONTH(adm.CFECHA),adm.CRAZONSOCIAL,adma.CNOMBREAGENTE,admc.CNOMBRECONCEPTO
                    ),
        VentasPorMesOrdenadas AS(
            SELECT 
            vm.NombreAgente,
            vm.Año,
            vm.Total
            FROM VentasPorMes AS vm $condicional
        )
        
        
        SELECT  *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
        FROM VentasPorMesOrdenadas PIVOT(SUM(Total) FOR año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable order by NombreAgente asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    /***VENTAS PRODUCTOS */
    public function getVentasProductoMonto($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $sWhere = " apro.CIDPRODUCTO != 0 and amov.CIDDOCUMENTODE IN(4)  and adoc.CCANCELADO = 0";

        $condicional = "WHERE vp.CCODIGOPRODUCTO LIKE '%" . $search['query'] . "%' ";

        if ($search['canal'] != "") {

            $condicional .= " and vp.canalComercial = '" . $search['canal'] . "' ";
        }
        if ($search['agente'] != "") {

            $condicional .= " and vp.NombreAgente = '" . $search['agente'] . "' ";
        }
        if ($search['cliente'] != "") {

            $condicional .= " and vp.CRAZONSOCIAL LIKE '%" . $search['cliente'] . "%' ";
        }
        //$condicional = "vp.NombreAgente like '%" . $agente . "%' and vp.canalComercial like '%" . $canal . "%' and vp.CRAZONSOCIAL like '%" . $cliente . "%' ";
        $sql = "DECLARE @centro NVARCHAR(50)
        WITH ventasProducto as (SELECT 
	  apro.CCODIGOPRODUCTO,
	  apro.CIDPRODUCTO,
      apro.CNOMBREPRODUCTO,
	  amov.CUNIDADES,
	  amov.CPRECIO,
	  adoc.CRAZONSOCIAL,
	  amov.CIDDOCUMENTO,
	  ((CPRECIO*CUNIDADES)-CDESCUENTO1-CDESCUENTO2) AS Total,
	  YEAR(adoc.CFECHA) AS Año,
	  CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                   
                    case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
  FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adoc.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adoc.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO  WHERE $sWhere),
  VentasOrdenadasProductos As(
		SELECT 
		vp.CCODIGOPRODUCTO,
        vp.CNOMBREPRODUCTO,
		vp.Total,
		vp.Año
		FROM ventasProducto as vp $condicional
  )

  select *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
from VentasOrdenadasProductos PIVOT(SUM(Total) FOR Año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable   ORDER BY CCODIGOPRODUCTO asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "DECLARE @centro NVARCHAR(50)
        WITH ventasProducto as (SELECT 
	  apro.CCODIGOPRODUCTO,
	  apro.CIDPRODUCTO,
      apro.CNOMBREPRODUCTO,
	  amov.CUNIDADES,
	  amov.CPRECIO,
	  adoc.CRAZONSOCIAL,
	  amov.CIDDOCUMENTO,
	  ((CPRECIO*CUNIDADES)-CDESCUENTO1-CDESCUENTO2) AS Total,
	  YEAR(adoc.CFECHA) AS Año,
	  CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                   
                    case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
  FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adoc.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adoc.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO  WHERE $sWhere),
  VentasOrdenadasProductos As(
		SELECT 
		vp.CCODIGOPRODUCTO,
        vp.CNOMBREPRODUCTO,
		vp.Total,
		vp.Año
		FROM ventasProducto as vp $condicional
  )

  select *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
  from VentasOrdenadasProductos PIVOT(SUM(Total) FOR Año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable   ORDER BY CCODIGOPRODUCTO asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getVentasProductoUnidades($tables, $campos, $search)
    {
        $offset = $search['offset'];
        $per_page = $search['per_page'];

        $sWhere = " apro.CIDPRODUCTO != 0  and amov.CIDDOCUMENTODE IN(4)  and adoc.CCANCELADO = 0";

        $condicional = "WHERE vp.CCODIGOPRODUCTO LIKE '%" . $search['query'] . "%' ";
        if ($search['canal'] != "") {

            $condicional .= " and vp.canalComercial = '" . $search['canal'] . "' ";
        }
        if ($search['agente'] != "") {

            $condicional .= " and vp.NombreAgente = '" . $search['agente'] . "' ";
        }
        if ($search['cliente'] != "") {

            $condicional .= " and vp.CRAZONSOCIAL LIKE '%" . $search['cliente'] . "%' ";
        }
        //$condicional = "vp.NombreAgente like '%" . $agente . "%' and vp.canalComercial like '%" . $canal . "%' and vp.CRAZONSOCIAL like '%" . $cliente . "%' ";
        $sql = "DECLARE @centro NVARCHAR(50)
        WITH ventasProducto as (SELECT 
	  apro.CCODIGOPRODUCTO,
	  apro.CIDPRODUCTO,
      apro.CNOMBREPRODUCTO,
	  amov.CUNIDADES,
	  amov.CPRECIO,
	  adoc.CRAZONSOCIAL,
	  amov.CIDDOCUMENTO,
	  ((CPRECIO*CUNIDADES)-CDESCUENTO1-CDESCUENTO2) AS Total,
	  YEAR(adoc.CFECHA) AS Año,
	  CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                   
                    case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
  FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adoc.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adoc.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO  WHERE $sWhere),
  VentasOrdenadasProductos As(
		SELECT 
		vp.CCODIGOPRODUCTO,
        vp.CNOMBREPRODUCTO,
		vp.CUNIDADES,
		vp.Año
		FROM ventasProducto as vp $condicional
  )

  select *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
  from VentasOrdenadasProductos PIVOT(SUM(CUNIDADES) FOR Año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable   ORDER BY CCODIGOPRODUCTO asc  OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "DECLARE @centro NVARCHAR(50)
        WITH ventasProducto as (SELECT 
	  apro.CCODIGOPRODUCTO,
	  apro.CIDPRODUCTO,
      apro.CNOMBREPRODUCTO,
	  amov.CUNIDADES,
	  amov.CPRECIO,
	  adoc.CRAZONSOCIAL,
	  amov.CIDDOCUMENTO,
	  ((CPRECIO*CUNIDADES)-CDESCUENTO1-CDESCUENTO2) AS Total,
	  YEAR(adoc.CFECHA) AS Año,
	  CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END AS NombreAgente,
                   
                    case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS centroTrabajo,
                        case adoc.CRAZONSOCIAL
                    WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
                    THEN
                    (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                    WHEN 'TR'
                    THEN 'PV TORRES'
                    WHEN 'RF'
                    THEN 'PV REFORMA'
                    WHEN 'SG'
                    THEN 'PV SANTIAGO'
                    WHEN 'SM'
                    THEN 'PV SAN MANUEL'
                    WHEN 'CP'
                    THEN 'PV CAPU'
                    ELSE
                    adma.CNOMBREAGENTE
                    END ))
                    ELSE
                        case admc.CNOMBRECONCEPTO
                        WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'FACTURA MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        WHEN 'DOCUMENTO PRUEBA V 3.3'
                        THEN
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        ELSE
                        (SELECT [CCANALCOMERCIAL] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in (CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
                        WHEN 'TR'
                        THEN 'PV TORRES'
                        WHEN 'RF'
                        THEN 'PV REFORMA'
                        WHEN 'SG'
                        THEN 'PV SANTIAGO'
                        WHEN 'SM'
                        THEN 'PV SAN MANUEL'
                        WHEN 'CP'
                        THEN 'PV CAPU'
                        ELSE
                        adma.CNOMBREAGENTE
                        END ))
                        END 
                        END AS canalComercial
  FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as adma ON adoc.CIDAGENTE = adma.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as admc ON adoc.CIDDOCUMENTODE = admc.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = admc.CIDCONCEPTODOCUMENTO  WHERE $sWhere),
  VentasOrdenadasProductos As(
		SELECT 
		vp.CCODIGOPRODUCTO,
        vp.CNOMBREPRODUCTO,
		vp.CUNIDADES,
		vp.Año
		FROM ventasProducto as vp $condicional
  )

  select *,IsNull([2013],0) + IsNull([2014],0) + IsNull([2015],0) + IsNull([2016],0) + IsNull([2017],0) + IsNull([2018],0) + IsNull([2019],0) + IsNull([2020],0) + IsNull([2021],0) Totales
  from VentasOrdenadasProductos PIVOT(SUM(CUNIDADES) FOR Año in([2013],[2014],[2015],[2016],[2017],[2018],[2019],[2020],[2021])) as pivotTable   ORDER BY CCODIGOPRODUCTO asc";

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
