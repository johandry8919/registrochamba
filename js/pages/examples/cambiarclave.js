$(function () {
    $('#cambioClave').validate({
        rules: {
            'clave_actual':{
                required : true,
                maxlength: 16
            },
            'password':{
                required : true,
                minlength : 6,
                maxlength: 16                
            },
            'new_password':{
                required : true,
                equalTo: '[name="password"]'
            }
        },
        messages:
        {
            email:{required: 'El campo es requerido', email: 'Dirección de Correo invalido', maxlength: 'Debe ser menor o igual 100 caracteres'},
            password:{required: 'El campo es requerido', minlength:'La contraseña debe ser mayor o igual a 6 caracteres', maxlength:'La contraseña debe ser menor o igual a 16 caracteres'}
        },        
        highlight: function (input) {
            console.log(input);
            $(input).parents('.form-line').addClass('error');
        },
        unhighlight: function (input) {
            $(input).parents('.form-line').removeClass('error');
        },
        errorPlacement: function (error, element) {
            $(element).parents('.input-group').append(error);
        },
        submitHandler: function (form) {
            form.submit(form);
            $('#boton').remove();
            $("#loader_romel").show();
        }
    });
});