

<div class="container-fluid">
  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Credenciales</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
      
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>tiendas">Credenciales</a></li>
            <li class="active">Agregar Credenciales</li>
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
                <label for="usuario" class="control-label">Usuario</label>
                    <select name="usuario" class="form-control">
                    <?php foreach ($selUsuario as $value): ?>
                      <option value="<?php echo $value->Id ?>"><?php echo $value->Nom." ".$value->Apepaterno; ?></option>
                    <?php endforeach ?>
                    </select>
            </div>

            <div class="form-group"> 
                <label for="user" class="control-label">Nombre de Usuario</label>
                <input type="text" class="form-control" id="user" name="user" value="<?php echo set_value_input(array(),'user','user')?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="password" class="control-label">Password</label>
                <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value_input(array(),'password','password')?>">
            </div>

            
           

                                    
                            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo base_url() ?>credenciales" class="btn btn-default">Volver</a>
             </div>     
           

       <?php echo form_close(); ?>
	  </div>

	 
	</div>
</div>