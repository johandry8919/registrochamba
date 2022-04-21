<?php
    
    defined('BASEPATH') OR exit('No direct script access allowed');

    // JS - librerías
    
    $config['recursos']['moment_js'] = "plugins/momentjs/moment.js?v=1.0.5";
    $config['recursos']['bootstrap-datepicker_js'] = "plugins/bootstrap-datepicker/js/bootstrap-datepicker.js?v=1.0.5";
    $config['recursos']['bootstrap-material-datetimepicker_js'] = "plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js?v=1.0.";
    $config['recursos']['bootstrap-select_js'] = "plugins/bootstrap-select/js/bootstrap-select.js?v=1.0.";
    $config['recursos']['chart_js'] = "assets/js/chart.js?v=1.0.";
    $config['recursos']['mapbox_js'] = "assets/plugins/mapbox/maplibre-gl.js?v=1.0.5";

    
    // JS - librería propios
    $config['recursos']['validacion_datospersonales_js'] = "js/pages/examples/datospersonales.js?v=1.0.5";
    $config['recursos']['datospersonales_js'] = "assets/js/datos_personales.js?v=1.0.6";

    $config['recursos']['mapa_mabox_js'] = "assets/js/mapa_mabox.js?v=1.0.4".time();
  
    $config['recursos']['mapa_mabox_css'] = "assets/css/mapa_mabox.css?v=1.0.4.".time();
    $config['recursos']['estructuras_js'] = "assets/js/estructuras.js?v=1.0.6".time();
    
   
        // css - librería sassets\plugins\mapbox
    $config['recursos']['style_css'] = "assets/css/style.min.css?v=1.0.5".time();;
    $config['recursos']['login_css'] = "assets/css/login.min.css?v=1.0.0";
    $config['recursos']['mapbox_css'] = "assets/plugins/mapbox/maplibre-gl.css?v=1.0.5";
    
?>