<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validacion extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('conductorApp');
		$this->load->library('codigounico');
	
	}

	public function index()
	{
	 	//Codigo de la session
	 	$Codigo = $this->session->userdata('SCodigo');

	 	$Datos = $this->validacion_model->DatosValida($Codigo);

	 	$HoraLlegada = $Datos->HoraLlegada;
	 	$HoraSalida = $Datos->HoraSalida;

	 	
	 	$Tienda = $Datos->NomTienda;

	 	$Dia = date("N");


	 	if ($Dia <= 5) {

	 		$HoraLLegadaTienda = $Datos->HoraSemana;	

	 	} elseif ($Dia==6) {
	 		
	 		$HoraLLegadaTienda = $Datos->HoraSabado;

	 	} elseif ($Dia==7) {

	 		$HoraLLegadaTienda = $Datos->HoraDomingo;	
	 	}



	 	//Visualizar Entrega
	 	$mercaderia = $Datos->EntregaMercaderia;
	 	$insumos = $Datos->EntregaInsumo;

	 	if(($mercaderia == 1) && ($insumos == 0)){

	 		$Entrega = '<li>Mercaderia</li>';

	 	}else if(($mercaderia == 0) && ($insumos == 1)){

	 		$Entrega = '<li>Insumos</li>';

	 	}else if(($mercaderia == 1) && ($insumos == 1)){
			
			$Entrega =  '<li>Mercaderia</li>';
			$Entrega .= '<li>Insumos</li>';
	 	}else if(($mercaderia == 0) && ($insumos == 0)){
			
			$Entrega =  'El Conductor, No entrega nada';
		}
	 	//Visualizar Retiro

	 	$bandeja = $Datos->RetiroBandeja;
	 	$devolucion = $Datos->DevolucionMer;

	 	if(($bandeja == 1) && ($devolucion == 0)){

	 		$Retiro = '<li>Bandejas</li>';

	 	}else if(($bandeja == 0) && ($devolucion == 1)){

	 		$Retiro = '<li>Devolución</li>';

	 	}else if(($bandeja == 1) && ($devolucion == 1)){
			
			$Retiro =  '<li>Bandejas</li>';
			$Retiro .= '<li>Devolución de Productos</li>';

	 	}else if(($bandeja == 0) && ($devolucion == 0)){
			
			$Retiro =  'El Conductor, No retira nada';
		}


		//Calcular el tiempo

		

		$TiempoEnTienda = $this->codigounico->restaHoras($HoraLlegada,$HoraSalida);
		$LLegada = $this->codigounico->restaHoras($HoraLLegadaTienda,$HoraLlegada);

			if (($Datos->HoraSabado == 0) && ($Dia == 6))  {

	 		$LLegada = 0;
	  	
	 	   } elseif (($Datos->HoraDomingo == 0) && ($Dia == 7)) {
	 		
	 		$LLegada = 0;
	       }


	 	$this->layout->view("index",compact('HoraLlegada','HoraSalida','Entrega','Retiro','TiempoEnTienda','LLegada'));

	}


	public function Acepta(){

		$Codigo = $this->session->userdata('SCodigo');
		$Nombre = $this->session->userdata('Nombre');
		$Apellido = $this->session->userdata('Apellido');
		$Rut = $this->session->userdata('rut');

		$Usuario = $Nombre." ".$Apellido;

		$Datos = $this->validacion_model->DatosValida($Codigo);

		$HoraLlegada = $Datos->HoraLlegada;
	 	$HoraSalida = $Datos->HoraSalida;

	 	$Tienda = $Datos->NomTienda;

	 	$Dia = date("N");

	

	 	if ($Dia <= 5) {

	 		$HoraLLegadaTienda = $Datos->HoraSemana;
	 		$RutaTienda = $Datos->RutaSemana;	

	 	} elseif ($Dia==6) {
	 		
	 		$HoraLLegadaTienda = $Datos->HoraSabado;
	 		$RutaTienda = $Datos->RutaSabado;	

	 	} elseif ($Dia==7) {

	 		$HoraLLegadaTienda = $Datos->HoraDomingo;
	 		$RutaTienda = $Datos->RutaDomingo;	
	 	}


	 		switch($Dia) {
			
			case 1:
			$Dia = 'Lunes';
			break;
			case 2:
			$Dia = 'Martes';
			break;
			case 3:
			$Dia = 'Miercoles';
			break;
			case 4:
			$Dia = 'Jueves';
			break;
			case 5:
			$Dia = 'Viernes';
			break;
			case 6:
			$Dia = 'Sabado';
			break;
			case 7:
			$Dia = 'Domingo';
			break;
		}

		$TiempoEnTienda = $this->codigounico->restaHoras($HoraLlegada,$HoraSalida);
		$LLegada = $this->codigounico->restaHoras($HoraLLegadaTienda,$HoraLlegada);

			if (($Datos->HoraSabado == 0) && ($Dia == 6))  {

	 		$LLegada = 0;
	  	
	 	   } elseif (($Datos->HoraDomingo == 0) && ($Dia == 7)) {
	 		
	 		$LLegada = 0;
	       }
		

		$data= array(

			'HoraTranscurrida' => $TiempoEnTienda,
			'Match' => $Codigo,
			'Acepta' => 'SI' ,
			'TiempoCumplido' => $LLegada,
			'HoraEstimadaLLegada' => $HoraLLegadaTienda,
			'HoraLLegadaTienda' => $HoraLlegada,
			'HoraSalidaTienda' => $HoraSalida,
			'Conductor' => $Usuario,
			'RutConductor' => $Rut,
			'RutaTienda' => $RutaTienda,
			'Dia' => $Dia,
			'Fecha' => date('Y-m-d'),
			'Tienda' => $Tienda,


			);

		$insertar = $this->validacion_model->Acepta($data);

		$this->session->sess_destroy("conductores");
		redirect(base_url()."acceso/salir");
	}

	public function NoAcepta(){

		$Codigo = $this->session->userdata('SCodigo');
		$Nombre = $this->session->userdata('Nombre');
		$Apellido = $this->session->userdata('Apellido');
		$Rut = $this->session->userdata('rut');

		$Usuario = $Nombre." ".$Apellido;

		$Datos = $this->validacion_model->DatosValida($Codigo);

		$HoraLlegada = $Datos->HoraLlegada;
	 	$HoraSalida = $Datos->HoraSalida;

	 	$Tienda = $Datos->NomTienda;

	 	$Dia = date("N");

	

	 	if ($Dia <= 5) {

	 		$HoraLLegadaTienda = $Datos->HoraSemana;
	 		$RutaTienda = $Datos->RutaSemana;		

	 	} elseif ($Dia==6) {
	 		
	 		$HoraLLegadaTienda = $Datos->HoraSabado;
	 		$RutaTienda = $Datos->RutaSabado;	

	 	} elseif ($Dia==7) {

	 		$HoraLLegadaTienda = $Datos->HoraDomingo;
	 		$RutaTienda = $Datos->RutaDomingo;	
	 	}

	 		switch($Dia) {
			
			case 1:
			$Dia = 'Lunes';
			break;
			case 2:
			$Dia = 'Martes';
			break;
			case 3:
			$Dia = 'Miercoles';
			break;
			case 4:
			$Dia = 'Jueves';
			break;
			case 5:
			$Dia = 'Viernes';
			break;
			case 6:
			$Dia = 'Sabado';
			break;
			case 7:
			$Dia = 'Domingo';
			break;
		}
		$TiempoEnTienda = $this->codigounico->restaHoras($HoraLlegada,$HoraSalida);
		$LLegada = $this->codigounico->restaHoras($HoraLLegadaTienda,$HoraLlegada);

			if (($Datos->HoraSabado == 0) && ($Dia == 6))  {

	 		$LLegada = 0;
	  	
	 	   } elseif (($Datos->HoraDomingo == 0) && ($Dia == 7)) {
	 		
	 		$LLegada = 0;
	       }
		

		$data= array(

			'HoraTranscurrida' => $TiempoEnTienda,
			'Match' => $Codigo,
			'Acepta' => 'NO' ,
			'TiempoCumplido' => $LLegada,
			'HoraEstimadaLLegada' => $HoraLLegadaTienda,
			'HoraLLegadaTienda' => $HoraLlegada,
			'HoraSalidaTienda' => $HoraSalida,
			'Conductor' => $Usuario,
			'RutConductor' => $Rut,
			'RutaTienda'=> $RutaTienda,
			'Dia'=> $Dia,
			'Fecha' => date('Y-m-d'),
			'Tienda' => $Tienda,
			);

		$insertar = $this->validacion_model->Acepta($data);

		$this->session->sess_destroy("conductores");
		redirect(base_url()."acceso/salir");

		
	}
}

/* End of file Validacion.php */
/* Location: ./application/controllers/Validacion.php */