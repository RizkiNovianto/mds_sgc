<?php


abstract class BasePesertaLomba extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_peserta;


	
	protected $id_lomba;


	
	protected $tahun;


	
	protected $nama_tim;


	
	protected $nama_penggerak_lingkungan;


	
	protected $tanggal_pendaftaran;


	
	protected $program_kerja;


	
	protected $catatan;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $is_deleted = 0;

	
	protected $aPeserta;

	
	protected $aLomba;

	
	protected $collAnggotaLombas;

	
	protected $lastAnggotaLombaCriteria = null;

	
	protected $collDataLombas;

	
	protected $lastDataLombaCriteria = null;

	
	protected $collPrestasis;

	
	protected $lastPrestasiCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdPeserta()
	{

		return $this->id_peserta;
	}

	
	public function getIdLomba()
	{

		return $this->id_lomba;
	}

	
	public function getTahun()
	{

		return $this->tahun;
	}

	
	public function getNamaTim()
	{

		return $this->nama_tim;
	}

	
	public function getNamaPenggerakLingkungan()
	{

		return $this->nama_penggerak_lingkungan;
	}

	
	public function getTanggalPendaftaran($format = 'Y-m-d H:i:s')
	{

		if ($this->tanggal_pendaftaran === null || $this->tanggal_pendaftaran === '') {
			return null;
		} elseif (!is_int($this->tanggal_pendaftaran)) {
						$ts = strtotime($this->tanggal_pendaftaran);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [tanggal_pendaftaran] as date/time value: " . var_export($this->tanggal_pendaftaran, true));
			}
		} else {
			$ts = $this->tanggal_pendaftaran;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getProgramKerja()
	{

		return $this->program_kerja;
	}

	
	public function getCatatan()
	{

		return $this->catatan;
	}

	
	public function getCreatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->created_at === null || $this->created_at === '') {
			return null;
		} elseif (!is_int($this->created_at)) {
						$ts = strtotime($this->created_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [created_at] as date/time value: " . var_export($this->created_at, true));
			}
		} else {
			$ts = $this->created_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getUpdatedAt($format = 'Y-m-d H:i:s')
	{

		if ($this->updated_at === null || $this->updated_at === '') {
			return null;
		} elseif (!is_int($this->updated_at)) {
						$ts = strtotime($this->updated_at);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [updated_at] as date/time value: " . var_export($this->updated_at, true));
			}
		} else {
			$ts = $this->updated_at;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIsDeleted()
	{

		return $this->is_deleted;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::ID;
		}

	} 
	
	public function setIdPeserta($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_peserta !== $v) {
			$this->id_peserta = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::ID_PESERTA;
		}

		if ($this->aPeserta !== null && $this->aPeserta->getId() !== $v) {
			$this->aPeserta = null;
		}

	} 
	
	public function setIdLomba($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_lomba !== $v) {
			$this->id_lomba = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::ID_LOMBA;
		}

		if ($this->aLomba !== null && $this->aLomba->getId() !== $v) {
			$this->aLomba = null;
		}

	} 
	
	public function setTahun($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->tahun !== $v) {
			$this->tahun = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::TAHUN;
		}

	} 
	
	public function setNamaTim($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama_tim !== $v) {
			$this->nama_tim = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::NAMA_TIM;
		}

	} 
	
	public function setNamaPenggerakLingkungan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama_penggerak_lingkungan !== $v) {
			$this->nama_penggerak_lingkungan = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::NAMA_PENGGERAK_LINGKUNGAN;
		}

	} 
	
	public function setTanggalPendaftaran($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [tanggal_pendaftaran] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->tanggal_pendaftaran !== $ts) {
			$this->tanggal_pendaftaran = $ts;
			$this->modifiedColumns[] = PesertaLombaPeer::TANGGAL_PENDAFTARAN;
		}

	} 
	
	public function setProgramKerja($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->program_kerja !== $v) {
			$this->program_kerja = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::PROGRAM_KERJA;
		}

	} 
	
	public function setCatatan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->catatan !== $v) {
			$this->catatan = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::CATATAN;
		}

	} 
	
	public function setCreatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [created_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->created_at !== $ts) {
			$this->created_at = $ts;
			$this->modifiedColumns[] = PesertaLombaPeer::CREATED_AT;
		}

	} 
	
	public function setUpdatedAt($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [updated_at] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->updated_at !== $ts) {
			$this->updated_at = $ts;
			$this->modifiedColumns[] = PesertaLombaPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = PesertaLombaPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_peserta = $rs->getInt($startcol + 1);

			$this->id_lomba = $rs->getInt($startcol + 2);

			$this->tahun = $rs->getInt($startcol + 3);

			$this->nama_tim = $rs->getString($startcol + 4);

			$this->nama_penggerak_lingkungan = $rs->getString($startcol + 5);

			$this->tanggal_pendaftaran = $rs->getTimestamp($startcol + 6, null);

			$this->program_kerja = $rs->getString($startcol + 7);

			$this->catatan = $rs->getString($startcol + 8);

			$this->created_at = $rs->getTimestamp($startcol + 9, null);

			$this->updated_at = $rs->getTimestamp($startcol + 10, null);

			$this->is_deleted = $rs->getInt($startcol + 11);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 12; 
		} catch (Exception $e) {
			throw new PropelException("Error populating PesertaLomba object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PesertaLombaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PesertaLombaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PesertaLombaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PesertaLombaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PesertaLombaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			$affectedRows = $this->doSave($con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected function doSave($con)
	{
		$affectedRows = 0; 		if (!$this->alreadyInSave) {
			$this->alreadyInSave = true;


												
			if ($this->aPeserta !== null) {
				if ($this->aPeserta->isModified()) {
					$affectedRows += $this->aPeserta->save($con);
				}
				$this->setPeserta($this->aPeserta);
			}

			if ($this->aLomba !== null) {
				if ($this->aLomba->isModified()) {
					$affectedRows += $this->aLomba->save($con);
				}
				$this->setLomba($this->aLomba);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PesertaLombaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PesertaLombaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collAnggotaLombas !== null) {
				foreach($this->collAnggotaLombas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collDataLombas !== null) {
				foreach($this->collDataLombas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPrestasis !== null) {
				foreach($this->collPrestasis as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			$this->alreadyInSave = false;
		}
		return $affectedRows;
	} 
	
	protected $validationFailures = array();

	
	public function getValidationFailures()
	{
		return $this->validationFailures;
	}

	
	public function validate($columns = null)
	{
		$res = $this->doValidate($columns);
		if ($res === true) {
			$this->validationFailures = array();
			return true;
		} else {
			$this->validationFailures = $res;
			return false;
		}
	}

	
	protected function doValidate($columns = null)
	{
		if (!$this->alreadyInValidation) {
			$this->alreadyInValidation = true;
			$retval = null;

			$failureMap = array();


												
			if ($this->aPeserta !== null) {
				if (!$this->aPeserta->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPeserta->getValidationFailures());
				}
			}

			if ($this->aLomba !== null) {
				if (!$this->aLomba->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aLomba->getValidationFailures());
				}
			}


			if (($retval = PesertaLombaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collAnggotaLombas !== null) {
					foreach($this->collAnggotaLombas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collDataLombas !== null) {
					foreach($this->collDataLombas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPrestasis !== null) {
					foreach($this->collPrestasis as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PesertaLombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdPeserta();
				break;
			case 2:
				return $this->getIdLomba();
				break;
			case 3:
				return $this->getTahun();
				break;
			case 4:
				return $this->getNamaTim();
				break;
			case 5:
				return $this->getNamaPenggerakLingkungan();
				break;
			case 6:
				return $this->getTanggalPendaftaran();
				break;
			case 7:
				return $this->getProgramKerja();
				break;
			case 8:
				return $this->getCatatan();
				break;
			case 9:
				return $this->getCreatedAt();
				break;
			case 10:
				return $this->getUpdatedAt();
				break;
			case 11:
				return $this->getIsDeleted();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PesertaLombaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdPeserta(),
			$keys[2] => $this->getIdLomba(),
			$keys[3] => $this->getTahun(),
			$keys[4] => $this->getNamaTim(),
			$keys[5] => $this->getNamaPenggerakLingkungan(),
			$keys[6] => $this->getTanggalPendaftaran(),
			$keys[7] => $this->getProgramKerja(),
			$keys[8] => $this->getCatatan(),
			$keys[9] => $this->getCreatedAt(),
			$keys[10] => $this->getUpdatedAt(),
			$keys[11] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PesertaLombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdPeserta($value);
				break;
			case 2:
				$this->setIdLomba($value);
				break;
			case 3:
				$this->setTahun($value);
				break;
			case 4:
				$this->setNamaTim($value);
				break;
			case 5:
				$this->setNamaPenggerakLingkungan($value);
				break;
			case 6:
				$this->setTanggalPendaftaran($value);
				break;
			case 7:
				$this->setProgramKerja($value);
				break;
			case 8:
				$this->setCatatan($value);
				break;
			case 9:
				$this->setCreatedAt($value);
				break;
			case 10:
				$this->setUpdatedAt($value);
				break;
			case 11:
				$this->setIsDeleted($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PesertaLombaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdPeserta($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdLomba($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setTahun($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNamaTim($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNamaPenggerakLingkungan($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setTanggalPendaftaran($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setProgramKerja($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCatatan($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setCreatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setUpdatedAt($arr[$keys[10]]);
		if (array_key_exists($keys[11], $arr)) $this->setIsDeleted($arr[$keys[11]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PesertaLombaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PesertaLombaPeer::ID)) $criteria->add(PesertaLombaPeer::ID, $this->id);
		if ($this->isColumnModified(PesertaLombaPeer::ID_PESERTA)) $criteria->add(PesertaLombaPeer::ID_PESERTA, $this->id_peserta);
		if ($this->isColumnModified(PesertaLombaPeer::ID_LOMBA)) $criteria->add(PesertaLombaPeer::ID_LOMBA, $this->id_lomba);
		if ($this->isColumnModified(PesertaLombaPeer::TAHUN)) $criteria->add(PesertaLombaPeer::TAHUN, $this->tahun);
		if ($this->isColumnModified(PesertaLombaPeer::NAMA_TIM)) $criteria->add(PesertaLombaPeer::NAMA_TIM, $this->nama_tim);
		if ($this->isColumnModified(PesertaLombaPeer::NAMA_PENGGERAK_LINGKUNGAN)) $criteria->add(PesertaLombaPeer::NAMA_PENGGERAK_LINGKUNGAN, $this->nama_penggerak_lingkungan);
		if ($this->isColumnModified(PesertaLombaPeer::TANGGAL_PENDAFTARAN)) $criteria->add(PesertaLombaPeer::TANGGAL_PENDAFTARAN, $this->tanggal_pendaftaran);
		if ($this->isColumnModified(PesertaLombaPeer::PROGRAM_KERJA)) $criteria->add(PesertaLombaPeer::PROGRAM_KERJA, $this->program_kerja);
		if ($this->isColumnModified(PesertaLombaPeer::CATATAN)) $criteria->add(PesertaLombaPeer::CATATAN, $this->catatan);
		if ($this->isColumnModified(PesertaLombaPeer::CREATED_AT)) $criteria->add(PesertaLombaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PesertaLombaPeer::UPDATED_AT)) $criteria->add(PesertaLombaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(PesertaLombaPeer::IS_DELETED)) $criteria->add(PesertaLombaPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PesertaLombaPeer::DATABASE_NAME);

		$criteria->add(PesertaLombaPeer::ID, $this->id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		return $this->getId();
	}

	
	public function setPrimaryKey($key)
	{
		$this->setId($key);
	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setIdPeserta($this->id_peserta);

		$copyObj->setIdLomba($this->id_lomba);

		$copyObj->setTahun($this->tahun);

		$copyObj->setNamaTim($this->nama_tim);

		$copyObj->setNamaPenggerakLingkungan($this->nama_penggerak_lingkungan);

		$copyObj->setTanggalPendaftaran($this->tanggal_pendaftaran);

		$copyObj->setProgramKerja($this->program_kerja);

		$copyObj->setCatatan($this->catatan);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setIsDeleted($this->is_deleted);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getAnggotaLombas() as $relObj) {
				$copyObj->addAnggotaLomba($relObj->copy($deepCopy));
			}

			foreach($this->getDataLombas() as $relObj) {
				$copyObj->addDataLomba($relObj->copy($deepCopy));
			}

			foreach($this->getPrestasis() as $relObj) {
				$copyObj->addPrestasi($relObj->copy($deepCopy));
			}

		} 

		$copyObj->setNew(true);

		$copyObj->setId(NULL); 
	}

	
	public function copy($deepCopy = false)
	{
				$clazz = get_class($this);
		$copyObj = new $clazz();
		$this->copyInto($copyObj, $deepCopy);
		return $copyObj;
	}

	
	public function getPeer()
	{
		if (self::$peer === null) {
			self::$peer = new PesertaLombaPeer();
		}
		return self::$peer;
	}

	
	public function setPeserta($v)
	{


		if ($v === null) {
			$this->setIdPeserta(NULL);
		} else {
			$this->setIdPeserta($v->getId());
		}


		$this->aPeserta = $v;
	}


	
	public function getPeserta($con = null)
	{
		if ($this->aPeserta === null && ($this->id_peserta !== null)) {
						include_once 'lib/model/om/BasePesertaPeer.php';

			$this->aPeserta = PesertaPeer::retrieveByPK($this->id_peserta, $con);

			
		}
		return $this->aPeserta;
	}

	
	public function setLomba($v)
	{


		if ($v === null) {
			$this->setIdLomba(NULL);
		} else {
			$this->setIdLomba($v->getId());
		}


		$this->aLomba = $v;
	}


	
	public function getLomba($con = null)
	{
		if ($this->aLomba === null && ($this->id_lomba !== null)) {
						include_once 'lib/model/om/BaseLombaPeer.php';

			$this->aLomba = LombaPeer::retrieveByPK($this->id_lomba, $con);

			
		}
		return $this->aLomba;
	}

	
	public function initAnggotaLombas()
	{
		if ($this->collAnggotaLombas === null) {
			$this->collAnggotaLombas = array();
		}
	}

	
	public function getAnggotaLombas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseAnggotaLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collAnggotaLombas === null) {
			if ($this->isNew()) {
			   $this->collAnggotaLombas = array();
			} else {

				$criteria->add(AnggotaLombaPeer::ID_PESERTA_LOMBA, $this->getId());

				AnggotaLombaPeer::addSelectColumns($criteria);
				$this->collAnggotaLombas = AnggotaLombaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(AnggotaLombaPeer::ID_PESERTA_LOMBA, $this->getId());

				AnggotaLombaPeer::addSelectColumns($criteria);
				if (!isset($this->lastAnggotaLombaCriteria) || !$this->lastAnggotaLombaCriteria->equals($criteria)) {
					$this->collAnggotaLombas = AnggotaLombaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastAnggotaLombaCriteria = $criteria;
		return $this->collAnggotaLombas;
	}

	
	public function countAnggotaLombas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseAnggotaLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(AnggotaLombaPeer::ID_PESERTA_LOMBA, $this->getId());

		return AnggotaLombaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addAnggotaLomba(AnggotaLomba $l)
	{
		$this->collAnggotaLombas[] = $l;
		$l->setPesertaLomba($this);
	}

	
	public function initDataLombas()
	{
		if ($this->collDataLombas === null) {
			$this->collDataLombas = array();
		}
	}

	
	public function getDataLombas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseDataLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collDataLombas === null) {
			if ($this->isNew()) {
			   $this->collDataLombas = array();
			} else {

				$criteria->add(DataLombaPeer::ID_PESERTA_LOMBA, $this->getId());

				DataLombaPeer::addSelectColumns($criteria);
				$this->collDataLombas = DataLombaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(DataLombaPeer::ID_PESERTA_LOMBA, $this->getId());

				DataLombaPeer::addSelectColumns($criteria);
				if (!isset($this->lastDataLombaCriteria) || !$this->lastDataLombaCriteria->equals($criteria)) {
					$this->collDataLombas = DataLombaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastDataLombaCriteria = $criteria;
		return $this->collDataLombas;
	}

	
	public function countDataLombas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseDataLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(DataLombaPeer::ID_PESERTA_LOMBA, $this->getId());

		return DataLombaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addDataLomba(DataLomba $l)
	{
		$this->collDataLombas[] = $l;
		$l->setPesertaLomba($this);
	}

	
	public function initPrestasis()
	{
		if ($this->collPrestasis === null) {
			$this->collPrestasis = array();
		}
	}

	
	public function getPrestasis($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePrestasiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPrestasis === null) {
			if ($this->isNew()) {
			   $this->collPrestasis = array();
			} else {

				$criteria->add(PrestasiPeer::ID_PESERTA_LOMBA, $this->getId());

				PrestasiPeer::addSelectColumns($criteria);
				$this->collPrestasis = PrestasiPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PrestasiPeer::ID_PESERTA_LOMBA, $this->getId());

				PrestasiPeer::addSelectColumns($criteria);
				if (!isset($this->lastPrestasiCriteria) || !$this->lastPrestasiCriteria->equals($criteria)) {
					$this->collPrestasis = PrestasiPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPrestasiCriteria = $criteria;
		return $this->collPrestasis;
	}

	
	public function countPrestasis($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePrestasiPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PrestasiPeer::ID_PESERTA_LOMBA, $this->getId());

		return PrestasiPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPrestasi(Prestasi $l)
	{
		$this->collPrestasis[] = $l;
		$l->setPesertaLomba($this);
	}

} 