$("#tipo_rol").change(function (e) {

    console.log(e)

	if($(this).val()=='admin')
	location.href='usuarios?p=admin'
	else if($(this).val()=='estructura'	){
		location.href='usuarios?p=estructura'

	}else if($(this).val()=='universidades'){

		location.href='usuarios?p=universidades'

	}else if($(this).val()=='empresas'){

		location.href='usuarios?p=empresas'

	}
	

  });