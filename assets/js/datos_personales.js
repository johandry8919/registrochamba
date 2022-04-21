$('#estcivil').change(function(){
    /*  $('#guevo').html('<option value="1">1</option><option value="2">2</option>'); */
    //console.log($("#guevo").selectpicker('val','<option value="1">1</option><option value="2">2</option>'));
    
    $("#guevo").html('<option value="1">1</option><option value="2">2</option>');
    $("#guevo").selectpicker('refresh');
 });



 $("#cod_estado").change(function(){
     buscarMunicipios();
 });
 $("#cod_municipio").change(function(){
     buscarParroquia();
 });

function buscarMunicipios() {
var estado = $("#cod_estado").val();

if (estado == "") {
 $("#cod_municipio").html('<option value="">Debe seleccionar un Estado por favor</option>');
}
else {
 $.ajax({
     dataType: "json",
     data: {"codigoestado": estado},
     url: base_url+"Cchambistas/getMunicipios",
     type: "post",
     beforeSend: function () {
         $("#cod_municipio").html('<option>cargando municipios...</option>');
         //$("#cod_municipio").selectpicker('refresh');
     },
     success: function (respuesta1) {

         $("#cod_municipio").html(respuesta1.htmloption1);
         //$("#cod_municipio").selectpicker('refresh');
     },
     error: function (xhr, err) {
         alert("readyState =" + xhr.readyState + " estado =" + xhr.status + "respuesta =" + xhr.responseText);
         //alert("ocurrio un error intente de nuevo");
     }
 });
}

}

function buscarParroquia() {
var municipio = $("#cod_municipio").val();
var estado = $("#cod_estado").val();

if (municipio == "") {
 $("#cod_parroquia").html('<option value="">Debe seleccionar un Municipio por favor</option>');
}
else {
 $.ajax({
     dataType: "json",
     data: {"codigomunicipio": municipio,"codigoestado": estado},
     url: base_url+"Cchambistas/getParroquias",
     type: "post",
     beforeSend: function () {
         $("#cod_parroquia").html('<option>cargando parroquias...</option>');
         //$("#cod_parroquia").selectpicker('refresh');
     },
     success: function (respuesta2) {
         $("#cod_parroquia").html(respuesta2.htmloption2);
       //  $("#cod_parroquia").selectpicker('refresh');
     },
     error: function (xhr, err) {
         alert("readyState =" + xhr.readyState + " estado =" + xhr.status + "respuesta =" + xhr.responseText);
         //alert("ocurrio un error intente de nuevo");
     }
 });
}
}


function obtenerProfesionOficio() {
   
  
    

     $.ajax({
         dataType: "json",
    
         url: base_url+"/ajax/Cprofesion_oficio/obtener_prefesion",
         type: "post",
         beforeSend: function () {
             $("#id_profesion").html('<option>cargando Profesion..</option>');
             //$("#cod_parroquia").selectpicker('refresh');
         },
         success: function (respuesta) {
             console.log(respuesta)
             $("#id_profesion").html(respuesta.html1);
          
         },
         error: function (xhr, err) {
             alert("ocurrio un error intente de nuevo");
         }
     });
    
    }
    
$('.datepicker').bootstrapMaterialDatePicker({
format: 'YYYY-MM-DD',
locale: 'es',
time: false,
maxDate: moment(),
language: 'es',
defaultDate:'2000-06-01'
});

var currentValue = 0;
function click_estado_formacion(myRadio) {

    currentValue = myRadio.value;
    if(currentValue==3){
        $(".c-estudios").removeClass("d-none");

    }else{
        $(".c-estudios").addClass("d-none");
    }


}

