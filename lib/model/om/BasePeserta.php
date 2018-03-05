<?php


abstract class BasePeserta extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $id_wilayah;


	
	protected $rt;


	
	protected $rw;


	
	protected $ketua_rt;


	
	protected $ketua_rw;


	
	protected $created_at;


	
	protected $updated_at;


	
	protected $is_deleted = 0;

	
	protected $aWilayah;

	
	protected $collPesertaLombas;

	
	protected $lastPesertaLombaCriteria = null;

	
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

	
	public function getRt()
	{

		return $this->rt;
	}

	
	public function getRw()
	{

		return $this->rw;
	}

	
	public function getKetuaRt()
	{

		return $this->ketua_rt;
	}

	
	public function getKetuaRw()
	{

		return $this->ketua_rw;
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
			$this->modifiedColumns[] = PesertaPeer::ID;
		}

	} 
	
	public function setIdWilayah($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id_wilayah !== $v) {
			$this->id_wilayah = $v;
			$this->modifiedColumns[] = PesertaPeer::ID_WILAYAH;
		}

		if ($this->aWilayah !== null && $this->aWilayah->getId() !== $v) {
			$this->aWilayah = null;
		}

	} 
	
	public function setRt($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rt !== $v) {
			$this->rt = $v;
			$this->modifiedColumns[] = PesertaPeer::RT;
		}

	} 
	
	public function setRw($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->rw !== $v) {
			$this->rw = $v;
			$this->modifiedColumns[] = PesertaPeer::RW;
		}

	} 
	
	public function setKetuaRt($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ketua_rt !== $v) {
			$this->ketua_rt = $v;
			$this->modifiedColumns[] = PesertaPeer::KETUA_RT;
		}

	} 
	
	public function setKetuaRw($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ketua_rw !== $v) {
			$this->ketua_rw = $v;
			$this->modifiedColumns[] = PesertaPeer::KETUA_RW;
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
			$this->modifiedColumns[] = PesertaPeer::CREATED_AT;
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
			$this->modifiedColumns[] = PesertaPeer::UPDATED_AT;
		}

	} 
	
	public function setIsDeleted($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_deleted !== $v || $v === 0) {
			$this->is_deleted = $v;
			$this->modifiedColumns[] = PesertaPeer::IS_DELETED;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->id_wilayah = $rs->getInt($startcol + 1);

			$this->rt = $rs->getString($startcol + 2);

			$this->rw = $rs->getString($startcol + 3);

			$this->ketua_rt = $rs->getString($startcol + 4);

			$this->ketua_rw = $rs->getString($startcol + 5);

			$this->created_at = $rs->getTimestamp($startcol + 6, null);

			$this->updated_at = $rs->getTimestamp($startcol + 7, null);

			$this->is_deleted = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Peserta object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PesertaPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			PesertaPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(PesertaPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(PesertaPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(PesertaPeer::DATABASE_NAME);
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


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = PesertaPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += PesertaPeer::doUpdate($this, $con);
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


												
			if ($this->aWilayah !== null) {
				if (!$this->aWilayah->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aWilayah->getValidationFailures());
				}
			}


			if (($retval = PesertaPeer::doValidate($this, $columns)) !== true) {
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
		$pos = PesertaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				return $this->getRt();
				break;
			case 3:
				return $this->getRw();
				break;
			case 4:
				return $this->getKetuaRt();
				break;
			case 5:
				return $this->getKetuaRw();
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
		$keys = PesertaPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getIdWilayah(),
			$keys[2] => $this->getRt(),
			$keys[3] => $this->getRw(),
			$keys[4] => $this->getKetuaRt(),
			$keys[5] => $this->getKetuaRw(),
			$keys[6] => $this->getCreatedAt(),
			$keys[7] => $this->getUpdatedAt(),
			$keys[8] => $this->getIsDeleted(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = PesertaPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
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
				$this->setRt($value);
				break;
			case 3:
				$this->setRw($value);
				break;
			case 4:
				$this->setKetuaRt($value);
				break;
			case 5:
				$this->setKetuaRw($value);
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
		$keys = PesertaPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setIdWilayah($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setRt($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setRw($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setKetuaRt($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setKetuaRw($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setCreatedAt($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setUpdatedAt($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsDeleted($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(PesertaPeer::DATABASE_NAME);

		if ($this->isColumnModified(PesertaPeer::ID)) $criteria->add(PesertaPeer::ID, $this->id);
		if ($this->isColumnModified(PesertaPeer::ID_WILAYAH)) $criteria->add(PesertaPeer::ID_WILAYAH, $this->id_wilayah);
		if ($this->isColumnModified(PesertaPeer::RT)) $criteria->add(PesertaPeer::RT, $this->rt);
		if ($this->isColumnModified(PesertaPeer::RW)) $criteria->add(PesertaPeer::RW, $this->rw);
		if ($this->isColumnModified(PesertaPeer::KETUA_RT)) $criteria->add(PesertaPeer::KETUA_RT, $this->ketua_rt);
		if ($this->isColumnModified(PesertaPeer::KETUA_RW)) $criteria->add(PesertaPeer::KETUA_RW, $this->ketua_rw);
		if ($this->isColumnModified(PesertaPeer::CREATED_AT)) $criteria->add(PesertaPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(PesertaPeer::UPDATED_AT)) $criteria->add(PesertaPeer::UPDATED_AT, $this->updated_at);
		if ($this->isColumnModified(PesertaPeer::IS_DELETED)) $criteria->add(PesertaPeer::IS_DELETED, $this->is_deleted);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(PesertaPeer::DATABASE_NAME);

		$criteria->add(PesertaPeer::ID, $this->id);

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

		$copyObj->setRt($this->rt);

		$copyObj->setRw($this->rw);

		$copyObj->setKetuaRt($this->ketua_rt);

		$copyObj->setKetuaRw($this->ketua_rw);

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
			self::$peer = new PesertaPeer();
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

				$criteria->add(PesertaLombaPeer::ID_PESERTA, $this->getId());

				PesertaLombaPeer::addSelectColumns($criteria);
				$this->collPesertaLombas = PesertaLombaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PesertaLombaPeer::ID_PESERTA, $this->getId());

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

		$criteria->add(PesertaLombaPeer::ID_PESERTA, $this->getId());

		return PesertaLombaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPesertaLomba(PesertaLomba $l)
	{
		$this->collPesertaLombas[] = $l;
		$l->setPeserta($this);
	}


	
	public function getPesertaLombasJoinLomba($criteria = null, $con = null)
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

				$criteria->add(PesertaLombaPeer::ID_PESERTA, $this->getId());

				$this->collPesertaLombas = PesertaLombaPeer::doSelectJoinLomba($criteria, $con);
			}
		} else {
									
			$criteria->add(PesertaLombaPeer::ID_PESERTA, $this->getId());

			if (!isset($this->lastPesertaLombaCriteria) || !$this->lastPesertaLombaCriteria->equals($criteria)) {
				$this->collPesertaLombas = PesertaLombaPeer::doSelectJoinLomba($criteria, $con);
			}
		}
		$this->lastPesertaLombaCriteria = $criteria;

		return $this->collPesertaLombas;
	}

} 