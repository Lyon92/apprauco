

<div class="container-fluid">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Credenciales</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>perfiles/index/<?php echo $pagina ?>">Credenciales</a></li>
            <li class="active">Editar Credenciales</li>
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
                <label for="usuario" class="control-label">Nombre</label>
                <?php 
                    $lista = array();
                    foreach ($selUsuario as $registro) { 
                        $lista[$registro->Id] = $registro->Nom."".$registro->Apepaterno;
                    }
                    echo form_dropdown('usuario', $lista, $datos->Usuarios_Id, 'class="form-control"');
                ?>      
            </div>

            <div class="form-group"> 
                <label for="user" class="control-label">Nombre de Usuario</label>
                <input type="text" class="form-control"  name="user" value="<?php echo set_value_input($datos,'user',$datos->Usuario)?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="password" class="control-label">Password</label>
                <input type="text" class="form-control"  name="password" value="<?php echo set_value_input($datos,'password',$datos->Password)?>">
            </div>                  
                                    
                            
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="<?php echo base_url() ?>credenciales" class="btn btn-default">Volver</a>
             </div>     
           
           

       <?php echo form_close(); ?>
	  

      </div>

