<?php



class SfGuardUserPermissionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SfGuardUserPermissionMapBuilder';

	
	private $dbMap;

	
	public function isBuilt()
	{
		return ($this->dbMap !== null);
	}

	
	public function getDatabaseMap()
	{
		return $this->dbMap;
	}

	
	public function doBuild()
	{
		$this->dbMap = Propel::getDatabaseMap('propel');

		$tMap = $this->dbMap->addTable('sf_guard_user_permission');
		$tMap->setPhpName('SfGuardUserPermission');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignPrimaryKey('PERMISSION_ID', 'PermissionId', 'int' , CreoleTypes::INTEGER, 'sf_guard_permission', 'ID', true, null);

	} 
} 