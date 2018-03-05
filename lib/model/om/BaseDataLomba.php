<?php


abstract class BaseDataLomba extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_peserta_lomba;


	
	protected $file_foto_peserta;


	
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

	
	public function getFileFotoPeserta()
	{

		return $this->file_foto_peserta;
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
			$this->modifiedColumns[] = DataLombaPeer::ID;
		}

	} 
	
	public function setIdPesertaLomba($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_peserta_lomba !== $v) {
			$this->id_peserta_lomba = $v;
			$this->modifiedColumns[] = DataLombaPeer::ID_PESERTA_LOMBA;
		}

		if ($this->aPesertaLomba !== null && $this->aPesertaLomba->getId() !== $v) {
			$this->aPesertaLomba = null;
		}

	} 
	
	public function setFileFotoPeserta($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_foto_peserta !== $v) {
			$this->file_foto_peserta = $v;
			$this->modifiedColumns[] = DataLombaPeer::FILE_FOTO_PESERTA;
		}

	} 
	
	public function setFilenameBaru($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filename_baru !== $v) {
			$this->filename_baru = $v;
			$this->modifiedColumns[] = DataLombaPeer::FILENAME_BARU;
		}

	} 
	
	public function setKeterangan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keterangan !== $v) {
			$this->keterangan = $v;
			$this->modifiedColumns[] = DataLombaPeer::KETERANGAN;
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
			$this->modifiedColumns[] = DataLombaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = DataLombaPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = DataLombaPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_peserta_lomba = $rs->getInt($startcol + 1);

			$this->file_foto_peserta = $rs->getString($startcol + 2);

			$this->filename_baru = $rs->getString($startcol + 3);

			$this->keterangan = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->is_deleted = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating DataLomba object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DataLombaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			DataLombaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(DataLombaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(DataLombaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(DataLombaPeer::DATABASE_NAME);
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
					$pk = DataLombaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += DataLombaPeer::doUpdate($this, $con);
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


			if (($retval = DataLombaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DataLombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getFileFotoPeserta();
				break;
			case 3:
				return $this->getFilenameBaru();
				break;
			case 4:
				return $this->getKeterangan();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			case 7:
				return $this->getIsDeleted();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DataLombaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdPesertaLomba(),
			$keys[2] => $this->getFileFotoPeserta(),
			$keys[3] => $this->getFilenameBaru(),
			$keys[4] => $this->getKeterangan(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = DataLombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setFileFotoPeserta($value);
				break;
			case 3:
				$this->setFilenameBaru($value);
				break;
			case 4:
				$this->setKeterangan($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
			case 7:
				$this->setIsDeleted($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = DataLombaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdPesertaLomba($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setFileFotoPeserta($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setFilenameBaru($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setKeterangan($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsDeleted($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(DataLombaPeer::DATABASE_NAME);

		if ($this->isColumnModified(DataLombaPeer::ID)) $criteria->add(DataLombaPeer::ID, $this->id);
		if ($this->isColumnModified(DataLombaPeer::ID_PESERTA_LOMBA)) $criteria->add(DataLombaPeer::ID_PESERTA_LOMBA, $this->id_peserta_lomba);
		if ($this->isColumnModified(DataLombaPeer::FILE_FOTO_PESERTA)) $criteria->add(DataLombaPeer::FILE_FOTO_PESERTA, $this->file_foto_peserta);
		if ($this->isColumnModified(DataLombaPeer::FILENAME_BARU)) $criteria->add(DataLombaPeer::FILENAME_BARU, $this->filename_baru);
		if ($this->isColumnModified(DataLombaPeer::KETERANGAN)) $criteria->add(DataLombaPeer::KETERANGAN, $this->keterangan);
		if ($this->isColumnModified(DataLombaPeer::CREATED_AT)) $criteria->add(DataLombaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(DataLombaPeer::UPDATED_AT)) $criteria->add(DataLombaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(DataLombaPeer::IS_DELETED)) $criteria->add(DataLombaPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(DataLombaPeer::DATABASE_NAME);

		$criteria->add(DataLombaPeer::ID, $this->id);

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

		$copyObj->setFileFotoPeserta($this->file_foto_peserta);

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
			self::$peer = new DataLombaPeer();
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