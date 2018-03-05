<?php


abstract class BaseSfGuardUserPermission extends BaseObject  implements Persistent {


	
	protected static $peer;


	
	protected $user_id;


	
	protected $permission_id;

	
	protected $aSfGuardUser;

	
	protected $aSfGuardPermission;

	
	protected $alreadyInSave = false;

	
	protected $alreadyInValidation = false;

	
	public function getUserId()
	{

		return $this->user_id;
	}

	
	public function getPermissionId()
	{

		return $this->permission_id;
	}

	
	public function setUserId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->user_id !== $v) {
			$this->user_id = $v;
			$this->modifiedColumns[] = SfGuardUserPermissionPeer::USER_ID;
		}

		if ($this->aSfGuardUser !== null && $this->aSfGuardUser->getId() !== $v) {
			$this->aSfGuardUser = null;
		}

	} 
	
	public function setPermissionId($v)
	{

						if ($v !== null && !is_int($v) && is_numeric($v)) {
			$v = (int) $v;
		}

		if ($this->permission_id !== $v) {
			$this->permission_id = $v;
			$this->modifiedColumns[] = SfGuardUserPermissionPeer::PERMISSION_ID;
		}

		if ($this->aSfGuardPermission !== null && $this->aSfGuardPermission->getId() !== $v) {
			$this->aSfGuardPermission = null;
		}

	} 
	
	public function hydrate(ResultSet $rs, $startcol = 1)
	{
		try {

			$this->user_id = $rs->getInt($startcol + 0);

			$this->permission_id = $rs->getInt($startcol + 1);

			$this->resetModified();

			$this->setNew(false);

						return $startcol + 2; 
		} catch (Exception $e) {
			throw new PropelException("Error populating SfGuardUserPermission object", $e);
		}
	}

	
	public function delete($con = null)
	{
		if ($this->isDeleted()) {
			throw new PropelException("This object has already been deleted.");
		}

		if ($con === null) {
			$con = Propel::getConnection(SfGuardUserPermissionPeer::DATABASE_NAME);
		}

		try {
			$con->begin();
			SfGuardUserPermissionPeer::doDelete($this, $con);
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
			$con = Propel::getConnection(SfGuardUserPermissionPeer::DATABASE_NAME);
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

			if ($this->aSfGuardPermission !== null) {
				if ($this->aSfGuardPermission->isModified()) {
					$affectedRows += $this->aSfGuardPermission->save($con);
				}
				$this->setSfGuardPermission($this->aSfGuardPermission);
			}


						if ($this->isModified()) {
				if ($this->isNew()) {
					$pk = SfGuardUserPermissionPeer::doInsert($this, $con);
					$affectedRows += 1; 										 										 
					$this->setNew(false);
				} else {
					$affectedRows += SfGuardUserPermissionPeer::doUpdate($this, $con);
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

			if ($this->aSfGuardPermission !== null) {
				if (!$this->aSfGuardPermission->validate($columns)) {
					$failureMap = array_merge($failureMap, $this->aSfGuardPermission->getValidationFailures());
				}
			}


			if (($retval = SfGuardUserPermissionPeer::doValidate($this, $columns)) !== true) {
				$failureMap = array_merge($failureMap, $retval);
			}



			$this->alreadyInValidation = false;
		}

		return (!empty($failureMap) ? $failureMap : true);
	}

	
	public function getByName($name, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserPermissionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->getByPosition($pos);
	}

	
	public function getByPosition($pos)
	{
		switch($pos) {
			case 0:
				return $this->getUserId();
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
		$keys = SfGuardUserPermissionPeer::getFieldNames($keyType);
		$result = array(
			$keys[0] => $this->getUserId(),
			$keys[1] => $this->getPermissionId(),
		);
		return $result;
	}

	
	public function setByName($name, $value, $type = BasePeer::TYPE_PHPNAME)
	{
		$pos = SfGuardUserPermissionPeer::translateFieldName($name, $type, BasePeer::TYPE_NUM);
		return $this->setByPosition($pos, $value);
	}

	
	public function setByPosition($pos, $value)
	{
		switch($pos) {
			case 0:
				$this->setUserId($value);
				break;
			case 1:
				$this->setPermissionId($value);
				break;
		} 	}

	
	public function fromArray($arr, $keyType = BasePeer::TYPE_PHPNAME)
	{
		$keys = SfGuardUserPermissionPeer::getFieldNames($keyType);

		if (array_key_exists($keys[0], $arr)) $this->setUserId($arr[$keys[0]]);
		if (array_key_exists($keys[1], $arr)) $this->setPermissionId($arr[$keys[1]]);
	}

	
	public function buildCriteria()
	{
		$criteria = new Criteria(SfGuardUserPermissionPeer::DATABASE_NAME);

		if ($this->isColumnModified(SfGuardUserPermissionPeer::USER_ID)) $criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->user_id);
		if ($this->isColumnModified(SfGuardUserPermissionPeer::PERMISSION_ID)) $criteria->add(SfGuardUserPermissionPeer::PERMISSION_ID, $this->permission_id);

		return $criteria;
	}

	
	public function buildPkeyCriteria()
	{
		$criteria = new Criteria(SfGuardUserPermissionPeer::DATABASE_NAME);

		$criteria->add(SfGuardUserPermissionPeer::USER_ID, $this->user_id);
		$criteria->add(SfGuardUserPermissionPeer::PERMISSION_ID, $this->permission_id);

		return $criteria;
	}

	
	public function getPrimaryKey()
	{
		$pks = array();

		$pks[0] = $this->getUserId();

		$pks[1] = $this->getPermissionId();

		return $pks;
	}

	
	public function setPrimaryKey($keys)
	{

		$this->setUserId($keys[0]);

		$this->setPermissionId($keys[1]);

	}

	
	public function copyInto($copyObj, $deepCopy = false)
	{


		$copyObj->setNew(true);

		$copyObj->setUserId(NULL); 
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
			self::$peer = new SfGuardUserPermissionPeer();
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