

<div class="container-fluid">
  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Empresa</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
      
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>tiendas">Empresas</a></li>
            <li class="active">Agregar Empresa</li>
        </ol>

	  <div class="panel-body">
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
                <label for="rut" class="control-label">Rut</label>
                <input type="text" class="form-control" id="rut" name="rut" value="<?php echo set_value_input(array(),'rut','rut')?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="descripcion" class="control-label">Descripción</label>
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="<?php echo set_value_input(array(),'descripcion','descripcion')?>">
            </div>                  
                                    
            <div class="form-group"> 
                <label for="direccion" class="control-label">Dirección</label>
                <input type="text" class="form-control" id="direccion" name="direccion" value="<?php echo set_value_input(array(),'direccion','direccion')?>">
            </div>                                  
                            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo base_url() ?>empresas" class="btn btn-default">Volver</a>
             </div>     
           

       <?php echo form_close(); ?>
	  </div>

	 
	</div>
</div>