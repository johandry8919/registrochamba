
(function ($) {
	$("#boton").click(function (e) {
        var centro_educ = $("#centro_educ").val();
        var id_instruccion = $("#id_instruccion").val();
        var id_estado_inst = $("#estudio").val();
        var titulo_carrera = $("#titulo_carrera").val();
        var id_area_form = $("#id_area_form").val();
        var rango_fecha = $("#reservation").val();
        var id_usu_aca = $("#id_usu_aca").val();
        var id_usuario = $("#id_usuario").val();
		
		
		e.preventDefault();

		if( centro_educ == "" || id_instruccion == "" || id_estado_inst == "" || titulo_carrera == "" || id_area_form == "" || rango_fecha == ""){
			
		

			if(centro_educ == ""){
				$("#centro_educ").css("border-color", "#FF0000");
				$( "#centro_educ" ).focus();
			}else{
				$("#centro_educ").css("border-color", "#ccc");
			}

			if(id_instruccion == ""){
				$("#id_instruccion").css("border-color", "#FF0000");
				$( "#id_instruccion" ).focus();
			}else{
				$("#id_instruccion").css("border-color", "#ccc");
			}

			if(titulo_carrera == ""){
				$("#titulo_carrera").css("border-color", "#FF0000");
				$( "#titulo_carrera" ).focus();
			}else{
				$("#titulo_carrera").css("border-color", "#ccc");
			}

			if(id_area_form == ""){
				$("#id_area_form").css("border-color", "#FF0000");
				$( "#id_area_form" ).focus();
			}else{
				$("#id_area_form").css("border-color", "#ccc");
			}



			
			return false
		}


		// si los campo son valido se envia el formulario

		
		// hacer post con ajax
		$.ajax({
			dataType: "json",
			url: base_url + "Cadmin/registroformacionacademica",
			type: "post",
			data: {
				centro_educ,
				id_instruccion,
				id_estado_inst,
				titulo_carrera,
				id_area_form,
				rango_fecha,
				id_usu_aca,
				id_usuario



			},
			success: function (respuesta) {
				if (respuesta.resultado == true) {
					console.log(respuesta);
					Swal.fire({
						title: 'Exito!',
						icon: "success",
						text: 'Se actualizo correctamente',
						showConfirmButton: false,
						timer: 2500,
						
					}).then(function () {
						window.location.href = base_url + "admin/editar_chambista/" + id_usuario;
						$("#tab13").removeClass("active");
					

						

						
					})
				} else {
					Swal.fire({
						icon: "error",
						title: "Oops...",
						text: respuesta.mensaje,
					});
				}
			},
			error: function (xhr, err) {
				console.log(err);
				alert("ocurrio un error intente de nuevo");
			},
		});
	});
	

	$("#centro_educ").on("keyup", function () {
		"use strict";
		var centro_educ = $(this).val();
		
	
		if (centro_educ) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#centro_educ").removeClass("is-valid").addClass("is-invalid");
		}
	});

	$("#id_instruccion").on("change", function () {
		"use strict";
		var id_instruccion = $(this).val();
		
		if (id_instruccion) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_instruccion").removeClass("is-valid").addClass("is-invalid");
		}
	}

	);
	$("#id_area_form").on("change", function () {
		"use strict";
		var id_area_form = $(this).val();
		
		if (id_area_form) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_area_form").removeClass("is-valid").addClass("is-invalid");
		}
	}

	);

	$("#titulo_carrera").on("keyup", function () {
		"use strict";
		var titulo_carrera = $(this).val();
		
		if (titulo_carrera) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#titulo_carrera").removeClass("is-valid").addClass("is-invalid");
		}	
	});


		

	

	
})(jQuery);


