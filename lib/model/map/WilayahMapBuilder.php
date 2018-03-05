<?php



class WilayahMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.WilayahMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('wilayah');
		$tMap->setPhpName('Wilayah');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('WILAYAH', 'Wilayah', 'string', CreoleTypes::VARCHAR, true, 20);

		$tMap->addColumn('KECAMATAN', 'Kecamatan', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('KELURAHAN', 'Kelurahan', 'string', CreoleTypes::VARCHAR, true, 25);

		$tMap->addColumn('NAMA_LURAH', 'NamaLurah', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

	} 
} 