<?php
require_once "db_connect.php";
require_once "db_connect_param.php";
require_once "db_connect_pinturas.php";
require_once "db_connect_flex.php";
require_once "db_connect_torres.php";
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
        $stmt = ConexionPinturas::conectarPinturas()->prepare("WITH agentes AS(SELECT 
              [CNOMBREAGENTE]
             
          FROM [parametrosVentas].[dbo].[CONCEPTOSFLEX]
          UNION 
          SELECT 
              CNOMBREAGENTE
             
          FROM [parametrosVentas].[dbo].[CONCEPTOSPINTURAS]),
          agentesLista AS(SELECT a.CNOMBREAGENTE from agentes as a)
          select * from agentesLista group by CNOMBREAGENTE");

        $stmt->execute();

        return $stmt->fetchAll();

        $stmt = null;
    }
}
