<?php


abstract class BasePesertaLombaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'peserta_lomba';

	
	const CLASS_DEFAULT = 'lib.model.PesertaLomba';

	
	const NUM_COLUMNS = 12;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'peserta_lomba.ID';

	
	const ID_PESERTA = 'peserta_lomba.ID_PESERTA';

	
	const ID_LOMBA = 'peserta_lomba.ID_LOMBA';

	
	const TAHUN = 'peserta_lomba.TAHUN';

	
	const NAMA_TIM = 'peserta_lomba.NAMA_TIM';

	
	const NAMA_PENGGERAK_LINGKUNGAN = 'peserta_lomba.NAMA_PENGGERAK_LINGKUNGAN';

	
	const TANGGAL_PENDAFTARAN = 'peserta_lomba.TANGGAL_PENDAFTARAN';

	
	const PROGRAM_KERJA = 'peserta_lomba.PROGRAM_KERJA';

	
	const CATATAN = 'peserta_lomba.CATATAN';

	
	const CREATED_AT = 'peserta_lomba.CREATED_AT';

	
	const UPDATED_AT = 'peserta_lomba.UPDATED_AT';

	
	const IS_DELETED = 'peserta_lomba.IS_DELETED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdPeserta', 'IdLomba', 'Tahun', 'NamaTim', 'NamaPenggerakLingkungan', 'TanggalPendaftaran', 'ProgramKerja', 'Catatan', 'CreatedAt', 'UpdatedAt', 'IsDeleted', ),
		BasePeer::TYPE_COLNAME => array (PesertaLombaPeer::ID, PesertaLombaPeer::ID_PESERTA, PesertaLombaPeer::ID_LOMBA, PesertaLombaPeer::TAHUN, PesertaLombaPeer::NAMA_TIM, PesertaLombaPeer::NAMA_PENGGERAK_LINGKUNGAN, PesertaLombaPeer::TANGGAL_PENDAFTARAN, PesertaLombaPeer::PROGRAM_KERJA, PesertaLombaPeer::CATATAN, PesertaLombaPeer::CREATED_AT, PesertaLombaPeer::UPDATED_AT, PesertaLombaPeer::IS_DELETED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_peserta', 'id_lomba', 'tahun', 'nama_tim', 'nama_penggerak_lingkungan', 'tanggal_pendaftaran', 'program_kerja', 'catatan', 'created_at', 'updated_at', 'is_deleted', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdPeserta' => 1, 'IdLomba' => 2, 'Tahun' => 3, 'NamaTim' => 4, 'NamaPenggerakLingkungan' => 5, 'TanggalPendaftaran' => 6, 'ProgramKerja' => 7, 'Catatan' => 8, 'CreatedAt' => 9, 'UpdatedAt' => 10, 'IsDeleted' => 11, ),
		BasePeer::TYPE_COLNAME => array (PesertaLombaPeer::ID => 0, PesertaLombaPeer::ID_PESERTA => 1, PesertaLombaPeer::ID_LOMBA => 2, PesertaLombaPeer::TAHUN => 3, PesertaLombaPeer::NAMA_TIM => 4, PesertaLombaPeer::NAMA_PENGGERAK_LINGKUNGAN => 5, PesertaLombaPeer::TANGGAL_PENDAFTARAN => 6, PesertaLombaPeer::PROGRAM_KERJA => 7, PesertaLombaPeer::CATATAN => 8, PesertaLombaPeer::CREATED_AT => 9, PesertaLombaPeer::UPDATED_AT => 10, PesertaLombaPeer::IS_DELETED => 11, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_peserta' => 1, 'id_lomba' => 2, 'tahun' => 3, 'nama_tim' => 4, 'nama_penggerak_lingkungan' => 5, 'tanggal_pendaftaran' => 6, 'program_kerja' => 7, 'catatan' => 8, 'created_at' => 9, 'updated_at' => 10, 'is_deleted' => 11, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PesertaLombaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PesertaLombaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PesertaLombaPeer::getTableMap();
			$columns = $map->getColumns();
			$nameMap = array();
			foreach ($columns as $column) {
				$nameMap[$column->getPhpName()] = $column->getColumnName();
			}
			self::$phpNameMap = $nameMap;
		}
		return self::$phpNameMap;
	}
	
	static public function translateFieldName($name, $fromType, $toType)
	{
		$toNames = self::getFieldNames($toType);
		$key = isset(self::$fieldKeys[$fromType][$name]) ? self::$fieldKeys[$fromType][$name] : null;
		if ($key === null) {
			throw new PropelException("'$name' could not be found in the field names of type '$fromType'. These are: " . print_r(self::$fieldKeys[$fromType], true));
		}
		return $toNames[$key];
	}

	

	static public function getFieldNames($type = BasePeer::TYPE_PHPNAME)
	{
		if (!array_key_exists($type, self::$fieldNames)) {
			throw new PropelException('Method getFieldNames() expects the parameter $type to be one of the class constants TYPE_PHPNAME, TYPE_COLNAME, TYPE_FIELDNAME, TYPE_NUM. ' . $type . ' was given.');
		}
		return self::$fieldNames[$type];
	}

	
	public static function alias($alias, $column)
	{
		return str_replace(PesertaLombaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PesertaLombaPeer::ID);

		$criteria->addSelectColumn(PesertaLombaPeer::ID_PESERTA);

		$criteria->addSelectColumn(PesertaLombaPeer::ID_LOMBA);

		$criteria->addSelectColumn(PesertaLombaPeer::TAHUN);

		$criteria->addSelectColumn(PesertaLombaPeer::NAMA_TIM);

		$criteria->addSelectColumn(PesertaLombaPeer::NAMA_PENGGERAK_LINGKUNGAN);

		$criteria->addSelectColumn(PesertaLombaPeer::TANGGAL_PENDAFTARAN);

		$criteria->addSelectColumn(PesertaLombaPeer::PROGRAM_KERJA);

		$criteria->addSelectColumn(PesertaLombaPeer::CATATAN);

		$criteria->addSelectColumn(PesertaLombaPeer::CREATED_AT);

		$criteria->addSelectColumn(PesertaLombaPeer::UPDATED_AT);

		$criteria->addSelectColumn(PesertaLombaPeer::IS_DELETED);

	}

	const COUNT = 'COUNT(peserta_lomba.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT peserta_lomba.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PesertaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}
	
	public static function doSelectOne(Criteria $criteria, $con = null)
	{
		$critcopy = clone $criteria;
		$critcopy->setLimit(1);
		$objects = PesertaLombaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PesertaLombaPeer::populateObjects(PesertaLombaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PesertaLombaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PesertaLombaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinPeserta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaLombaPeer::ID_PESERTA, PesertaPeer::ID);

		$rs = PesertaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinLomba(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaLombaPeer::ID_LOMBA, LombaPeer::ID);

		$rs = PesertaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPeserta(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PesertaLombaPeer::addSelectColumns($c);
		$startcol = (PesertaLombaPeer::NUM_COLUMNS - PesertaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PesertaPeer::addSelectColumns($c);

		$c->addJoin(PesertaLombaPeer::ID_PESERTA, PesertaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaLombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PesertaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPeserta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPesertaLomba($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPesertaLombas();
				$obj2->addPesertaLomba($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinLomba(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PesertaLombaPeer::addSelectColumns($c);
		$startcol = (PesertaLombaPeer::NUM_COLUMNS - PesertaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		LombaPeer::addSelectColumns($c);

		$c->addJoin(PesertaLombaPeer::ID_LOMBA, LombaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaLombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getLomba(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPesertaLomba($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPesertaLombas();
				$obj2->addPesertaLomba($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaLombaPeer::ID_PESERTA, PesertaPeer::ID);

		$criteria->addJoin(PesertaLombaPeer::ID_LOMBA, LombaPeer::ID);

		$rs = PesertaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAll(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PesertaLombaPeer::addSelectColumns($c);
		$startcol2 = (PesertaLombaPeer::NUM_COLUMNS - PesertaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PesertaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PesertaPeer::NUM_COLUMNS;

		LombaPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + LombaPeer::NUM_COLUMNS;

		$c->addJoin(PesertaLombaPeer::ID_PESERTA, PesertaPeer::ID);

		$c->addJoin(PesertaLombaPeer::ID_LOMBA, LombaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaLombaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = PesertaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPeserta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPesertaLomba($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPesertaLombas();
				$obj2->addPesertaLomba($obj1);
			}


					
			$omClass = LombaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getLomba(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPesertaLomba($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initPesertaLombas();
				$obj3->addPesertaLomba($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptPeserta(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaLombaPeer::ID_LOMBA, LombaPeer::ID);

		$rs = PesertaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptLomba(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaLombaPeer::ID_PESERTA, PesertaPeer::ID);

		$rs = PesertaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptPeserta(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PesertaLombaPeer::addSelectColumns($c);
		$startcol2 = (PesertaLombaPeer::NUM_COLUMNS - PesertaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		LombaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + LombaPeer::NUM_COLUMNS;

		$c->addJoin(PesertaLombaPeer::ID_LOMBA, LombaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaLombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = LombaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getLomba(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPesertaLomba($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPesertaLombas();
				$obj2->addPesertaLomba($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptLomba(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PesertaLombaPeer::addSelectColumns($c);
		$startcol2 = (PesertaLombaPeer::NUM_COLUMNS - PesertaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PesertaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PesertaPeer::NUM_COLUMNS;

		$c->addJoin(PesertaLombaPeer::ID_PESERTA, PesertaPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaLombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PesertaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPeserta(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPesertaLomba($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPesertaLombas();
				$obj2->addPesertaLomba($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}

	
	public static function getTableMap()
	{
		return Propel::getDatabaseMap(self::DATABASE_NAME)->getTable(self::TABLE_NAME);
	}

	
	public static function getOMClass()
	{
		return PesertaLombaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PesertaLombaPeer::ID); 

				$criteria->setDbName(self::DATABASE_NAME);

		try {
									$con->begin();
			$pk = BasePeer::doInsert($criteria, $con);
			$con->commit();
		} catch(PropelException $e) {
			$con->rollback();
			throw $e;
		}

		return $pk;
	}

	
	public static function doUpdate($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$selectCriteria = new Criteria(self::DATABASE_NAME);

		if ($values instanceof Criteria) {
			$criteria = clone $values; 
			$comparison = $criteria->getComparison(PesertaLombaPeer::ID);
			$selectCriteria->add(PesertaLombaPeer::ID, $criteria->remove(PesertaLombaPeer::ID), $comparison);

		} else { 			$criteria = $values->buildCriteria(); 			$selectCriteria = $values->buildPkeyCriteria(); 		}

				$criteria->setDbName(self::DATABASE_NAME);

		return BasePeer::doUpdate($selectCriteria, $criteria, $con);
	}

	
	public static function doDeleteAll($con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$affectedRows = 0; 		try {
									$con->begin();
			$affectedRows += PesertaLombaPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(PesertaLombaPeer::TABLE_NAME, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	 public static function doDelete($values, $con = null)
	 {
		if ($con === null) {
			$con = Propel::getConnection(PesertaLombaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof PesertaLomba) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PesertaLombaPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += PesertaLombaPeer::doOnDeleteCascade($criteria, $con);
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	protected static function doOnDeleteCascade(Criteria $criteria, Connection $con)
	{
				$affectedRows = 0;

				$objects = PesertaLombaPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/AnggotaLomba.php';

						$c = new Criteria();
			
			$c->add(AnggotaLombaPeer::ID_PESERTA_LOMBA, $obj->getId());
			$affectedRows += AnggotaLombaPeer::doDelete($c, $con);

			include_once 'lib/model/DataLomba.php';

						$c = new Criteria();
			
			$c->add(DataLombaPeer::ID_PESERTA_LOMBA, $obj->getId());
			$affectedRows += DataLombaPeer::doDelete($c, $con);

			include_once 'lib/model/Prestasi.php';

						$c = new Criteria();
			
			$c->add(PrestasiPeer::ID_PESERTA_LOMBA, $obj->getId());
			$affectedRows += PrestasiPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(PesertaLomba $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PesertaLombaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PesertaLombaPeer::TABLE_NAME);

			if (! is_array($cols)) {
				$cols = array($cols);
			}

			foreach($cols as $colName) {
				if ($tableMap->containsColumn($colName)) {
					$get = 'get' . $tableMap->getColumn($colName)->getPhpName();
					$columns[$colName] = $obj->$get();
				}
			}
		} else {

		}

		$res =  BasePeer::doValidate(PesertaLombaPeer::DATABASE_NAME, PesertaLombaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PesertaLombaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK($pk, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$criteria = new Criteria(PesertaLombaPeer::DATABASE_NAME);

		$criteria->add(PesertaLombaPeer::ID, $pk);


		$v = PesertaLombaPeer::doSelect($criteria, $con);

		return !empty($v) > 0 ? $v[0] : null;
	}

	
	public static function retrieveByPKs($pks, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		$objs = null;
		if (empty($pks)) {
			$objs = array();
		} else {
			$criteria = new Criteria();
			$criteria->add(PesertaLombaPeer::ID, $pks, Criteria::IN);
			$objs = PesertaLombaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePesertaLombaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PesertaLombaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PesertaLombaMapBuilder');
}
