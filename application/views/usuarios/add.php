

<div class="container-fluid">
  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Agregar Usuario</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
      
      
	<div class="panel panel-default">
	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>usuarios">Usuarios</a></li>
            <li class="active">Agregar Usuario</li>
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
                <label for="nom" class="control-label">Nombre</label>
                <input type="text" class="form-control" id="name" name="nom" value="<?php echo set_value_input(array(),'nom','nom')?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="apepaterno" class="control-label">Apellido Paterno</label>
                <input type="text" class="form-control" id="name" name="apepaterno" value="<?php echo set_value_input(array(),'apepaterno','apepaterno')?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="apematerno" class="control-label">Apellido Materno</label>
                <input type="text" class="form-control" id="name" name="apematerno" value="<?php echo set_value_input(array(),'apematerno','apematerno')?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="rut" class="control-label">Rut</label>
                <input type="text" class="form-control" id="rut" name="rut" value="<?php echo set_value_input(array(),'rut','rut')?>" onblur="return Rut(form.rut.value)">
            </div>                  
                                    
            <div class="form-group"> 
                <label for="direccion" class="control-label">Dirección</label>
                <input type="text" class="form-control" id="address" name="direccion" value="<?php echo set_value_input(array(),'direccion','direccion')?>">
            </div>      

             <div class="form-group"> 
                <label for="email" class="control-label">Correo Electronico</label>
                <input type="text" class="form-control" id="address" name="email" value="<?php echo set_value_input(array(),'email','email')?>">
            </div>                                      
                          
            <div class="form-group">
                <label for="perfil" class="control-label">Seleccione un Perfil</label>
                    <select name="perfil" class="form-control">
                    <?php foreach ($selPerfil as $value): ?>
                      <option value="<?php echo $value->Id ?>"><?php echo $value->NomPerfil; ?></option>
                    <?php endforeach ?>
                    </select>
            </div>
            
            <div class="form-group">
                <label for="empresa" class="control-label">Seleccione una Empresa</label>
                    <select name="empresa" class="form-control">
                    <?php foreach ($selEmpresa as $value): ?>
                      <option value="<?php echo $value->Id ?>"><?php echo $value->Descripcion; ?></option>
                    <?php endforeach ?>
                    </select>
            </div>


            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Agregar</button>
                  <a href="<?php echo base_url() ?>usuarios" class="btn btn-default">Volver</a>
             </div>     
           

       <?php echo form_close(); ?>
	  </div>

	 
	</div>
</div>