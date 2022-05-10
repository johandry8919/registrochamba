
(function ($) {
    $('#button').click(function () {
        console.log('click');
        //validar los campos input 
        var razon_social = $('#razon_social').val();
        var email = $('#email').val();
        var rif= $('#rif').val();
        var tlf_celular = $('#tlf_celular').val();
        var telf_local_representante_representante = $('#telf_local_representante_representante').val();
        var id_especializacion = $('#id_especializacion').val();
        var actividad_economica = $('#actividad_economica').val();
        var nombre_representante = $('#nombre_representante').val();

        if(razon_social == '' || email == '' || rif == '' || tlf_celular == '' || telf_local_representante_representante == '' || id_especializacion == '' || actividad_economica == '' || nombre_representante == ''){
            $("#razon_social")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#email")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#rif")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#tlf_celular")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#telf_local_representante")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#id_especializacion")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#actividad_economica")
            .removeClass("is-valid")
            .addClass("is-invalid");
            $("#nombre_representante")
            .removeClass("is-valid")
            .addClass("is-invalid");


            // mensaje de alerta con bootstrap
            $('#alerta').html('<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Error!</strong> Debes llenar todos los campos obligatorios.<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');

            // posicionar el scroll al inicio
            $('html, body').animate({}, 'slow');
            $('html, body').animate({scrollTop: 0}, 'slow');


           

        }else{
            $('#formulario').submit();
            console.log('submit');
           
           

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
                    'latitud': $('#latitud').val(),
                    'longitud': $('#longitud').val(),
                    'email': $('#email').val(),
                    'direccion': $('#direccion').val(),
    
                    'cargo': $('#cargo').val(),
    
                    
                   
    
    
                }
            );
          
    
            //validar formulario
           
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
            });
        })
       

    




    
});
})(jQuery);

//nombres

$("#razon_social,#nombre_representante").on(
	"keyup",
	function () {
		"use strict";
		var razon_social = $(this).val();
       
        


		var expresion = /^[a-zA-Z\s]*$/;

		if (expresion.test(razon_social)) {
			$("#razon_social")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
                                
		} else {
			
			$("#razon_social")
				.removeClass("is-valid")
				.addClass("is-invalid");
                                     
		}
	}
);
//nombres

$("#nombre_representante").on(
	"keyup",
	function () {
		"use strict";
		var nombre_representante = $(this).val();
       
        


		var expresion = /^[a-zA-Z\s]*$/;

		if (expresion.test(nombre_representante)) {
			$("#nombre_representante")
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
                                
		} else {
			
			$("#nombre_representante")
				.removeClass("is-valid")
				.addClass("is-invalid");
                                     
		}
	}
);
//RIF
$("#rif").on("keyup", function () {
    "use strict";
    var rif = $(this).val();
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

$("#telf_local_representante").on("keyup", function () {
	"use strict";
	var telf_local_representante = $("#telf_local_representante").val();
	var expresion = /^\d{7,13}$/;

	if (expresion.test(telf_local_representante)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
		$("#telf_local_representante").removeClass("is-valid").addClass("is-invalid");
	}
});

$("#email").on("keyup", function () {
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
		$("#email").removeClass("is-valid").addClass("is-invalid");
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

    
 


