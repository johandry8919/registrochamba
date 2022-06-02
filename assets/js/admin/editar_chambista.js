(function ($) {
	$("#buton").click(function (e) {
		
		var nom = $("#nombres").val();
        var ape = $("#apellidos").val();
        var datepicker=$("#datepicker").val();
		var $id_usuario = $("#id_usuario").val();
		var $telf_cel = $("#telf_movil").val();
		var $telf_local = $("#telf_local").val();
		var $cod_estado = $("#cod_estado").val();
		var $codigomunicipio = $("#cod_municipio").val();
		var $codigoparroquia = $("#cod_parroquia").val();
		var $direccion = $("#direccion").val();
		var $estudio = $("#estudio").val();
		var $empleo = $("#empleo").val();
		var $id_movimiento_religioso = $("#id_movimiento_religioso").val();
		var $id_movimiento_sociales = $("#id_movimiento_sociales").val();
		var latitud = $("#latitud").val();
		var longitud = $("#longitud").val();
		var cne = $("#cne").val();
		var genero = $("#genero").val();
		var estcivil = $("#estcivil").val();
		var aborigen = $("#aborigen").val();
		var hijo = $("#hijo").val();
		var id_profesion_oficio = $("#id_profesion_oficio").val();
		var edad = $("#edad").val();
		e.preventDefault();

		if(nom == '' || ape == '' || datepicker == '' || $telf_cel == '' || $telf_local == '' || $cod_estado == '' || $codigomunicipio == '' || $codigoparroquia == '' || $direccion == '' || $estudio == '' || $empleo == '' || $id_movimiento_religioso == '' || $id_movimiento_sociales == '' || latitud == '' || longitud == '' || cne == '' || genero == '' || estcivil == '' || aborigen == '' || hijo == '' || id_profesion_oficio == '' || edad == '') {

			if(nom == ''){
				$("#nombres").css("border-color", "#FF0000");
				$( "#nombres" ).focus();
			}else{
				$("#nombres").css("border-color", "#ccc");
			}
			if(ape == ''){
				$("#apellidos").css("border-color", "#FF0000");
				$( "#apellidos" ).focus();
			}else{
				$("#apellidos").css("border-color", "#ccc");
			}
			if(datepicker == ''){
				$("#datepicker").css("border-color", "#FF0000");
				$( "#datepicker" ).focus();

			}else{
				$("#datepicker").css("border-color", "#ccc");
			}
			if($telf_cel == ''){
				$("#telf_movil").css("border-color", "#FF0000");
				$( "#telf_movil" ).focus();
			}else{
				$("#telf_movil").css("border-color", "#ccc");
			}
			if($telf_local == ''){
				$("#telf_local").css("border-color", "#FF0000");
				$( "#telf_local" ).focus();
			}else{
				$("#telf_local").css("border-color", "#ccc");
			}
			if($cod_estado == ''){
				$("#cod_estado").css("border-color", "#FF0000");
				$( "#cod_estado" ).focus();
			}else{
				$("#cod_estado").css("border-color", "#ccc");
			}
			if($codigomunicipio == ''){
				$("#cod_municipio").css("border-color", "#FF0000");
				$( "#cod_municipio" ).focus();
			}else{
				$("#cod_municipio").css("border-color", "#ccc");
			}
			if($codigoparroquia == ''){
				$("#cod_parroquia").css("border-color", "#FF0000");
				$( "#cod_parroquia" ).focus();
			}else{
				$("#cod_parroquia").css("border-color", "#ccc");
			}
			if($direccion == ''){
				$("#direccion").css("border-color", "#FF0000");
				$( "#direccion" ).focus();
			}else{
				$("#direccion").css("border-color", "#ccc");
			}
			if($estudio == ''){
				$("#estudio").css("border-color", "#FF0000");
				$( "#estudio" ).focus();
			}else{
				$("#estudio").css("border-color", "#ccc");
			}
			if($empleo == ''){
				$("#empleo").css("border-color", "#FF0000");
				$( "#empleo" ).focus();
			}else{
				$("#empleo").css("border-color", "#ccc");
			}
			if($id_movimiento_religioso == ''){
				$("#id_movimiento_religioso").css("border-color", "#FF0000");
				$( "#id_movimiento_religioso" ).focus();
			}else{
				$("#id_movimiento_religioso").css("border-color", "#ccc");
			}
			if($id_movimiento_sociales == ''){
				$("#id_movimiento_sociales").css("border-color", "#FF0000");
				$( "#id_movimiento_sociales" ).focus();
			}else{
				$("#id_movimiento_sociales").css("border-color", "#ccc");
			}
			if(latitud == ''){
				$("#latitud").css("border-color", "#FF0000");
				$( "#latitud" ).focus();
			}else{
				$("#latitud").css("border-color", "#ccc");
			}
			if(longitud == ''){
				$("#longitud").css("border-color", "#FF0000");
				$( "#longitud" ).focus();
			}else{
				$("#longitud").css("border-color", "#ccc");
			}
			if(cne == ''){
				$("#cne").css("border-color", "#FF0000");
				$( "#cne" ).focus();
			}else{
				$("#cne").css("border-color", "#ccc");
			}
			if(estcivil == ''){
				$("#estcivil").css("border-color", "#FF0000");
				$( "#estcivil" ).focus();
			}else{
				$("#estcivil").css("border-color", "#ccc");
			}



			

			
			return false
		}else{


		// si los campo son valido se envia el formulario

		
		// hacer post con ajax
		$.ajax({
			dataType: "json",
			url: base_url + "Cadmin/update_chambistas",
			type: "post",
			data: {
				nombres: nom,
				apellidos: ape,
				datepicker: datepicker,
				id_usuario: $id_usuario,
				telf_local: $telf_local,
				cod_estado: $cod_estado,
				telf_movil: $telf_cel,
				cod_municipio:$codigomunicipio,
				cod_parroquia:$codigoparroquia,
				direccion:$direccion,
				estudio:$estudio,
				empleo:$empleo,
				id_movimiento_religioso:$id_movimiento_religioso,
				id_movimiento_sociales:$id_movimiento_sociales,
				latitud:latitud,
				longitud:longitud,
				cne:cne,
				genero:genero,
				estcivil:estcivil,
				aborigen:aborigen,
				hijo:hijo,
				id_profesion_oficio:id_profesion_oficio,
				edad:edad



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
						window.location.href = base_url + "admin/chambista/buscar";
					

						

						
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
		
	$("#nombres").on("keyup", function () {
		"use strict";
		var nombres = $(this).val();
		
	
		if (nombres) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#nombres").removeClass("is-valid").addClass("is-invalid");
		}
	});

	$("#apellidos").on("keyup", function () {
		"use strict";
		var apellidos = $(this).val();
		
		if (apellidos) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#apellidos").removeClass("is-valid").addClass("is-invalid");
		}
	}

	);

	$("#datepicker").on("keyup", function () {
		"use strict";
		var datepicker = $(this).val();
		
		if (datepicker) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#datepicker").removeClass("is-valid").addClass("is-invalid");
		}	
	});

	$("#telf_movil ").on("keyup", function () {
		"use strict";
		var telf_movil = $(this).val();
		
		if (telf_movil) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#telf_movil").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#edad ").on("keyup", function () {
		"use strict";
		var edad = $(this).val();
		
		if (edad) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#edad").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#estcivil ").on("change", function () {
		"use strict";
		var estcivil = $(this).val();
		
		if (estcivil) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#estcivil").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#id_movimiento_religioso").on("change", function () {
		"use strict";
		var id_movimiento_religioso = $(this).val();
		
		if (id_movimiento_religioso) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_movimiento_religioso").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#aborigen").on("change", function () {
		"use strict";
		var aborigen = $(this).val();
		
		if (aborigen) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#aborigen").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#id_movimiento_sociales").on("change", function () {
		"use strict";
		var id_movimiento_sociales = $(this).val();
		
		if (id_movimiento_sociales) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_movimiento_sociales").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#id_profesion_oficio").on("change", function () {
		"use strict";
		var id_profesion_oficio = $(this).val();
		
		if (id_profesion_oficio) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_profesion_oficio").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#telf_local").on("keyup", function () {
		"use strict";
		var telf_local = $(this).val();
		
		if (telf_local) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#telf_local").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#hijo").on("change", function () {
		"use strict";
		var hijo = $(this).val();
		
		if (hijo) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#hijo").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#empleo").on("change", function () {
		"use strict";
		var empleo = $(this).val();
		
		if (empleo) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#empleo").removeClass("is-valid").addClass("is-invalid");
		}
	});

	$("#cod_estado").on("change", function () {
		"use strict";
		var cod_estado = $(this).val();
		
		if (cod_estado) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#cod_estado").removeClass("is-valid").addClass("is-invalid");
		}
	});

	$("#cod_municipio").on("change", function () {
		"use strict";
		var cod_municipio = $(this).val();
		
		if (cod_municipio) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#cod_municipio").removeClass("is-valid").addClass("is-invalid");
		}
	});
	
	$("#cod_parroquia").on("change", function () {
		"use strict";
		var cod_parroquia = $(this).val();
		
		if (cod_parroquia) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#cod_parroquia").removeClass("is-valid").addClass("is-invalid");
		}
	});
	
	$("#direccion").on("keyup", function () {
		"use strict";
		var direccion = $(this).val();
		
		if (direccion) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#direccion").removeClass("is-valid").addClass("is-invalid");
		}
	});
	} return true
	});



	
})(jQuery);






$("#cod_estado").change(function () {
	buscarMunicipios();
});
$("#cod_municipio").change(function () {
	buscarParroquia();
});

function buscarMunicipios() {
	var estado = $("#cod_estado").val();

	if (estado == "") {
		$("#cod_municipio").html(
			'<option value="">Debe seleccionar un Estado por favor</option>'
		);
	} else {
		$.ajax({
			dataType: "json",
			data: { codigoestado: estado },
			url: base_url + "Cchambistas/getMunicipios",
			type: "post",
			beforeSend: function () {
				$("#cod_municipio").html("<option>cargando municipios...</option>");
				//$("#cod_municipio").selectpicker('refresh');
			},
			success: function (respuesta1) {
				$("#cod_municipio").html(respuesta1.htmloption1);
				//$("#cod_municipio").selectpicker('refresh');
			},
			error: function (xhr, err) {
				alert(
					"readyState =" +
						xhr.readyState +
						" estado =" +
						xhr.status +
						"respuesta =" +
						xhr.responseText
				);
				//alert("ocurrio un error intente de nuevo");
			},
		});
	}
}

function buscarParroquia() {
	var municipio = $("#cod_municipio").val();
	var estado = $("#cod_estado").val();

	if (municipio == "") {
		$("#cod_parroquia").html(
			'<option value="">Debe seleccionar un Municipio por favor</option>'
		);
	} else {
		$.ajax({
			dataType: "json",
			data: { codigomunicipio: municipio, codigoestado: estado },
			url: base_url + "Cchambistas/getParroquias",
			type: "post",
			beforeSend: function () {
				$("#cod_parroquia").html("<option>cargando parroquias...</option>");
				//$("#cod_parroquia").selectpicker('refresh');
			},
			success: function (respuesta2) {
				$("#cod_parroquia").html(respuesta2.htmloption2);
				//  $("#cod_parroquia").selectpicker('refresh');
			},
			error: function (xhr, err) {
				alert(
					"readyState =" +
						xhr.readyState +
						" estado =" +
						xhr.status +
						"respuesta =" +
						xhr.responseText
				);
				//alert("ocurrio un error intente de nuevo");
			},
		});
	}
}
