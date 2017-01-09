<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Credenciales_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllPagination($pagina,$porpagina,$quehago){


		switch ($quehago) {
			case 'limit':
				 $query = $this->db
						 ->select('Id,Usuario,Password,Usuarios_Id')
						 ->from('credenciales')
						 ->limit($porpagina,$pagina)
						 ->order_by('Id','desc')
						 ->get();

					return $query->result();
			break;


			
			case 'cuantos':
				 $query = $this->db
						 ->select('Id,Usuario,Password,Usuarios_Id')
						 ->from('credenciales')
						 ->count_all_results();

					return $query;
				break;
		}


	}


	public function getAll(){

				$query = $this->db
						 ->select('Id,Usuario,Password,Usuarios_Id')
						 ->from('credenciales')
						 ->order_by('Id','desc')
						 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function getAllById($id){

				$query = $this->db
						->select('Id,Usuario,Password,Usuarios_Id')
						 ->from('credenciales')
						 ->where(array('Id'=>$id))
						 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->row();
	}


	public function insertar($data = array()){

		$this->db->insert('credenciales', $data);
		return $this->db->insert_id();

	}
	public function update($data = array(), $id){
		$this->db->where('Id', $id);
		$this->db->update('credenciales',$data);
		
	}
	public function delete($id){

		$this->db->where('Id', $id);
		$this->db->delete('credenciales');
		
	}

	public function selUsuarios(){

		$query = $this->db
				 ->select('*')
				 ->from('usuarios')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}


}

/* End of file tiendas_model.php */
/* Location: ./application/models/tiendas_model.php */