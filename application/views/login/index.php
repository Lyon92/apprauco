  
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
    
        <h2 class="form-signin-heading">Ingreso Administrador</h2>
        
        <label class="sr-only">Nombre de Usuario</label>
        <input type="text" class="form-control" name="user" autofocus>
        <br>
        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password"  name="pass" class="form-control">

        <div class="checkbox">
        
        </div>
        <button class="btn btn-lg btn-success btn-block" type="submit">Ingresar</button>
 
    


    </div>
<?php echo form_close(); ?>