<?php


abstract class BaseSfGuardGroupPermission extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $group_id;


	
	protected $permission_id;

	
	protected $aSfGuardGroup;

	
	protected $aSfGuardPermission;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getGroupId()
	{

		return $this->group_id;
	}

	
	public function getPermissionId()
	{

		return $this->permission_id;
	}

	
	public function setGroupId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->group_id !== $v) {
			$this->group_id = $v;
			$this->modifiedColumns[] = SfGuardGroupPermissionPeer::GROUP_ID;
		}

		if ($this->aSfGuardGroup !== null && $this->aSfGuardGroup->getId() !== $v) {
			$this->aSfGuardGroup = null;
		}

	} 
	
	public function setPermissionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->permission_id !== $v) {
			$this->permission_id = $v;
			$this->modifiedColumns[] = SfGuardGroupPermissionPeer::PERMISSION_ID;
		}

		if ($this->aSfGuardPermission !== null && $this->aSfGuardPermission->getId() !== $v) {
			$this->aSfGuardPermission = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->group_id = $rs->getInt($startcol + 0);

			$this->permission_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardGroupPermission object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardGroupPermissionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardGroupPermissionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SfGuardGroupPermissionPeer::DATABASE_NAME);
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


												
			if ($this->aSfGuardGroup !== null) {
				if ($this->aSfGuardGroup->isModified()) {
					$affectedRows += $this->aSfGuardGroup->save($con);
				}
				$this->setSfGuardGroup($this->aSfGuardGroup);
			}

			if ($this->aSfGuardPermission !== null) {
				if ($this->aSfGuardPermission->isModified()) {
					$affectedRows += $this->aSfGuardPermission->save($con);
				}
				$this->setSfGuardPermission($this->aSfGuardPermission);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SfGuardGroupPermissionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardGroupPermissionPeer::doUpdate($this, $con);
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


												
			if ($this->aSfGuardGroup !== null) {
				if (!$this->aSfGuardGroup->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfGuardGroup->getValidationFailures());
				}
			}

			if ($this->aSfGuardPermission !== null) {
				if (!$this->aSfGuardPermission->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfGuardPermission->getValidationFailures());
				}
			}


			if (($retval = SfGuardGroupPermissionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardGroupPermissionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getGroupId();
				break;
			case 1:
				return $this->getPermissionId();
				break;
			default:
				return null;
				break;
		} 	}

	
	public function toArray($keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardGroupPermissionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getGroupId(),
			$keys[1] => $this->getPermissionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardGroupPermissionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setGroupId($value);
				break;
			case 1:
				$this->setPermissionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardGroupPermissionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setGroupId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPermissionId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardGroupPermissionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardGroupPermissionPeer::GROUP_ID)) $criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->group_id);
		if ($this->isColumnModified(SfGuardGroupPermissionPeer::PERMISSION_ID)) $criteria->add(SfGuardGroupPermissionPeer::PERMISSION_ID, $this->permission_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardGroupPermissionPeer::DATABASE_NAME);

		$criteria->add(SfGuardGroupPermissionPeer::GROUP_ID, $this->group_id);
		$criteria->add(SfGuardGroupPermissionPeer::PERMISSION_ID, $this->permission_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getGroupId();

		$pks[1] = $this->getPermissionId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setGroupId($keys[0]);

		$this->setPermissionId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setGroupId(NULL); 
		$copyObj->setPermissionId(NULL); 
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
			self::$peer = new SfGuardGroupPermissionPeer();
		}
		return self::$peer;
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

	
	public function setSfGuardPermission($v)
	{


		if ($v === null) {
			$this->setPermissionId(NULL);
		} else {
			$this->setPermissionId($v->getId());
		}


		$this->aSfGuardPermission = $v;
	}


	
	public function getSfGuardPermission($con = null)
	{
		if ($this->aSfGuardPermission === null && ($this->permission_id !== null)) {
						include_once 'lib/model/om/BaseSfGuardPermissionPeer.php';

			$this->aSfGuardPermission = SfGuardPermissionPeer::retrieveByPK($this->permission_id, $con);

			
		}
		return $this->aSfGuardPermission;
	}

} 