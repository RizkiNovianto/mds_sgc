<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/01 10:16:40
?>
    <td><?php echo link_to($lomba->getId() ? $lomba->getId() : __('-'), 'lomba/edit?id='.$lomba->getId()) ?></td>
    <td><?php echo $lomba->getNama() ?></td>
      <td><?php echo $lomba->getTingkat() ?></td>
      <td><?php echo $lomba->getKategori() ?></td>
      <td><?php echo $lomba->getDeskripsi() ?></td>
      <td><?php echo ($lomba->getCreatedAt() !== null && $lomba->getCreatedAt() !== '') ? format_date($lomba->getCreatedAt(), "f") : '' ?></td>
      <td><?php echo ($lomba->getUpdatedAt() !== null && $lomba->getUpdatedAt() !== '') ? format_date($lomba->getUpdatedAt(), "f") : '' ?></td>
      <td><?php echo $lomba->getIsDeleted() ?></td>
  