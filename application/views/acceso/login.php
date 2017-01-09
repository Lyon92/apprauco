<br><br><br>

 <div class="container">
    <div class="row">


        <div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingrese Rut (sin puntos, ni guión)</h3> 
                    </div>
                 	<div class="panel-body">
                    <fieldset>
					<?php echo form_open(null,array('name'=>'form'));?>
					<?php
					            if($this->session->flashdata('mensaje')!='')
					            {
					               ?>
					               <div class="alert alert-<?php echo $this->session->flashdata('css')?>"><?php echo $this->session->flashdata('mensaje')?></div>
					               <?php 
					            }
					?>
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
			       	 	<input type="text" name="rut" class="form-control"  autofocus onblur="return Rut(form.rut.value)"/>
			  		</div>

			    	
    
   				 <input type="submit" value="Ingresar" class="btn btn-default" />
				  </fieldset>
				<?php echo form_close();?>
    		</div>
        </div>
    </div>
</div>
</div>