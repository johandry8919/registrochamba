///Estado
var arr_map = [];
var arr_id = [];
let id = (arr_id = []);

console.log(id);

$("#cod_estado").change(function () {
	buscarMunicipios();
});
$("#cod_municipio").change(function () {
	buscarParroquia();
});

//

$("#form-map").submit(function (e) {
	e.preventDefault();

	const accion = e.originalEvent.submitter.name;

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

		url: base_url + "ajax/Cobtener_coord_empresas",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			if (respuesta.resultado == true) {
				//console.log(respuesta.res);
				var datas = respuesta.res;

				arr_map = [];
				arr_id = [];
				var latitud_e = $(" option:selected", $("#cod_estado")).attr(
					"data-latitud"
				);
				var longitud_e = $("option:selected", $("#cod_estado")).attr(
					"data-longitud"
				);
				datas.forEach((element) => {
					let puntero = {
						type: "Feature",
						properties: {
							"marker-color": "#8B4293",
							description: `<strong> ${element.nombre_razon_social}</strong>
					<p>RIF:${element.rif}</p>
					<p>Representante:${element.noombre_representante}  ${element.apellido_representante}</p>
					<p><strong>Cantidad ofertas</strong>:${element.cantidad_oferta}</p>
					
				
					`,
						},
						geometry: {
							type: "Point",
							coordinates: [element.longitud, element.latitud],
						},
					};

					latitud_e = element.latitud;
					longitud_e = element.longitud;

					arr_map.push(puntero);
					arr_id.push(element);
				});

				if ($("#cod_estado").val() == "todos") {
					agregarMapa(latitud, longitud, 5);
				} else {
					agregarMapa(latitud_e, longitud_e, 10);
				}

				if (accion == 2)
					location.href =
						base_url +
						"admin/reportes/excel_empresas?cod_estado=" +
						cod_estado +
						"&cod_municipio=" +
						cod_municipio +
						"&cod_parroquia=" +
						cod_parroquia +
						"&empresa=" +
						empresa;
			} else {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: respuesta.mensaje,
				});
				arr_map = [];
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

function agregarMapa(lat = "8.2321", long = "-66.406", zoom = 13, data = []) {
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

		const size = 200;

		var color = "";
		var empresas = $("#empresa").val();
		if (empresas == "2") color = "rgb(233, 68, 255)";
		else {
			color = "rgba(255, 100, 100, 1)";
		}

		const pulsingDot = {
			width: size,
			height: size,
			data: new Uint8Array(size * size * 4),

			// When the layer is added to the map,
			// get the rendering context for the map canvas.
			onAdd: function () {
				const canvas = document.createElement("canvas");
				canvas.width = this.width;
				canvas.height = this.height;
				this.context = canvas.getContext("2d");
			},

			// Call once before every frame where the icon will be used.
			render: function () {
				const duration = 1000;
				const t = (performance.now() % duration) / duration;

				const radius = (size / 2) * 0.3;
				const outerRadius = (size / 2) * 0.7 * t + radius;
				const context = this.context;

				// Draw the outer circle.
				context.clearRect(0, 0, this.width, this.height);
				context.beginPath();
				context.arc(
					this.width / 2,
					this.height / 2,
					outerRadius,
					0,
					Math.PI * 2
				);
				context.fillStyle = `rgba(255, 200, 200, ${1 - t})`;
				context.fill();

				// Draw the inner circle.
				context.beginPath();
				context.arc(this.width / 2, this.height / 2, radius, 0, Math.PI * 2);
				context.fillStyle = color;
				context.strokeStyle = "white";
				context.lineWidth = 2 + 4 * (1 - t);
				context.fill();
				context.stroke();

				// Update this image's data with data from the canvas.
				this.data = context.getImageData(0, 0, this.width, this.height).data;

				// Continuously repaint the map, resulting
				// in the smooth animation of the dot.
				map.triggerRepaint();

				// Return `true` to let the map know that the image was updated.
				return true;
			},
		};

		map.addControl(new mapboxgl.NavigationControl());

		map.on("load", () => {
			// map.addSource("places", {
			// 	type: "geojson",
			// 	data: {
			// 		type: "FeatureCollection",
			// 		features:JSON.parse(JSON.stringify(arr_map))
			// 	},
			// });
			// // Add a layer showing the places.
			// // var color='';
			// // if(empresas_universidades==2){
			// // 	color='#ce1616';
			// // }
			// map.addLayer({
			// 	id: "places",
			// 	type: "circle",
			// 	source: "places",
			// 	paint: {
			// 		"circle-color": "rgba(255, 100, 100, 1)",
			// 		"circle-radius": 6,
			// 		"circle-stroke-width": 2,
			// 		"circle-stroke-color": "#ffffff",
			// 	},
			// });
			map.addImage("pulsing-dot", pulsingDot, { pixelRatio: 4 });

			map.addSource("places", {
				type: "geojson",
				data: {
					type: "FeatureCollection",
					features: JSON.parse(JSON.stringify(arr_map)),
				},
			});
			map.addLayer({
				id: "places",
				type: "symbol",
				source: "places",
				layout: {
					"icon-image": "pulsing-dot",
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
