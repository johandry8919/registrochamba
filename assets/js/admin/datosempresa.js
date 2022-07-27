$("#razon_social").on("keyup", function () {
    "use strict";
    var nombres = $(this).val();
    var expresion = /^[a-zA-Z0-9-_\.]+$/;

    if (nombres) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});

$("#nombre_representante").on("keyup", function () {
    "use strict";
    var nombre_representante = $(this).val();
    var expresion = /^[a-zA-Z-_\.]+$/;

    if (expresion.test(nombre_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});
$("#cargo").on("keyup", function () {
    "use strict";
    var cargo = $(this).val();
    var expresion = /^[a-zA-Z-_\.]+$/;

    if (expresion.test(cargo)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});

$("#apellidos_representante").on("keyup", function () {
    "use strict";
    var apellidos_representante = $(this).val();
    var expresion = /^[a-zA-Z-_\.]+$/;

    if (expresion.test(apellidos_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});

$("#cedula_representante").on("keyup", function () {
    "use strict";
    var cedula_representante = $(this).val();
    var expresion = /^[0-9]+$/;

    if (expresion.test(cedula_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});

$("#rif").on("keyup", function () {
    "use strict";
    var nombres = $(this).val();
    var expresion = /^[a-zA-Z0-9-_\.]+$/;

    if (expresion.test(nombres)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});

$("#email_representante").on("keyup", function () {
    "use strict";
    var email_representante = $(this).val();
    var expresion = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

    if (expresion.test(email_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});
$("#email").on("keyup", function () {
    "use strict";
    var email_representante = $(this).val();
    var expresion = /^[^@]+@[^@]+\.[a-zA-Z]{2,}$/;

    if (expresion.test(email_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    }
});

$("#telf_movil").on("keyup", function () {
    "use strict";
    var telf_local_representante = $("#telf_movil").val();
    var expresion = /^[0-9]+$/;

    if (expresion.test(telf_local_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});
$("#telf_local_representante").on("keyup", function () {
    "use strict";
    var telf_local_representante = $("#telf_local_representante").val();
    var expresion = /^[0-9]+$/;

    if (expresion.test(telf_local_representante)) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});
//Estado
$("#cod_estado").on("change", function () {
    "use strict";
    var estado = $(this).val();
    var expresion = /^\d{1}$/;

    if (estado) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this).removeClass("is-valid").addClass("is-invalid error-input");
    }
});
$("#cod_municipio").on("change", function () {
    "use strict";
    var cod_municipio = $(this).val();
    var expresion = /^\d{1}$/;

    if (cod_municipio) {
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

    if (cod_parroquia) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    }
});

//Dirección Especifica
$("#direccion").on("keyup", function () {
    "use strict";
    var direccion_especifica = $(this).val();
    var expresion = /^[a-zA-Z0-9\s]*$/;

    if (direccion_especifica) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    }
});

$("#sector_economico").on("change", function () {
    "use strict";
    var sector_economico = $(this).val();

    if (sector_economico) {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $(this)
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
        $("#sector_economico").removeClass("is-valid").addClass("is-invalid");
    }
});
$("#actividad_economica").on("change", function () {
    "use strict";
    var actividad_economica = $(this).val();
    // var expresion = /^[a-zA-Z\s]*$/;

    if (actividad_economica) {
        $("#actividad_economica")
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
    } else {
        $("#actividad_economica")
            .removeClass("is-invalid error-input")
            .addClass("is-valid valid-input");
        $("#actividad_economica").removeClass("is-valid").addClass("is-invalid");
    }
});



$("#cod_estado").change(function () {
buscarMunicipios();
});
$("#cod_municipio").change(function () {
buscarParroquia();
});

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
