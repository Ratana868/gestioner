<!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Usuarios
            
          </h1>
          <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
            <li>Administrador</li>
            <li class="active">Usuarios</li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <div class="row">
            <div class="col-xs-4">
              <a href="<?= base_url(); ?>admin/usuario/agregar" class="btn btn-block btn-primary btn-flat btn-md">Agregar Usuario</a><br />
            </div>
            <div class="col-xs-8"></div>
          </div>
           <!-- Main content -->
        
          <div class="row">
            <div class="col-xs-12">
              <div class="box">
                <div class="box-header">
                  <h3 class="box-title">Listado de Usuarios</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                      <tr>
                      	<th>Username</th>                        
                        <th>Nombre y Apellido</th>
                        <th>Mail</th>
                        <th>Acciones</th>                            
                      </tr>
                    </thead>
                    <tbody>
                      <?php  if(!empty($usuarios)){
                          foreach($usuarios as $data){ ?>
                            <tr>
                                <td><?php echo $data->username; ?></td>                                
                                <td><?php echo $data->nombre_apellido; ?></td>
                                <td><?php echo $data->mail; ?></td>                            
                                <td>
                                  <a href="<?= base_url(); ?>admin/usuario/editar/<?= $data->id ?>" class="btn btn-flat btn-success btn-xs">Editar</a>
                                  <button class="btn btn-flat btn-danger btn-xs eliminarUsuario" data-toggle="modal" data-id="<?= $data->id ?>" data-nombre="<?= $data->nombre_apellido ?>" data-target="#eliminar">Borrar</a>
                                </td>
                            </tr>

                       <?php   } 
                   }?>
                      
                    </tbody>                   
                  </table>
                </div><!-- /.box-body -->
              </div><!-- /.box -->
            </div>
          </div>

      <div class="modal fade" id="eliminar" role="dialog" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar"><span aria-hidden="true">×</span></button>
              <h4 class="modal-title">Eliminar Empresa</h4>
            </div>
            <div class="modal-body">
              <input type="hidden" id="id_usuario" value="" />
              <p>Está seguro que desea eliminar el usuario<span id="nombre"></span>?</p>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-default pull-left" data-dismiss="modal">Cancelar</button>
              <button type="button" class="btn btn-danger" onclick="eliminar_usuario();">Aceptar</button>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->

