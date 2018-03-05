<?php



class PesertaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PesertaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('peserta');
		$tMap->setPhpName('Peserta');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_WILAYAH', 'IdWilayah', 'int', CreoleTypes::INTEGER, 'wilayah', 'ID', true, null);

		$tMap->addColumn('RT', 'Rt', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('RW', 'Rw', 'string', CreoleTypes::VARCHAR, true, 10);

		$tMap->addColumn('KETUA_RT', 'KetuaRt', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('KETUA_RW', 'KetuaRw', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_DELETED', 'IsDeleted', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 