(function ($) {

    $("#cambioClave").submit(function(e) {
        e.preventDefault();
        registrar();
    });
})(jQuery);
    

function registrar(){
    var clave_actual = $("#clave_actual").val();
    var password = $("#password").val();
    var new_password = $("#new_password").val();
    var id_admin = $("#id_admin").val();
    $.ajax({
        dataType: "json",
        data: {
            clave_actual: clave_actual,
            password: password,
            new_password: new_password,
            id_admin: id_admin

           
        },

        url: base_url + "Cadmin/admin_cambiarClaves",
        type: "post",
        beforeSend: function () {
            //$("#cod_municipio").selectpicker('refresh');
        },
        success: function (respuesta) {
            console.log(respuesta);
            

            if (respuesta.resultado == true) {
                Swal.fire({
                    icon: "success",
                    title: "Registro Exitoso",
                    text: "Presione OK para continuar",
                }).then((result) => {
                    /* Read more about isConfirmed, isDenied below */
                    if (result.isConfirmed) {
                        $(location).attr("href", base_url + "admin/inicio");
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