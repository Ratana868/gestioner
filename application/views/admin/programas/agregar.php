<div class="content-wrapper">
	<section class="content-header">

	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
		          <div class="box-header with-border">
		            <h3 class="box-title">Agregar Programa de seguridad</h3>
		          </div><!-- /.box-header -->

		          <?
		            //$url= base_url().'sistemas/usuario/agregar';
		            $form = array('class' => 'form-horizontal');
		           ?>
		          <!-- form start -->
		          <?=form_open(base_url().'admin/programas/agregar/'. $id ,$form)?>
		          
		            <div class="box-body">
		              <? if(validation_errors()) { ?>
		              <div class="alert alert-danger alert-dismissable">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Error!</h4>
		                Por favor, verifique los campos requeridos o con error e intente nuevamente.
		              </div>
		              <? } ?>
		              <div class="form-group <?= form_error('fecha') ? 'has-error' : ''?>">
		                <label for="fecha" class="col-sm-2 control-label">Fecha de alta</label>
		                <div class="col-sm-10">
		                  <input id="fech" class="form-control" type="text" name="fecha" value="<?= set_value('fecha') ?>" data-date-format="dd/mm/yyyy">
		                </div>
		              </div>

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
		              <div class="form-group <?= form_error('responsable') ? 'has-error' : ''?>">
		                <label for="responsable" class="col-sm-2 control-label">Responsable</label>
		                <div class="col-sm-10">
		                  <input type="text" name="responsable" class="form-control" value="<?= set_value('responsable') ?>">
		                </div>
		              </div>
		              <div class="form-group <?= form_error('acciones') ? 'has-error' : ''?>">
		                <label for="acciones" class="col-sm-2 control-label">Acciones</label>
		                <div class="col-sm-10">
		                	<textarea name="acciones" placeholder="Descripcion..." rows="3" class="form-control"><?= set_value('acciones') ?></textarea>
		                </div>
		              </div>
		              <div class="form-group <?= form_error('id_frecuencia') ? 'has-error' : ''?>">
			                <label for="id_frecuencia" class="col-sm-2 control-label">Frecuencia</label>
			                <div class="col-sm-10">
			                  <select id="id_frecuencia" name="id_frecuencia" class="form-control">
			                    <option value="" <?= set_select('id_frecuencia', ''); ?>>Seleccionar Frecuencia...</option>
			                    <? foreach($frecuencias as $f) { ?>
			                    <option value="<?= $f->id ?>" <?= set_select('id_frecuencia', $f->id); ?>><?= strtoupper($f->frecuencia) ?></option>
			                    <? } ?>
			                  </select>
			                </div>
              		  </div>
		              <div class="form-group <?= form_error('observaciones') ? 'has-error' : ''?>">
		                <label for="observaciones" class="col-sm-2 control-label">Observaciones</label>
		                <div class="col-sm-10">
		                	<textarea name="observaciones" placeholder="Observaciones..." rows="3" class="form-control"><?= set_value('observaciones') ?></textarea>
		                </div>
		              </div>

		            </div>
		            <div class="box-footer">
		              <div class="row">
		                <div class="col-md-4 col-md-offset-2">
		                    <a href="<?php echo base_url() .'admin/programas/listado/'. $id ?>" class="btn btn-warning">Cancelar</a>
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