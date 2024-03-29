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
					var razon_social = $("#razon_social").parsley();
					var rif = $("#rif").parsley();

					var telf_movil = $("#telf_movil").parsley();
					var email = $("#email").parsley();
					var sector_economico = $("#sector_economico").parsley();
					var actividad_economica = $("#actividad_economica").parsley();

					if (
						razon_social.isValid() &&
						rif.isValid() &&
						telf_movil.isValid() &&
						email.isValid() &&
						sector_economico.isValid() &&
						actividad_economica.isValid()
					) {
						return true;
					} else {
						if (!razon_social.isValid())
							$("#razon_social")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						

						if (!rif.isValid())
							$("#rif")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");

						if (!telf_movil.isValid())
							$("#telf_movil")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");

						if (!email.isValid())
							$("#email")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");

						sector_economico.validate();
						actividad_economica.validate();
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					var nombre_representante = $("#nombre_representante").parsley();
					var apellidos_representante = $("#apellidos_representante").parsley();

					var cedula_representante = $("#cedula_representante").parsley();
					var telf_movil_representante = $(
						"#telf_movil_representante"
					).parsley();
					var email_representante = $("#email_representante").parsley();
					var cargo = $("#cargo").parsley();
					var email_representante = $("#email_representante").parsley();

					if (
						(nombre_representante.isValid(),
						apellidos_representante.isValid(),
						cedula_representante.isValid(),
						telf_movil_representante.isValid(),
						email_representante.isValid(),
						cargo.isValid())
					) {
						return true;
					}else{
						//nombre_representante solo permite letras




						if (!nombre_representante.isValid())
							$("#nombre_representante")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
								
								
						if (!apellidos_representante.isValid())
							$("#apellidos_representante")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!cedula_representante.isValid())
							$("#cedula_representante")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!telf_movil_representante.isValid())
							$("#telf_movil_representante")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!email_representante.isValid())
							$("#email_representante")
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						if (!cargo.isValid())
							$("#cargo")	
								.removeClass("is-valid")
								.addClass("is-invalid  error-input");
						
						return false;
						
					}
				}
				// Always allow step back to the previous step even if the current step is not valid.
			} else {
				var cod_estado = $("#cod_estado").parsley();
				var cod_municipio = $("#cod_municipio").parsley();
				var cod_parroquia = $("#cod_parroquia").parsley();
				var latitud = $("#latitud").parsley();
				var longitud = $("#longitud").parsley();

				if (
					cod_estado.isValid() &&
					cod_municipio.isValid() &&
					cod_parroquia.isValid()
				) {
					return true;
				} else {
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
				}
			}
		},
		onFinished: function (event, currentIndex) {
			//var form_data = $( "#wizard2" ).serialize();

			var razon_social = $("#razon_social").val();
			var rif = $("#rif").val();
			var telf_movil = $("#telf_movil").val();
			var email = $("#email").val();
			var sector_economico = $("#sector_economico").val();
			var actividad_economica = $("#actividad_economica").val();

			var nombre_representante = $("#nombre_representante").val();
			var apellidos_representante = $("#apellidos_representante").val();

			var cedula_representante = $("#cedula_representante").val();
			var telf_movil_representante = $("#telf_movil_representante").val();
			var email_representante = $("#email_representante").val();
			var cargo = $("#cargo").val();

			var cod_estado = $("#cod_estado").val();
			var cod_municipio = $("#cod_municipio").val();
			var cod_parroquia = $("#cod_parroquia").val();
			var latitud = $("#latitud").val();
			var longitud = $("#longitud").val();
			var telf_local_representante = $("#telf_local_representante").val();
			var direccion_empresa = $("#direccion_empresa").val();
			var instagram = $("#instagram").val();
			var twitter = $("#twitter").val();
			var facebook = $("#facebook").val();
			var password = $("#password").val();

			$.ajax({
				dataType: "json",
				data: {
					razon_social,
					rif,
					telf_movil,
					email,
					sector_economico,
					actividad_economica,
					nombre_representante,
					apellidos_representante,
					cedula_representante,
					telf_movil_representante,
					email_representante,
					cargo,
					cod_estado,
					cod_municipio,
					cod_parroquia,
					latitud,
					longitud,
					telf_local_representante,
					direccion_empresa,
					instagram,
					twitter,
					facebook,
					password,
				},
				url: base_url + "Cadmin/crearEmpresas",
				type: "post",
				beforeSend: function () {
					//$("#cod_municipio").selectpicker('refresh');
				},
				success: function (respuesta) {
					if (respuesta.resultado == true) {
						Swal.fire({
							icon: "success",
							title: "Registro Exitoso",
							text: "Presione OK para continuar",
						}).then((result) => {
							if (result.isConfirmed) {
								$(location).attr("href", base_url + "admin/empresas");
							}
						});
					} else {
						Swal.fire({
							icon: "error",
							title: "Oops...",
							text: respuesta.mensaje,
						});
					}
					console.log(respuesta);
				},
				error: function (xhr, err) {
					console.log(xhr);
					console.log(err);
					alert("ocurrio un error intente de nuevo");
				},
			});
		},
	});

	//validacion

	$("#razon_social").on("keyup", function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (nombres) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

	$("#nombre_representante").on("keyup", function () {
		"use strict";
		var nombre_representante = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (expresion.test(nombre_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});
	$("#cargo").on("keyup", function () {
		"use strict";
		var cargo = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (expresion.test(cargo)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

	$("#apellidos_representante").on("keyup", function () {
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
	
	$("#cedula_representante").on("keyup", function () {
		"use strict";
		var cedula_representante = $(this).val();
		var expresion = /^[0-9]+$/;

		if (expresion.test(cedula_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

	$("#rif").on("keyup", function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(nombres)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

	$("#email_representante").on("keyup", function () {
		"use strict";
		var email_representante = $(this).val();
		var expresion = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

		if (expresion.test(email_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});
	$("#email").on("keyup", function () {
		"use strict";
		var email_representante = $(this).val();
		var expresion = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

		if (expresion.test(email_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});

	$("#telf_movil").on("keyup", function () {
		"use strict";
		var telf_local_representante = $("#telf_movil").val();
		var expresion = /^[0-9]+$/;

		if (expresion.test(telf_local_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});
	$("#telf_local_representante").on("keyup", function () {
		"use strict";
		var telf_local_representante = $("#telf_local_representante").val();
		var expresion = /^[0-9]+$/;

		if (expresion.test(telf_local_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
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
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
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

		if (direccion_especifica) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});

	$("#sector_economico").on("change", function () {
		"use strict";
		var sector_economico = $(this).val();

		if (sector_economico) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#sector_economico").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#actividad_economica").on("change", function () {
		"use strict";
		var actividad_economica = $(this).val();
		// var expresion = /^[a-zA-Z\s]*$/;

		if (actividad_economica) {
			$("#actividad_economica")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$("#actividad_economica")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#actividad_economica").removeClass("is-valid").addClass("is-invalid");
		}
	});

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
