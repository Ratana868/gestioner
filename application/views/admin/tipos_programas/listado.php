<div class="content-wrapper">    
    <section class="content-header">
      <h1>
        Programas de Seguridad
        <small></small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Programas de Seguridad</a></li>
        <li class="active">Tipos</li>
      </ol>
      <br>
      <div class="col-xs-6">
        <a href="<?php echo base_url() .'admin/tipos_programas/agregar'?>" class="btn btn-block btn-primary btn-flat btn-md">Agregar Tipo</a>
        <br>
      </div>
      
    </section>

    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">Tipos de Programas de Mantenimiento Preventivo</h3>
            </div>
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tbody>
                  <tr>
                    <th>#</th>
                    <th>Tipo</th>
                    <th>Descripcion</th>
                    <th>Acciones</th>
                  </tr>
                  <?php 
                      if(!empty($tipos)){ 
                        foreach($tipos as $data){ ?>
                      <tr>
                        <td> <?php echo $data->id; ?></td>
                        <td> <?php echo $data->tipo; ?></td>
                        <td> <?php echo $data->descripcion; ?></td>
                        <td>
                            <a href="<?php echo base_url() .'admin/tipos_programas/editar/'. $data->id ?>" class="btn btn-flat btn-success btn-xs">Editar</a>
                            <button class="btn btn-flat btn-danger btn-xs eliminarTipoPrograma" data-toggle="modal" data-id="<?= $data->id ?>" data-tipo="<?= $data->tipo ?>" data-target="#eliminar">Borrar</a>
                        </td>
                      </tr>


                  <?php
                    }
                   } ?>
                </tbody>
              </table>
            </div>
          </div>

        </div>


      </div>

      <div class="modal fade" id="eliminar" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Eliminar Tipo de programa</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_programa" value="" />
              <p>Está seguro que desea eliminar el tipo de programa <span id="programa"></span>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" onclick="eliminar_tipo_programa();">Aceptar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
    </section>


</div>