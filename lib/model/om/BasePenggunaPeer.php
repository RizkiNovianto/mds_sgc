<?php


abstract class BasePenggunaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'pengguna';

	
	const CLASS_DEFAULT = 'lib.model.Pengguna';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'pengguna.ID';

	
	const ID_WILAYAH = 'pengguna.ID_WILAYAH';

	
	const ID_SFGUARDUSER = 'pengguna.ID_SFGUARDUSER';

	
	const NAMA = 'pengguna.NAMA';

	
	const NO_TELP = 'pengguna.NO_TELP';

	
	const FILE_FOTO = 'pengguna.FILE_FOTO';

	
	const FILENAME_BARU = 'pengguna.FILENAME_BARU';

	
	const KETERANGAN = 'pengguna.KETERANGAN';

	
	const CREATED_AT = 'pengguna.CREATED_AT';

	
	const UPDATED_AT = 'pengguna.UPDATED_AT';

	
	const IS_DELETED = 'pengguna.IS_DELETED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdWilayah', 'IdSfguarduser', 'Nama', 'NoTelp', 'FileFoto', 'FilenameBaru', 'Keterangan', 'CreatedAt', 'UpdatedAt', 'IsDeleted', ),
		BasePeer::TYPE_COLNAME => array (PenggunaPeer::ID, PenggunaPeer::ID_WILAYAH, PenggunaPeer::ID_SFGUARDUSER, PenggunaPeer::NAMA, PenggunaPeer::NO_TELP, PenggunaPeer::FILE_FOTO, PenggunaPeer::FILENAME_BARU, PenggunaPeer::KETERANGAN, PenggunaPeer::CREATED_AT, PenggunaPeer::UPDATED_AT, PenggunaPeer::IS_DELETED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_wilayah', 'id_sfGuardUser', 'nama', 'no_telp', 'file_foto', 'filename_baru', 'keterangan', 'created_at', 'updated_at', 'is_deleted', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdWilayah' => 1, 'IdSfguarduser' => 2, 'Nama' => 3, 'NoTelp' => 4, 'FileFoto' => 5, 'FilenameBaru' => 6, 'Keterangan' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, 'IsDeleted' => 10, ),
		BasePeer::TYPE_COLNAME => array (PenggunaPeer::ID => 0, PenggunaPeer::ID_WILAYAH => 1, PenggunaPeer::ID_SFGUARDUSER => 2, PenggunaPeer::NAMA => 3, PenggunaPeer::NO_TELP => 4, PenggunaPeer::FILE_FOTO => 5, PenggunaPeer::FILENAME_BARU => 6, PenggunaPeer::KETERANGAN => 7, PenggunaPeer::CREATED_AT => 8, PenggunaPeer::UPDATED_AT => 9, PenggunaPeer::IS_DELETED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_wilayah' => 1, 'id_sfGuardUser' => 2, 'nama' => 3, 'no_telp' => 4, 'file_foto' => 5, 'filename_baru' => 6, 'keterangan' => 7, 'created_at' => 8, 'updated_at' => 9, 'is_deleted' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PenggunaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PenggunaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PenggunaPeer::getTableMap();
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
		return str_replace(PenggunaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PenggunaPeer::ID);

		$criteria->addSelectColumn(PenggunaPeer::ID_WILAYAH);

		$criteria->addSelectColumn(PenggunaPeer::ID_SFGUARDUSER);

		$criteria->addSelectColumn(PenggunaPeer::NAMA);

		$criteria->addSelectColumn(PenggunaPeer::NO_TELP);

		$criteria->addSelectColumn(PenggunaPeer::FILE_FOTO);

		$criteria->addSelectColumn(PenggunaPeer::FILENAME_BARU);

		$criteria->addSelectColumn(PenggunaPeer::KETERANGAN);

		$criteria->addSelectColumn(PenggunaPeer::CREATED_AT);

		$criteria->addSelectColumn(PenggunaPeer::UPDATED_AT);

		$criteria->addSelectColumn(PenggunaPeer::IS_DELETED);

	}

	const COUNT = 'COUNT(pengguna.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT pengguna.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenggunaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenggunaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PenggunaPeer::doSelectRS($criteria, $con);
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
		$objects = PenggunaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PenggunaPeer::populateObjects(PenggunaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PenggunaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PenggunaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinWilayah(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenggunaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenggunaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenggunaPeer::ID_WILAYAH, WilayahPeer::ID);

		$rs = PenggunaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenggunaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenggunaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenggunaPeer::ID_SFGUARDUSER, SfGuardUserPeer::ID);

		$rs = PenggunaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinWilayah(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenggunaPeer::addSelectColumns($c);
		$startcol = (PenggunaPeer::NUM_COLUMNS - PenggunaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		WilayahPeer::addSelectColumns($c);

		$c->addJoin(PenggunaPeer::ID_WILAYAH, WilayahPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenggunaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = WilayahPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getWilayah(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPengguna($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPenggunas();
				$obj2->addPengguna($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenggunaPeer::addSelectColumns($c);
		$startcol = (PenggunaPeer::NUM_COLUMNS - PenggunaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(PenggunaPeer::ID_SFGUARDUSER, SfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenggunaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SfGuardUserPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addPengguna($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPenggunas();
				$obj2->addPengguna($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenggunaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenggunaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenggunaPeer::ID_WILAYAH, WilayahPeer::ID);

		$criteria->addJoin(PenggunaPeer::ID_SFGUARDUSER, SfGuardUserPeer::ID);

		$rs = PenggunaPeer::doSelectRS($criteria, $con);
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

		PenggunaPeer::addSelectColumns($c);
		$startcol2 = (PenggunaPeer::NUM_COLUMNS - PenggunaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		WilayahPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + WilayahPeer::NUM_COLUMNS;

		SfGuardUserPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(PenggunaPeer::ID_WILAYAH, WilayahPeer::ID);

		$c->addJoin(PenggunaPeer::ID_SFGUARDUSER, SfGuardUserPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenggunaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = WilayahPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getWilayah(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPengguna($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPenggunas();
				$obj2->addPengguna($obj1);
			}


					
			$omClass = SfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSfGuardUser(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addPengguna($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initPenggunas();
				$obj3->addPengguna($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptWilayah(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenggunaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenggunaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenggunaPeer::ID_SFGUARDUSER, SfGuardUserPeer::ID);

		$rs = PenggunaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PenggunaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PenggunaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PenggunaPeer::ID_WILAYAH, WilayahPeer::ID);

		$rs = PenggunaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptWilayah(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenggunaPeer::addSelectColumns($c);
		$startcol2 = (PenggunaPeer::NUM_COLUMNS - PenggunaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(PenggunaPeer::ID_SFGUARDUSER, SfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenggunaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPengguna($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPenggunas();
				$obj2->addPengguna($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		PenggunaPeer::addSelectColumns($c);
		$startcol2 = (PenggunaPeer::NUM_COLUMNS - PenggunaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		WilayahPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + WilayahPeer::NUM_COLUMNS;

		$c->addJoin(PenggunaPeer::ID_WILAYAH, WilayahPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PenggunaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = WilayahPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getWilayah(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addPengguna($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initPenggunas();
				$obj2->addPengguna($obj1);
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
		return PenggunaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PenggunaPeer::ID); 

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
			$comparison = $criteria->getComparison(PenggunaPeer::ID);
			$selectCriteria->add(PenggunaPeer::ID, $criteria->remove(PenggunaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(PenggunaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PenggunaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Pengguna) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PenggunaPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			
			$affectedRows += BasePeer::doDelete($criteria, $con);
			$con->commit();
			return $affectedRows;
		} catch (PropelException $e) {
			$con->rollback();
			throw $e;
		}
	}

	
	public static function doValidate(Pengguna $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PenggunaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PenggunaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PenggunaPeer::DATABASE_NAME, PenggunaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PenggunaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PenggunaPeer::DATABASE_NAME);

		$criteria->add(PenggunaPeer::ID, $pk);


		$v = PenggunaPeer::doSelect($criteria, $con);

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
			$criteria->add(PenggunaPeer::ID, $pks, Criteria::IN);
			$objs = PenggunaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePenggunaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PenggunaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PenggunaMapBuilder');
}
