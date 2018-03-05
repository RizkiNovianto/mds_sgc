<?php


abstract class BaseAnggotaLombaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'anggota_lomba';

	
	const CLASS_DEFAULT = 'lib.model.AnggotaLomba';

	
	const NUM_COLUMNS = 11;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'anggota_lomba.ID';

	
	const ID_PESERTA_LOMBA = 'anggota_lomba.ID_PESERTA_LOMBA';

	
	const NAMA = 'anggota_lomba.NAMA';

	
	const USIA = 'anggota_lomba.USIA';

	
	const ALAMAT = 'anggota_lomba.ALAMAT';

	
	const NO_TELP = 'anggota_lomba.NO_TELP';

	
	const FILE_FOTO = 'anggota_lomba.FILE_FOTO';

	
	const FILENAME_BARU = 'anggota_lomba.FILENAME_BARU';

	
	const CREATED_AT = 'anggota_lomba.CREATED_AT';

	
	const UPDATED_AT = 'anggota_lomba.UPDATED_AT';

	
	const IS_DELETED = 'anggota_lomba.IS_DELETED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdPesertaLomba', 'Nama', 'Usia', 'Alamat', 'NoTelp', 'FileFoto', 'FilenameBaru', 'CreatedAt', 'UpdatedAt', 'IsDeleted', ),
		BasePeer::TYPE_COLNAME => array (AnggotaLombaPeer::ID, AnggotaLombaPeer::ID_PESERTA_LOMBA, AnggotaLombaPeer::NAMA, AnggotaLombaPeer::USIA, AnggotaLombaPeer::ALAMAT, AnggotaLombaPeer::NO_TELP, AnggotaLombaPeer::FILE_FOTO, AnggotaLombaPeer::FILENAME_BARU, AnggotaLombaPeer::CREATED_AT, AnggotaLombaPeer::UPDATED_AT, AnggotaLombaPeer::IS_DELETED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_peserta_lomba', 'nama', 'usia', 'alamat', 'no_telp', 'file_foto', 'filename_baru', 'created_at', 'updated_at', 'is_deleted', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdPesertaLomba' => 1, 'Nama' => 2, 'Usia' => 3, 'Alamat' => 4, 'NoTelp' => 5, 'FileFoto' => 6, 'FilenameBaru' => 7, 'CreatedAt' => 8, 'UpdatedAt' => 9, 'IsDeleted' => 10, ),
		BasePeer::TYPE_COLNAME => array (AnggotaLombaPeer::ID => 0, AnggotaLombaPeer::ID_PESERTA_LOMBA => 1, AnggotaLombaPeer::NAMA => 2, AnggotaLombaPeer::USIA => 3, AnggotaLombaPeer::ALAMAT => 4, AnggotaLombaPeer::NO_TELP => 5, AnggotaLombaPeer::FILE_FOTO => 6, AnggotaLombaPeer::FILENAME_BARU => 7, AnggotaLombaPeer::CREATED_AT => 8, AnggotaLombaPeer::UPDATED_AT => 9, AnggotaLombaPeer::IS_DELETED => 10, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_peserta_lomba' => 1, 'nama' => 2, 'usia' => 3, 'alamat' => 4, 'no_telp' => 5, 'file_foto' => 6, 'filename_baru' => 7, 'created_at' => 8, 'updated_at' => 9, 'is_deleted' => 10, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/AnggotaLombaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.AnggotaLombaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = AnggotaLombaPeer::getTableMap();
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
		return str_replace(AnggotaLombaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(AnggotaLombaPeer::ID);

		$criteria->addSelectColumn(AnggotaLombaPeer::ID_PESERTA_LOMBA);

		$criteria->addSelectColumn(AnggotaLombaPeer::NAMA);

		$criteria->addSelectColumn(AnggotaLombaPeer::USIA);

		$criteria->addSelectColumn(AnggotaLombaPeer::ALAMAT);

		$criteria->addSelectColumn(AnggotaLombaPeer::NO_TELP);

		$criteria->addSelectColumn(AnggotaLombaPeer::FILE_FOTO);

		$criteria->addSelectColumn(AnggotaLombaPeer::FILENAME_BARU);

		$criteria->addSelectColumn(AnggotaLombaPeer::CREATED_AT);

		$criteria->addSelectColumn(AnggotaLombaPeer::UPDATED_AT);

		$criteria->addSelectColumn(AnggotaLombaPeer::IS_DELETED);

	}

	const COUNT = 'COUNT(anggota_lomba.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT anggota_lomba.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AnggotaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AnggotaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = AnggotaLombaPeer::doSelectRS($criteria, $con);
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
		$objects = AnggotaLombaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return AnggotaLombaPeer::populateObjects(AnggotaLombaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			AnggotaLombaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = AnggotaLombaPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinPesertaLomba(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AnggotaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AnggotaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AnggotaLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);

		$rs = AnggotaLombaPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinPesertaLomba(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		AnggotaLombaPeer::addSelectColumns($c);
		$startcol = (AnggotaLombaPeer::NUM_COLUMNS - AnggotaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PesertaLombaPeer::addSelectColumns($c);

		$c->addJoin(AnggotaLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AnggotaLombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = PesertaLombaPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getPesertaLomba(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addAnggotaLomba($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initAnggotaLombas();
				$obj2->addAnggotaLomba($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(AnggotaLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(AnggotaLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(AnggotaLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);

		$rs = AnggotaLombaPeer::doSelectRS($criteria, $con);
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

		AnggotaLombaPeer::addSelectColumns($c);
		$startcol2 = (AnggotaLombaPeer::NUM_COLUMNS - AnggotaLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PesertaLombaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PesertaLombaPeer::NUM_COLUMNS;

		$c->addJoin(AnggotaLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = AnggotaLombaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = PesertaLombaPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getPesertaLomba(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addAnggotaLomba($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initAnggotaLombas();
				$obj2->addAnggotaLomba($obj1);
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
		return AnggotaLombaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(AnggotaLombaPeer::ID); 

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
			$comparison = $criteria->getComparison(AnggotaLombaPeer::ID);
			$selectCriteria->add(AnggotaLombaPeer::ID, $criteria->remove(AnggotaLombaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(AnggotaLombaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(AnggotaLombaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof AnggotaLomba) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(AnggotaLombaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(AnggotaLomba $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(AnggotaLombaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(AnggotaLombaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(AnggotaLombaPeer::DATABASE_NAME, AnggotaLombaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = AnggotaLombaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(AnggotaLombaPeer::DATABASE_NAME);

		$criteria->add(AnggotaLombaPeer::ID, $pk);


		$v = AnggotaLombaPeer::doSelect($criteria, $con);

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
			$criteria->add(AnggotaLombaPeer::ID, $pks, Criteria::IN);
			$objs = AnggotaLombaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseAnggotaLombaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/AnggotaLombaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.AnggotaLombaMapBuilder');
}
