<?php echo link_to(image_tag('/sf/sf_admin/images/edit_icon.png', array('alt' => __('edit'), 'title' => __('Ubah Data'))), 'sfGuardUser/edit?id='.$sf_guard_user->getId()) ?>
<?php echo link_to(image_tag('/sf/sf_admin/images/delete_icon.png', array('alt' => __('delete'), 'title' => __('Hapus Data'))), 'sfGuardUser/delete?id='.$sf_guard_user->getId(), array (
  'post' => true,
  'confirm' => __('Hapus Data Ini ?\n('.$sf_guard_user->getUsername().')'),
)) ?>