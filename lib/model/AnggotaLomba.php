<?php

/**
 * Subclass for representing a row from the 'anggota_lomba' table.
 *
 * 
 *
 * @package lib.model
 */ 
class AnggotaLomba extends BaseAnggotaLomba
{
    /*public function generateImageSavedName()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        $thumbnail = new sfThumbnail();
        $thumbnail->loadFile($uploadDir.'/'.$this->getFileFoto());
        $thumbnail->save($uploadDir.'/Lomba/Anggota/'.$this->getFilenameBaru().'.png', 'image/png');
    }
    
    public function unlinkThumbnail()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        $currentFile = $uploadDir.'/Lomba/Anggota'.$this->getFilenameBaru();
        unlink($currentFile.'.png');
    }
    */
    
    public function moveImage()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        rename($uploadDir.'/'.$this->getFileFoto(), $uploadDir.'/Lomba/Anggota/'.$this->getFilenameBaru().'.png');
    }
    
    public function unlinkImage()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        $currentFile = $uploadDir.'/Lomba/Anggota/'.$this->getFilenameBaru();
        unlink($currentFile.'.png');
    }
}
