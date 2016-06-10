    
<div class="content-wrapper">    
    <section class="content-header">
      <h1>
        <?php 
        
       echo strtoupper($nombre); 
     ?> - <small> Responsable: <?php echo $responsable; ?></small> </h1>

     <h5> <?php echo $descripcion; ?></h5>
        
      
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="#">Empresa</a></li>
        <li class="active">Panel</li>
      </ol>
    </section>

    <section class="content">
      <div class="row">
        <section class="col-lg-7 connectedSortable ui-sortable">
          <div class="box box-solid bg-warning-gradient">
            <div class="box-header ui-sortable-handle">
              <i class="fa fa-calendar"></i>
              <h3 class="box-title">Calendario</h3>
              <div class="pull-right box-tools">
                <!-- button with a dropdown -->
                <div class="btn-group">
                  <button type="button" class="btn btn-success btn-sm dropdown-toggle" data-toggle="dropdown">
                    <i class="fa fa-bars"></i></button>
                  <ul class="dropdown-menu pull-right" role="menu">
                    <li><a href="#">Add new event</a></li>
                    <li><a href="#">Clear events</a></li>
                    <li class="divider"></li>
                    <li><a href="#">View calendar</a></li>
                  </ul>
                </div>
                <button type="button" class="btn btn-success btn-sm" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-success btn-sm" data-widget="remove"><i class="fa fa-times"></i>
                </button>
              </div>
              <!-- /. tools -->
            </div>
            <div class="box-body no-padding">
              <!--The calendar -->
              <div id="calendar" style="width: 100%"></div>
            </div>
          </div>
        </section>
      </div>


    </section>

</div>