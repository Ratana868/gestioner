<div class="content-wrapper">
	<section class="content-header">
		<h1>PROGRAMAR CAPACITACION - <small><?php echo $nombre; ?></small></h1>



	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-default">
					<div class="box-header with-border">
					  <div class="row">
					  	<div class="col-xs-12">
						  	<i class="fa fa-book"></i>
	                      	<h3 class="box-title"><?php echo $tipo; ?></h3>

					  	</div>

					  </div>
					  <br>
					  <div class="row">

					  	<div class="col-md-3">
							<h4>Alcance: <small><?php echo $alcance; ?> </small></h4>
						</div>
						<div class="col-md-3">
							<h4>Temas: <small><?php echo $temas; ?> </small></h4>
						</div>
						<div class="col-md-3">
							<h4>Responsable: <small><?php echo $responsable; ?> - <?php echo $mail_responsable; ?> </small></h4>
						</div>
						<div class="col-md-3">
							<h4>Costo: <small><?php echo $costo; ?> </small></h4>
						</div>


					  </div>
					  

					</div>
					<div class="box-body">

						<div class="col-xs-12">
		          <?
		            //$url= base_url().'sistemas/usuario/agregar';
		            $form = array('class' => 'form-horizontal','role' => 'form','id' => 'programar-capacitacion');
		           ?>
					  
				          <?=form_open('',$form)?>
				          
				              <div class="form-group <?= form_error('fecha') ? 'has-error' : ''?>">
				                <label>Fecha</label>
				                <div class="input-group date">
				                  <div class="input-group-addon">
				                    <i class="fa fa-calendar"></i>
				                  </div>
				                  <input type="text" id="fech" name="fecha" class="form-control pull-right" data-date-format="dd/mm/yyyy" value="<?= set_value('fecha') ?>">
                				</div>                       
				              </div>
		     				  <div class="form-group">
		     				  	<label>Estado</label>
				                  <select id="id_estado" name="id_estado" class="form-control">
				                    <option value="" <?= set_select('id_estado', ''); ?>>Seleccionar Estado...</option>
				                    <? foreach($estados as $t) { ?>
				                    <option value="<?= $t->id ?>" <?= set_select('id_estado', $t->id); ?>><?= strtoupper($t->tipo) ?></option>
				                    <? } ?>
				                  </select>
		     				  </div>
						      <div class="form-group">
		         				<label for="inputEmail">Observaciones</label>
		         				<textarea name="observaciones" type="text" class="form-control"  rows="3"></textarea>
		     				  </div>
		     				    <input id="id_capacitacion" type="hidden" value="<?php echo $id; ?>" name="id_capacitacion">
								<input id="id_empresa" type="hidden" value="<?php echo $id_empresa; ?>" name="id_empresa">


		     				  <div class="box-footer">
		     				  	<button type="submit" class="btn btn-success">Guardar</button>
		     				  </div>

				          <?=form_close()?>


						</div>




					  


					</div>

				</div>

				<div class="box box-success">
					<div class="box-header with-border">
					</div>
					<div class="box-body">
						<table class="table table-hover">
							<thead>
								<tr>
									<th>Fecha</th>
									<th>Estado</th>
									<th>Observaciones</th>
									<th>Acciones</th>
								</tr>

							</thead>
							<tbody>
							<?php
		                      if(!empty($programacion_capac)){ 
		                          foreach($programacion_capac as $data){ ?>
		                          <tr>
		                          	<td><?php echo $data->fecha; ?></td>
		                          	<td><span class="badge <?= ($data->id_estado == "1") ? "bg-yellow" : "bg-green" ?>"><?php echo $data->tipo; ?></span></td>
		                          	<td><?php echo $data->observaciones; ?></td>
		                          	<td>
		                          		<a class="btn bg-olive btn-flat notificar-mail" data-mail="<?php echo $mail_responsable; ?>" data-toggle="modal" data-target="#notificar">Notificar</a>
		                          		<a class="btn bg-navy btn-flat" data-toggle="modal" data-target="#ver-programacion">Ver</a>
		                          	</td>
		                          </tr>



		                  	
		                  	<?php   
		                   			} 
		                   		}  ?>


							</tbody>

						</table>

					</div>

				</div>

				



			</div>
		</div>
              <!-- /.Modal-Editarpersonal-->
                <div class="modal fade" id="ver-programacion" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Ver Programación</h4>
                      </div>
                      

                          <div id="id_personal">
                            
                          </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
                        </div>
                      
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>

                <div class="modal fade" id="notificar" role="dialog" tabindex="-1">
                  <div class="modal-dialog">
                    <div class="modal-content panel-info">
                      <div class="modal-header panel-heading">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
                        <h4 class="modal-title">Notificar</h4>
                      </div>
                      <div class="modal-body">
 						<form role="form" id="enviar-mail">
 							<div class="form-group">
                    			<label for="exampleInputEmail1">Email</label>
                      			<input type="email" placeholder="Ingresar email" id="exampleInputEmail1" class="form-control">
                  			</div>
		     				<input id="id_capacitacion" type="hidden" value="<?php echo $id; ?>" name="id_capacitacion">
							<input id="id_empresa" type="hidden" value="<?php echo $id_empresa; ?>" name="id_empresa">
                      </div>                    
	                  <div class="modal-footer">
	                          <button type="button" class="btn btn-default" data-dismiss="modal">Cancelar</button>
	                          <button type="submit" class="btn btn-primary">Enviar Notificación</button>
	                  </div>
                        </form>
                      
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div>


	</section>

</div>