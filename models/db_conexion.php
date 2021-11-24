<?php
class ConexionBd
{
    public $counter;

    public static function conectar()
    {

        $link =  new PDO(
            "mysql:host=localhost;dbname=admon",
            "root",
            "",
            array(
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
            )
        );

        return $link;
    }
    public static function conectarParametros()
    {

        try {

            $connParam = new PDO(
                "sqlsrv:server=192.168.1.250;Database=parametrosVentas",
                "sa",
                "M78o03e09p56*",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
        } catch (PDOException $e) {
            die("Error connecting to SQL SERVER: " . $e->getMessage());
        }

        return $connParam;
    }
    public static function conectarPinturas()
    {

        try {

            $connParam = new PDO(
                "sqlsrv:server=192.168.1.250;Database=adPINTURAS2020SADEC",
                "sa",
                "M78o03e09p56*",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
        } catch (PDOException $e) {
            die("Error connecting to SQL SERVER: " . $e->getMessage());
        }

        return $connParam;
    }
    public static function conectarFlex()
    {

        try {

            $connParam = new PDO(
                "sqlsrv:server=192.168.1.250;Database=adFLEX2020SADEC",
                "sa",
                "M78o03e09p56*",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
        } catch (PDOException $e) {
            die("Error connecting to SQL SERVER: " . $e->getMessage());
        }

        return $connParam;
    }
    public static function conectarTorres()
    {

        try {

            $connParam = new PDO(
                "sqlsrv:server=192.168.1.250;Database=adPinturas_y_Complemen",
                "sa",
                "M78o03e09p56*",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
        } catch (PDOException $e) {
            die("Error connecting to SQL SERVER: " . $e->getMessage());
        }

        return $connParam;
    }
    public static function conectarDekkerlab()
    {

        try {

            $connParam = new PDO(
                "sqlsrv:server=192.168.1.250;Database=adDEKKERLAB",
                "sa",
                "M78o03e09p56*",
                array(
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                    PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8"
                )
            );
        } catch (PDOException $e) {
            die("Error connecting to SQL SERVER: " . $e->getMessage());
        }

        return $connParam;
    }
}
