
<div class="container">
	<div class="row">
	<br><br>
		<div class="col-xs-10 col-xs-offset-1">
			<div class="well">
				<center>
				

					<h1>Resumen de Entrega</h1>
					<hr>
					<h3>Hora de llegada del Conductor</h3>	
			

					<p><?php echo $HoraLlegada  ?> </p>
		

					<h3>El Conductor Entrego los siguientes Items</h3>

					
					<?php echo $Entrega ?>
	
	
					<h3>El Conductor indica que retiro de tienda</h3>

					<?php echo $Retiro ?>

					
					<h3>Hora en que se retira el conductor</h3>

					<?php echo $HoraSalida ?>
					
					
					<h3>Tiempo transcurrido en la entrega</h3>		

					<?php echo $TiempoEnTienda ?>
					
					<h3>Otro Dato</h3>		

					<?php echo $LLegada ?>
					<h3>Otro Dato</h3>		

					<?php echo $Tienda ?>
				<hr>

				 <div class="form-group"> <!-- Submit Button -->
         			<a href="<?php base_url() ?>validacion/acepta" class="btn btn-success">Acepta</a> 
         			<a href="<?php base_url() ?>validacion/noacepta" class="btn btn-danger">No Acepta</a> 
       			 </div>     

				</center>

			</div>
		</div>
	</div>
</div>
