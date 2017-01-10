<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('datosAdmin');
				
	}

	public function index(){

		$this->layout->view('index');
	}
}
	
/* End of file Tiendas.php */
/* Location: ./application/controllers/Tiendas.php */