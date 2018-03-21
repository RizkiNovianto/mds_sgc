<!--div style="text-align: center"-->
<div>
<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'pesertaLomba/edit?id='.$peserta_lomba->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'pesertaLomba/delete?id='.$peserta_lomba->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n('.$peserta_lomba->getNamaTim().')'),
)) ?>

</div>
