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
		var id_profesion = $("#id_profesion").val();
		var edad = $("#edad").val();
		var hijos = $("#hijos").val();
		var hijos = parseInt(hijos);
		var expresion = /^[a-zA-Z-_\.]+$/;
		e.preventDefault();

		if(nom == '' || ape == '' || datepicker == '' || $telf_cel == '' || $telf_local == '' || $cod_estado == '' || $codigomunicipio == '' || $codigoparroquia == '' || $direccion == '' || $estudio == '' || $empleo == '' || $id_movimiento_religioso == '' || $id_movimiento_sociales == '' || latitud == '' || longitud == '' || cne == '' || genero == '' || estcivil == '' || aborigen == '' || hijo == '' || id_profesion == '' || edad == '') {

			if (nombres == "" || expresion.test(nombres) == false) {
				$("#nombres").focus();
				
	
			} else if (apellidos == "" || expresion.test(apellidos) == false) {
				$("#apellidos").focus();
			} else if (edad == 0) {
				$("#edad").focus();
			} else if (direccion == "") {
				$("#direccion").focus();
			} else if (hijos == 0) {
				$("#hijos").focus();
			} else if (estcivil == "" || estcivil == 0) {
				$("#estcivil").focus();
			} else if (expresion.test(telf_movil) == true) {
				$("#telf_movil").focus();
			} else if (expresion.test(telf_local) == true) {
				$("#telf_local").focus();
			} else if (id_profesion == "" || id_profesion == 0) {
				$("#id_profesion").focus();
			} else if (aborigen == "" || aborigen == 0) {
				$("#aborigen").focus();
			} else if (empleo == "" || empleo == 0) {
				$("#empleo").focus();
			} else if (id_movimiento_religioso == "" || id_movimiento_religioso == 0) {
				$("#id_movimiento_religioso").focus();
			} else if (estado == "" || estado == 0) {
				$("#cod_estado").focus();
			} else if (cod_municipio == "" || cod_municipio == 0) {
				$("#cod_municipio").focus();
			} else if (cod_parroquia == "" || cod_parroquia == 0) {
				$("#cod_parroquia").focus();
			} else if (id_movimiento_sociales == 0) {
				$("#id_movimiento_sociales").focus();
			} else if(direccion == ""){
				$("#direccion").focus();
	
			}else {
				$("#edad").css("border-color", "success");
	
				// aser un submit normal
				$("#datospersonales").submit();
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
				id_profesion: id_profesion,
				hijo:hijo,
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
		

	} return true
	});


	$("#nombres").on("keyup", function () {
		"use strict";
		var apellidos_representante = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (expresion.test(apellidos_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});
	$("#apellidos").on("keyup", function () {
		"use strict";
		var apellidos_representante = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (expresion.test(apellidos_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

	$("#edad ").on("keyup", function () {
		"use strict";
		var edad = $(this).val();
		var expresion = /^[0-9]+$/;

		if (expresion.test(edad)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (edad == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#edad").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#hijo").on("change", function () {
		"use strict";
		var hijo = $(this).val();
		var expresion = /^[0-9]+$/;

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
	// estcivil
	$("#estcivil").on("change", function () {
		"use strict";
		var estcivil = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(estcivil)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (estcivil == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#estcivil").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#sexo").on("change", function () {
		"use strict";
		var sexo = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(sexo)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#sexo").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#empleo").on("change", function () {
		"use strict";
		var empleo = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(empleo)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (empleo == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#empleo").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#id_movimiento_religioso").on("change", function () {
		"use strict";
		var id_movimiento_religioso = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(id_movimiento_religioso)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (id_movimiento_religioso == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#id_movimiento_religioso")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	});
	$("#id_movimiento_sociales").on("change", function () {
		"use strict";
		var id_movimiento_sociales = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(id_movimiento_sociales)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (id_movimiento_sociales == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#id_movimiento_sociales")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	});

	$("#telf_movil").on("keyup", function () {
		"use strict";
		var telefono = $("#telf_movil").val();
		var expresion = /^\d{11,11}$/;

		if (expresion.test(telefono)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#telf_movil,datepicker")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	});
	//telf_local
	$("#telf_local").on("keyup", function () {
		"use strict";
		var telf_local = $("#telf_local").val();
		var expresion = /^\d{7,13}$/;

		if (expresion.test(telf_local)) {
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
	$("#id_profesion").on("change", function () {
		"use strict";
		var profesion_oficio = $(this).val();
		// var expresion = /^\d{1}$/;
		var expresion = /^[a-zA-Z0-9\s]*$/;

		if (profesion_oficio) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (profesion_oficio == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_profesion").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#aborigen").on("change", function () {
		"use strict";
		var aborigen = $(this).val();
		// var expresion = /^\d{1}$/;
		var expresion = /^[a-zA-Z0-9\s]*$/;

		if (aborigen) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (aborigen == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#aborigen").removeClass("is-valid").addClass("is-invalid");
		}
	});

	//Estado
	$("#cod_estado").on("change", function () {
		"use strict";
		var estado = $(this).val();
		var expresion = /^\d{1}$/;

		if (expresion.test(estado)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (estado == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});
	$("#cod_municipio").on("change", function () {
		"use strict";
		var cod_municipio = $(this).val();
		var expresion = /^\d{1}$/;

		if (expresion.test(cod_municipio)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (cod_municipio == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});
	$("#cod_parroquia").on("change", function () {
		"use strict";
		var cod_parroquia = $(this).val();
		var expresion = /^\d{1}$/;

		if (expresion.test(cod_parroquia)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (cod_parroquia == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});

	//Dirección Especifica
	$("#direccion").on("keyup", function () {
		"use strict";
		var direccion = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(direccion)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
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
