<?php


abstract class BaseWilayah extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $wilayah;


	
	protected $kecamatan;


	
	protected $kelurahan;


	
	protected $nama_lurah;


	
	protected $created_at;


	
	protected $updated_at;

	
	protected $collPenggunas;

	
	protected $lastPenggunaCriteria = null;

	
	protected $collPesertas;

	
	protected $lastPesertaCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getWilayah()
	{

		return $this->wilayah;
	}

	
	public function getKecamatan()
	{

		return $this->kecamatan;
	}

	
	public function getKelurahan()
	{

		return $this->kelurahan;
	}

	
	public function getNamaLurah()
	{

		return $this->nama_lurah;
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

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = WilayahPeer::ID;
		}

	} 
	
	public function setWilayah($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->wilayah !== $v) {
			$this->wilayah = $v;
			$this->modifiedColumns[] = WilayahPeer::WILAYAH;
		}

	} 
	
	public function setKecamatan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kecamatan !== $v) {
			$this->kecamatan = $v;
			$this->modifiedColumns[] = WilayahPeer::KECAMATAN;
		}

	} 
	
	public function setKelurahan($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->kelurahan !== $v) {
			$this->kelurahan = $v;
			$this->modifiedColumns[] = WilayahPeer::KELURAHAN;
		}

	} 
	
	public function setNamaLurah($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->nama_lurah !== $v) {
			$this->nama_lurah = $v;
			$this->modifiedColumns[] = WilayahPeer::NAMA_LURAH;
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
			$this->modifiedColumns[] = WilayahPeer::CREATED_AT;
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
			$this->modifiedColumns[] = WilayahPeer::UPDATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->wilayah = $rs->getString($startcol + 1);

			$this->kecamatan = $rs->getString($startcol + 2);

			$this->kelurahan = $rs->getString($startcol + 3);

			$this->nama_lurah = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->updated_at = $rs->getTimestamp($startcol + 6, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 7; 
		} catch (Exception $e) {
			throw new PropelException("Error populating Wilayah object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WilayahPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			WilayahPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(WilayahPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

    if ($this->isModified() && !$this->isColumnModified(WilayahPeer::UPDATED_AT))
    {
      $this->setUpdatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(WilayahPeer::DATABASE_NAME);
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
					$pk = WilayahPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += WilayahPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPenggunas !== null) {
				foreach($this->collPenggunas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collPesertas !== null) {
				foreach($this->collPesertas as $referrerFK) {
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


			if (($retval = WilayahPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPenggunas !== null) {
					foreach($this->collPenggunas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collPesertas !== null) {
					foreach($this->collPesertas as $referrerFK) {
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
		$pos = WilayahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getWilayah();
				break;
			case 2:
				return $this->getKecamatan();
				break;
			case 3:
				return $this->getKelurahan();
				break;
			case 4:
				return $this->getNamaLurah();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getUpdatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WilayahPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getWilayah(),
			$keys[2] => $this->getKecamatan(),
			$keys[3] => $this->getKelurahan(),
			$keys[4] => $this->getNamaLurah(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getUpdatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = WilayahPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setWilayah($value);
				break;
			case 2:
				$this->setKecamatan($value);
				break;
			case 3:
				$this->setKelurahan($value);
				break;
			case 4:
				$this->setNamaLurah($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setUpdatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = WilayahPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setWilayah($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setKecamatan($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setKelurahan($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setNamaLurah($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setUpdatedAt($arr[$keys[6]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(WilayahPeer::DATABASE_NAME);

		if ($this->isColumnModified(WilayahPeer::ID)) $criteria->add(WilayahPeer::ID, $this->id);
		if ($this->isColumnModified(WilayahPeer::WILAYAH)) $criteria->add(WilayahPeer::WILAYAH, $this->wilayah);
		if ($this->isColumnModified(WilayahPeer::KECAMATAN)) $criteria->add(WilayahPeer::KECAMATAN, $this->kecamatan);
		if ($this->isColumnModified(WilayahPeer::KELURAHAN)) $criteria->add(WilayahPeer::KELURAHAN, $this->kelurahan);
		if ($this->isColumnModified(WilayahPeer::NAMA_LURAH)) $criteria->add(WilayahPeer::NAMA_LURAH, $this->nama_lurah);
		if ($this->isColumnModified(WilayahPeer::CREATED_AT)) $criteria->add(WilayahPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(WilayahPeer::UPDATED_AT)) $criteria->add(WilayahPeer::UPDATED_AT, $this->updated_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(WilayahPeer::DATABASE_NAME);

		$criteria->add(WilayahPeer::ID, $this->id);

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

		$copyObj->setWilayah($this->wilayah);

		$copyObj->setKecamatan($this->kecamatan);

		$copyObj->setKelurahan($this->kelurahan);

		$copyObj->setNamaLurah($this->nama_lurah);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setUpdatedAt($this->updated_at);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPenggunas() as $relObj) {
				$copyObj->addPengguna($relObj->copy($deepCopy));
			}

			foreach($this->getPesertas() as $relObj) {
				$copyObj->addPeserta($relObj->copy($deepCopy));
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
			self::$peer = new WilayahPeer();
		}
		return self::$peer;
	}

	
	public function initPenggunas()
	{
		if ($this->collPenggunas === null) {
			$this->collPenggunas = array();
		}
	}

	
	public function getPenggunas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePenggunaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPenggunas === null) {
			if ($this->isNew()) {
			   $this->collPenggunas = array();
			} else {

				$criteria->add(PenggunaPeer::ID_WILAYAH, $this->getId());

				PenggunaPeer::addSelectColumns($criteria);
				$this->collPenggunas = PenggunaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PenggunaPeer::ID_WILAYAH, $this->getId());

				PenggunaPeer::addSelectColumns($criteria);
				if (!isset($this->lastPenggunaCriteria) || !$this->lastPenggunaCriteria->equals($criteria)) {
					$this->collPenggunas = PenggunaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPenggunaCriteria = $criteria;
		return $this->collPenggunas;
	}

	
	public function countPenggunas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePenggunaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PenggunaPeer::ID_WILAYAH, $this->getId());

		return PenggunaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPengguna(Pengguna $l)
	{
		$this->collPenggunas[] = $l;
		$l->setWilayah($this);
	}


	
	public function getPenggunasJoinSfGuardUser($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePenggunaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPenggunas === null) {
			if ($this->isNew()) {
				$this->collPenggunas = array();
			} else {

				$criteria->add(PenggunaPeer::ID_WILAYAH, $this->getId());

				$this->collPenggunas = PenggunaPeer::doSelectJoinSfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(PenggunaPeer::ID_WILAYAH, $this->getId());

			if (!isset($this->lastPenggunaCriteria) || !$this->lastPenggunaCriteria->equals($criteria)) {
				$this->collPenggunas = PenggunaPeer::doSelectJoinSfGuardUser($criteria, $con);
			}
		}
		$this->lastPenggunaCriteria = $criteria;

		return $this->collPenggunas;
	}

	
	public function initPesertas()
	{
		if ($this->collPesertas === null) {
			$this->collPesertas = array();
		}
	}

	
	public function getPesertas($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BasePesertaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collPesertas === null) {
			if ($this->isNew()) {
			   $this->collPesertas = array();
			} else {

				$criteria->add(PesertaPeer::ID_WILAYAH, $this->getId());

				PesertaPeer::addSelectColumns($criteria);
				$this->collPesertas = PesertaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PesertaPeer::ID_WILAYAH, $this->getId());

				PesertaPeer::addSelectColumns($criteria);
				if (!isset($this->lastPesertaCriteria) || !$this->lastPesertaCriteria->equals($criteria)) {
					$this->collPesertas = PesertaPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastPesertaCriteria = $criteria;
		return $this->collPesertas;
	}

	
	public function countPesertas($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BasePesertaPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(PesertaPeer::ID_WILAYAH, $this->getId());

		return PesertaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPeserta(Peserta $l)
	{
		$this->collPesertas[] = $l;
		$l->setWilayah($this);
	}

} 