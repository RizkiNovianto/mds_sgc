<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/21 16:05:54
?>
  <th id="sf_admin_list_th_nama_tim">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta_lomba/sort') == 'nama_tim'): ?>
      <?php echo link_to(__('Nama Tim'), 'pesertaLomba/list?sort=nama_tim&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Nama Tim'), 'pesertaLomba/list?sort=nama_tim&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_peserta">
        <?php echo __('Asal') ?>
          </th>
  <th id="sf_admin_list_th_lomba">
        <?php echo __('Kompetisi') ?>
          </th>
  <th id="sf_admin_list_th_tahun">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta_lomba/sort') == 'tahun'): ?>
      <?php echo link_to(__('Tahun'), 'pesertaLomba/list?sort=tahun&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Tahun'), 'pesertaLomba/list?sort=tahun&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_nama_penggerak_lingkungan">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta_lomba/sort') == 'nama_penggerak_lingkungan'): ?>
      <?php echo link_to(__('Penggerak Lingkungan'), 'pesertaLomba/list?sort=nama_penggerak_lingkungan&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Penggerak Lingkungan'), 'pesertaLomba/list?sort=nama_penggerak_lingkungan&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_tanggal_pendaftaran">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta_lomba/sort') == 'tanggal_pendaftaran'): ?>
      <?php echo link_to(__('Tanggal Pendaftaran'), 'pesertaLomba/list?sort=tanggal_pendaftaran&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Tanggal Pendaftaran'), 'pesertaLomba/list?sort=tanggal_pendaftaran&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_program_kerja">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta_lomba/sort') == 'program_kerja'): ?>
      <?php echo link_to(__('Program Kerja'), 'pesertaLomba/list?sort=program_kerja&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Program Kerja'), 'pesertaLomba/list?sort=program_kerja&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_catatan">
          <?php if ($sf_user->getAttribute('sort', null, 'sf_admin/peserta_lomba/sort') == 'catatan'): ?>
      <?php echo link_to(__('Catatan'), 'pesertaLomba/list?sort=catatan&type='.($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort') == 'asc' ? 'desc' : 'asc')) ?>
      (<?php echo __($sf_user->getAttribute('type', 'asc', 'sf_admin/peserta_lomba/sort')) ?>)
      <?php else: ?>
      <?php echo link_to(__('Catatan'), 'pesertaLomba/list?sort=catatan&type=asc') ?>
      <?php endif; ?>
          </th>
  <th id="sf_admin_list_th_opsi">
        <?php echo __('Opsi') ?>
          </th>
