(function ($) {
	"use strict";

	// WIZARD 2
	$("#wizard2").steps({
		headerTag: "h3",
		bodyTag: "section",
		autoFocus: true,
		labels: {
			cancel: "Cancelar",
			current: "current step:",
			pagination: "Pagination",
			finish: "Guardar",
			next: "Siguiente",
			previous: "Anterior",
			loading: "Cargando ...",
		},
		titleTemplate:
			'<span class="number">#index#</span> <span class="title">#title#</span>',
		onStepChanging: function (event, currentIndex, newIndex) {
			if (currentIndex < newIndex) {
				// Step 1 form validation
				if (currentIndex === 0) {
					var nombres = $("#nombres").parsley();
					var apellidos = $("#apellidos").parsley();

					var cedula = $("#cedula").parsley();
					var id_nivel_academico = $("#id_nivel_academico").parsley();
					var telf_movil = $("#telf_movil").parsley();
				
					var correo1 = $("#correo1").parsley();
					var fecha_nac = $("#fecha_nac").parsley();
					var edad = $("#edad").parsley();
					var id_profesion_oficio = $("#id_profesion_oficio").parsley();
					var expresion = /^[a-zA-Z-_\.]+$/;
				

					if (
						nombres.isValid() &&
						apellidos.isValid() &&
						cedula.isValid() &&
						id_nivel_academico.isValid() &&
						telf_movil.isValid() &&
						correo1.isValid() &&
						edad.isValid() &&
						id_profesion_oficio.isValid()
					) {
						return true;
					} else {
						console.log("no paso");
						if (!nombres.isValid())
							$("#nombres")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (apellidos == "" || expresion.test(apellidos) == false)
							$("#apellidos")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!cedula.isValid())
							$("#cedula")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!id_nivel_academico.isValid())
							$("#id_nivel_academico")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						
						if (!telf_movil.isValid())
							$("#telf_movil")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");

						if (!telf_local.isValid())
							$("#telf_local")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");

						if (!correo1.isValid())
							$("#correo1")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						
						if (!edad.isValid())
							$("#edad")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if(!id_profesion_oficio.isValid()){
							$("#id_profesion_oficio")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						}
						
					
						
						return false;
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					var cod_responsabilidad = $("#cod_responsabilidad").parsley();
					
					var talla_pantalon = $("#talla_pantalon").parsley();
					var talla_camisa = $("#talla_camisa").parsley();
					var cod_estado = $("#cod_estado").parsley();
					var cod_municipio = $("#cod_municipio").parsley();
					var cod_parroquia = $("#cod_parroquia").parsley();
					var direccion = $("#direccion").parsley();
					var latitud = $("#latitud").parsley();
					var longitud = $("#longitud").parsley();

					if (
						cod_responsabilidad.isValid() &&
					
						talla_pantalon.isValid() &&
						talla_camisa.isValid() &&
						cod_estado.isValid() &&
						cod_municipio.isValid() &&
						cod_parroquia.isValid() &&
						direccion.isValid()
					) {
						return true;
					} else {
						
						if (!cod_responsabilidad.isValid())
							$("#cod_responsabilidad")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						
						// if (!talla_pantalon.isValid())
						// 	$("#talla_pantalon")
						// 		.removeClass("is-valid")

						// 		.addClass("is-invalid  error-input");
						// 		else{
						// 			$("#talla_pantalon")
						// 			.removeClass("is-invalid  error-input")
						// 			.addClass("is-valid");
						// 		}
						if (!talla_camisa.isValid())
							$("#talla_camisa")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!cod_estado.isValid())
							$("#cod_estado")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!cod_municipio.isValid())
							$("#cod_municipio")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!cod_parroquia.isValid())
							$("#cod_parroquia")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!direccion.isValid())
							$("#direccion")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");

						latitud.validate();
						longitud.validate();
					}
					if(currentIndex === 2 ){
						var password = $("#password").parsley();
						if (password.isValid()) {
							return true;
						}else{
							$("#password")
								if (!password.isValid())
								$("#cpassword")
									.removeClass("is-valid")
									.addClass("is-invalid  error-input");
						}
					}
				}
				// Always allow step back to the previous step even if the current step is not valid.
			} else {
				return true;
			}
		},

		onFinished: function (event, currentIndex) {
			var nombres = $("#nombres").val();
			var apellidos = $("#apellidos").val();
			var telf_movil = $("#telf_movil").val();
			var telf_local = $("#telf_local").val();
			var fecha_nac = $("#fecha_nac").val();
			var correo1 = $("#correo1").val();
			var edad = $("#edad").val();
			var id_profesion_oficio = $("#id_profesion_oficio").val();
			var cedula = $("#cedula").val();
			var id_nivel_academico = $("#id_nivel_academico").val();
			var cod_estado = $("#cod_estado").val();
			var cod_municipio = $("#cod_municipio").val();
			var cod_parroquia = $("#cod_parroquia").val();
			var direccion = $("#direccion").val();
			var cod_responsabilidad = $("#cod_responsabilidad").val();
			var talla_pantalon = $("#talla_pantalon").val();
			var talla_camisa = $("#talla_camisa").val();
			var latitud = $("#latitud").val();
			var longitud = $("#longitud").val();
			var genero = $("#genero").val();
			var pass = $("#password").val();
			var id_brigada_estructura = $("#id_brigada_estructua").val();
			
			

			$.ajax({
				dataType: "json",
				data: {
				
					pass,
					nombres,
					apellidos,
					telf_movil,
					telf_local,
					fecha_nac,
					correo1,
					edad,
					genero,
					id_profesion_oficio,
					cod_parroquia,
					cedula,
					id_nivel_academico,
					cod_estado,
					cod_municipio,
					cod_parroquia,
					direccion,
					cod_responsabilidad,
					talla_pantalon,
					talla_camisa,
					latitud,
					longitud,
					id_brigada_estructura
				
				},

				url: base_url + "Cadmin/crearEstructura",
				type: "post",
				beforeSend: function () {
					//$("#cod_municipio").selectpicker('refresh');
				},
				success: function (respuesta) {
					console.log(respuesta);
					if (respuesta.resultado == true) {
						Swal.fire({
							icon: "success",
							title: "Registro Exitoso",
							text: "Presione OK para continuar",
						}).then((result) => {
							/* Read more about isConfirmed, isDenied below */
							if (result.isConfirmed) {
								$(location).attr("href", base_url + "admin/ver/estructura-brigada/"+respuesta.id_brigada);
							}
						});
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
		},
	});


	$("#fecha_nac").change(function () {
		var edad=calcularEdad($(this).val())
		$("#edad").val(edad)
	});

	function calcularEdad(fecha) {
		var hoy = new Date();
		var cumpleanos = new Date(fecha);
		var edad = hoy.getFullYear() - cumpleanos.getFullYear();
		var m = hoy.getMonth() - cumpleanos.getMonth();
	
		if (m < 0 || (m === 0 && hoy.getDate() < cumpleanos.getDate())) {
			edad--;
		}
	
		return edad;
	}

	// DROPIFY
	$(".dropify-clear").on("click", function () {
		$(".dropify-render img").remove();
		$(".dropify-preview").css("display", "none");
		$(".dropify-clear").css("display", "none");
	});
})(jQuery);

//Function to show image before upload

function readURL(input) {
	"use strict";

	if (input.files && input.files[0]) {
		var reader = new FileReader();
		reader.onload = function (e) {
			$(".dropify-render img").remove();
			var img = $('<img id="dropify-img">'); //Equivalent: $(document.createElement('img'))
			img.attr("src", e.target.result);
			img.appendTo(".dropify-render");
			$(".dropify-preview").css("display", "block");
			$(".dropify-clear").css("display", "block");
		};
		reader.readAsDataURL(input.files[0]);
	}
}

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

$("#correo1").on("keyup", function () {
	"use strict";
	var correo = $("#correo2").val($(this).val());
});

//validar cedula

$("#cedula").on("keyup", function () {
	"use strict";
	var cedula = $("#cedula").val();
	var expresion = /^\d{7,8}$/;

	if (expresion.test(cedula)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#cedula").removeClass("is-valid").addClass("is-invalid");
	}
});

//validar telefono
$("#telf_movil").on("keyup", function () {
	"use strict";
	var telefono = $("#telf_movil").val();
	var expresion = /^\d{7,11}$/;

	if (expresion.test(telefono)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#telf_movil,datepicker").removeClass("is-valid").addClass("is-invalid");
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

//nombress

$("#nombres").on(
	"keyup",
	function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (nombres) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	}
);
$("#apellidos").on(
	"keyup",
	function () {
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
	}
);



//Correo
$("#correo1").on("keyup", function () {
	"use strict";
	var email1 = $(this).val();
	var expresion =
		/^[a-zA-Z0-9.!#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if (expresion.test(email1)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#correo1").removeClass("is-valid").addClass("is-invalid");
	}
});
//edad
$("#edad").on("keyup", function () {
	"use strict";
	var edad = $(this).val();
	var expresion = /^\d{2}$/;

	if (expresion.test(edad)) {
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
$("#password").on("keyup", function () {
	"use strict";
	var password = $(this).val();
	

	if (password) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#password").removeClass("is-valid").addClass("is-invalid");
	}
});
// select
$("#id_nivel_academico").on("change", function () {
	"use strict";
	var nivel_academico = $(this).val();

	if (nivel_academico) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#id_nivel_academico").removeClass("is-valid").addClass("is-invalid");
	}
});
// select
$("#id_profesion_oficio").on("change", function () {
	"use strict";
	var profesion_oficio = $(this).val();
	// var expresion = /^\d{1}$/;
	var expresion = /^[a-zA-Z0-9\s]*$/;

	if (profesion_oficio) {
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
$("#cod_responsabilidad").on("change", function () {
	"use strict";
	var cod_responsabilidad = $(this).val();
	// var expresion = /^\d{1}$/;
	var expresion = /^[a-zA-Z0-9\s]*$/;

	if (cod_responsabilidad) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#cod_responsabilidad").removeClass("is-valid").addClass("is-invalid");
	}
});
$("#talla_pantalon").on("keyup", function () {
	"use strict";
	var talla_pantalon = $(this).val();
	// var expresion = /^\d{1}$/;
	var expresion = /^\d{2,2}$/;

	

	if (talla_pantalon){
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	}
});
$("#talla_camisa").on("keyup", function () {
	"use strict";
	var talla_camisa = $(this).val();
	// var expresion = /^\d{1}$/;
	var expresion = /^[a-zA-Z-,-/\s]*$/;

	if (expresion.test(talla_camisa)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#talla_camisa").removeClass("is-valid").addClass("is-invalid");
	}
});

//Estado
$("#cod_estado").on("change", function () {
	"use strict";
	var estado = $(this).val();
	var expresion = /^\d{1}$/;

	if (estado) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
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

	if (cod_municipio) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
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

	if (cod_parroquia) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	}
});

//Dirección Especifica
$("#direccion").on("keyup", function () {
	"use strict";
	var direccion_especifica = $(this).val();
	var expresion = /^[a-zA-Z0-9\s]*$/;

	if (expresion.test(direccion_especifica)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	}
});
