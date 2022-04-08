$(function () {
    $('#sign_up').validate({
        rules: {
            'cedula': {
                required : true,
                minlength : 7,
                maxlength: 8,
                digits: true
            },
            'nac': {
                required : true
            },
            'email':{
                required : true,
                email: true,
                maxlength: 60
            },
            'emailr':{
                required : true,
                email: true,
                maxlength: 100,
                equalTo: '[name="email"]',
            },
            'password':{
                required : true,
                minlength : 6,
                maxlength: 16                
            },
            'passwordr':{
                required : true,
                equalTo: '[name="password"]'
            }
        },
        messages:
        {
            cedula:{required: 'El campo es requerido', minlength: 'Debe ser mayor o igual a 7 caracteres', digits: 'Permitido solo números', maxlength: 'Debe ser menor o igual a 8 caracteres'},
            nac:{required: 'El campo es requerido'},
            email:{required: 'El campo es requerido', email: 'Dirección de Correo invalido', maxlength: 'Debe ser menor o igual 100 caracteres'},
            emailr:{required: 'El campo es requerido', email: 'Dirección de Correo invalido', maxlength: 'Debe ser menor o igual 100 caracteres', equalTo:'Debe coincidir con el campo email'},
            password:{required: 'El campo es requerido', minlength:'La contraseña debe ser mayor o igual a 6 caracteres', maxlength:'La contraseña debe ser menor o igual a 16 caracteres'},
            passwordr:{required: 'El campo es requerido', equalTo: 'Debe coincidir con el campo contraseña'}
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

