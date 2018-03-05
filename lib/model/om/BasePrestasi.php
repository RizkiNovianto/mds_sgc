<?php


abstract class BasePrestasi extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_peserta_lomba;


	
	protected $prestasi;


	
	protected $file_piagam;


	
	protected $filename_baru;


	
	protected $keterangan;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $is_deleted = 0;

	
	protected $aPesertaLomba;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdPesertaLomba()
	{

		return $this->id_peserta_lomba;
	}

	
	public function getPrestasi()
	{

		return $this->prestasi;
	}

	
	public function getFilePiagam()
	{

		return $this->file_piagam;
	}

	
	public function getFilenameBaru()
	{

		return $this->filename_baru;
	}

	
	public function getKeterangan()
	{

		return $this->keterangan;
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
			$this->modifiedColumns[] = PrestasiPeer::ID;
		}

	} 
	
	public function setIdPesertaLomba($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_peserta_lomba !== $v) {
			$this->id_peserta_lomba = $v;
			$this->modifiedColumns[] = PrestasiPeer::ID_PESERTA_LOMBA;
		}

		if ($this->aPesertaLomba !== null && $this->aPesertaLomba->getId() !== $v) {
			$this->aPesertaLomba = null;
		}

	} 
	
	public function setPrestasi($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->prestasi !== $v) {
			$this->prestasi = $v;
			$this->modifiedColumns[] = PrestasiPeer::PRESTASI;
		}

	} 
	
	public function setFilePiagam($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_piagam !== $v) {
			$this->file_piagam = $v;
			$this->modifiedColumns[] = PrestasiPeer::FILE_PIAGAM;
		}

	} 
	
	public function setFilenameBaru($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filename_baru !== $v) {
			$this->filename_baru = $v;
			$this->modifiedColumns[] = PrestasiPeer::FILENAME_BARU;
		}

	} 
	
	public function setKeterangan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keterangan !== $v) {
			$this->keterangan = $v;
			$this->modifiedColumns[] = PrestasiPeer::KETERANGAN;
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
			$this->modifiedColumns[] = PrestasiPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PrestasiPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = PrestasiPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_peserta_lomba = $rs->getInt($startcol + 1);

			$this->prestasi = $rs->getString($startcol + 2);

			$this->file_piagam = $rs->getString($startcol + 3);

			$this->filename_baru = $rs->getString($startcol + 4);

			$this->keterangan = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->is_deleted = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Prestasi object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PrestasiPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PrestasiPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PrestasiPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PrestasiPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PrestasiPeer::DATABASE_NAME);
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


												
			if ($this->aPesertaLomba !== null) {
				if ($this->aPesertaLomba->isModified()) {
					$affectedRows += $this->aPesertaLomba->save($con);
				}
				$this->setPesertaLomba($this->aPesertaLomba);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PrestasiPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PrestasiPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

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


												
			if ($this->aPesertaLomba !== null) {
				if (!$this->aPesertaLomba->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aPesertaLomba->getValidationFailures());
				}
			}


			if (($retval = PrestasiPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrestasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdPesertaLomba();
				break;
			case 2:
				return $this->getPrestasi();
				break;
			case 3:
				return $this->getFilePiagam();
				break;
			case 4:
				return $this->getFilenameBaru();
				break;
			case 5:
				return $this->getKeterangan();
				break;
			case 6:
				return $this->getCreatedAt();
				break;
			case 7:
				return $this->getUpdatedAt();
				break;
			case 8:
				return $this->getIsDeleted();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrestasiPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdPesertaLomba(),
			$keys[2] => $this->getPrestasi(),
			$keys[3] => $this->getFilePiagam(),
			$keys[4] => $this->getFilenameBaru(),
			$keys[5] => $this->getKeterangan(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
			$keys[8] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PrestasiPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdPesertaLomba($value);
				break;
			case 2:
				$this->setPrestasi($value);
				break;
			case 3:
				$this->setFilePiagam($value);
				break;
			case 4:
				$this->setFilenameBaru($value);
				break;
			case 5:
				$this->setKeterangan($value);
				break;
			case 6:
				$this->setCreatedAt($value);
				break;
			case 7:
				$this->setUpdatedAt($value);
				break;
			case 8:
				$this->setIsDeleted($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = PrestasiPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdPesertaLomba($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setPrestasi($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFilePiagam($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setFilenameBaru($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setKeterangan($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsDeleted($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PrestasiPeer::DATABASE_NAME);

		if ($this->isColumnModified(PrestasiPeer::ID)) $criteria->add(PrestasiPeer::ID, $this->id);
		if ($this->isColumnModified(PrestasiPeer::ID_PESERTA_LOMBA)) $criteria->add(PrestasiPeer::ID_PESERTA_LOMBA, $this->id_peserta_lomba);
		if ($this->isColumnModified(PrestasiPeer::PRESTASI)) $criteria->add(PrestasiPeer::PRESTASI, $this->prestasi);
		if ($this->isColumnModified(PrestasiPeer::FILE_PIAGAM)) $criteria->add(PrestasiPeer::FILE_PIAGAM, $this->file_piagam);
		if ($this->isColumnModified(PrestasiPeer::FILENAME_BARU)) $criteria->add(PrestasiPeer::FILENAME_BARU, $this->filename_baru);
		if ($this->isColumnModified(PrestasiPeer::KETERANGAN)) $criteria->add(PrestasiPeer::KETERANGAN, $this->keterangan);
		if ($this->isColumnModified(PrestasiPeer::CREATED_AT)) $criteria->add(PrestasiPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PrestasiPeer::UPDATED_AT)) $criteria->add(PrestasiPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(PrestasiPeer::IS_DELETED)) $criteria->add(PrestasiPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PrestasiPeer::DATABASE_NAME);

		$criteria->add(PrestasiPeer::ID, $this->id);

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

		$copyObj->setIdPesertaLomba($this->id_peserta_lomba);

		$copyObj->setPrestasi($this->prestasi);

		$copyObj->setFilePiagam($this->file_piagam);

		$copyObj->setFilenameBaru($this->filename_baru);

		$copyObj->setKeterangan($this->keterangan);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setIsDeleted($this->is_deleted);


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
			self::$peer = new PrestasiPeer();
		}
		return self::$peer;
	}

	
	public function setPesertaLomba($v)
	{


		if ($v === null) {
			$this->setIdPesertaLomba(NULL);
		} else {
			$this->setIdPesertaLomba($v->getId());
		}


		$this->aPesertaLomba = $v;
	}


	
	public function getPesertaLomba($con = null)
	{
		if ($this->aPesertaLomba === null && ($this->id_peserta_lomba !== null)) {
						include_once 'lib/model/om/BasePesertaLombaPeer.php';

			$this->aPesertaLomba = PesertaLombaPeer::retrieveByPK($this->id_peserta_lomba, $con);

			
		}
		return $this->aPesertaLomba;
	}

} 