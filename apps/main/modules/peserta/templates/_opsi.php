<!--div style="text-align: center"-->
<div>
<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'peserta/edit?id='.$peserta->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'peserta/delete?id='.$peserta->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n('.$peserta->getWilayah().' - RT '.$peserta->getRt().' - RW '.$peserta->getRw().')'),
)) ?>

</div>
