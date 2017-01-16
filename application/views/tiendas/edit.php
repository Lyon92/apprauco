

<div class="container-fluid">
    <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Editar Tiendas</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>

	  <!-- Default panel contents -->
	 
        <ol class="breadcrumb">
            <li><a href="<?php echo base_url() ?>tiendas/index/<?php echo $pagina ?>">Tiendas</a></li>
            <li class="active">Editar Tienda</li>
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
                <label for="tienda" class="control-label">Tienda</label>
                <input type="text" class="form-control"  name="tienda" value="<?php echo set_value_input($datos,'tienda',$datos->NomTienda)?>" autofocus="true">
            </div>  

            <div class="form-group"> 
                <label for="codigo" class="control-label">Codigo</label>
                <input type="text" class="form-control"  name="codigo" value="<?php echo set_value_input($datos,'codigo',$datos->CodTienda)?>">
            </div>                  
                                    

            <div class="form-group"> 
                <label for="direccion" class="control-label">Dirección</label>
                <input type="text" class="form-control" name="direccion" value="<?php echo set_value_input($datos,'direccion',$datos->DireTienda)?>">
            </div>           

            <div class="form-group"> 
                <label for="rutaSemana" class="control-label">Ruta Semana</label>
                <input type="text" class="form-control" name="rutaSemana" value="<?php echo set_value_input($datos,'rutaSemana',$datos->RutaSemana)?>">
            </div>                                       

            <div class="form-group"> 
                <label for="horaSemana" class="control-label">Hora Semana</label>
                <input type="text" class="form-control" name="horaSemana" value="<?php echo set_value_input($datos,'horaSemana',$datos->HoraSemana)?>">
            </div>      
        
            <div class="form-group"> 
                <label for="rutaSabado" class="control-label">Ruta Sabado</label>
                <input type="text" class="form-control" name="rutaSabado" value="<?php echo set_value_input($datos,'rutaSabado',$datos->RutaSabado)?>">
            </div>                       
            
            <div class="form-group"> 
                <label for="horaSabado" class="control-label">Hora Sabado</label>
                <input type="text" class="form-control" name="horaSabado" value="<?php echo set_value_input($datos,'horaSabado',$datos->HoraSabado)?>">
            </div>      

             <div class="form-group"> 
                <label for="rutaDomingo" class="control-label">Ruta Domingo</label>
                <input type="text" class="form-control" name="rutaDomingo" value="<?php echo set_value_input($datos,'rutaDomingo',$datos->RutaDomingo)?>">
            </div>                       
            
            <div class="form-group"> 
                <label for="horaDomingo" class="control-label">Hora Domingo</label>
                <input type="text" class="form-control" name="horaDomingo" value="<?php echo set_value_input($datos,'horaDomingo',$datos->HoraDomingo)?>">
            </div>       


            <input type="hidden" name="id" value="<?php echo $id ?>">
            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-primary">Editar</button>
                <a href="<?php echo base_url() ?>tiendas" class="btn btn-default">Volver</a>
             </div>     
           
           

       <?php echo form_close(); ?>
	  

      </div>

