<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
<title>Curriculum Vitae <?= $usuario->cedula;?></title>

<!-- <link href="<?php echo base_url();?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet"> -->
<style>
.row {
  margin-right: -15px;
  margin-left: -15px;
}
.col-xs-1, .col-sm-1, .col-md-1, .col-lg-1, .col-xs-2, .col-sm-2, .col-md-2, .col-lg-2, .col-xs-3, .col-sm-3, .col-md-3, .col-lg-3, .col-xs-4, .col-sm-4, .col-md-4, .col-lg-4, .col-xs-5, .col-sm-5, .col-md-5, .col-lg-5, .col-xs-6, .col-sm-6, .col-md-6, .col-lg-6, .col-xs-7, .col-sm-7, .col-md-7, .col-lg-7, .col-xs-8, .col-sm-8, .col-md-8, .col-lg-8, .col-xs-9, .col-sm-9, .col-md-9, .col-lg-9, .col-xs-10, .col-sm-10, .col-md-10, .col-lg-10, .col-xs-11, .col-sm-11, .col-md-11, .col-lg-11, .col-xs-12, .col-sm-12, .col-md-12, .col-lg-12 {
  position: relative;
  min-height: 1px;
  padding-right: 15px;
  padding-left: 15px;
}
.col-lg-12 {
    width: 100%;
}
.text-center {
  text-align: center;
}
body {
  font-family: "Roboto", sans-serif;
/*   font-family: "Times New Roman", serif; */
  font-size: 12px;
  line-height: 1.42857143;
  color: #333;
  background-color: #fff;
}
div.page_break {
    page-break-before: always;
}
header{
  position: relative;
  height: 150px;
}
.logo{
    width: 180px;
    height: auto;
    border: none;
}
h1,h2{
    text-align: center;
}
h2{
  color: #0069A6;
}


table{
  margin-left: 30px;
}
tr > th{
  font-size: 14px;
  font-weight: bold;
  width: 50px;
}
.th{
  width: 180px;
}

tr > td{
  font-size: 14px;
}
th, th, td {
  padding: 1px;
  text-align: left;
  
}
.table2 td {
  padding: 10px 0;

}
hr{
  border-bottom: 1px solid #03A9F4;
  width: 90%;
  margin: 0 auto;
}
p{
  white-space: normal;
  max-width: 100px;
}

.hola{
  position: absolute;
  top: 0;
  right: 0;
}
.hola2{
  position: absolute;
  top: 0;
  left: 0;
}
.banner{
  height:60px;
  width:10px;
  display: block;
}

</style>
</head>
<body>

<div class="container">

    <div class="banner">
      <img src="<?php echo FCPATH.'/img/cintillo-gobierno-bolivariano-instituto--768x49.png'?>" alt="banner" width="720">
    </div>

    <header>
        <div>
            <h1>Curriculum Vitae <?= $usuario->cedula;?></h1>
        </div>
        <div class="hola">
            <img src="<?php echo  FCPATH.'/qr_code/'.$imgqr; ?>" alt="qr" class="" width="150">
           
        </div>
         <div class="hola2">
         <img src="<?php echo  FCPATH.'/img/logo-nuevo-chamba.png'?>" alt="logo" class="logo">
        </div>    
    </header>
<?php
  //var_dump($personal);

  function obtener_edad_segun_fecha($fecha_nacimiento)
  {
      $nacimiento = new DateTime($fecha_nacimiento);
      $ahora = new DateTime(date("Y-m-d"));
      $diferencia = $ahora->diff($nacimiento);
      return $diferencia->format("%y");
  }  
?>
    <div class="col-sm-6 col-sm-offset-1">
    
          <h2>Datos de Contacto</h2>
          <hr>
          <table class="table">

            <?php if(isset($personal->nombres) and isset($personal->apellidos)){?>
            <TR>
              <TH class="th">Nombres y Apellidos:</TH>
              <TD><?php echo ucwords(mb_strtolower($personal->nombres))." ".ucwords(mb_strtolower($personal->apellidos));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->cedula)){?>
            <TR>
              <TH class="th">Cédula:</TH>
              <TD><?php echo $usuario->cedula;?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->fecha_nac)){?>
            <TR>
              <TH class="th">Edad:</TH>
              <TD><?php echo obtener_edad_segun_fecha($personal->fecha_nac);?> años</TD>
            </TR> 
            <?php }?>
            <?php if(isset($personal->email)){?>                  
            <TR>
              <TH class="th">Correo:</TH>
              <TD><?php echo ucwords(mb_strtolower($usuario->email));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->telf_cel)){?> 
            <TR>
              <TH class="th">Móvil:</TH>
              <TD><?php echo $personal->telf_cel;?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->telf_local)){?> 
            <TR>
              <TH class="th">Local:</TH>
              <TD><?php echo $personal->telf_local;?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->estado)){?> 
            <TR>
              <TH class="th">Estado:</TH>
              <TD><?php echo ucwords(mb_strtolower($personal->estado));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->municipio)){?> 
            <TR>
              <TH class="th">Municipio:</TH>
              <TD><?php echo ucwords(mb_strtolower($personal->municipio));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->parroquia)){?>              
            <TR>
              <TH class="th">Parroquia:</TH>
              <TD><?php echo ucwords(mb_strtolower($personal->parroquia));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->direccion)){?>               
            <TR>
              <TH class="th">Dirección específica:</TH>
              <TD><?php echo ucwords(mb_strtolower($personal->direccion));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->estcivil)){?>             
            <TR>
              <TH class="th">Estado Civil:</TH>
              <TD><?php echo ucwords(mb_strtolower($personal->estcivil));?></TD>
            </TR>
            <?php }?>
            <?php if(isset($personal->hijo)){?>             
            <TR>
              <TH class="th">Hijos:</TH>
              <TD>
                <?php
                  if($personal->hijo==0){
                    echo "Ninguno.";
                  }else{
                    echo ucwords(mb_strtolower($personal->hijo));
                  }
                
                ?>
              </TD>
            </TR>
            <?php } ?>                                                                                         
          </table>
          
    </div>

    <?php 
              if(isset($usuarioacademico) and $usuarioacademico!=""){?>
      <div class="col-sm-6 col-sm-offset-1">
          <h2>Formación Academica</h2>
          <hr>
          <table class="table2">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Centro Educativo</th>
                <th scope="col">Nivel</th>
                <th scope="col">Periodo</th>
              </tr>
            </thead>
            <tbody>
<?php 
                $i = 1;
                  foreach ($usuarioacademico as $key => $usuaca) {
                      echo '<tr>';
                          echo '<th scope="row">'.$i.'</th>';
                          echo '<td>'.$usuaca->centro_educ.'</td>';
                          echo '<td>'.$usuaca->nivel.' - '.$usuaca->nombre.'</td>';
                          echo '<td>'.$usuaca->rango_fecha.'</td>';
                      echo '</tr>';
                      $i++;
                  }
   
             
?>                        
            </tbody>
          </table>
      </div>
      <?php } ?>

      <div class="col-sm-6 col-sm-offset-1">
      
      
        <?php 
              if(isset($usuarioexperiencia) and $usuarioexperiencia!=""){
                foreach ($usuarioexperiencia as $key => $usuexp) {
         ?>   
          
          <h2>Experiencia Laboral</h2>
          <hr>
         <table class="table">      
          <TR>
            <TH>Empresa:</TH>
            <TD>
              <?php 
              $a = str_split($usuexp->empresa);
              for ($i=0; $i < count($a); $i++) { 
                if($i==80){echo "<br>";}
                if($i==150){echo "<br>";}
                if($i==200){echo "<br>";}
                echo $a[$i];
              }
              ?>
          </TD>
          </TR>
          <TR>
            <TH>Cargo:</TH>
            <TD>
              <?php 
              $a = str_split($usuexp->cargo);
              for ($i=0; $i < count($a); $i++) { 
                if($i==80){echo "<br>";}
                if($i==150){echo "<br>";}
                if($i==200){echo "<br>";}
                echo $a[$i];
              }
            ?>
            </TD>
          </TR>
          <TR>
            <TH >Funciones:</TH>
            <TD>
              <?php
                $a = str_split($usuexp->funciones);
                for ($i=0; $i < count($a); $i++) { 
                  if($i==80){echo "<br>";}
                  if($i==150){echo "<br>";}
                  if($i==200){echo "<br>";}
                  echo $a[$i];
                }
              ?>
            </TD>
          </TR>
          <TR>
            <TH>Area:</TH>
            <TD><?php echo $usuexp->sector_empresa?></TD>
          </TR>          
          <TR class="border">
            <TH>Periodo:</TH>
            <TD><?php echo $usuexp->rango_fecha;?></TD>
          </TR>
          </table>

                   
               <?php
               echo "<br>";
                  }

                }
            ?>                        

      </div>
      <?php if(isset($redesusuario) and isset($redesusuario)){?>
        
      <div class="col-sm-6 col-sm-offset-1">
      
          <h2>Redes Sociales</h2>
          <hr>
          <table class="table">

            <?php if(isset($redesusuario->twitter) and isset($redesusuario->twitter)){?>
            <TR>
              <TH class="th">Twitter:</TH>
              <TD><?php if($redesusuario->twitter!="") echo ucwords(mb_strtolower($redesusuario->twitter)); else echo "-";?></TD>
            </TR>
            <?php }?>
            <?php if(isset($redesusuario->facebook)){?>
            <TR>
              <TH class="th">Facebook:</TH>
              <TD><?php if($redesusuario->facebook!="") echo ucwords(mb_strtolower($redesusuario->facebook)); else echo "-";?></TD>
            </TR>
            <?php }?>
            <?php if(isset($redesusuario->instagram)){?>
            <TR>
              <TH class="th">Instagram:</TH>
              <TD><?php if($redesusuario->instagram!="") echo ucwords(mb_strtolower($redesusuario->instagram)); else echo "-";?></TD>
            </TR> 
            <?php }?>                                                                                     
          </table>
          <hr>
    </div>
    <?php } ?>
<!--     <h3>Conocimientos Informáticos</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  <hr>
    <h3>Cursos y Seminarios</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>
  <hr>
    <h3>Otros datos</h3>
    <table class="table">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col">First</th>
          <th scope="col">Last</th>
          <th scope="col">Handle</th>
        </tr>
      </thead>
      <tbody>
        <tr>
          <th scope="row">1</th>
          <td>Mark</td>
          <td>Otto</td>
          <td>@mdo</td>
        </tr>
        <tr>
          <th scope="row">2</th>
          <td>Jacob</td>
          <td>Thornton</td>
          <td>@fat</td>
        </tr>
        <tr>
          <th scope="row">3</th>
          <td>Larry</td>
          <td>the Bird</td>
          <td>@twitter</td>
        </tr>
      </tbody>
    </table>   -->  
<!-- <hr> -->

</div>
<!-- <div class="page_break"></div> -->

</body>
</html>
