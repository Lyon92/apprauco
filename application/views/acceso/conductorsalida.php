<div class="container-fluid">
        <div class="row min-line">
        <div class="col-xs-12 text-right"><i class="fa fa-phone-square" aria-hidden="true"></i> Mesa de Ayuda TIC : <b>7777</b></div>
        </div>
      </div>
      <!-- Barra Mesa de Ayuda TIC-->
      
       <!-- Menu APLICACION-->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#"><img  class="img-responsive logo" src="<?php echo base_url() ?>/public/img/logo.png"></a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        
             <ul class="nav navbar-nav navbar-right">                          
                <li><a href="<?php echo base_url()?>acceso/salir" ><i class="fa fa-sign-out" aria-hidden="true"></i> Salir</a></li>
             </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
      </nav>
       <!-- Menu APLICACION-->

    

	  <!-- BARRA DATOS TIENDA y FECHA-->
      <div class="container-fluid">
        <div class="row min-line-green">
          <div class="col-xs-4"><i class="fa fa-user" aria-hidden="true"></i> <?php echo $this->session->userdata('Nombre')." ".$this->session->userdata('Apellido')?> </div>
          <div class="col-xs-8 text-right"><?php echo $this->session->userdata('rut')?> </div>
        </div> 
      </div>
      <!-- BARRA DATOS TIENDA y FECHA-->
  <div class="container">
  <div class="row m-top">
    <div class="col-xs-6 col-xs-offset-3">
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
  </div>
  </div>
</div>

 <div class="container">

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
			
	
		<div class="row">
			<div class="col-xs-6 col-xs-offset-3">


			<div class="form-group text-center"> 
        <div class=" ">
            <input type="checkbox" name="salida1" id="bandeja1" value="1" <?php echo set_checkbox('salida1','1'); ?>>
            <label for="bandeja1">Retiro de Bandejas</label>
        </div><br>

        <div class="">
          <input type="checkbox" name="salida2" id="bandeja2" value="1" <?php echo set_checkbox('salida2','1'); ?>>
         <label for="bandeja2">Retiro de Devoluciones</label>
        </div>    <br>

        <div class="">
          <input type="checkbox" name="salida3" id="bandeja3" value="1" <?php echo set_checkbox('salida3','1'); ?>>
         <label for="bandeja3">No hay Retiro</label>
        </div>    
      </div>                 
            
            <div class="form-group"> <!-- Submit Button -->
                <button type="submit" class="btn btn-danger btn-block">Registrar Salida</button>
             </div>     
        </div>
		</div>
       <?php echo form_close(); ?>

	  </div>
</div>

