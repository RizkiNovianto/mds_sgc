<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/21 16:39:14
?>
<?php

/**
 * autoDataLomba actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoDataLomba
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9855 2008-06-25 11:26:01Z FabianLange $
 */
class autoDataLombaActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('dataLomba', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('DataLomba', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/data_lomba')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/data_lomba');
    }
  }

  public function executeCreate()
  {
    return $this->forward('dataLomba', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('dataLomba', 'edit');
  }

  public function executeEdit()
  {
    $this->data_lomba = $this->getDataLombaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updateDataLombaFromRequest();

      $this->saveDataLomba($this->data_lomba);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('dataLomba/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('dataLomba/list');
      }
      else
      {
        return $this->redirect('dataLomba/edit?id='.$this->data_lomba->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->data_lomba = DataLombaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->data_lomba);

    try
    {
      $this->deleteDataLomba($this->data_lomba);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Data lomba. Make sure it does not have any associated items.');
      return $this->forward('dataLomba', 'list');
    }

      $currentFile = sfConfig::get('sf_upload_dir')."//".$this->data_lomba->getFileFotoPeserta();
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }

    return $this->redirect('dataLomba/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->data_lomba = $this->getDataLombaOrCreate();
    $this->updateDataLombaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function saveDataLomba($data_lomba)
  {
    $data_lomba->save();

  }

  protected function deleteDataLomba($data_lomba)
  {
    $data_lomba->delete();
  }

  protected function updateDataLombaFromRequest()
  {
    $data_lomba = $this->getRequestParameter('data_lomba');

    if (isset($data_lomba['id_peserta_lomba']))
    {
    $this->data_lomba->setIdPesertaLomba($data_lomba['id_peserta_lomba'] ? $data_lomba['id_peserta_lomba'] : null);
    }
    $currentFile = sfConfig::get('sf_upload_dir')."//".$this->data_lomba->getFileFotoPeserta();
    if (!$this->getRequest()->hasErrors() && isset($data_lomba['file_foto_peserta_remove']))
    {
      $this->data_lomba->setFileFotoPeserta('');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
    }

    if (!$this->getRequest()->hasErrors() && $this->getRequest()->getFileSize('data_lomba[file_foto_peserta]'))
    {
      $fileName = md5($this->getRequest()->getFileName('data_lomba[file_foto_peserta]').time().rand(0, 99999));
      $ext = $this->getRequest()->getFileExtension('data_lomba[file_foto_peserta]');
      if (is_file($currentFile))
      {
        unlink($currentFile);
      }
      $this->getRequest()->moveFile('data_lomba[file_foto_peserta]', sfConfig::get('sf_upload_dir')."//".$fileName.$ext);
      $this->data_lomba->setFileFotoPeserta($fileName.$ext);
    }
    if (isset($data_lomba['filename_baru']))
    {
      $this->data_lomba->setFilenameBaru($data_lomba['filename_baru']);
    }
    if (isset($data_lomba['keterangan']))
    {
      $this->data_lomba->setKeterangan($data_lomba['keterangan']);
    }
  }

  protected function getDataLombaOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $data_lomba = new DataLomba();
    }
    else
    {
      $data_lomba = DataLombaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($data_lomba);
    }

    return $data_lomba;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/data_lomba/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/data_lomba/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/data_lomba/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/data_lomba/sort'))
    {
      $sort_column = DataLombaPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/data_lomba/sort') == 'asc')
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
      'data_lomba{id_peserta_lomba}' => 'Nama Tim:',
      'data_lomba{file_foto_peserta}' => 'File Foto Wilayah:',
      'data_lomba{filename_baru}' => 'Nama Foto:',
      'data_lomba{keterangan}' => 'Keterangan:',
    );
  }
}
