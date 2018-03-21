<?php

/**
 * anggotaLomba actions.
 *
 * @package    mds_sgc
 * @subpackage anggotaLomba
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class anggotaLombaActions extends autoanggotaLombaActions
{
    public function executeDownloadRequest()
  {
      $id = $this->getRequestParameter('id');
      $anggotaLombaTemp = AnggotaLombaPeer::retrieveByPK($id);
      $dataUploadDir = sfConfig::get('sf_upload_dir')."/Lomba/Anggota/";
      $file = $dataUploadDir.$anggotaLombaTemp->getFilenameBaru().'.png';
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
  
  protected function saveAnggotaLomba($anggotaLomba)
  {
    $anggotaLomba->save();
    $anggotaLomba->moveImage();
  }
  
  protected function deleteAnggotaLomba($anggotaLomba)
  {
    $anggotaLomba->delete();
    $anggotaLomba->unlinkImage();
  }
  
  public function executeDetail()
  {
      $this->uploadDir = sfConfig::get('sf_upload_dir');
      $this->currentFile = $this->uploadDir.'/Lomba/Anggota';
      
      /*$c = new Criteria();
      $c->add(AnggotaLombaPeer::ID, 3);
      $ang = AnggotaLombaPeer::doSelect($c);
      $angSel = $ang[0];
      
      $this->filename = $angSel->getFileFoto();
      
      $uploadDir = sfConfig::get('sf_upload_dir');
      
      rename($uploadDir.'/'.$angSel->getFileFoto(), $uploadDir.'/palsu.png');*/
      
      $anggotaLomba->cekLink();
  }
  
  protected function updateAnggotaLombaFromRequest()
  {
    $anggota_lomba = $this->getRequestParameter('anggota_lomba');

    if (isset($anggota_lomba['id_peserta_lomba']))
    {
    $this->anggota_lomba->setIdPesertaLomba($anggota_lomba['id_peserta_lomba'] ? $anggota_lomba['id_peserta_lomba'] : null);
    }
    if (isset($anggota_lomba['nama']))
    {
      $this->anggota_lomba->setNama($anggota_lomba['nama']);
    }
    if (isset($anggota_lomba['usia']))
    {
      $this->anggota_lomba->setUsia($anggota_lomba['usia']);
    }
    if (isset($anggota_lomba['alamat']))
    {
      $this->anggota_lomba->setAlamat($anggota_lomba['alamat']);
    }
    if (isset($anggota_lomba['no_telp']))
    {
      $this->anggota_lomba->setNoTelp($anggota_lomba['no_telp']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."//".$this->anggota_lomba->getFileFoto();
    $statusUpload = 0;
    if (!$this->getRequest()->hasErrors() && isset($anggota_lomba['file_foto_remove']))
    {
      $this->anggota_lomba->setFileFoto('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $statusUpload = 1;
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('anggota_lomba[file_foto]'))
    {
      $fileName = md5($this->getRequest()->getFileName('anggota_lomba[file_foto]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('anggota_lomba[file_foto]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $statusUpload = 1;
      $this->getRequest()->moveFile('anggota_lomba[file_foto]', sfConfig::get('sf_upload_dir')."//".$fileName.$ext);
      $this->anggota_lomba->setFileFoto($fileName.$ext);
    }
    if (isset($anggota_lomba['filename_baru']))
    {
      $newFilename = $anggota_lomba['filename_baru'];
      $oldFilename = $this->anggota_lomba->getFilenameBaru();
      $anggotaUploadDir = sfConfig::get('sf_upload_dir')."/Lomba/Anggota/";
      $oldLink = $anggotaUploadDir.$oldFilename.'.png';
      $unlinkStatus = 1;
      if($newFilename != $oldFilename)
      {
          rename($oldLink, $anggotaUploadDir.$newFilename.'.png');
      }
      if($statusUpload == 0)
      {
          $unlinkStatus = 0;
      }
      if ($unlinkStatus == 1) 
      {
          unlink ($oldLink);
      }
      $this->anggota_lomba->setFilenameBaru($newFilename);
      
    }
    if (isset($anggota_lomba['created_at']))
    {
      if ($anggota_lomba['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($anggota_lomba['created_at']))
          {
            $value = $dateFormat->format($anggota_lomba['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $anggota_lomba['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->anggota_lomba->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->anggota_lomba->setCreatedAt(null);
      }
    }
    if (isset($anggota_lomba['updated_at']))
    {
      if ($anggota_lomba['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($anggota_lomba['updated_at']))
          {
            $value = $dateFormat->format($anggota_lomba['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $anggota_lomba['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->anggota_lomba->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->anggota_lomba->setUpdatedAt(null);
      }
    }
    if (isset($anggota_lomba['is_deleted']))
    {
      $this->anggota_lomba->setIsDeleted($anggota_lomba['is_deleted']);
    }
  }
  
}
