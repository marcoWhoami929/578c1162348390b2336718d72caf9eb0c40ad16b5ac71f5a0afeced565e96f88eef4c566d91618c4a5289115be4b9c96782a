<?php
error_reporting(0);

class ControllerReports
{
    public function ctrDescargarReporteUltimosCostos($empresa, $query, $año)
    {
        $empresaElegida = $empresa;
        $codigoProducto = $query;
        $añoElegido = $año;

        switch ($empresaElegida) {
            case "PINTURAS":

                $database = new ultimosCostosPinturas();
                $nombreEmpresa = "P I N T U R A S";
                break;
            case "FLEX":

                $database = new ultimosCostosFlex();
                $nombreEmpresa = "F L E X";
                break;
            case "TORRES":

                $database = new ultimosCostosTorres();
                $nombreEmpresa = "T O R R E S";
                break;
        }

        $reporte = $database->getDataReporteUltimosCostos($codigoProducto, $añoElegido);
        $reporteFechas = $database->getFechaReporteUltimosCostos($codigoProducto, $añoElegido);

        /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

        $nombre = "UltimosCostos" . '.xls';

        header('Expires: 0');
        header('Cache-control: private');
        header('Content-type: application/vnd.ms-excel'); // Archivo de Excel
        header("Cache-Control: cache, must-revalidate");
        header('Content-Description: File Transfer');
        header('Last-Modified: ' . date('D, d M Y H:i:s'));
        header("Pragma: public");
        header('Content-Disposition:; filename="' . $nombre . '"');
        header("Content-Transfer-Encoding: binary");

        $arregloHeaders = ['Código Producto', 'Nombre Producto', 'Fecha', 'Enero', 'Fecha', 'Febrero', 'Fecha', 'Marzo', 'Fecha', 'Abril', 'Fecha', 'Mayo', 'Fecha', 'Junio', 'Fecha', 'Julio', 'Fecha', 'Agosto', 'Fecha', 'Septiembre', 'Fecha', 'Octubre', 'Fecha', 'Noviembre', 'Fecha', 'Diciembre'];


        echo utf8_decode("<table>");
        echo "<tr>
					<th colspan='26' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='26' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; D E &nbsp; U L T I M O S &nbsp; C O S T O S &nbsp</th>
					</tr>

					<tr>
					<th colspan='26' style='font-weight:bold; background:#17202A; color:white;'>$nombreEmpresa $añoElegido</th>
					</tr>";
        echo utf8_decode("<tr>");
        for ($i = 0; $i < count($arregloHeaders); $i++) {
            echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'></td>");
        }
        echo utf8_decode("</tr>");
        echo utf8_decode("<tr>");

        foreach ($arregloHeaders as $key => $value) {

            echo utf8_decode("<td style='font-weight:bold; background:#000000; color:white;'>" . $value . "</td>");
        }
        echo utf8_decode("</tr>");

        foreach ($reporte as $key => $value) {

            if ($año == '2013') {

                $mes1 = $value['1'];
                $fecha1 = $reporteFechas[$key]['1'];

                $mes2 = $value['2'];
                $fecha2 = $reporteFechas[$key]['2'];

                $mes3 = $value['3'];
                $fecha3 = $reporteFechas[$key]['3'];

                $mes4 = $value['4'];
                $fecha4 = $reporteFechas[$key]['4'];

                $mes5 = $value['5'];
                $fecha5 = $reporteFechas[$key]['5'];

                $mes6 = $value['6'];
                $fecha6 = $reporteFechas[$key]['6'];

                $mes7 = $value['7'];
                $fecha7 = $reporteFechas[$key]['7'];

                $mes8 = $value['8'];
                $fecha8 = $reporteFechas[$key]['8'];

                $mes9 = $value['9'];
                $fecha9 = $reporteFechas[$key]['9'];

                $mes10 = $value['10'];
                $fecha10 = $reporteFechas[$key]['10'];

                $mes11 = $value['11'];
                $fecha11 = $reporteFechas[$key]['11'];

                $mes12 = $value['12'];
                $fecha12 = $reporteFechas[$key]['12'];
            } else {

                if ($value['1'] === '0.0') {
                    $idProducto = $value[0];
                    $ultimoCosto = $database->getUltimoCosto($idProducto, $año);

                    $mes1 = $ultimoCosto["CULTIMOCOSTOH"];
                    $fecha1 = $ultimoCosto["CFECHACOSTOH"];
                } else {

                    $mes1 = $value['1'];
                    $fecha1 = $reporteFechas[$key]['1'];
                }
                if ($value['2'] === NULL) {
                    $mes2 = $mes1;
                    $fecha2 = $fecha1;
                } else {
                    $mes2 = $value['2'];
                    $fecha2 = $reporteFechas[$key]['2'];
                }

                if ($value['3'] === NULL) {
                    $mes3 = $mes2;
                    $fecha3 = $fecha2;
                } else {
                    $mes3 = $value['3'];
                    $fecha3 = $reporteFechas[$key]['3'];
                }
                if ($value['4'] === NULL) {
                    $mes4 = $mes3;
                    $fecha4 = $fecha3;
                } else {
                    $mes4 = $value['4'];
                    $fecha4 = $reporteFechas[$key]['4'];
                }
                if ($value['5'] === NULL) {
                    $mes5 = $mes4;
                    $fecha5 = $fecha4;
                } else {
                    $mes5 = $value['5'];
                    $fecha5 = $reporteFechas[$key]['5'];
                }
                if ($value['6'] === NULL) {
                    $mes6 = $mes5;
                    $fecha6 = $fecha5;
                } else {
                    $mes6 = $value['6'];
                    $fecha6 = $reporteFechas[$key]['6'];
                }
                if ($value['7'] === NULL) {
                    $mes7 = $mes6;
                    $fecha7 = $fecha6;
                } else {
                    $mes7 = $value['7'];
                    $fecha7 = $reporteFechas[$key]['7'];
                }
                if ($value['8'] === NULL) {
                    $mes8 = $mes7;
                    $fecha8 = $fecha7;
                } else {
                    $mes8 = $value['8'];
                    $fecha8 = $reporteFechas[$key]['8'];
                }
                if ($value['9'] === NULL) {
                    $mes9 = $mes8;
                    $fecha9 = $fecha8;
                } else {
                    $mes9 = $value['9'];
                    $fecha9 = $reporteFechas[$key]['9'];
                }
                if ($value['10'] === NULL) {
                    $mes10 = $mes9;
                    $fecha10 = $fecha9;
                } else {
                    $mes10 = $value['10'];
                    $fecha10 = $reporteFechas[$key]['10'];
                }
                if ($value['11'] === NULL) {
                    $mes11 = $mes10;
                    $fecha11 = $fecha10;
                } else {
                    $mes11 = $value['11'];
                    $fecha11 = $reporteFechas[$key]['11'];
                }
                if ($value['12'] === NULL) {
                    $mes12 = $mes11;
                    $fecha12 = $fecha11;
                } else {
                    $mes12 = $value['12'];
                    $fecha12 = $reporteFechas[$key]['12'];
                }
            }

            $codigoProducto = "=\"" . $value["CCODIGOPRODUCTO"] . "\"";
            $style='mso-number-format:"@";';
            echo utf8_decode("<tr>
										<td style='".$style."'>" . $value["CCODIGOPRODUCTO"] . "</td>
				 						<td style='color:black;'>" . $value["CNOMBREPRODUCTO"] . "</td>
                                        <td style='color:black;'>" . substr($fecha1, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes1, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha2, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes2, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha3, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes3, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha4, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes4, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha5, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes5, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha6, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes6, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha7, 0, 10) . "</td>
										<td style='color:black;'>" . number_format($mes7, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha8, 0, 10) . "</td>
                                        <td style='color:black;'>" . number_format($mes8, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha9, 0, 10) . "</td>
                                        <td style='color:black;'>" . number_format($mes9, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha10, 0, 10) . "</td>
                                        <td style='color:black;'>" . number_format($mes10, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha11, 0, 10) . "</td>
                                        <td style='color:black;'>" . number_format($mes11, 2) . "</td>
                                        <td style='color:black;'>" . substr($fecha12, 0, 10) . "</td>
                                        <td style='color:black;'>" . number_format($mes12, 2) . "</td>
				
										</tr>");
        }


        echo "</table>";
    }
}
