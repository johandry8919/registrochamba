<!DOCTYPE html>
<html lang="es">

<head>

    <?php if (isset($title)) : ?>
    <title>Dashboard | <?php echo $title; ?></title>
    <?php else : ?>
    <title>Dashboard</title>
    <?php endif; ?>

    <meta charset="UTF-8">
    <meta name='viewport' content='width=device-width, initial-scale=1.0, user-scalable=0'>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- FAVICON -->
    <link rel="shortcut icon" type="image/x-icon" href="<?php echo base_url();?>favicon.png" />

    <!-- BOOTSTRAP CSS -->
    <link id="style" href="<?php echo base_url();?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet" />

    <!-- STYLE CSS -->
    <link href="<?php echo base_url();?>assets/css/style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/dark-style.css" rel="stylesheet" />
    <link href="<?php echo base_url();?>assets/css/transparent-style.css" rel="stylesheet">
    <link href="<?php echo base_url();?>assets/css/skin-modes.css" rel="stylesheet" />


    <!--- FONT-ICONS CSS -->
    <link href="<?php echo base_url();?>/assets/css/icons.css" rel="stylesheet" />

    <!-- COLOR SKIN CSS -->
    <link id="theme" rel="stylesheet" type="text/css" media="all"
        href="<?php echo base_url();?>/assets/colors/color1.css" />



    <?php $this->load->view("layouts/estilos_css"); ?>


</head>


<body class="app sidebar-mini ltr">

    <!-- GLOBAL-LOADER -->
    <div id="global-loader">
        <img src="<?php echo base_url();?>/assets/images/loader.svg" class="loader-img" alt="Loader">
    </div>
    <!-- /GLOBAL-LOADER -->

    <!-- PAGE -->
    <div class="page">
        <div class="page-main">

            <!-- app-Header  menu superior-->
            <?php $this->load->view("layouts/menu_superior"); ?>
            <!-- /app-Header -->

            <!--APP-SIDEBAR Menu Lateral-->

            <?php    if(isset($menu_lateral) && $menu_lateral=='estructuras'): 
            
            $this->load->view("layouts/estructuras/menu_lateral");    
           elseif( isset($menu_lateral) && $menu_lateral=='admin'):           
            $this->load->view("layouts/admin/menu_lateral");   
            elseif( isset($menu_lateral) && $menu_lateral=='empresas'):           
                $this->load->view("layouts/empresas/menu_lateral");                                
                                   
            else:
    		$this->load->view("layouts/menu_lateral"); 

            endif;

            ?>
            <!--app-content open-->
            <div class="main-content app-content mt-0">
                <div class="side-app">

                    <!-- CONTAINER -->
                    <div class="main-container container-fluid">

                        <!-- PAGE-HEADER -->
                        <div class="page-header">

                            <?php  if(isset($breadcrumb)): ?>
                            <h1 class="page-title"></h1>
                            <div>
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="javascript:void(0)"> <?php echo  $breadcrumb->menu ?></a></li>
                                    <li class="breadcrumb-item active" aria-current="page"><?php
                                    if(isset($breadcrumb->menu_seleccion )): 
                                     echo $breadcrumb->menu_seleccion;                                      
                                    endif; 
                                     ?></li>
                                </ol>
                            </div>

                            <?php  endif; ?>
                        </div> 
                        <!-- PAGE-HEADER END -->

                        <!-- ROW-1 OPEN -->
                        <!-- Row -->
                        <div class="row ">
                            <div class="col-md-12">
                            <?php $this->load->view("principal/" . $vista_principal); ?>
                            </div>
                        </div>
                        <!-- /Row -->
                    </div>
                    <!-- CONTAINER CLOSED -->
                </div>
            </div>
            <!--app-content closed-->
        </div>

     
        <!--/Sidebar-right-->

        <!-- Country-selector modal-->

        <!-- FOOTER -->
        <footer class="footer">
            <div class="container">
                <div class="row align-items-center flex-row-reverse">
                    <div class="col-md-12 col-sm-12 text-center">
                        Copyright © 2022 <a href="javascript:void(0)"></a>. Diseñado por <span
                            class="fa fa-heart text-danger"></span>  <a href="javascript:void(0)"> Gran Misión Chamba Juvenil </a>
                        Todos los derecho reservados.
                    </div>
                </div>
            </div>
        </footer>
        <!-- FOOTER CLOSED -->
    </div>



    <!-- BACK-TO-TOP -->
    <a href="#top" id="back-to-top"><i class="fa fa-angle-up"></i></a>

    <!-- JQUERY JS -->
    <script src="<?php echo base_url('assets/js/jquery.min.js');?>"></script>

    <!-- BOOTSTRAP JS -->
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/popper.min.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>

    <!-- SIDE-MENU JS -->
    <script src="<?php echo base_url();?>/assets/plugins/sidemenu/sidemenu.js"></script>

    <!-- SIDEBAR JS -->
    <script src="<?php echo base_url();?>/assets/plugins/sidebar/sidebar.js"></script>

    <!-- GENERATE OTP JS -->
    <script src="<?php echo base_url();?>assets/js/generate-otp.js"></script>

    <!-- Perfect SCROLLBAR JS-->



  
    <script src="<?php echo base_url();?>plugins/jquery-validation/jquery.validate.js"></script>
    <script src="<?php echo base_url();?>plugins/jquery-validation/localization/messages_es.js"></script>
    <!-- Color Theme js -->
    <!-- chart temporal -->
    <script src="<?php echo base_url();?>assets/plugins/chart/Chart.bundle.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/chart/rounded-barchart.js"></script>
    <script src="<?php echo base_url();?>assets/plugins/chart/utils.js"></script>
    <script src="<?php echo base_url();?>/assets/js/admin.js"></script>
    <script src="<?php echo base_url();?>assets/js/themeColors.js"></script>

    <!-- CUSTOM JS -->
    <script src="<?php echo base_url();?>assets/js/custom.js"></script>

    <script type="text/javascript" src="https://popupsmart.com/freechat.js"></script><script> window.start.init({ title: "Hola Como estas? ✌️", message: "¿Cómo podemos ayudarte? Simplemente envíenos un mensaje ahora para obtener ayuda.", color: "#FA764F", position: "right", placeholder: "ingresa tu mensaje", withText: "escribe a qui", viaWhatsapp: "O escribe  via Whatsapp", gty: "Go to your", awu: "and write us", connect: "Connect now",  button: "Pregunta aqui", device: "everywhere",  services: [{"name":"whatsapp","content":null}]})</script>



    <!-- Sticky js -->
    <script src="<?php echo base_url();?>/assets/js/sticky.js"></script>

       <!-- <script src="<?php echo base_url();?>/assets/plugins/bootstrap-select/bootstrap-select.min.css"></script>
    <script src="<?php echo base_url();?>/assets/plugins/bootstrap-select/js/bootstrap-select.min.js"></script> -->

	<?php $this->load->view("layouts/scripts_js"); ?>
   

</body>



</html>