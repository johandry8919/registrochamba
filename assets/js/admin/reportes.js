///Estado
$("#cod_estado").change(function () {
	buscarMunicipios();
});
$("#cod_municipio").change(function () {
	buscarParroquia();
});

function buscarMunicipios() {
	var estado = $("#cod_estado").val();

	if (estado == "") {
		$("#cod_municipio").html(
			'<option value="">Debe seleccionar un Estado por favor</option>'
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
				$("#cod_municipio").html(respuesta1.htmloption1);
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
			success: function (respuesta2) {
				$("#cod_parroquia").html(respuesta2.htmloption2);
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

 
            agregarMapa(latitud, longitud,5);


    navigator.geolocation.getCurrentPosition(success, function (msg) {
        agregarMapa(latitud, longitud);
    });

    





 $("#seleccion-ubicacion").click(function ()  {
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
    let latitud_e = $("option:selected", $(this)).attr("data-latitud");
    let longitud_e = $("option:selected", $(this)).attr("data-longitud");
 

    agregarMapa(latitud_e, longitud_e, (zoom = 12));

    input_latitud.value = latitud_e;
    input_longitud.value = latitud_e;
});



function agregarMapa(lat = "8.2321", long = "-66.406", zoom = 13) {
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
    

        var marker = new mapboxgl.Marker({
            draggable: true,
        })
            .setLngLat([long, lat])
            .addTo(map);

        function onDragEnd() {
            var lngLat = marker.getLngLat();
            coordinates.style.display = "block";
            coordinates.innerHTML =
                "Longitude: " + lngLat.lng + "<br />Latitude: " + lngLat.lat;

            input_latitud.value = lngLat.lat;
            input_longitud.value = lngLat.lng;
        }



        /*  let map = new maplibregl.Map({
        container: 'map',
        style:
        'https://api.maptiler.com/maps/streets/style.json?key=get_your_own_OpIi9ZULNHzrESv6T2vL',
        center: [long,lat],
        zoom: 13
        
    });*/

        // map.addControl(new mapboxgl.NavigationControl());

       
        map.addControl(new mapboxgl.NavigationControl());
        //  agregarMarker(lat,long, map);
        //maplibregl
        //  map.addControl(new maplibregl.NavigationControl());

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





