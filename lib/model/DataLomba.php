<?php

/**
 * Subclass for representing a row from the 'data_lomba' table.
 *
 * 
 *
 * @package lib.model
 */ 
class DataLomba extends BaseDataLomba
{
    public function moveImage()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        rename($uploadDir.'/'.$this->getFileFotoPeserta(), $uploadDir.'/Lomba/Tim/'.$this->getFilenameBaru().'.png');
    }
    
    public function unlinkImage()
    {
        $uploadDir = sfConfig::get('sf_upload_dir');
        $currentFile = $uploadDir.'/Lomba/Tim/'.$this->getFilenameBaru();
        unlink($currentFile.'.png');
    }
}
