<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('loginAdmin');
        $this->load->library('codigounico');
	
	}

	
	public function index() {

        if($this->input->post())
        {
            if($this->form_validation->run('userlogin'))
            {

                $user = $this->input->post('user');
                $pass = $this->input->post('pass');

                //crear y referenciar un método para preguntar si los datos
                //ingresados por el usuario existen en la bd
                $datos = $this->login_model->login($user,$pass);
                //crear una condición para validar lo anterior
                if($datos==0)
                {
                    $this->session->set_flashdata('css','danger');
                    $this->session->set_flashdata('mensaje','El usuario o la clave ingresada no es valido');
                    redirect(base_url()."login");
                }else
                {
                   
                    //redireccionamos a la url principal de los contenidos restringidos
                    redirect(base_url()."dashboard");
                }
            }
        }
        $this->layout->view('index');
    }


    public function Logout()
        {
            $this->session->sess_destroy();
            redirect(base_url().'Login',  301);
        }


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */

