$(function() {
    $("button[data-image]").click(function(e){
        e.preventDefault();
        var imageTarget = $(this).attr("data-image");
        $(`#${imageTarget}`).toggle();
    })

    $('#form-alta-actor').on('submit',function(event){
		event.preventDefault();
		event.stopPropagation();
		
		//este me levanta los datos
		var nombre = $('#form-alta-actor input[name="nombre"]').val();
		var apellido = $('#form-alta-actor input[name="apellido"]').val();
		var nacionalidad = $('#form-alta-actor input[name="nacionalidad"]').val();
		var descripcion = $('#form-alta-actor textarea[name="descripcion"]').val();

		var datos = {nombre:nombre,apellido:apellido,nacionalidad:nacionalidad,descripcion:descripcion}
		console.log(datos);

		$.post('abm_actor.php',datos,function(respuesta){
		
			console.log(respuesta);	

			if(respuesta.success){
				Swal.fire(
				  'Exito!',
				  'Se ha agregado el actor correctamente!',
				  'success'
				).then(function(){
					$('#form-alta-actor').trigger('reset');
					location.href = `actor.php?id=${respuesta.metadata}`
				});

			} else {
				Swal.fire(
					'Ups..',
					respuesta.metadata,
					'error'
				);
			}
		})
			
	});

    $("#btn-data").click(function(){
        $("#data-user").fadeToggle();
    });
})
