<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Empresas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllPagination($pagina,$porpagina,$quehago){


		switch ($quehago) {
			case 'limit':
				 $query = $this->db
						 ->select('Id,Rut,Descripcion,Direccion,Create,Modified')
						 ->from('empresas')
						 ->limit($porpagina,$pagina)
						 ->order_by('id','desc')
						 ->get();

					return $query->result();
			break;


			
			case 'cuantos':
				 $query = $this->db
						 ->select('Id,Rut,Descripcion,Direccion,Create,Modified')
						 ->from('empresas')
						 ->count_all_results();

					return $query;
				break;
		}


	}


	public function getAll(){

		$query = $this->db
				 ->select('Id,Rut,Descripcion,Direccion,Create,Modified')
				 ->from('empresas')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function getAllById($id){

		$query = $this->db
				 ->select('Id,Rut,Descripcion,Direccion,Create,Modified')
				 ->from('empresas')
				 ->where(array('Id'=>$id))
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->row();
	}


	public function insertar($data = array()){

		$this->db->insert('empresas', $data);
		return $this->db->insert_id();

	}
	public function update($data = array(), $id){
		$this->db->where('Id', $id);
		$this->db->update('empresas',$data);
		
	}
	public function delete($id){

		$this->db->where('Id', $id);
		$this->db->delete('empresas');
		
	}


}

/* End of file tiendas_model.php */
/* Location: ./application/models/tiendas_model.php */