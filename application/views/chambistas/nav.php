    <nav class="navbar">
        <div class="container-fluid">
            <div class="navbar-header">
                <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
                <a href="javascript:void(0);" class="bars"></a>
<!--                 <a class="navbar-brand" href="<?= base_url()?>inicio"><img src="<?php echo base_url();?>img/logo-nuevo-chamba.png" width="150" height="30" class="img-fluid2" alt="Responsive image"></a>
 -->            </div>
            <div class="collapse navbar-collapse" id="navbar-collapse">


                <ul class="nav navbar-nav navbar-right">

                    <!-- usuario -->
                    <li class="dropdown">
                        <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                            <i class="material-icons">account_circle</i>
                            <!--<span class="label-count">9</span>-->
                        </a>
                        <ul class="dropdown-menu">
                            <li class="header">Usuario</li>
                            <li class="body">
                                <ul class="menu tasks">
                                    <li <?php if($this->uri->segment(1)=='cambiarclave' || $this->uri->segment(1)=='cambiarclave') echo 'active';?>>
                                        <a href="<?php echo base_url();?>cambiarclave">
                                            <i class="material-icons">lock</i> Cambio de Contraseña
                                        </a>
                                    </li>
                                    <li>
                                        <a href="<?php echo base_url();?>Cusuarios/cerrar_session">
                                            <i class="material-icons">input</i> Salir
                                        </a>
                                    </li>                                                              
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <!-- usuario -->

                </ul>
            </div>
        </div>
    </nav>