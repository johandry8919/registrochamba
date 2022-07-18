
                        <!-- ROW-1 -->
                     <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xl-12">
                                <div class="row">
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Total usuarios registrados</h6>
                                                        <h2 class="mb-0 number-font"><?php echo $total_usuarios->total ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="saleschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span class="text-muted fs-12"><span class="text-secondary"><i
                                                            class="fe fe-arrow-up-circle  text-secondary"></i> 5%</span>
                                                   Ultima semana</span-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Registros Completados</h6>
                                                        <h2 class="mb-0 number-font"><?php echo $completados->total ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="leadschart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span class="text-muted fs-12"><span class="text-pink"><i
                                                            class="fe fe-arrow-down-circle text-pink"></i> 0.75%</span>
                                                   Ultimos 6 dias</span-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Total Empresas</h6>
                                                        <h2 class="mb-0 number-font"><?php echo $total_empresas->total ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="profitchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span class="text-muted fs-12"><span class="text-warning"><i
                                                            class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                                                   Ultima semana</span-->
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-12 col-xl-3">
                                        <div class="card overflow-hidden">
                                            <div class="card-body">
                                                <div class="d-flex">
                                                    <div class="mt-2">
                                                        <h6 class="">Total Universidades</h6>
                                                        <h2 class="mb-0 number-font"><?php echo $total_universidades->total ?></h2>
                                                    </div>
                                                    <div class="ms-auto">
                                                        <div class="chart-wrapper mt-1">
                                                            <canvas id="costchart"
                                                                class="h-8 w-9 chart-dropshadow"></canvas>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--span class="text-muted fs-12"><span class="text-warning"><i
                                                            class="fe fe-arrow-up-circle text-warning"></i> 0.6%</span>
                                                   Ultima semana</span-->
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- ROW-1 END -->

                        
                        <!-- ROW-2 -->
                        <div class="row">
                            <div class="col-sm-12 col-md-12 col-lg-12 col-xl-12">
                                <div class="card">
                                    <div class="card-header">
                                        <h3 class="card-title">Usuarios</h3>
                                    </div>
                                    <div class="card-body">
                                        <div class="d-flex mx-auto text-center justify-content-center mb-4">
                                            <div class="d-flex text-center justify-content-center me-3"><span
                                                    class="dot-label bg-primary my-auto"></span>Historico</div>
                                     
                                        </div>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="chartBar1" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <!-- COL END -->
                            <!-- div class="col-sm-12 col-md-12 col-lg-12 col-xl-3">
                                <div class="card overflow-hidden">
                                    <div class="card-body pb-0 bg-recentorder">
                                        <h3 class="card-title text-white">Usuarios creados</h3>
                                        <div class="chartjs-wrapper-demo">
                                            <canvas id="recentorders" class="chart-dropshadow"></canvas>
                                        </div>
                                    </div>
                                    <div id="flotback-chart" class="flot-background"></div>
                                    <div class="card-body">
                                        <div class="d-flex mb-4 mt-3">
                                            <div
                                                class="avatar avatar-md bg-secondary-transparent text-secondary bradius me-3">
                                                <i class="fe fe-check"></i>
                                            </div>
                                            <div class="">
                                                <h6 class="mb-1 fw-semibold">Perfiles Completados</h6>
                                                <p class="fw-normal fs-12"> <span class="text-success">3.5%</span>
                                                    increased </p>
                                            </div>
                                            <div class=" ms-auto my-auto">
                                                <p class="fw-bold fs-20"> 1,768 </p>
                                            </div>
                                        </div>
                                        <div class="d-flex">
                                            <div class="avatar  avatar-md bg-pink-transparent text-pink bradius me-3">
                                                <i class="fe fe-x"></i>
                                            </div>
                                            <div class="">
                                                <h6 class="mb-1 fw-semibold">Sin completar</h6>
                                                <p class="fw-normal fs-12"> <span class="text-success">1.2%</span>
                                                    increased </p>
                                            </div>
                                            <div class=" ms-auto my-auto">
                                                <p class="fw-bold fs-20 mb-0"> 3,675 </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div -->
                            <!-- COL END -->
                        </div>
                        <!-- ROW-2 END -->