    <section>
        <!-- Left Sidebar -->
        <aside id="leftsidebar" class="sidebar">
            <!-- User Info -->
            <div class="user-info">
                <div class="image">
                    <img src="<?php echo base_url();?>img/user2.png" width="48" height="48" alt="User" />
                </div>

                <div class="info-container">
                    <!--<div class="name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">John Doe</div>-->
                    <div class="email"><?php echo $this->session->userdata('email');?></div>
                </div>
            </div>
            <!-- #User Info -->
            <!-- Menu -->
            <div class="menu">
                <ul class="list">
                    <li class="header">Menu</li>

                    <li class="<?php if($this->uri->segment(1)=='inicio') echo 'active';?><?php if($this->uri->segment(1)=='cambiarclave' || $this->uri->segment(1)=='cambiarclave') echo 'active';?>">
                        <a href="<?php echo base_url();?>inicio">
                            <i class="material-icons">home</i>
                            <span>Inicio</span>
                        </a>
                    </li>

                    <li>
                        <a href="javascript:void(0);" class="menu-toggle <?php if($this->uri->segment(1)=='datospersonales' || $this->uri->segment(1)=='formacionacademica' || $this->uri->segment(1)=='formacionacademicaform' || $this->uri->segment(1)=='experiencialaboral' || $this->uri->segment(1)=='experiencialaboralform' || $this->uri->segment(1)=='redessociales' || $this->uri->segment(1)=='redessociales' ) echo 'toggled';?>">
                            <i class="material-icons">assignment</i>
                            <span>Registro y Actualización</span>
                        </a>
                        <ul class="ml-menu">
                            <li class="<?php if($this->uri->segment(1)=='datospersonales') echo 'active';?>">
                                <a href="<?php echo base_url();?>datospersonales">Datos Personales</a>
                            </li>
                            <li class="<?php if($this->uri->segment(1)=='formacionacademica' || $this->uri->segment(1)=='formacionacademicaform') echo 'active';?>">
                                <a href="<?php echo base_url();?>formacionacademica">Formación Académica</a>
                            </li>                            
                            <li class="<?php if($this->uri->segment(1)=='experiencialaboral' || $this->uri->segment(1)=='experiencialaboralform') echo 'active';?>">
                                <a href="<?php echo base_url();?>experiencialaboral">Experencia Laboral</a>
                            </li>
<!--                             <li class="<?php if($this->uri->segment(1)=='productivo' || $this->uri->segment(1)=='productivo') echo 'active';?>">
                                <a href="<?php echo base_url();?>productivo">Productivo</a>
                            </li>
                            <li class="<?php if($this->uri->segment(1)=='brigadas' || $this->uri->segment(1)=='brigadas') echo 'active';?>">
                                <a href="<?php echo base_url();?>brigadas">Brigadas</a>
                            </li>   -->                                                      
                            <li class="<?php if($this->uri->segment(1)=='redessociales' || $this->uri->segment(1)=='redessociales') echo 'active';?>">
                                <a href="<?php echo base_url();?>redessociales">Redes Sociales</a>
                            </li>
                            
                        </ul>
                    </li>

                    <!--<li class="<?php if($this->uri->segment(1)=='insercion' || $this->uri->segment(1)=='insercion') echo 'active';?>">
                        <a href="<?php echo base_url();?>insercion">
                            <i class="material-icons">content_copy</i>
                            <span>Inserción Laboral</span>
                        </a>
                    </li> -->
<!--                     <li class="<?php if($this->uri->segment(1)=='datospersonales' || $this->uri->segment(1)=='datospersonales') echo 'active';?>">
                        <a href="<?php echo base_url();?>datospersonales">
                            <i class="material-icons">content_copy</i>
                            <span>Datos Personales</span>
                        </a>
                    </li>                    
                    <li class="<?php if($this->uri->segment(1)=='formacionacademica' || $this->uri->segment(1)=='formacionacademica') echo 'active';?>">
                        <a href="<?php echo base_url();?>formacionacademica">
                            <i class="material-icons">content_copy</i>
                            <span>Formación Académica</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=='experiencialaboral' || $this->uri->segment(1)=='experiencialaboral') echo 'active';?>">
                        <a href="<?php echo base_url();?>experiencialaboral">
                            <i class="material-icons">content_copy</i>
                            <span>Experiencia Laboral</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=='redessociales' || $this->uri->segment(1)=='redessociales') echo 'active';?>">
                        <a href="<?php echo base_url();?>redessociales">
                            <i class="material-icons">content_AcUnit</i>
                            <span>Redes Sociales</span>
                        </a>
                    </li> -->                                        
                    <li class="<?php if($this->uri->segment(1)=='productivo' || $this->uri->segment(1)=='productivo') echo 'active';?>">
                        <a href="<?php echo base_url();?>productivo">
                            <i class="material-icons">business_center</i>
                            <span>Productivo - Emprender</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=='brigadas' || $this->uri->segment(1)=='brigadas') echo 'active';?>">
                        <a href="<?php echo base_url();?>brigadas">
                            <i class="material-icons">badge</i>
                            <span>Organizativo - Brigadas</span>
                        </a>
                    </li>
                    <li class="<?php if($this->uri->segment(1)=='viviendajoven' || $this->uri->segment(1)=='viviendajoven') echo 'active';?>">
                        <a href="<?php echo base_url();?>viviendajoven">
                            <i class="material-icons">fact_check</i>
                            <span>Social - Vivienda Joven</span>
                        </a>
                    </li>


                    <li class="<?php if($this->uri->segment(1)=='cv' || $this->uri->segment(1)=='cv') echo 'active';?>">
                        <a href="<?php echo base_url();?>cv">
                            <i class="material-icons">get_app</i>
                            <span>CV virtual</span>
                        </a>
                    </li>
                    <!-- 
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Cards</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/cards/basic.html">Basic</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/colored.html">Colored</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/cards/no-header.html">No Header</a>
                                    </li>
                                </ul>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Infobox</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-1.html">Infobox-1</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-2.html">Infobox-2</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-3.html">Infobox-3</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-4.html">Infobox-4</a>
                                    </li>
                                    <li>
                                        <a href="pages/widgets/infobox/infobox-5.html">Infobox-5</a>
                                    </li>
                                </ul>
                            </li>
                        </ul> -->
                       
                    <!--
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons">content_paste</i>
                            <span>Asignación Chamba Juvenil</span>
                        </a>
                        
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/ui/alerts.html">Alerts</a>
                            </li>
                            <li>
                                <a href="pages/ui/animations.html">Animations</a>
                            </li>
                            <li>
                                <a href="pages/ui/badges.html">Badges</a>
                            </li>

                            <li>
                                <a href="pages/ui/breadcrumbs.html">Breadcrumbs</a>
                            </li>
                            <li>
                                <a href="pages/ui/buttons.html">Buttons</a>
                            </li>
                            <li>
                                <a href="pages/ui/collapse.html">Collapse</a>
                            </li>
                            <li>
                                <a href="pages/ui/colors.html">Colors</a>
                            </li>
                            <li>
                                <a href="pages/ui/dialogs.html">Dialogs</a>
                            </li>
                            <li>
                                <a href="pages/ui/icons.html">Icons</a>
                            </li>
                            <li>
                                <a href="pages/ui/labels.html">Labels</a>
                            </li>
                            <li>
                                <a href="pages/ui/list-group.html">List Group</a>
                            </li>
                            <li>
                                <a href="pages/ui/media-object.html">Media Object</a>
                            </li>
                            <li>
                                <a href="pages/ui/modals.html">Modals</a>
                            </li>
                            <li>
                                <a href="pages/ui/notifications.html">Notifications</a>
                            </li>
                            <li>
                                <a href="pages/ui/pagination.html">Pagination</a>
                            </li>
                            <li>
                                <a href="pages/ui/preloaders.html">Preloaders</a>
                            </li>
                            <li>
                                <a href="pages/ui/progressbars.html">Progress Bars</a>
                            </li>
                            <li>
                                <a href="pages/ui/range-sliders.html">Range Sliders</a>
                            </li>
                            <li>
                                <a href="pages/ui/sortable-nestable.html">Sortable & Nestable</a>
                            </li>
                            <li>
                                <a href="pages/ui/tabs.html">Tabs</a>
                            </li>
                            <li>
                                <a href="pages/ui/thumbnails.html">Thumbnails</a>
                            </li>
                            <li>
                                <a href="pages/ui/tooltips-popovers.html">Tooltips & Popovers</a>
                            </li>
                            <li>
                                <a href="pages/ui/waves.html">Waves</a>
                            </li>
                        </ul>
                        
                    </li>
                    -->

                    <!--
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">view_list</i>
                            <span>Información Familiar</span>
                        </a>
                      
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/tables/normal-tables.html">Normal Tables</a>
                            </li>
                            <li>
                                <a href="pages/tables/jquery-datatable.html">Jquery Datatables</a>
                            </li>
                            <li>
                                <a href="pages/tables/editable-table.html">Editable Tables</a>
                            </li>
                        </ul>
                    
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">perm_media</i>
                            <span>Perfil Educativo</span>
                        </a>
                        
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/medias/image-gallery.html">Image Gallery</a>
                            </li>
                            <li>
                                <a href="pages/medias/carousel.html">Carousel</a>
                            </li>
                        </ul>
                        
                    </li>
                    <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">pie_chart</i>
                            <span>Perfil Laboral</span>
                        </a>
                        
                        <ul class="ml-menu">
                            <li>
                                <a href="pages/charts/morris.html">Morris</a>
                            </li>
                            <li>
                                <a href="pages/charts/flot.html">Flot</a>
                            </li>
                            <li>
                                <a href="pages/charts/chartjs.html">ChartJS</a>
                            </li>
                            <li>
                                <a href="pages/charts/sparkline.html">Sparkline</a>
                            </li>
                            <li>
                                <a href="pages/charts/jquery-knob.html">Jquery Knob</a>
                            </li>
                        </ul>
                        
                    </li>


                    
                    
                        <li>
                        <a href="javascript:void(0);" class="menu-toggle">
                            <i class="material-icons">trending_down</i>
                            <span>Seguridad</span>
                        </a>
                        
                        <ul class="ml-menu">
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);">
                                    <span>Menu Item - 2</span>
                                </a>
                            </li>
                            <li>
                                <a href="javascript:void(0);" class="menu-toggle">
                                    <span>Level - 2</span>
                                </a>
                                <ul class="ml-menu">
                                    <li>
                                        <a href="javascript:void(0);">
                                            <span>Menu Item</span>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:void(0);" class="menu-toggle">
                                            <span>Level - 3</span>
                                        </a>
                                        <ul class="ml-menu">
                                            <li>
                                                <a href="javascript:void(0);">
                                                    <span>Level - 4</span>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                        
                    </li>
                    
                    <li>
                        <a href="pages/changelogs.html">
                            <i class="material-icons">update</i>
                            <span>Changelogs</span>
                        </a>
                    </li>
                
                    <li class="header">LABELS</li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-red">donut_large</i>
                            <span>Important</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-amber">donut_large</i>
                            <span>Warning</span>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:void(0);">
                            <i class="material-icons col-light-blue">donut_large</i>
                            <span>Information</span>
                        </a>
                    </li>
                -->
                </ul>
            </div>
            <!-- #Menu -->
            <!-- Footer -->
            <div class="legal">
                <div class="copyright">
                    &copy; <?php echo date('Y');?> <a href="javascript:void(0);">Chamba Juvenil</a>.
                </div>
                <!--
                <div class="version">
                    <b>Version: </b> 1.0.5
                </div>
                -->
            </div>
            <!-- #Footer -->
        </aside>
        <!-- #END# Left Sidebar -->

    </section>