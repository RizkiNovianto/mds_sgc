<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/20 10:03:48
?>
<?php use_helper('Object', 'Validation', 'ObjectAdmin', 'I18N', 'Date') ?>

<?php use_stylesheet('/sf/sf_admin/css/main') ?>

<div id="sf_admin_container">

<h1><?php echo __('edit pengguna', 
array()) ?></h1>

<div id="sf_admin_header">
<?php include_partial('pengguna/edit_header', array('pengguna' => $pengguna)) ?>
</div>

<div id="sf_admin_content">
<?php include_partial('pengguna/edit_messages', array('pengguna' => $pengguna, 'labels' => $labels)) ?>
<?php include_partial('pengguna/edit_form', array('pengguna' => $pengguna, 'labels' => $labels)) ?>
</div>

<div id="sf_admin_footer">
<?php include_partial('pengguna/edit_footer', array('pengguna' => $pengguna)) ?>
</div>

</div>
