<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $nombre; ?></h1>
	</section>
	 <section class="content">
	 	<div class="row">
		 	<div class="col-md-8">
		 		<div class="box">
				 	<div class="box-header with-border">
				 		<h3 class="box-title">Programas de Mantenimiento</h3>
				 	</div>
				 	<div class="box-body">
				 		<a class="btn btn-app" href="<?php echo base_url() .'admin/programas/agregar/'. $id ?>"><i class="fa fa-plus-circle"></i>Agregar</a>
				 		<table class="table table-bordered">
				 			<thead>
				 				<tr>
				 					<th>#</th>
				 					<th>Fecha</th>
				 					<th>Nombre</th>
				 					<th>Tipo</th>
				 					<th>Frecuencia</th>
				 					<th>Avance</th>
				 					
				 				</tr>
				 			</thead>
				 			<tbody>
		                      <?php 
		                      if(!empty($program_seguridad)){ 
		                          foreach($program_seguridad as $data){ ?>
		                            <tr>
		                            	<td><?php echo $data->id ?></td>
		                                <td><?php echo $data->nombre; ?></td>
		                                <th><a type="button" class="btn btn-warning" href="<?php echo base_url() .'admin/empresa/panel/'. $data->id ?>">Administrar</a></th>

		                                <td><?php echo $data->responsable; ?></td>
		                                <td><?php echo $data->id_tipo; ?></td>
		                                <td><?php echo $data->provincia; ?></td>
                  		                <th><a type="button" class="btn btn-primary" href="<?php echo base_url() .'admin/programas/ver/'. $data->id ?>">Ver</a></th>

		                            </tr>

		                       <?php   
		                   			} 
		                   		}  ?>
				 			</tbody>

				 		</table>
				 	</div>
				 	<div class="box-footer">
				 	</div>
			 	</div>
		 	</div>
		 	<div class="col-md-4">
		 		<div class="box box-solid bg-green-gradient">
		 			<div class="box-header ui-sortable-handle">
		 				<i class="fa fa-calendar"></i>
		 				<h3 class="box-title">Calendario</h3>
		 			</div>
		 			<div class="box-body no-padding">
		 				<div id="calendar" class="fc fc-ltr fc-unthemed"></div>
		 			</div>
		 		</div>
		 	</div>


	 	</div>

	 </section>


</div>