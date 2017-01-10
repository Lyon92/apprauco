<div class="main">     
    <div class="container">
    <div class="row logo">
        <div class="col-md-4 col-md-offset-4 text-center">   
            <img src="<?php echo base_url()?>public/img/logo.png" class="logoimg">
        </div>
    </div>
 
    <div class="row login">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title text-center">Registro de llegada Condutores</h3>
                </div>
                <div class="panel-body">
                    <?php echo form_open(null,array('name'=>'login')); ?>
                    <fieldset>
                        <div class="form-group">
                            <input class="form-control" placeholder="Usuario" name="user" type="text">
                        </div>
                        <div class="form-group">
                            <input class="form-control" placeholder="Password" name="pass" type="password" value="">
                        </div>
                        <div class="checkbox">
                            <label>
                                <input name="remember" type="checkbox" value=" Recordarme"> Recordarme
                            </label>
                        </div>
                        <input class="btn btn-lg btn-success btn-block" type="submit" value="Ingresar">
                    </fieldset>
                   <?php echo form_close(); ?>
                </div> 
            </div>          
        </div>
    </div>
    <div class="row ">
        <div class="col-md-4 col-md-offset-4">   
               <?php
                    //acá visualizamos los mensajes de error
                    $errors=validation_errors('<li>','</li>');
                    if($errors!=""){ ?>
                        <div class="alert alert-warning">
                            <ul>
                                <?php echo $errors;?>
                            </ul>
                        </div>
                <?php  } ?>       
        </div>
    </div>
</div>











              
                 
                   
          




