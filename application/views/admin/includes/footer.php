<!-- ./wrapper -->

<!-- jQuery 2.2.0 -->
<script src="<?php echo base_url() .'assets/plugins/jQuery/jQuery-2.2.0.min.js'?>"></script>
<!-- Bootstrap 3.3.6 -->
<script src="<?php echo base_url() .'assets/bootstrap/js/bootstrap.min.js'?>"></script>
<script src="<?php echo base_url() .'assets/plugins/datatables/jquery.dataTables.min.js'?>"></script>
<script src="<?php echo base_url() .'assets/plugins/datatables/dataTables.bootstrap.min.js'?>"></script>
<!-- Select2 -->
<script src="<?php echo base_url() .'assets/plugins/select2/select2.full.min.js'?>"></script>
<!-- InputMask -->
<script src="<?php echo base_url() .'assets/plugins/input-mask/jquery.inputmask.js'?>"></script>
<script src="<?php echo base_url() .'assets/plugins/input-mask/jquery.inputmask.date.extensions.js'?>"></script>
<script src="<?php echo base_url() .'assets/plugins/input-mask/jquery.inputmask.extensions.js'?>"></script>
<!-- date-range-picker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="<?php echo base_url() .'assets/plugins/daterangepicker/daterangepicker.js'?>"></script>
<!-- bootstrap datepicker -->
<script src="<?php echo base_url() .'assets/plugins/datepicker/bootstrap-datepicker.js'?>"></script>
<script src="<?php echo base_url() .'assets/plugins/datepicker/locales/bootstrap-datepicker.es.js'?>"></script>
<!-- bootstrap color picker -->
<script src="<?php echo base_url() .'assets/plugins/colorpicker/bootstrap-colorpicker.min.js'?>"></script>
<!-- bootstrap time picker -->
<script src="<?php echo base_url() .'assets/plugins/timepicker/bootstrap-timepicker.min.js'?>"></script>

<!-- SlimScroll 1.3.0 -->
<script src="<?php echo base_url() .'assets/plugins/slimScroll/jquery.slimscroll.min.js'?>"></script>
<!-- iCheck 1.0.1 -->
<script src="<?php echo base_url() .'assets/plugins/iCheck/icheck.min.js'?>"></script>
<!-- FastClick -->
<script src="<?php echo base_url() .'assets/plugins/fastclick/fastclick.js'?>"></script>
<!-- AdminLTE App -->
<script src="<?php echo base_url() .'assets/dist/js/app.min.js'?>"></script>
<!-- AdminLTE for demo purposes -->
<script src="<?php echo base_url() .'assets/dist/js/demo.js'?>"></script>
<!-- Page script -->
<script src="<?php echo base_url() .'assets/js/bootstrap-notify.min.js'?>"></script>
<script src="<?php echo base_url() .'assets/js/empresa.js'?>"></script>
<script src="<?php echo base_url() .'assets/js/notificar.js'?>"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $(".select2").select2();

    //Datemask dd/mm/yyyy
    $("#datemask").inputmask("dd/mm/yyyy", {"placeholder": "dd/mm/yyyy"});
    //Datemask2 mm/dd/yyyy
    $("#datemask2").inputmask("mm/dd/yyyy", {"placeholder": "mm/dd/yyyy"});
    //Money Euro
    $("[data-mask]").inputmask();

    //Date range picker
    $('#reservation').daterangepicker();
    //Date range picker with time picker
    $('#reservationtime').daterangepicker({timePicker: true, timePickerIncrement: 30, format: 'MM/DD/YYYY h:mm A'});
    //Date range as a button
    $('#daterange-btn').daterangepicker(
        {
          ranges: {
            'Today': [moment(), moment()],
            'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
            'Last 7 Days': [moment().subtract(6, 'days'), moment()],
            'Last 30 Days': [moment().subtract(29, 'days'), moment()],
            'This Month': [moment().startOf('month'), moment().endOf('month')],
            'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
          },
          startDate: moment().subtract(29, 'days'),
          endDate: moment()
        },
        function (start, end) {
          $('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'));
        }
    );

    //Date picker
    $('#datepicker').datepicker({
      autoclose: true
    });

    //iCheck for checkbox and radio inputs
    $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
      checkboxClass: 'icheckbox_minimal-blue',
      radioClass: 'iradio_minimal-blue'
    });
    //Red color scheme for iCheck
    $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
      checkboxClass: 'icheckbox_minimal-red',
      radioClass: 'iradio_minimal-red'
    });
    //Flat red color scheme for iCheck
    $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
      checkboxClass: 'icheckbox_flat-green',
      radioClass: 'iradio_flat-green'
    });

    //Colorpicker
    $(".my-colorpicker1").colorpicker();
    //color picker with addon
    $(".my-colorpicker2").colorpicker();

    //Timepicker
    $(".timepicker").timepicker({
      showInputs: false
    });

    $("#calendar").datepicker({
      language: 'es'
    });

    $('#fech').datepicker({
      autoclose: true,
      language: 'es'
    });
  });

  var url_pagina = "<?= base_url(); ?>";
  function get_localidad(id_provincia) {
           if (id_provincia != "") {
               $.ajax({
                   type: "POST",
                   url: "<?= base_url(); ?>admin/localidad/get_locali",
                   data: "id_provincia="+id_provincia,
                   success: function(html){
                       $("#localidad").html(html);                       
                       $("#field_localidad").css("display", "");
                   }
               });
           } else {
                $("#field_localidad").css("display", "none");
           }
  }
  function eliminar_empresa() {
      $.ajax({
          url: "<?= base_url(); ?>admin/empresa/eliminar/" + $('#id_empresa').val(),
          dataType: 'json'
      }).done(function(data) {
          window.top.location = "<?= base_url(); ?>admin/empresa";
      });
  }

    function eliminar_usuario() {
      $.ajax({
          url: "<?= base_url(); ?>admin/usuario/eliminar/" + $('#id_usuario').val(),
          dataType: 'json'
      }).done(function(data) {
          window.top.location = "<?= base_url(); ?>admin/usuario";
      });
  }
  function eliminar_tipo_programa() {
      $.ajax({
          url: "<?= base_url(); ?>admin/tipos_programas/eliminar/" + $('#id_programa').val(),
          dataType: 'json'
      }).done(function(data) {
          window.top.location = "<?= base_url(); ?>admin/tipos_programas";
      });
  }
  $(document).on("click", ".eliminarUsuario", function () {
      $('#id_usuario').val($(this).data('id'));
      $('#nombre').html($(this).data('nombre'));
  });

  $(document).on("click", ".eliminarTipoPrograma", function () {
      $('#id_programa').val($(this).data('id'));
      $('#programa').html($(this).data('tipo'));
  });


    $("#programar-capacitacion").submit(function(event){
      //$('#excavador').hide();
      $.ajax({
          url: "<?= base_url(); ?>admin/capacitaciones/agregar_programacion/" + $('#id_capacitacion').val(),
          type: "POST",
          data: $("#programar-capacitacion").serialize(),
          error: function(){
          alert("Error envio de datos");
          },
          success:function(data){
            //window.location.reload(true);
            window.top.location = '<?= base_url(); ?>admin/capacitaciones/programar/'+ $('#id_empresa').val() + '/'+$('#id_capacitacion').val();

            //window.top.location = '/localidad/panel/'+ $('#id_localidad').val();
            
          }
      });
     event.preventDefault();
     return false;
    });


</script>
</body>
</html>