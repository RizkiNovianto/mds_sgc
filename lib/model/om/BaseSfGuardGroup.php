<?php


abstract class BaseSfGuardGroup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $id;


	
	protected $name;


	
	protected $description;

	
	protected $collSfGuardGroupPermissions;

	
	protected $lastSfGuardGroupPermissionCriteria = null;

	
	protected $collSfGuardUserGroups;

	
	protected $lastSfGuardUserGroupCriteria = null;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getId()
	{

		return $this->id;
	}

	
	public function getName()
	{

		return $this->name;
	}

	
	public function getDescription()
	{

		return $this->description;
	}

	
	public function setId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->id !== $v) {
			$this->id = $v;
			$this->modifiedColumns[] = SfGuardGroupPeer::ID;
		}

	} 
	
	public function setName($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->name !== $v) {
			$this->name = $v;
			$this->modifiedColumns[] = SfGuardGroupPeer::NAME;
		}

	} 
	
	public function setDescription($v)
	{

						if ($v !== null && !is_string($v)) {
			$v = (string) $v; 
		}

		if ($this->description !== $v) {
			$this->description = $v;
			$this->modifiedColumns[] = SfGuardGroupPeer::DESCRIPTION;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->id = $rs->getInt($startcol + 0);

			$this->name = $rs->getString($startcol + 1);

			$this->description = $rs->getString($startcol + 2);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 3; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardGroup object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardGroupPeer::doDelete($this, $con);
			$this->setDeleted(true);
			$con->commit();
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public function save($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("You cannot save an object that has been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardGroupPeer::DATABASE_NAME);
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
					$pk = SfGuardGroupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setId($pk);  
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardGroupPeer::doUpdate($this, $con);
				}
				$this->resetModified(); 			}

			if ($this->collSfGuardGroupPermissions !== null) {
				foreach($this->collSfGuardGroupPermissions as $referrerFK) {
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


			if (($retval = SfGuardGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}


				if ($this->collSfGuardGroupPermissions !== null) {
					foreach($this->collSfGuardGroupPermissions as $referrerFK) {
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


			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getId();
				break;
			case 1:
				return $this->getName();
				break;
			case 2:
				return $this->getDescription();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getId(),
			$keys[1] => $this->getName(),
			$keys[2] => $this->getDescription(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setId($value);
				break;
			case 1:
				$this->setName($value);
				break;
			case 2:
				$this->setDescription($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setName($arr[$keys[1]]);
		if (array_key_exists($keys[2], $arr)) $this->setDescription($arr[$keys[2]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardGroupPeer::ID)) $criteria->add(SfGuardGroupPeer::ID, $this->id);
		if ($this->isColumnModified(SfGuardGroupPeer::NAME)) $criteria->add(SfGuardGroupPeer::NAME, $this->name);
		if ($this->isColumnModified(SfGuardGroupPeer::DESCRIPTION)) $criteria->add(SfGuardGroupPeer::DESCRIPTION, $this->description);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardGroupPeer::DATABASE_NAME);

		$criteria->add(SfGuardGroupPeer::ID, $this->id);

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

		$copyObj->setName($this->name);

		$copyObj->setDescription($this->description);


		if ($deepCopy) {
									$copyObj->setNew(false);

			foreach($this->getSfGuardGroupPermissions() as $relObj) {
				$copyObj->addSfGuardGroupPermission($relObj->copy($deepCopy));
			}

			foreach($this->getSfGuardUserGroups() as $relObj) {
				$copyObj->addSfGuardUserGroup($relObj->copy($deepCopy));
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
			self::$peer = new SfGuardGroupPeer();
		}
		return self::$peer;
	}

	
	public function initSfGuardGroupPermissions()
	{
		if ($this->collSfGuardGroupPermissions === null) {
			$this->collSfGuardGroupPermissions = array();
		}
	}

	
	public function getSfGuardGroupPermissions($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardGroupPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardGroupPermissions === null) {
			if ($this->isNew()) {
			   $this->collSfGuardGroupPermissions = array();
			} else {

				$criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->getId());

				SfGuardGroupPermissionPeer::addSelectColumns($criteria);
				$this->collSfGuardGroupPermissions = SfGuardGroupPermissionPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->getId());

				SfGuardGroupPermissionPeer::addSelectColumns($criteria);
				if (!isset($this->lastSfGuardGroupPermissionCriteria) || !$this->lastSfGuardGroupPermissionCriteria->equals($criteria)) {
					$this->collSfGuardGroupPermissions = SfGuardGroupPermissionPeer::doSelect($criteria, $con);
				}
			}
		}
		$this->lastSfGuardGroupPermissionCriteria = $criteria;
		return $this->collSfGuardGroupPermissions;
	}

	
	public function countSfGuardGroupPermissions($criteria = null, $distinct = false, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardGroupPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		$criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->getId());

		return SfGuardGroupPermissionPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSfGuardGroupPermission(SfGuardGroupPermission $l)
	{
		$this->collSfGuardGroupPermissions[] = $l;
		$l->setSfGuardGroup($this);
	}


	
	public function getSfGuardGroupPermissionsJoinSfGuardPermission($criteria = null, $con = null)
	{
				include_once 'lib/model/om/BaseSfGuardGroupPermissionPeer.php';
		if ($criteria === null) {
			$criteria = new Criteria();
		}
		elseif ($criteria instanceof Criteria)
		{
			$criteria = clone $criteria;
		}

		if ($this->collSfGuardGroupPermissions === null) {
			if ($this->isNew()) {
				$this->collSfGuardGroupPermissions = array();
			} else {

				$criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->getId());

				$this->collSfGuardGroupPermissions = SfGuardGroupPermissionPeer::doSelectJoinSfGuardPermission($criteria, $con);
			}
		} else {
									
			$criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->getId());

			if (!isset($this->lastSfGuardGroupPermissionCriteria) || !$this->lastSfGuardGroupPermissionCriteria->equals($criteria)) {
				$this->collSfGuardGroupPermissions = SfGuardGroupPermissionPeer::doSelectJoinSfGuardPermission($criteria, $con);
			}
		}
		$this->lastSfGuardGroupPermissionCriteria = $criteria;

		return $this->collSfGuardGroupPermissions;
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

				$criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->getId());

				SfGuardUserGroupPeer::addSelectColumns($criteria);
				$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelect($criteria, $con);
			}
		} else {
						if (!$this->isNew()) {
												

				$criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->getId());

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

		$criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->getId());

		return SfGuardUserGroupPeer::doCount($criteria, $distinct, $con);
	}

	
	public function addSfGuardUserGroup(SfGuardUserGroup $l)
	{
		$this->collSfGuardUserGroups[] = $l;
		$l->setSfGuardGroup($this);
	}


	
	public function getSfGuardUserGroupsJoinSfGuardUser($criteria = null, $con = null)
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

				$criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->getId());

				$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelectJoinSfGuardUser($criteria, $con);
			}
		} else {
									
			$criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->getId());

			if (!isset($this->lastSfGuardUserGroupCriteria) || !$this->lastSfGuardUserGroupCriteria->equals($criteria)) {
				$this->collSfGuardUserGroups = SfGuardUserGroupPeer::doSelectJoinSfGuardUser($criteria, $con);
			}
		}
		$this->lastSfGuardUserGroupCriteria = $criteria;

		return $this->collSfGuardUserGroups;
	}

} 