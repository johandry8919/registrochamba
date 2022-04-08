$(function () {
    $('#verificacion').validate({
        rules: {
            'cedula': {
                required : true,
                minlength : 10,
                maxlength: 10   
            }
        },
        messages:
        {
            cedula:{required: 'El campo es requerido', minlength: 'Debe ser mayor o igual a 7 caracteres', digits: 'Permitido solo números', maxlength: 'Debe ser menor o igual a 8 caracteres'}
        },

        highlight: function (input) {
            //console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
            $(element).parents('.form-group').append(error);
        },
        submitHandler: function (form) {

            form.submit(form);
            $('#boton').remove();
            $("#loader_romel").show();
        }
    });
});

