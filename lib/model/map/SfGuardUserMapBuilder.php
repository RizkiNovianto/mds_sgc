<?php



class SfGuardUserMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.SfGuardUserMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('sf_guard_user');
		$tMap->setPhpName('SfGuardUser');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('USERNAME', 'Username', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('ALGORITHM', 'Algorithm', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('SALT', 'Salt', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('PASSWORD', 'Password', 'string', CreoleTypes::VARCHAR, true, 128);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('LAST_LOGIN', 'LastLogin', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_ACTIVE', 'IsActive', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('IS_SUPER_ADMIN', 'IsSuperAdmin', 'int', CreoleTypes::INTEGER, true, null);

	} 
} 