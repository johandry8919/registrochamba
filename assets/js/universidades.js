
(function ($) {
    $('#button').click(function () {
        var razon_social = $('#razon_social').val();
        var email = $('#email').val();
        var rif= $('#rif').val();
        var tlf_celular = $('#tlf_celular').val();
        var telf_local_representante = $('#telf_local_representante').val();
        var id_especializacion = $('#id_especializacion').val();
        var actividad_economica = $('#actividad_economica').val();
        var nombre_representante = $('#nombre_representante').val();
        var apellido_representante = $('#apellido_representante').val();
        var cedula_representante = $('#cedula_representante').val();
        var telf_movil_representante = $('#telf_movil_representante').val();
        var email_representante = $('#email_representante').val();
        var cargo = $('#cargo').val();
        var password = $('#password').val();

        // si los campo son valido se envia el formulario

        if( razon_social != "" && email != "" && rif != "" && tlf_celular != "" && telf_local_representante != "" && id_especializacion != "" && actividad_economica != "" && nombre_representante != "" && apellido_representante != "" && cedula_representante != "" && telf_movil_representante != "" && email_representante != "" && cargo != "" && password != "" ){
              $('#formulario').submit();               

        }else{
           // si todos los campos estan vacio
              if( razon_social == ''){
                $("#razon_social")
                .removeClass("is-valid")
                .addClass("is-invalid");
               }
              if( email == ''){
                $("#email")
                .removeClass("is-valid")
                .addClass("is-invalid");
              }
              if( rif == '') $("#rif").removeClass("is-valid").addClass("is-invalid");
                if( tlf_celular == '') $("#tlf_celular").removeClass("is-valid").addClass("is-invalid");
                if( telf_local_representante == '') $("#telf_local_representante").removeClass("is-valid").addClass("is-invalid");
                if( id_especializacion == '') $("#id_especializacion").removeClass("is-valid").addClass("is-invalid");
                if( actividad_economica == '') $("#actividad_economica").removeClass("is-valid").addClass("is-invalid");
                if( nombre_representante == '') $("#nombre_representante").removeClass("is-valid").addClass("is-invalid");
                if( apellido_representante == '') $("#apellido_representante").removeClass("is-valid").addClass("is-invalid");
                if( cedula_representante == '') $("#cedula_representante").removeClass("is-valid").addClass("is-invalid");
                if( telf_movil_representante == '') $("#telf_movil_representante").removeClass("is-valid").addClass("is-invalid");
                if( email_representante == '') $("#email_representante").removeClass("is-valid").addClass("is-invalid");
                if( cargo == '') $("#cargo").removeClass("is-valid").addClass("is-invalid");
               addClass("is-invalid");
                if( password == '') $("#password").removeClass("is-valid").addClass("is-invalid");

                // posicionar el scroll al  input invalido
                if( razon_social == ''){
                    $("#razon_social").focus();

                }
                if( email == '')  $("#email").focus();
                if( rif == '') $("#rif").focus();
                if( tlf_celular == '') $("#tlf_celular").focus();
                if( telf_local_representante == '') $("#telf_local_representante").focus();
                if( id_especializacion == '') $("#id_especializacion").focus();
                if( actividad_economica == '') $("#actividad_economica").focus();
                if( nombre_representante == '') $("#nombre_representante").focus();
                if( apellido_representante == '') $("#apellido_representante").focus();
                if( cedula_representante == '') $("#cedula_representante").focus();
                if( telf_movil_representante == '') $("#telf_movil_representante").focus();
                if( email_representante == '') $("#email_representante").focus();
                if( cargo == '') $("#cargo").focus();
                
                if( password == '') $("#password").focus();


                 


             
          
           
           
           

        }
    })
$(document).ready(function() {
  
        $('#formulario').submit(function(e) {

            e.preventDefault();
         
            var form = $(this);
         

            console.log(form.serialize());
            var url = form.attr('action');
            var data = form.serialize(
                {
                    'razon_social': $('#razon_social').val(),
                    'rif': $('#rif').val(),
                    'telf_local_representante': $('#telf_local_representante_representante').val(),
                    'tlf_celular': $('#tlf_celular').val(),
                    'actividad_economica': $('#actividad_economica').val(),
                    'cedula_representante': $('#cedula_representante').val(),
                    'nombre_representante': $('#nombre_representante').val(),
                    'apellido_representante': $('#apellido_representante').val(),
                    'email': $('#email').val(),
                    'id_especializacion': $('#id_especializacion').val(),
                    'latitud': $('#latitud').val(),
                    'longitud': $('#longitud').val(),
                    'email': $('#email').val(),
                    'direccion': $('#direccion').val(),
                    'cargo': $('#cargo').val(),
                    'telf_movil_representante': $('#telf_movil_representante').val(),
                    'email_representante': $('#email_representante').val(),
                    'codigoestado': $('#cod_estado').val(),
                    'password': $('#passwor').val()

    
                    
                   
    
    
                }
            );
        
           
            $.ajax({
                dataType: "json",
                type: 'POST',
                url: base_url + "Cadmin/crearUniversidades",
                data: data,
                success: function (respuesta) {
                        
    
                    if (respuesta.resultado == true) {
    
                       
                        Swal.fire({
                            icon: "success",
                            title: "Registro Exitoso",
                            text: "Presione OK para continuar",
                        }).then((result) => {
                            /* Read more about isConfirmed, isDenied below */
                            if (result.isConfirmed) {
                                $(location).attr("href", base_url + "admin/universidad");
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
        })
       

    




    
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

$("#razon_social").on(
	"keyup",
	function () {
		"use strict";
		var razon_social = $(this).val();
                
       
		var expresion = /^[a-zA-Z\s]*$/;

		if (expresion.test(razon_social)) {
           
			$("#razon_social")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input")



                                
		} else {
            
			
			$("#razon_social")
				.removeClass("is-valid")
				.addClass("is-invalid");
			
                                     
		}
	}
);


$("#nombre_representante").on(
	"keyup",
	function () {
		"use strict";
		var nombre_representante = $(this).val();
                
       
		var expresion = /^[a-zA-Z\s]*$/;

		if (expresion.test(nombre_representante)) {
         
			$("#nombre_representante")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input")



                                
		} else {
            
			
			$("#nombre_representante")
				.removeClass("is-valid")
				.addClass("is-invalid");
			
                                     
		}
	}
);
//apellidos_representante

$("#apellidos_representante").on(
	"keyup",
	function () {
		"use strict";
		var apellidos_representante = $(this).val();

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
	}
);
//cargo
$("#cargo").on(
	"keyup",
	function () {
		"use strict";
		var cargo = $(this).val();
        //expresion de  numero y text 
        var expresion = /^[a-zA-Z\s]*$/;


		

		if (expresion.test(cargo)) {
			$("#cargo")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
                                
		} else {
			
			$("#cargo")
				.removeClass("is-valid")
				.addClass("is-invalid");
                                     
		}
	}
);
//RIF
$("#rif").on("keyup", function () {
    "use strict";
    var rif = $("#rif").val();
    var expresion = /^\d{7,10}$/;
    if (expresion.test(rif)) {
        $("#rif")

            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $("#rif")
            .removeClass("is-valid")
            .addClass("is-invalid");

    }
}
);

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
		$("#telf_movil_representante").removeClass("is-valid").addClass("is-invalid");
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
		$("#telf_local_representante").removeClass("is-valid").addClass("is-invalid");
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

$("#id_especializacion").on("change", function () {
	"use strict";
	var id_especializacion = $(this).val();
	var expresion = /^\d{1}$/;

	if (expresion.test(id_especializacion)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#id_especializacion").removeClass("is-valid").addClass("is-invalid");
	}
});
$("#actividad_economica").on("change", function () {
	"use strict";
	var actividad_economica = $(this).val();
	var expresion = /^\d{1}$/;

	if (expresion.test(actividad_economica)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
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
		$('#cedula_representante')
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		
		$("#cedula_representante").removeClass("is-valid").addClass("is-invalid");
	}
});


$("#password").on("keyup", function () {
	"use strict";
	var password = $('#password').val();
	var expresion = /^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/;

	if (expresion.test(password)) {

		$('#password')
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$('#password')
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");

		$("#password").removeClass("is-valid").addClass("is-invalid");
	}
})


 


