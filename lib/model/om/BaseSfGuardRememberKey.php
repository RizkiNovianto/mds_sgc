<?php


abstract class BaseSfGuardRememberKey extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $remember_key;


	
	protected $ip_address;


	
	protected $created_at;

	
	protected $aSfGuardUser;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getRememberKey()
	{

		return $this->remember_key;
	}

	
	public function getIpAddress()
	{

		return $this->ip_address;
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

	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = SfGuardRememberKeyPeer::USER_ID;
		}

		if ($this->aSfGuardUser !== null && $this->aSfGuardUser->getId() !== $v) {
			$this->aSfGuardUser = null;
		}

	} 
	
	public function setRememberKey($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->remember_key !== $v) {
			$this->remember_key = $v;
			$this->modifiedColumns[] = SfGuardRememberKeyPeer::REMEMBER_KEY;
		}

	} 
	
	public function setIpAddress($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->ip_address !== $v) {
			$this->ip_address = $v;
			$this->modifiedColumns[] = SfGuardRememberKeyPeer::IP_ADDRESS;
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
			$this->modifiedColumns[] = SfGuardRememberKeyPeer::CREATED_AT;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->remember_key = $rs->getString($startcol + 1);

			$this->ip_address = $rs->getString($startcol + 2);

			$this->created_at = $rs->getTimestamp($startcol + 3, null);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 4; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardRememberKey object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardRememberKeyPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardRememberKeyPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(SfGuardRememberKeyPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardRememberKeyPeer::DATABASE_NAME);
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


												
			if ($this->aSfGuardUser !== null) {
				if ($this->aSfGuardUser->isModified()) {
					$affectedRows += $this->aSfGuardUser->save($con);
				}
				$this->setSfGuardUser($this->aSfGuardUser);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SfGuardRememberKeyPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardRememberKeyPeer::doUpdate($this, $con);
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


												
			if ($this->aSfGuardUser !== null) {
				if (!$this->aSfGuardUser->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfGuardUser->getValidationFailures());
				}
			}


			if (($retval = SfGuardRememberKeyPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardRememberKeyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getRememberKey();
				break;
			case 2:
				return $this->getIpAddress();
				break;
			case 3:
				return $this->getCreatedAt();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardRememberKeyPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getRememberKey(),
			$keys[2] => $this->getIpAddress(),
			$keys[3] => $this->getCreatedAt(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardRememberKeyPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setRememberKey($value);
				break;
			case 2:
				$this->setIpAddress($value);
				break;
			case 3:
				$this->setCreatedAt($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardRememberKeyPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setRememberKey($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setIpAddress($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setCreatedAt($arr[$keys[3]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardRememberKeyPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardRememberKeyPeer::USER_ID)) $criteria->add(SfGuardRememberKeyPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(SfGuardRememberKeyPeer::REMEMBER_KEY)) $criteria->add(SfGuardRememberKeyPeer::REMEMBER_KEY, $this->remember_key);
		if ($this->isColumnModified(SfGuardRememberKeyPeer::IP_ADDRESS)) $criteria->add(SfGuardRememberKeyPeer::IP_ADDRESS, $this->ip_address);
		if ($this->isColumnModified(SfGuardRememberKeyPeer::CREATED_AT)) $criteria->add(SfGuardRememberKeyPeer::CREATED_AT, $this->created_at);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardRememberKeyPeer::DATABASE_NAME);

		$criteria->add(SfGuardRememberKeyPeer::USER_ID, $this->user_id);
		$criteria->add(SfGuardRememberKeyPeer::IP_ADDRESS, $this->ip_address);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getUserId();

		$pks[1] = $this->getIpAddress();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setUserId($keys[0]);

		$this->setIpAddress($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{

		$copyObj->setRememberKey($this->remember_key);

		$copyObj->setCreatedAt($this->created_at);


		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
		$copyObj->setIpAddress(NULL); 
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
			self::$peer = new SfGuardRememberKeyPeer();
		}
		return self::$peer;
	}

	
	public function setSfGuardUser($v)
	{


		if ($v === null) {
			$this->setUserId(NULL);
		} else {
			$this->setUserId($v->getId());
		}


		$this->aSfGuardUser = $v;
	}


	
	public function getSfGuardUser($con = null)
	{
		if ($this->aSfGuardUser === null && ($this->user_id !== null)) {
						include_once 'lib/model/om/BaseSfGuardUserPeer.php';

			$this->aSfGuardUser = SfGuardUserPeer::retrieveByPK($this->user_id, $con);

			
		}
		return $this->aSfGuardUser;
	}

} 