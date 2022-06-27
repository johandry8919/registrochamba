///Estado
var arr_map= [];


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


		obtener_coordenadas_empresa(accion);
	

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



 

async function obtener_coordenadas_empresa(accion) {
	var cod_estado = $("#cod_estado").val();
	var cod_municipio = $("#cod_municipio").val();
	var cod_parroquia = $("#cod_parroquia").val();
	var empresa = $("#empresa").val();



	$.ajax({
		dataType: "json",
		data: { cod_estado, cod_municipio, cod_parroquia, empresa },

		url: base_url + "ajax/Cobterner_coord_estructura",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			if (respuesta.resultado == true) {
				//console.log(respuesta.res);
            let data =respuesta.res;

			

            data.forEach(element => {
                
                let puntero ={
                    'type': 'Feature',
                    'properties': {
					'marker-color': '#8B4293',
                    'description':`<strong>Nombre: ${element.nombre}</strong>
					<p>Apellido:${element.apellidos}</p>
					<p>Telefono:${element.tlf_celular}</p>
					<p>Correo:${element.email} </p>
					<p>Estructura:${element.tipo_estructura} </p>
					<p><strong>Municipio</strong>:${element.nombre_municipio}</p>
					
				
					`
					
                    },
                    'geometry': {
                    'type': 'Point',
                    'coordinates': [element.longitud, element.latitud]
                    }
                    }
        
                arr_map.push(puntero);
              
                
            });


		
				let latitud_e = $(" option:selected", $('#cod_estado')).attr("data-latitud");
				let longitud_e = $("option:selected", $('#cod_estado')).attr("data-longitud");
				if($('#cod_estado').val()=='todos'){
					agregarMapa(latitud, longitud, 5);
				}else{

					agregarMapa(latitud_e, longitud_e, 10);
				}
			

				
		if(accion==2)
		location.href=base_url+'admin/reportes/excel_empresas?cod_estado='+cod_estado+'&cod_municipio='+cod_municipio+'&cod_parroquia='+cod_parroquia+'&empresa='+empresa



			} else {
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

$("#seleccion-ubicacion").click(function () {
	if ("geolocation" in navigator) {
		navigator.geolocation.getCurrentPosition((pos) => {
			agregarMapa(pos.coords.latitude, pos.coords.longitude);

			input_latitud.value = pos.coords.latitude;
			input_longitud.value = pos.coords.longitude;
		});
	} else {
		console.log("el navegador no soporta la geolocalización");
		/* el navegador no soporta la geolocalización*/
	}
});
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
