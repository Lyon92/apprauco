<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllPagination($pagina,$porpagina,$quehago){


		switch ($quehago) {
			case 'limit':
				 $query = $this->db
						 ->select('Id,Nom,Apepaterno,Apematerno,Rut,Direccion,Correo,Perfiles_Id,Empresas_Id,Create,Modified')
						 ->from('usuarios')
						 ->limit($porpagina,$pagina)
						 ->order_by('Id','desc')
						 ->get();

					return $query->result();
			break;


			
			case 'cuantos':
				 $query = $this->db
						 ->select('Id,Nom,Apepaterno,Apematerno,Rut,Direccion,Correo,Perfiles_Id,Empresas_Id,Create,Modified')
						 ->from('usuarios')
						 ->count_all_results();

					return $query;
				break;
		}


	}

	public function getAll(){

		$query = $this->db
				 ->select('Id,Nom,Apepaterno,Apematerno,Rut,Direccion,Correo,Perfiles_Id,Empresas_Id,Create,Modified')
				 ->from('usuarios')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function getAllById($id){

		$query = $this->db
				 ->select('Id,Nom,Apepaterno,Apematerno,Rut,Direccion,Correo,Perfiles_Id,Empresas_Id,Create,Modified')
				 ->from('usuarios')
				 ->where(array('Id'=>$id))
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->row();
	}


	public function insertar($data = array()){

		$this->db->insert('usuarios', $data);
		return $this->db->insert_id();

	}
	public function update($data = array(), $id){
		$this->db->where('Id', $id);
		$this->db->update('usuarios',$data);
		
	}
	public function delete($id){

		$this->db->where('Id', $id);
		$this->db->delete('usuarios');
		
	}

	public function selPerfiles(){

		$query = $this->db
				 ->select('*')
				 ->from('perfiles')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function selEmpresas(){

		$query = $this->db
				 ->select('*')
				 ->from('empresas')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}


	
}

/* End of file conductores_model.php */
/* Location: ./application/models/conductores_model.php */