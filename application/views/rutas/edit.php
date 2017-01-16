

<div class="container-fluid">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar rutas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>rutas">Rutas</a></li>
            <li class="active">Editar Ruta</li>
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
                <label for="ruta" class="control-label">Ruta</label>
                <input type="text" class="form-control" id="ruta" name="ruta" value="<?php echo set_value_input($datos,'ruta',$datos->CodRuta)?>">
            </div>  
 
            
            <div class="form-group"> 
                <label for="vuelta" class="control-label">Vuelta</label>
                <input type="text" class="form-control" id="vuelta" name="vuelta" value="<?php echo set_value_input($datos,'vuelta',$datos->Vuelta)?>">
            </div>  



            <div class="form-group">
                <label for="empresa" class="control-label">Empresa</label>
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
                <a href="<?php echo base_url() ?>rutas" class="btn btn-default">Volver</a>
             </div>     
           
           

       <?php echo form_close(); ?>
	  

      </div>

