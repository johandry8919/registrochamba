(function ($) {
	$("#consultarmap").click(function () {
		obtener_coordenadas_empresa();
	});
})(jQuery);

async function obtener_coordenadas_empresa(accion) {
	var cod_estado = $("#cod_estado").val();
	var cod_municipio = $("#cod_municipio").val();
	var cod_parroquia = $("#cod_parroquia").val();
	var id_estructura = $("#id_estructura").val();
 
	$.ajax({
		dataType: "json",
		data: { cod_estado, cod_municipio, cod_parroquia, id_estructura },

		url: base_url + "ajax/Cobtener_coord_brigada",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			if (respuesta.resultado == true) {
				//console.log(respuesta.res);
				let data = respuesta.res;
				var listar = "";
				console.log(listar);

				$("#basic-datatable tbody").html("");
				data.forEach((element) => {
					listar = `
       
                     <tr>
                         <td>
                         <div class="btn-list">
                             <button type="button" class="btn btn-sm btn-primary ">
                                 <span class="fs-6">
                                     <a class="text-white"
                                         href="editar/estructuras/${element.id_brigada}">&#9998;</a>
                                 </span>
                             </button>

                             <button type="button" class="btn btn-sm btn-success ">
                                 <span class="fs-6">
                                     <a class="text-white"
                                         href="ver/estructura-brigada/${element.id_brigada} ">
                                         <i class="side-menu__icon fe fe-eye"></i>
                                         
                                     </a>
                                 </span>
                             </button> 
                         </div>
                         
                     </td>
					 <td> ${element.nombre_brigada}</td>
                     <td>${element.nombre_rol}</td>
					 <td> ${element.count}</td>
					 <td> ${element.codigo}</td>
                     <td>${element.nombre_sector}</td>
                     <td>${element.nombre_estado}</td>
                     <td>${element.municipio}</td>    
                     <td>${element.parroquia} </td>                             


                 </tr>
                 <input type="hidden" name="${element.id_estructura}" id="${element.id_estructura}">
                
                
                `;
					$("#basic-datatable tbody").append(listar);
				});
			}else{
				$("#basic-datatable tbody").html("");
				$("#basic-datatable tbody").html("<tr><td>Nose encontraron resultados</td><tr/>");
			}
		},
		error: function (xhr, err) {
			console.log(err);
			alert("ocurrio un error intente de nuevo");
		},
	});
}

$("#cod_estado").change(function () {
	
     var id_estructura =  $("#id_estructura").val()

     if(id_estructura == 3){
        $("#cod_municipio").html(
			`<option value="01">Todos</option>
            `
		);

        $("#cod_parroquia").html(
			`<option value="01">Todos</option>
            `
		);


     }else if(id_estructura == 10){
        $("#cod_parroquia").html(
			`<option value="01">Todos</option>
            `
		);
        
		buscarMunicipios();
     }else{
        buscarMunicipios();

     }

     
   

    
});

 $("#id_estructura").change(function(){
    if($(this).val() == "00"){
        $("#cod_municipio").html(
			`<option value="01">Todos</option>
            `
		);

        $("#cod_parroquia").html(
			`<option value="01">Todos</option>
            `
		);
   
    }

})
$("#cod_municipio").change(function () {
	var id_estructura = $("#id_estructura").val()
    if(id_estructura == "10"){
     

        $("#cod_parroquia").html(
			`<option value="01">Todos</option>
            `
		);


     }else {
        buscarParroquia();

     }
});

function buscarMunicipios() {
	var estado = $("#cod_estado").val();

	if (estado == "") {
		$("#cod_municipio").html(
			`<option value="">Debe seleccionar un Estado por favor</option>
            `
		);
	} else {
		$.ajax({
			dataType: "json",
			data: { codigoestado: estado },
			url: base_url + "Cchambistas/getMunicipios",
			type: "post",
			beforeSend: function () {
				$("#cod_municipio").html("<option>cargando municipios...</option>");
				//$("#cod_municipio").selectpicker('refresh');
			},
			success: function (respuesta1) {
				$("#cod_municipio").html(`
                
                    ${respuesta1.htmloption1}
                    <option value="01">Todos</option>
                    `);
				//$("#cod_municipio").selectpicker('refresh');
			},
			error: function (xhr, err) {
				alert(
					"readyState =" +
						xhr.readyState +
						" estado =" +
						xhr.status +
						"respuesta =" +
						xhr.responseText
				);
				//alert("ocurrio un error intente de nuevo");
			},
		});
	}
}

function buscarParroquia() {
	var municipio = $("#cod_municipio").val();
	var estado = $("#cod_estado").val();

	if (municipio == "") {
		$("#cod_parroquia").html(
			'<option value="">Debe seleccionar un Municipio por favor</option>'
		);
	} else {
		$.ajax({
			dataType: "json",
			data: { codigomunicipio: municipio, codigoestado: estado },
			url: base_url + "Cchambistas/getParroquias",
			type: "post",
			beforeSend: function () {
				$("#cod_parroquia").html("<option>cargando parroquias...</option>");
				//$("#cod_parroquia").selectpicker('refresh');
			},
			success: function (respuesta1) {
				$("#cod_parroquia").html(`
            
                ${respuesta1.htmloption2}
                <option value="01">Todos</option>
                `);
				//  $("#cod_parroquia").selectpicker('refresh');
			},
			error: function (xhr, err) {
				alert(
					"readyState =" +
						xhr.readyState +
						" estado =" +
						xhr.status +
						"respuesta =" +
						xhr.responseText
				);
				//alert("ocurrio un error intente de nuevo");
			},
		});
	}
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

var table = $('#basic-datatable').DataTable({
    dom: 'Bfrtip',

    language: idioma_espanol
});
