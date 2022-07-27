<div class="sticky">
                <div class="app-sidebar__overlay" data-bs-toggle="sidebar"></div>
                <div class="app-sidebar">
                    <div class="side-header pt-6">
                        <a class="header-brand1" href="<?php echo base_url();?>">
                          
                            <img src="<?php echo base_url();?>/img/logo-nuevo-chamba.png" class="header-brand-img" alt="" width="50"
                            style="height:100px; " class="header-brand-img light-logo1 "
                                alt="logo">
                        </a>
                        <!-- LOGO -->
                    </div>
                    
                 <div class="main-sidemenu">
                        <div class="slide-left disabled" id="slide-left"><svg xmlns="http://www.w3.org/2000/svg"
                                fill="#7b8191" width="24" height="24" viewBox="0 0 24 24">
                                <path d="M13.293 6.293 7.586 12l5.707 5.707 1.414-1.414L10.414 12l4.293-4.293z" />
                            </svg></div>
                        <ul class="side-menu">
                            <li class="sub-category">
                                <h3>Menu</h3>
                            </li>
                         
                            <li class="slide pt-5">
                                <a class="side-menu__item " data-bs-toggle="slide" href="<?php echo base_url();?>"><i class="side-menu__icon fe fe-grid"></i><span class="side-menu__label">Inicio</span></a>
                            </li>
                            <li class="slide <?php if($this->uri->segment(1)=='datospersonales' || $this->uri->segment(1)=='formacionacademica' || $this->uri->segment(1)=='formacionacademicaform' || $this->uri->segment(1)=='experiencialaboral' || $this->uri->segment(1)=='experiencialaboralform' || $this->uri->segment(1)=='redessociales' || $this->uri->segment(1)=='redessociales' ) echo 'is-expanded';?>">
                                <a class="side-menu__item" data-bs-toggle="slide" href="javascript:void(0)"><i
                                        class="side-menu__icon fe fe-user-plus"></i><span
                                        class="side-menu__label">Registro y Actualización</span><i
                                        class="angle fe fe-chevron-right"></i></a>
                                <ul class="slide-menu">
                                    
                                    <li ><a href="<?php echo base_url();?>datospersonales"
                                            class="slide-item <?php if($this->uri->segment(1)=='datospersonales') echo 'active';?>"
                                            >Datos Personales</a></li>
                                            
                                    <li><a href="<?php echo base_url();?>formacionacademica"
                                     class="slide-item <?php if($this->uri->segment(1)=='formacionacademica' || $this->uri->segment(1)=='formacionacademicaform') echo 'active';?>"
                                         >Formación Académica</a></li>

                                         <li><a href="<?php echo base_url();?>experiencialaboral"
                                     class="slide-item <?php if($this->uri->segment(1)=='experiencialaboral' || $this->uri->segment(1)=='experiencialaboral') echo 'active';?>"
                                         >Experencia Laboral</a></li>
                                         <li><a href="<?php echo base_url();?>redessociales"
                                     class="slide-item <?php if($this->uri->segment(1)=='redessociales' || $this->uri->segment(1)=='redessociales') echo 'active';?>"
                                         >Redes Sociales</a></li>

                                  
                                </ul>
                            </li>
                      
                                     <!-- productivo -->
                            <li class="slide">
                                <a class="side-menu__item 
                                 <?php if($this->uri->segment(1)=='productivo' || $this->uri->segment(1)=='productivo') echo 'active';?>
                                " data-bs-toggle="slide" href="<?php echo base_url();?>productivo"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">Productivo - Emprender</span></a>
                            </li>
                    
                         <!-- brigadas -->
                            <li class="slide">
                                <a class="side-menu__item 
                                 <?php if($this->uri->segment(1)=='brigadas' || $this->uri->segment(1)=='brigadas') echo 'active';?>
                                " data-bs-toggle="slide" href="<?php echo base_url();?>brigadas"><i class="side-menu__icon fe fe-users"></i><span class="side-menu__label">Organizativo - Brigadas</span></a>
                            </li>

                        <!-- viviendajoven -->
                        <li class="slide">
                        <a class="side-menu__item 
                            <?php if($this->uri->segment(1)=='viviendajoven' || $this->uri->segment(1)=='viviendajoven') echo 'active';?>
                        " data-bs-toggle="slide" href="<?php echo base_url();?>viviendajoven"><i class="side-menu__icon fe fe-home"></i><span class="side-menu__label">Social - Vivienda Joven</span></a>
                    </li>
         

                         <!-- curriculum -->
                         <li class="slide mt-5">
                            <a class="side-menu__item 
                                <?php if($this->uri->segment(1)=='cv' || $this->uri->segment(1)=='cv') echo 'active';?>
                            " data-bs-toggle="slide" href="<?php echo base_url();?>cv"><i class="side-menu__icon fe fe-briefcase"></i><span class="side-menu__label">CV virtual</span></a>
                        </li>
             
                        </ul>
                        <div class="slide-right" id="slide-right"><svg xmlns="http://www.w3.org/2000/svg" fill="#7b8191"
                                width="24" height="24" viewBox="0 0 24 24">
                                <path d="M10.707 17.707 16.414 12l-5.707-5.707-1.414 1.414L13.586 12l-4.293 4.293z" />
                            </svg></div>
                    </div>
                </div>
                <!--/APP-SIDEBAR-->
            </div>