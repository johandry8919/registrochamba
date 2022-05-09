

<?php if (isset($datatable) && $datatable): ?>

    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/jquery.dataTables.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/dataTables.bootstrap5.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/dataTables.buttons.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/buttons.bootstrap5.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/jszip.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/pdfmake/pdfmake.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/pdfmake/vfs_fonts.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/buttons.html5.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/buttons.print.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/js/buttons.colVis.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/dataTables.responsive.min.js"></script>
    <script src="<?php echo  base_url()?>assets/plugins/datatable/responsive.bootstrap5.min.js"></script>

<?php endif; ?>



<?php if (isset($librerias_js)): ?>
    <?php foreach($librerias_js as $libreria_js): ?>
        <script type="text/javascript" src="<?php echo  base_url().$libreria_js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>

<?php if (isset($constantes_js) && $constantes_js && count($constantes_js)): ?>
    <script type="text/javascript">
        <?php foreach ($constantes_js as $constante_js => $valor_constante_js): ?>
            <?php if (is_numeric($valor_constante_js)): ?>
                var <?php echo $constante_js ?> = <?php echo $valor_constante_js ?>;
            <?php else: ?>
                var <?php echo $constante_js ?> = "<?php echo $valor_constante_js ?>";
            <?php endif; ?>
        <?php endforeach; ?>
    </script>
<?php endif; ?>






<?php if (isset($ficheros_js)): ?>
    <?php foreach($ficheros_js as $fichero_js): ?>
        <script type="text/javascript" src="<?php echo base_url().$fichero_js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>