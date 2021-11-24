<?php
require_once "db_connect.php";
require_once "db_connect_param.php";
require_once "db_connect_pinturas.php";
require_once "db_connect_flex.php";
require_once "db_connect_torres.php";
$agenteList = "CASE SUBSTRING(adoc.CSERIEDOCUMENTO,3,4)
WHEN 'TR'
THEN 'PV TORRES'
WHEN 'RF'
THEN 'PV REFORMA'
WHEN 'SG'
THEN 'PV SANTIAGO'
WHEN 'SM'
THEN 'PV SAN MANUEL'
WHEN 'CP'
THEN 'PV CAPU' 
WHEN 'EC' 
THEN 'CARLOS MENDOZA MORALES' 

ELSE
CASE adoc.CSERIEDOCUMENTO
WHEN 'CACI'
THEN 
CASE  adoc.CRAZONSOCIAL
WHEN 'CLIENTE MOSTRADOR'
THEN 'ORLANDO BRIONES AGUIRRE'
ELSE
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
END
WHEN 'CRTD'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'CACM'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'CRCD'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
WHEN 'MARIA DE LOURDES JUAREZ JUAREZ'
THEN
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'DECD'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'DEPB'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'FAND'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'FACD'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
CASE adoc.CRAZONSOCIAL
WHEN 'CLIENTE MOSTRADOR'
THEN 
'CLAUDIA MARCELA VEGA AGUAYO'
ELSE
(SELECT CNOMBREAGENTE FROM adPINTURAS2020SADEC.dbo.admAgentes WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
END
ELSE
agen.CNOMBREAGENTE
END
WHEN 'FAPB'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM [adFLEX2020SADEC].[dbo].[admAgentes] WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'CRUE'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM [adFLEX2020SADEC].[dbo].[admAgentes] WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
WHEN 'MARIA DE LOURDES JUAREZ JUAREZ'
THEN
(SELECT CNOMBREAGENTE FROM [adFLEX2020SADEC].[dbo].[admAgentes] WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'NCPB'
THEN 
CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN 
(SELECT CNOMBREAGENTE FROM [adFLEX2020SADEC].[dbo].[admAgentes] WHERE CIDAGENTE = aclien.CIDAGENTEVENTA)
ELSE
agen.CNOMBREAGENTE
END
WHEN 'GCTD'
THEN 'PV TORRES'

ELSE
agen.CNOMBREAGENTE
END
END";
$parametrosCanal = "CASE agen.CNOMBREAGENTE
WHEN '(Ninguno)'
THEN
     CASE adoc.CSERIEDOCUMENTO
     WHEN 'DOPR'
     THEN
     'RUTA 5'
     WHEN 'FACD'
     THEN
     'CEDIS'
     WHEN 'FAND'
     THEN
     'CUENTAS CORPORATIVAS'
      WHEN 'FAPB'
     THEN
     'CEDIS'
     WHEN 'CRTD'
     THEN
        CASE agen.CNOMBREAGENTE
          WHEN 'PV TORRES'
         THEN '9 TORRES'
         WHEN 'PV REFORMA'
         THEN '3 REFORMA'
         WHEN 'PV SANTIAGO'
         THEN '6 SANTIAGO'
         WHEN 'PV SAN MANUEL'
         THEN '1 SAN MANUEL'
         WHEN 'PV CAPU'
         THEN '7 CAPU' 
		 WHEN 'CARLOS MENDOZA MORALES' 
		 THEN 'E-COMMERCE'
         ELSE
         'SIN ASIGNAR'
         END
      WHEN 'GCTD'
     THEN
        CASE agen.CNOMBREAGENTE
          WHEN 'PV TORRES'
         THEN '9 TORRES'
         WHEN 'PV REFORMA'
         THEN '3 REFORMA'
         WHEN 'PV SANTIAGO'
         THEN '6 SANTIAGO'
         WHEN 'PV SAN MANUEL'
         THEN '1 SAN MANUEL'
         WHEN 'PV CAPU'
         THEN '7 CAPU' 
		 WHEN 'CARLOS MENDOZA MORALES' 
		 THEN 'E-COMMERCE'
          ELSE
         'SIN ASIGNAR'
         END
      WHEN 'CACI'
     THEN
     'SIN ASIGNAR'
     WHEN 'NCPB'
     THEN
     'RUTA 5'
     WHEN 'FATR'
     THEN '9 TORRES'
     WHEN 'FARF'
     THEN '3 REFORMA'
     WHEN 'FASG'
     THEN '6 SANTIAGO'
     WHEN 'FASM'
     THEN '1 SAN MANUEL'
     WHEN 'FACP'
     THEN '7 CAPU' 
     WHEN 'FAEC' 
     THEN 'E-COMMERCE' 
     ELSE
     'SIN ASIGNAR'
     END

ELSE
case adoc.CRAZONSOCIAL
     WHEN 'CIPSA INDUSTRIAS S.A DE C.V.'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     ELSE
     case acon.CNOMBRECONCEPTO
     WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'DEVOLUCIÓN MAYOREO V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'FACTURA FX PUEBLA V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'FACTURA MAYOREO V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'NOTA DE CREDITO MAYOREO V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     WHEN 'DOCUMENTO PRUEBA V 3.3'
     THEN
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     ELSE
     (SELECT [CCENTROTRABAJO] FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS] WHERE CAST(CNOMBREAGENTE AS NVARCHAR(100))in ($agenteList ))
     END 
     END
END As centroTrabajo,
    CASE agen.CNOMBREAGENTE
           WHEN '(Ninguno)'
           THEN
                CASE adoc.CSERIEDOCUMENTO
                WHEN 'DOPR'
                THEN
                'RUTAS'
                WHEN 'FACD'
                THEN
                'CEDIS'
                WHEN 'FAND'
                THEN
                'FLOTILLAS'
                 WHEN 'FAPB'
                THEN
                'CEDIS'
                WHEN 'CRTD'
                THEN
                'TIENDAS'
                WHEN 'GCTD'
                THEN 'TIENDAS'
                 WHEN 'CACI'
                THEN
                'FLOTILLAS'
                WHEN 'NCPB'
                THEN
                'RUTAS'
                WHEN 'FATR'
                THEN 'TIENDAS'
                WHEN 'FARF'
                THEN 'TIENDAS'
                WHEN 'FASG'
                THEN 'TIENDAS'
                WHEN 'FASM'
                THEN 'TIENDAS'
                WHEN 'FACP'
                THEN 'TIENDAS' 
                WHEN 'FAEC' 
                THEN 'E-COMMERCE' 
                ELSE
                'SIN ASIGNAR'
                END
           
           ELSE
           CASE adoc.crazonsocial
                 WHEN 'CIPSA INDUSTRIAS S.A DE C.V.' THEN (SELECT [ccanalcomercial]
                                                           FROM
                 [parametrosVentas].[dbo].[conceptospinturas]
                                                           WHERE  Cast(cnombreagente AS
                                                                       NVARCHAR(100))IN
               (
               $agenteList ))
                 ELSE
                   CASE acon.cnombreconcepto
                     WHEN 'DEVOLUCIÓN FX PUEBLA V 3.3' THEN (SELECT [ccanalcomercial]
                                                              FROM
                     [parametrosVentas].[dbo].[conceptosflex]
                                                              WHERE  Cast(cnombreagente AS
                                                                          NVARCHAR
                                                                          (100))IN
               (
               $agenteList ))
               WHEN 'DEVOLUCIÓN MAYOREO V 3.3' THEN (SELECT [ccanalcomercial]
                                                    FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                    WHERE  Cast(cnombreagente AS NVARCHAR(
                                                                100))IN
               (
               $agenteList ))
               WHEN 'FACTURA FX PUEBLA V 3.3' THEN (SELECT [ccanalcomercial]
                                                  FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                  WHERE  Cast(cnombreagente AS
                                                              NVARCHAR(100))IN
               (
               $agenteList ))
               WHEN 'FACTURA MAYOREO V 3.3' THEN (SELECT [ccanalcomercial]
                                                FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                WHERE
               Cast(cnombreagente AS NVARCHAR(100))IN
               (
               $agenteList ))
               WHEN 'NOTA DE CARGO AL CLIENTE FX V 3.3' THEN (SELECT [ccanalcomercial]
                                                            FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                            WHERE  Cast(cnombreagente AS
                                                                        NVARCHAR(100))IN
               (
               $agenteList ))
               WHEN 'NOTA DE CARGO CLIENTE MAYOREO V 3.3' THEN (SELECT [ccanalcomercial]
                                                              FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                              WHERE  Cast(cnombreagente AS
                                                                          NVARCHAR(100))IN
               (
               $agenteList ))
               WHEN 'NOTA DE CRÉDITO FX PUEBLA V 3.3' THEN (SELECT [ccanalcomercial]
                                                           FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                           WHERE
               Cast(cnombreagente AS
                  NVARCHAR(100))IN
               (
               $agenteList ))
               WHEN 'NOTA DE CREDITO MAYOREO V 3.3' THEN (SELECT [ccanalcomercial]
                                                      FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                                      WHERE
               Cast(cnombreagente AS
                NVARCHAR(100))IN
               (
               $agenteList
               ))
               WHEN 'DOCUMENTO PRUEBA V 3.3' THEN (SELECT [ccanalcomercial]
                                               FROM
               [parametrosVentas].[dbo].[conceptosflex]
                                               WHERE
               Cast(cnombreagente AS NVARCHAR(100))IN
               (
               $agenteList ))
               ELSE (SELECT [ccanalcomercial]
                 FROM   [parametrosVentas].[dbo].[conceptospinturas]
                 WHERE  Cast(cnombreagente AS NVARCHAR(100))IN
               (
               $agenteList ))
                END 
                END
           END As canalComercial";
class ModelAdmon
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

        $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(usuario, perfil, accion,idAccion) VALUES(:usuario, :perfil, :accion, :idAccion)");

        $stmt->bindParam(":usuario", $datos["usuario"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":accion", $datos["accion"], PDO::PARAM_STR);
        $stmt->bindParam(":idAccion", $datos["idAccion"], PDO::PARAM_INT);
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
    static public function mdlListarCanalesComerciales()
    {

        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("WITH canales AS(SELECT CAST(CCANALCOMERCIAL AS NVARCHAR(100)) as CCANALCOMERCIAL FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS]
          UNION
          SELECT CAST(CCANALCOMERCIAL AS NVARCHAR(100)) as CCANALCOMERCIAL FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX]
          
          ),
          ListaCanales AS(SELECT c.CCANALCOMERCIAL from canales as c)
            SELECT * FROM ListaCanales group by CCANALCOMERCIAL
        ");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlListarCentrosTrabajo()
    {

        $stmt = ConexionParametrosVenta::conectarParametros()->prepare("WITH centros AS(SELECT CAST(CCENTROTRABAJO AS NVARCHAR(100)) as CCENTROTRABAJO FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS]
          UNION
          SELECT CAST(CCENTROTRABAJO AS NVARCHAR(100)) as CCENTROTRABAJO FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX]
          
          ),
          ListaCentros AS(SELECT c.CCENTROTRABAJO from centros as c)
            SELECT * FROM ListaCentros group by CCENTROTRABAJO
        ");

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
    static public function mdlObtenerListaMarcas()
    {
        $stmt = ConexionPinturas::conectarPinturas()->prepare("WITH Marcas As(SELECT
              CVALORCLASIFICACION As Marca
             
          FROM [adPINTURAS2020SADEC].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25
          UNION
          SELECT 
               CVALORCLASIFICACION As Marca
              
          FROM [adFLEX2020SADEC].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25
          UNION
          SELECT 
               CVALORCLASIFICACION As Marca
             
          FROM [adPinturas_y_Complemen].[dbo].[admClasificacionesValores] WHERE CIDCLASIFICACION = 25),
          marcasOrdenadas As(
            SELECT
                *
            FROM Marcas)
            SELECT * FROM marcasOrdenadas ORDER BY Marca ASC
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
        global $agenteList;

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
        $agenteList as Agente,
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
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'FLEX FINISHES MEXICO, S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
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
        $agenteList as Agente,
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
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
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
        $agenteList as Agente,
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
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "'  and YEAR(adoc.CFECHA) = '2021' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),

VentasDiariasOrdenadas As(
	SELECT
		
		Desglose,
		CAST(Dia as NVARCHAR(100)) as Day,
		canalComercial
	FROM ventasDiarias as vd WHERE canalComercial NOT IN('PROPIAS') 
	
	)
    SELECT *,IsNull([$arreglo2[0]],0) + IsNull([$arreglo2[1]],0) + IsNull([$arreglo2[2]],0) + IsNull([$arreglo2[3]],0) + IsNull([$arreglo2[4]],0) + IsNull([$arreglo2[5]],0) as Totales FROM VentasDiariasOrdenadas PIVOT(SUM(Desglose) FOR Day in([$arreglo2[0]],[$arreglo2[1]],[$arreglo2[2]],[$arreglo2[3]],[$arreglo2[4]],[$arreglo2[5]])) as pivotTable order by canalComercial asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlTotalVentasDiariasDesglose()
    {
        global $parametrosCanal;
        global $agenteList;
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
        $agenteList as Agente,
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
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'FLEX FINISHES MEXICO, S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
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
        $agenteList as Agente,
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
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2021' and adoc.CRAZONSOCIAL != 'PINTURAS Y COMPLEMENTOS DE PUEBLA S.A. DE C.V.' and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1
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
        $agenteList as Agente,
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
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE LEFT OUTER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE adoc.CCANCELADO  = 0 and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "'  and YEAR(adoc.CFECHA) = '2021' and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CIDDOCUMENTO,acon.CNOMBRECONCEPTO,adoc.CFECHA,adoc.CRAZONSOCIAL,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CDESCUENTOMOV,adoc.CTOTAL,adoc.CIMPUESTO1),

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
    static public function mdlVentasYearToDay()
    {
        global $parametrosCanal;
        global $agenteList;
        $fecha_actual = date("Y-m-d");
        $hoy = date("Y-m-d", strtotime($fecha_actual . "- 1 days"));
        $anterior = date("Y-m-d", strtotime($fecha_actual . "- 1 year -1 days"));

        $sWhere = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '2020-01-01' and adoc.CFECHA <= '" . $anterior . "' and YEAR(adoc.CFECHA) = '2020'";
        $sWhere2 = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '2021-01-01' and adoc.CFECHA <= '" . $hoy . "' and YEAR(adoc.CFECHA) = '2021'";
        $stmt = conexionPinturas::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        YEAR(adoc.CFECHA) As Año,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO),

ventasOrdenadas As(
    SELECT
        canalComercial,
        Total,
        Año
    FROM ventasData WHERE  canalComercial NOT IN('PROPIAS') 
    
    )
    SELECT * FROM ventasOrdenadas PIVOT(SUM(Total) FOR Año in([2020],[2021])) as pivotTable  order by canalComercial asc ");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlVentasYearToWeek()
    {
        global $parametrosCanal;
        global $agenteList;
        $arreglo = array();
        $arreglo2 = array();
        $arreglo3 = array();
        $arreglo4 = array();
        $week = date('W');
        $year = 2020;
        for ($day = 1; $day < 7; $day++) {
            $diaElegido = date('Y-m-d', strtotime($year . "W" . ($week) . $day));
            array_push($arreglo, $diaElegido);
            $dia = date('d', strtotime($year . "W" . ($week) . $day));
            $mes = date('m', strtotime($year . "W" . ($week) . $day));
            $año = date('Y', strtotime($year . "W" . ($week) . $day));
            $fecha = $año . "-" . (int)$mes . "-" . (int)$dia;
            array_push($arreglo3, $fecha);
        }
        for ($i = 2; $i < 8; $i++) {

            $diaElegido2 = date('Y-m-d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arreglo2, $diaElegido2);
            $dia2 = date('d', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            $mes2 = date('m', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            $año2 = date('Y', strtotime('01/01 +' . ($week - 1) . ' weeks first day +' . $i . ' day'));
            $fecha2 = $año2 . "-" . (int)$mes2 . "-" . (int)$dia2;
            array_push($arreglo4, $fecha2);
        }


        $sWhere = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '" . $arreglo[0] . "' and adoc.CFECHA <= '" . $arreglo[5] . "' and YEAR(adoc.CFECHA) = '2020'";
        $sWhere2 = " adoc.CCANCELADO  = '0' and adoc.CFECHA >= '" . $arreglo2[0] . "' and adoc.CFECHA <= '" . $arreglo2[5] . "' and YEAR(adoc.CFECHA) = '2021'";
        $stmt = conexionPinturas::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA), '-', DAY(adoc.CFECHA)) As Dia,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO),

ventasOrdenadas As(
    SELECT
        canalComercial,
        Total,
        CAST(Dia as NVARCHAR(100)) as Day
    FROM ventasData WHERE canalComercial NOT IN('PROPIAS')  
    
    )
    SELECT *  FROM ventasOrdenadas PIVOT(SUM(Total) FOR Day in([$arreglo3[0]],[$arreglo4[0]],[$arreglo3[1]],[$arreglo4[1]],[$arreglo3[2]],[$arreglo4[2]],[$arreglo3[3]],[$arreglo4[3]],[$arreglo3[4]],[$arreglo4[4]],[$arreglo3[5]],[$arreglo4[5]])) as pivotTable order by canalComercial asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlVentasYearToMonth()
    {
        global $parametrosCanal;
        global $agenteList;


        $sWhere = " adoc.CCANCELADO  = '0' and YEAR(adoc.CFECHA) = '2020'";
        $sWhere2 = " adoc.CCANCELADO  = '0'  and YEAR(adoc.CFECHA) = '2021'";
        $stmt = conexionPinturas::conectarPinturas()->prepare("WITH ventasData AS(SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPINTURAS2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adPINTURAS2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPINTURAS2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPINTURAS2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2  and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO in(4,
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
3212,3233,3234)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adFLEX2020SADEC].[dbo].[admDocumentos] as adoc INNER JOIN [adFLEX2020SADEC].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adFLEX2020SADEC].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adFLEX2020SADEC].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2   and adoc.CIDDOCUMENTODE IN(4,5,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
5,
3001,
3048,
14,
3056,
6,
3004,
3012,
3052,
3061,3053)
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO
  UNION
  SELECT 
        adoc.CSERIEDOCUMENTO,
        adoc.CFOLIO,
        adoc.CRAZONSOCIAL As NombreCliente,
        CONCAT(YEAR(adoc.CFECHA),'-',MONTH(adoc.CFECHA)) As Mes,
        $agenteList as Agente,
         adoc.CNETO As Importe,
         adoc.CDESCUENTOMOV As Descuento,
         adoc.CIMPUESTO1 As IVA,
         adoc.CTOTAL As Totals,
         CASE SUBSTRING(acon.CNOMBRECONCEPTO,1,10)
         WHEN 'DEVOLUCIÓN'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'NOTA DE CR'
         THEN (SUM(adoc.CTOTAL-adoc.CIMPUESTO1)*0) -SUM(adoc.CTOTAL-adoc.CIMPUESTO1)
         WHEN 'DOCUMENTO '
         THEN SUM(adoc.CTOTAL)
         ELSE
         SUM(adoc.CTOTAL-adoc.CIMPUESTO1) END AS Total,
         $parametrosCanal,
         '1' As indicador
  FROM [adPinturas_y_Complemen].[dbo].[admDocumentos] as adoc INNER JOIN [adPinturas_y_Complemen].[dbo].[admClientes] as aclien ON adoc.CIDCLIENTEPROVEEDOR = aclien.CIDCLIENTEPROVEEDOR INNER JOIN [adPinturas_y_Complemen].[dbo].[admAgentes] as agen ON adoc.CIDAGENTE = agen.CIDAGENTE INNER JOIN [adPinturas_y_Complemen].[dbo].[admConceptos] as acon ON adoc.CIDDOCUMENTODE = acon.CIDDOCUMENTODE AND adoc.CIDCONCEPTODOCUMENTO = acon.CIDCONCEPTODOCUMENTO WHERE $sWhere2 and adoc.CIDDOCUMENTODE IN(4,5,7,13) and adoc.CIDCONCEPTODOCUMENTO IN(4,
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
  GROUP BY aclien.CIDAGENTEVENTA,adoc.CSERIEDOCUMENTO,adoc.CFOLIO,adoc.CRAZONSOCIAL,adoc.CFECHA,agen.CNOMBREAGENTE,adoc.CNETO,adoc.CDESCUENTOMOV,adoc.CIMPUESTO1,adoc.CTOTAL,acon.CNOMBRECONCEPTO),

ventasOrdenadas As(
    SELECT
        canalComercial,
        Total,
        CAST(Mes as NVARCHAR(100)) as Mont
    FROM ventasData WHERE canalComercial NOT IN('PROPIAS')  
    
    )
    SELECT *,((NULLIF(ISNULL((IsNull([2021-1],0)+IsNull([2021-2],0)+IsNull([2021-3],0)+IsNull([2021-4],0)+IsNull([2021-5],0)+IsNull([2021-6],0)+IsNull([2021-7],0)+IsNull([2021-8],0)+IsNull([2021-9],0)+IsNull([2021-10],0)+IsNull([2021-11],0)+IsNull([2021-12],0)),0),0)/NULLIF(ISNULL((IsNull([2020-1],0)+IsNull([2020-2],0)+IsNull([2020-3],0)+IsNull([2020-4],0)+IsNull([2020-5],0)+IsNull([2020-6],0)+IsNull([2020-7],0)+IsNull([2020-8],0)+IsNull([2020-9],0)+IsNull([2020-10],0)+IsNull([2020-11],0)+IsNull([2020-12],0)),0),0))-100/100)*100 AS Crecimiento FROM ventasOrdenadas PIVOT(SUM(Total) FOR Mont in([2020-1],[2021-1],[2020-2],[2021-2],[2020-3],[2021-3],[2020-4],[2021-4],[2020-5],[2021-5],[2020-6],[2021-6],[2020-7],[2021-7],[2020-8],[2021-8],[2020-9],[2021-9],[2020-10],[2021-10],[2020-11],[2021-11],[2020-12],[2021-12])) as pivotTable order by canalComercial asc");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
    static public function mdlListarUsuarios($tabla, $item, $valor)
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
    /*=============================================
	ACTIVAR USUARIO
	=============================================*/

    static public function mdlActualizarEstadoUsuario($tabla, $item, $valor, $item2, $valor2)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla SET $item = :$item WHERE $item2 = :$item2");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_STR);
        $stmt->bindParam(":" . $item2, $valor2, PDO::PARAM_STR);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    /*==============================
    CREACION DE USUARIO
    ================================ */
    static public function mdlCreacionUsuarioAdmin($tabla, $datos)
    {
        $email = $datos["email"];
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE email = '" . $email . "' ");
        $consulta->execute();
        $existe = $consulta->rowCount();

        if ($existe == 0) {

            $stmt = Conexion::conectar()->prepare("INSERT INTO $tabla(nombre, email, foto,password,grupo,perfil) VALUES(:nombre, :email, :foto, :password, :grupo, :perfil)");

            $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
            $stmt->bindParam(":email", $datos["email"], PDO::PARAM_STR);
            $stmt->bindParam(":foto", $datos["foto"], PDO::PARAM_STR);
            $stmt->bindParam(":password", $datos["password"], PDO::PARAM_STR);
            $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
            $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);

            if ($stmt->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } else {
            return "existe";
        }
    }
    /*==============================
    ACTUALIZACION DE DATOS DE USUARIO
    ================================ */
    static public function mdlActualizacionUsuarioAdmin($tabla, $datos)
    {

        $stmt = Conexion::conectar()->prepare("UPDATE $tabla set nombre = :nombre,grupo = :grupo, perfil = :perfil WHERE id = :idUsuario");

        $stmt->bindParam(":nombre", $datos["nombre"], PDO::PARAM_STR);
        $stmt->bindParam(":grupo", $datos["grupo"], PDO::PARAM_STR);
        $stmt->bindParam(":perfil", $datos["perfil"], PDO::PARAM_STR);
        $stmt->bindParam(":idUsuario", $datos["idUsuario"], PDO::PARAM_INT);

        if ($stmt->execute()) {
            return "ok";
        } else {
            return "error";
        }
    }
    /*==============================
    ELIMINACION DE USUARIO
    ================================ */
    static public function mdlEliminarUsuarioAdmin($tabla, $item, $valor)
    {

        $stmt = Conexion::conectar()->prepare("DELETE FROM $tabla WHERE $item = :$item");

        $stmt->bindParam(":" . $item, $valor, PDO::PARAM_INT);

        if ($stmt->execute()) {

            return "ok";
        } else {

            return "error";
        }
    }
    /*==============================
    ACTUALIZACION PASSWORD
    ================================ */
    static public function mdlActualizacionPasswordUsuarioAdmin($tabla, $datos)
    {
        $password = $datos["password"];
        $id = $datos["idUsuario"];
        $consulta = Conexion::conectar()->prepare("SELECT * FROM $tabla WHERE password = '" . $password . "' and id = '" . $id . "' ");
        $consulta->execute();
        $existe = $consulta->rowCount();

        if ($existe == 0) {
            $stmt = Conexion::conectar()->prepare("UPDATE $tabla set password = '" . $password . " 'WHERE id = '" . $id . "'");
            if ($stmt->execute()) {

                return "ok";
            } else {

                return "error";
            }
        } else {
            return "exist";
        }
    }
}
