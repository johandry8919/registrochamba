<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chamba Juvenil</title>

    <!-- Bootstrap Core Css -->
    <link href="<?php echo base_url(); ?>plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <style>
        .container {
            width: 60%;
            display: flex;
            align-items: center;
            flex-direction: column;
            background: linear-gradient(360deg, #03A9F4, #fff 70%);
            margin: 0 auto;
        }

        .cintillo {
            max-width: 650px;
            width: auto;
        }

        .logo {
            max-width: 150px;
            display: block;
            margin: 0 auto;
            padding-top: 10px;
        }
        @media (max-width: 767px) {
            .container {
            width: 95%;}
            .cintillo {
                display:none;
            }
        }
    </style>
</head>

<body>

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
    <div class="container">
        <div class="banner">
            <img src="<?php echo base_url() . '/img/cintillo-gobierno-bolivariano-instituto--768x49.png' ?>" alt="banner" class="img-responsive cintillo">
            <img src="<?php echo base_url() . '/img/logo-nuevo-chamba.png' ?>" alt="logo" class="img-responsive logo">
        </div>

        <?php
            if($personal!=null and 
            $usuario!=null and 
            $usuarioexperiencia!=null and 
            $usuarioacademico!=null and
            $redesusuario!=null)
            {
        ?>
        <h2>Datos de Contacto</h2>
        <table class="table">

            <?php if (isset($personal->nombres) and isset($personal->apellidos)) { ?>
                <TR>
                    <TH class="th">Nombres y Apellidos:</TH>
                    <TD><?php echo ucwords(mb_strtolower($personal->nombres)) . " " . ucwords(mb_strtolower($personal->apellidos)); ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->cedula)) { ?>
                <TR>
                    <TH class="th">Cédula:</TH>
                    <TD><?php echo $usuario->cedula; ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->fecha_nac)) { ?>
                <TR>
                    <TH class="th">Edad:</TH>
                    <TD><?php echo obtener_edad_segun_fecha($personal->fecha_nac); ?> años</TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->email)) { ?>
                <TR>
                    <TH class="th">Correo:</TH>
                    <TD><?php echo ucwords(mb_strtolower($usuario->email)); ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->telf_cel)) { ?>
                <TR>
                    <TH class="th">Móvil:</TH>
                    <TD><?php echo $personal->telf_cel; ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->telf_local)) { ?>
                <TR>
                    <TH class="th">Local:</TH>
                    <TD><?php echo $personal->telf_local; ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->estado)) { ?>
                <TR>
                    <TH class="th">Estado:</TH>
                    <TD><?php echo ucwords(mb_strtolower($personal->estado)); ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->municipio)) { ?>
                <TR>
                    <TH class="th">Municipio:</TH>
                    <TD><?php echo ucwords(mb_strtolower($personal->municipio)); ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->parroquia)) { ?>
                <TR>
                    <TH class="th">Parroquia:</TH>
                    <TD><?php echo ucwords(mb_strtolower($personal->parroquia)); ?></TD>
                </TR>
            <?php } ?>

            <!--<?php if (isset($personal->direccion)) { ?>
                <TR>
                    <TH class="th">Dirección específica:</TH>
                    <TD><?php echo ucwords(mb_strtolower($personal->direccion)); ?></TD>
                </TR>
            <?php } ?> -->

            <?php if (isset($personal->estcivil)) { ?>
                <TR>
                    <TH class="th">Estado Civil:</TH>
                    <TD><?php echo ucwords(mb_strtolower($personal->estcivil)); ?></TD>
                </TR>
            <?php } ?>
            <?php if (isset($personal->hijo)) { ?>
                <TR>
                    <TH class="th">Hijos:</TH>
                    <TD>
                        <?php
                        if ($personal->hijo == 0) {
                            echo "Ninguno.";
                        } else {
                            echo ucwords(mb_strtolower($personal->hijo));
                        }

                        ?>
                    </TD>
                </TR>
            <?php } ?>
        </table>

        <?php
        if (isset($usuarioacademico) and $usuarioacademico != "") { ?>

                <h2>Formación Academica</h2>
                <table class="table">
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
                            echo '<th scope="row">' . $i . '</th>';
                            echo '<td>' . $usuaca->centro_educ . '</td>';
                            echo '<td>' . $usuaca->nivel . ' - ' . $usuaca->nombre . '</td>';
                            echo '<td>' . $usuaca->rango_fecha . '</td>';
                            echo '</tr>';
                            $i++;
                        }


                        ?>
                    </tbody>
                </table>
        <?php } ?>

        <h2>Experiencia Laboral</h2>
        <?php
        if (isset($usuarioexperiencia) and $usuarioexperiencia != "") {
            foreach ($usuarioexperiencia as $key => $usuexp) {
        ?>
                <table class="table">
                    <TR>
                        <TH>Empresa:</TH>
                        <TD>
                            <?php
                            $a = str_split($usuexp->empresa);
                            for ($i = 0; $i < count($a); $i++) {
                                if ($i == 80) {
                                    echo "<br>";
                                }
                                if ($i == 150) {
                                    echo "<br>";
                                }
                                if ($i == 200) {
                                    echo "<br>";
                                }
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
                            for ($i = 0; $i < count($a); $i++) {
                                if ($i == 80) {
                                    echo "<br>";
                                }
                                if ($i == 150) {
                                    echo "<br>";
                                }
                                if ($i == 200) {
                                    echo "<br>";
                                }
                                echo $a[$i];
                            }
                            ?>
                        </TD>
                    </TR>
                    <TR>
                        <TH>Funciones:</TH>
                        <TD>
                            <?php
                            $a = str_split($usuexp->funciones);
                            for ($i = 0; $i < count($a); $i++) {
                                if ($i == 80) {
                                    echo "<br>";
                                }
                                if ($i == 150) {
                                    echo "<br>";
                                }
                                if ($i == 200) {
                                    echo "<br>";
                                }
                                echo $a[$i];
                            }
                            ?>
                        </TD>
                    </TR>
                    <TR>
                        <TH>Area:</TH>
                        <TD><?php echo $usuexp->sector_empresa ?></TD>
                    </TR>
                    <TR class="border">
                        <TH>Periodo:</TH>
                        <TD><?php echo $usuexp->rango_fecha; ?></TD>
                    </TR>
                </table>


        <?php
                echo "<br>";
            }
        }
        ?>
        <?php if (isset($redesusuario) and isset($redesusuario)) { ?>

            <h2>Redes Sociales</h2>
            <table class="table">

                <?php if (isset($redesusuario->twitter) and isset($redesusuario->twitter)) { ?>
                    <TR>
                        <TH class="th">Twitter:</TH>
                        <TD><?php if ($redesusuario->twitter != "") echo ucwords(mb_strtolower($redesusuario->twitter));
                            else echo "-"; ?></TD>
                    </TR>
                <?php } ?>
                <?php if (isset($redesusuario->facebook)) { ?>
                    <TR>
                        <TH class="th">Facebook:</TH>
                        <TD><?php if ($redesusuario->facebook != "") echo ucwords(mb_strtolower($redesusuario->facebook));
                            else echo "-"; ?></TD>
                    </TR>
                <?php } ?>
                <?php if (isset($redesusuario->instagram)) { ?>
                    <TR>
                        <TH class="th">Instagram:</TH>
                        <TD><?php if ($redesusuario->instagram != "") echo ucwords(mb_strtolower($redesusuario->instagram));
                            else echo "-"; ?></TD>
                    </TR>
                <?php } ?>
            </table>
        <?php } ?>
<?php }else{ 
    echo "<h2>Ingresa al sistema y completa tus datos para visualizar tu perfil.</h2>";
}?>
    </div>
</body>

</html>