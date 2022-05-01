
            var input_latitud = document.getElementById("latitud");
            var input_longitud = document.getElementById("longitud");
            var coordinates = document.getElementById('coordinates');
           
         

           
    


    
            if(navigator.geolocation){
                
        var success = (position) =>{
            var latitud = '8.2321';
            var  longitud ='-66.406';

            if(input_latitud.value!="" && input_longitud.value!=0){
                console.log('si')
                var latitud = input_latitud.value;
                var  longitud =input_longitud.value;
                
            latitud = position.coords = latitud;
            longitud = position.coords = longitud;
            agregarMapa(latitud,longitud)

            input_latitud.value = latitud;
            input_longitud.value = longitud;
            }else{
                console.log('no')
                 var latitud = input_latitud.value;
                var  longitud =input_longitud.value;
                
                latitud = position.coords.latitude;
                longitud = position.coords.longitude;
                agregarMapa(latitud,longitud)
    
                input_latitud.value = latitud;
                input_longitud.value = longitud;
               
                
            }
           
           
        }
 
    
        navigator.geolocation.getCurrentPosition(success, function(msg){
            agregarMapa(latitud,longitud)
        });


        }
 
 


    function agregarMapa(lat='8.2321',long='-66.406'){

        if (!mapboxgl.supported()) {
            alert('Your browser does not support MapLibre GL');
            } else {


                mapboxgl.accessToken = 'pk.eyJ1IjoiamhvbmF0YW5yZGV2IiwiYSI6ImNsMGlwYXkxazAzZG4zZG0yY3dlMWV6Z2IifQ.vAVh-JhFU7MME4lcdBk9og';
                const map = new mapboxgl.Map({
                    container: 'map', // container ID
                    style: 'mapbox://styles/mapbox/streets-v11', // style URL
                    center: [long,lat], // starting position [lng, lat]
                    zoom: 13 // starting zoom
                });
             
             var marker=   new mapboxgl.Marker({
                    draggable: true
                    })
                    .setLngLat([long,lat])
                    .addTo(map);
                     
                    

          /*  let map = new maplibregl.Map({
            container: 'map',
            style:
            'https://api.maptiler.com/maps/streets/style.json?key=get_your_own_OpIi9ZULNHzrESv6T2vL',
            center: [long,lat],
            zoom: 13
            
        });*/

          
         

        // map.addControl(new mapboxgl.NavigationControl());

         agregarGeocoder(map,marker);
       //  agregarMarker(lat,long, map);
         //maplibregl
       //  map.addControl(new maplibregl.NavigationControl());


            return map;
            }

         
    }


   function  agregarMarker(lat,lon,map,marker){


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
      console.log(e)
  

        let latc=e.lngLat.wrap().lat;
        let lgn= e.lngLat.wrap().lng;
        marker.setLngLat([lgn,latc]).addTo(map);

        
        coordinates.style.display = 'block';
        coordinates.innerHTML ='Longitude: ' + lgn + '<br />Latitude: ' + latc;
         input_latitud.value =   latc ;
         input_longitud.value =  lgn ;
    
        });


    }
     

  function agregarGeocoder(map,marker){
   
   const geocoder=  new MapboxGeocoder({
        accessToken: mapboxgl.accessToken,
        mapboxgl: mapboxgl,
        language: 'es',
        placeholder: 'Ingrese su ubicacion',
        marker: false,
        countries:'VE'
 
 

        })

    map.addControl(geocoder);

 
        geocoder.on('result', e => {
            let lat= e.result.center[1];
            let lon=  e.result.center[0];

            console.log(lat,lon)
        agregarMarker(lat,lon,map,marker)
        marker.setLngLat([lon,lat]).addTo(map);
       
          
        coordinates.style.display = 'block';
        coordinates.innerHTML ='Longitude: ' + lon + '<br />Latitude: ' + lat;
         input_latitud.value =   lat ;
         input_longitud.value =  lon ;
    });
    
    
    map.on('click',  (e)=> {
        console.log(e)
  

        let latc=e.lngLat.wrap().lat;
        let lgn= e.lngLat.wrap().lng;
        marker.setLngLat([lgn,latc]).addTo(map);

        
        coordinates.style.display = 'block';
        coordinates.innerHTML ='Longitude: ' + lgn + '<br />Latitude: ' + latc;
         input_latitud.value =   latc ;
         input_longitud.value =  lgn ;
    
        });


  }