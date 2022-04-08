<aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="<?php echo base_url(); ?>img/avatar_on.png" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p><?php echo $this->session->userdata('nombreAdm') . " " . $this->session->userdata('apellidoAdm'); ?></p>
                        <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                    </div>
                </div>
                <!-- search form -->

                <!-- /.search form -->
                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header">Menu</li>

                    <li>
                        <a href="<?php echo base_url(); ?>inicioadm">
                            <i class="fa fa-dashboard"></i> <span>Inicio</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            <i class="fa fa-pie-chart"></i> <span>Data</span>
                            <span class="pull-right-container">
                            </span>
                        </a>
                    </li>
                    <li class="treeview active">
                    <a href="#">
                        <i class="fa fa-pie-chart"></i>
                        <span>Charts</span>
                        <span class="pull-right-container">
                        <i class="fa fa-angle-left pull-right"></i>
                        </span>
                    </a>
                    <ul class="treeview-menu">
                        <li class="<?php if($this->uri->segment(1)=='inicioadm') echo 'active';?>"><a href="<?php echo base_url(); ?>inicioadm"><i class="fa fa-circle-o"></i> Generales</a></li>
                        <li class="#"><a href="#"><i class="fa fa-circle-o"></i> Productivo - Emprender</a></li>
                        <li><a href="#"><i class="fa fa-circle-o"></i> Organizativo - Brigadas</a></li>
                        <li class="<?php if($this->uri->segment(2)=='VviviendaAdm') echo 'active';?>"><a href="<?php echo base_url(); ?>Cadministrador/VviviendaAdm"><i class="fa fa-circle-o"></i> Social - Vivienda</a></li>
                    </ul>
                    </li> 


                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>