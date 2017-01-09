<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	

	public function getLogin($rut){

		$query = $this->db
				 ->select('Id,Nom,Apepaterno,Apematerno,Rut')
				 ->from('Usuarios')
				 ->where(array('Rut'=> $rut))
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->row();
	}

	public function selTiendas(){

		$query = $this->db
				 ->select('*')
				 ->from('tiendas')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}



}

/* End of file conductores_model.php */
/* Location: ./application/models/conductores_model.php */