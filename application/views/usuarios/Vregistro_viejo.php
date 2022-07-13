<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

    <title>Registro</title>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="col">
          <form action="<?php echo base_url();?>Cusuarios/registro" method="POST" onSubmit="return enviado()">

            <div class="form-group">
              <label for="nac">Nacionalidad</label>
              <select class="form-control" id="nac" name="nac">
                  <option value="" selected="">Seleccione</option>
                  <option value="V">Venezolano(a)</option>
                  <option value="E">Extranjero(a)</option>
              </select>
              <?php echo form_error('nac');?>
            </div> 

            <div class="form-group">
              <label for="cedula">Cedula</label>
              <input type="text" class="form-control" id="cedula" name="cedula" value="<?php echo set_value('cedula');?>">
              <?php echo form_error('cedula');?>
            </div>

            <div class="form-group">
              <label for="codigo">Código Carnet</label>
              <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo set_value('codigo');?>">
               <?php echo form_error('codigo');?>
            </div>

            <div class="form-group">
              <label for="email">Correo</label>
              <input type="email" class="form-control" id="email" name="email" value="<?php echo set_value('email');?>">
               <?php echo form_error('email');?>
            </div>

            <div class="form-group">
              <label for="emailr">Repetir Correo</label>
              <input type="email" class="form-control" id="emailr" name="emailr" value="<?php echo set_value('emailr');?>">
               <?php echo form_error('emailr');?>
            </div>

            <div class="form-group">
              <label for="password">Clave</label>
              <input type="password" class="form-control" id="password" name="password" value="<?php echo set_value('password');?>">
               <?php echo form_error('password');?>
            </div>

            <div class="form-group">
              <label for="passwordr">Repetir Clave</label>
              <input type="password" class="form-control" id="passwordr" name="passwordr" value="<?php echo set_value('passwordr');?>">
               <?php echo form_error('passwordr');?>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

          <?php if(isset($mensaje)){ ?>
                <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-danger"> <?php echo $mensaje; ?></div>
                  </div>
                </div>
          <?php }?>

          <?php if(isset($mensaje2)){ ?>
                <div class="row">
                  <div class="col-md-12">
                      <div class="alert alert-success"> <?php echo $mensaje2; ?></div>
                  </div>
                </div>
          <?php }?>
        </div>
      </div>
    </div>



    <script>
  var cuenta=0;

function enviado()
{ 
  if (cuenta == 0)
  {
    cuenta++;
    return true;
  }
  else 
  {
    alert("El formulario ya está siendo enviado, por favor espere un momento.");
    return false;
  }
}      
    </script>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
  </body>
</html>