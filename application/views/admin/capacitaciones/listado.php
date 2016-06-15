<div class="content-wrapper">
	<section class="content-header">
		<h1><?php echo $nombre; ?></h1>
	</section>
	 <section class="content">
	 	<div class="row">
		 	<div class="col-md-12">
		 		<div class="box">
				 	<div class="box-header with-border">
				 		<h3 class="box-title">CAPACITACIONES</h3>
				 	</div>
				 	<div class="box-body">
				 		<a class="btn btn-app" href="<?php echo base_url() .'admin/capacitaciones/agregar/'. $id ?>"><i class="fa fa-plus-circle"></i>Agregar</a>
				 		<table class="table table-bordered">
				 			<thead>
				 				<tr>
				 					<th>#</th>			 					
				 					<th>Tipo</th>
				 					<th>Alcance</th>
				 					<th>Responsable</th>
				 					<th>Programar</th>				 					
				 				</tr>
				 			</thead>
				 			<tbody>
		                      <?php 
		                      if(!empty($capacitacion)){ 
		                          foreach($capacitacion as $data){ ?>
		                            <tr>
		                            	<td><?php echo $data->id ?></td>		                                
		                                <td><?php echo $data->tipo ?></td>
		                                <td><?php echo $data->alcance; ?></td>
		                                <td><?php echo $data->responsable; ?></td>  
		                                <td><a href="<?php echo base_url() .'admin/capacitaciones/programar/'. $id .'/'.$data->id ?>"><button class="btn btn-primary">Programar Fecha</button></a></td>         
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



	 	</div>

	 </section>


</div>