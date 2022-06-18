
(function ($) {

    $("#formulario-registro").submit(function(e) {
        e.preventDefault();
        registrar();
    });
})(jQuery);
    

function registrar(){
       var  id_instruccion = $("#id_instruccion").val();
       var  id_profesion   = $("#id_profesion").val();
       var  id_area_form   = $("#id_area_form").val();
       var  experiencia_laboral = $("#experiencia_laboral").val();
       var  cargo = $("#cargo").val();
       var  descripcion_oferta = $("#descripcion_oferta").val();
       var  edad = $("#edad").val();
       var  cantidad_oferta = $("#cantidad_oferta").val();
       var  id_empresa = $("#id_empresa").val();
       var  sexo = $("#sexo").val();
       var id_oferta = $("#id_oferta").val();
       var estatus = $("#estatus").val();

       if(id_instruccion != "" && id_profesion != "" && id_area_form != "" && experiencia_laboral != "" && cargo != "" && descripcion_oferta != "" && edad != "" && cantidad_oferta != "" && id_empresa != "" && sexo != ""){
        $.ajax({
            dataType: "json",
            data: {id_instruccion,id_profesion,id_area_form,experiencia_laboral,cargo,
                descripcion_oferta,edad,cantidad_oferta,id_empresa,sexo, id_oferta,estatus
               
            },
    
            url: base_url + "CofertaEmpleo/update_oferta",
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
                                $(location).attr("href", base_url + "admin/ofertas");
                            }else if(  $id_rol == 3){
                                $(location).attr("href", base_url + "estructuras/ofertas");
                                
                            }else if($id_rol == 5){
                                $(location).attr("href", base_url + "empresas/ofertas");
                            }else if($id_rol == 1){
                                $(location).attr("href", base_url + "admin/ofertas");

                            }else{
                                $(location).attr("href", base_url + "empresas/ofertas");
                            }
                       

                            
                            
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
        if(id_instruccion == 0){
            $("#id_instruccion").focus();
            $("#id_instruccion").css("border-color", "red");
        }
        if(id_profesion == 0){
            $("#id_profesion").focus();
            $("#id_profesion").css("border-color", "red");
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
$("#id_profesion").on("change", function () {
	"use strict";
	var id_profesion = $(this).val();
    var expresion = /^[a-zA-Z0-9-_\.]+$/;





    if (expresion.test(id_profesion)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#id_profesion")
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
$("#experiencia_laboral").on("keyup", function () {
	"use strict";
	var experiencia_laboral = $(this).val();
    // expresion solo numerica
    var expresion = /^\d{1,1000}$/;;
   





    if (expresion.test(experiencia_laboral)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#experiencia_laboral")
			.removeClass("is-valid")
			.addClass("is-invalid");
    }

});
$("#cargo").on("keyup", function () {
	"use strict";
	var cargo = $(this).val();
    // expresion solo letras
    var expresion = /^[a-zA-Z\s]*$/;
   





    if (expresion.test(cargo)) {
       
        $(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
    }else{
        $(this).removeClass("is-invalid error-input").addClass("is-valid");
		$("#cargo")
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
$("#cantidad_oferta").on("keyup", function () {
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