<?php

class ConexionTorres
{
    public $counter;


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
}
