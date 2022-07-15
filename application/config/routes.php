<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'Cusuarios/Vinicio';

/*Cusuarios*/
$route['registro'] = 'Cusuarios';
$route['iniciosesion'] = 'Cusuarios/VinicioSesion';
$route['recuperarclave'] = 'Cusuarios/VrecuperarClave';
$route['reiniciarclavelink/(:any)/(:any)'] = 'Cusuarios/reiniciarclavelink/$1/$2';//link
$route['registroexito'] = 'Cusuarios/VregistroExito';
$route['inicio'] = 'Cusuarios/Vinicio';

/*Cusuarios*/



/*Cchambistas*/

$route['cambiarclave'] = 'Cchambistas/VcambiarClave';
$route['admin/cambiarclave'] = 'Cadmin/admin_cambiarClave';
$route['estructuras/cambiarclave'] = 'Estructuras/cambiarClave';
$route['empresas/cambiarclave'] = 'Empresas/cambiarClave';
$route['admin/cambiarclaves'] = 'Cadmin/estructuras_empresa';
$route['datospersonales'] = 'Cchambistas/Vdatospersonales';
$route['formacionacademica'] = 'Cchambistas/Vformacionacademica';
$route['formacionacademicaform'] = 'Cchambistas/Vformacionacademica_form';
$route['formacionacademicaform/(:num)'] = 'Cchambistas/Vformacionacademica_form/$1';
$route['experiencialaboral'] = 'Cchambistas/Vexperiencialaboral';
$route['experiencialaboralform/(:num)'] = 'Cchambistas/Vexperiencialaboral_form/$1';
$route['experiencialaboralform'] = 'Cchambistas/Vexperiencialaboral_form';
$route['descargarpdfusuario'] = 'Cchambistas/pdf';
$route['descargarpdfusuarios/(:num)'] = 'Cadmin/pdfCadmin/$1';
$route['eliminarexp/(:num)'] = 'Cchambistas/eliminarexp/$1';
$route['eliminaracademico/(:num)'] = 'Cchambistas/eliminaracademico/$1';
$route['redessociales'] = 'Cchambistas/Vredessociales';
$route['brigadas'] = 'Cchambistas/Vbrigadas';
$route['productivo'] = 'Cchambistas/Vproductivo';
$route['eliminarchamba/(:num)'] = 'Cchambistas/eliminarchamba/$1';
$route['eliminarchambas/(:num)'] = 'Cadmin/eliminarchamba/$1';
$route['eliminarbrigada/(:num)'] = 'Cchambistas/eliminarbrigada/$1';
$route['eliminarvivienda/(:num)'] = 'Cchambistas/eliminarvivienda/(:num)';
$route['insercion'] = 'Cchambistas/Vinsercion';
$route['cv'] = 'Cchambistas/Vcv';
$route['viviendajoven'] = 'Cchambistas/Vviviendajoven';
$route['consulta/(:any)'] = 'Cchambistas/consulta/$1';


/*Cchambistas*/


/*Administrador
$route['adm'] = 'Cadministrador/VinicioSesion';

$route['inicioadm'] = 'Cadmin/inicio';*/
$route['admin/login'] = 'Cadmin/login';


$route['admin/registro/estructuras'] = 'Cadmin/estructura_brigada';

$route['admin/registro/estructuras-brigada/(:num)'] = 'Cadmin/registro_estructura';

$route['admin/registro/estructuras/(:num)'] = 'Cadmin/actualizar_estructuras/$1';
$route['admin/limpar_qr'] = 'Cadmin/limpar_qr';

$route['admin/registro/empresas'] = 'Cadmin/registro_empresas';
$route['admin/registro/universidades'] = 'Cadmin/registro_universidades';
$route['admin/registro/universidades/(:num)'] = 'Cadmin/editar_universidades/$1';
$route['admin/inicio'] = 'Cadmin';
$route['admin/registro/usuarios'] = 'Cadmin/registro_usuarios';
$route['admin/usuarios'] = 'Cadmin/listar_usuarios_admin';
$route['admin'] = 'Cadmin';

$route['admin/empresas'] = 'Cadmin/listar_empresas_entes';

$route['admin/editar/empresa/(:num)'] = 'Cadmin/editar_empresa/$1';
$route['admin/roles'] = 'Roles';
   
$route['admin/Roles'] = 'Cadmin/listar_usuarios_admin';

//ofertas de empleos
$route['admin/nueva_oferta/(:num)'] = 'CofertaEmpleo/publicar_oferta_admin';

$route['admin/oferta_universidad/(:num)'] = 'CofertaUniversidades/universidad_oferta_admin/$1';


$route['admin/ofertas'] = 'CofertaEmpleo/listar_oferta_admin';

$route['admin/ofertasUniversidad'] = 'CofertaUniversidades/listar_oferta_admin';

$route['admin/ver_oferta/(:num)'] = 'CofertaEmpleo/ver_oferta';
$route['admin/oferta-empleo-empresa/(:num)'] = 'CofertaEmpleo/listar_ofertas_empleo_empresa';
$route['admin/usuario/ver_oferta/(:num)'] = 'CofertaEmpleo/ver_oferta_admin';

$route['admin/usuarios/ver_ofertas/(:num)'] = 'CofertaUniversidades/ver_ofertas_admin';
$route['admin/universidad/ver_ofertas/(:num)'] = 'CofertaUniversidades/ver_ofertas_admin';
$route['admin/usuarios/editaOfertas/(:num)'] = 'CofertaUniversidades/editar_oferta_admin';

$route['admin/usuario/editarOferta/(:num)'] = 'CofertaEmpleo/editar_oferta_admin';
$route['estructuras/usuario/ver_oferta/(:num)'] = 'CofertaEmpleo/ver_oferta_admin';
$route['estructuras/usuario/editarOferta/(:num)'] = 'CofertaEmpleo/editar_oferta_admin';
$route['estructuras/usuarios/editaOfertas/(:num)'] = 'CofertaUniversidades/editar_oferta_admin';



$route['admin/usuarios/(:num)'] = 'Cadmin/listar_oferta_universidades';

$route['estructuras/ofertas-estudios-universidades/(:num)'] = 'Estructuras/listar_oferta_universidades';
$route['estructuras/usuarios/ver_ofertas/(:num)'] = 'CofertaUniversidades/ver_ofertas_admin';
$route['estructuras/oferta-empleo-empresa/(:num)'] = 'CofertaEmpleo/listar_ofertas_empleo_empresa';



$route['admin/ver_ofertas/(:num)'] = 'CofertaUniversidades/ver_ofertas';

$route['estructuras/listar_empresas'] = 'Estructuras/listar_empresas';
$route['estructuras/nueva_ofertas/(:num)'] = 'Estructuras/publicar_oferta_admin';
$route['estructuras/oferta_universidad/(:num)'] = 'Estructuras/universidad_oferta_admin/$1';
$route['estructuras/nueva_oferta/(:num)'] = 'CofertaEmpleo/publicar_oferta_admin';
$route['estructuras/ofertasUniversidad'] = 'Estructuras/listar_ofertas_estructura';
$route['admin/editaOfertas/(:num)'] = 'CofertaUniversidades/editar_oferta/$1';
$route['admin/editarOferta/(:num)'] = 'CofertaEmpleo/editar_oferta/$1';
$route['estructuras/editaOfertas/(:num)'] = 'Estructuras/editar_oferta/$1';
$route['estructuras/ver_oferta/(:num)'] = 'Estructuras/ver_oferta_empresas';
$route['estructuras/ver_ofertas/(:num)'] = 'Estructuras/ver_ofertas_universidad';
$route['estructuras/ofertas'] = 'estructuras/listar_oferta_admin';
$route['empresas/ofertas'] = 'Empresas/listar_oferta_empresas';
$route['universidad/ofertas'] = 'Universidades/listar_oferta_universidades';
$route['empresas/editarOferta/(:num)'] = 'Empresas/editar_oferta/$1';
$route['universidad/editaOfertas/(:num)'] = 'Universidades/editar_oferta/$1';
$route['eempresas/ver_oferta/(:num)'] = 'Empresas/ver_ofertas';

$route['estructuras/editarOferta/(:num)'] = 'Estructuras/editar_oferta_empresas/$1';
$route['estructura/lista_universidad'] = 'Estructuras/lista_universidad';

/**Oferta universidades */
$route['admin/ver_oferta_universidad/(:num)'] = 'CofertaUniversidades/ver_oferta';
//cambista
$route['admin/chambista/buscar'] = 'Cadmin/buscar_chambista';
$route['admin/editar_chambista/(:num)'] = 'Cadmin/editar_chambista/$1';
$route['admin/editar_formacion/(:num)'] = 'Cadmin/editar_formacion/$1';
/*Administrador*/


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

//Estructuras
$route['estructuras/registro/estructuras'] = 'Estructuras/registro_estructura';
$route['estructuras/registro/empresas'] = 'Estructuras/registro_empresas';
$route['estructuras/registro/empresas/(:num)'] = 'Estructuras/editar_empresas/$1';
$route['estructuras/registro/universidades'] = 'Estructuras/registro_universidades';
$route['estructuras/registro/universidades/(:num)'] = 'Estructuras/editar_universidades/$1';
$route['estructuras/inicio'] = 'Estructuras';
$route['admin/estructuras'] = 'Cadmin/estructuras';


/*Cestructuras*/


//Estructuras
$route['estructuras/registro/estructuras'] = 'Estructuras/registro_estructura';
$route['estructuras/registro/empresas'] = 'Estructuras/registro_empresas';
$route['estructuras/registro/empresas/(:num)'] = 'Estructuras/editar_empresas/$1';
$route['estructuras/registro/universidades'] = 'Estructuras/registro_universidades';
$route['estructuras/inicio'] = 'Estructuras';

/*Empresas*/
$route['empresas/inicio'] = 'Empresas';
$route['empresas/nuevaoferta'] = 'Empresas/nuevaoferta';
$route['universidad/nuevaoferta'] = 'Universidades/universidad_oferta_admin';
/*Empresas*/

/**Universidades */
$route['universidades/inicio'] = 'Universidades';
$route['admin/universidades'] = 'Cadmin/universidades';
$route['universidad/ver_ofertas/(:num)'] = 'Universidades/ver_ofertas';

/**REPORTE ***/

$route['admin/reportes/empresas_mapa'] = 'Creportes/empresas_mapa';
$route['admin/reportes/estructuras_mapa'] = 'Creportes/etructura_mapa';

$route['admin/reportes/excel_empresas'] = 'Creportes/exportar_excel_empresas';
$route['admin/reportes/excel_estructura'] = 'Creportes/exportar_excel_estructuras';

