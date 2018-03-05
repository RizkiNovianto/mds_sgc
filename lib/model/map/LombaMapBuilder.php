<?php



class LombaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.LombaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('lomba');
		$tMap->setPhpName('Lomba');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('TINGKAT', 'Tingkat', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('KATEGORI', 'Kategori', 'string', CreoleTypes::VARCHAR, true, 50);

		$tMap->addColumn('DESKRIPSI', 'Deskripsi', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_DELETED', 'IsDeleted', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 