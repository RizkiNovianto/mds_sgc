<?php



class SfGuardGroupPermissionMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SfGuardGroupPermissionMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_group_permission');
		$tMap->setPhpName('SfGuardGroupPermission');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'int' , CreoleTypes::INTEGER, 'sf_guard_group', 'ID', true, null);

		$tMap->addForeignPrimaryKey('PERMISSION_ID', 'PermissionId', 'int' , CreoleTypes::INTEGER, 'sf_guard_permission', 'ID', true, null);

	} 
} 