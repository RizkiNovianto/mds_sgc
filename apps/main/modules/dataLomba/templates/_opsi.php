<!--div style="text-align: center"-->
<div>
<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'dataLomba/edit?id='.$data_lomba->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'dataLomba/delete?id='.$data_lomba->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n('.$data_lomba->getFilenameBaru().')'),
)) ?>

</div>
