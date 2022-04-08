$(function () {
    $('#formacionacademica').validate({
        rules: {
            'centro_educ':{
                required:true,
                minlength : 2,
                maxlength: 250
            },
            'titulo_carrera':{
                required:true,
                minlength : 2,
                maxlength: 250
            },
            'id_instruccion':{
                required:true,
                digits: true
            },'id_area_form':{
                required : true
            },
            'id_estado_inst':{
                required : true
            },
            'reservation':{
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