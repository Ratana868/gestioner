 <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Empresas
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>Empresas</li>
            
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-2">
            <a href="<?php echo base_url() .'admin/empresa/agregar'?>" class="btn btn-block btn-primary btn-flat btn-md">Agregar Empresa</a><br />
            </div>
          </div>
           <!-- Main content -->
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Empresas</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="empresas" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                        <th>Nombre</th>
                        <th><i class="fa fa-calendar"></i></th>
                        <th>Programas de seguridad</th>
                        <th>Capacitaciones</th>
                        <th>Responsable General</th>
                        <th>Localidad</th>
                        <th>Provincia</th>
                        <th>Acciones</th>           
                                      
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
                      if(!empty($empresas)){ 
                          foreach($empresas as $data){ ?>
                            <tr>
                                <td><?php echo $data->nombre; ?></td>
                                <th><a type="button" class="btn btn-warning" href="<?php echo base_url() .'admin/empresa/panel/'. $data->id ?>">Calendario</a></th>
                                <th><a type="button" class="btn btn-primary" href="<?php echo base_url() .'admin/programas/listado/'. $data->id ?>">Listado</a></th>
                                <th><a type="button" class="btn btn-success" href="<?php echo base_url() .'admin/capacitaciones/listado/'. $data->id ?>">Listado</a></th>
                                <td><?php echo $data->responsable; ?></td>
                                <td><?php echo $data->localidad; ?></td>
                                <td><?php echo $data->provincia; ?></td>

                                <td>
                                    <a href="<?php echo base_url() .'admin/empresa/editar/'. $data->id ?>" class="btn btn-flat btn-success btn-xs">Editar</a>
                                    <button class="btn btn-flat btn-danger btn-xs eliminarEmpresa" data-toggle="modal" data-id="<?= $data->id ?>" data-nombre="<?= $data->nombre ?>" data-target="#eliminar">Borrar</a>
                                </td>
                            </tr>

                       <?php   
                   			} 
                   		}  ?>
                      
                    </tbody>
                    
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
      <div class="modal fade" id="eliminar" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Eliminar Empresa</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_empresa" value="" />
              <p>Está seguro que desea eliminar empresa <span id="nombre"></span>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" onclick="eliminar_empresa();">Aceptar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>
        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->