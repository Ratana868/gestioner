<div class="content-wrapper">
	<section class="content-header">

	</section>
	<section class="content">
		<div class="row">
			<div class="col-xs-12">
				<div class="box box-primary">
		          <div class="box-header with-border">
		            <h3 class="box-title">Agregar Tipo de Programa de seguridad</h3>
		          </div><!-- /.box-header -->

		          <?
		            //$url= base_url().'sistemas/usuario/agregar';
		            $form = array('class' => 'form-horizontal');
		           ?>
		          <!-- form start -->
		          <?=form_open(base_url().'admin/tipos_programas/agregar',$form)?>
		          
		            <div class="box-body">
		              <? if(validation_errors()) { ?>
		              <div class="alert alert-danger alert-dismissable">
		                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
		                <h4><i class="icon fa fa-ban"></i> Error!</h4>
		                Por favor, verifique los campos requeridos o con error e intente nuevamente.
		              </div>
		              <? } ?>

		              <div class="form-group <?= form_error('tipo') ? 'has-error' : ''?>">
		                <label for="tipo" class="col-sm-2 control-label">Tipo</label>
		                <div class="col-sm-10">
		                  <input type="text" name="tipo" class="form-control" placeholder="Tipo" value="<?= set_value('tipo') ?>">
		                </div>
		              </div>
		              <div class="form-group <?= form_error('descripcion') ? 'has-error' : ''?>">
		                <label for="tipo" class="col-sm-2 control-label">Descripcion</label>
		                <div class="col-sm-10">
		                	<textarea name="descripcion" placeholder="Descripcion" rows="3" class="form-control"><?= set_value('descripcion') ?></textarea>
		                </div>
		              </div>


		            </div>
		            <div class="box-footer">
		              <div class="row">
		                <div class="col-md-4 col-md-offset-2">
		                    <a href="<?php echo base_url() .'admin/tipos_programas'?>" class="btn btn-warning">Cancelar</a>
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