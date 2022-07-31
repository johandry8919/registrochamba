
	$("#datospersonales").submit(function (e) {
	
		e.preventDefault();


		 if(registrar())
		 e.currentTarget.submit();


		
		
	});

	function registrar() {
		var nombres = $("#nombres").val();
		var apellidos = $("#apellidos").val();
		var edad = $("#edad").val();
		 edad = parseInt(edad);
		var telf_movil = $("#telf_movil").val();
		var telf_movil = parseInt(telf_movil);
		var telf_local = $("#telf_local").val();
		var telf_local = parseInt(telf_local);
		var id_movimiento_religioso = $("#id_movimiento_religioso").val();
		var estado = $("#cod_estado").val();
		var cod_municipio = $("#cod_municipio").val();
		var cod_parroquia = $("#cod_parroquia").val();
		var id_movimiento_sociales = $("#id_movimiento_sociales").val();
        var direccion = $("#direccion").val()
		// estcivil es un select
		var estcivil = $("#estcivil").val();
		var aborigen = $("#aborigen").val();
		var empleo = $("#empleo").val();		
		var genero = $("#genero").val();
		var id_profesion = $("#id_profesion").val();
		var hijos = $("#hijos").val();
		var hijos = parseInt(hijos);
		var expresion = /^[a-zA-Z-_\.]+$/;
        

		if (nombres == "" || expresion.test(nombres) == false) {
			$("#nombres").focus();
            
			return false;

		} else if (apellidos == "" || expresion.test(apellidos) == false) {
			$("#apellidos").focus();
			return false;
		} else if (edad == 0) {
			$("#edad").focus();
			return false;
		} else if (direccion == "") {
			$("#direccion").focus();
			return false;
		} else if (estcivil == "" || estcivil == 0) {
			$("#estcivil").focus();
			return false;
		} else if (expresion.test(telf_movil) == true) {
			$("#telf_movil").focus();
			return false;
		} else if (id_profesion == "" || id_profesion == 0) {
			$("#id_profesion").focus();
			return false;
		} else if (aborigen == "" || aborigen == 0) {
			$("#aborigen").focus();
			return false;
		} else if (genero == "" ) {
			$("#genero").focus();
			return false;
		} else if (empleo == "" || empleo == 0) {
			$("#empleo").focus();
			return false;
		} else if (id_movimiento_religioso == "" || id_movimiento_religioso == 0) {
			$("#id_movimiento_religioso").focus();
			return false;
		} else if (estado == "" || estado == 0) {
			$("#cod_estado").focus();
			return false;
		} else if (cod_municipio == "" || cod_municipio == 0) {
			$("#cod_municipio").focus();
			return false;
		} else if (cod_parroquia == "" || cod_parroquia == 0) {
			$("#cod_parroquia").focus();
			return false;
		} else if (id_movimiento_sociales == 0) {
			$("#id_movimiento_sociales").focus();
			return false;
		} else if(direccion == ""){
            $("#direccion").focus();
			return false;

        }

		return true;
	}

	$("#nombres").on("keyup", function () {
		"use strict";
		var apellidos_representante = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (expresion.test(apellidos_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});
	$("#apellidos").on("keyup", function () {
		"use strict";
		var apellidos_representante = $(this).val();
		var expresion = /^[a-zA-Z-_\.]+$/;

		if (expresion.test(apellidos_representante)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

	$("#edad ").on("keyup", function () {
		"use strict";
		var edad = $(this).val();
		var expresion = /^[0-9]+$/;

		if (expresion.test(edad)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (edad == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#edad").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#hijo").on("change", function () {
		"use strict";
		var hijo = $(this).val();
		var expresion = /^[0-9]+$/;

		if (hijo) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#hijo").removeClass("is-valid").addClass("is-invalid");
		}
	});
	// estcivil
	$("#estcivil").on("change", function () {
		"use strict";
		var estcivil = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(estcivil)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (estcivil == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#estcivil").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#sexo").on("change", function () {
		"use strict";
		var sexo = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(sexo)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#sexo").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#empleo").on("change", function () {
		"use strict";
		var empleo = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(empleo)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (empleo == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#empleo").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#id_movimiento_religioso").on("change", function () {
		"use strict";
		var id_movimiento_religioso = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(id_movimiento_religioso)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (id_movimiento_religioso == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#id_movimiento_religioso")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	});
	$("#id_movimiento_sociales").on("change", function () {
		"use strict";
		var id_movimiento_sociales = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(id_movimiento_sociales)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (id_movimiento_sociales == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#id_movimiento_sociales")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	});

	$("#telf_movil").on("keyup", function () {
		"use strict";
		var telefono = $("#telf_movil").val();
		var expresion = /^\d{11,11}$/;

		if (expresion.test(telefono)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-invalid error-input").addClass("is-valid");
			$("#telf_movil")
				.removeClass("is-valid")
				.addClass("is-invalid");
		}
	});
	//telf_local
	$("#telf_local").on("keyup", function () {
		"use strict";
		var telf_local = $("#telf_local").val();
		var expresion = /^\d{7,13}$/;

		if (expresion.test(telf_local)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#telf_local").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#id_profesion").on("change", function () {
		"use strict";
		var profesion_oficio = $(this).val();
		// var expresion = /^\d{1}$/;
		var expresion = /^[a-zA-Z0-9\s]*$/;

		if (profesion_oficio) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (profesion_oficio == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#id_profesion").removeClass("is-valid").addClass("is-invalid");
		}
	});
	$("#aborigen").on("change", function () {
		"use strict";
		var aborigen = $(this).val();
		// var expresion = /^\d{1}$/;
		var expresion = /^[a-zA-Z0-9\s]*$/;

		if (aborigen) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (aborigen == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			$("#aborigen").removeClass("is-valid").addClass("is-invalid");
		}
	});

	//Estado
	$("#cod_estado").on("change", function () {
		"use strict";
		var estado = $(this).val();
		var expresion = /^\d{1}$/;

		if (expresion.test(estado)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (estado == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});
	$("#cod_municipio").on("change", function () {
		"use strict";
		var cod_municipio = $(this).val();
		var expresion = /^\d{1}$/;

		if (expresion.test(cod_municipio)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (cod_municipio == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});
	$("#cod_parroquia").on("change", function () {
		"use strict";
		var cod_parroquia = $(this).val();
		var expresion = /^\d{1}$/;

		if (expresion.test(cod_parroquia)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
			if (cod_parroquia == 0) {
				$(this).removeClass("is-valid").addClass("is-invalid error-input");
			}
		} else {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		}
	});

	//Dirección Especifica
	$("#direccion").on("keyup", function () {
		"use strict";
		var direccion = $(this).val();
		var expresion = /^[a-zA-Z0-9-_\.]+$/;

		if (expresion.test(direccion)) {
			$(this)
				.removeClass("is-invalid error-input")
				.addClass("is-valid valid-input");
		} else {
			$(this).removeClass("is-valid").addClass("is-invalid error-input");
		}
	});

