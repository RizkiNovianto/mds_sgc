<?php
// auto-generated by sfPropelAdmin
// date: 2014/10/28 07:35:46
?>

<?php 
$fileDir = '/uploads/Lomba/Piagam/'.$prestasi->getFilenameBaru().'.png';
?>


<?php echo link_to(image_tag($fileDir, array('style'=>'max-height:150px')), 'prestasi/downloadRequest?id='.$prestasi->getId())?>

