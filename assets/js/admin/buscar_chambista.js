

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

        url: base_url + "ajax/Cbuscar_chambista",
        type: "post",
        beforeSend: function () {
            //$("#cod_municipio").selectpicker('refresh');
        },
        success: function (respuesta) {
            console.log(respuesta)
            

            if (respuesta.resultado == true) {
                var data=respuesta.mensaje;
           
                $('#tabla-chambista tbody').html("")
           var htmlTags =  `<tr>'+
           <td>1</td>
           <td>  ${data.nombres}</td>
           <td>  ${data.apellidos}</td>
           <td> ${data.empleo}</td>
           <td> <div class="btn-list">
           <button type="button" class="btn btn-sm btn-primary ">
               <span class="fs-6"><a class="text-white"
                href="${base_url}admin/editar_chambista/${data.id_usuario} ">✎</a></span></button>
                </div>  </td>+
         </tr> `;
         
      $('#tabla-chambista tbody').append(htmlTags);


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