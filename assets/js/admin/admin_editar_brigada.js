

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
		var id_rol_estructura = $("#id_rol_estructura").val();

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
                id_rol_estructura

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
    
       }
    }




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
