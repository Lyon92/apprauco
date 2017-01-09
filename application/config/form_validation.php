<?php
/**
 * Reglas de validacion para formularios
 */
$config = array(
       
        /**
         * add_formulario
         * */
         'login'
        => array(        
            array('field' => 'rut','label' => 'RUT','rules' => 'required|trim|esRut|max_length[12]'),
        ), 

        'add_usuario'
        => array(
            
            array('field' => 'nom','label' => 'Nombre','rules' => 'required|is_string|trim|max_length[100]'),
            array('field' => 'apepaterno','label' => 'Apellido Paterno','rules' => 'required|is_string|trim|max_length[100]'),
            array('field' => 'apematerno','label' => 'Apellido Materno','rules' => 'required|is_string|trim|max_length[100]'),
            array('field' => 'rut','label' => 'RUT','rules' => 'required|trim|esRut|max_length[12]'),
            array('field' => 'direccion','label' => 'Direccion','rules' => 'required|is_string|trim|max_length[60]'),
            array('field' => 'email','label' => 'Correo Electronico','rules' => 'required|trim|max_length[100]'),
        ), 
        
        'add_tienda'
        => array(
            
            array('field' => 'tienda','label' => 'Tienda','rules' => 'required|is_string|trim|max_length[5]'),
            array('field' => 'codigo','label' => 'Codigo','rules' => 'required|trim|max_length[3]'),
            array('field' => 'direccion','label' => 'Direccion','rules' => 'required|is_string|trim|max_length[150]'),
            
        ), 

         'add_ruta'
        => array(
            
            array('field' => 'ruta','label' => 'Ruta','rules' => 'required|trim|max_length[4]'),
            array('field' => 'hora','label' => 'Hora','rules' => 'required|trim|max_length[5]'),
    
        ), 

         'add_empresa'
        => array(
            
            array('field' => 'rut','label' => 'RUT','rules' => 'required|trim|esRut|max_length[12]'),
            array('field' => 'descripcion','label' => 'Descripcion','rules' => 'required|trim|max_length[60]'),
            array('field' => 'direccion','label' => 'Direccion','rules' => 'required|is_string|trim|max_length[100]'),
            
        ), 
     
        
          'add_perfil'
        => array(
            
            array('field' => 'perfil','label' => 'Nombre de Perfil','rules' => 'required|trim|max_length[20]'),
            array('field' => 'descripcion','label' => 'Descripción','rules' => 'required|trim|max_length[60]'),
    
        ), 


           'add_credencial'
        => array(
            
            array('field' => 'user','label' => 'Nombre de Usuario','rules' => 'required|trim|max_length[20]'),
            array('field' => 'password','label' => 'Password','rules' => 'required|trim'),
    
        ), 

          'add_conductorin'
        => array(
            
            array('field' => 'optradio','label' => 'Vuelta','rules' => 'required'),
    
        ), 

          
);