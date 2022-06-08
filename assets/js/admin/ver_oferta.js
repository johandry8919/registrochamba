$(function(e) {
	$(".demo-accordion").accordionjs();
    $("#form-buscar").submit(function(e) {
        e.preventDefault();
        buscar_chambista();
    });

	$("#btn-postular").click(function(e) {

        postular_chambista();
    });

	
	$("#eliminar-chambista").click(function(e) {

        eliminar_chambista();
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
   
		url: base_url + "ajax/Cpostular_chambista",
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

	url: base_url + "ajax/Celiminar_chambista",
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