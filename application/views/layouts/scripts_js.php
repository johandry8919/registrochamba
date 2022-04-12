

<?php if (isset($datepicker) && $datepicker): ?>
    <script type="text/javascript" src="<?php echo recurso("datepicker_js"); ?>"></script>
    <script type="text/javascript" src="<?php echo recurso("datepicker_es_js"); ?>"></script>
<?php endif; ?>



<?php if (isset($librerias_js)): ?>
    <?php foreach($librerias_js as $libreria_js): ?>
        <script type="text/javascript" src="<?php echo $libreria_js; ?>"></script>
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
        <script type="text/javascript" src="<?php echo $fichero_js; ?>"></script>
    <?php endforeach; ?>
<?php endif; ?>