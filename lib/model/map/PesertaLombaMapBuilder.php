<?php



class PesertaLombaMapBuilder {

	
	const CLASS_NAME = 'lib.model.map.PesertaLombaMapBuilder';

	
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

		$tMap = $this->dbMap->addTable('peserta_lomba');
		$tMap->setPhpName('PesertaLomba');

		$tMap->setUseIdGenerator(true);

		$tMap->addPrimaryKey('ID', 'Id', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addForeignKey('ID_PESERTA', 'IdPeserta', 'int', CreoleTypes::INTEGER, 'peserta', 'ID', true, null);

		$tMap->addForeignKey('ID_LOMBA', 'IdLomba', 'int', CreoleTypes::INTEGER, 'lomba', 'ID', true, null);

		$tMap->addColumn('TAHUN', 'Tahun', 'int', CreoleTypes::INTEGER, true, null);

		$tMap->addColumn('NAMA_TIM', 'NamaTim', 'string', CreoleTypes::VARCHAR, true, 255);

		$tMap->addColumn('NAMA_PENGGERAK_LINGKUNGAN', 'NamaPenggerakLingkungan', 'string', CreoleTypes::VARCHAR, false, 255);

		$tMap->addColumn('TANGGAL_PENDAFTARAN', 'TanggalPendaftaran', 'int', CreoleTypes::TIMESTAMP, true, null);

		$tMap->addColumn('PROGRAM_KERJA', 'ProgramKerja', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CATATAN', 'Catatan', 'string', CreoleTypes::LONGVARCHAR, false, null);

		$tMap->addColumn('CREATED_AT', 'CreatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('UPDATED_AT', 'UpdatedAt', 'int', CreoleTypes::TIMESTAMP, false, null);

		$tMap->addColumn('IS_DELETED', 'IsDeleted', 'int', CreoleTypes::TINYINT, false, null);

	} 
} 