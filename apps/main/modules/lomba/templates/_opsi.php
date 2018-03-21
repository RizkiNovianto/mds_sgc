<!--div style="text-align: center"-->
<div>
<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'lomba/edit?id='.$lomba->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'lomba/delete?id='.$lomba->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n'
          .'\nLomba: '.$lomba->getNama().
          '\nTingkat: '.$lomba->getTingkat().
          '\nKategori: '.$lomba->getKategori()),
)) ?>

</div>
