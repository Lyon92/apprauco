<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiendas_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}

	public function getAllPagination($pagina,$porpagina,$quehago){


		switch ($quehago) {
			case 'limit':
				 $query = $this->db
						 ->select('Id,CodTienda,NomTienda,DireTienda,Create,Modified')
						 ->from('tiendas')
						 ->limit($porpagina,$pagina)
						 ->order_by('CodTienda','desc')
						 ->get();

					return $query->result();
			break;


			
			case 'cuantos':
				 $query = $this->db
						 ->select('Id,CodTienda,NomTienda,DireTienda,Create,Modified')
						 ->from('tiendas')
						 ->count_all_results();

					return $query;
				break;
		}


	}


	public function getAll(){

		$query = $this->db
				 ->select('Id,CodTienda,NomTienda,DireTienda,Create,Modified')
				 ->from('tiendas')
				 ->order_by('CodTienda','desc')
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function getAllById($id){

		$query = $this->db
				 ->select('Id,CodTienda,NomTienda,DireTienda,Create,Modified')
				 ->from('tiendas')
				 ->where(array('Id'=>$id))
				 ->get();

		/*echo $this->db->last_query();exit;	*/	 	
		return $query->row();
	}


	public function insertar($data = array()){

		$this->db->insert('tiendas', $data);
		return $this->db->insert_id();

	}
	public function update($data = array(), $id){
		$this->db->where('Id', $id);
		$this->db->update('tiendas',$data);
		
	}
	public function delete($id){

		$this->db->where('Id', $id);
		$this->db->delete('tiendas');
		
	}


}

/* End of file tiendas_model.php */
/* Location: ./application/models/tiendas_model.php */