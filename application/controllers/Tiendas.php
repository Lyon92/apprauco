<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiendas extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('adminfront');
				
	}

	public function index(){

		
		if($this->uri->segment(3))
		{
			$pagina = $this->uri->segment(3);

		}else{

			$pagina = 0;
		}
		
		$porpagina=10;
		
		$datos = $this->tiendas_model->getAllPagination($pagina,$porpagina,'limit');
		$cuantos = $this->tiendas_model->getAllPagination($pagina,$porpagina,'cuantos');

		//Libreria Pagination

 		$config['base_url']=base_url()."tiendas/index";
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
			if ($this->form_validation->run('add_tienda')) {
				
				$data=array(

						'NomTienda'=>$this->input->post('tienda',true),
						'CodTienda'=>$this->input->post('codigo',true),
						'DireTienda'=>$this->input->post('direccion',true),
						'Create'=>date('Y-m-d'),
						'Modified'=>date('Y-m-d'),
					);
				$insertar = $this->tiendas_model->insertar($data);
				$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'La Tienda se ha creado exitosamente');

				redirect(base_url().'tiendas');
			}
		}

		$this->layout->view('add');
	}

	public function edit($id=null,$pagina=null){
		
		if(!$id){
			show_404();
		}

		$datos=$this->tiendas_model->getAllById($id);
		
		if(sizeof($datos)==0){
			show_404();
		}
		if ($this->input->post()) {
			if ($this->form_validation->run('add_tienda')) {
				
				$data=array(

						'NomTienda'=>$this->input->post('tienda',true),
						'CodTienda'=>$this->input->post('codigo',true),
						'DireTienda'=>$this->input->post('direccion',true),
						'Modified'=>date('Y-m-d'),
					);
				$this->tiendas_model->update($data,$this->input->post('id',true));

				$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El registro se ha modificado exitosamente');

				redirect(base_url().'tiendas');
			}
		}

		$this->layout->view('edit',compact('datos','id','pagina'));

	}


	public function delete($id=null){

		if(!$id){
			show_404();
		}

		$datos=$this->tiendas_model->getAllById($id);
		
		if(sizeof($datos)==0){
			show_404();
		}

		$this->tiendas_model->delete($id);

		$this->session->set_flashdata('css', 'success');
				$this->session->set_flashdata('mensaje', 'El registro se ha eliminado exitosamente');

				redirect(base_url().'tiendas');

	}

	
}

/* End of file Tiendas.php */
/* Location: ./application/controllers/Tiendas.php */