<div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Danger Tabs style</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="panel panel-primary">
                                            <div class="tab-menu-heading">
                                                <div class="tabs-menu">
                                                    <!-- Tabs -->
                                                    <ul class="nav panel-tabs panel-danger">
                                                        <li><a href="#tab13" class="active" data-bs-toggle="tab"><span><i class="fe fe-user me-1"></i></span>Datos Personales</a></li>
                                                        <li><a href="#tab14" data-bs-toggle="tab" class=""><span><i class="fe fe-calendar me-1"></i></span>Formacion academica</a></li>
                                                        <li><a href="#tab15" data-bs-toggle="tab"><span><i class="fe fe-settings me-1"></i></span>Productivo</a></li>

                                                    </ul>
                                                </div>
                                            </div>
                                            <div class="panel-body tabs-menu-body">
                                                <div class="tab-content">
                                                    <div class="tab-pane active" id="tab13">
                                                    
                                                   <?php     $this->load->view("principal/chambistas/datos_personales"); 
                                                   ?>

                                                    </div>
                                                    <div class="tab-pane" id="tab14">
                                                        <?php     $this->load->view("principal/chambistas/formacionacademicaform"); 
                                                        ?>
                                                    </div>
                                                    <div class="tab-pane" id="tab15">
                                                        <p>over the years, sometimes by accident, sometimes on purpose (injected humour and the like</p>
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                                    </div>
                                                    <div class="tab-pane" id="tab16">
                                                        <p>page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes
                                                            by accident, sometimes on purpose (injected humour and the like</p>
                                                        <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. At vero eos et</p>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>