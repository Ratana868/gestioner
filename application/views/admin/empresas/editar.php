
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <h1>
      Empresas
    </h1>
    <ol class="breadcrumb">
      <li><a href="<?= base_url(); ?>admin/empresa"><i class="fa fa-list-alt"></i> Empresas</a></li>
      <li class="active">Editar</li>
    </ol>
  </section>

  <!-- Main content -->
  <section class="content">
    <div class="row">
      <div class="col-xs-12">
        <!-- Horizontal Form -->
        <div class="box box-primary">
          <div class="box-header with-border">
            <h3 class="box-title">Editar</h3>
          </div><!-- /.box-header -->
          <br />
          <?
            //$url= base_url().'sistemas/usuario/agregar';
            $form = array('class' => 'form-horizontal');
           ?>
          <!-- form start -->
          <?=form_open(base_url().'admin/empresa/editar/'. $id_empresa,$form)?>
          
            <div class="box-body">
              <? if(validation_errors()) { ?>
              <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-ban"></i> Error!</h4>
                Por favor, verifique los campos requeridos o con error e intente nuevamente.
              </div>
              <? } ?>

              <div class="form-group <?= form_error('nombre') ? 'has-error' : ''?>">
                <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                <div class="col-sm-10">
                  <input type="text" name="nombre" class="form-control" placeholder="Nombre Empresa" value="<?= set_value('nombre',$nombre) ?>">
                </div>
              </div>
              <div class="form-group <?= form_error('username') ? 'has-error' : ''?>">
                <label for="responsable" class="col-sm-2 control-label">Responsable</label>
                <div class="col-sm-10">
                  <input type="text" name="responsable" class="form-control" placeholder="Responsable" value="<?= set_value('responsable',$responsable) ?>">
                </div>
                <div class="col-md-10 col-md-offset-2">
                  <?php echo form_error('responsable'); ?>
                </div>                
              </div>
              <div class="form-group <?= form_error('id_provincia') ? 'has-error' : ''?>">
                <label for="id_provincia" class="col-sm-2 control-label">Provincia</label>
                <div class="col-sm-10">
                  <select id="id_provincia" name="id_provincia" class="form-control" onchange="get_localidad(this.value)">
                    <option value="" <?= set_select('id_provincia', ''); ?>>Seleccionar Provincia</option>
                    <? foreach($provincias as $p) { ?>
                    <option value="<?= set_value("id_provincia", $p->id); ?>" <?= ($id_provincia == $p->id) ? "selected" : "" ?>><?= $p->provincia; ?></option>
                    <? } ?>
                  </select>
                </div>
              </div>
              <div id="field_localidad">
                <div class="form-group <?= form_error('id_localidad') ? 'has-error' : ''?>">
                  <label for="id_localidad" class="col-sm-2 control-label">Localidad</label>
                  <div class="col-sm-10">
                    <select id="localidad" name="id_localidad" class="form-control">
                      <option value="" <?= set_select('id_localidad', ''); ?>>Seleccionar Localidad</option>
                      <? 
                      foreach($localid as $locali) { ?>
                      <option value="<?= set_value("id_localidad", $locali->id); ?>" <?= ($id_localidad == $locali->id) ? "selected" : "" ?>><?= $locali->localidad; ?></option>
                      <? } ?>
                    </select>
                  </div>
                </div>
              </div>
              <div class="form-group <?= form_error('username') ? 'has-error' : ''?>">
                <label for="direccion" class="col-sm-2 control-label">Direccion</label>
                <div class="col-sm-10">
                  <input type="text" name="direccion" class="form-control" placeholder="Direccion" value="<?= set_value('direccion',$direccion) ?>">
                </div>
                <div class="col-md-10 col-md-offset-2">
                  <?php echo form_error('direccion'); ?>
                </div>
                
              </div>

              <div class="form-group <?= form_error('cuit') ? 'has-error' : ''?>">
                <label for="cuit" class="col-sm-2 control-label">CUIT</label>
                <div class="col-sm-10">
                  <input type="text" name="cuit" class="form-control" placeholder="CUIT" value="<?= set_value('cuit',$cuit) ?>">
                </div>
              </div>

              <div class="form-group <?= form_error('descripcion') ? 'has-error' : ''?>">
                <label for="descripcion" class="col-sm-2 control-label">Descripcion</label>
                <div class="col-sm-10">
                  <textarea class="form-control" placeholder="Breve descripción de la empresa..." name="descripcion" value="<?= set_value('descripcion', $descripcion) ?>" rows="4"><?= set_value('descripcion', $descripcion) ?></textarea>
                </div>
              </div>

            </div><!-- /.box-body -->
            <div class="box-footer">
              <div class="row">
                <div class="col-md-4 col-md-offset-2">
                    <a href="<?php echo base_url() .'admin/empresa'?>" class="btn btn-warning">Cancelar</a>
                    <button type="submit" class="btn btn-primary">Actualizar</button>
                </div>
              </div>              
            </div><!-- /.box-footer -->
          <?=form_close()?>
        </div><!-- /.box -->

        
      </div>
    </div>
  </section><!-- /.content -->
</div><!-- /.content-wrapper -->