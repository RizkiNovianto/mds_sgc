<?php


abstract class BaseSfGuardUser extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $username;


	
	protected $algorithm = 'sha1';


	
	protected $salt;


	
	protected $password;


	
	protected $created_at;


	
	protected $last_login;


	
	protected $is_active = 1;


	
	protected $is_super_admin = 0;

	
	protected $collPenggunas;

	
	protected $lastPenggunaCriteria = null;

	
	protected $collSfGuardRememberKeys;

	
	protected $lastSfGuardRememberKeyCriteria = null;

	
	protected $collSfGuardUserGroups;

	
	protected $lastSfGuardUserGroupCriteria = null;

	
	protected $collSfGuardUserPermissions;

	
	protected $lastSfGuardUserPermissionCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getUsername()
	{

		return $this->username;
	}

	
	public function getAlgorithm()
	{

		return $this->algorithm;
	}

	
	public function getSalt()
	{

		return $this->salt;
	}

	
	public function getPassword()
	{

		return $this->password;
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

	
	public function getLastLogin($format = 'Y-m-d H:i:s')
	{

		if ($this->last_login === null || $this->last_login === '') {
			return null;
		} elseif (!is_int($this->last_login)) {
						$ts = strtotime($this->last_login);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse value of [last_login] as date/time value: " . var_export($this->last_login, true));
			}
		} else {
			$ts = $this->last_login;
		}
		if ($format === null) {
			return $ts;
		} elseif (strpos($format, '%') !== false) {
			return strftime($format, $ts);
		} else {
			return date($format, $ts);
		}
	}

	
	public function getIsActive()
	{

		return $this->is_active;
	}

	
	public function getIsSuperAdmin()
	{

		return $this->is_super_admin;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::ID;
		}

	} 
	
	public function setUsername($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->username !== $v) {
			$this->username = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::USERNAME;
		}

	} 
	
	public function setAlgorithm($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->algorithm !== $v || $v === 'sha1') {
			$this->algorithm = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::ALGORITHM;
		}

	} 
	
	public function setSalt($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->salt !== $v) {
			$this->salt = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::SALT;
		}

	} 
	
	public function setPassword($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->password !== $v) {
			$this->password = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::PASSWORD;
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
			$this->modifiedColumns[] = SfGuardUserPeer::CREATED_AT;
		}

	} 
	
	public function setLastLogin($v)
	{

		if ($v !== null && !is_int($v)) {
			$ts = strtotime($v);
			if ($ts === -1 || $ts === false) { 				throw new PropelException("Unable to parse date/time value for [last_login] from input: " . var_export($v, true));
			}
		} else {
			$ts = $v;
		}
		if ($this->last_login !== $ts) {
			$this->last_login = $ts;
			$this->modifiedColumns[] = SfGuardUserPeer::LAST_LOGIN;
		}

	} 
	
	public function setIsActive($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_active !== $v || $v === 1) {
			$this->is_active = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::IS_ACTIVE;
		}

	} 
	
	public function setIsSuperAdmin($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->is_super_admin !== $v || $v === 0) {
			$this->is_super_admin = $v;
			$this->modifiedColumns[] = SfGuardUserPeer::IS_SUPER_ADMIN;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->username = $rs->getString($startcol + 1);

			$this->algorithm = $rs->getString($startcol + 2);

			$this->salt = $rs->getString($startcol + 3);

			$this->password = $rs->getString($startcol + 4);

			$this->created_at = $rs->getTimestamp($startcol + 5, null);

			$this->last_login = $rs->getTimestamp($startcol + 6, null);

			$this->is_active = $rs->getInt($startcol + 7);

			$this->is_super_admin = $rs->getInt($startcol + 8);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 9; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardUser object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardUserPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardUserPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
    if ($this->isNew() && !$this->isColumnModified(SfGuardUserPeer::CREATED_AT))
    {
      $this->setCreatedAt(time());
    }

		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardUserPeer::DATABASE_NAME);
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
					$pk = SfGuardUserPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardUserPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collPenggunas !== null) {
				foreach($this->collPenggunas as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSfGuardRememberKeys !== null) {
				foreach($this->collSfGuardRememberKeys as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSfGuardUserGroups !== null) {
				foreach($this->collSfGuardUserGroups as $referrerFK) {
					if (!$referrerFK->isDeleted()) {
						$affectedRows += $referrerFK->save($con);
					}
				}
			}

			if ($this->collSfGuardUserPermissions !== null) {
				foreach($this->collSfGuardUserPermissions as $referrerFK) {
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


			if (($retval = SfGuardUserPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collPenggunas !== null) {
					foreach($this->collPenggunas as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSfGuardRememberKeys !== null) {
					foreach($this->collSfGuardRememberKeys as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSfGuardUserGroups !== null) {
					foreach($this->collSfGuardUserGroups as $referrerFK) {
						if (!$referrerFK->validate($columns)) {
							$failureMap = array_merge($failureMap, $referrerFK->getValidationFailures());
						}
					}
				}

				if ($this->collSfGuardUserPermissions !== null) {
					foreach($this->collSfGuardUserPermissions as $referrerFK) {
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
		$pos = SfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getUsername();
				break;
			case 2:
				return $this->getAlgorithm();
				break;
			case 3:
				return $this->getSalt();
				break;
			case 4:
				return $this->getPassword();
				break;
			case 5:
				return $this->getCreatedAt();
				break;
			case 6:
				return $this->getLastLogin();
				break;
			case 7:
				return $this->getIsActive();
				break;
			case 8:
				return $this->getIsSuperAdmin();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getUsername(),
			$keys[2] => $this->getAlgorithm(),
			$keys[3] => $this->getSalt(),
			$keys[4] => $this->getPassword(),
			$keys[5] => $this->getCreatedAt(),
			$keys[6] => $this->getLastLogin(),
			$keys[7] => $this->getIsActive(),
			$keys[8] => $this->getIsSuperAdmin(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setUsername($value);
				break;
			case 2:
				$this->setAlgorithm($value);
				break;
			case 3:
				$this->setSalt($value);
				break;
			case 4:
				$this->setPassword($value);
				break;
			case 5:
				$this->setCreatedAt($value);
				break;
			case 6:
				$this->setLastLogin($value);
				break;
			case 7:
				$this->setIsActive($value);
				break;
			case 8:
				$this->setIsSuperAdmin($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setUsername($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setAlgorithm($arr[$keys[2]]);
		if (array_key_exists($keys[3], $arr)) $this->setSalt($arr[$keys[3]]);
		if (array_key_exists($keys[4], $arr)) $this->setPassword($arr[$keys[4]]);
		if (array_key_exists($keys[5], $arr)) $this->setCreatedAt($arr[$keys[5]]);
		if (array_key_exists($keys[6], $arr)) $this->setLastLogin($arr[$keys[6]]);
		if (array_key_exists($keys[7], $arr)) $this->setIsActive($arr[$keys[7]]);
		if (array_key_exists($keys[8], $arr)) $this->setIsSuperAdmin($arr[$keys[8]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardUserPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardUserPeer::ID)) $criteria->add(SfGuardUserPeer::ID, $this->id);
		if ($this->isColumnModified(SfGuardUserPeer::USERNAME)) $criteria->add(SfGuardUserPeer::USERNAME, $this->username);
		if ($this->isColumnModified(SfGuardUserPeer::ALGORITHM)) $criteria->add(SfGuardUserPeer::ALGORITHM, $this->algorithm);
		if ($this->isColumnModified(SfGuardUserPeer::SALT)) $criteria->add(SfGuardUserPeer::SALT, $this->salt);
		if ($this->isColumnModified(SfGuardUserPeer::PASSWORD)) $criteria->add(SfGuardUserPeer::PASSWORD, $this->password);
		if ($this->isColumnModified(SfGuardUserPeer::CREATED_AT)) $criteria->add(SfGuardUserPeer::CREATED_AT, $this->created_at);
		if ($this->isColumnModified(SfGuardUserPeer::LAST_LOGIN)) $criteria->add(SfGuardUserPeer::LAST_LOGIN, $this->last_login);
		if ($this->isColumnModified(SfGuardUserPeer::IS_ACTIVE)) $criteria->add(SfGuardUserPeer::IS_ACTIVE, $this->is_active);
		if ($this->isColumnModified(SfGuardUserPeer::IS_SUPER_ADMIN)) $criteria->add(SfGuardUserPeer::IS_SUPER_ADMIN, $this->is_super_admin);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardUserPeer::DATABASE_NAME);

		$criteria->add(SfGuardUserPeer::ID, $this->id);

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

		$copyObj->setUsername($this->username);

		$copyObj->setAlgorithm($this->algorithm);

		$copyObj->setSalt($this->salt);

		$copyObj->setPassword($this->password);

		$copyObj->setCreatedAt($this->created_at);

		$copyObj->setLastLogin($this->last_login);

		$copyObj->setIsActive($this->is_active);

		$copyObj->setIsSuperAdmin($this->is_super_admin);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getPenggunas() as $relObj) {
				$copyObj->addPengguna($relObj->copy($deepCopy));
			}

			foreach($this->getSfGuardRememberKeys() as $relObj) {
				$copyObj->addSfGuardRememberKey($relObj->copy($deepCopy));
			}

			foreach($this->getSfGuardUserGroups() as $relObj) {
				$copyObj->addSfGuardUserGroup($relObj->copy($deepCopy));
			}

			foreach($this->getSfGuardUserPermissions() as $relObj) {
				$copyObj->addSfGuardUserPermission($relObj->copy($deepCopy));
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
			self::$peer = new SfGuardUserPeer();
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

				$criteria->add(PenggunaPeer::ID_SFGUARDUSER, $this->getId());

				PenggunaPeer::addSelectColumns($criteria);
				$this->collPenggunas = PenggunaPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(PenggunaPeer::ID_SFGUARDUSER, $this->getId());

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

		$criteria->add(PenggunaPeer::ID_SFGUARDUSER, $this->getId());

		return PenggunaPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addPengguna(Pengguna $l)
	{
		$this->collPenggunas[] = $l;
		$l->setSfGuardUser($this);
	}


	
	public function getPenggunasJoinWilayah($criteria = null, $con = null)
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

				$criteria->add(PenggunaPeer::ID_SFGUARDUSER, $this->getId());

				$this->collPenggunas = PenggunaPeer::doSelectJoinWilayah($criteria, $con);
			}
		} else {
									
			$criteria->add(PenggunaPeer::ID_SFGUARDUSER, $this->getId());

			if (!isset($this->lastPenggunaCriteria) || !$this->lastPenggunaCriteria->equals($criteria)) {
				$this->collPenggunas = PenggunaPeer::doSelectJoinWilayah($criteria, $con);
			}
		}
		$this->lastPenggunaCriteria = $criteria;

		return $this->collPenggunas;
	}

	
	public function initSfGuardRememberKeys()
	{
		if ($this->collSfGuardRememberKeys === null) {
			$this->collSfGuardRememberKeys = array();
		}
	}

	
	public function getSfGuardRememberKeys($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardRememberKeys === null) {
			if ($this->isNew()) {
			   $this->collSfGuardRememberKeys = array();
			} else {

				$criteria->add(SfGuardRememberKeyPeer::USER_ID, $this->getId());

				SfGuardRememberKeyPeer::addSelectColumns($criteria);
				$this->collSfGuardRememberKeys = SfGuardRememberKeyPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SfGuardRememberKeyPeer::USER_ID, $this->getId());

				SfGuardRememberKeyPeer::addSelectColumns($criteria);
				if (!isset($this->lastSfGuardRememberKeyCriteria) || !$this->lastSfGuardRememberKeyCriteria->equals($criteria)) {
					$this->collSfGuardRememberKeys = SfGuardRememberKeyPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSfGuardRememberKeyCriteria = $criteria;
		return $this->collSfGuardRememberKeys;
	}

	
	public function countSfGuardRememberKeys($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardRememberKeyPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SfGuardRememberKeyPeer::USER_ID, $this->getId());

		return SfGuardRememberKeyPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSfGuardRememberKey(SfGuardRememberKey $l)
	{
		$this->collSfGuardRememberKeys[] = $l;
		$l->setSfGuardUser($this);
	}

	
	public function initSfGuardUserGroups()
	{
		if ($this->collSfGuardUserGroups === null) {
			$this->collSfGuardUserGroups = array();
		}
	}

	
	public function getSfGuardUserGroups($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardUserGroups === null) {
			if ($this->isNew()) {
			   $this->collSfGuardUserGroups = array();
			} else {

				$criteria->add(SfGuardUserGroupPeer::USER_ID, $this->getId());

				SfGuardUserGroupPeer::addSelectColumns($criteria);
				$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SfGuardUserGroupPeer::USER_ID, $this->getId());

				SfGuardUserGroupPeer::addSelectColumns($criteria);
				if (!isset($this->lastSfGuardUserGroupCriteria) || !$this->lastSfGuardUserGroupCriteria->equals($criteria)) {
					$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSfGuardUserGroupCriteria = $criteria;
		return $this->collSfGuardUserGroups;
	}

	
	public function countSfGuardUserGroups($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SfGuardUserGroupPeer::USER_ID, $this->getId());

		return SfGuardUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSfGuardUserGroup(SfGuardUserGroup $l)
	{
		$this->collSfGuardUserGroups[] = $l;
		$l->setSfGuardUser($this);
	}


	
	public function getSfGuardUserGroupsJoinSfGuardGroup($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardUserGroupPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardUserGroups === null) {
			if ($this->isNew()) {
				$this->collSfGuardUserGroups = array();
			} else {

				$criteria->add(SfGuardUserGroupPeer::USER_ID, $this->getId());

				$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelectJoinSfGuardGroup($criteria, $con);
			}
		} else {
									
			$criteria->add(SfGuardUserGroupPeer::USER_ID, $this->getId());

			if (!isset($this->lastSfGuardUserGroupCriteria) || !$this->lastSfGuardUserGroupCriteria->equals($criteria)) {
				$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelectJoinSfGuardGroup($criteria, $con);
			}
		}
		$this->lastSfGuardUserGroupCriteria = $criteria;

		return $this->collSfGuardUserGroups;
	}

	
	public function initSfGuardUserPermissions()
	{
		if ($this->collSfGuardUserPermissions === null) {
			$this->collSfGuardUserPermissions = array();
		}
	}

	
	public function getSfGuardUserPermissions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardUserPermissions === null) {
			if ($this->isNew()) {
			   $this->collSfGuardUserPermissions = array();
			} else {

				$criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->getId());

				SfGuardUserPermissionPeer::addSelectColumns($criteria);
				$this->collSfGuardUserPermissions = SfGuardUserPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->getId());

				SfGuardUserPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSfGuardUserPermissionCriteria) || !$this->lastSfGuardUserPermissionCriteria->equals($criteria)) {
					$this->collSfGuardUserPermissions = SfGuardUserPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSfGuardUserPermissionCriteria = $criteria;
		return $this->collSfGuardUserPermissions;
	}

	
	public function countSfGuardUserPermissions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->getId());

		return SfGuardUserPermissionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSfGuardUserPermission(SfGuardUserPermission $l)
	{
		$this->collSfGuardUserPermissions[] = $l;
		$l->setSfGuardUser($this);
	}


	
	public function getSfGuardUserPermissionsJoinSfGuardPermission($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardUserPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardUserPermissions === null) {
			if ($this->isNew()) {
				$this->collSfGuardUserPermissions = array();
			} else {

				$criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->getId());

				$this->collSfGuardUserPermissions = SfGuardUserPermissionPeer::doSelectJoinSfGuardPermission($criteria, $con);
			}
		} else {
									
			$criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->getId());

			if (!isset($this->lastSfGuardUserPermissionCriteria) || !$this->lastSfGuardUserPermissionCriteria->equals($criteria)) {
				$this->collSfGuardUserPermissions = SfGuardUserPermissionPeer::doSelectJoinSfGuardPermission($criteria, $con);
			}
		}
		$this->lastSfGuardUserPermissionCriteria = $criteria;

		return $this->collSfGuardUserPermissions;
	}

} 