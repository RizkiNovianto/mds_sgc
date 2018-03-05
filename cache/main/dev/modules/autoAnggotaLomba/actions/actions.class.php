<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/01 12:38:32
?>
<?php

/**
 * autoAnggotaLomba actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoAnggotaLomba
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9855 2008-06-25 11:26:01Z FabianLange $
 */
class autoAnggotaLombaActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('anggotaLomba', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('AnggotaLomba', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/anggota_lomba')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/anggota_lomba');
    }
  }

  public function executeCreate()
  {
    return $this->forward('anggotaLomba', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('anggotaLomba', 'edit');
  }

  public function executeEdit()
  {
    $this->anggota_lomba = $this->getAnggotaLombaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateAnggotaLombaFromRequest();

      $this->saveAnggotaLomba($this->anggota_lomba);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('anggotaLomba/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('anggotaLomba/list');
      }
      else
      {
        return $this->redirect('anggotaLomba/edit?id='.$this->anggota_lomba->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->anggota_lomba = AnggotaLombaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->anggota_lomba);

    try
    {
      $this->deleteAnggotaLomba($this->anggota_lomba);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Anggota lomba. Make sure it does not have any associated items.');
      return $this->forward('anggotaLomba', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."//".$this->anggota_lomba->getFileFoto();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('anggotaLomba/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->anggota_lomba = $this->getAnggotaLombaOrCreate();
    $this->updateAnggotaLombaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveAnggotaLomba($anggota_lomba)
  {
    $anggota_lomba->save();

  }

  protected function deleteAnggotaLomba($anggota_lomba)
  {
    $anggota_lomba->delete();
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
    if (!$this->getRequest()->hasErrors() && isset($anggota_lomba['file_foto_remove']))
    {
      $this->anggota_lomba->setFileFoto('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('anggota_lomba[file_foto]'))
    {
      $fileName = md5($this->getRequest()->getFileName('anggota_lomba[file_foto]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('anggota_lomba[file_foto]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('anggota_lomba[file_foto]', sfConfig::get('sf_upload_dir')."//".$fileName.$ext);
      $this->anggota_lomba->setFileFoto($fileName.$ext);
    }
    if (isset($anggota_lomba['filename_baru']))
    {
      $this->anggota_lomba->setFilenameBaru($anggota_lomba['filename_baru']);
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

  protected function getAnggotaLombaOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $anggota_lomba = new AnggotaLomba();
    }
    else
    {
      $anggota_lomba = AnggotaLombaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($anggota_lomba);
    }

    return $anggota_lomba;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/anggota_lomba/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/anggota_lomba/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/anggota_lomba/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/anggota_lomba/sort'))
    {
      $sort_column = AnggotaLombaPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/anggota_lomba/sort') == 'asc')
      {
        $c->addAscendingOrderByColumn($sort_column);
      }
      else
      {
        $c->addDescendingOrderByColumn($sort_column);
      }
    }
  }

  protected function getLabels()
  {
    return array(
      'anggota_lomba{id}' => 'Id:',
      'anggota_lomba{id_peserta_lomba}' => 'Id peserta lomba:',
      'anggota_lomba{nama}' => 'Nama:',
      'anggota_lomba{usia}' => 'Usia:',
      'anggota_lomba{alamat}' => 'Alamat:',
      'anggota_lomba{no_telp}' => 'No telp:',
      'anggota_lomba{file_foto}' => 'File foto:',
      'anggota_lomba{filename_baru}' => 'Filename baru:',
      'anggota_lomba{created_at}' => 'Created at:',
      'anggota_lomba{updated_at}' => 'Updated at:',
      'anggota_lomba{is_deleted}' => 'Is deleted:',
    );
  }
}
