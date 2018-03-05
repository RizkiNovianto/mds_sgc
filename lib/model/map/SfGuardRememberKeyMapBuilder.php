<?php



class SfGuardRememberKeyMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SfGuardRememberKeyMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_remember_key');
		$tMap->setPhpName('SfGuardRememberKey');

		$tMap->setUseIdGenerator(false);

		$tMap->addForeignPrimaryKey('USER_ID', 'UserId', 'int' , CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('REMEMBER_KEY', 'RememberKey', 'string', CreoleTypes::VARCHAR, false, 32);

		$tMap->addPrimaryKey('IP_ADDRESS', 'IpAddress', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 