<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/21 16:05:46
?>
  <th id="sf_admin_list_th_wilayah">
        <?php echo __('Wilayah') ?>
          </th>
  <th id="sf_admin_list_th_rt">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta/sort') == 'rt'): ?>
      <?php echo link_to(__('RT'), 'peserta/list?sort=rt&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('RT'), 'peserta/list?sort=rt&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_rw">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta/sort') == 'rw'): ?>
      <?php echo link_to(__('RW'), 'peserta/list?sort=rw&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('RW'), 'peserta/list?sort=rw&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_ketua_rt">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta/sort') == 'ketua_rt'): ?>
      <?php echo link_to(__('Ketua RT'), 'peserta/list?sort=ketua_rt&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Ketua RT'), 'peserta/list?sort=ketua_rt&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_ketua_rw">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta/sort') == 'ketua_rw'): ?>
      <?php echo link_to(__('Ketua RW'), 'peserta/list?sort=ketua_rw&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Ketua RW'), 'peserta/list?sort=ketua_rw&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_opsi">
        <?php echo __('Opsi') ?>
          </th>
