

<?php if (isset($datepicker) && $datepicker): ?>
    <link href="<?php echo recurso("datepicker_css"); ?>" rel="stylesheet" type="text/css">
<?php endif; ?>

<?php if (isset($colorpicker) && $colorpicker): ?>
    <link href="<?php echo recurso("colorpicker_css"); ?>" rel="stylesheet" type="text/css">
<?php endif; ?>

<?php if (isset($librerias_css)): ?>
    <?php foreach($librerias_css as $libreria_css): ?>
        <link href="<?php echo  base_url().$libreria_css; ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
<?php endif; ?>


<?php if (isset($ficheros_css)): ?>
    <?php foreach($ficheros_css as $fichero_css): ?>
        <link href="<?php echo  base_url().$fichero_css; ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
<?php endif; ?>