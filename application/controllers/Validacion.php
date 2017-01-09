<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validacion extends CI_Controller {


	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('frontadmin');
		$this->load->library('codigounico');
	
	}

	public function index()
	{
	 	//Codigo de la session
	 	$Codigo = $this->session->userdata('SCodigo');

	 	$Datos = $this->validacion_model->DatosValida($Codigo);

	 	$HoraLlegada = $Datos->HoraLlegada;
	 	$HoraSalida = $Datos->HoraSalida;


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


	 	$this->layout->view("index",compact('HoraLlegada','HoraSalida','Entrega','Retiro','TiempoEnTienda'));

	}


	public function Acepta(){

		$this->session->sess_destroy("conductores");
		redirect(base_url()."acceso/salir");
	}

	public function NoAcepta(){

		redirect(base_url()."acceso/salir");
	}
}

/* End of file Validacion.php */
/* Location: ./application/controllers/Validacion.php */