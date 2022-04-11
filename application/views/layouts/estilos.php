<link href="<?php echo recurso("bootstrap_css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo recurso("animate_css"); ?>" rel="stylesheet" type="text/css">

<link href="<?php echo recurso("fontawesome_css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo recurso("material_design_icons_css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo recurso("themify_icons_css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo recurso("breadcrumb_css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo recurso("sweetalert_css"); ?>" rel="stylesheet" type="text/css">

<?php if (isset($datepicker) && $datepicker): ?>
    <link href="<?php echo recurso("datepicker_css"); ?>" rel="stylesheet" type="text/css">
<?php endif; ?>

<?php if (isset($colorpicker) && $colorpicker): ?>
    <link href="<?php echo recurso("colorpicker_css"); ?>" rel="stylesheet" type="text/css">
<?php endif; ?>

<?php if (isset($librerias_css)): ?>
    <?php foreach($librerias_css as $libreria_css): ?>
        <link href="<?php echo $libreria_css; ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
<?php endif; ?>

<link href="<?php echo recurso("template_css"); ?>" rel="stylesheet" type="text/css">
<?php if(comprobar_tipo_usuario('admin')) : ?>
    <link href="<?php echo recurso("blue_css"); ?>" rel="stylesheet" type="text/css">

    <?php else: ?>
        <link href="<?php echo recurso("default_dark_css"); ?>" rel="stylesheet" type="text/css">

    <?php endif ?>

<link href="<?php echo recurso("style_css"); ?>" rel="stylesheet" type="text/css">
<link href="<?php echo recurso("flag-icon-css"); ?>" rel="stylesheet" type="text/css">



<?php if (isset($ficheros_css)): ?>
    <?php foreach($ficheros_css as $fichero_css): ?>
        <link href="<?php echo $fichero_css; ?>" rel="stylesheet" type="text/css">
    <?php endforeach; ?>
<?php endif; ?>