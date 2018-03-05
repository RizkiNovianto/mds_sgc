<?php

/**
 * Subclass for representing a row from the 'prestasi' table.
 *
 * 
 *
 * @package lib.model
 */ 
class Prestasi extends BasePrestasi
{
    public function moveImage()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        rename($uploadDir.'/'.$this->getFilePiagam(), $uploadDir.'/Lomba/Piagam/'.$this->getFilenameBaru().'.png');
    }
    
    public function unlinkImage()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        $currentFile = $uploadDir.'/Lomba/Piagam/'.$this->getFilenameBaru();
        unlink($currentFile.'.png');
    }
}
