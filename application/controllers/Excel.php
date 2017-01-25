<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Excel extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
				
	}


	public function excel(){

		$this->phpexcel->getProperties()
					   ->setTitle('registros')
					   ->setDescription('Registro de llegada tienda');


		$datos = $this->dashboard_model->getRegistros();


		$sheet = $this->phpexcel->getActiveSheet();
		$sheet->setTitle('Registro de Entregas');
		
		// generar filas 
		$sheet->setCellValue("A1", 'Fecha');
		$sheet->setCellValue("B1", 'Ruta');
		$sheet->setCellValue("C1", 'Dia');
		$sheet->setCellValue("D1", 'Tienda');
		$sheet->setCellValue("E1", 'Hora Estimada');
		$sheet->setCellValue("F1", 'Conductor');
		$sheet->setCellValue("G1", 'Rut');
		$sheet->setCellValue("H1", 'Hora Llegada');
		$sheet->setCellValue("I1", 'Hora Salida');
		$sheet->setCellValue("J1", 'Tiempo en Tienda');
		$sheet->setCellValue("K1", 'Status');
		$sheet->setCellValue("L1", 'Codigo');
		$sheet->setCellValue("M1", 'Cumplimiento');



		// generar registros
		$i=2;
		foreach ($datos as $dato) {

			$sheet->setCellValue("A".$i, $dato->Fecha);
			$sheet->setCellValue("B".$i, $dato->RutaTienda);
			$sheet->setCellValue("C".$i, $dato->Dia);
			$sheet->setCellValue("D".$i, $dato->Tienda);
			$sheet->setCellValue("E".$i, $dato->HoraEstimadaLLegada);
			$sheet->setCellValue("F".$i, $dato->Conductor);
			$sheet->setCellValue("G".$i, $dato->RutConductor);
			$sheet->setCellValue("H".$i, $dato->HoraLLegadaTienda);
			$sheet->setCellValue("I".$i, $dato->HoraSalidaTienda);
			$sheet->setCellValue("J".$i, $dato->HoraTranscurrida);
			$sheet->setCellValue("K".$i, $dato->Acepta);
			$sheet->setCellValue("L".$i, $dato->Match);
			$sheet->setCellValue("M".$i, $dato->TiempoCumplido);

			$i++;
		}


		// generar la renderizacion del doc
		header("Content-Type: application/vnd.ms-excel");
		$nombre="Reporte ".date("Y-m-d H:i:s");
		header("Content-Disposition: attachment; filename=\"$nombre.xls\"");
		header("Cache-Control: max-age=0");
		$writer=PHPExcel_IOFactory::createWriter($this->phpexcel,"Excel5");
		$writer->save("php://output");

	}

}

/* End of file Excel.php */
/* Location: ./application/controllers/Excel.php */