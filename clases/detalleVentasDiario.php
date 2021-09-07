<?php

include("../models/db_connect_pinturas.php");
$parametrosCanal = "case adoc.CRAZONSOCIAL
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
        agen.CNOMBREAGENTE
        END ))
    ELSE
    case acon.CNOMBRECONCEPTO
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
        END ))
    ELSE
    case acon.CNOMBRECONCEPTO
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
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
        agen.CNOMBREAGENTE
        END ))
    END 
    END AS canalComercial";
class detalleVentasDiario extends ConexionPinturas
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
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 ";

        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }
        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3207,
        3139,
        3207,
        3208,
        3229,
        6,
        3013,
        3014,
        3015,
        3024,
        3060,
        3078,
        3094,
        3106,
        3116,
        3126,
        3146,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3212)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        14,
        3056,
        6,
        3004,
        3012,
        3052,
        3061)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3047,
        3049,
        3050,
        3051,
        3106,
        8,
        3056,
        3057,
        3058,
        3111,
        3105)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),
        
        VentasDiariasOrdenadas As(
            SELECT
                NombreCliente,
                Desglose,
                CAST(Dia as NVARCHAR(100)) as Day
            FROM ventasDiarias as vd  $condicional
            
            )
        SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by NombreCliente asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3047,
3049,
3050,
3051,
3106,
8,
3056,
3057,
3058,
3111,
3105)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),

VentasDiariasOrdenadas As(
    SELECT
        NombreCliente,
        Desglose,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias as vd  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by NombreCliente asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }

    public function getVentasCanal($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 and canalComercial IS NOT NULL";


        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3207,
        3139,
        3207,
        3208,
        3229,
        6,
        3013,
        3014,
        3015,
        3024,
        3060,
        3078,
        3094,
        3106,
        3116,
        3126,
        3146,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3212)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        14,
        3056,
        6,
        3004,
        3012,
        3052,
        3061)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3047,
        3049,
        3050,
        3051,
        3106,
        8,
        3056,
        3057,
        3058,
        3111,
        3105)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),
        
        VentasDiariasOrdenadas As(
            SELECT
                canalComercial,
                centroTrabajo,
                Desglose,
                CAST(Dia as NVARCHAR(100)) as Day
            FROM ventasDiarias as vd  $condicional
            
            )
        SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by canalComercial asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3047,
3049,
3050,
3051,
3106,
8,
3056,
3057,
3058,
3111,
3105)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),

VentasDiariasOrdenadas As(
    SELECT
        canalComercial,
        centroTrabajo,
        Desglose,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias as vd  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by canalComercial asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getVentasAgente($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 and canalComercial IS NOT NULL and Agente != 'ING. MIGUEL GUTIERREZ A.'";
        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }

        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3207,
        3139,
        3207,
        3208,
        3229,
        6,
        3013,
        3014,
        3015,
        3024,
        3060,
        3078,
        3094,
        3106,
        3116,
        3126,
        3146,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3212)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        14,
        3056,
        6,
        3004,
        3012,
        3052,
        3061)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
          UNION
          SELECT 
                adoc.CIDDOCUMENTO,
                acon.CNOMBRECONCEPTO,
                adoc.CFECHA,
                adoc.CRAZONSOCIAL As NombreCliente,
                adoc.CSERIEDOCUMENTO,
                adoc.CFOLIO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 adoc.CNETO As Importe,
                 adoc.CDESCUENTOMOV As Descuento,
                 adoc.CIMPUESTO1 As IVA,
                 adoc.CTOTAL As Total,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                 WHEN 'DEVOLUCIÓN'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'NOTA DE CR'
                 THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
                 WHEN 'DOCUMENTO '
                 THEN SUM(adoc.CTOTAL)
                 ELSE
                 SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
                 $parametrosCanal,
                 '1' As indicador
          FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3047,
        3049,
        3050,
        3051,
        3106,
        8,
        3056,
        3057,
        3058,
        3111,
        3105)
          GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),
        
        VentasDiariasOrdenadas As(
            SELECT
                Agente,
                Desglose,
                CAST(Dia as NVARCHAR(100)) as Day
            FROM ventasDiarias as vd  $condicional
            
            )
        SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by Agente asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
  UNION
  SELECT 
        adoc.CIDDOCUMENTO,
        acon.CNOMBRECONCEPTO,
        adoc.CFECHA,
        adoc.CRAZONSOCIAL As NombreCliente,
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Total,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Desglose,
         $parametrosCanal,
        '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3047,
3049,
3050,
3051,
3106,
8,
3056,
3057,
3058,
3111,
3105)
  GROUP BY adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),

VentasDiariasOrdenadas As(
    SELECT
        Agente,
        Desglose,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias as vd  $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by Agente asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    /***VENTAS PRODUCTOS*/
    public function getVentasProductoMonto($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['producto']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);
        /**NOMBRE CLIENTES */
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["producto"] != "") {
            $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        }
        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 and canalComercial IS NOT NULL and Agente != 'ING. MIGUEL GUTIERREZ A.'";
        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }

        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                    apro.CCODIGOPRODUCTO,
                    apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                    agen.CNOMBREAGENTE END As Agente,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    $parametrosCanal,
                    '1' As indicador
                    FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
            5,
            3001,
            3002,
            3003,
            3023,
            3030,
            3076,
            3096,
            3108,
            3115,
            3128,
            3148,
            3172,
            3173,
            3174,
            3175,
            3176,
            3177,
            3178,
            3179,
            3180,
            3181,
            8,
            3016,
            3125,
            3194,
            3195,
            3196,
            3215,
            3207,
            3139,
            3207,
            3208,
            3229,
            6,
            3013,
            3014,
            3015,
            3024,
            3060,
            3078,
            3094,
            3106,
            3116,
            3126,
            3146,
            3182,
            3183,
            3184,
            3185,
            3186,
            3187,
            3188,
            3189,
            3190,
            3191,
            3212)
            GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                    agen.CNOMBREAGENTE END As Agente,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    $parametrosCanal,
                    '1' As indicador
                    FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
            5,
            3001,
            3048,
            14,
            3056,
            6,
            3004,
            3012,
            3052,
            3061)
            GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                    agen.CNOMBREAGENTE END As Agente,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    $parametrosCanal,
                    '1' As indicador
                    FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO  WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
            5,
            3047,
            3049,
            3050,
            3051,
            3106,
            8,
            3056,
            3057,
            3058,
            3111,
            3105)
            GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),
            
            VentasDiariasOrdenadas As(
                SELECT
                    CCODIGOPRODUCTO,
                    CNOMBREPRODUCTO,
                    Total,
                    CAST(Dia as NVARCHAR(100)) as Day
                FROM ventasDiarias  $condicional
                
                )
            SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) desc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
            apro.CCODIGOPRODUCTO,
            apro.CIDPRODUCTO,
            apro.CNOMBREPRODUCTO,
            amov.CUNIDADES,
            amov.CPRECIO,
            adoc.CRAZONSOCIAL,
            amov.CIDDOCUMENTO,
            DAY(adoc.CFECHA) As Dia,
            DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
            agen.CNOMBREAGENTE END As Agente,
            CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
            WHEN 'DEVOLUCIÓN'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'NOTA DE CR'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'DOCUMENTO '
            THEN SUM(amov.CTOTAL)
            ELSE
            SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
            $parametrosCanal,
            '1' As indicador
            FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
    5,
    3001,
    3002,
    3003,
    3023,
    3030,
    3076,
    3096,
    3108,
    3115,
    3128,
    3148,
    3172,
    3173,
    3174,
    3175,
    3176,
    3177,
    3178,
    3179,
    3180,
    3181,
    8,
    3016,
    3125,
    3194,
    3195,
    3196,
    3215,
    3207,
    3139,
    3207,
    3208,
    3229,
    6,
    3013,
    3014,
    3015,
    3024,
    3060,
    3078,
    3094,
    3106,
    3116,
    3126,
    3146,
    3182,
    3183,
    3184,
    3185,
    3186,
    3187,
    3188,
    3189,
    3190,
    3191,
    3212)
    GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
    UNION
    SELECT 
            apro.CCODIGOPRODUCTO,
            apro.CIDPRODUCTO,
            apro.CNOMBREPRODUCTO,
            amov.CUNIDADES,
            amov.CPRECIO,
            adoc.CRAZONSOCIAL,
            amov.CIDDOCUMENTO,
            DAY(adoc.CFECHA) As Dia,
            DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
            agen.CNOMBREAGENTE END As Agente,
            CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
            WHEN 'DEVOLUCIÓN'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'NOTA DE CR'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'DOCUMENTO '
            THEN SUM(amov.CTOTAL)
            ELSE
            SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
            $parametrosCanal,
            '1' As indicador
            FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3001,
    3048,
    14,
    3056,
    6,
    3004,
    3012,
    3052,
    3061)
    GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
    UNION
    SELECT 
            apro.CCODIGOPRODUCTO,
            apro.CIDPRODUCTO,
            apro.CNOMBREPRODUCTO,
            amov.CUNIDADES,
            amov.CPRECIO,
            adoc.CRAZONSOCIAL,
            amov.CIDDOCUMENTO,
            DAY(adoc.CFECHA) As Dia,
            DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
            agen.CNOMBREAGENTE END As Agente,
            CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
            WHEN 'DEVOLUCIÓN'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'NOTA DE CR'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'DOCUMENTO '
            THEN SUM(amov.CTOTAL)
            ELSE
            SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
            $parametrosCanal,
            '1' As indicador
            FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO  WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3047,
    3049,
    3050,
    3051,
    3106,
    8,
    3056,
    3057,
    3058,
    3111,
    3105)
    GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),

    VentasDiariasOrdenadas As(
        SELECT
            CCODIGOPRODUCTO,
            CNOMBREPRODUCTO,
            Total,
            CAST(Dia as NVARCHAR(100)) as Day
        FROM ventasDiarias   $condicional
        
        )
    SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) desc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getVentasProductoUnidades($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['producto']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);
        /**NOMBRE CLIENTES */
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["producto"] != "") {
            $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        }
        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 and canalComercial IS NOT NULL and Agente != 'ING. MIGUEL GUTIERREZ A.'";
        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }

        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                apro.CCODIGOPRODUCTO,
                apro.CIDPRODUCTO,
                apro.CNOMBREPRODUCTO,
                amov.CUNIDADES,
                amov.CPRECIO,
                adoc.CRAZONSOCIAL,
                amov.CIDDOCUMENTO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                WHEN 'DEVOLUCIÓN'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'NOTA DE CR'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'DOCUMENTO '
                THEN SUM(amov.CTOTAL)
                ELSE
                SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                 $parametrosCanal,
                 '1' As indicador
                 FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3207,
        3139,
        3207,
        3208,
        3229,
        6,
        3013,
        3014,
        3015,
        3024,
        3060,
        3078,
        3094,
        3106,
        3116,
        3126,
        3146,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3212)
        GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
          UNION
          SELECT 
                apro.CCODIGOPRODUCTO,
                apro.CIDPRODUCTO,
                apro.CNOMBREPRODUCTO,
                amov.CUNIDADES,
                amov.CPRECIO,
                adoc.CRAZONSOCIAL,
                amov.CIDDOCUMENTO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                WHEN 'DEVOLUCIÓN'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'NOTA DE CR'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'DOCUMENTO '
                THEN SUM(amov.CTOTAL)
                ELSE
                SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                 $parametrosCanal,
                 '1' As indicador
                 FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        14,
        3056,
        6,
        3004,
        3012,
        3052,
        3061)
        GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
          UNION
          SELECT 
                apro.CCODIGOPRODUCTO,
                apro.CIDPRODUCTO,
                apro.CNOMBREPRODUCTO,
                amov.CUNIDADES,
                amov.CPRECIO,
                adoc.CRAZONSOCIAL,
                amov.CIDDOCUMENTO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                WHEN 'DEVOLUCIÓN'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'NOTA DE CR'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'DOCUMENTO '
                THEN SUM(amov.CTOTAL)
                ELSE
                SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                 $parametrosCanal,
                 '1' As indicador
                 FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO  WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3047,
        3049,
        3050,
        3051,
        3106,
        8,
        3056,
        3057,
        3058,
        3111,
        3105)
        GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),
        
        VentasDiariasOrdenadas As(
            SELECT
                CCODIGOPRODUCTO,
                CNOMBREPRODUCTO,
                CUNIDADES,
                CAST(Dia as NVARCHAR(100)) as Day
            FROM ventasDiarias  $condicional
            
            )
        SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(CUNIDADES) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) desc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
         FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212)
GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
  UNION
  SELECT 
        apro.CCODIGOPRODUCTO,
        apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
         FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061)
GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
  UNION
  SELECT 
        apro.CCODIGOPRODUCTO,
        apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
         FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO  WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3047,
3049,
3050,
3051,
3106,
8,
3056,
3057,
3058,
3111,
3105)
GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        CUNIDADES,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias   $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(CUNIDADES) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) desc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    /***VENTAS PRODUCTOS LITREADO*/
    public function getVentasLitreadoMonto($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['producto']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);
        /**NOMBRE CLIENTES */
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["producto"] != "") {
            $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        }
        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 and canalComercial IS NOT NULL and Agente != 'ING. MIGUEL GUTIERREZ A.'";
        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }

        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                    apro.CCODIGOPRODUCTO,
                    apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                    agen.CNOMBREAGENTE END As Agente,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    $parametrosCanal,
                    '1' As indicador
                    FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and apro.CIDUNIDADBASE IN(11,15,27) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
            5,
            3001,
            3002,
            3003,
            3023,
            3030,
            3076,
            3096,
            3108,
            3115,
            3128,
            3148,
            3172,
            3173,
            3174,
            3175,
            3176,
            3177,
            3178,
            3179,
            3180,
            3181,
            8,
            3016,
            3125,
            3194,
            3195,
            3196,
            3215,
            3207,
            3139,
            3207,
            3208,
            3229,
            6,
            3013,
            3014,
            3015,
            3024,
            3060,
            3078,
            3094,
            3106,
            3116,
            3126,
            3146,
            3182,
            3183,
            3184,
            3185,
            3186,
            3187,
            3188,
            3189,
            3190,
            3191,
            3212)
            GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                    agen.CNOMBREAGENTE END As Agente,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    $parametrosCanal,
                    '1' As indicador
                    FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and  apro.CIDUNIDADBASE NOT IN(0,1,2,3,4,5,7,8)  and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
            5,
            3001,
            3048,
            14,
            3056,
            6,
            3004,
            3012,
            3052,
            3061)
            GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
            UNION
            SELECT 
                    apro.CCODIGOPRODUCTO,
                    apro.CIDPRODUCTO,
                    apro.CNOMBREPRODUCTO,
                    amov.CUNIDADES,
                    amov.CPRECIO,
                    adoc.CRAZONSOCIAL,
                    amov.CIDDOCUMENTO,
                    DAY(adoc.CFECHA) As Dia,
                    DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                    agen.CNOMBREAGENTE END As Agente,
                    CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                    WHEN 'DEVOLUCIÓN'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'NOTA DE CR'
                    THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                    WHEN 'DOCUMENTO '
                    THEN SUM(amov.CTOTAL)
                    ELSE
                    SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                    $parametrosCanal,
                    '1' As indicador
                    FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO  WHERE $sWhere and apro.CIDUNIDADBASE IN(19,32,34,40) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
            5,
            3047,
            3049,
            3050,
            3051,
            3106,
            8,
            3056,
            3057,
            3058,
            3111,
            3105)
            GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),
            
            VentasDiariasOrdenadas As(
                SELECT
                    CCODIGOPRODUCTO,
                    CNOMBREPRODUCTO,
                    Total,
                    CAST(Dia as NVARCHAR(100)) as Day
                FROM ventasDiarias  $condicional
                
                )
            SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by CCODIGOPRODUCTO asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
            apro.CCODIGOPRODUCTO,
            apro.CIDPRODUCTO,
            apro.CNOMBREPRODUCTO,
            amov.CUNIDADES,
            amov.CPRECIO,
            adoc.CRAZONSOCIAL,
            amov.CIDDOCUMENTO,
            DAY(adoc.CFECHA) As Dia,
            DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
            agen.CNOMBREAGENTE END As Agente,
            CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
            WHEN 'DEVOLUCIÓN'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'NOTA DE CR'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'DOCUMENTO '
            THEN SUM(amov.CTOTAL)
            ELSE
            SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
            $parametrosCanal,
            '1' As indicador
            FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and apro.CIDUNIDADBASE IN(11,15,27) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
    5,
    3001,
    3002,
    3003,
    3023,
    3030,
    3076,
    3096,
    3108,
    3115,
    3128,
    3148,
    3172,
    3173,
    3174,
    3175,
    3176,
    3177,
    3178,
    3179,
    3180,
    3181,
    8,
    3016,
    3125,
    3194,
    3195,
    3196,
    3215,
    3207,
    3139,
    3207,
    3208,
    3229,
    6,
    3013,
    3014,
    3015,
    3024,
    3060,
    3078,
    3094,
    3106,
    3116,
    3126,
    3146,
    3182,
    3183,
    3184,
    3185,
    3186,
    3187,
    3188,
    3189,
    3190,
    3191,
    3212)
    GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
    UNION
    SELECT 
            apro.CCODIGOPRODUCTO,
            apro.CIDPRODUCTO,
            apro.CNOMBREPRODUCTO,
            amov.CUNIDADES,
            amov.CPRECIO,
            adoc.CRAZONSOCIAL,
            amov.CIDDOCUMENTO,
            DAY(adoc.CFECHA) As Dia,
            DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
            agen.CNOMBREAGENTE END As Agente,
            CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
            WHEN 'DEVOLUCIÓN'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'NOTA DE CR'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'DOCUMENTO '
            THEN SUM(amov.CTOTAL)
            ELSE
            SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
            $parametrosCanal,
            '1' As indicador
            FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and  apro.CIDUNIDADBASE NOT IN(0,1,2,3,4,5,7,8) and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3001,
    3048,
    14,
    3056,
    6,
    3004,
    3012,
    3052,
    3061)
    GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
    UNION
    SELECT 
            apro.CCODIGOPRODUCTO,
            apro.CIDPRODUCTO,
            apro.CNOMBREPRODUCTO,
            amov.CUNIDADES,
            amov.CPRECIO,
            adoc.CRAZONSOCIAL,
            amov.CIDDOCUMENTO,
            DAY(adoc.CFECHA) As Dia,
            DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
            agen.CNOMBREAGENTE END As Agente,
            CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
            WHEN 'DEVOLUCIÓN'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'NOTA DE CR'
            THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
            WHEN 'DOCUMENTO '
            THEN SUM(amov.CTOTAL)
            ELSE
            SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
            $parametrosCanal,
            '1' As indicador
            FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO  WHERE $sWhere and apro.CIDUNIDADBASE IN(19,32,34,40) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
    5,
    3047,
    3049,
    3050,
    3051,
    3106,
    8,
    3056,
    3057,
    3058,
    3111,
    3105)
    GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),

    VentasDiariasOrdenadas As(
        SELECT
            CCODIGOPRODUCTO,
            CNOMBREPRODUCTO,
            Total,
            CAST(Dia as NVARCHAR(100)) as Day
        FROM ventasDiarias   $condicional
        
        )
    SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by CCODIGOPRODUCTO asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getVentasLitreadoUnidades($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        /***CODIGOS DE PRODUCTOS */
        $codigos = explode(',', $search['producto']);
        $codigoProducto = "";
        for ($i = 0; $i < count($codigos); $i++) {
            $codigoProducto .= "'" . $codigos[$i] . "', ";
        }
        $codigoProducto = substr($codigoProducto, 0, -2);
        /**NOMBRE CLIENTES */
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["producto"] != "") {
            $sWhere .= " and apro.CCODIGOPRODUCTO in(" . $codigoProducto . ") ";
        }
        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 and canalComercial IS NOT NULL and Agente != 'ING. MIGUEL GUTIERREZ A.'";
        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }

        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasDiarias AS(SELECT 
                apro.CCODIGOPRODUCTO,
                apro.CIDPRODUCTO,
                apro.CNOMBREPRODUCTO,
                amov.CUNIDADES,
                amov.CPRECIO,
                adoc.CRAZONSOCIAL,
                amov.CIDDOCUMENTO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                WHEN 'DEVOLUCIÓN'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'NOTA DE CR'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'DOCUMENTO '
                THEN SUM(amov.CTOTAL)
                ELSE
                SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                 $parametrosCanal,
                 '1' As indicador
                 FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admUnidadesMedidaPeso] as amed ON apro.CIDUNIDADBASE = amed.CIDUNIDAD WHERE $sWhere and apro.CIDUNIDADBASE IN(11,15,27) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
        5,
        3001,
        3002,
        3003,
        3023,
        3030,
        3076,
        3096,
        3108,
        3115,
        3128,
        3148,
        3172,
        3173,
        3174,
        3175,
        3176,
        3177,
        3178,
        3179,
        3180,
        3181,
        8,
        3016,
        3125,
        3194,
        3195,
        3196,
        3215,
        3207,
        3139,
        3207,
        3208,
        3229,
        6,
        3013,
        3014,
        3015,
        3024,
        3060,
        3078,
        3094,
        3106,
        3116,
        3126,
        3146,
        3182,
        3183,
        3184,
        3185,
        3186,
        3187,
        3188,
        3189,
        3190,
        3191,
        3212)
        GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
          UNION
          SELECT 
                apro.CCODIGOPRODUCTO,
                apro.CIDPRODUCTO,
                apro.CNOMBREPRODUCTO,
                amov.CUNIDADES,
                amov.CPRECIO,
                adoc.CRAZONSOCIAL,
                amov.CIDDOCUMENTO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                WHEN 'DEVOLUCIÓN'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'NOTA DE CR'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'DOCUMENTO '
                THEN SUM(amov.CTOTAL)
                ELSE
                SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                 $parametrosCanal,
                 '1' As indicador
                 FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admUnidadesMedidaPeso] as amed ON apro.CIDUNIDADBASE = amed.CIDUNIDAD WHERE $sWhere and  apro.CIDUNIDADBASE NOT IN(0,1,2,3,4,5,7,8) and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3001,
        3048,
        14,
        3056,
        6,
        3004,
        3012,
        3052,
        3061)
        GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
          UNION
          SELECT 
                apro.CCODIGOPRODUCTO,
                apro.CIDPRODUCTO,
                apro.CNOMBREPRODUCTO,
                amov.CUNIDADES,
                amov.CPRECIO,
                adoc.CRAZONSOCIAL,
                amov.CIDDOCUMENTO,
                DAY(adoc.CFECHA) As Dia,
                DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
                 agen.CNOMBREAGENTE END As Agente,
                 CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                WHEN 'DEVOLUCIÓN'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'NOTA DE CR'
                THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                WHEN 'DOCUMENTO '
                THEN SUM(amov.CTOTAL)
                ELSE
                SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                 $parametrosCanal,
                 '1' As indicador
                 FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admUnidadesMedidaPeso] as amed ON apro.CIDUNIDADBASE = amed.CIDUNIDAD  WHERE $sWhere and apro.CIDUNIDADBASE IN(19,32,34,40) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
        5,
        3047,
        3049,
        3050,
        3051,
        3106,
        8,
        3056,
        3057,
        3058,
        3111,
        3105)
        GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),
        
        VentasDiariasOrdenadas As(
            SELECT
                CCODIGOPRODUCTO,
                CNOMBREPRODUCTO,
                CUNIDADES,
                CAST(Dia as NVARCHAR(100)) as Day
            FROM ventasDiarias  $condicional
            
            )
        SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(CUNIDADES) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by CCODIGOPRODUCTO asc OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasDiarias AS(SELECT 
        apro.CCODIGOPRODUCTO,
        apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
         FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admUnidadesMedidaPeso] as amed ON apro.CIDUNIDADBASE = amed.CIDUNIDAD WHERE $sWhere and apro.CIDUNIDADBASE IN(11,15,27) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
5,
3001,
3002,
3003,
3023,
3030,
3076,
3096,
3108,
3115,
3128,
3148,
3172,
3173,
3174,
3175,
3176,
3177,
3178,
3179,
3180,
3181,
8,
3016,
3125,
3194,
3195,
3196,
3215,
3207,
3139,
3207,
3208,
3229,
6,
3013,
3014,
3015,
3024,
3060,
3078,
3094,
3106,
3116,
3126,
3146,
3182,
3183,
3184,
3185,
3186,
3187,
3188,
3189,
3190,
3191,
3212)
GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
  UNION
  SELECT 
        apro.CCODIGOPRODUCTO,
        apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
         FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admUnidadesMedidaPeso] as amed ON apro.CIDUNIDADBASE = amed.CIDUNIDAD WHERE $sWhere and  apro.CIDUNIDADBASE NOT IN(0,1,2,3,4,5,7,8) and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061)
GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL
  UNION
  SELECT 
        apro.CCODIGOPRODUCTO,
        apro.CIDPRODUCTO,
        apro.CNOMBREPRODUCTO,
        amov.CUNIDADES,
        amov.CPRECIO,
        adoc.CRAZONSOCIAL,
        amov.CIDDOCUMENTO,
        DAY(adoc.CFECHA) As Dia,
        DATEPART(week, adoc.CFECHA) AS SemanaAnio,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
        WHEN 'DEVOLUCIÓN'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'NOTA DE CR'
        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
        WHEN 'DOCUMENTO '
        THEN SUM(amov.CTOTAL)
        ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
         FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos].[dbo].[admUnidadesMedidaPeso] as amed ON apro.CIDUNIDADBASE = amed.CIDUNIDAD   WHERE $sWhere and apro.CIDUNIDADBASE IN(19,32,34,40) and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3047,
3049,
3050,
3051,
3106,
8,
3056,
3057,
3058,
3111,
3105)
GROUP BY apro.CCODIGOPRODUCTO,apro.CIDPRODUCTO,apro.CNOMBREPRODUCTO,amov.CUNIDADES,amov.CPRECIO,adoc.CRAZONSOCIAL,amov.CIDDOCUMENTO,adoc.CFECHA,adoc.CSERIEDOCUMENTO,agen.CNOMBREAGENTE,acon.CNOMBRECONCEPTO,amov.CPRECIO,amov.CUNIDADES,amov.CIMPUESTO1,adoc.CRAZONSOCIAL),

VentasDiariasOrdenadas As(
    SELECT
        CCODIGOPRODUCTO,
        CNOMBREPRODUCTO,
        CUNIDADES,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasDiarias   $condicional
    
    )
SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasDiariasOrdenadas PIVOT(SUM(CUNIDADES) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by CCODIGOPRODUCTO asc";

        $nums_row = $this->countAll($sql1);

        //Set counter
        $this->setCounter($nums_row);

        $query = $query->fetchAll();
        return $query;
    }
    public function getVentasMarca($tables, $campos, $search)
    {
        global $parametrosCanal;

        $offset = $search['offset'];
        $per_page = $search['per_page'];
        $año = $search['año'];
        $estatus = $search['estatus'];
        $arreglo = array();
        $arreglo2 = array();
        $clientes = explode(',', $search['query']);
        $cliente = "";
        for ($i = 0; $i < count($clientes); $i++) {
            $cliente .= "'" . $clientes[$i] . "', ";
        }
        $cliente = substr($cliente, 0, -2);
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, (int)$dia);
            $dia2 = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $dia2);
        }

        $sWhere = " adoc.CCANCELADO  = '" . $estatus . "' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '" . $año . "' ";

        if ($search["query"] != "") {
            $sWhere .= " and adoc.CRAZONSOCIAL in(" . $cliente . ") ";
        }
        $condicional = "WHERE indicador = 1 ";

        if ($search['canal'] != "") {

            $condicional .= " and CanalComercial = '" . $search['canal'] . "' ";
        }
        if ($search['agente'] != "") {

            $condicional .= " and Agente = '" . $search['agente'] . "' ";
        }

        $sql = "WITH ventasMarca as (SELECT 
        adoc.CSERIEDOCUMENTO,
        apro.CIDPRODUCTO,
        adoc.CFOLIO,
        amov.CPRECIO,
        acon.CNOMBRECONCEPTO,
        adoc.CRAZONSOCIAL,
        acla.CVALORCLASIFICACION as Marca,
        DAY(adoc.CFECHA) As Dia,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(amov.CTOTAL)
         ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        $parametrosCanal,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE WHERE $sWhere and amov.CIDDOCUMENTODE IN(4,5,7,13) and acon.CIDCONCEPTODOCUMENTO in(4,
  5,
  3001,
  3002,
  3003,
  3023,
  3030,
  3076,
  3096,
  3108,
  3115,
  3128,
  3148,
  3172,
  3173,
  3174,
  3175,
  3176,
  3177,
  3178,
  3179,
  3180,
  3181,
  8,
  3016,
  3125,
  3194,
  3195,
  3196,
  3215,
  3207,
  3139,
  3207,
  3208,
  3229,
  6,
  3013,
  3014,
  3015,
  3024,
  3060,
  3078,
  3094,
  3106,
  3116,
  3126,
  3146,
  3182,
  3183,
  3184,
  3185,
  3186,
  3187,
  3188,
  3189,
  3190,
  3191,
  3212) and adoc.CCANCELADO = 0 
    GROUP BY 
                      adoc.CSERIEDOCUMENTO,
                      adoc.CFOLIO,
                      apro.CIDPRODUCTO,
                      amov.CPRECIO,
                      adoc.CRAZONSOCIAL,
                      acla.CVALORCLASIFICACION,
                      adoc.CFECHA,
					  agen.CNOMBREAGENTE,
                      acon.CNOMBRECONCEPTO 
                      UNION
                      SELECT 
                      adoc.CSERIEDOCUMENTO,
                        apro.CIDPRODUCTO,
                        adoc.CFOLIO,
                        amov.CPRECIO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CRAZONSOCIAL,
                        acla.CVALORCLASIFICACION as Marca,
                        DAY(adoc.CFECHA) As Dia,
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
                        agen.CNOMBREAGENTE END As Agente,
                        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                        WHEN 'DEVOLUCIÓN'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'NOTA DE CR'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'DOCUMENTO '
                        THEN SUM(amov.CTOTAL)
                        ELSE
                        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                        $parametrosCanal,
                        '1' As indicador
                        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE WHERE $sWhere and amov.CIDDOCUMENTODE IN(4,5,13) and acon.CIDCONCEPTODOCUMENTO IN(4,
  5,
  3001,
  3048,
  14,
  3056,
  6,
  3004,
  3012,
  3052,
  3061) and adoc.CCANCELADO = 0 and apro.CIDVALORCLASIFICACION1 = 10 
    GROUP BY 
                      adoc.CSERIEDOCUMENTO,
                      adoc.CFOLIO,
                      apro.CIDPRODUCTO,
                      amov.CPRECIO,
                      adoc.CRAZONSOCIAL,
                      acla.CVALORCLASIFICACION,
                      adoc.CFECHA,
					  agen.CNOMBREAGENTE,
                      acon.CNOMBRECONCEPTO 
                  UNION
                      SELECT 
                      adoc.CSERIEDOCUMENTO,
                        apro.CIDPRODUCTO,
                        adoc.CFOLIO,
                        amov.CPRECIO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CRAZONSOCIAL,
                        acla.CVALORCLASIFICACION as Marca,
                        DAY(adoc.CFECHA) As Dia,
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
                        agen.CNOMBREAGENTE END As Agente,
                        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                        WHEN 'DEVOLUCIÓN'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'NOTA DE CR'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'DOCUMENTO '
                        THEN SUM(amov.CTOTAL)
                        ELSE
                        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                        $parametrosCanal,
                        '1' As indicador
                        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE WHERE $sWhere and amov.CIDDOCUMENTODE IN(4,5,7,13) and acon.CIDCONCEPTODOCUMENTO IN(4,
  5,
  3047,
  3049,
  3050,
  3051,
  3106,
  8,
  3056,
  3057,
  3058,
  3111,
  3105) and adoc.CCANCELADO = 0 
    GROUP BY 
                      adoc.CSERIEDOCUMENTO,
                      adoc.CFOLIO,
                      apro.CIDPRODUCTO,
                      amov.CPRECIO,
                      adoc.CRAZONSOCIAL,
                      acla.CVALORCLASIFICACION,
                      adoc.CFECHA,
					  agen.CNOMBREAGENTE,
                      acon.CNOMBRECONCEPTO 
    
    ),
    VentasOrdenadasMarca As(
          SELECT 
              Marca,
              Total,
              CAST(Dia as NVARCHAR(100)) as Day
          FROM ventasMarca $condicional
    
    )
    SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasOrdenadasMarca PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by Marca asc  OFFSET $offset ROWS FETCH NEXT $per_page ROWS ONLY";


        $query = $this->mysqli->query($sql);

        $sql1 = "WITH ventasMarca as (SELECT 
        adoc.CSERIEDOCUMENTO,
        apro.CIDPRODUCTO,
        adoc.CFOLIO,
        amov.CPRECIO,
        acon.CNOMBRECONCEPTO,
        adoc.CRAZONSOCIAL,
        acla.CVALORCLASIFICACION as Marca,
        DAY(adoc.CFECHA) As Dia,
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
         agen.CNOMBREAGENTE END As Agente,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(amov.CTOTAL)
         ELSE
        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
        $parametrosCanal,
        '1' As indicador
        FROM [adPINTURAS2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE WHERE $sWhere and amov.CIDDOCUMENTODE IN(4,5,7,13) and acon.CIDCONCEPTODOCUMENTO in(4,
  5,
  3001,
  3002,
  3003,
  3023,
  3030,
  3076,
  3096,
  3108,
  3115,
  3128,
  3148,
  3172,
  3173,
  3174,
  3175,
  3176,
  3177,
  3178,
  3179,
  3180,
  3181,
  8,
  3016,
  3125,
  3194,
  3195,
  3196,
  3215,
  3207,
  3139,
  3207,
  3208,
  3229,
  6,
  3013,
  3014,
  3015,
  3024,
  3060,
  3078,
  3094,
  3106,
  3116,
  3126,
  3146,
  3182,
  3183,
  3184,
  3185,
  3186,
  3187,
  3188,
  3189,
  3190,
  3191,
  3212) and adoc.CCANCELADO = 0 
    GROUP BY 
                      adoc.CSERIEDOCUMENTO,
                      adoc.CFOLIO,
                      apro.CIDPRODUCTO,
                      amov.CPRECIO,
                      adoc.CRAZONSOCIAL,
                      acla.CVALORCLASIFICACION,
                      adoc.CFECHA,
					  agen.CNOMBREAGENTE,
                      acon.CNOMBRECONCEPTO 
                      UNION
                      SELECT 
                      adoc.CSERIEDOCUMENTO,
                        apro.CIDPRODUCTO,
                        adoc.CFOLIO,
                        amov.CPRECIO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CRAZONSOCIAL,
                        acla.CVALORCLASIFICACION as Marca,
                        DAY(adoc.CFECHA) As Dia,
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
                        agen.CNOMBREAGENTE END As Agente,
                        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                        WHEN 'DEVOLUCIÓN'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'NOTA DE CR'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'DOCUMENTO '
                        THEN SUM(amov.CTOTAL)
                        ELSE
                        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                        $parametrosCanal,
                        '1' As indicador
                        FROM [adFLEX2020SADEC].[dbo].[admProductos] as apro LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adFLEX2020SADEC].[dbo].[admClasificacionesValores] as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE WHERE $sWhere and amov.CIDDOCUMENTODE IN(4,5,13) and acon.CIDCONCEPTODOCUMENTO IN(4,
  5,
  3001,
  3048,
  14,
  3056,
  6,
  3004,
  3012,
  3052,
  3061) and adoc.CCANCELADO = 0 and apro.CIDVALORCLASIFICACION1 = 10 
    GROUP BY 
                      adoc.CSERIEDOCUMENTO,
                      adoc.CFOLIO,
                      apro.CIDPRODUCTO,
                      amov.CPRECIO,
                      adoc.CRAZONSOCIAL,
                      acla.CVALORCLASIFICACION,
                      adoc.CFECHA,
					  agen.CNOMBREAGENTE,
                      acon.CNOMBRECONCEPTO 
                  UNION
                      SELECT 
                      adoc.CSERIEDOCUMENTO,
                        apro.CIDPRODUCTO,
                        adoc.CFOLIO,
                        amov.CPRECIO,
                        acon.CNOMBRECONCEPTO,
                        adoc.CRAZONSOCIAL,
                        acla.CVALORCLASIFICACION as Marca,
                        DAY(adoc.CFECHA) As Dia,
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
                        agen.CNOMBREAGENTE END As Agente,
                        CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
                        WHEN 'DEVOLUCIÓN'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'NOTA DE CR'
                        THEN (SUM((amov.CTOTAL)-amov.CIMPUESTO1)*0) -SUM((amov.CTOTAL)-amov.CIMPUESTO1)
                        WHEN 'DOCUMENTO '
                        THEN SUM(amov.CTOTAL)
                        ELSE
                        SUM((amov.CTOTAL)-amov.CIMPUESTO1) END AS Total,
                        $parametrosCanal,
                        '1' As indicador
                        FROM [adPinturas_y_Complemen].[dbo].[admProductos] as apro LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admMovimientos] as amov ON apro.CIDPRODUCTO = amov.CIDPRODUCTO LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc ON amov.CIDDOCUMENTO = adoc.CIDDOCUMENTO LEFT OUTER JOIN  [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] as acla ON apro.CIDVALORCLASIFICACION1 = acla.CIDVALORCLASIFICACION LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE WHERE $sWhere and amov.CIDDOCUMENTODE IN(4,5,7,13) and acon.CIDCONCEPTODOCUMENTO IN(4,
  5,
  3047,
  3049,
  3050,
  3051,
  3106,
  8,
  3056,
  3057,
  3058,
  3111,
  3105) and adoc.CCANCELADO = 0 
    GROUP BY 
                      adoc.CSERIEDOCUMENTO,
                      adoc.CFOLIO,
                      apro.CIDPRODUCTO,
                      amov.CPRECIO,
                      adoc.CRAZONSOCIAL,
                      acla.CVALORCLASIFICACION,
                      adoc.CFECHA,
					  agen.CNOMBREAGENTE,
                      acon.CNOMBRECONCEPTO 
    
    ),
    VentasOrdenadasMarca As(
          SELECT 
              Marca,
              Total,
              CAST(Dia as NVARCHAR(100)) as Day
          FROM ventasMarca $condicional
    
    )
    SELECT *,IsNull([$arreglo[0]],0) + IsNull([$arreglo[1]],0) + IsNull([$arreglo[2]],0) + IsNull([$arreglo[3]],0) + IsNull([$arreglo[4]],0) + IsNull([$arreglo[5]],0) Totales FROM VentasOrdenadasMarca PIVOT(SUM(Total) FOR Day in([$arreglo[0]],[$arreglo[1]],[$arreglo[2]],[$arreglo[3]],[$arreglo[4]],[$arreglo[5]])) as pivotTable order by Marca asc";

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