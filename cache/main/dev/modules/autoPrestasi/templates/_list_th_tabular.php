<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/01 08:20:16
?>
  <th id="sf_admin_list_th_id">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'id'): ?>
      <?php echo link_to(__('Id'), 'prestasi/list?sort=id&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id'), 'prestasi/list?sort=id&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_id_peserta_lomba">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'id_peserta_lomba'): ?>
      <?php echo link_to(__('Id peserta lomba'), 'prestasi/list?sort=id_peserta_lomba&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Id peserta lomba'), 'prestasi/list?sort=id_peserta_lomba&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_prestasi">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'prestasi'): ?>
      <?php echo link_to(__('Prestasi'), 'prestasi/list?sort=prestasi&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Prestasi'), 'prestasi/list?sort=prestasi&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_file_piagam">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'file_piagam'): ?>
      <?php echo link_to(__('File piagam'), 'prestasi/list?sort=file_piagam&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('File piagam'), 'prestasi/list?sort=file_piagam&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_filename_baru">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'filename_baru'): ?>
      <?php echo link_to(__('Filename baru'), 'prestasi/list?sort=filename_baru&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Filename baru'), 'prestasi/list?sort=filename_baru&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_keterangan">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'keterangan'): ?>
      <?php echo link_to(__('Keterangan'), 'prestasi/list?sort=keterangan&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Keterangan'), 'prestasi/list?sort=keterangan&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_created_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'created_at'): ?>
      <?php echo link_to(__('Created at'), 'prestasi/list?sort=created_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Created at'), 'prestasi/list?sort=created_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_updated_at">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'updated_at'): ?>
      <?php echo link_to(__('Updated at'), 'prestasi/list?sort=updated_at&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Updated at'), 'prestasi/list?sort=updated_at&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_is_deleted">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/prestasi/sort') == 'is_deleted'): ?>
      <?php echo link_to(__('Is deleted'), 'prestasi/list?sort=is_deleted&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/prestasi/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Is deleted'), 'prestasi/list?sort=is_deleted&type=asc') ?>
      <?php endif; ?>
          </th>