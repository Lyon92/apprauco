

<div class="container-fluid">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Perfil</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>perfiles/index/<?php echo $pagina ?>">Perfiles</a></li>
            <li class="active">Editar Perfil</li>
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
                <label for="perfil" class="control-label">Nombre Perfil</label>
                <input type="text" class="form-control"  name="perfil" value="<?php echo set_value_input($datos,'perfil',$datos->NomPerfil)?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="descripcion" class="control-label">Descripcion</label>
                <input type="text" class="form-control"  name="descripcion" value="<?php echo set_value_input($datos,'descripcion',$datos->Descripcion)?>">
            </div>                  
                                    
                            
            
            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="<?php echo base_url() ?>perfiles" class="btn btn-default">Volver</a>
             </div>     
           
           

       <?php echo form_close(); ?>
	  

      </div>

