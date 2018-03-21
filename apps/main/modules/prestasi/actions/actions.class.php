<?php

/**
 * prestasi actions.
 *
 * @package    mds_sgc
 * @subpackage prestasi
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 2288 2006-10-02 15:22:13Z fabien $
 */
class prestasiActions extends autoprestasiActions
{
  public function executeDownloadRequest()
  {
      $id = $this->getRequestParameter('id');
      $prestasiTemp = PrestasiPeer::retrieveByPK($id);
      $dataUploadDir = sfConfig::get('sf_upload_dir')."/Lomba/Piagam/";
      $file = $dataUploadDir.$prestasiTemp->getFilenameBaru().'.png';
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
    
    protected function savePrestasi($prestasi)
  {
    $prestasi->save();
    $prestasi->moveImage();
  }
  
  protected function deletePrestasi($prestasi)
  {
    $prestasi->delete();
    $prestasi->unlinkImage();
  }
  
  protected function updatePrestasiFromRequest()
  {
    $prestasi = $this->getRequestParameter('prestasi');

    if (isset($prestasi['id_peserta_lomba']))
    {
    $this->prestasi->setIdPesertaLomba($prestasi['id_peserta_lomba'] ? $prestasi['id_peserta_lomba'] : null);
    }
    if (isset($prestasi['prestasi']))
    {
      $this->prestasi->setPrestasi($prestasi['prestasi']);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."//".$this->prestasi->getFilePiagam();
    
    $statusUpload = 0;
    if (!$this->getRequest()->hasErrors() && isset($prestasi['file_piagam_remove']))
    {
      $this->prestasi->setFilePiagam('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $statusUpload = 1;
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('prestasi[file_piagam]'))
    {
      $fileName = md5($this->getRequest()->getFileName('prestasi[file_piagam]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('prestasi[file_piagam]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $statusUpload = 1;
      $this->getRequest()->moveFile('prestasi[file_piagam]', sfConfig::get('sf_upload_dir')."//".$fileName.$ext);
      $this->prestasi->setFilePiagam($fileName.$ext);
    }
    if (isset($prestasi['filename_baru']))
    {
      $newFilename = $prestasi['filename_baru'];
      $oldFilename = $this->prestasi->getFilenameBaru();
      $dataUploadDir = sfConfig::get('sf_upload_dir')."/Lomba/Piagam/";
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
      $this->prestasi->setFilenameBaru($prestasi['filename_baru']);
    }
    if (isset($prestasi['keterangan']))
    {
      $this->prestasi->setKeterangan($prestasi['keterangan']);
    }
    if (isset($prestasi['created_at']))
    {
      if ($prestasi['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($prestasi['created_at']))
          {
            $value = $dateFormat->format($prestasi['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $prestasi['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->prestasi->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->prestasi->setCreatedAt(null);
      }
    }
    if (isset($prestasi['updated_at']))
    {
      if ($prestasi['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($prestasi['updated_at']))
          {
            $value = $dateFormat->format($prestasi['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $prestasi['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->prestasi->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->prestasi->setUpdatedAt(null);
      }
    }
    if (isset($prestasi['is_deleted']))
    {
      $this->prestasi->setIsDeleted($prestasi['is_deleted']);
    }
  }
}
