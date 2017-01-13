<!DOCTYPE html>
<html lang="en">
  <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">

      <title>Control Conductores</title>


     <link href="<?php echo base_url() ?>public/css/bootstrap.min.css" rel="stylesheet"> 
     <link href="<?php echo base_url() ?>public/css/app.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>public/vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>public/vendor/icheck/square/green.css" rel="stylesheet" type="text/css">
    <link href="<?php echo base_url() ?>public/css/loading.css" rel="stylesheet"> 
     <script src="<?php echo base_url() ?>public/js/loading.js"></script>
    
   
      <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
      <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
      <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
      <![endif]-->
  </head>
  <body onload="hideloader()">
  <div id="loading"></div>
    <!-- contenido -->

      <?php echo $content_for_layout; ?>

    <!-- contenido -->

    
    <script src="<?php echo base_url() ?>public/js/jquery-3.1.1.min.js"></script>
    <script src="<?php echo base_url() ?>public/js/bootstrap.min.js"></script> 
    <script src="<?php echo base_url() ?>public/js/funciones.js"></script>
    <script src="<?php echo base_url() ?>public/js/rut.js"></script>
    <script src="<?php echo base_url() ?>public/vendor/icheck/icheck.js"></script>

  
  </body>
</html>