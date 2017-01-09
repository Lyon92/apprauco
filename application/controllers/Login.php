<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
        $this->load->library('codigounico');
	
	}

	{


        print_r($datos);exit;
        $this->layout->view("index");



        if($this->input->post())
        {
            {

                $user = $this->input->post('user');
                $pass = $this->input->post('pass');

                //crear y referenciar un método para preguntar si los datos
                //ingresados por el usuario existen en la bd
                $datos = $this->login_model->login($user,$pass);
                //crear una condición para validar lo anterior
                {
                    $this->session->set_flashdata('css','danger');
                    $this->session->set_flashdata('mensaje','El usuario o la clave ingresada no es valido');
                    redirect(base_url()."login");
                }else
                {
                   
                    //redireccionamos a la url principal de los contenidos restringidos
                }
            }
        }
    }

  


    public function Logout()
        {
        }


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */

