<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Validacion_model extends CI_Model {

	public function __construct()
	{
		parent::__construct();
		
	}


	public function DatosValida($Codigo){

		$query = $this->db
				 ->select('*')
				 ->from('registrosin i')	
				 ->join('registrosout o', 'i.Match = o.Match')
				 ->where('i.Match', $Codigo)	
				 			 		 
				 ->get();


		/*echo $this->db->last_query();exit;	*/	
		$result =  $query->row();
		return $result;

	}
	

	
}

/* End of file conductores_model.php */
/* Location: ./application/models/conductores_model.php */