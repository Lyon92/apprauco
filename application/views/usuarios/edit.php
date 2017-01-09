

<div class="container-fluid">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Usuarios</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>usuarios/index/<?php echo $pagina ?>">Usuarios</a></li>
            <li class="active">Editar Usuario</li>
        </ol>


	   <?php echo form_open(null,array('name'=>'form')); ?>

             <?php
                //acá visualizamos los mensajes de error
                $errors=validation_errors('<li>','</li>');
                if($errors!="")
                {
                    ?>
                    <div class="alert alert-danger">
                        <ul>
                            <?php echo $errors;?>
                        </ul>
                    </div>
                    <?php
                }
                ?>



            <div class="form-group"> 
                <label for="nom" class="control-label">Nombre</label>
                <input type="text" class="form-control"  name="nom" value="<?php echo set_value_input($datos,'nom',$datos->Nom)?>" autofocus="true">
            </div>  
            
            <div class="form-group"> 
                <label for="apepaterno" class="control-label">Apellido Paterno</label>
                <input type="text" class="form-control"  name="apepaterno" value="<?php echo set_value_input($datos,'apepaterno',$datos->Apepaterno)?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="apematerno" class="control-label">Apellido Materno</label>
                <input type="text" class="form-control"  name="apematerno" value="<?php echo set_value_input($datos,'apematerno',$datos->Apematerno)?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="rut" class="control-label">Rut</label>
                <input type="text" class="form-control"  name="rut" value="<?php echo set_value_input($datos,'rut',$datos->Rut)?>"  >
            </div>                  
                                    
         
            <div class="form-group"> 
                <label for="direccion" class="control-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo set_value_input($datos,'direccion',$datos->Direccion)?>">
            </div>                                  
                            
            <div class="form-group"> 
                <label for="email" class="control-label">Correo Electronico</label>
                <input type="text" class="form-control" name="email" value="<?php echo set_value_input($datos,'email',$datos->Correo)?>">
            </div>    

            <div class="form-group">
                <label for="perfil" class="control-label">Perfil</label>
                <?php 
                    $lista = array();
                    foreach ($selPerfil as $registro) { 
                        $lista[$registro->Id] = $registro->NomPerfil;
                    }
                    echo form_dropdown('perfil', $lista, $datos->Perfiles_Id, 'class="form-control"');
                ?>      
            </div>

            <div class="form-group">
                <label for="perfil" class="control-label">Empresa</label>
                <?php 
                    $lista = array();
                    foreach ($selEmpresa as $registro) { 
                        $lista[$registro->Id] = $registro->Descripcion;
                    }
                    echo form_dropdown('empresa', $lista, $datos->Empresas_Id, 'class="form-control"');
                ?>      
            </div>
            


            <input type="hidden" name="id" value="<?php echo $id ?>">
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="<?php echo base_url() ?>usuarios" class="btn btn-default">Volver</a>
             </div>     
           
           

       <?php echo form_close(); ?>
	  

      </div>

