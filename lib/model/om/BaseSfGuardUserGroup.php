<?php


abstract class BaseSfGuardUserGroup extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $group_id;

	
	protected $aSfGuardUser;

	
	protected $aSfGuardGroup;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getGroupId()
	{

		return $this->group_id;
	}

	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = SfGuardUserGroupPeer::USER_ID;
		}

		if ($this->aSfGuardUser !== null && $this->aSfGuardUser->getId() !== $v) {
			$this->aSfGuardUser = null;
		}

	} 
	
	public function setGroupId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->group_id !== $v) {
			$this->group_id = $v;
			$this->modifiedColumns[] = SfGuardUserGroupPeer::GROUP_ID;
		}

		if ($this->aSfGuardGroup !== null && $this->aSfGuardGroup->getId() !== $v) {
			$this->aSfGuardGroup = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->group_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardUserGroup object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardUserGroupPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardUserGroupPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SfGuardUserGroupPeer::DATABASE_NAME);
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

			if ($this->aSfGuardGroup !== null) {
				if ($this->aSfGuardGroup->isModified()) {
					$affectedRows += $this->aSfGuardGroup->save($con);
				}
				$this->setSfGuardGroup($this->aSfGuardGroup);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SfGuardUserGroupPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardUserGroupPeer::doUpdate($this, $con);
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

			if ($this->aSfGuardGroup !== null) {
				if (!$this->aSfGuardGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfGuardGroup->getValidationFailures());
				}
			}


			if (($retval = SfGuardUserGroupPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
				break;
			case 1:
				return $this->getGroupId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserGroupPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getGroupId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserGroupPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setGroupId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserGroupPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setGroupId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardUserGroupPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardUserGroupPeer::USER_ID)) $criteria->add(SfGuardUserGroupPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(SfGuardUserGroupPeer::GROUP_ID)) $criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->group_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardUserGroupPeer::DATABASE_NAME);

		$criteria->add(SfGuardUserGroupPeer::USER_ID, $this->user_id);
		$criteria->add(SfGuardUserGroupPeer::GROUP_ID, $this->group_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getUserId();

		$pks[1] = $this->getGroupId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setUserId($keys[0]);

		$this->setGroupId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
		$copyObj->setGroupId(NULL); 
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
			self::$peer = new SfGuardUserGroupPeer();
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

	
	public function setSfGuardGroup($v)
	{


		if ($v === null) {
			$this->setGroupId(NULL);
		} else {
			$this->setGroupId($v->getId());
		}


		$this->aSfGuardGroup = $v;
	}


	
	public function getSfGuardGroup($con = null)
	{
		if ($this->aSfGuardGroup === null && ($this->group_id !== null)) {
						include_once 'lib/model/om/BaseSfGuardGroupPeer.php';

			$this->aSfGuardGroup = SfGuardGroupPeer::retrieveByPK($this->group_id, $con);

			
		}
		return $this->aSfGuardGroup;
	}

} 