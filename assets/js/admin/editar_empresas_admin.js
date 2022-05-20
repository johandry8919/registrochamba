(function ($) {

    $("#form-actualizar_empresa").submit(function(e) {
        e.preventDefault();

        if(validar_registro())
        actualizar_empresa();
    });
})(jQuery);
    

function actualizar_empresa(){
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
			 var direccion_empresa= $("#direccion_empresa").val();
			 var instagram= $("#instagram").val();
			 var twitter= $("#twitter").val();
			 var facebook= $("#facebook").val();
			 var password= $("#password").val();
			 
			 
		$.ajax({
				dataType: "json",
				data: {razon_social, rif,telf_movil, email, sector_economico,actividad_economica,
					nombre_representante,apellidos_representante,cedula_representante,telf_movil_representante,
					email_representante,cargo,cod_estado,cod_municipio,
					cod_parroquia,latitud,longitud,telf_local_representante,
					direccion_empresa,instagram,twitter,facebook,password
				
				},
				url: base_url + "Cadmin/actulizar_empresa",
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

			
		
	
}

	//validacion
	$('#razon_social').on('keyup', function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[a-zA-Z\s]*$/;
	  
		if (expresion.test(nombres)) {
			$(this).removeClass('is-invalid error-input').addClass('is-valid valid-input');
				
		}else{
            
			$(this).removeClass('is-valid valid-input').addClass('is-invalid error-input');
        }
	});

	$('#razon_social, #nombre_representante, #apellidos_representante, #cargo').on('keyup', function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[a-zA-Z\s]*$/;
	  
		if (expresion.test(nombres)) {
			$(this).removeClass('is-invalid error-input').addClass('is-valid valid-input');
				
		}else{
            
			$(this).removeClass('is-valid valid-input').addClass('is-invalid error-input');
        }
	});



	$(' #telf_movil_representante, #telf_movil, #cedula_representante').on('keyup', function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^\d{7,11}$/;
	  
		if (expresion.test(nombres)) {
			$(this).removeClass('is-invalid error-input').addClass('is-valid valid-input');
				
		}else{
            
			$(this).addClass('is-invalid error-input').removeClass('is-valid valid-input');
        }
	});

	$('#rif').on('keyup', function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[a-zA-Z\s]*$/;
	  
		if (expresion.test(nombres)) {
			$(this).removeClass('is-invalid error-input').addClass('is-valid valid-input');
				
		}else{
            
			$(this).addClass('is-invalid error-input').removeClass('is-valid valid-input');
        }
	});


	
	$('#email, #email_representante').on('keyup', function () {
		"use strict";
		var nombres = $(this).val();
		var expresion = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;
	  
		if (expresion.test(nombres)) {
			$(this).removeClass('is-invalid error-input').addClass('is-valid valid-input');
				
		}else{
            
			$(this).addClass('is-invalid error-input').removeClass('is-valid valid-input');
        }
	});
	

    function validar_registro(){

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
        }{
            alert("aqui")
            if(!nombre_representante.isValid())
            $('#nombre_representante').removeClass('is-valid').addClass('is-invalid  error-input');
            

            if(!apellidos_representante.isValid())
            $('#apellidos_representante').removeClass('is-valid').addClass('is-invalid  error-input');
            
            if(!cedula_representante.isValid())
            $('#cedula_representante').removeClass('is-valid').addClass('is-invalid  error-input');
                                    
            if(!telf_movil_representante.isValid())
            $('#telf_movil_representante').removeClass('is-valid').addClass('is-invalid  error-input');
            
            if(!email_representante.isValid())
            $('#email_representante').removeClass('is-valid').addClass('is-invalid  error-input');
            
            if(!cargo.isValid())
            $('#cargo').removeClass('is-valid').addClass('is-invalid  error-input');

        }


						
        return false;


    }