<?php



class SfGuardUserGroupMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SfGuardUserGroupMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_user_group');
		$tMap->setPhpName('SfGuardUserGroup');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addForeignPrimaryKey('GROUP_ID', 'GroupId', 'int' , CreoleTypes::INTEGER, 'sf_guard_group', 'ID', true, null);

	} 
} 