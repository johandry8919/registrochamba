$(function(e) {
	$(".demo-accordion").accordionjs();
    $("#form-buscar").submit(function(e) {
        e.preventDefault();
        buscar_chambista();
    });

	$("#btn-postular").click(function(e) {

        postular_chambista();
    });

	$("#btn-cambiar_estatus").click(function(e) {

		if($("#estatus_chambista").val() == ""){
			$("#modal_estatus_chambistas").modal('hide');
			Swal.fire({
				icon: "error",
				title: "Campo requeridos",
				text: 'Seleccione un estatus',
			});
		}else{
			actualizar_estatus_chambista()
		}
	
    });

	
	
	$(".eliminar-chambista").click(function(e) {

        eliminar_chambista();
    });

	$(".cambiar_estatus_chambista").click(function(e) {

		$("#modal_estatus_chambistas").modal('show');

		var id_oferta_chambista = $(this).data('id_oferta_chambista');
		var nombres = $(this).data('nombres');
		var apellidos = $(this).data('apellidos');
		var estatus_chamba = $(this).data('estatus_chamba');
		$("#id_oferta_chambista").val(id_oferta_chambista)
		$("#nombre_estatus").val(nombres)
		$("#apellido_estatus").val(apellidos)
		$("#estatus_chamba").val(estatus_chamba)
    });

	
	// Demo text. Let's save some space to make the code readable. ;)
});





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
		
			 $("#modalchambista").modal('show')
			 $("#nombre").val(data.nombres)
			 $("#apellido").val(data.apellidos)
			 $("#ccedula").val(data.cedula)
			 $("#fecha_nac").val(data.fecha_nac)
			 $("#celular").val(data.telf_cel)
			 $("#tlflocal").val(data.telf_local)
			 $("#laboral").val(data.empleo)
			 $("#estado").val(data.estado)
			 $("#municipio").val(data.municipio)
			 $("#parroquia").val(data.parroquia)
			 $("#id_usario_chambista").val(data.id_usuario)
			 
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


function postular_chambista(){
	var id_usario_chambista= $("#id_usario_chambista").val()
	var id_oferta = $("#id_oferta").val()
	$("#modalchambista").modal('hide')

	$.ajax({
		dataType: "json",
		data: {id_usario_chambista, id_oferta
		   
		},
   
		url: base_url + "ajax/Cpostular_chambista_universidad",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta)
			
   
			if (respuesta.resultado == true) {
	
				location.reload();
			
				
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


function actualizar_estatus_chambista(){
	var estatus_chambista= $("#estatus_chambista").val()
	var id_oferta = $("#id_oferta_chambista").val()
	$("#modalchambista").modal('hide')

	$.ajax({
		dataType: "json",
		data: {estatus_chambista, id_oferta
		   
		},
   
		url: base_url + "ajax/Cactualizar_estatus_chambista_universidad",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta)
			
   
			if (respuesta.resultado == true) {
	
				location.reload();
			
				
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

function eliminar_chambista(){
var id_oferta_chambista=$("#eliminar-chambista").data('id_oferta_chambista'); 

$.ajax({
	dataType: "json",
	data: {id_oferta_chambista
	   
	},

	url: base_url + "ajax/Celiminar_chambista_universidad",
	type: "post",
	beforeSend: function () {
		//$("#cod_municipio").selectpicker('refresh');
	},
	success: function (respuesta) {
		console.log(respuesta)
		

		if (respuesta.resultado == true) {

	    location.reload();
		
			
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

var table = $('#postulados-datatable').DataTable({
    dom: 'Bfrtip',
    buttons: ['copy', 'excel', 'pdf', 'colvis'],
    language: idioma_espanol
});

