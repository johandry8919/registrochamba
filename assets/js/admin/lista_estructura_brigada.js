
var idioma_espanol = {
    "sProcessing":     "Procesando...",
  "sLengthMenu": 'Mostrar <select>'+
    '<option value="10">10</option>'+
    '<option value="20">20</option>'+
    '<option value="30">30</option>'+
    '<option value="40">40</option>'+
    '<option value="50">50</option>'+
    '<option value="-1">All</option>'+
    '</select> registros',    
  "sZeroRecords":    "No se encontraron resultados",
  "sEmptyTable":     "Ningún dato disponible en esta tabla",
  "sInfo":           "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
  "sInfoEmpty":      "Mostrando del 0 al 0 de un total de 0 registros",
  "sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
  "sInfoPostFix":    "",
  "sSearch":         "Buscar:",
  "sUrl":            "",
  "sInfoThousands":  ",",
  "sLoadingRecords": "Por favor espere - cargando...",
  "oPaginate": {
    "sFirst":    "Primero",
    "sLast":     "Último",
    "sNext":     "Siguiente",
    "sPrevious": "Anterior"
  },
  "oAria": {
    "sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
    "sSortDescending": ": Activar para ordenar la columna de manera descendente"
  },
  scrollX: "100%"
}

var table = $('#basic-datatable').DataTable({
    dom: 'Bfrtip',

    language: idioma_espanol
});




$(".btn-eliminar-integrante").click(function (e) {

 var id_estructura= $(this).data('id')
  Swal.fire({
    title: '¿Estas seguro?',
    text: "¡No podrás revertir esto!!",
    icon: 'warning',
    showCancelButton: true,
    confirmButtonColor: '#3085d6',
    cancelButtonColor: '#d33',
    confirmButtonText: 'Si, Eliminar!'
  }).then((result) => {
    if (result.isConfirmed) {


      $.ajax({
        dataType: "json",
        data: {id_estructura
           
        },

        url: base_url + "ajax/Cbuscar_estructuras/eliminar_estructura",
        type: "post",
        beforeSend: function () {
            //$("#cod_municipio").selectpicker('refresh');
        },
        success: function (respuesta) {
            

            if (respuesta.resultado == true) {
              Swal.fire(
                'Eliminado!',
                'Se completo esta accion con exito',
                'success'
              )

              setTimeout(() => {

                location.reload();
                
              }, 200);
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
  })


})