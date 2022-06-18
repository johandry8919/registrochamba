
(function ($) {

    $("#formulario-registro").submit(function(e) {
        e.preventDefault();
        registrar();
    });
})(jQuery);
    

function registrar(){


    var $mencion = $("#mencion").val();
    var $duracion = $("#duracion").val();
    var $cupos_disponibles = $("#cupos_disponibles").val();
    var $id_area_formacion = $("#id_area_formacion").val();
    var $id_usuario_registro = $("#id_usuario_registro").val();
    var $duracion = $("#duracion").val();
    var $descripcion = $("#id_descripcion").val();
    var $sexo = $("#sexo").val();
    var $cantidad = $("#id_cantidad").val();
    var $titularidad = $("#titularidad").val();
    var $edad = $("#edad").val();
    

      
   if($mencion != "" && $duracion != "" && $cupos_disponibles != "" && $id_area_formacion != "" && $id_usuario_registro != "" && $duracion != "" && $descripcion != "" && $sexo != "" && $cantidad.match(/^[0-9]+$/) != "" && $titularidad != "" && $edad != ""){
    $.ajax({
        dataType: "json",
        data: {
            mencion: $mencion,
            duracion: $duracion,
            cupos_disponibles: $cupos_disponibles,
            id_area_formacion: $id_area_formacion,
            id_usuario_registro: $id_usuario_registro,
            duracion: $duracion,
            descripcion: $descripcion,
            sexo: $sexo,
            cantidad: $cantidad,
            titularidad: $titularidad,
            edad: $edad,
           
            
           
        },

        url: base_url + "CofertaUniversidades/crear_oferta",
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
                        
                        var $id_rol = $("#id_rol").val();

                        if($id_rol == 2){
                            $(location).attr("href", base_url + ruta+"/ofertasUniversidad");

                        }else if($id_rol == 3){
                            $(location).attr("href", base_url + ruta+"/ofertasUniversidad");
                        }
                           $(location).attr("href", base_url + "universidad/ofertas");

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

   }else{
    // validar solo numero en el campo catidad
    if($cantidad.match(/^[0-9]+$/)){
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "Debe ingresar solo numeros en el campo cantidad",
        });
    }
   }
}
$("#id_instruccion").on("change", function () {
	"use strict";
	var id_instruccion = $(this).val();


    if (id_instruccion) {
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#id_instruccion")
			.removeClass("is-valid")
			.addClass("is-invalid");
    }

});
$("#titularidad").on("change", function () {
	"use strict";
	var titularidad = $(this).val();
    var expresion = /^[a-zA-Z0-9-_\.]+$/;





    if (expresion.test(titularidad)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#titularidad")
			.removeClass("is-valid")
			.addClass("is-invalid");
    }

});

$("#id_area_form").on("change", function () {
	"use strict";
	var id_area_form = $(this).val();
    var expresion = /^[a-zA-Z0-9-_\.]+$/;





    if (expresion.test(id_area_form)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#id_area_form")
			.removeClass("is-valid")
			.addClass("is-invalid");
    }

});
$("#mencion").on("keyup", function () {
	"use strict";
	var mencion = $(this).val();
    // expresion solo numerica
    var expresion = /^[a-zA-Z0-9-_\.]+$/;
   





    if (expresion.test(mencion)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#mencion")
			.removeClass("is-valid")
			.addClass("is-invalid");
    }

});
$("#duracion").on("keyup", function () {
	"use strict";
	var duracion = $(this).val();
    // expresion solo nuumero 

    var expresion = /^[0-9]+$/;
   
   





    if (expresion.test(duracion)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#duracion")
			.removeClass("is-valid")
			.addClass("is-invalid");
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
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#sexo")
			.removeClass("is-valid")
			.addClass("is-invalid");
    }

});
$("#descripcion_oferta").on("keyup", function () {
	"use strict";
	var descripcion_oferta = $(this).val();
    // expresion solo letras
    var expresion = /^[a-zA-Z\s]*$/;
   





    if (descripcion_oferta) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#descripcion_oferta")
			.removeClass("is-valid")
			.addClass("is-invalid");
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
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
        $("#edad").removeClass("is-valid").addClass("is-invalid");
    }
});
$("#id_cantidad").on("keyup", function () {
    "use strict";
    var id_cantidad = $(this).val();
    var expresion = /^[0-9]+$/;
    
    if (expresion.test(id_cantidad)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
        $("#id_cantidad").removeClass("is-valid").addClass("is-invalid");
    }
});
$("#cupos_disponibles").on("keyup", function () {
    "use strict";
    var cupos_disponibles = $(this).val();
    var expresion = /^[0-9]+$/;
    
    if (expresion.test(cupos_disponibles)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
        $("#cupos_disponibles").removeClass("is-valid").addClass("is-invalid");
    }
});
$("#cantidad_oferta ").on("keyup", function () {
    "use strict";
    var cantidad_oferta = $(this).val();
    var expresion = /^[0-9]+$/;
    
    if (expresion.test(cantidad_oferta)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
        $("#cantidad_oferta").removeClass("is-valid").addClass("is-invalid");
    }
});