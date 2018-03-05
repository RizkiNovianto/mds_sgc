<?php


abstract class BasePengguna extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_wilayah;


	
	protected $id_sfguarduser;


	
	protected $nama;


	
	protected $no_telp;


	
	protected $file_foto;


	
	protected $filename_baru;


	
	protected $keterangan;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $is_deleted = 0;

	
	protected $aWilayah;

	
	protected $aSfGuardUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getIdWilayah()
	{

		return $this->id_wilayah;
	}

	
	public function getIdSfguarduser()
	{

		return $this->id_sfguarduser;
	}

	
	public function getNama()
	{

		return $this->nama;
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
			$this->modifiedColumns[] = PenggunaPeer::ID;
		}

	} 
	
	public function setIdWilayah($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_wilayah !== $v) {
			$this->id_wilayah = $v;
			$this->modifiedColumns[] = PenggunaPeer::ID_WILAYAH;
		}

		if ($this->aWilayah !== null && $this->aWilayah->getId() !== $v) {
			$this->aWilayah = null;
		}

	} 
	
	public function setIdSfguarduser($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_sfguarduser !== $v) {
			$this->id_sfguarduser = $v;
			$this->modifiedColumns[] = PenggunaPeer::ID_SFGUARDUSER;
		}

		if ($this->aSfGuardUser !== null && $this->aSfGuardUser->getId() !== $v) {
			$this->aSfGuardUser = null;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = PenggunaPeer::NAMA;
		}

	} 
	
	public function setNoTelp($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->no_telp !== $v) {
			$this->no_telp = $v;
			$this->modifiedColumns[] = PenggunaPeer::NO_TELP;
		}

	} 
	
	public function setFileFoto($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->file_foto !== $v) {
			$this->file_foto = $v;
			$this->modifiedColumns[] = PenggunaPeer::FILE_FOTO;
		}

	} 
	
	public function setFilenameBaru($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->filename_baru !== $v) {
			$this->filename_baru = $v;
			$this->modifiedColumns[] = PenggunaPeer::FILENAME_BARU;
		}

	} 
	
	public function setKeterangan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->keterangan !== $v) {
			$this->keterangan = $v;
			$this->modifiedColumns[] = PenggunaPeer::KETERANGAN;
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
			$this->modifiedColumns[] = PenggunaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PenggunaPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = PenggunaPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_wilayah = $rs->getInt($startcol + 1);

			$this->id_sfguarduser = $rs->getInt($startcol + 2);

			$this->nama = $rs->getString($startcol + 3);

			$this->no_telp = $rs->getString($startcol + 4);

			$this->file_foto = $rs->getString($startcol + 5);

			$this->filename_baru = $rs->getString($startcol + 6);

			$this->keterangan = $rs->getString($startcol + 7);

			$this->created_at = $rs->getTimestamp($startcol + 8, null);

			$this->updated_at = $rs->getTimestamp($startcol + 9, null);

			$this->is_deleted = $rs->getInt($startcol + 10);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 11; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Pengguna object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PenggunaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PenggunaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PenggunaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PenggunaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PenggunaPeer::DATABASE_NAME);
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


												
			if ($this->aWilayah !== null) {
				if ($this->aWilayah->isModified()) {
					$affectedRows += $this->aWilayah->save($con);
				}
				$this->setWilayah($this->aWilayah);
			}

			if ($this->aSfGuardUser !== null) {
				if ($this->aSfGuardUser->isModified()) {
					$affectedRows += $this->aSfGuardUser->save($con);
				}
				$this->setSfGuardUser($this->aSfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PenggunaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PenggunaPeer::doUpdate($this, $con);
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


												
			if ($this->aWilayah !== null) {
				if (!$this->aWilayah->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aWilayah->getValidationFailures());
				}
			}

			if ($this->aSfGuardUser !== null) {
				if (!$this->aSfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfGuardUser->getValidationFailures());
				}
			}


			if (($retval = PenggunaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PenggunaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getIdWilayah();
				break;
			case 2:
				return $this->getIdSfguarduser();
				break;
			case 3:
				return $this->getNama();
				break;
			case 4:
				return $this->getNoTelp();
				break;
			case 5:
				return $this->getFileFoto();
				break;
			case 6:
				return $this->getFilenameBaru();
				break;
			case 7:
				return $this->getKeterangan();
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
		$keys = PenggunaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdWilayah(),
			$keys[2] => $this->getIdSfguarduser(),
			$keys[3] => $this->getNama(),
			$keys[4] => $this->getNoTelp(),
			$keys[5] => $this->getFileFoto(),
			$keys[6] => $this->getFilenameBaru(),
			$keys[7] => $this->getKeterangan(),
			$keys[8] => $this->getCreatedAt(),
			$keys[9] => $this->getUpdatedAt(),
			$keys[10] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PenggunaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setIdWilayah($value);
				break;
			case 2:
				$this->setIdSfguarduser($value);
				break;
			case 3:
				$this->setNama($value);
				break;
			case 4:
				$this->setNoTelp($value);
				break;
			case 5:
				$this->setFileFoto($value);
				break;
			case 6:
				$this->setFilenameBaru($value);
				break;
			case 7:
				$this->setKeterangan($value);
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
		$keys = PenggunaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdWilayah($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIdSfguarduser($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setNama($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNoTelp($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setFileFoto($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setFilenameBaru($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setKeterangan($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setCreatedAt($arr[$keys[8]]);
		if (array_key_exists($keys[9], $arr)) $this->setUpdatedAt($arr[$keys[9]]);
		if (array_key_exists($keys[10], $arr)) $this->setIsDeleted($arr[$keys[10]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PenggunaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PenggunaPeer::ID)) $criteria->add(PenggunaPeer::ID, $this->id);
		if ($this->isColumnModified(PenggunaPeer::ID_WILAYAH)) $criteria->add(PenggunaPeer::ID_WILAYAH, $this->id_wilayah);
		if ($this->isColumnModified(PenggunaPeer::ID_SFGUARDUSER)) $criteria->add(PenggunaPeer::ID_SFGUARDUSER, $this->id_sfguarduser);
		if ($this->isColumnModified(PenggunaPeer::NAMA)) $criteria->add(PenggunaPeer::NAMA, $this->nama);
		if ($this->isColumnModified(PenggunaPeer::NO_TELP)) $criteria->add(PenggunaPeer::NO_TELP, $this->no_telp);
		if ($this->isColumnModified(PenggunaPeer::FILE_FOTO)) $criteria->add(PenggunaPeer::FILE_FOTO, $this->file_foto);
		if ($this->isColumnModified(PenggunaPeer::FILENAME_BARU)) $criteria->add(PenggunaPeer::FILENAME_BARU, $this->filename_baru);
		if ($this->isColumnModified(PenggunaPeer::KETERANGAN)) $criteria->add(PenggunaPeer::KETERANGAN, $this->keterangan);
		if ($this->isColumnModified(PenggunaPeer::CREATED_AT)) $criteria->add(PenggunaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PenggunaPeer::UPDATED_AT)) $criteria->add(PenggunaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(PenggunaPeer::IS_DELETED)) $criteria->add(PenggunaPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PenggunaPeer::DATABASE_NAME);

		$criteria->add(PenggunaPeer::ID, $this->id);

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

		$copyObj->setIdWilayah($this->id_wilayah);

		$copyObj->setIdSfguarduser($this->id_sfguarduser);

		$copyObj->setNama($this->nama);

		$copyObj->setNoTelp($this->no_telp);

		$copyObj->setFileFoto($this->file_foto);

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
			self::$peer = new PenggunaPeer();
		}
		return self::$peer;
	}

	
	public function setWilayah($v)
	{


		if ($v === null) {
			$this->setIdWilayah(NULL);
		} else {
			$this->setIdWilayah($v->getId());
		}


		$this->aWilayah = $v;
	}


	
	public function getWilayah($con = null)
	{
		if ($this->aWilayah === null && ($this->id_wilayah !== null)) {
						include_once 'lib/model/om/BaseWilayahPeer.php';

			$this->aWilayah = WilayahPeer::retrieveByPK($this->id_wilayah, $con);

			
		}
		return $this->aWilayah;
	}

	
	public function setSfGuardUser($v)
	{


		if ($v === null) {
			$this->setIdSfguarduser(NULL);
		} else {
			$this->setIdSfguarduser($v->getId());
		}


		$this->aSfGuardUser = $v;
	}


	
	public function getSfGuardUser($con = null)
	{
		if ($this->aSfGuardUser === null && ($this->id_sfguarduser !== null)) {
						include_once 'lib/model/om/BaseSfGuardUserPeer.php';

			$this->aSfGuardUser = SfGuardUserPeer::retrieveByPK($this->id_sfguarduser, $con);

			
		}
		return $this->aSfGuardUser;
	}

} 