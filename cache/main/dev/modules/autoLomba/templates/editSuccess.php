<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/20 10:13:35
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('Form Pengisian Data Lomba', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('lomba/edit_header', array('lomba' => $lomba)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('lomba/edit_messages', array('lomba' => $lomba, 'labels' => $labels)) ?>
<?php include_partial('lomba/edit_form', array('lomba' => $lomba, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('lomba/edit_footer', array('lomba' => $lomba)) ?>
</div>

</div>
