$("#tipo_rol").change(function (e) {

    console.log(e)

	if($(this).val()=='admin')
	location.href='usuarios?p=admin'
	else	
	location.href='usuarios?p=estructura'

  });