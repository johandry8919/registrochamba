
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
    $.ajax({
        dataType: "json",
        data: {id_instruccion,id_profesion,id_area_form,experiencia_laboral,cargo,
            descripcion_oferta,edad,cantidad_oferta,id_empresa,sexo
           
        },

        url: base_url + "CofertaEmpleo/crear_oferta",
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
                        $(location).attr("href", base_url + "admin/ofertas");
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