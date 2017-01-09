  
<?php echo form_open(null,array('name'=>'login')); ?>
<hr>
  <div class="container">
  	<?php
            if($this->session->flashdata('mensaje')!='')
            {
               ?>
               <div class="alert alert-<?php echo $this->session->flashdata('css')?>" role="alert" id="success-alert">
  				<button type="button" class="close" data-dismiss="alert" aria-label=""><span aria-hidden="true">&times;</span></button>
 				 <?php echo $this->session->flashdata('mensaje')?>
				</div>
          
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

        <div class="row">
            <div class="col-md-4 col-md-offset-4">
                <div class="login-panel panel panel-default">
                    <div class="panel-heading">
                        <h3 class="panel-title">Por favor ingrese su RUT</h3>
                    </div>
                    <div class="panel-body">
                        <form role="form">
                            <fieldset>
                                <div class="form-group">
                          
                                         
                <input type="text" class="form-control" id="rut" name="rut"  onblur="return Rut(form.rut.value)">
            </div>    

                              
                                <!-- Change this to a button or input when using this as a form -->
                               <button type="submit" class="btn btn-primary">Ingresar</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php echo form_close(); ?>