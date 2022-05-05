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




					if (razon_social.isValid() && rif.isValid() 
					     && telf_movil.isValid()   && email.isValid() 
						&& sector_economico.isValid()  && actividad_economica.isValid()     ) {
							
						return true;
					} else {
					
						razon_social.validate();
						rif.validate();				
						telf_movil.validate();
						email.validate();
						sector_economico.validate();
						actividad_economica.validate();
					}
				}
				// Step 2 form validation
				if (currentIndex === 1) {

					var nombre_representante = $("#nombre_representante").parsley();
					var apellidos_representante = $("#apellidos_representante").parsley();
				
					var cedula_representante = $("#cedula_representante").parsley();
					var telf_movil_representante = $("#telf_movil_representante").parsley();
					var email_representante = $("#email_representante").parsley();
					var cargo = $("#cargo").parsley();
					 var email_representante = $('#email_representante').parsley();


                    if (nombre_representante.isValid(),apellidos_representante.isValid(),
					cedula_representante.isValid(),telf_movil_representante.isValid(),
					email_representante.isValid(), cargo.isValid()) {
                        return true;
                    } else {
						nombre_representante.validate();
						apellidos_representante.validate();
						cedula_representante.validate();
						telf_movil_representante.validate();
						email_representante.validate();
						cargo.validate();
                    }

					
				}
				// Always allow step back to the previous step even if the current step is not valid.
			} else {


				if (razon_social.isValid() && rif.isValid() 
				&& telf_movil.isValid()   && email.isValid() 
			   && sector_economico.isValid()  && actividad_economica.isValid()     ) {
				   
			   return true;
		   } else {
		   
			   razon_social.validate();
			   rif.validate();				
			   telf_movil.validate();
			   email.validate();
			   sector_economico.validate();
			   actividad_economica.validate();
		   }
			}
		},

		onFinished: function (event, currentIndex) {
			var fname = $("#nombres").val();
			var lname = $("#apellidos").val();
			var cedula = $("#cedula").val();
			$.ajax({
				dataType: "json",
				data: { fname: fname, cedula: cedula, lname: lname },
				url: base_url + "Cadmin/crearEstructura",
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
					console.log(respuesta);
				},
				error: function (xhr, err) {
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
