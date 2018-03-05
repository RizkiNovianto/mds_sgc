<?php


abstract class BaseDataLombaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'data_lomba';

	
	const CLASS_DEFAULT = 'lib.model.DataLomba';

	
	const NUM_COLUMNS = 8;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'data_lomba.ID';

	
	const ID_PESERTA_LOMBA = 'data_lomba.ID_PESERTA_LOMBA';

	
	const FILE_FOTO_PESERTA = 'data_lomba.FILE_FOTO_PESERTA';

	
	const FILENAME_BARU = 'data_lomba.FILENAME_BARU';

	
	const KETERANGAN = 'data_lomba.KETERANGAN';

	
	const CREATED_AT = 'data_lomba.CREATED_AT';

	
	const UPDATED_AT = 'data_lomba.UPDATED_AT';

	
	const IS_DELETED = 'data_lomba.IS_DELETED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdPesertaLomba', 'FileFotoPeserta', 'FilenameBaru', 'Keterangan', 'CreatedAt', 'UpdatedAt', 'IsDeleted', ),
		BasePeer::TYPE_COLNAME => array (DataLombaPeer::ID, DataLombaPeer::ID_PESERTA_LOMBA, DataLombaPeer::FILE_FOTO_PESERTA, DataLombaPeer::FILENAME_BARU, DataLombaPeer::KETERANGAN, DataLombaPeer::CREATED_AT, DataLombaPeer::UPDATED_AT, DataLombaPeer::IS_DELETED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_peserta_lomba', 'file_foto_peserta', 'filename_baru', 'keterangan', 'created_at', 'updated_at', 'is_deleted', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdPesertaLomba' => 1, 'FileFotoPeserta' => 2, 'FilenameBaru' => 3, 'Keterangan' => 4, 'CreatedAt' => 5, 'UpdatedAt' => 6, 'IsDeleted' => 7, ),
		BasePeer::TYPE_COLNAME => array (DataLombaPeer::ID => 0, DataLombaPeer::ID_PESERTA_LOMBA => 1, DataLombaPeer::FILE_FOTO_PESERTA => 2, DataLombaPeer::FILENAME_BARU => 3, DataLombaPeer::KETERANGAN => 4, DataLombaPeer::CREATED_AT => 5, DataLombaPeer::UPDATED_AT => 6, DataLombaPeer::IS_DELETED => 7, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_peserta_lomba' => 1, 'file_foto_peserta' => 2, 'filename_baru' => 3, 'keterangan' => 4, 'created_at' => 5, 'updated_at' => 6, 'is_deleted' => 7, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/DataLombaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.DataLombaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = DataLombaPeer::getTableMap();
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
		return str_replace(DataLombaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(DataLombaPeer::ID);

		$criteria->addSelectColumn(DataLombaPeer::ID_PESERTA_LOMBA);

		$criteria->addSelectColumn(DataLombaPeer::FILE_FOTO_PESERTA);

		$criteria->addSelectColumn(DataLombaPeer::FILENAME_BARU);

		$criteria->addSelectColumn(DataLombaPeer::KETERANGAN);

		$criteria->addSelectColumn(DataLombaPeer::CREATED_AT);

		$criteria->addSelectColumn(DataLombaPeer::UPDATED_AT);

		$criteria->addSelectColumn(DataLombaPeer::IS_DELETED);

	}

	const COUNT = 'COUNT(data_lomba.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT data_lomba.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DataLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DataLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = DataLombaPeer::doSelectRS($criteria, $con);
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
		$objects = DataLombaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return DataLombaPeer::populateObjects(DataLombaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			DataLombaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = DataLombaPeer::getOMClass();
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
			$criteria->addSelectColumn(DataLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DataLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DataLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);

		$rs = DataLombaPeer::doSelectRS($criteria, $con);
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

		DataLombaPeer::addSelectColumns($c);
		$startcol = (DataLombaPeer::NUM_COLUMNS - DataLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		PesertaLombaPeer::addSelectColumns($c);

		$c->addJoin(DataLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DataLombaPeer::getOMClass();

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
										$temp_obj2->addDataLomba($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initDataLombas();
				$obj2->addDataLomba($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(DataLombaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(DataLombaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(DataLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);

		$rs = DataLombaPeer::doSelectRS($criteria, $con);
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

		DataLombaPeer::addSelectColumns($c);
		$startcol2 = (DataLombaPeer::NUM_COLUMNS - DataLombaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		PesertaLombaPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + PesertaLombaPeer::NUM_COLUMNS;

		$c->addJoin(DataLombaPeer::ID_PESERTA_LOMBA, PesertaLombaPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = DataLombaPeer::getOMClass();


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
					$temp_obj2->addDataLomba($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initDataLombas();
				$obj2->addDataLomba($obj1);
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
		return DataLombaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(DataLombaPeer::ID); 

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
			$comparison = $criteria->getComparison(DataLombaPeer::ID);
			$selectCriteria->add(DataLombaPeer::ID, $criteria->remove(DataLombaPeer::ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(DataLombaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(DataLombaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof DataLomba) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(DataLombaPeer::ID, (array) $values, Criteria::IN);
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

	
	public static function doValidate(DataLomba $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(DataLombaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(DataLombaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(DataLombaPeer::DATABASE_NAME, DataLombaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = DataLombaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(DataLombaPeer::DATABASE_NAME);

		$criteria->add(DataLombaPeer::ID, $pk);


		$v = DataLombaPeer::doSelect($criteria, $con);

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
			$criteria->add(DataLombaPeer::ID, $pks, Criteria::IN);
			$objs = DataLombaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BaseDataLombaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/DataLombaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.DataLombaMapBuilder');
}
