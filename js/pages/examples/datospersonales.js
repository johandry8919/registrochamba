$(function () {
    $('#datospersonales').validate({
        rules: {
            'nombres':{
                required:true,
                minlength : 2,
                /* alpha: true, */
                maxlength: 30
            },
            'apellidos':{
                required:true,
                minlength : 2,
               /*  alpha: true, */
                maxlength: 30
            },
/*             'nac':{
                required : true
            },
            'cedula':{
                required : true,
                minlength : 7,
                maxlength: 8,
                digits: true
            }, */
            'datepicker':{
                required : true
            },
/*             'correo':{
                required : true,
                email: true,
                maxlength: 50
            }, */
            'estcivil':{
                required : true
            },
            'telf_movil':{
                required:true,
                minlength : 11,
                maxlength: 11,
                digits: true,
                telfmovil:true
            },
            'telf_local':{
                required:true,
                minlength : 11,
                maxlength: 11,
                digits: true,
                telflocal:true
            },
            'cod_estado':{
                required : true
            },
            'cod_municipio':{
                required : true
            },
            'cod_parroquia':{
                required : true
            },
            'direccion':{
                required : true,
                minlength : 3,
                maxlength: 255
            },
            'aborigen':{
                required : true
            },
            'hijo':{
                required : true,
                digits: true
            },
            'estudio':{
                required : true
            },
            'empleo':{
                required : true
            },
            'cne':{
                required : true
            },
            'genero':{
                required : true
            }
        },
        messages:
        {
            email:{required: 'El campo es requerido', email: 'Dirección de Correo invalido', maxlength: 'Debe ser menor o igual 100 caracteres'},
            password:{required: 'El campo es requerido', minlength:'La contraseña debe ser mayor o igual a 6 caracteres', maxlength:'La contraseña debe ser menor o igual a 16 caracteres'}
        },        
        highlight: function (input) {
            console.log(input);
            $(input).parents('.input-group').addClass('error');
/*             $(input).parents('.input-group').addClass('error'); */
        },
        unhighlight: function (input) {
            $(input).parents('.input-group').removeClass('error');/* 
             $(input).parents('.form-line').removeClass('error'); */
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

$.validator.addMethod( "telfmovil", function( value, element ) {
    return this.optional( element ) || /^[0][4|2][0-9]{9}$/i.test( value );
}, "Ingresa un formato correcto" );

$.validator.addMethod( "telflocal", function( value, element ) {
    return this.optional( element ) || /^[0][2|2][0-9]{9}$/i.test( value );
}, "Ingresa un formato correcto" );