<?php
// auto-generated by sfPropelAdmin
// date: 2018/03/20 10:03:48
?>
<?php

/**
 * autoPengguna actions.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage autoPengguna
 * @author     Fabien Potencier <fabien.potencier@symfony-project.com>
 * @version    SVN: $Id: actions.class.php 9855 2008-06-25 11:26:01Z FabianLange $
 */
class autoPenggunaActions extends sfActions
{
  public function executeIndex()
  {
    return $this->forward('pengguna', 'list');
  }

  public function executeList()
  {
    $this->processSort();

    $this->processFilters();


    // pager
    $this->pager = new sfPropelPager('Pengguna', 20);
    $c = new Criteria();
    $this->addSortCriteria($c);
    $this->addFiltersCriteria($c);
    $this->pager->setCriteria($c);
    $this->pager->setPage($this->getRequestParameter('page', $this->getUser()->getAttribute('page', 1, 'sf_admin/pengguna')));
    $this->pager->init();
    // save page
    if ($this->getRequestParameter('page')) {
        $this->getUser()->setAttribute('page', $this->getRequestParameter('page'), 'sf_admin/pengguna');
    }
  }

  public function executeCreate()
  {
    return $this->forward('pengguna', 'edit');
  }

  public function executeSave()
  {
    return $this->forward('pengguna', 'edit');
  }

  public function executeEdit()
  {
    $this->pengguna = $this->getPenggunaOrCreate();

    if ($this->getRequest()->getMethod() == sfRequest::POST)
    {
      $this->updatePenggunaFromRequest();

      $this->savePengguna($this->pengguna);

      $this->setFlash('notice', 'Your modifications have been saved');

      if ($this->getRequestParameter('save_and_add'))
      {
        return $this->redirect('pengguna/create');
      }
      else if ($this->getRequestParameter('save_and_list'))
      {
        return $this->redirect('pengguna/list');
      }
      else
      {
        return $this->redirect('pengguna/edit?id='.$this->pengguna->getId());
      }
    }
    else
    {
      $this->labels = $this->getLabels();
    }
  }

  public function executeDelete()
  {
    $this->pengguna = PenggunaPeer::retrieveByPk($this->getRequestParameter('id'));
    $this->forward404Unless($this->pengguna);

    try
    {
      $this->deletePengguna($this->pengguna);
    }
    catch (PropelException $e)
    {
      $this->getRequest()->setError('delete', 'Could not delete the selected Pengguna. Make sure it does not have any associated items.');
      return $this->forward('pengguna', 'list');
    }

    return $this->redirect('pengguna/list');
  }

  public function handleErrorEdit()
  {
    $this->preExecute();
    $this->pengguna = $this->getPenggunaOrCreate();
    $this->updatePenggunaFromRequest();

    $this->labels = $this->getLabels();

    return sfView::SUCCESS;
  }

  protected function savePengguna($pengguna)
  {
    $pengguna->save();

  }

  protected function deletePengguna($pengguna)
  {
    $pengguna->delete();
  }

  protected function updatePenggunaFromRequest()
  {
    $pengguna = $this->getRequestParameter('pengguna');

    if (isset($pengguna['id_wilayah']))
    {
    $this->pengguna->setIdWilayah($pengguna['id_wilayah'] ? $pengguna['id_wilayah'] : null);
    }
    if (isset($pengguna['id_sfguarduser']))
    {
    $this->pengguna->setIdSfguarduser($pengguna['id_sfguarduser'] ? $pengguna['id_sfguarduser'] : null);
    }
    if (isset($pengguna['nama']))
    {
      $this->pengguna->setNama($pengguna['nama']);
    }
    if (isset($pengguna['no_telp']))
    {
      $this->pengguna->setNoTelp($pengguna['no_telp']);
    }
    if (isset($pengguna['file_foto']))
    {
      $this->pengguna->setFileFoto($pengguna['file_foto']);
    }
    if (isset($pengguna['filename_baru']))
    {
      $this->pengguna->setFilenameBaru($pengguna['filename_baru']);
    }
    if (isset($pengguna['keterangan']))
    {
      $this->pengguna->setKeterangan($pengguna['keterangan']);
    }
    if (isset($pengguna['created_at']))
    {
      if ($pengguna['created_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($pengguna['created_at']))
          {
            $value = $dateFormat->format($pengguna['created_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $pengguna['created_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->pengguna->setCreatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->pengguna->setCreatedAt(null);
      }
    }
    if (isset($pengguna['updated_at']))
    {
      if ($pengguna['updated_at'])
      {
        try
        {
          $dateFormat = new sfDateFormat($this->getUser()->getCulture());
                              if (!is_array($pengguna['updated_at']))
          {
            $value = $dateFormat->format($pengguna['updated_at'], 'I', $dateFormat->getInputPattern('g'));
          }
          else
          {
            $value_array = $pengguna['updated_at'];
            $value = $value_array['year'].'-'.$value_array['month'].'-'.$value_array['day'].(isset($value_array['hour']) ? ' '.$value_array['hour'].':'.$value_array['minute'].(isset($value_array['second']) ? ':'.$value_array['second'] : '') : '');
          }
          $this->pengguna->setUpdatedAt($value);
        }
        catch (sfException $e)
        {
          // not a date
        }
      }
      else
      {
        $this->pengguna->setUpdatedAt(null);
      }
    }
    if (isset($pengguna['is_deleted']))
    {
      $this->pengguna->setIsDeleted($pengguna['is_deleted']);
    }
  }

  protected function getPenggunaOrCreate($id = 'id')
  {
    if (!$this->getRequestParameter($id))
    {
      $pengguna = new Pengguna();
    }
    else
    {
      $pengguna = PenggunaPeer::retrieveByPk($this->getRequestParameter($id));

      $this->forward404Unless($pengguna);
    }

    return $pengguna;
  }

  protected function processFilters()
  {
  }

  protected function processSort()
  {
    if ($this->getRequestParameter('sort'))
    {
      $this->getUser()->setAttribute('sort', $this->getRequestParameter('sort'), 'sf_admin/pengguna/sort');
      $this->getUser()->setAttribute('type', $this->getRequestParameter('type', 'asc'), 'sf_admin/pengguna/sort');
    }

    if (!$this->getUser()->getAttribute('sort', null, 'sf_admin/pengguna/sort'))
    {
    }
  }

  protected function addFiltersCriteria($c)
  {
  }

  protected function addSortCriteria($c)
  {
    if ($sort_column = $this->getUser()->getAttribute('sort', null, 'sf_admin/pengguna/sort'))
    {
      $sort_column = PenggunaPeer::translateFieldName($sort_column, BasePeer::TYPE_FIELDNAME, BasePeer::TYPE_COLNAME);
      if ($this->getUser()->getAttribute('type', null, 'sf_admin/pengguna/sort') == 'asc')
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
      'pengguna{id}' => 'Id:',
      'pengguna{id_wilayah}' => 'Id wilayah:',
      'pengguna{id_sfguarduser}' => 'Id sfguarduser:',
      'pengguna{nama}' => 'Nama:',
      'pengguna{no_telp}' => 'No telp:',
      'pengguna{file_foto}' => 'File foto:',
      'pengguna{filename_baru}' => 'Filename baru:',
      'pengguna{keterangan}' => 'Keterangan:',
      'pengguna{created_at}' => 'Created at:',
      'pengguna{updated_at}' => 'Updated at:',
      'pengguna{is_deleted}' => 'Is deleted:',
    );
  }
}
