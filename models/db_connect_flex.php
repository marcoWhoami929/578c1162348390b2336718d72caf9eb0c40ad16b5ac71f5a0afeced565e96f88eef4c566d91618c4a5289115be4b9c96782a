<?php

class ConexionFlex
{
    public $counter;


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
}
