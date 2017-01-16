<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('datosAdmin');
		$this->load->library('codigounico');
				
	}

	public function index(){

		$HoraLlegada = '8:00';
		$HoraSalida =  '9:35';
		$TiempoEnTienda = $this->codigounico->restaHoras($HoraLlegada,$HoraSalida);

		$this->layout->view('index',compact('TiempoEnTienda'));
	}
}
	
/* End of file Tiendas.php */
/* Location: ./application/controllers/Tiendas.php */