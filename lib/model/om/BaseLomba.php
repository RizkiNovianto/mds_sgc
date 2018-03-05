<?php


abstract class BaseLomba extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $nama;


	
	protected $tingkat;


	
	protected $kategori;


	
	protected $deskripsi;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $is_deleted = 0;

	
	protected $collPesertaLombas;

	
	protected $lastPesertaLombaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getNama()
	{

		return $this->nama;
	}

	
	public function getTingkat()
	{

		return $this->tingkat;
	}

	
	public function getKategori()
	{

		return $this->kategori;
	}

	
	public function getDeskripsi()
	{

		return $this->deskripsi;
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
			$this->modifiedColumns[] = LombaPeer::ID;
		}

	} 
	
	public function setNama($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama !== $v) {
			$this->nama = $v;
			$this->modifiedColumns[] = LombaPeer::NAMA;
		}

	} 
	
	public function setTingkat($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->tingkat !== $v) {
			$this->tingkat = $v;
			$this->modifiedColumns[] = LombaPeer::TINGKAT;
		}

	} 
	
	public function setKategori($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kategori !== $v) {
			$this->kategori = $v;
			$this->modifiedColumns[] = LombaPeer::KATEGORI;
		}

	} 
	
	public function setDeskripsi($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->deskripsi !== $v) {
			$this->deskripsi = $v;
			$this->modifiedColumns[] = LombaPeer::DESKRIPSI;
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
			$this->modifiedColumns[] = LombaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = LombaPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = LombaPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->nama = $rs->getString($startcol + 1);

			$this->tingkat = $rs->getString($startcol + 2);

			$this->kategori = $rs->getString($startcol + 3);

			$this->deskripsi = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->is_deleted = $rs->getInt($startcol + 7);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 8; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Lomba object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LombaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			LombaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(LombaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(LombaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(LombaPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = LombaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += LombaPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPesertaLombas !== null) {
				foreach($this->collPesertaLombas as $referrerFK) {
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


			if (($retval = LombaPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPesertaLombas !== null) {
					foreach($this->collPesertaLombas as $referrerFK) {
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
		$pos = LombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getNama();
				break;
			case 2:
				return $this->getTingkat();
				break;
			case 3:
				return $this->getKategori();
				break;
			case 4:
				return $this->getDeskripsi();
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
		$keys = LombaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getNama(),
			$keys[2] => $this->getTingkat(),
			$keys[3] => $this->getKategori(),
			$keys[4] => $this->getDeskripsi(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
			$keys[7] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = LombaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setNama($value);
				break;
			case 2:
				$this->setTingkat($value);
				break;
			case 3:
				$this->setKategori($value);
				break;
			case 4:
				$this->setDeskripsi($value);
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
		$keys = LombaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setNama($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setTingkat($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setKategori($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setDeskripsi($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsDeleted($arr[$keys[7]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(LombaPeer::DATABASE_NAME);

		if ($this->isColumnModified(LombaPeer::ID)) $criteria->add(LombaPeer::ID, $this->id);
		if ($this->isColumnModified(LombaPeer::NAMA)) $criteria->add(LombaPeer::NAMA, $this->nama);
		if ($this->isColumnModified(LombaPeer::TINGKAT)) $criteria->add(LombaPeer::TINGKAT, $this->tingkat);
		if ($this->isColumnModified(LombaPeer::KATEGORI)) $criteria->add(LombaPeer::KATEGORI, $this->kategori);
		if ($this->isColumnModified(LombaPeer::DESKRIPSI)) $criteria->add(LombaPeer::DESKRIPSI, $this->deskripsi);
		if ($this->isColumnModified(LombaPeer::CREATED_AT)) $criteria->add(LombaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(LombaPeer::UPDATED_AT)) $criteria->add(LombaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(LombaPeer::IS_DELETED)) $criteria->add(LombaPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(LombaPeer::DATABASE_NAME);

		$criteria->add(LombaPeer::ID, $this->id);

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

		$copyObj->setNama($this->nama);

		$copyObj->setTingkat($this->tingkat);

		$copyObj->setKategori($this->kategori);

		$copyObj->setDeskripsi($this->deskripsi);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);

		$copyObj->setIsDeleted($this->is_deleted);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPesertaLombas() as $relObj) {
				$copyObj->addPesertaLomba($relObj->copy($deepCopy));
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
			self::$peer = new LombaPeer();
		}
		return self::$peer;
	}

	
	public function initPesertaLombas()
	{
		if ($this->collPesertaLombas === null) {
			$this->collPesertaLombas = array();
		}
	}

	
	public function getPesertaLombas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePesertaLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPesertaLombas === null) {
			if ($this->isNew()) {
			   $this->collPesertaLombas = array();
			} else {

				$criteria->add(PesertaLombaPeer::ID_LOMBA, $this->getId());

				PesertaLombaPeer::addSelectColumns($criteria);
				$this->collPesertaLombas = PesertaLombaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PesertaLombaPeer::ID_LOMBA, $this->getId());

				PesertaLombaPeer::addSelectColumns($criteria);
				if (!isset($this->lastPesertaLombaCriteria) || !$this->lastPesertaLombaCriteria->equals($criteria)) {
					$this->collPesertaLombas = PesertaLombaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPesertaLombaCriteria = $criteria;
		return $this->collPesertaLombas;
	}

	
	public function countPesertaLombas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePesertaLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PesertaLombaPeer::ID_LOMBA, $this->getId());

		return PesertaLombaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPesertaLomba(PesertaLomba $l)
	{
		$this->collPesertaLombas[] = $l;
		$l->setLomba($this);
	}


	
	public function getPesertaLombasJoinPeserta($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePesertaLombaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPesertaLombas === null) {
			if ($this->isNew()) {
				$this->collPesertaLombas = array();
			} else {

				$criteria->add(PesertaLombaPeer::ID_LOMBA, $this->getId());

				$this->collPesertaLombas = PesertaLombaPeer::doSelectJoinPeserta($criteria, $con);
			}
		} else {
									
			$criteria->add(PesertaLombaPeer::ID_LOMBA, $this->getId());

			if (!isset($this->lastPesertaLombaCriteria) || !$this->lastPesertaLombaCriteria->equals($criteria)) {
				$this->collPesertaLombas = PesertaLombaPeer::doSelectJoinPeserta($criteria, $con);
			}
		}
		$this->lastPesertaLombaCriteria = $criteria;

		return $this->collPesertaLombas;
	}

} 