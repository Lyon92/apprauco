<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rutas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllPagination($pagina,$porpagina,$quehago){


		switch ($quehago) {
			case 'limit':
				 $query = $this->db
						 ->select('Id,CodRuta,Vuelta,Empresas_Id,Create,Modified')
						 ->from('rutas')
						 ->limit($porpagina,$pagina)
						 ->order_by('CodRuta','ASC')
						 ->get();

					return $query->result();
			break;


			
			case 'cuantos':
				 $query = $this->db
						 ->select('Id,CodRuta,Vuelta,Empresas_Id,Create,Modified')
						 ->from('rutas')
						 ->count_all_results();

					return $query;
				break;
		}


	}


	public function getAll(){

		$query = $this->db
				 ->select('Id,CodRuta,Vuelta,Empresas_Id,Create,Modified')
				 ->from('rutas')
				 ->order_by('CodRuta','ASC')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function getAllById($id){

		$query = $this->db
				 ->select('Id,CodRuta,Vuelta,Empresas_Id,Create,Modified')
				 ->from('rutas')
				 ->where(array('Id'=>$id))
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->row();
	}


	public function insertar($data = array()){

		$this->db->insert('rutas', $data);
		return $this->db->insert_id();

	}
	public function update($data = array(), $id){
		$this->db->where('Id', $id);
		$this->db->update('rutas',$data);
		
	}
	public function delete($id){

		$this->db->where('Id', $id);
		$this->db->delete('rutas');
		
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

	public function selTiendas(){

		$query = $this->db
				 ->select('*')
				 ->from('tiendas')
				 ->order_by('Id','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
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