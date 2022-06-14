

(function ($) {

    $("#form-buscar").submit(function(e) {
        e.preventDefault();
        buscar_chambista();
    });
})(jQuery);
    

function buscar_chambista(){
       var  cedula = $("#cedula").val();
 
    $.ajax({
        dataType: "json",
        data: {cedula
           
        },

        url: base_url + "ajax/Cbuscar_estructuras",
        type: "post",
        beforeSend: function () {
            //$("#cod_municipio").selectpicker('refresh');
        },
        success: function (respuesta) {
            console.log(respuesta)
            

            if (respuesta.resultado == true) {
                var data=respuesta.mensaje;
                // data.id_usuario
                // cambiar la contraseña de la estructura
           
                $('#tabla-chambista tbody').html("")
                // cambiar la contraseña de la estructura
           var htmlTags =  `
              <div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Cédula</label>    
                            <input type="text" class="form-control" id="cedula" name="cedula" value="${data.cedula}" readonly>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label for="">Nombre</label>
                            <input type="text" class="form-control" id="nombre" name="nombre" value="${data.nombres}" readonly>
                        </div>
                    </div>
                </div>

                
                 `;
         
      $('#tabla-chambista').append(htmlTags);


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