<!--div style="text-align: center"-->
<div>
<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'prestasi/edit?id='.$prestasi->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'prestasi/delete?id='.$prestasi->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n('.$prestasi->getPesertaLomba().' - '.$prestasi->getPrestasi().')'),
)) ?>

</div>
