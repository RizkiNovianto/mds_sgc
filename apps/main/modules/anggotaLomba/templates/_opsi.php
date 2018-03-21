<!--div style="text-align: center"-->
<div>
<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'anggotaLomba/edit?id='.$anggota_lomba->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'anggotaLomba/delete?id='.$anggota_lomba->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n('.$anggota_lomba->getNama().')'),
)) ?>

</div>
