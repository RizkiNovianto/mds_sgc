<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/15 09:25:58
?>
  <th id="sf_admin_list_th_peserta_lomba">
        <?php echo __('Peserta Lomba') ?>
          </th>
  <th id="sf_admin_list_th_prestasi">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'prestasi'): ?>
      <?php echo link_to(__('Prestasi'), 'prestasi/list?sort=prestasi&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Prestasi'), 'prestasi/list?sort=prestasi&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_image_view">
        <?php echo __('Piagam') ?>
          </th>
  <th id="sf_admin_list_th_keterangan">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'keterangan'): ?>
      <?php echo link_to(__('Keterangan'), 'prestasi/list?sort=keterangan&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Keterangan'), 'prestasi/list?sort=keterangan&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_opsi">
        <?php echo __('Opsi') ?>
          </th>
