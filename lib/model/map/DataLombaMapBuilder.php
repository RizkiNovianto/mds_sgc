<?php



class DataLombaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.DataLombaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('data_lomba');
		$tMap->setPhpName('DataLomba');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_PESERTA_LOMBA', 'IdPesertaLomba', 'int', CreoleTypes::INTEGER, 'peserta_lomba', 'ID', true, null);

		$tMap->addColumn('FILE_FOTO_PESERTA', 'FileFotoPeserta', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('FILENAME_BARU', 'FilenameBaru', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('KETERANGAN', 'Keterangan', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_DELETED', 'IsDeleted', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 