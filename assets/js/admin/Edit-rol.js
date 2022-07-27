// var id_rol = $(this).data("id_usuario")

(function ($) {
	$("#form-editar_usuarios").submit(function (e) {
		e.preventDefault();

		editar_usuarios();
	});

	$(".btn-eliminar-usuario").click(function (e) {
		var id_rol = $("#id_rol").val();
		if (id_rol === "4" || id_rol === "5") {
			Swal.fire({
				title: '¿Estas seguro?',
				text: "¡No podrás revertir esto!!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Eliminar!'
			  })
		}else{
			Swal.fire({
				title: '¿Estas seguro?',
				text: "¡No podrás revertir esto!!",
				icon: 'warning',
				showCancelButton: true,
				confirmButtonColor: '#3085d6',
				cancelButtonColor: '#d33',
				confirmButtonText: 'Si, Eliminar!'
			  }).then((result) => {
				if (result.isConfirmed) {
			
			
		

					  var id_usuario = $(this).data("id_usuario");
						eliminar_usuario(id_usuario);
			
				
				}
			  })

			 
		}


		
	});
})(jQuery);

var idioma_espanol = {
	sProcessing: "Procesando...",
	sLengthMenu:
		"Mostrar <select>" +
		'<option value="10">10</option>' +
		'<option value="20">20</option>' +
		'<option value="30">30</option>' +
		'<option value="40">40</option>' +
		'<option value="50">50</option>' +
		'<option value="-1">All</option>' +
		"</select> registros",
	sZeroRecords: "No se encontraron resultados",
	sEmptyTable: "Ningún dato disponible en esta tabla",
	sInfo: "Mostrando del (_START_ al _END_) de un total de _TOTAL_ registros",
	sInfoEmpty: "Mostrando del 0 al 0 de un total de 0 registros",
	sInfoFiltered: "(filtrado de un total de _MAX_ registros)",
	sInfoPostFix: "",
	sSearch: "Buscar:",
	sUrl: "",
	sInfoThousands: ",",
	sLoadingRecords: "Por favor espere - cargando...",
	oPaginate: {
		sFirst: "Primero",
		sLast: "Último",
		sNext: "Siguiente",
		sPrevious: "Anterior",
	},
	oAria: {
		sSortAscending: ": Activar para ordenar la columna de manera ascendente",
		sSortDescending: ": Activar para ordenar la columna de manera descendente",
	},
	scrollX: "100%",
};

var table = $("#basic-datatable").DataTable({
	dom: "lrtip",

	language: idioma_espanol,
});

function CierraPopup() {
	$("#modalQuill").modal("hide"); //ocultamos el modal
	$("body").removeClass("modal-open"); //eliminamos la clase del body para poder hacer scroll
	$(".modal-backdrop").remove(); //eliminamos el backdrop del modal
}

function Editar(id_usuarios_admin) {
	var roles = $("#roles").val();

	$.ajax({
		dataType: "json",
		data: { id_usuarios_admin, roles },

		url: base_url + "ajax/Edit_rol",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			if (respuesta.resultado == true) {
				var data = respuesta.mensaje[0];

				var select = "";

				var roles = "";
				respuesta.roles.forEach((element) => {
					if (element.id_rol == data.id_rol) select = "selected";

					roles += `<option ${select} label="${element.nombre}" value="${element.id_rol}" >${element.nombre}</option>  `;

					select = "";
				});

				$("#body_card").html("");
				var htmlTags = `


            <h3 class="card-title text-center">Usuario: ${data.nombre}</h3>


           <div class="form-row">
           <div class="form-group col-md-6 mb-0">
               <div class="form-group">
               <label for="nombre" class="form-label">Nombre</label>
                   <input type="text" class="form-control"  name="nombre" id="nombre"  value="${data.nombre}" >
               </div>
           </div>
           <div class="form-group col-md-6 mb-0">
               <div class="form-group">
               <label for="cedula" class="form-label">Cedula</label>
                   <input type="text" class="form-control" name="cedula" id="cedula"  value="${data.cedula}" placeholder="">
               </div>
           </div>
       </div>
       <div class="form-row">
       
       <div class="form-group col-md-6 mb-0">
       <label for="email" class="form-label">Correo</label>
           <input type="email" id="email" readonly name="email" class="form-control" id="inputEmail5"  value="${data.email}" placeholder="">
       </div>
   
  
           <div class="form-group col-md-6 mb-0">
               <div class="form-group">
               <label for="contraseña" class="form-label">Contraseña</label>
                   <input type="text"  name="contraseña" class="form-control" id="contraseña" value="" placeholder="Contraseña">
               </div>
        </div>
           <div class="form-group col-md-6 mb-0">
               <div class="form-group">
			   <label class="form-label">Rol <span class="text-red">*</span></label>
               <select  class="form-control form-select" data-bs-placeholder="Select" tabindex="-1" aria-hidden="true" id="roles" name="roles">
					${roles}

       


                </select>
             
               </div>
        </div>

		<div class="form-group col-md-6 mb-0">
		<div class="form-group">
		<label for="nombre" class="form-label">Cargo</label>
			<input type="text" class="form-control"  name="cargog" id="cargog"  value="${data.cargo}" required >
		</div>
	</div>

       <input type="hidden" name="id_usuarios_admin" id="id_usuarios_admin" value="${data.id_usuarios_admin}">
       <input type="hidden" name="perfil" id="perfil" value="${data.perfil}">

       </div>
       <input type="hidden" name="id_rol" id="id_rol" value="${data.id_rol}">
       <input type="hidden" name="nombre_rol" id="nombre_rol" value="${data.nombre_rol}">


       </div>

           `;

				$("#body_card").append(htmlTags);
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

function editar_usuarios() {
	var nombre = $("#nombre").val();
	var cedula = $("#cedula").val();
	var email = $("#email").val();
	var contraseña = $("#contraseña").val();
	var id_usuarios_admin = $("#id_usuarios_admin").val();
	var id_rol = $("#id_rol").val();
	var roles = $("#roles").val();
	var cargo = $("#cargog").val();
	var perfil = $("#perfil").val();
	var nombre_rol = $("#nombre_rol").val();
	CierraPopup();
	$.ajax({
		dataType: "json",
		data: {
			cargo,
			nombre,
			cedula,
			email,
			contraseña,
			id_usuarios_admin,
			id_rol,
			roles,
			perfil,
			nombre_rol,
		},

		url: base_url + "ajax/Edit_rol/editar_usuarios",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			var datos = respuesta.datos;
			if (respuesta.resultado == true) {
				thml_usuario(datos);

				Swal.fire({
					title: "<strong>Datos actualizado</strong>",
					icon: "success",

					focusConfirm: false,
					confirmButtonText: '<i class="fa fa-thumbs-up fs-5"></i> ',
					confirmButtonAriaLabel: "Thumbs up, great!",
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
function eliminar_usuario(id_usuario) {
	var perfil = $("#tipo_rol").val();

	$.ajax({
		dataType: "json",
		data: {
			id_usuario,
			perfil,
		},

		url: base_url + "ajax/Edit_rol/eliminar_usuario",
		type: "post",
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		beforeSend: function () {
			//$("#cod_municipio").selectpicker('refresh');
		},
		success: function (respuesta) {
			var datos = respuesta.datos;

			if (respuesta.resultado == true) {
				thml_usuario(datos);

				// table.destroy();
				Swal.fire({
					icon: "success",
					title: "Usuario Eliminado",
					text: "Presione OK para continuar",
				}).then((result) => {
					/* Read more about isConfirmed, isDenied below */
					if (result.isConfirmed) {
					}
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
function thml_usuario(datos) {
	var disabled = "";
	var dataTable = "";
	datos.forEach((element) => {
		if (element.id_usuarios_admin == ID_USUARIO) disabled = "disabled";

		dataTable += `
					
									 <tr>
										 <td>
										 <div class="btn-list">
										   <button id="edit_rol" type="button"  class=" btn btn-sm btn-primary " data-bs-target="#modalQuill" data-bs-toggle="modal" value="Editar" name="edit" onclick="Editar(${element.id_usuarios_admin})">Editar</button>

										   <button ${disabled} id="eliminar-usuario" class="btn btn-sm btn-danger btn-eliminar-usuario" data-id_usuario="${element.id_usuarios_admin}"
										   onclick="eliminar_usuario(${element.id_usuarios_admin})">
										   <i class="side-menu__icon fe fe-trash-2"></i>
										   </button>
										 </div>
										 </td>

					 </div>
					 </td>
					 <td>${element.nombre}</td>
					 <td>${element.cargo}</td>
					 <td>${element.email}</td>
					 <td>${element.nombre_rol}</td>


					 </tr>

		
			
					 
					 `;

		disabled = "";
	});

	$("#basic-datatable tbody").html("");
	var htmlTags = dataTable;

	$("#basic-datatable tbody").append(htmlTags);
}
