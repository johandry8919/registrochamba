$(".btn-editar").click(function (e) {
	var id_rol = $(this).data("id_rol");

	obtener_menus(id_rol);

	$("#id_rol").val(id_rol);
});

$(".btn-guardar-menu").click(function (e) {
	guardar_cambios();
});

$(".nuevo_rol").click(function (e) {
  $("#modal_nuevo_rol").modal("show");
});
$(".btn-guardar-rol").click(function (e) {
	$("#modal_nuevo_rol").modal("hide");
	guardar_rol()

  });
  




function obtener_menus(id_rol) {
	$.ajax({
		dataType: "json",
		data: {
			id_rol,
		},

		url: base_url + "ajax/Cobterner_menu_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta);
			$("#modalrol").modal("show");

			if (respuesta.resultado == true) {
				var menus = respuesta.res;
				var html = "";
				$("#tabla-roles tbody").html("");
				menus.forEach((menu) => {
                                        console.log(menu)
					var checked = "checked";
					if (menu.id_rol == null || menu.activo==0) {
						checked = "";
                                                
					}
					html = ` <tr>
                           
                                  <th scope="row">
                                  <div class="form-group">
                                    <label class="custom-switch form-switch">
                                        <input type="checkbox" data-id_menu="${menu.id_submenu}" id="id${menu.id_submenu}" name="menu${menu.id_submenu}" class="custom-switch-input" ${checked} value="1">

                                        <span class="custom-switch-indicator custom-switch-indicator-md">SI</span>
                                        <span class="custom-switch-description"></span>
                                    </label>
                                </div>


                                  </th>
                                  <td>   ${menu.nombre_menu} </td>
                                  <td>  ${menu.nombre_submenu} </td>
                            
                                </tr> `;
					$("#tabla-roles tbody").append(html);
				});
			} else {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: respuesta.mensaje,
				});
			}
		},
		error: function (xhr, err) {
			console.log(err);
			alert("ocurrio un error intente de nuevo");
		},
	});
}

function guardar_cambios() {
	var id_rol = $("#id_rol").val();
	var array_menu = [];
	$("#form-menu")
		.find(":input")
		.each(function () {
			var elemento = this;

			if (
				elemento.value !== undefined &&
				elemento.value != "" &&
				elemento.value !== "undefined"
			) {
				array_menu.push({
					id_submenu: $(elemento).data("id_menu"),
					activo: $(elemento).prop("checked"),
				});
			}
		});




        $.ajax({
		dataType: "json",
		data: {
			id_rol,
                        array_menu
		},

		url: base_url + "Roles/guardar_menu_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta);
			$("#modalrol").modal("hide");

			if (respuesta.resultado == true) {
				Swal.fire({
					icon: "success",
					title: "Registro Exitoso",
					text: "Presione OK para continuar",
				}).then((result) => {
					
				});
			
			
			} else {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: respuesta.mensaje,
				});
			}
		},
		error: function (xhr, err) {
			console.log(err);
			alert("ocurrio un error intente de nuevo");
		},
	});
}


function guardar_rol(){

    var nombre_rol=	$("#nombre_rol").val()

	if(nombre_rol==""){

		alert("el nombre del rol es requerido")
	}

	$.ajax({
		dataType: "json",
		data: {
			nombre_rol
                   
		},

		url: base_url + "Roles/guardar_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta);
			$("#modalrol").modal("hide");

			if (respuesta.resultado == true) {
				Swal.fire({
					icon: "success",
					title: "Registro Exitoso",
					text: "Presione OK para continuar",
				}).then((result) => {

				 location.reload();
					
				});
			
			
			} else {
				Swal.fire({
					icon: "error",
					title: "Oops...",
					text: respuesta.mensaje,
				});
			}
		},
		error: function (xhr, err) {
			console.log(err);
			alert("ocurrio un error intente de nuevo");
		},
	});
	
}