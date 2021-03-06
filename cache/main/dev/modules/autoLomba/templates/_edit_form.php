<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/20 10:13:35
?>
<?php echo form_tag('lomba/save', array(
  'id'        => 'sf_admin_edit_form',
  'name'      => 'sf_admin_edit_form',
  'multipart' => true,
)) ?>

<?php echo object_input_hidden_tag($lomba, 'getId') ?>

<fieldset id="sf_fieldset_none" class="">

<div class="form-row">
  <?php echo label_for('lomba[nama]', __($labels['lomba{nama}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('lomba{nama}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('lomba{nama}')): ?>
    <?php echo form_error('lomba{nama}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($lomba, 'getNama', array (
  'size' => 50,
  'control_name' => 'lomba[nama]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('lomba[tingkat]', __($labels['lomba{tingkat}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('lomba{tingkat}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('lomba{tingkat}')): ?>
    <?php echo form_error('lomba{tingkat}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($lomba, 'getTingkat', array (
  'size' => 50,
  'control_name' => 'lomba[tingkat]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('lomba[kategori]', __($labels['lomba{kategori}']), 'class="required" ') ?>
  <div class="content<?php if ($sf_request->hasError('lomba{kategori}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('lomba{kategori}')): ?>
    <?php echo form_error('lomba{kategori}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_input_tag($lomba, 'getKategori', array (
  'size' => 50,
  'control_name' => 'lomba[kategori]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

<div class="form-row">
  <?php echo label_for('lomba[deskripsi]', __($labels['lomba{deskripsi}']), '') ?>
  <div class="content<?php if ($sf_request->hasError('lomba{deskripsi}')): ?> form-error<?php endif; ?>">
  <?php if ($sf_request->hasError('lomba{deskripsi}')): ?>
    <?php echo form_error('lomba{deskripsi}', array('class' => 'form-error-msg')) ?>
  <?php endif; ?>

  <?php $value = object_textarea_tag($lomba, 'getDeskripsi', array (
  'size' => '30x3',
  'control_name' => 'lomba[deskripsi]',
)); echo $value ? $value : '&nbsp;' ?>
    </div>
</div>

</fieldset>

<?php include_partial('edit_actions', array('lomba' => $lomba)) ?>

</form>

<ul class="sf_admin_actions">
      <li class="float-left"><?php if ($lomba->getId()): ?>
<?php echo button_to(__('delete'), 'lomba/delete?id='.$lomba->getId(), array (
  'post' => true,
  'confirm' => __('Are you sure?'),
  'class' => 'sf_admin_action_delete',
)) ?><?php endif; ?>
</li>
  </ul>
