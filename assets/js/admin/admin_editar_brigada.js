

(function ($) {
	"use strict";

    $("#formulario-registro").submit(function(e) {
        e.preventDefault();
        registrar();
    });



    function registrar(){
		


        var $id_estructura = $("#id_estructura").val();
        var $nombre_brigada = $("#nombre_brigada").val();
        var $nombre_comunidad = $("#nombre_comunidad").val();
        var $direccion = $("#direccion").val();
        var $cod_estado = $("#cod_estado").val();
        var $cod_municipio = $("#cod_municipio").val();
        var $cod_parroquia = $("#cod_parroquia").val();
        var $id_usuario = $("#id_usuario").val();
		var latitud = $("#latitud").val();
		var longitud = $("#longitud").val();
		var id_brigada = $("#id_brigada").val();

       if($id_estructura != "" && $nombre_brigada != "" && $nombre_comunidad != "" && $direccion != "" && $cod_estado != "" && $cod_municipio != "" && $cod_parroquia != ""){



        $.ajax({
            dataType: "json",
            data: {
                id_estructura:$id_estructura,
                nombre_brigada:$nombre_brigada,
                nombre_comunidad:$nombre_comunidad,
                direccion:$direccion,
                cod_estado:$cod_estado,
                cod_municipio:$cod_municipio,
                cod_parroquia:$cod_parroquia,
				id_usuario:$id_usuario,
				latitud,
				longitud,
                id_brigada

            },

            url: base_url + "Cadmin/brigada_post",
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
						var $id_usuario = $("#id_usuario").val();
                        /* Read more about isConfirmed, isDenied below */
                        if (result.isConfirmed) {
							$(location).attr("href", base_url + "admin/listar_brigada");
    
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
		alert($id_estructura)
		if($nombre_brigada == ""){
			$("#nombre_brigada").css("border-color", "#FF0000");
			$( "#nombre_brigada" ).focus();
		}else{
			$("#nombre_brigada").css("border-color", "#ccc");
		}
		if($nombre_comunidad == ""){
			$("#nombre_comunidad").css("border-color", "#FF0000");
			$( "#nombre_comunidad" ).focus();
		}else{
			$("#nombre_comunidad").css("border-color", "#ccc");
		}
	   }
    }




})(jQuery);

$("#nombre_brigada").on(
	"keyup",
	function () {
		"use strict";
		var nombres = $(this).val();

		var expresion = /^[a-zA-Z\s]*$/;

		if (expresion.test(nombres)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#nombre_brigada")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	}
);
$("#nombre_comunidad").on(
	"keyup",
	function () {
		"use strict";
		var nombres = $(this).val();

		var expresion = /^[a-zA-Z\s]*$/;

		if (expresion.test(nombres)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#nombre_comunidad")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	}
);

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

$("#id_estructura").on("change", function () {
	"use strict";
	var id_estructura = $(this).val();
	var expresion = /^\d{1}$/;

	if (expresion.test(id_estructura)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	}
});

$("#cod_estado").on("change", function () {
	"use strict";
	var estado = $(this).val();
	var expresion = /^\d{1}$/;

	if (expresion.test(estado)) {
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

	if (expresion.test(cod_municipio)) {
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

	if (expresion.test(cod_parroquia)) {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	} else {
		$(this)
			.removeClass("is-invalid error-input")
			.addClass("is-valid valid-input");
	}
});








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
