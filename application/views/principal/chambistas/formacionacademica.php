<section class="container-fluid">
    <div class="row">
        <div class="mb-2 col-12 col-md-6 text-wrap">

            <?php
            if (isset($usuarioacademico) and count($usuarioacademico) < '5') {
            ?>

                <div class="alert alert-info"> <strong>Importante:</strong> Solo podras agregar máximo 5 opciones.</div>

            <?php
            }
            ?>

        </div>
    </div>



    <div class="card">


        <div class="body">
            <div class="card-header">
                <div class="card-title">Formación Académica</div>
            </div>

            <div class="col-12 ">
                <?php
                if (isset($usuarioacademico) and count($usuarioacademico) < '5') {
                ?>

                    <div class="">
                        <a href="<?php echo base_url() ?>formacionacademicaform" class="btn btn-primary btn-block " style="margin: 20px auto;">Agregar</a>
                    </div>
                <?php
                }
                ?>

            </div>
            <div class="col-12 col-ms-8 col-lg-12 ">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Basic Edit Table</h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered border text-nowrap mb-0" id="basic-edit">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Centro Educativo</th>
                                        <th>Nivel Educativo</th>
                                        <th>Período</th>

                                        <th name="bstable-actions">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <?php

                                        if (isset($usuarioacademico) and $usuarioacademico != "") {
                                            $i = 1;
                                            foreach ($usuarioacademico as $key => $usuaca) {
                                                echo '<tr>';
                                                echo '<th scope="row">' . $i . '</th>';
                                                echo '<td>' . $usuaca->centro_educ . '</td>';
                                                echo '<td>' . $usuaca->nivel . ' - ' . $usuaca->nombre . '</td>';
                                                echo '<td>' . $usuaca->rango_fecha . '</td>';
                                                echo '<td name="bstable-actions>';
                                                echo '<div class="btn-list">';
                                                echo '<button type="button" class="btn btn-sm btn-primary ">';
                                                echo '<span class="fe fe-edit">';
                                                echo '<a class="text-white" href="' . base_url() . 'formacionacademicaform/' . $usuaca->id_usu_aca . '">Edit</a>';
                                                echo '</span ">';

                                                echo '</button ">';

                                                echo '<button  type="button" class="btn  btn-sm btn-danger ">';
                                                echo '<span class="fe fe-trash-2">';
                                                echo '<a class="text-white" href="' . base_url() . 'eliminaracademico/' . $usuaca->id_usu_aca . '">Delet</a>';
                                                echo '</span ">';

                                                echo '</button ">';

                                                echo '</div">';


                                                echo '</td>';
                                                echo '</tr>';
                                                $i++;
                                            }
                                        }
                                        ?>
                                        <!-- <td name="bstable-actions">
                                            <div class="btn-list">
                                                <button id="bEdit" type="button" class="btn btn-sm btn-primary">
                                                    <span class="fe fe-edit"> </span>
                                                </button>
                                                <button id="bDel" type="button" class="btn  btn-sm btn-danger">
                                                    <span class="fe fe-trash-2"> </span>
                                                </button>
                                                <button id="bAcep" type="button" class="btn  btn-sm btn-primary" style="display:none;">
                                                    <span class="fe fe-check-circle"> </span>
                                                </button>
                                                <button id="bCanc" type="button" class="btn  btn-sm btn-danger" style="display:none;">
                                                    <span class="fe fe-x-circle"> </span>
                                                </button>
                                            </div>
                                        </td> -->
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>



        </div>
</section>

<script type="text/javascript">
    var base_url = "<?php echo base_url(); ?>";
</script>
<!-- Jquery Core Js -->
<script src="<?php echo base_url(); ?>plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="<?php echo base_url(); ?>plugins/bootstrap/js/bootstrap.js"></script>

<!-- Select Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>

<!-- Slimscroll Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/jquery-slimscroll/jquery.slimscroll.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="<?php echo base_url(); ?>plugins/node-waves/waves.js"></script>

<!-- Custom Js -->
<script src="<?php echo base_url(); ?>plugins/momentjs/moment.js"></script>
<script src="<?php echo base_url(); ?>plugins/autosize/autosize.js"></script>
<script src="<?php echo base_url(); ?>plugins/bootstrap-select/js/bootstrap-select.js"></script>
<script src="<?php echo base_url(); ?>plugins/bootstrap-material-datetimepicker/js/bootstrap-material-datetimepicker.js"></script>
<script src="<?php echo base_url(); ?>plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>

<script src="<?php echo base_url(); ?>js/admin.js"></script>
<script src="<?php echo base_url(); ?>js/pages/forms/basic-form-elements.js"></script>

<!-- Demo Js -->
<!--     <script src="<?php echo base_url(); ?>js/demo.js"></script> -->

<script src="<?php echo base_url(); ?>plugins/jquery-validation/jquery.validate.js"></script>

<script src="<?php echo base_url(); ?>plugins/jquery-validation/localization/messages_es.js"></script>

<script src="<?php echo base_url(); ?>js/pages/examples/datospersonales.js"></script>



</script>