(function ($) {
	$("#button").click(function () {
		console.log("click")
		var razon_social = $("#razon_social").val();
		var email = $("#email").val();
		var rif = $("#rif").val();
		var tlf_celular = $("#tlf_celular").val();
		var telf_local_representante = $("#telf_local_representante").val();
		var sector_economico = $("#sector_economico").val();
		var actividad_economica = $("#actividad_economica").val();
		var nombre_representante = $("#nombre_representante").val();
		var cedula_representante = $("#cedula_representante").val();
		var telf_movil_representante = $("#telf_movil_representante").val();
		var email_representante = $("#email_representante").val();
		var cargo = $("#cargo").val();
		var apellidos_representante = $("#apellidos_representante").val();
		var direccion= $("#direccion").val();
		var cod_estado = $("#cod_estado").val();
		var cod_municipio = $("#cod_municipio").val();
		var cod_parroquia = $("#cod_parroquia").val();
		var latitud = $("#latitud").val();
		var longitud = $("#longitud").val();
		var instagram = $("#instagram").val();
		var facebook = $("#facebook").val();
		var twitter = $("#twitter").val();
		var id_empresas_entes = $("#id_empresas_entes").val();
		var id_representante = $("#id_representante").val();

		// si los campo son valido se envia el formulario

		if (
			razon_social != "" &&
			email != "" &&
			rif != "" &&
			tlf_celular != "" &&
			telf_movil_representante !="" &&
			telf_local_representante != "" &&
			sector_economico != "" &&
			actividad_economica != "" &&
			nombre_representante != "" &&
			apellidos_representante != "" &&
			cedula_representante != "" &&
			email_representante != "" &&
			cargo != "" 
			
			
			) {
				console.log("entro")
						$.ajax({
			dataType: "json",
			url: base_url + "Cadmin/update_universidad_Representante",
			type: "post",
		data: {razon_social, rif,tlf_celular, email, sector_economico,actividad_economica,
			nombre_representante,apellidos_representante,cedula_representante,telf_movil_representante,
			email_representante,cargo,cod_estado,cod_municipio,
			cod_parroquia,latitud,longitud,telf_local_representante,
			direccion,instagram,twitter,facebook,id_empresas_entes,id_representante
		
		},
		success: function (respuesta) {
			console.log(respuesta);
			if (respuesta.resultado == true) {
				Swal.fire({
					icon: "success",
					title: "Registro Actualizados",
					text: "Presione OK para continuar",
				}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
						$(location).attr("href", base_url + "admin/universidades");
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

	})
	
	return true
		} else {
			// validar los input que  esten vacios con bootstrap
			if(razon_social == "" || email == "" || rif == "" || tlf_celular == "" ||  sector_economico == "" || actividad_economica == "" || nombre_representante == "" || apellidos_representante == "" || cedula_representante == "" || telf_movil_representante == "" || email_representante == "" || cargo == "" || cod_estado==""){
				
				
				
						
				$("#razon_social").addClass("is-invalid");
				$("#razon_social").focus();
					
				$("#email").addClass("is-invalid");
				$("#email").focus();
				$("#rif").addClass("is-invalid");
				$("#rif").focus();
				$("#tlf_celular").addClass("is-invalid");
				$("#tlf_celular").focus();
				$("#telf_local_representante").addClass("is-invalid");
				$("#telf_local_representante").focus();
				$("#sector_economico").addClass("is-invalid");
				$("#sector_economico").focus();
				$("#actividad_economica").addClass("is-invalid");
				$("#actividad_economica").focus();
				$("#nombre_representante").addClass("is-invalid");
				$("#nombre_representante").focus();
				$("#apellidos_representante").addClass("is-invalid");
				$("#apellidos_representante").focus();
				$("#cedula_representante").addClass("is-invalid");
				$("#cedula_representante").focus();
				$("#telf_movil_representante").addClass("is-invalid");
				$("#telf_movil_representante").focus();
				$("#email_representante").addClass("is-invalid");
				$("#email_representante").focus();
				$("#cargo").addClass("is-invalid");
				$("#cargo").focus();
		
				$("#cod_estado").addClass("is-invalid");
				$("#cod_estado").focus();
				$("#cod_municipio").addClass("is-invalid");
				$("#cod_municipio").focus();
				$("#cod_parroquia").addClass("is-invalid");
				$("#cod_parroquia").focus();
				
				if (razon_social != "") {
					$("#razon_social").removeClass("is-invalid");
					$("#razon_social").addClass("is-valid");
					//quitar el focus del input
					$("#razon_social").blur();
				}
				if (email != "") {
					$("#email").removeClass("is-invalid");
					$("#email").addClass("is-valid");
					//quitar el focus del input
					$("#email").blur();
				}
				if (rif != "") {
					$("#rif").removeClass("is-invalid");
					$("#rif").addClass("is-valid");
					//quitar el focus del input
					$("#rif").blur();
				}
				if (tlf_celular != "") {
					$("#tlf_celular").removeClass("is-invalid");
					$("#tlf_celular").addClass("is-valid");
					//quitar el focus del input
					$("#tlf_celular").blur();
				}
				if (telf_local_representante != "") {
					$("#telf_local_representante").removeClass("is-invalid");
					$("#telf_local_representante").addClass("is-valid");
					//quitar el focus del input
					$("#telf_local_representante").blur();
				}

				if (sector_economico != "") {
					$("#sector_economico").removeClass("is-invalid");
					$("#sector_economico").addClass("is-valid");
					//quitar el focus del input
					$("#sector_economico").blur();
				}

				if (actividad_economica != "") {
					$("#actividad_economica").removeClass("is-invalid");
					$("#actividad_economica").addClass("is-valid");
					//quitar el focus del input
					$("#actividad_economica").blur();
				}

				if (nombre_representante != "") {
					$("#nombre_representante").removeClass("is-invalid");
					$("#nombre_representante").addClass("is-valid");
					//quitar el focus del input
					$("#nombre_representante").blur();
				}
				if (apellidos_representante != "") {
					$("#apellidos_representante").removeClass("is-invalid");
					$("#apellidos_representante").addClass("is-valid");
					//quitar el focus del input
					$("#apellidos_representante").blur();
				}
				if (cedula_representante != "") {
					$("#cedula_representante").removeClass("is-invalid");
					$("#cedula_representante").addClass("is-valid");
					//quitar el focus del input
					$("#cedula_representante").blur();
				}

				if (telf_movil_representante != "") {
					$("#telf_movil_representante").removeClass("is-invalid");
					$("#telf_movil_representante").addClass("is-valid");
					//quitar el focus del input
					$("#telf_movil_representante").blur();
				}

				if (email_representante != "") {
					$("#email_representante").removeClass("is-invalid");
					$("#email_representante").addClass("is-valid");
					//quitar el focus del input
					$("#email_representante").blur();
				}

				if (cargo != "") {
					$("#cargo").removeClass("is-invalid");
					$("#cargo").addClass("is-valid");
					//quitar el focus del input
					$("#cargo").blur();
				}

				if (password != "") {
					$("#password").removeClass("is-invalid");
					$("#password").addClass("is-valid");
					//quitar el focus del input
					$("#password").blur();
				}

				if (cod_estado != "") {
					$("#cod_estado").removeClass("is-invalid");
					$("#cod_estado").addClass("is-valid");
				}
				if (cod_municipio != "") {
					$("#cod_municipio").removeClass("is-invalid");
					$("#cod_municipio").addClass("is-valid");
				}
				if (cod_parroquia != "") {
					$("#cod_parroquia").removeClass("is-invalid");
					$("#cod_parroquia").addClass("is-valid");
				}

		

				
				

			}

			
			
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

//nombres

$("#razon_social").on("keyup", function () {
	"use strict";
	var razon_social = $(this).val();

	var expresion = /^[a-zA-Z\s]*$/;

	if (expresion.test(razon_social)) {
		$("#razon_social")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#razon_social").removeClass("is-valid").addClass("is-invalid");
	}
});

$("#nombre_representante").on("keyup", function () {
	"use strict";
	var nombre_representante = $(this).val();

	var expresion = /^[a-zA-Z\s]*$/;

	if (expresion.test(nombre_representante)) {
		$("#nombre_representante")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#nombre_representante").removeClass("is-valid").addClass("is-invalid");
	}
});
//apellidos_representante

$("#apellidos_representante").on("keyup", function () {
	"use strict";
	var apellidos_representante = $("#apellidos_representante").val();

	var expresion = /^[a-zA-Z\s]*$/;

	if (expresion.test(apellidos_representante)) {
		$("#apellidos_representante")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#apellidos_representante")
			.removeClass("is-valid")
			.addClass("is-invalid");
	}
});
//cargo
$("#cargo").on("keyup", function () {
	"use strict";
	var cargo = $(this).val();
	//expresion de  numero y text
	var expresion = /^[a-zA-Z\s]*$/;

	if (expresion.test(cargo)) {
		$("#cargo")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#cargo").removeClass("is-valid").addClass("is-invalid");
	}
});
//RIF
$("#rif").on("keyup", function () {
	"use strict";
	var rif = $("#rif").val();
	

	if (rif) {
		$("#rif")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#rif").removeClass("is-valid").addClass("is-invalid");
	}
});

$("#tlf_celular").on("keyup", function () {
	"use strict";
	var telefono = $("#tlf_celular").val();
	var expresion = /^\d{7,11}$/;

	if (expresion.test(telefono)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#tlf_celular").removeClass("is-valid").addClass("is-invalid");
	}
});
//telf_movil_representante
$("#telf_movil_representante").on("keyup", function () {
	"use strict";
	var telf_movil_representante = $("#telf_movil_representante").val();
	var expresion = /^\d{7,11}$/;

	if (expresion.test(telf_movil_representante)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#telf_movil_representante")
			.removeClass("is-valid")
			.addClass("is-invalid");
	}
});

$("#telf_local_representante").on("keyup", function () {
	"use strict";
	var telf_local_representante = $("#telf_local_representante").val();
	var expresion = /^\d{7,13}$/;

	if (expresion.test(telf_local_representante)) {
		$("#telf_local_representante")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#telf_local_representante")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#telf_local_representante")
			.removeClass("is-valid")
			.addClass("is-invalid");
	}
});

$("#email").on("keyup", function () {
	"use strict";
	var email1 = $(this).val();
	var expresion =
		/^[a-zA-Z0-9.#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if (expresion.test(email1)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#email").removeClass("is-valid").addClass("is-invalid");
	}
});
//email_representantev
$("#email_representante").on("keyup", function () {
	"use strict";
	var email_representante = $(this).val();
	var expresion =
		/^[a-zA-Z0-9.#$%&'*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/;

	if (expresion.test(email_representante)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#email_representante").removeClass("is-valid").addClass("is-invalid");
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

$("#cedula_representante").on("keyup", function () {
	"use strict";
	var cedula_representante = $("#cedula_representante").val();
	var expresion = /^\d{7,8}$/;

	if (expresion.test(cedula_representante)) {
		$("#cedula_representante")
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$("#cedula_representante").removeClass("is-valid").addClass("is-invalid");
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
			$("#cod_estado").removeClass("is-valid").addClass("is-invalid");
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
