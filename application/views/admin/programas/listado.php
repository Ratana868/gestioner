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
				 					<th>Tipo</th>
				 					<th>Frecuencia</th>
				 					<th>Responsable</th>				 					
				 				</tr>
				 			</thead>
				 			<tbody>
		                      <?php 
		                      if(!empty($program_seguridad)){ 
		                          foreach($program_seguridad as $data){ ?>
		                            <tr>
		                            	<td><?php echo $data->id ?></td>		                                
		                                <td><?php echo $data->fecha ?></td>
		                                <td><?php echo $data->tipo ?></td>
		                                <td><?php echo $data->frecuencia; ?></td>
		                                <td><?php echo $data->responsable; ?></td>                       
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