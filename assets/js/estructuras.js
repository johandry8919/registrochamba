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
					var nombres= $("#nombres").parsley();
					var apellidos = $("#apellidos").parsley();
					var cedula = $("#cedula").parsley();
					var telf_movil = $("#telf_movil").parsley();
					var telf_local = $("#telf_local").parsley();
					var email1 = $("#correo1").parsley();
					var Fecha_nac = $("#datepicker").parsley();
					var edad = $("#edad").parsley();
					var academico = $("#id_nivel_academico").parsley();
					var profesion = $("#profesion").parsley();
					var estado = $("#cod_estado").parsley();
					var municipio = $("#cod_municipio").parsley();
					var parroquia = $("#cod_parroquia").parsley();
					var direccion = $("#direccion").parsley();
					var cod_responsabilidad = $("#cod_responsabilidad").parsley();
					var cd_structura = $("#cd_structura").parsley();
					var talla_pantalon = $("#talla_pantalon").parsley();
					var talla_camisa = $("#talla_camisa").parsley();
					var latitud = $("#latitud").parsley();
					var longitud = $("#longitud").parsley();
					var Password = $("#pass").parsley();

					



					if (nombres.validate() && apellidos.validate() && cedula.validate() && telf_movil.validate() && telf_local.validate() && email1.validate() && Fecha_nac.validate() && edad.validate() && academico.validate() && profesion.validate() && estado.validate() && municipio.validate() && parroquia.validate() && direccion.validate() && cod_responsabilidad.validate() && cd_structura.validate() && talla_pantalon.validate() && talla_camisa.validate() && latitud.validate() && longitud.validate() && Password.validate()) {
                       

						return true;
					} else {
						// cedula.validate();
						nombres.validate();
						apellidos.validate();
						cedula.validate();
						telf_movil.validate();
						telf_local.validate();
						email1.validate();
						Fecha_nac.validate();
						edad.validate();
						profesion.validate();
						academico.validate();
                        estado.validate();
                        municipio.validate();
                        parroquia.validate();
                        direccion.validate();
                        cod_responsabilidad.validate();
                        cd_structura.validate();
                        talla_pantalon.validate();
                        talla_camisa.validate();
                        latitud.validate();
                        longitud.validate();
						Password.validate();
						
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {
					return true;
					/*  var email = $('#email').parsley();
                    if (email.isValid()) {
                        return true;
                    } else {
                        email.validate();
                    }

					*/
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
			var Fecha_nac = $("#datepicker").val();
			var email1 = $("#correo1").val();
			var edad = $("#edad").val();
			var profesion = $("#profesion").val();
			var cedula = $("#cedula").val();
			var academico = $("#id_nivel_academico").val();
            var estado = $("#cod_estado").val();
            var municipio = $("#cod_municipio").val();
            var parroquia = $("#cod_parroquia").val();
            var direccion = $("#direccion").val();
            var cod_responsabilidad = $("#cod_responsabilidad").val();
            var cd_structura = $("#cd_structura").val();
            var talla_pantalon = $("#talla_pantalon").val();
            var talla_camisa = $("#talla_camisa").val();
            var latitud = $("#latitud").val();
            var longitud = $("#longitud").val();
			
			
			$.ajax({
				dataType: "json",
				data: {
					"nombres": nombres,
					"cedula": cedula,
					"apellidos": apellidos,
					"telf_movil": telf_movil,
					"telf_local": telf_local,
					"email1": email1,
					"Fecha_nac":Fecha_nac ,
					"edad": edad,
					"id_profesion_oficio": profesion,
					"id_nivel_academico": academico,
                    "codigoestado": estado,
                    "codigomunicipio": municipio,
                    "codigoparroquia": parroquia,
                    "direccion": direccion,
                    "cod_responsabilidad": cod_responsabilidad,
                    "cd_structura": cd_structura,
                    "talla_pantalon": talla_pantalon,
                    "talla_camisa": talla_camisa,
                    "latitud": latitud,
                    "longitud": longitud,
					
					
                    
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
								$(location).attr("href", base_url + "admin/estructuras");
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