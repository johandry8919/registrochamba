
            var input_latitud = document.getElementById("latitud");
            var input_longitud = document.getElementById("longitud");
    if(navigator.geolocation){
        var latitud = '8.2321';
        var  longitud ='-66.406';
        var success = (position) =>{
            latitud = position.coords.latitude;
            longitud = position.coords.longitude;
            agregarMapa(latitud,longitud)

            input_latitud.value = latitud;
            input_longitud.value = longitud;
        }
 
    
        navigator.geolocation.getCurrentPosition(success, function(msg){
            agregarMapa(latitud,longitud)
        });


        }
 
 


    function agregarMapa(lat='8.2321',long='-66.406'){

        if (!maplibregl.supported()) {
            alert('Your browser does not support MapLibre GL');
            } else {
            let map = new maplibregl.Map({
            container: 'map',
            style:
            'https://api.maptiler.com/maps/streets/style.json?key=get_your_own_OpIi9ZULNHzrESv6T2vL',
            center: [long,lat],
            zoom: 13
            });

          
         agregarMarker(lat,long, map);


         map.addControl(new maplibregl.NavigationControl());


            return map;
            }

         
    }


   function  agregarMarker(lat,lon,map){

    var coordinates = document.getElementById('coordinates');
    var marker = new maplibregl.Marker({
    draggable: true
    })
    .setLngLat([lon,lat])
    .addTo(map);
     
    function onDragEnd() {
    var lngLat = marker.getLngLat();
    coordinates.style.display = 'block';
    coordinates.innerHTML =
    'Longitude: ' + lngLat.lng + '<br />Latitude: ' + lngLat.lat;

    
    input_latitud.value =  lngLat.lat ;
    input_longitud.value =  lngLat.lng ;
    }
     
    marker.on('dragend', onDragEnd);


    //marquer
  map.on('click',  (e)=> {
  

        let latc=e.lngLat.wrap().lat;
        let lgn= e.lngLat.wrap().lng;
        marker. setLngLat([lgn,latc])
        .addTo(map);
        coordinates.style.display = 'block';
        coordinates.innerHTML =
    'Longitude: ' + lgn + '<br />Latitude: ' + latc;
    input_latitud.value =   latc ;
    input_longitud.value =  lgn ;
    
        });


    }
     

  