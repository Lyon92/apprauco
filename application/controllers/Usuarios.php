<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('adminfront');
				
	}

	/*public function index(){

		$datos = $this->usuarios_model->getAll();

		$this->layout->view('index',compact('datos'));
	}*/

	public function index(){

		if($this->uri->segment(3))
		{
			$pagina = $this->uri->segment(3);

		}else{

			$pagina = 0;
		}
		
		$porpagina=10;
		
		$datos = $this->usuarios_model->getAllPagination($pagina,$porpagina,'limit');
		$cuantos = $this->usuarios_model->getAllPagination($pagina,$porpagina,'cuantos');

		//Libreria Pagination

 		$config['base_url']=base_url()."usuarios/index";
        $config['total_rows']=$cuantos;
        $config['per_page']=$porpagina;
        $config['uri_segment']='3';
        $config['num_links']='2';


        $config['full_tag_open'] = '<ul class="pagination">';
        $config['full_tag_close'] = '</ul>';
        $config['first_link'] = 'Primero';
        $config['last_link'] = 'Último';
        $config['first_tag_open'] = '<li>';
        $config['first_tag_close'] = '</li>';
        $config['prev_link'] = '&laquo';
        $config['prev_tag_open'] = '<li class="prev">';
        $config['prev_tag_close'] = '</li>';
        $config['next_link'] = '&raquo';
        $config['next_tag_open'] = '<li>';
        $config['next_tag_close'] = '</li>';
        $config['last_tag_open'] = '<li>';
        $config['last_tag_close'] = '</li>';
        $config['cur_tag_open'] = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
        $config['num_tag_open'] = '<li>';
        $config['num_tag_close'] = '</li>';
        
        
        
        $config['full_tag_close']='</ul>';
        $this->pagination->initialize($config);

		$this->layout->view('index',compact('datos','cuantos','pagina'));
	}

	public function add(){

		if ($this->input->post()) {
			if ($this->form_validation->run('add_usuario')) {
				
				$data=array(

						'Nom'=>$this->input->post('nom',true),
						'Apepaterno'=>$this->input->post('apepaterno',true),
						'Apematerno'=>$this->input->post('apematerno',true),
						'Rut'=>$this->input->post('rut',true),
						'Direccion'=>$this->input->post('direccion',true),
						'Correo'=>$this->input->post('email',true),
						'Perfiles_Id'=>$this->input->post('perfil',true),
						'Empresas_Id'=>$this->input->post('empresa',true),
						'Create'=>date('Y-m-d'),
						'Modified'=>date('Y-m-d'),
					);
				$insertar = $this->usuarios_model->insertar($data);
				$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El usuario se ha creado exitosamente');

				redirect(base_url().'usuarios');
			}
		}
		$selPerfil = $this->usuarios_model->selPerfiles();
		$selEmpresa = $this->usuarios_model->selEmpresas();
		$this->layout->view('add',compact('selPerfil','selEmpresa'));
	}

	public function edit($id=null,$pagina=null){
		
		if(!$id){
			show_404();
		}

		$datos=$this->usuarios_model->getAllById($id);
		
		if(sizeof($datos)==0){
			show_404();
		}
		if ($this->input->post()) {
			if ($this->form_validation->run('add_usuario')) {
				
				$data=array(

						'Nom'=>$this->input->post('nom',true),
						'Apepaterno'=>$this->input->post('apepaterno',true),
						'Apematerno'=>$this->input->post('apematerno',true),
						'Rut'=>$this->input->post('rut',true),
						'Direccion'=>$this->input->post('direccion',true),
						'Correo'=>$this->input->post('email',true),
						'Perfiles_Id'=>$this->input->post('perfil',true),
						'Empresas_Id'=>$this->input->post('empresa',true),
						'Modified'=>date('Y-m-d'),
					);
				$this->usuarios_model->update($data,$this->input->post('id',true));

				$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El registro se ha modificado exitosamente');

				redirect(base_url().'usuarios');
			}
		}

		$selPerfil = $this->usuarios_model->selPerfiles();
		$selEmpresa = $this->usuarios_model->selEmpresas();
		
		$this->layout->view('edit',compact('datos','id','pagina','selPerfil','selEmpresa'));

	}


	public function delete($id=null){

		if(!$id){
			show_404();
		}

		$datos=$this->usuarios_model->getAllById($id);
		
		if(sizeof($datos)==0){
			show_404();
		}

		$this->usuarios_model->delete($id);

		$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El registro se ha eliminado exitosamente');

				redirect(base_url().'usuarios');

	}
}

/* End of file Conductores.php */
/* Location: ./application/controllers/Conductores.php */