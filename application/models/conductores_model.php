<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Conductores_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	

		
	public function insertar($data = array()){

		$this->db->insert('registrosin', $data);
		return $this->db->insert_id();

	}

	public function insertarSalida($data = array()){

		$this->db->insert('registrosout', $data);
		return $this->db->insert_id();

	}

	
}

/* End of file conductores_model.php */
/* Location: ./application/models/conductores_model.php */