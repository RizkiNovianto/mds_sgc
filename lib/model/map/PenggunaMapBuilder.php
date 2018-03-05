<?php



class PenggunaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PenggunaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('pengguna');
		$tMap->setPhpName('Pengguna');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_WILAYAH', 'IdWilayah', 'int', CreoleTypes::INTEGER, 'wilayah', 'ID', true, null);

		$tMap->addForeignKey('ID_SFGUARDUSER', 'IdSfguarduser', 'int', CreoleTypes::INTEGER, 'sf_guard_user', 'ID', true, null);

		$tMap->addColumn('NAMA', 'Nama', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NO_TELP', 'NoTelp', 'string', CreoleTypes::VARCHAR, false, 13);

		$tMap->addColumn('FILE_FOTO', 'FileFoto', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('FILENAME_BARU', 'FilenameBaru', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('KETERANGAN', 'Keterangan', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_DELETED', 'IsDeleted', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 