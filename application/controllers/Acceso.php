<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Acceso extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->layout->setLayout('loginConductor');
        $this->load->library('codigounico');
	
	}

	public function index()
	{


        //print_r($datos);exit;
        $this->layout->view("index");
	}


	public function login()
    {
        if($this->input->post())
        {
            if($this->form_validation->run('login'))
            {
                //crear y referenciar un método para preguntar si los datos
                //ingresados por el usuario existen en la bd
                $datos=$this->login_model->getLogin($this->input->post('rut',true));
                //crear una condición para validar lo anterior
                if(sizeof($datos)==0)
                {
                    $this->session->set_flashdata('css','danger');
                    $this->session->set_flashdata('mensaje','El Rut ingresado no existe en nuestra base de datos');
                    redirect(base_url()."acceso/login");
                }else
                {
                    //darle un nombre al array general de sessiones
                    $this->session->set_userdata('conductores');
                    //asignamos los datos a cada sessión por separado
                    $this->session->set_userdata('id',$datos->Id);
                    $this->session->set_userdata('Nombre',$datos->Nom);
                    $this->session->set_userdata('Apellido',$datos->Apepaterno);
                    $this->session->set_userdata('rut',$datos->Rut);
                    $this->session->set_userdata('SCodigo',$this->codigounico->generarCodigo(5));
                    //redireccionamos a la url principal de los contenidos restringidos
                    redirect(base_url()."acceso/conductorin");
                }
            }
        }
        $this->layout->view('login');
    }

    public function conductorin()
    {
        if($this->session->userdata('id'))
        {


            if ($this->input->post()) {
            if ($this->form_validation->run('add_conductorin')) {
                
                //formato hora
                $fechaActual = date ( 'Y-m-d H:i:s');
                $nuevaFecha = strtotime ( '-4 hours' , strtotime ( $fechaActual ) ) ;
                $hora = date ( 'H:i:s' , $nuevaFecha );

                //checklist

                $mercaderia = $this->input->post('entrega');
                $insumo = $this->input->post('entrega1');

                if ($mercaderia == 1){
                        
                        $mercaderia = 1;
                }else{
                    
                      $mercaderia = 0;
                }


                if ($insumo == 1){
                        
                        $insumo = 1;
                }else{
                    
                      $insumo = 0;
                }


                $data=array(

                        'Fecha'=>date('Y-m-d'),
                        'Vuelta'=>$this->input->post('optradio'),
                        'HoraLlegada'=>$hora,
                        'EntregaMercaderia'=> $mercaderia,
                        'EntregaInsumo'=> $insumo,
                        'UsuarioRut'=>$this->session->userdata('rut'),
                        'Tienda'=>$this->input->post('tienda',true),
                        'Match'=>$this->session->userdata('SCodigo'),
                        );
                
                $insertar = $this->conductores_model->insertar($data);

               $this->session->set_flashdata('css', 'success');
               $this->session->set_flashdata('mensaje', 'Su llegada ha sido registrada exitosamente');

               
                redirect(base_url().'acceso/conductorout');
            }
        }

            
            $selTienda = $this->login_model->selTiendas();
            
            $this->layout->view('conductorentrada',compact('selTienda','hora'));
        }else
        {
            redirect(base_url()."acceso/login");
        }
    }



     public function conductorout()
        {
             if($this->session->userdata('id')){
             
       


            if ($this->input->post()) {
            
                
                //formato hora
                $fechaActual = date ( 'Y-m-d H:i:s');
                $nuevaFecha = strtotime ( '-4 hours' , strtotime ( $fechaActual ) ) ;
                $hora = date ( 'H:i:s' , $nuevaFecha );

                //checklist

                $bandeja = $this->input->post('salida1');
                $devolucion = $this->input->post('salida2');
                $nada = $this->input->post('salida3');

                if (($bandeja == 0) || ($bandeja == '')){
                        
                        $bandeja = 0;
                }else{
                    
                      $bandeja = 1;
                }


                if (($devolucion == 0) || ($devolucion == '')){
                        
                        $devolucion = 0;
                }else{
                    
                      $devolucion = 1;
                }

                if (($nada == 0) || ($nada == '')){
                        
                        $nada = 0;
                }else{
                    
                      $nada = 1;
                }



                $data=array(

                        'Fecha'=>date('Y-m-d'),
                        'HoraSalida'=>$hora,
                        'RetiroBandeja'=> $bandeja,
                        'DevolucionMer'=> $devolucion,
                        'Retiro'=>$nada,
                        'UsuarioRut'=>$this->session->userdata('rut'),
                        'Match'=>$this->session->userdata('SCodigo'),
                        );
                
                $insertar = $this->conductores_model->insertarSalida($data);
                
                $this->session->set_flashdata('css', 'success');
                $this->session->set_flashdata('mensaje', 'Su registro ha sido completado, Adios!');

                redirect(base_url().'validacion');
          
        }

            $this->layout->view('conductorsalida');

        }else {

            redirect(base_url()."acceso/login");
        }
        }




    public function salir()
        {
            $this->session->sess_destroy("conductores");
            redirect(base_url().'acceso/login',  301);
        }


}

/* End of file Login.php */
/* Location: ./application/controllers/Login.php */

