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


	public function login($user,$pass){
		
		$this->db->select('c.Usuario, c.Password, c.Usuarios_Id');
		$this->db->from('Credenciales c');
		$this->db->join('Usuarios u', 'c.Usuarios_Id = u.Id');
		$this->db->where('c.Usuario', $user);
		$this->db->where('c.Password', $pass);

		$datos = $this->db->get();

		if ($datos->num_rows() == 1) {

			return 1;


		}else {
			return 0;
		}

	
	}
	


}

/* End of file conductores_model.php */
/* Location: ./application/models/conductores_model.php */