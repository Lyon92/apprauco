<div class="main">     

 <div class="container">
    <<div class="row logo">
        <div class="col-md-4 col-md-offset-4 text-center">   
            <img src="<?php echo base_url()?>public/img/logo.png" class="logoimg">
        </div>
    </div>

	<div class="row login">
        <div class="col-md-4 col-md-offset-4">
			<div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Ingrese Rut (sin puntos, ni guión)</h3> 
                    </div>
                 	<div class="panel-body">
                    <fieldset>
					<?php echo form_open(null,array('name'=>'form'));?>
					
				
   
			        <div class="form-group">
			       	 	<input type="text" name="rut" class="form-control"  autofocus placeholder="12323482-7" "/>
			  		</div>

			    	
    
   				 <input class="btn btn-lg btn-success btn-block" type="submit" value="Ingresar">
				  </fieldset>
				<?php echo form_close();?>
    		</div>
        </div>
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
    </div>
</div>
	
</div>
</div>

</div>