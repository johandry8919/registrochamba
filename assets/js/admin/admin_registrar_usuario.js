

(function ($) {

    $("#formulario-registro").submit(function(e) {
        e.preventDefault();
        registrar_usuario();
    });
})(jQuery);
    

function registrar_usuario(){
       var  email = $("#email").val();
       var  password =$("#password").val();
       var  nombre = $("#nombre").val();
       var  cedula = $("#cedula").val();
       var  id_rol = $("#id_rol").val();
    $.ajax({
        dataType: "json",
        data: {email,password,nombre,cedula,id_rol
           
        },

        url: base_url + "Cadmin/crear_usuario",
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
                        $(location).attr("href", base_url + "admin");
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