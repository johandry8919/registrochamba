///Estado
var arr_map= [];
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

$("#cod_estado").change(function () {
	buscarMunicipios();
});
$("#cod_municipio").change(function () {
	buscarParroquia();
});

//

$("#form-map").submit(function (e) {
	e.preventDefault();

	const accion =e.originalEvent.submitter.name;


		obtener_reporte_chambista(accion);
	

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

var input_latitud = 0;
var input_longitud = 0;
var coordinates = 0;

var latitud = "8.2321";
var longitud = "-66.406";

agregarMapa(latitud, longitud, 5);



 

async function obtener_reporte_chambista(accion) {
	var cod_estado = $("#cod_estado").val();
	var cod_municipio = $("#cod_municipio").val();
	var cod_parroquia = $("#cod_parroquia").val();
	var fecha_inicio = $("#fecha_inicio").val();
	var fecha_fin = $("#fecha_fin").val();

	var sweet_loader = '<div class="sweet_loader"><svg viewBox="0 0 140 140" width="140" height="140"><g class="outline"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="rgba(0,0,0,0.1)" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round"></path></g><g class="circle"><path d="m 70 28 a 1 1 0 0 0 0 84 a 1 1 0 0 0 0 -84" stroke="#71BBFF" stroke-width="4" fill="none" stroke-linecap="round" stroke-linejoin="round" stroke-dashoffset="200" stroke-dasharray="300"></path></g></svg></div>';
	if(accion==2)
		location.href=base_url+'admin/reportes/excel_chambistas?cod_estado='+cod_estado+'&cod_municipio='+cod_municipio+'&cod_parroquia='+cod_parroquia+'&fecha_inicio='+fecha_inicio+'&fecha_fin='+fecha_fin
		else		
	$.ajax({
		dataType: "json",
		data: { cod_estado, cod_municipio, cod_parroquia, fecha_inicio,fecha_fin },

		url: base_url + "Creportes/obtener_reporte_chambista",
		type: "post",
		beforeSend: function () {
			swal.fire({
				html: '<h5>Espere un momento, consultando ...<br> Puede demorar unos minutos no cierre esta pestaña</h5>',
				showConfirmButton: false,
				onRender: function() {
					 // there will only ever be one sweet alert open.
					 $('.swal2-content').prepend(sweet_loader);
				}
			})
		},
		success: function (respuesta) {
			if (respuesta.resultado == true) {
				swal.fire({
					icon: 'success',
					html: '<h5>Se encontraron resultados en su busqueda!</h5>',
					showConfirmButton: false,
					timer: 1500
				});
				//console.log(respuesta.res);
            let data =respuesta.res;

			$('.tabla-resultados').html(respuesta.excel);
			var table = $('#tabla-reporte').DataTable({
				dom: 'Bfrtip',
			
				language: idioma_espanol
			});
			
	
			arr_map= [];
			var latitud_e = $(" option:selected", $('#cod_estado')).attr("data-latitud");
			var longitud_e = $("option:selected", $('#cod_estado')).attr("data-longitud");
            data.forEach(element => {

					var COLOR='#8B4293';
				
                let puntero ={
                    'type': 'Feature',
                    'properties': {
					'marker-color': COLOR,
                    'description':`<strong> ${element.nombres}  ${element.apellidos}</strong>
					<p>Situación laboral:${element.empleo}</p>
					<p>telefonos:${element.telf_cel}  ${element.telf_local}</p>
				
					
				
					`
					
                    },
                    'geometry': {
                    'type': 'Point',
                    'coordinates': [element.longitud, element.latitud]
                    }
                    }

					latitud_e =element.latitud;
					longitud_e=element.longitud;
        
                arr_map.push(puntero);
              
                
            });


		
		
				if($('#cod_estado').val()=='todos'){
					agregarMapa(latitud, longitud, 5);
				}else{

					agregarMapa(latitud_e, longitud_e, 10);
				}
			

				
	

			} else {
				$("#rango_fecha option[value=1]").attr("selected",true);
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: respuesta.mensaje,
				});
				arr_map=[];
				agregarMapa(latitud, longitud, 5);
			}
		},
		error: function (xhr, err) {
			console.log(err);
			alert("ocurrio un error intente de nuevo");
		},
	});
}


$("#cod_estado").change(function () {
	let latitud_e = $("option:selected", $(this)).attr("data-latitud");
	let longitud_e = $("option:selected", $(this)).attr("data-longitud");

	agregarMapa(latitud_e, longitud_e, (zoom = 6));

	input_latitud.value = latitud_e;
	input_longitud.value = latitud_e;
});

$("#cod_parroquia").change(function () {
	// agregarMapa(latitud_e, longitud_e, (zoom = 12));
});

function agregarMapa(lat = "8.2321", long = "-66.406", zoom = 13, data=[]) {
	document.getElementById("map").innerHTML = "";
	if (!mapboxgl.supported()) {
		alert("Your browser does not support MapLibre GL");
	} else {
		mapboxgl.accessToken =
			"pk.eyJ1IjoiamhvbmF0YW5yZGV2IiwiYSI6ImNsMGlwYXkxazAzZG4zZG0yY3dlMWV6Z2IifQ.vAVh-JhFU7MME4lcdBk9og";
		const map = new mapboxgl.Map({
			container: "map", // container ID
			style: "mapbox://styles/mapbox/streets-v11", // style URL
			center: [long, lat], // starting position [lng, lat]
			zoom: zoom, // starting zoom
		});

	

		map.addControl(new mapboxgl.NavigationControl());



		map.on("load", () => {
			map.addSource("places", {
				type: "geojson",
				data: {
					type: "FeatureCollection",
					features:JSON.parse(JSON.stringify(arr_map))
				},
			});
			// Add a layer showing the places.
			map.addLayer({
				id: "places",
				type: "circle",
				source: "places",
				paint: {
					"circle-color": "#4264fb",
					"circle-radius": 6,
					"circle-stroke-width": 2,
					"circle-stroke-color": "#ffffff",
				},
			});

			// Create a popup, but don't add it to the map yet.
			const popup = new mapboxgl.Popup({
				closeButton: false,
				closeOnClick: false,
			});

			map.on("mouseenter", "places", (e) => {
				// Change the cursor style as a UI indicator.
				map.getCanvas().style.cursor = "pointer";

				// Copy coordinates array.
				const coordinates = e.features[0].geometry.coordinates.slice();
				const description = e.features[0].properties.description;

				// Ensure that if the map is zoomed out such that multiple
				// copies of the feature are visible, the popup appears
				// over the copy being pointed to.
				while (Math.abs(e.lngLat.lng - coordinates[0]) > 180) {
					coordinates[0] += e.lngLat.lng > coordinates[0] ? 360 : -360;
				}

				// Populate the popup and set its coordinates
				// based on the feature found.
				popup.setLngLat(coordinates).setHTML(description).addTo(map);
			});

			map.on("mouseleave", "places", () => {
				map.getCanvas().style.cursor = "";
				popup.remove();
			});
		});

		return map;
	}
}

function agregarMarker(lat, lon, map, marker) {
	//marquer
	map.on("click", (e) => {
		let latc = e.lngLat.wrap().lat;
		let lgn = e.lngLat.wrap().lng;
		marker.setLngLat([lgn, latc]).addTo(map);

		coordinates.style.display = "block";
		coordinates.innerHTML = "Longitude: " + lgn + "<br />Latitude: " + latc;
		input_latitud.value = latc;
		input_longitud.value = lgn;
	});
}


$("#rango_fecha").change(function(e){

	var seleccion_fecha = $(this).val();


	if(seleccion_fecha==2)
	$("#modal-fecha-chambista").modal("show");
	else
	$("#modal-fecha-chambista").modal("hide");
})

$("#btn-fecha").click(function(e){



	var fecha_inicio = $("#fecha_inicio").val()
	var fecha_fin = $("#fecha_fin").val()



	if(Date.parse(fecha_fin) < Date.parse(fecha_inicio)) {

		alert("La fecha final debe ser mayor a la fecha inicial");
	$("#fecha_inicio").val("")
 $("#fecha_fin").val("")

	 }else{
		$("#modal-fecha-chambista").modal("hide");
		$("#f-inicio").html(fecha_inicio)
		$("#f-fin").html(fecha_fin)
//$("#rango_fecha option[value=1]").attr("selected",true);
	 }

});




