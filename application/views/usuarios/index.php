

<div class="container-fluid">
	  <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">Usuarios <p class="pull-right">(<?php echo $cuantos?> registros)</p></h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
	  
	  
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



	
	<a href="<?php echo base_url() ?>usuarios/add" class="btn btn-primary"><i class="fa fa-plus-circle" aria-hidden="true"></i> Agregar Usuario</a>
	 
	  <br><br>
	  <!-- Table -->
	  <table class="table  table-condensed table-bordered table-hover">
	   	<thead>
            <tr>
                <th>Nombres</th>
                <th>Apellido Paterno</th>
                <th>Apellido Materno</th>
                <th>Rut</th>
                <th>Direccion</th>
                <th>Correo Electronico</th>
                <th>Perfil</th>
                <th>Empresa</th>
                <th>Creado</th>
                <th>Modificado</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
        	<?php foreach ($datos as $dato) { ?>
        	<tr>
        		<td><?php echo $dato->Nom ?></td>
        		<td><?php echo $dato->Apepaterno ?></td>
        		<td><?php echo $dato->Apematerno ?></td>
        		<td><?php echo $dato->Rut ?></td>
        		<td><?php echo $dato->Direccion ?></td>
        		<td><?php echo $dato->Correo ?></td>
            <td><?php echo $dato->Perfiles_Id ?></td>
            <td><?php echo $dato->Empresas_Id ?></td>
            <td><?php echo $dato->Create ?></td>
            <td><?php echo $dato->Modified ?></td>


        		<td>
        			<a class="btn btn-warning" href="<?php echo base_url() ?>usuarios/edit/<?php echo $dato->Id ?>/<?php echo $pagina ?>" aria-label="Editar">
  						<i class="fa fa-pencil-square-o" aria-hidden="true"></i>
					</a>	

					<a class="btn btn-danger" href="javascript:void(0);" onclick="eliminar('<?php echo base_url() ?>usuarios/delete/<?php echo $dato->Id ?>/<?php echo $pagina ?>')" aria-label="Eliminar">			<i class="fa fa-trash-o" aria-hidden="true"></i>
					</a>	
        		</td>
        	</tr>
        	<?php } ?>
        </tbody>
	  </table>
      <nav aria-label="Page navigation">
          <span class="pull-right"><?php echo $this->pagination->create_links() ?></span> 
      </nav>
      </div>
          
      </div>
      
 </div>
