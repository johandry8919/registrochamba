


(function ($) {

    $("#form-estructura").submit(function(e) {
        e.preventDefault();
        ingresar();
    });


    $("#login-empresa").submit(function(e) {
        e.preventDefault();
        ingresarEmpresa();
    });


    ingresarEmpresa
})(jQuery);
    

function ingresar(){
       var  email =$("#emaile").val();
       var  password =$("#passworde").val();
    $.ajax({
        dataType: "json",
        data: {email,password
           
        },

        url: base_url + "Estructuras/validarSession",
        type: "post",
        beforeSend: function () {
            $("#loginbtn").html('Validando..');
        },
        success: function (respuesta) {
            
          

            if (respuesta.resultado == false) {
                Swal.fire({
                    icon: "error",
                    title: "Oops...",
                    text: respuesta.mensaje,
                });

                $("#loginbtn").html('Ingresar');
            }else{

                $(location).attr("href", base_url + "estructuras");
            }
        },
        error: function (xhr, err) {
            $("#loginbtn").html('Ingresar');
            console.log(err);
            alert("ocurrio un error intente de nuevo");
        },
    });
}



function ingresarEmpresa(){
    var  email =$("#email3").val();
    var  password =$("#password3").val();
 $.ajax({
     dataType: "json",
     data: {email,password
        
     },

     url: base_url + "Empresas/validarSession",
     type: "post",
     beforeSend: function () {
         $("#loginbtn").html('Validando..');
     },
     success: function (respuesta) {
         
       

         if (respuesta.resultado == false) {
             Swal.fire({
                 icon: "error",
                 title: "Oops...",
                 text: respuesta.mensaje,
             });

             $("#loginbtn").html('Ingresar');
         }else{

            
            if(respuesta.tipo_empresa==1){
                $(location).attr("href", base_url + "empresas");
            }else{
                $(location).attr("href", base_url + "universidades");
            }

         
         }
     },
     error: function (xhr, err) {
         $("#loginbtn").html('Ingresar');
         console.log(err);
         alert("ocurrio un error intente de nuevo");
     },
 });
}