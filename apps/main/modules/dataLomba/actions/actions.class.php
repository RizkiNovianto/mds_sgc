<?php

/**
 * dataLomba actions.
 *
 * @package    mds_sgc
 * @subpackage dataLomba
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class dataLombaActions extends autodataLombaActions
{
    public function executeDownloadRequest()
  {
      $id = $this->getRequestParameter('id');
      $dataLombaTemp = DataLombaPeer::retrieveByPK($id);
      $dataUploadDir = sfConfig::get('sf_upload_dir')."/Lomba/Tim/";
      $file = $dataUploadDir.$dataLombaTemp->getFilenameBaru().'.png';
      if (file_exists($file)) 
      {
        header('Content-Description: File Transfer');
        header('Content-Type: application/octet-stream');
        header('Content-Disposition: attachment; filename="'.basename($file).'"');
        header('Expires: 0');
        header('Cache-Control: must-revalidate');
        header('Pragma: public');
        header('Content-Length: ' . filesize($file));
        readfile($file);
        exit;
      }
  }
  
    protected function saveDataLomba($dataLomba)
  {
    $dataLomba->save();
    $dataLomba->moveImage();
  }
  
  protected function deleteAnggotaLomba($anggotaLomba)
  {
    $dataLomba->delete();
    $dataLomba->unlinkImage();
  }
  
  protected function updateDataLombaFromRequest()
  {
    $data_lomba = $this->getRequestParameter('data_lomba');

    if (isset($data_lomba['id_peserta_lomba']))
    {
    $this->data_lomba->setIdPesertaLomba($data_lomba['id_peserta_lomba'] ? $data_lomba['id_peserta_lomba'] : null);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."//".$this->data_lomba->getFileFotoPeserta();
    $statusUpload = 0;
    if (!$this->getRequest()->hasErrors() && isset($data_lomba['file_foto_peserta_remove']))
    {
      $this->data_lomba->setFileFotoPeserta('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $statusUpload = 1;
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('data_lomba[file_foto_peserta]'))
    {
      $fileName = md5($this->getRequest()->getFileName('data_lomba[file_foto_peserta]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('data_lomba[file_foto_peserta]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $statusUpload = 1;
      $this->getRequest()->moveFile('data_lomba[file_foto_peserta]', sfConfig::get('sf_upload_dir')."//".$fileName.$ext);
      $this->data_lomba->setFileFotoPeserta($fileName.$ext);
    }
    if (isset($data_lomba['filename_baru']))
    {
      $newFilename = $data_lomba['filename_baru'];
      $oldFilename = $this->data_lomba->getFilenameBaru();
      $dataUploadDir = sfConfig::get('sf_upload_dir')."/Lomba/Tim/";
      $oldLink = $dataUploadDir.$oldFilename.'.png';
      $unlinkStatus = 1;
      if($newFilename != $oldFilename)
      {
          rename($oldLink, $dataUploadDir.$newFilename.'.png');
      }
      if($statusUpload == 0)
      {
          $unlinkStatus = 0;
      }
      if ($unlinkStatus == 1) 
      {
          unlink ($oldLink);
      }
      $this->data_lomba->setFilenameBaru($data_lomba['filename_baru']);
    }
    if (isset($data_lomba['keterangan']))
    {
      $this->data_lomba->setKeterangan($data_lomba['keterangan']);
    }
    if (isset($data_lomba['created_at']))
    {
      if ($data_lomba['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($data_lomba['created_at']))
          {
            $value = $dateFormat->format($data_lomba['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $data_lomba['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->data_lomba->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->data_lomba->setCreatedAt(null);
      }
    }
    if (isset($data_lomba['updated_at']))
    {
      if ($data_lomba['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($data_lomba['updated_at']))
          {
            $value = $dateFormat->format($data_lomba['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $data_lomba['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->data_lomba->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->data_lomba->setUpdatedAt(null);
      }
    }
    if (isset($data_lomba['is_deleted']))
    {
      $this->data_lomba->setIsDeleted($data_lomba['is_deleted']);
    }
  }
}
