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
            $style = 'mso-number-format:"@";';
            echo utf8_decode("<tr>
										<td style='" . $style . "'>" . $value["CCODIGOPRODUCTO"] . "</td>
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

    public function ctrDescargarReporteVentasDiario($tables, $campos, $search)
    {

        $database = new detalleVentasDiario();
        $arreglo = array();
        $arregloCampos = array();
        $arregloHeaders = array();
        $arregloHojas = array();


        /**DECLARAMOS LOS ESTILOS DE LA FUENTE**/
        $styleTitle = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 14,
                'name'  => 'Calibri'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        $styleSubtitle = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
                'name'  => 'Calibri Light'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        $styleFields = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 10,
                'name'  => 'Calibri'
            )
        );

        switch ($search["vista"]) {
            case 'ventasClienteDiario':
                $datos = $database->getVentasCliente($tables, $campos, $search);
                $vista = "C L I E N T E ";
                $nombreReporte = "Reporte Ventas Clientes";
                array_push($arregloHojas, "Clientes");
                array_push($arregloHeaders, "CLIENTE");
                array_push($arregloCampos, "NombreCliente");

                break;
            case 'ventasCanalDiario':
                $datos = $database->getVentasCanal($tables, $campos, $search);
                $vista = "C A N A L";
                $nombreReporte = "Reporte Ventas  Canal";
                array_push($arregloHojas, "Canal");
                array_push($arregloHeaders, "CANAL", "CENTRO TRABAJO");
                array_push($arregloCampos, "canalComercial", "centroTrabajo");
                break;
            case 'ventasAgenteDiario':
                $datos = $database->getVentasAgente($tables, $campos, $search);

                $vista = "A G E N T E ";
                $nombreReporte = "Reporte Ventas Agente";
                array_push($arregloHojas, "Agentes");
                array_push($arregloHeaders, "AGENTE");
                array_push($arregloCampos, "Agente");
                break;
            case 'ventasProductoDiario':
                $datos = $database->getVentasProductoMonto($tables, $campos, $search);
                $datos2 = $database->getVentasProductoUnidades($tables, $campos, $search);
                $vista = "P R O D U C T O";
                $nombreReporte = "Reporte Ventas Producto";
                array_push($arregloHojas, "Montos", "Unidades");
                array_push($arregloHeaders, "CODIGO", "NOMBRE");
                array_push($arregloCampos, "CCODIGOPRODUCTO", "CNOMBREPRODUCTO");
                break;
            case 'ventasLitreadoDiario':
                $datos = $database->getVentasLitreadoMonto($tables, $campos, $search);
                $datos2 = $database->getVentasLitreadoUnidades($tables, $campos, $search);
                $vista = "L I T R E A D O";
                $nombreReporte = "Reporte Ventas Litreado";
                array_push($arregloHojas, "Montos", "Unidades");
                array_push($arregloHeaders, "CODIGO", "NOMBRE");
                array_push($arregloCampos, "CCODIGOPRODUCTO", "CNOMBREPRODUCTO");
                break;
            case 'ventasMarcaDiario':
                $datos = $database->getVentasMarca($tables, $campos, $search);
                $vista = "M A R C A";
                $nombreReporte = "Reporte Ventas Marca";
                array_push($arregloHojas, "Marcas");
                array_push($arregloHeaders, "MARCA");
                array_push($arregloCampos, "Marca");
                break;
        }
        //var_dump($datos);
        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        $objWorksheet = $objPHPExcel->getActiveSheet();

        /**CABECERAS PRINCIPALES DOCUMENTO**/

        $abecedario = array();
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */
        for ($i = 2; $i < 8; $i++) {
            $dia = date('Y-m-d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arregloHeaders, $dia);
        }
        array_push($arregloHeaders, "TOTAL GENERAL");
        for ($i = 2; $i < 8; $i++) {

            $dia = date('d', strtotime('01/01 +' . ($search["semana"] - 1) . ' weeks first day +' . $i . ' day'));
            array_push($arregloCampos, $dia);
        }
        array_push($arregloCampos, "Totales");
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */
        $column = 'A';
        for ($i = 0; $i < count($arregloHeaders); $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($column . '4', $arregloHeaders[$i]);
            array_push($abecedario, $column);
            $column++;
        }
        $total = count($arregloHeaders) - 1;
        $letra = $abecedario[$total];
        $objPHPExcel->getActiveSheet()->setAutoFilter("A4:" . $letra . "4");

        $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->applyFromArray($styleFields);
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */

        /**CABECERAS PRINCIPALES DOCUMENTO**/
        $objPHPExcel->getActiveSheet()->mergeCells("A1:" . $letra . "1");
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SAN FRANCISCO DEKKERLAB');
        $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "1")->applyFromArray($styleTitle);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

        $objPHPExcel->getActiveSheet()->mergeCells("A2:" . $letra . "2");
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REPORTE DE VENTAS DIARIO POR');
        $objPHPExcel->getActiveSheet()->getStyle("A2:" . $letra . "2")->applyFromArray($styleSubtitle);
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

        $objPHPExcel->getActiveSheet()->mergeCells("A3:" . $letra . "3");
        $objPHPExcel->getActiveSheet()->setCellValue('A3', '' . $vista . '');
        $objPHPExcel->getActiveSheet()->getStyle("A3:" . $letra . "3")->applyFromArray($styleSubtitle);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

        $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "3")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '17202A')
        ));
        $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
        ));

        /***CREACION DE CONTENIDO DINAMICO***/

        $i = 5;
        $totalCampos = count($arregloCampos) - 1;
        foreach ($datos as $key => $value) {
            if ($search["vista"] == "ventasProductoDiario" || $search["vista"] == "ventasLitreadoDiario" || $search["vista"] == "ventasCanalDiario") {
                $objPHPExcel->getActiveSheet()->getStyle("A$i:B$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[$arregloCampos[6]]);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
            } else {
                $objPHPExcel->getActiveSheet()->getStyle("A$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[(int)$arregloCampos[1]]);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);

                $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
            }


            $i++;
        }
        $puntero = $i - 1;
        /***HACER FOOTER SUMA DE TOTALES */
        if ($search["vista"] == "ventasProductoDiario" || $search["vista"] == "ventasLitreadoDiario" || $search["vista"] == "ventasCanalDiario") {
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->mergeCells("A$i:B$i");
            $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
            $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
        } else {

            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->mergeCells("A$i:A$i");
            $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
            $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->setCellValue("B$i", "=SUM(B5:B$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
        }


        /***CREACION DE CONTENIDO DINAMICO***/
        for ($i = 'A'; $i <= $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        }
        $objPHPExcel->getActiveSheet()->setTitle('' . $arregloHojas[0] . '');

        /*Actualizar hoja*/
        if (count($arregloHojas) > 1) {
            /* Create a new worksheet, after the default sheet*/
            $objPHPExcel->createSheet();

            /* Add some data to the second sheet, resembling some different data types*/
            $objPHPExcel->setActiveSheetIndex(1);


            $column = 'A';
            for ($i = 0; $i < count($arregloHeaders); $i++) {
                $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue($column . '4', $arregloHeaders[$i]);
                array_push($abecedario, $column);
                $column++;
            }
            $total = count($arregloHeaders) - 1;
            $letra = $abecedario[$total];
            $objPHPExcel->getActiveSheet()->setAutoFilter("A4:" . $letra . "4");

            $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->applyFromArray($styleFields);
            /**CABECERAS PRINCIPALES DOCUMENTO**/
            $objPHPExcel->getActiveSheet()->mergeCells("A1:" . $letra . "1");
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SAN FRANCISCO DEKKERLAB');
            $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "1")->applyFromArray($styleTitle);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

            $objPHPExcel->getActiveSheet()->mergeCells("A2:" . $letra . "2");
            $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REPORTE DE VENTAS DIARIO POR');
            $objPHPExcel->getActiveSheet()->getStyle("A2:" . $letra . "2")->applyFromArray($styleSubtitle);
            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

            $objPHPExcel->getActiveSheet()->mergeCells("A3:" . $letra . "3");
            $objPHPExcel->getActiveSheet()->setCellValue('A3', '' . $vista . '');
            $objPHPExcel->getActiveSheet()->getStyle("A3:" . $letra . "3")->applyFromArray($styleSubtitle);
            $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

            $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "3")->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '17202A')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));

            $i = 5;
            $totalCampos = count($arregloCampos) - 1;
            foreach ($datos2 as $key => $value) {
                if ($search["vista"] == "ventasProductoDiario" || $search["vista"] == "ventasLitreadoDiario" || $search["vista"] == "ventasCanalDiario") {
                    $objPHPExcel->getActiveSheet()->getStyle("A$i:B$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                    $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
                } else {
                    $objPHPExcel->getActiveSheet()->getStyle("A$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[(int)$arregloCampos[1]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);

                    $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
                }

                //$objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                $i++;
            }
            $puntero = $i - 1;
            /***HACER FOOTER SUMA DE TOTALES */
            if ($search["vista"] == "ventasProductoDiario" || $search["vista"] == "ventasLitreadoDiario" || $search["vista"] == "ventasCanalDiario") {
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
                ));
                $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->mergeCells("A$i:B$i");
                $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
                $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
            } else {

                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
                ));
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->mergeCells("A$i:A$i");
                $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
                $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i", "=SUM(B5:B$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
            }


            for ($i = 'A'; $i <= $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
            }
            /* Rename 2nd sheet*/
            $objPHPExcel->getActiveSheet()->setTitle('' . $arregloHojas[1] . '');
        } else {
        }

        if ($search["vista"] == "ventasAgenteDiario") {
            /*****GENERACION DE GFRAFICO */
            $dataseriesLabels = array(
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$B$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$C$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$D$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$E$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$F$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$G$4', null, 1),


            );

            $xAxisTickValues = array(
                new PHPExcel_Chart_DataSeriesValues('String', 'Agentes!$A$5:$A$' . $puntero, null, 4),
            );


            $dataSeriesValues = array(
                new PHPExcel_Chart_DataSeriesValues('Number', 'Agentes!$B$5:$B$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Agentes!$C$5:$C$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Agentes!$D$5:$D$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Agentes!$E$5:$E$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Agentes!$F$5:$F$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Agentes!$G$5:$G$' . $puntero, null, 4),
            );

            //	Build the dataseries
            $series = new PHPExcel_Chart_DataSeries(
                PHPExcel_Chart_DataSeries::TYPE_BARCHART,        // plotType
                PHPExcel_Chart_DataSeries::GROUPING_STANDARD,    // plotGrouping
                range(0, count($dataSeriesValues) - 1),            // plotOrder
                $dataseriesLabels,                                // plotLabel
                $xAxisTickValues,                                // plotCategory
                $dataSeriesValues                                // plotValues
            );
            //	Set additional dataseries parameters
            //		Make it a vertical column rather than a horizontal bar graph
            $series->setPlotDirection(PHPExcel_Chart_DataSeries::DIRECTION_COL);

            //	Set the series in the plot area
            $plotarea = new PHPExcel_Chart_PlotArea(null, array($series));
            //	Set the chart legend
            $legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_RIGHT, null, false);

            $title = new PHPExcel_Chart_Title('VENTAS POR AGENTE DIARIA');
            $yAxisLabel = new PHPExcel_Chart_Title('Venta ($)');


            //	Create the chart
            $chart = new PHPExcel_Chart(
                'chart1',        // name
                $title,            // title
                $legend,        // legend
                $plotarea,        // plotArea
                true,            // plotVisibleOnly
                0,                // displayBlanksAs
                null,            // xAxisLabel
                $yAxisLabel        // yAxisLabel
            );

            //	Set the position where the chart should appear in the worksheet
            $chart->setTopLeftPosition('J1');
            $chart->setBottomRightPosition('S11');

            //	Add the chart to the worksheet
            $objWorksheet->addChart($chart);
            /*****GENERACION DE GRAFICO */
            $tipo = 'Excel2007';
        } else if ($search["vista"] == "ventasCanalDiario") {
            /*****GENERACION DE GFRAFICO */
            $dataseriesLabels = array(
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$C$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$D$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$E$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$F$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$G$4', null, 1),
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$H$4', null, 1),


            );

            $xAxisTickValues = array(
                new PHPExcel_Chart_DataSeriesValues('String', 'Canal!$B$5:$B$' . $puntero, null, 4),
            );


            $dataSeriesValues = array(

                new PHPExcel_Chart_DataSeriesValues('Number', 'Canal!$C$5:$C$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Canal!$D$5:$D$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Canal!$E$5:$E$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Canal!$F$5:$F$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Canal!$G$5:$G$' . $puntero, null, 4),
                new PHPExcel_Chart_DataSeriesValues('Number', 'Canal!$H$5:$H$' . $puntero, null, 4),
            );

            //	Build the dataseries
            $series = new PHPExcel_Chart_DataSeries(
                PHPExcel_Chart_DataSeries::TYPE_LINECHART,        // plotType
                PHPExcel_Chart_DataSeries::GROUPING_STACKED,    // plotGrouping
                range(0, count($dataSeriesValues) - 1),            // plotOrder
                $dataseriesLabels,                                // plotLabel
                $xAxisTickValues,                                // plotCategory
                $dataSeriesValues                                // plotValues
            );

            //	Set the series in the plot area
            $plotarea = new PHPExcel_Chart_PlotArea(null, array($series));
            //	Set the chart legend
            $legend = new PHPExcel_Chart_Legend(PHPExcel_Chart_Legend::POSITION_TOPRIGHT, null, false);

            $title = new PHPExcel_Chart_Title('Ventas Por Canal');
            $yAxisLabel = new PHPExcel_Chart_Title('Venta ($)');


            //	Create the chart
            $chart = new PHPExcel_Chart(
                'chart1',        // name
                $title,            // title
                $legend,        // legend
                $plotarea,        // plotArea
                true,            // plotVisibleOnly
                0,                // displayBlanksAs
                null,            // xAxisLabel
                $yAxisLabel        // yAxisLabel
            );
            //	Set the position where the chart should appear in the worksheet
            $chart->setTopLeftPosition('J1');
            $chart->setBottomRightPosition('S11');

            //	Add the chart to the worksheet
            $objWorksheet->addChart($chart);
            /*****GENERACION DE GRAFICO */
            $tipo = 'Excel2007';
        } else {
            $tipo = 'Excel5';
        }

        /* Redirect output to a client’s web browser (Excel5)*/
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nombreReporte . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, $tipo);
        $objWriter->setIncludeCharts(TRUE);
        //$objWriter->save(str_replace('.php', '.xlsx', __FILE__));
        $objWriter->save('php://output');
    }
    public function ctrDescargarReporteVentasMensual($tables, $campos, $search)
    {

        $database = new detalleVentas();
        $arreglo = array();
        $arregloCampos = array();
        $arregloHeaders = array();
        $arregloHojas = array();


        /**DECLARAMOS LOS ESTILOS DE LA FUENTE**/
        $styleTitle = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 14,
                'name'  => 'Calibri'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        $styleSubtitle = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
                'name'  => 'Calibri Light'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        $styleFields = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 10,
                'name'  => 'Calibri'
            )
        );

        switch ($search["vista"]) {
            case 'ventasClienteMensual':
                $datos = $database->getVentasCliente($tables, $campos, $search);
                $vista = "C L I E N T E ";
                $nombreReporte = "Reporte Ventas Clientes";
                array_push($arregloHojas, "Clientes");
                array_push($arregloHeaders, "CLIENTE");
                array_push($arregloCampos, "NombreCliente");

                break;
            case 'ventasCanalMensual':
                $datos = $database->getVentasCanal($tables, $campos, $search);
                $vista = "C A N A L";
                $nombreReporte = "Reporte Ventas  Canal";
                array_push($arregloHojas, "Canal");
                array_push($arregloHeaders, "CANAL", "CENTRO TRABAJO");
                array_push($arregloCampos, "canalComercial", "centroTrabajo");
                break;
            case 'ventasAgenteMensual':
                $datos = $database->getVentasAgente($tables, $campos, $search);
                $vista = "A G E N T E ";
                $nombreReporte = "Reporte Ventas Agente";
                array_push($arregloHojas, "Agentes");
                array_push($arregloHeaders, "AGENTE");
                array_push($arregloCampos, "Agente");
                break;
            case 'ventasProductoMensual':
                $datos = $database->getVentasProductoMonto($tables, $campos, $search);
                $datos2 = $database->getVentasProductoUnidades($tables, $campos, $search);
                $vista = "P R O D U C T O";
                $nombreReporte = "Reporte Ventas Producto";
                array_push($arregloHojas, "Montos", "Unidades");
                array_push($arregloHeaders, "CODIGO", "NOMBRE");
                array_push($arregloCampos, "CCODIGOPRODUCTO", "CNOMBREPRODUCTO");
                break;
            case 'ventasLitreadoMensual':
                $datos = $database->getVentasLitreadoMonto($tables, $campos, $search);
                $datos2 = $database->getVentasLitreadoUnidades($tables, $campos, $search);
                $vista = "L I T R E A D O";
                $nombreReporte = "Reporte Ventas Litreado";
                array_push($arregloHojas, "Montos", "Unidades");
                array_push($arregloHeaders, "CODIGO", "NOMBRE");
                array_push($arregloCampos, "CCODIGOPRODUCTO", "CNOMBREPRODUCTO");
                break;
            case 'ventasMarcaMensual':
                $datos = $database->getVentasMarca($tables, $campos, $search);
                $vista = "M A R C A";
                $nombreReporte = "Reporte Ventas Marca";
                array_push($arregloHojas, "Marcas");
                array_push($arregloHeaders, "MARCA");
                array_push($arregloCampos, "Marca");
                break;
        }

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        /**CABECERAS PRINCIPALES DOCUMENTO**/

        $abecedario = array();
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */
        array_push($arregloHeaders, "Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
        array_push($arregloHeaders, "TOTAL GENERAL");
        array_push($arregloCampos, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12);
        array_push($arregloCampos, "Totales");
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */
        $column = 'A';
        for ($i = 0; $i < count($arregloHeaders); $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($column . '4', $arregloHeaders[$i]);
            array_push($abecedario, $column);
            $column++;
        }
        $total = count($arregloHeaders) - 1;
        $letra = $abecedario[$total];
        $objPHPExcel->getActiveSheet()->setAutoFilter("A4:" . $letra . "4");

        $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->applyFromArray($styleFields);
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */

        /**CABECERAS PRINCIPALES DOCUMENTO**/
        $objPHPExcel->getActiveSheet()->mergeCells("A1:" . $letra . "1");
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SAN FRANCISCO DEKKERLAB');
        $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "1")->applyFromArray($styleTitle);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

        $objPHPExcel->getActiveSheet()->mergeCells("A2:" . $letra . "2");
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REPORTE DE VENTAS MENSUAL POR');
        $objPHPExcel->getActiveSheet()->getStyle("A2:" . $letra . "2")->applyFromArray($styleSubtitle);
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

        $objPHPExcel->getActiveSheet()->mergeCells("A3:" . $letra . "3");
        $objPHPExcel->getActiveSheet()->setCellValue('A3', '' . $vista . '');
        $objPHPExcel->getActiveSheet()->getStyle("A3:" . $letra . "3")->applyFromArray($styleSubtitle);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

        $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "3")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '17202A')
        ));
        $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
        ));

        /***CREACION DE CONTENIDO DINAMICO***/
        $i = 5;
        $totalCampos = count($arregloCampos) - 1;
        foreach ($datos as $key => $value) {
            if ($search["vista"] == "ventasProductoMensual" || $search["vista"] == "ventasLitreadoMensual" || $search["vista"] == "ventasCanalMensual") {
                $objPHPExcel->getActiveSheet()->getStyle("A$i:B$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", $value[(int)$arregloCampos[11]]);
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", $value[(int)$arregloCampos[12]]);
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", $value[(int)$arregloCampos[13]]);
                $objPHPExcel->getActiveSheet()->setCellValue("O$i", $value[(int)$arregloCampos[14]]);
                $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
            } else {
                $objPHPExcel->getActiveSheet()->getStyle("A$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[(int)$arregloCampos[1]]);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", $value[(int)$arregloCampos[11]]);
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", $value[(int)$arregloCampos[12]]);
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", $value[(int)$arregloCampos[13]]);
                $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
            }


            $i++;
        }

        $puntero = $i - 1;
        /***HACER FOOTER SUMA DE TOTALES */
        if ($search["vista"] == "ventasProductoMensual" || $search["vista"] == "ventasLitreadoMensual" || $search["vista"] == "ventasCanalMensual") {
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->mergeCells("A$i:B$i");
            $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
            $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("L$i", "=SUM(L5:L$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("M$i", "=SUM(M5:M$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("N$i", "=SUM(N5:N$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("O$i", "=SUM(O5:O$puntero)");
        } else {

            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->mergeCells("A$i:A$i");
            $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
            $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->setCellValue("B$i", "=SUM(B5:B$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("L$i", "=SUM(L5:L$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("M$i", "=SUM(M5:M$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("N$i", "=SUM(N5:N$puntero)");
        }


        /***CREACION DE CONTENIDO DINAMICO***/
        for ($i = 'A'; $i <= $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        }
        $objPHPExcel->getActiveSheet()->setTitle('' . $arregloHojas[0] . '');

        /*Actualizar hoja*/
        if (count($arregloHojas) > 1) {
            /* Create a new worksheet, after the default sheet*/
            $objPHPExcel->createSheet();

            /* Add some data to the second sheet, resembling some different data types*/
            $objPHPExcel->setActiveSheetIndex(1);


            $column = 'A';
            for ($i = 0; $i < count($arregloHeaders); $i++) {
                $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue($column . '4', $arregloHeaders[$i]);
                array_push($abecedario, $column);
                $column++;
            }
            $total = count($arregloHeaders) - 1;
            $letra = $abecedario[$total];
            $objPHPExcel->getActiveSheet()->setAutoFilter("A4:" . $letra . "4");

            $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->applyFromArray($styleFields);
            /**CABECERAS PRINCIPALES DOCUMENTO**/
            $objPHPExcel->getActiveSheet()->mergeCells("A1:" . $letra . "1");
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SAN FRANCISCO DEKKERLAB');
            $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "1")->applyFromArray($styleTitle);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

            $objPHPExcel->getActiveSheet()->mergeCells("A2:" . $letra . "2");
            $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REPORTE DE VENTAS DIARIO POR');
            $objPHPExcel->getActiveSheet()->getStyle("A2:" . $letra . "2")->applyFromArray($styleSubtitle);
            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

            $objPHPExcel->getActiveSheet()->mergeCells("A3:" . $letra . "3");
            $objPHPExcel->getActiveSheet()->setCellValue('A3', '' . $vista . '');
            $objPHPExcel->getActiveSheet()->getStyle("A3:" . $letra . "3")->applyFromArray($styleSubtitle);
            $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

            $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "3")->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '17202A')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));

            $i = 5;
            $totalCampos = count($arregloCampos) - 1;
            foreach ($datos2 as $key => $value) {
                if ($search["vista"] == "ventasProductoMensual" || $search["vista"] == "ventasLitreadoMensual" || $search["vista"] == "ventasCanalMensual") {
                    $objPHPExcel->getActiveSheet()->getStyle("A$i:B$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("L$i", $value[(int)$arregloCampos[11]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("M$i", $value[(int)$arregloCampos[12]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("N$i", $value[(int)$arregloCampos[13]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("O$i", $value[(int)$arregloCampos[14]]);
                    $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
                } else {
                    $objPHPExcel->getActiveSheet()->getStyle("A$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[(int)$arregloCampos[1]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("L$i", $value[(int)$arregloCampos[11]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("M$i", $value[(int)$arregloCampos[12]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("N$i", $value[(int)$arregloCampos[13]]);
                    $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
                }


                $i++;
            }
            $puntero = $i - 1;
            /***HACER FOOTER SUMA DE TOTALES */
            if ($search["vista"] == "ventasProductoMensual" || $search["vista"] == "ventasLitreadoMensual" || $search["vista"] == "ventasCanalMensual") {
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
                ));
                $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->mergeCells("A$i:B$i");
                $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
                $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", "=SUM(L5:L$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", "=SUM(M5:M$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", "=SUM(N5:N$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("O$i", "=SUM(O5:O$puntero)");
            } else {

                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
                ));
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->mergeCells("A$i:A$i");
                $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
                $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i", "=SUM(B5:B$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", "=SUM(L5:L$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("M$i", "=SUM(M5:M$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("N$i", "=SUM(N5:N$puntero)");
            }



            for ($i = 'A'; $i <= $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
            }
            /* Rename 2nd sheet*/
            $objPHPExcel->getActiveSheet()->setTitle('' . $arregloHojas[1] . '');
        } else {
        }


        /* Redirect output to a client’s web browser (Excel5)*/
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nombreReporte . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
    public function ctrDescargarReporteVentasAnual($tables, $campos, $search)
    {

        $database = new detalleVentasAnual();
        $arreglo = array();
        $arregloCampos = array();
        $arregloHeaders = array();
        $arregloHojas = array();


        /**DECLARAMOS LOS ESTILOS DE LA FUENTE**/
        $styleTitle = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 14,
                'name'  => 'Calibri'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        $styleSubtitle = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 11,
                'name'  => 'Calibri Light'
            ),
            'alignment' => array(
                'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER,
                'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER,
            )
        );
        $styleFields = array(
            'font'  => array(
                'bold'  => true,
                'color' => array('rgb' => 'FFFFFF'),
                'size'  => 10,
                'name'  => 'Calibri'
            )
        );

        switch ($search["vista"]) {
            case 'ventasClienteAnual':
                $datos = $database->getVentasCliente($tables, $campos, $search);
                $vista = "C L I E N T E ";
                $nombreReporte = "Reporte Ventas Clientes";
                array_push($arregloHojas, "Clientes");
                array_push($arregloHeaders, "CLIENTE");
                array_push($arregloCampos, "NombreCliente");

                break;
            case 'ventasCanalAnual':
                $datos = $database->getVentasCanal($tables, $campos, $search);
                $vista = "C A N A L";
                $nombreReporte = "Reporte Ventas  Canal";
                array_push($arregloHojas, "Canal");
                array_push($arregloHeaders, "CANAL", "CENTRO TRABAJO");
                array_push($arregloCampos, "canalComercial", "centroTrabajo");
                break;
            case 'ventasAgenteAnual':
                $datos = $database->getVentasAgente($tables, $campos, $search);
                $vista = "A G E N T E ";
                $nombreReporte = "Reporte Ventas Agente";
                array_push($arregloHojas, "Agentes");
                array_push($arregloHeaders, "AGENTE");
                array_push($arregloCampos, "Agente");
                break;
            case 'ventasProductoAnual':
                $datos = $database->getVentasProductoMonto($tables, $campos, $search);
                $datos2 = $database->getVentasProductoUnidades($tables, $campos, $search);
                $vista = "P R O D U C T O";
                $nombreReporte = "Reporte Ventas Producto";
                array_push($arregloHojas, "Montos", "Unidades");
                array_push($arregloHeaders, "CODIGO", "NOMBRE");
                array_push($arregloCampos, "CCODIGOPRODUCTO", "CNOMBREPRODUCTO");
                break;
            case 'ventasLitreadoAnual':
                $datos = $database->getVentasLitreadoMonto($tables, $campos, $search);
                $datos2 = $database->getVentasLitreadoUnidades($tables, $campos, $search);
                $vista = "L I T R E A D O";
                $nombreReporte = "Reporte Ventas Litreado";
                array_push($arregloHojas, "Montos", "Unidades");
                array_push($arregloHeaders, "CODIGO", "NOMBRE");
                array_push($arregloCampos, "CCODIGOPRODUCTO", "CNOMBREPRODUCTO");
                break;
            case 'ventasMarcaAnual':
                $datos = $database->getVentasMarca($tables, $campos, $search);
                $vista = "M A R C A";
                $nombreReporte = "Reporte Ventas Marca";
                array_push($arregloHojas, "Marcas");
                array_push($arregloHeaders, "MARCA");
                array_push($arregloCampos, "Marca");
                break;
        }

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0);
        /**CABECERAS PRINCIPALES DOCUMENTO**/

        $abecedario = array();
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */
        array_push($arregloHeaders, "2013", "2014", "2015", "2016", "2017", "2018", "2019", "2020", "2021");
        array_push($arregloHeaders, "TOTAL GENERAL");
        array_push($arregloCampos, 2013, 2014, 2015, 2016, 2017, 2018, 2019, 2020, 2021);
        array_push($arregloCampos, "Totales");
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */
        $column = 'A';
        for ($i = 0; $i < count($arregloHeaders); $i++) {
            $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue($column . '4', $arregloHeaders[$i]);
            array_push($abecedario, $column);
            $column++;
        }
        $total = count($arregloHeaders) - 1;
        $letra = $abecedario[$total];
        $objPHPExcel->getActiveSheet()->setAutoFilter("A4:" . $letra . "4");

        $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->applyFromArray($styleFields);
        /*
        GENERACION DE LA CABECERA DE CAMPOS FILTROS
        */

        /**CABECERAS PRINCIPALES DOCUMENTO**/
        $objPHPExcel->getActiveSheet()->mergeCells("A1:" . $letra . "1");
        $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SAN FRANCISCO DEKKERLAB');
        $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "1")->applyFromArray($styleTitle);
        $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
        $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

        $objPHPExcel->getActiveSheet()->mergeCells("A2:" . $letra . "2");
        $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REPORTE DE VENTAS ANUAL POR');
        $objPHPExcel->getActiveSheet()->getStyle("A2:" . $letra . "2")->applyFromArray($styleSubtitle);
        $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

        $objPHPExcel->getActiveSheet()->mergeCells("A3:" . $letra . "3");
        $objPHPExcel->getActiveSheet()->setCellValue('A3', '' . $vista . '');
        $objPHPExcel->getActiveSheet()->getStyle("A3:" . $letra . "3")->applyFromArray($styleSubtitle);
        $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

        $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "3")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '17202A')
        ));
        $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->getFill()->applyFromArray(array(
            'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
        ));

        /***CREACION DE CONTENIDO DINAMICO***/
        $i = 5;
        $totalCampos = count($arregloCampos) - 1;
        foreach ($datos as $key => $value) {
            if ($search["vista"] == "ventasProductoAnual" || $search["vista"] == "ventasLitreadoAnual" || $search["vista"] == "ventasCanalAnual") {
                $objPHPExcel->getActiveSheet()->getStyle("A$i:B$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", $value[(int)$arregloCampos[11]]);
                $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
            } else {
                $objPHPExcel->getActiveSheet()->getStyle("A$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[(int)$arregloCampos[1]]);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
            }


            $i++;
        }
        $puntero = $i - 1;
        /***HACER FOOTER SUMA DE TOTALES */
        if ($search["vista"] == "ventasProductoAnual" || $search["vista"] == "ventasLitreadoAnual" || $search["vista"] == "ventasCanalAnual") {
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->mergeCells("A$i:B$i");
            $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
            $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("L$i", "=SUM(L5:L$puntero)");
        } else {

            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
            $objPHPExcel->getActiveSheet()->mergeCells("A$i:A$i");
            $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
            $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
            $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
            $objPHPExcel->getActiveSheet()->setCellValue("B$i", "=SUM(B5:B$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
            $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
        }


        /***CREACION DE CONTENIDO DINAMICO***/
        for ($i = 'A'; $i <= $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) {
            $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
        }
        $objPHPExcel->getActiveSheet()->setTitle('' . $arregloHojas[0] . '');

        /*Actualizar hoja*/
        if (count($arregloHojas) > 1) {
            /* Create a new worksheet, after the default sheet*/
            $objPHPExcel->createSheet();

            /* Add some data to the second sheet, resembling some different data types*/
            $objPHPExcel->setActiveSheetIndex(1);


            $column = 'A';
            for ($i = 0; $i < count($arregloHeaders); $i++) {
                $objPHPExcel->setActiveSheetIndex(1)
                    ->setCellValue($column . '4', $arregloHeaders[$i]);
                array_push($abecedario, $column);
                $column++;
            }
            $total = count($arregloHeaders) - 1;
            $letra = $abecedario[$total];
            $objPHPExcel->getActiveSheet()->setAutoFilter("A4:" . $letra . "4");

            $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->applyFromArray($styleFields);
            /**CABECERAS PRINCIPALES DOCUMENTO**/
            $objPHPExcel->getActiveSheet()->mergeCells("A1:" . $letra . "1");
            $objPHPExcel->getActiveSheet()->setCellValue('A1', 'SAN FRANCISCO DEKKERLAB');
            $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "1")->applyFromArray($styleTitle);
            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setWidth(10);
            $objPHPExcel->getActiveSheet()->getRowDimension('1')->setRowHeight(40);

            $objPHPExcel->getActiveSheet()->mergeCells("A2:" . $letra . "2");
            $objPHPExcel->getActiveSheet()->setCellValue('A2', 'REPORTE DE VENTAS DIARIO POR');
            $objPHPExcel->getActiveSheet()->getStyle("A2:" . $letra . "2")->applyFromArray($styleSubtitle);
            $objPHPExcel->getActiveSheet()->getRowDimension('2')->setRowHeight(30);

            $objPHPExcel->getActiveSheet()->mergeCells("A3:" . $letra . "3");
            $objPHPExcel->getActiveSheet()->setCellValue('A3', '' . $vista . '');
            $objPHPExcel->getActiveSheet()->getStyle("A3:" . $letra . "3")->applyFromArray($styleSubtitle);
            $objPHPExcel->getActiveSheet()->getRowDimension('3')->setRowHeight(20);

            $objPHPExcel->getActiveSheet()->getStyle("A1:" . $letra . "3")->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '17202A')
            ));
            $objPHPExcel->getActiveSheet()->getStyle("A4:" . $letra . "4")->getFill()->applyFromArray(array(
                'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
            ));

            $i = 5;
            $totalCampos = count($arregloCampos) - 1;
            foreach ($datos2 as $key => $value) {
                if ($search["vista"] == "ventasProductoAnual" || $search["vista"] == "ventasLitreadoAnual" || $search["vista"] == "ventasCanalAnual") {
                    $objPHPExcel->getActiveSheet()->getStyle("A$i:B$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[$arregloCampos[1]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("L$i", $value[(int)$arregloCampos[11]]);
                    $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
                } else {
                    $objPHPExcel->getActiveSheet()->getStyle("A$i")->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_TEXT);
                    $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                    $objPHPExcel->getActiveSheet()->setCellValue("A$i",  $value[$arregloCampos[0]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("B$i",  $value[(int)$arregloCampos[1]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("C$i", $value[(int)$arregloCampos[2]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("D$i", $value[(int)$arregloCampos[3]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("E$i", $value[(int)$arregloCampos[4]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("F$i", $value[(int)$arregloCampos[5]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("G$i", $value[(int)$arregloCampos[6]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("H$i", $value[(int)$arregloCampos[7]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("I$i", $value[(int)$arregloCampos[8]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("J$i", $value[(int)$arregloCampos[9]]);
                    $objPHPExcel->getActiveSheet()->setCellValue("K$i", $value[(int)$arregloCampos[10]]);
                    $objPHPExcel->getActiveSheet()->setCellValue($letra . $i,  $value[$arregloCampos[$totalCampos]]);
                }


                $i++;
            }
            $puntero = $i - 1;
            /***HACER FOOTER SUMA DE TOTALES */
            if ($search["vista"] == "ventasProductoAnual" || $search["vista"] == "ventasLitreadoAnual" || $search["vista"] == "ventasCanalAnual") {
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
                ));
                $objPHPExcel->getActiveSheet()->getStyle("C$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->mergeCells("A$i:B$i");
                $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
                $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("L$i", "=SUM(L5:L$puntero)");
            } else {

                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->getFill()->applyFromArray(array(
                    'type' => PHPExcel_Style_Fill::FILL_SOLID, 'startcolor' => array('rgb' => '1C1C1C')
                ));
                $objPHPExcel->getActiveSheet()->getStyle("B$i:" . $letra . $i)->getNumberFormat()->setFormatCode(PHPExcel_Style_NumberFormat::FORMAT_NUMBER_COMMA_SEPARATED1);
                $objPHPExcel->getActiveSheet()->mergeCells("A$i:A$i");
                $objPHPExcel->getActiveSheet()->setCellValue("A$i", 'Total');
                $objPHPExcel->getActiveSheet()->getStyle("A$i:" . $letra . $i)->applyFromArray($styleFields);
                $objPHPExcel->getActiveSheet()->getRowDimension('' . $i . '')->setRowHeight(20);
                $objPHPExcel->getActiveSheet()->setCellValue("B$i", "=SUM(B5:B$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("C$i", "=SUM(C5:C$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("D$i", "=SUM(D5:D$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("E$i", "=SUM(E5:E$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("F$i", "=SUM(F5:F$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("G$i", "=SUM(G5:G$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("H$i", "=SUM(H5:H$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("I$i", "=SUM(I5:I$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("J$i", "=SUM(J5:J$puntero)");
                $objPHPExcel->getActiveSheet()->setCellValue("K$i", "=SUM(K5:K$puntero)");
            }



            for ($i = 'A'; $i <= $objPHPExcel->getActiveSheet()->getHighestColumn(); $i++) {
                $objPHPExcel->getActiveSheet()->getColumnDimension($i)->setAutoSize(TRUE);
            }
            /* Rename 2nd sheet*/
            $objPHPExcel->getActiveSheet()->setTitle('' . $arregloHojas[1] . '');
        } else {
        }


        /* Redirect output to a client’s web browser (Excel5)*/
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="' . $nombreReporte . '.xls"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        $objWriter->save('php://output');
    }
    public function ctrDescargarReporteVentasDetalle($tables, $campos, $search)
    {
        $database = new detalleVentas();
        $arregloCampos = array();
        $arregloHeaders = array();


        switch ($search["vista"]) {
            case 'ventasDetalleDocumentos':
                $datos = $database->getDocumentosDetalle($tables, $campos, $search);
                $vista = "Detalle Documentos";
                array_push($arregloHeaders, "CLIENTE", "CONCEPTO", "FECHA", "SERIE", "FOLIO", "VENTA", "IVA", "TOTAL", "ABONO", "PENDIENTE");
                array_push($arregloCampos, "CRAZONSOCIAL", "CNOMBRECONCEPTO", "CFECHA", "CSERIEDOCUMENTO", "CFOLIO", "Desglose", "IVA", "Total", "1");

                break;
        }
        switch ($search["mes"]) {
            case '01':
                $mes = "E N E R O";
                break;
            case '02':
                $mes = "F E B R E R O";
                break;
            case '03':
                $mes = "M A R Z O";
                break;
            case '04':
                $mes = "A B R I L";
                break;
            case '05':
                $mes = "M A Y O";
                break;
            case '06':
                $mes = "J U N I O";
                break;
            case '07':
                $mes = "J U L I O";
                break;
            case '08':
                $mes = "A G O S T O";
                break;
            case '09':
                $mes = "S E P T I E M B R E";
                break;
            case '10':
                $mes = "O C T U B R E";
                break;
            case '11':
                $mes = "N O V I E M B R E";
                break;
            case '12':
                $mes = "D  I C I E M B R E";
                break;
        }
        /*=============================================
			CREAMOS EL ARCHIVO DE EXCEL
			=============================================*/

        $nombre = "Reporte " . $vista . "" . '.xls';

        header('Expires: 0');
        header('Cache-control: private');
        header('Content-type: application/vnd.ms-excel'); // Archivo de Excel
        header("Cache-Control: cache, must-revalidate");
        header('Content-Description: File Transfer');
        header('Last-Modified: ' . date('D, d M Y H:i:s'));
        header("Pragma: public");
        header('Content-Disposition:; filename="' . $nombre . '"');
        header("Content-Transfer-Encoding: binary");




        echo utf8_decode("<table>");
        echo "<tr>
					<th colspan='" . count($arregloHeaders) . "' style='font-weight:bold; background:#17202A; color:white;'>SAN FRANCISCO DEKKERLAB</th>
					</tr>

					<tr>
					<th colspan='" . count($arregloHeaders) . "' style='font-weight:bold; background:#17202A; color:white;'>R E P O R T E &nbsp; D E T A L L E &nbsp  D O C U M E N T O S&nbsp;</th>
					</tr>

					<tr>
					<th colspan='" . count($arregloHeaders) . "' style='font-weight:bold; background:#17202A; color:white;'>$mes</th>
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
        $iva = 0;
        $total = 0;
        $desglose = 0;
        $totales = 0;
        $pendiente = 0;
        $totalPendiente = 0;
        $totalAbonado = 0;
        foreach ($datos as $key => $value) {

            $iva += $value[$arregloCampos[6]];
            $total += $value[$arregloCampos[7]];
            $desglose += $value[$arregloCampos[5]];
            $totalPendiente += $value[$arregloCampos[7]] - $value[$arregloCampos[8]];
            $pendiente = $value[$arregloCampos[7]] - $value[$arregloCampos[8]];
            $totalAbonado += $value[$arregloCampos[8]];
            if ($pendiente > -1 and $pendiente < 1) {
                $color = "#1E6F21";
            } else {
                $color = "#F06770";
            }

            echo utf8_decode("<tr>      
                                        
                                        <td style='background:" . $color . ";color:white;text-align:left'>" . $value[$arregloCampos[0]] . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:left'>" . $value[$arregloCampos[1]] . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:left'>" . substr($value[$arregloCampos[2]], 0, 10) . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:left'>" . $value[$arregloCampos[3]] . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:left'>" . (int)$value[$arregloCampos[4]] . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:right'>$" . number_format($value[$arregloCampos[5]], 2) . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:right'>$" . number_format($value[$arregloCampos[6]], 2) . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:right'>$" . number_format($value[$arregloCampos[7]], 2) . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:right'>$" . number_format($value[$arregloCampos[8]], 2) . "</td>
                                        <td style='background:" . $color . ";color:white;text-align:right'>$" . number_format($pendiente, 2) . "</td>
										</tr>");
        }
        echo utf8_decode("<tr>
                                        <td style='font-weight:bold;text-align:left'>Total General</td>
                                        <td style='font-weight:bold;text-align:left'></td>
                                        <td style='font-weight:bold;text-align:left'></td>
                                        <td style='font-weight:bold;text-align:left'></td>
                                        <td style='font-weight:bold;text-align:left'></td>
                                        <td style='font-weight:bold;text-align:right'>$" . number_format($desglose, 2) . "</td>
                                        <td style='font-weight:bold;text-align:right'>$" . number_format($iva, 2) . "</td>
                                        <td style='font-weight:bold;text-align:right'>$" . number_format($total, 2) . "</td>
                                        <td style='font-weight:bold;text-align:right'>$" . number_format($totalAbonado, 2) . "</td>
                                        <td style='font-weight:bold;text-align:right'>$" . number_format($totalPendiente, 2) . "</td>
										</tr>");


        echo "</table>";
    }
}
