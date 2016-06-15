$(document).ready(function() {

	  $("#enviar-mail").submit(function(event){

	  	 var baseURL = $('body').data('baseurl');

	      $.ajax({
	          url: baseURL+'admin/capacitaciones/enviar_notificacion',
	          type: "POST",
	          data: $("#enviar-mail").serialize(),
	          error: function(){
	          	$("#notificar").modal('hide');
	          	$.notify({	// options
					message: 'Ocurrió un error al enviar la Notificación. Intente nuevamente más tarde' 
				},{
				// settings
				type: 'danger'
				});
	          },
	          success: function(data){
	          	$("#notificar").modal('hide');
	          	$.notify({	// options
					message: 'Notificación enviada correctamente' 
				},{
				// settings
				type: 'success'
				});
		      }
	      });


     event.preventDefault();
     return false;

    });

  $(document).on("click", ".notificar-mail", function () {
      $('#exampleInputEmail1').val($(this).data('mail'));      
  });
});