<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard_model extends CI_Model {

	public function __construct(){
		parent::__construct();
		
	}

	public function getAllPagination($pagina,$porpagina,$quehago){


		switch ($quehago) {
			case 'limit':
				 $query = $this->db
						 ->select('*')
						 ->from('registrototal')
						 ->limit($porpagina,$pagina)
						 ->order_by('Id','desc')
						 ->get();

					return $query->result();
			break;


			
			case 'cuantos':
				 $query = $this->db
						 ->select('*')
						 ->from('registrototal')
						 ->count_all_results();

					return $query;
				break;
		}


	}


	public function getDatos(){

		$query = $this->db
				 ->select('*')
				 ->from('registrosin i')
				 ->join('registrosout o', 'i.Match = o.Match')
				 ->join('registrototal r', 'i.Match = r.Match')
				 ->join('usuarios u', 'i.UsuarioRut = u.Rut')
				 ->join('tiendas t', 't.Id = i.Tienda')				 			 		 
				 ->get();


		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}

	public function NoCumpleTiempo() {
		    
		     $query = $this->db
					->select('*')
					->from('registrototal')
					->where('TiempoCumplido <','03:25:00')
					->count_all_results();
		
		return $query;
	}

	public function getRegistros(){

		$query = $this->db
				 ->select('*')
				 ->from('registrototal') 			 		 
				 ->get();


		/*echo $this->db->last_query();exit;	*/	 	
		return $query->result();
	}




	}

/* End of file dashboard_model.php */
/* Location: ./application/models/dashboard_model.php */