<div class="content-wrapper">
	<section class="content-header">

	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
		          <div class="box-header with-border">
		            <h3 class="box-title">Agregar Capacitación</h3>
		          </div><!-- /.box-header -->

		          <?
		            //$url= base_url().'sistemas/usuario/agregar';
		            $form = array('class' => 'form-horizontal');
		           ?>
		          <!-- form start -->
		          <?=form_open(base_url().'admin/capacitaciones/agregar/'. $id ,$form)?>
		          
		            <div class="box-body">
		              <? if(validation_errors()) { ?>
		              <div class="alert alert-danger alert-dismissable">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Error!</h4>
		                Por favor, verifique los campos requeridos o con error e intente nuevamente.
		              </div>
		              <? } ?>
		              <div class="form-group <?= form_error('id_empresa') ? 'has-error' : ''?>">
		                <label for="empresa" class="col-sm-2 control-label">Empresa</label>
		                <div class="col-sm-10">
		                  <input type="text" name="empresa" class="form-control" value="<?= set_value('empresa',$nombre ) ?>" readonly="readonly">
		                </div>
		              </div>
		              <div class="form-group <?= form_error('id_tipo') ? 'has-error' : ''?>">
			                <label for="id_tipo" class="col-sm-2 control-label">Tipo</label>
			                <div class="col-sm-10">
			                  <select id="id_tipo" name="id_tipo" class="form-control">
			                    <option value="" <?= set_select('id_tipo', ''); ?>>Seleccionar Tipo...</option>
			                    <? foreach($tipos as $t) { ?>
			                    <option value="<?= $t->id ?>" <?= set_select('id_tipo', $t->id); ?>><?= strtoupper($t->tipo) ?></option>
			                    <? } ?>
			                  </select>
			                </div>
              		  </div>
		              <div class="form-group <?= form_error('temas') ? 'has-error' : ''?>">
		                <label for="temas" class="col-sm-2 control-label">Temas</label>
		                <div class="col-sm-10">
		                	<textarea name="temas" rows="3" class="form-control"><?= set_value('temas') ?></textarea>
		                </div>
		              </div>
		              <div class="form-group <?= form_error('alcance') ? 'has-error' : ''?>">
		                <label for="alcance" class="col-sm-2 control-label">Alcance</label>
		                <div class="col-sm-10">
		                  <input type="text" name="alcance" class="form-control" value="<?= set_value('alcance') ?>">
		                </div>
		              </div>

		              <div class="form-group <?= form_error('responsable') ? 'has-error' : ''?>">
		                <label for="responsable" class="col-sm-2 control-label">Responsable</label>
		                <div class="col-sm-10">
		                  <input type="text" name="responsable" class="form-control" value="<?= set_value('responsable') ?>">
		                </div>
		              </div>
		              <div class="form-group <?= form_error('mail') ? 'has-error' : ''?>">
		                <label for="mail" class="col-sm-2 control-label">Email Responsable</label>
		                <div class="col-sm-10">
		                  <input type="email" name="mail" class="form-control" value="<?= set_value('mail') ?>">
		                </div>
		              </div>
		              <div class="form-group <?= form_error('costo') ? 'has-error' : ''?>">
		                <label for="costo" class="col-sm-2 control-label">Costo</label>
		                <div class="col-sm-10">
		                  <input type="text" name="costo" class="form-control" value="<?= set_value('costo') ?>">
		                </div>
		              </div>


		            </div>
		            <div class="box-footer">
		              <div class="row">
		                <div class="col-md-4 col-md-offset-2">
		                    <a href="<?php echo base_url() .'admin/capacitaciones/listado/'. $id ?>" class="btn btn-warning">Cancelar</a>
		                    <button type="submit" class="btn btn-primary">Guardar</button>
		                </div>
		              </div>  

		            <?=form_close()?>

		            </div>


				</div>
			</div>
		</div>
	</section>


</div>