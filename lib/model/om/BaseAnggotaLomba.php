<?php


abstract class BaseAnggotaLomba extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_peserta_lomba;


	
	protected $nama;


	
	protected $usia;


	
	protected $alamat;


	
	protected $no_telp;


	
	protected $file_foto;


	
	protected $filename_baru;


	
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

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getUsia()
	{

		return $this->usia;
	}

	
	public function getAlamat()
	{

		return $this->alamat;
	}

	
	public function getNoTelp()
	{

		return $this->no_telp;
	}

	
	public function getFileFoto()
	{

		return $this->file_foto;
	}

	
	public function getFilenameBaru()
	{

		return $this->filename_baru;
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
			$this->modifiedColumns[] = AnggotaLombaPeer::ID;
		}

	} 
	
	public function setIdPesertaLomba($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_peserta_lomba !== $v) {
			$this->id_peserta_lomba = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::ID_PESERTA_LOMBA;
		}

		if ($this->aPesertaLomba !== null && $this->aPesertaLomba->getId() !== $v) {
			$this->aPesertaLomba = null;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::NAMA;
		}

	} 
	
	public function setUsia($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->usia !== $v) {
			$this->usia = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::USIA;
		}

	} 
	
	public function setAlamat($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->alamat !== $v) {
			$this->alamat = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::ALAMAT;
		}

	} 
	
	public function setNoTelp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->no_telp !== $v) {
			$this->no_telp = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::NO_TELP;
		}

	} 
	
	public function setFileFoto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_foto !== $v) {
			$this->file_foto = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::FILE_FOTO;
		}

	} 
	
	public function setFilenameBaru($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filename_baru !== $v) {
			$this->filename_baru = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::FILENAME_BARU;
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
			$this->modifiedColumns[] = AnggotaLombaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = AnggotaLombaPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = AnggotaLombaPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_peserta_lomba = $rs->getInt($startcol + 1);

			$this->nama = $rs->getString($startcol + 2);

			$this->usia = $rs->getInt($startcol + 3);

			$this->alamat = $rs->getString($startcol + 4);

			$this->no_telp = $rs->getString($startcol + 5);

			$this->file_foto = $rs->getString($startcol + 6);

			$this->filename_baru = $rs->getString($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_at = $rs->getTimestamp($startcol + 9, null);

			$this->is_deleted = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating AnggotaLomba object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AnggotaLombaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			AnggotaLombaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(AnggotaLombaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(AnggotaLombaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(AnggotaLombaPeer::DATABASE_NAME);
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
					$pk = AnggotaLombaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += AnggotaLombaPeer::doUpdate($this, $con);
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


			if (($retval = AnggotaLombaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AnggotaLombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getNama();
				break;
			case 3:
				return $this->getUsia();
				break;
			case 4:
				return $this->getAlamat();
				break;
			case 5:
				return $this->getNoTelp();
				break;
			case 6:
				return $this->getFileFoto();
				break;
			case 7:
				return $this->getFilenameBaru();
				break;
			case 8:
				return $this->getCreatedAt();
				break;
			case 9:
				return $this->getUpdatedAt();
				break;
			case 10:
				return $this->getIsDeleted();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AnggotaLombaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdPesertaLomba(),
			$keys[2] => $this->getNama(),
			$keys[3] => $this->getUsia(),
			$keys[4] => $this->getAlamat(),
			$keys[5] => $this->getNoTelp(),
			$keys[6] => $this->getFileFoto(),
			$keys[7] => $this->getFilenameBaru(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getUpdatedAt(),
			$keys[10] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = AnggotaLombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setNama($value);
				break;
			case 3:
				$this->setUsia($value);
				break;
			case 4:
				$this->setAlamat($value);
				break;
			case 5:
				$this->setNoTelp($value);
				break;
			case 6:
				$this->setFileFoto($value);
				break;
			case 7:
				$this->setFilenameBaru($value);
				break;
			case 8:
				$this->setCreatedAt($value);
				break;
			case 9:
				$this->setUpdatedAt($value);
				break;
			case 10:
				$this->setIsDeleted($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = AnggotaLombaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdPesertaLomba($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setNama($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setUsia($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setAlamat($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setNoTelp($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFileFoto($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setFilenameBaru($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsDeleted($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(AnggotaLombaPeer::DATABASE_NAME);

		if ($this->isColumnModified(AnggotaLombaPeer::ID)) $criteria->add(AnggotaLombaPeer::ID, $this->id);
		if ($this->isColumnModified(AnggotaLombaPeer::ID_PESERTA_LOMBA)) $criteria->add(AnggotaLombaPeer::ID_PESERTA_LOMBA, $this->id_peserta_lomba);
		if ($this->isColumnModified(AnggotaLombaPeer::NAMA)) $criteria->add(AnggotaLombaPeer::NAMA, $this->nama);
		if ($this->isColumnModified(AnggotaLombaPeer::USIA)) $criteria->add(AnggotaLombaPeer::USIA, $this->usia);
		if ($this->isColumnModified(AnggotaLombaPeer::ALAMAT)) $criteria->add(AnggotaLombaPeer::ALAMAT, $this->alamat);
		if ($this->isColumnModified(AnggotaLombaPeer::NO_TELP)) $criteria->add(AnggotaLombaPeer::NO_TELP, $this->no_telp);
		if ($this->isColumnModified(AnggotaLombaPeer::FILE_FOTO)) $criteria->add(AnggotaLombaPeer::FILE_FOTO, $this->file_foto);
		if ($this->isColumnModified(AnggotaLombaPeer::FILENAME_BARU)) $criteria->add(AnggotaLombaPeer::FILENAME_BARU, $this->filename_baru);
		if ($this->isColumnModified(AnggotaLombaPeer::CREATED_AT)) $criteria->add(AnggotaLombaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(AnggotaLombaPeer::UPDATED_AT)) $criteria->add(AnggotaLombaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(AnggotaLombaPeer::IS_DELETED)) $criteria->add(AnggotaLombaPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(AnggotaLombaPeer::DATABASE_NAME);

		$criteria->add(AnggotaLombaPeer::ID, $this->id);

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

		$copyObj->setNama($this->nama);

		$copyObj->setUsia($this->usia);

		$copyObj->setAlamat($this->alamat);

		$copyObj->setNoTelp($this->no_telp);

		$copyObj->setFileFoto($this->file_foto);

		$copyObj->setFilenameBaru($this->filename_baru);

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
			self::$peer = new AnggotaLombaPeer();
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