$(function () { 
	$('#empresas').DataTable({
          "bPaginate": true,
          "bLengthChange": false,
          "bFilter": true,
          "bSort": true,
          "bInfo": true,
          "bAutoWidth": false,
          "language": {
          "url": "https://cdn.datatables.net/plug-ins/1.10.11/i18n/Spanish.json"
        	}
        }); 
});



  $(document).on("click", ".eliminarEmpresa", function () {
      $('#id_empresa').val($(this).data('id'));
      $('#nombre').html($(this).data('nombre'));
  });


