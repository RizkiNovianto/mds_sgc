<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/20 10:13:36
?>
  <th id="sf_admin_list_th_nama">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/lomba/sort') == 'nama'): ?>
      <?php echo link_to(__('Nama'), 'lomba/list?sort=nama&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nama'), 'lomba/list?sort=nama&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_tingkat">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/lomba/sort') == 'tingkat'): ?>
      <?php echo link_to(__('Tingkat'), 'lomba/list?sort=tingkat&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Tingkat'), 'lomba/list?sort=tingkat&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_kategori">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/lomba/sort') == 'kategori'): ?>
      <?php echo link_to(__('Kategori'), 'lomba/list?sort=kategori&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Kategori'), 'lomba/list?sort=kategori&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_deskripsi">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/lomba/sort') == 'deskripsi'): ?>
      <?php echo link_to(__('Deskripsi'), 'lomba/list?sort=deskripsi&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Deskripsi'), 'lomba/list?sort=deskripsi&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_opsi">
        <?php echo __('Opsi') ?>
          </th>
