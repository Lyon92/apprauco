<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rutas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('adminfront');
				
	}

	public function index(){

		/* if($this->session->userdata('id'))
        {
           */
       
		if($this->uri->segment(3))
		{
			$pagina = $this->uri->segment(3);

		}else{

			$pagina = 0;
		}
		
		$porpagina=10;
		
		$datos = $this->rutas_model->getAllPagination($pagina,$porpagina,'limit');
		$cuantos = $this->rutas_model->getAllPagination($pagina,$porpagina,'cuantos');
		

		//Libreria Pagination

 		$config['base_url']=base_url()."rutas/index";
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
		/* }else
        {
            redirect(base_url()."acceso/login");
        }*/
	}

	public function add(){
				
		if ($this->input->post()) {
			if ($this->form_validation->run('add_ruta')) {
				
				$data=array(

						'CodRuta'=>$this->input->post('ruta',true),
						'HoraLlegada'=>$this->input->post('hora',true),
						'Vuelta'=>$this->input->post('vuelta',true),
						'Empresas_Id'=>$this->input->post('empresa',true),
						'Tiendas_Id'=>$this->input->post('tienda',true),
						'Usuarios_Id'=>$this->input->post('usuario',true),
						'Create'=>date('Y-m-d'),
						'Modified'=>date('Y-m-d'),
					);
				$insertar = $this->rutas_model->insertar($data);
				$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'La Ruta se ha creado exitosamente');

				redirect(base_url().'rutas');
			}
		}
		$selEmpresa = $this->rutas_model->selEmpresas();
		$selTienda = $this->rutas_model->selTiendas();
		$selUsuario = $this->rutas_model->selUsuarios();

		$this->layout->view('add',compact('selEmpresa','selTienda','selUsuario'));
	}

	public function edit($id=null){
		
		if(!$id){
			show_404();
		}

		$datos=$this->rutas_model->getAllById($id);
		
		if(sizeof($datos)==0){
			show_404();
		}
		if ($this->input->post()) {
			if ($this->form_validation->run('add_ruta')) {
				
			
				$data=array(

						'CodRuta'=>$this->input->post('ruta',true),
						'HoraLlegada'=>$this->input->post('hora',true),
						'Vuelta'=>$this->input->post('vuelta',true),
						'Empresas_Id'=>$this->input->post('empresa',true),
						'Tiendas_Id'=>$this->input->post('tienda',true),
						'Usuarios_Id'=>$this->input->post('usuario',true),
						'Modified'=>date('Y-m-d'),
					);
				
				$this->rutas_model->update($data,$this->input->post('id',true));

				$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El registro se ha modificado exitosamente');

				redirect(base_url().'rutas');
			}
		}

				$selEmpresa = $this->rutas_model->selEmpresas();
				$selTienda  = $this->rutas_model->selTiendas();
				$selUsuario = $this->rutas_model->selUsuarios();

		$this->layout->view('edit',compact('datos','id','selEmpresa','selTienda','selUsuario'));

	}


	public function delete($id=null){

		if(!$id){
			show_404();
		}

		$datos=$this->rutas_model->getAllById($id);
		
		if(sizeof($datos)==0){
			show_404();
		}

		$this->rutas_model->delete($id);

		$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El registro se ha eliminado exitosamente');

				redirect(base_url().'rutas');

	}

}

/* End of file Tiendas.php */
/* Location: ./application/controllers/Tiendas.php */