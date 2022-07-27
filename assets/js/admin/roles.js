$(".btn-editar").click(function (e) {
	var id_rol = $(this).data("id_rol");

	obtener_menus(id_rol);

	$("#id_rol").val(id_rol);
});


$(".btn-editar_rol").click(function (e) {
	var id_rol = $(this).data("id_rol");

	$("#id_rol").val(id_rol);


	$("#modal_editar_rol").modal("show");
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
  

  $(".btn-actualizar-nombre-rol").click(function (e) {
	$("#modal_nuevo_rol").modal("hide");
	actualizar_nombre_rol()

  });
  
  $("#tipo_rol").change(function (e) {

	if($(this).val()=='admin')
	location.href='roles?p=admin'
	else	
	location.href='roles?p=estructuras'

  });


  function editar_rol(id_rol){



	$.ajax({
		dataType: "json",
		data: {
			id_rol,
		},

		url: base_url + "ajax/Cobterner_permisos_rol/obtener_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
	
		

			if (respuesta.resultado == true) {
				$("#modal_editar_rol").modal("show");
				$("#nombre_rol_e").val(respuesta.res.nombre)

				
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

  
  
  //btn-guardar-permiso
  $(".btn-guardar-permiso").click(function (e) {
	guardar_rol_permiso();

  });

  $(".btn-permisos").click(function (e) {
	
	var id_rol = $(this).data("id_rol");
	obtener_permisos_rol(id_rol)
  });

  
  //btn-guardar-permiso
  $(".btn-guardar-permiso").click(function (e) {
	guardar_rol_permiso();

  });

  function obtener_permisos_rol(id_rol) {
	$.ajax({
		dataType: "json",
		data: {
			id_rol,
		},

		url: base_url + "ajax/Cobterner_permisos_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta);
			$("#modalpermisos").modal("show");

			if (respuesta.resultado == true) {

				$("#id_rol").val(id_rol);
				var datos =respuesta.res;
				var 	checked_crear="";
				var 	checked_editar="";
				var 	checked_vincular="";
				var 	checked_eliminar="";
				if(datos.crear==1)
				  checked_crear="checked"

			    if(datos.modificar==1)
				  checked_editar="checked"

				  if(datos.eliminar==1)
				  checked_eliminar="checked"

				  if(datos.vincular==1)
				  checked_vincular="checked"


				checked = "";
				$("#tabla-permisos tbody").html("");
				html = ` 	<tr>

				<td>

					<div class="form-group">
						<label class="custom-switch form-switch">
							<input type="checkbox" data-id_menu="" id="guardar-permiso" name="guardar-permiso" class="custom-switch-input" ${checked_crear}  value="1">

							<span class="custom-switch-indicator custom-switch-indicator-md">SI</span>
							<span class="custom-switch-description"></span>
						</label>
					</div>
				</td>

				<td>

					<div class="form-group">
						<label class="custom-switch form-switch">
							<input type="checkbox" ${checked_editar}  data-id_menu="" id="editar-permiso" name="editar-permiso" class="custom-switch-input"  value="1">

							<span class="custom-switch-indicator custom-switch-indicator-md">SI</span>
							<span class="custom-switch-description"></span>
						</label>
					</div>
				</td>

				
				<td>

					<div class="form-group">
						<label class="custom-switch form-switch">
							<input type="checkbox" ${checked_vincular}  data-id_menu="" id="vincular-permiso" name="vincular-permiso" class="custom-switch-input"  value="1">

							<span class="custom-switch-indicator custom-switch-indicator-md">SI</span>
							<span class="custom-switch-description"></span>
						</label>
					</div>
				</td>


				<td>

					<div class="form-group">
						<label class="custom-switch form-switch">
							<input type="checkbox" data-id_menu=""   ${checked_eliminar}  id="eliminar-permiso" name="eliminar-permiso" class="custom-switch-input"  value="1">

							<span class="custom-switch-indicator custom-switch-indicator-md">SI</span>
							<span class="custom-switch-description"></span>
						</label>
					</div>
				</td>
			</tr>`;
			$("#tabla-permisos tbody").append(html);
		
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

function obtener_menus(id_rol) {
	var tipo_rol = $("#tipo_rol").val()
	$.ajax({
		dataType: "json",
		data: {
			id_rol,
			tipo_rol
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

function guardar_rol_permiso(){

	var id_rol = $("#id_rol").val();
	var guardar_permiso = $("#guardar-permiso").prop("checked") == true ? 1 : 0;
	var editar_permiso = $("#editar-permiso").prop("checked") == true ? 1 : 0;
	var vincular_permiso_rol = $("#vincular-permiso").prop("checked") == true ? 1 : 0;
	var eliminar_permiso = $("#eliminar-permiso").prop("checked") == true ? 1 : 0;
	if(nombre_rol==""){

		alert("el nombre del rol es requerido")
	}

	$.ajax({
		dataType: "json",
		data: {
			id_rol,
			guardar_permiso,
			editar_permiso,
			vincular_permiso_rol,
			eliminar_permiso
                   
		},

		url: base_url + "Roles/guardar_permiso_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			console.log(respuesta);
			$("#modalpermisos").modal("hide");
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


function actualizar_nombre_rol(){

    var nombre_rol=	$("#nombre_rol_e").val()
	var id_rol = $("#id_rol").val();
	if(nombre_rol==""){

		alert("el nombre del rol es requerido")
	}

	$.ajax({
		dataType: "json",
		data: {
			id_rol,
			nombre_rol
                   
		},

		url: base_url + "Roles/actualizar_rol",
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
					title: "Actualizacion Exitosa",
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