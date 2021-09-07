<?php
require_once "db_connect.php";
require_once "db_connect_param.php";
require_once "db_connect_pinturas.php";
require_once "db_connect_flex.php";
require_once "db_connect_torres.php";
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
class ModelAmdon
{
    static public function mdlMostrarAdministradores($tabla, $item, $valor)
    {

        if ($item != null) {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE $item = :$item");

            $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);

            $stmt->execute();

            return $stmt->fetch();
        } else {

            $stmt = Conexion::conectar()->prepare("SELECT * FROM $tabla");

            $stmt->execute();

            return $stmt->fetchAll();
        }
    }
    static public function mdlRegistroBitacora($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, perfil, accion) VALUES(:usuario, :perfil, :accion)");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    static public function mdlListarCentroTrabajo($tabla)
    {
        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("SELECT CAST(CCENTROTRABAJO AS NVARCHAR(100)) as  CCENTROTRABAJO FROM $tabla GROUP BY CAST(CCENTROTRABAJO AS NVARCHAR(100))");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlListarCanalComercial($tabla)
    {
        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("SELECT CAST(CCANALCOMERCIAL AS NVARCHAR(100)) as CCANALCOMERCIAL FROM $tabla GROUP BY CAST(CCANALCOMERCIAL AS NVARCHAR(100))");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlObtenerDetalleCompra($empresa, $idDocumento)

    {

        switch ($empresa) {

            case "PINTURAS":
                $stmt = ConexionPinturas::conectarPinturas()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                break;
            case "FLEX":
                $stmt = ConexionFlex::conectarFlex()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                break;
            case "TORRES":
                $stmt = ConexionTorres::conectarTorres()->prepare("select admcon.CNOMBRECONCEPTO,admdoc.CFECHA,admdoc.CSERIEDOCUMENTO,admdoc.CFOLIO,admdoc.CRAZONSOCIAL from dbo.admDocumentos as admdoc INNER  JOIN dbo.admConceptos as admcon ON admdoc.CIDCONCEPTODOCUMENTO = admcon.CIDCONCEPTODOCUMENTO where admdoc.CIDDOCUMENTO = $idDocumento");
                break;
        }

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }
    static public function mdlObtenerListaAgentes()
    {
        $stmt = ConexionPinturas::conectarPinturas()->prepare("WITH Agentes AS(SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adPINTURAS2020SADEC].[dbo].[admAgentes]
          UNION
          SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adFLEX2020SADEC].[dbo].[admAgentes]
          UNION
          SELECT CIDAGENTE
              ,CNOMBREAGENTE
        
          FROM [adPinturas_y_Complemen].[dbo].[admAgentes]
          ),
          agentesLista AS(SELECT a.CNOMBREAGENTE from agentes as a)
                  select * from agentesLista group by CNOMBREAGENTE
        ");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlRegistroConcepto($empresa, $datos)
    {
        switch ($empresa) {
            case 'PINTURAS':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                break;
            case 'FLEX':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                break;
        }

        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("INSERT INTO $tabla (CNOMBREAGENTE,CCENTROTRABAJO,CCANALCOMERCIAL) VALUES(:nombreAgente,:centroTrabajo,:canalComercial)");

        $stmt->bindParam(":nombreAgente", $datos["agente"], PDO::PARAM_STR);
        $stmt->bindParam(":centroTrabajo", $datos["centroTrabajo"], PDO::PARAM_STR);
        $stmt->bindParam(":canalComercial", $datos["canalComercial"], PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    static public function mdlDetallesConcepto($empresa, $id)
    {
        switch ($empresa) {
            case 'PINTURAS':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                break;
            case 'FLEX':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                break;
        }
        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("SELECT * FROM $tabla where CIDPARAM = $id");

        $stmt->execute();

        return $stmt->fetch();

        $stmt = null;
    }
    static public function mdlActualizarConcepto($empresa, $datos)
    {
        switch ($empresa) {
            case 'PINTURAS':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                break;
            case 'FLEX':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                break;
        }
        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("UPDATE $tabla set CNOMBREAGENTE = :nombreAgente,CCENTROTRABAJO = :centroTrabajo, CCANALCOMERCIAL = :canalComercial WHERE CIDPARAM = :id");

        $stmt->bindParam(":id", $datos["id"], PDO::PARAM_STR);
        $stmt->bindParam(":nombreAgente", $datos["agente"], PDO::PARAM_STR);
        $stmt->bindParam(":centroTrabajo", $datos["centroTrabajo"], PDO::PARAM_STR);
        $stmt->bindParam(":canalComercial", $datos["canalComercial"], PDO::PARAM_STR);
        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    static public function mdlEliminarConcepto($empresa, $id)
    {
        switch ($empresa) {
            case 'PINTURAS':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSPINTURAS]";
                break;
            case 'FLEX':
                $tabla = "[parametrosVentas].[dbo].[CONCEPTOSFLEX]";
                break;
        }
        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("DELETE FROM $tabla WHERE CIDPARAM = $id");

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    static public function mdlTotalVentasDiarias()
    {
        global $parametrosCanal;

        $week = date("W");

        $arreglo = [];
        $arreglo2 = [];
        for ($i = 2; $i < 8; $i++) {
            $dia1 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, $dia1);
            $dia2 = date('d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, (int)$dia2);
        }



        $stmt = conexionPinturas::conectarPinturas()->prepare("WITH ventasDiarias AS(SELECT 
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
        $parametrosCanal
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'FLEX FINISHES MEXICO, S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
		 $parametrosCanal
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
		$parametrosCanal
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "'  and YEAR(adoc.CFECHA) = '2021' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
		
		Total,
		CAST(Dia as NVARCHAR(100)) as Day,
		canalComercial
	FROM ventasDiarias as vd WHERE canalComercial IS NOT NULL and canalComercial != 'SIN ASIGNAR' and canalComercial != 'PROPIAS'
	
	)
    SELECT *,IsNull([$arreglo2[0]],0) + IsNull([$arreglo2[1]],0) + IsNull([$arreglo2[2]],0) + IsNull([$arreglo2[3]],0) + IsNull([$arreglo2[4]],0) + IsNull([$arreglo2[5]],0) as Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo2[0]],[$arreglo2[1]],[$arreglo2[2]],[$arreglo2[3]],[$arreglo2[4]],[$arreglo2[5]])) as pivotTable order by canalComercial asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlTotalVentasDiariasDesglose()
    {
        global $parametrosCanal;
        $week = date("W");
        $arreglo = [];
        $arreglo2 = [];
        for ($i = 2; $i < 8; $i++) {
            $dia1 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo, $dia1);
            $dia2 = date('d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, (int)$dia2);
        }


        $stmt = conexionPinturas::conectarPinturas()->prepare("WITH ventasDiarias AS(SELECT 
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
        $parametrosCanal
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'FLEX FINISHES MEXICO, S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
		 $parametrosCanal
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
		$parametrosCanal
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "'  and YEAR(adoc.CFECHA) = '2021' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
		
		Desglose,
		CAST(Dia as NVARCHAR(100)) as Day,
		Agente
	FROM ventasDiarias as vd WHERE canalComercial = 'TIENDAS'
	
	)
SELECT *,IsNull([$arreglo2[0]],0) + IsNull([$arreglo2[1]],0) + IsNull([$arreglo2[2]],0) + IsNull([$arreglo2[3]],0) + IsNull([$arreglo2[4]],0) + IsNull([$arreglo2[5]],0) as Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo2[0]],[$arreglo2[1]],[$arreglo2[2]],[$arreglo2[3]],[$arreglo2[4]],[$arreglo2[5]])) as pivotTable order by Agente asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
}
