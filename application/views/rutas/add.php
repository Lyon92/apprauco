

<div class="container-fluid">
  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Ruta</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
      
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>rutas">Rutas</a></li>
            <li class="active">Agregar Ruta</li>
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
                <label for="ruta" class="control-label">Ruta</label>
                <input type="text" class="form-control" id="ruta" name="ruta" value="<?php echo set_value_input(array(),'ruta','ruta')?>" autofocus="true">
            </div>  
            
            
            <div class="form-group"> 
                <label for="vuelta" class="control-label">Vuelta</label>
                <input type="text" class="form-control" id="vuelta" name="vuelta" value="<?php echo set_value_input(array(),'vuelta','vuelta')?>">
            </div>  

            <div class="form-group">
            <label for="empresa" class="control-label">Empresa</label>
                <select name="empresa" class="form-control">
                <?php foreach ($selEmpresa as $value): ?>
                  <option value="<?php echo $value->Id ?>"><?php echo $value->Rut; ?></option>
                <?php endforeach ?>
                </select>
            </div>

         
                            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo base_url() ?>tiendas" class="btn btn-default">Volver</a>
             </div>     
           

       <?php echo form_close(); ?>
	  </div>

	 
	</div>
</div>