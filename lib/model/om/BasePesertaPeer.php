<?php


abstract class BasePesertaPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'peserta';

	
	const CLASS_DEFAULT = 'lib.model.Peserta';

	
	const NUM_COLUMNS = 9;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const ID = 'peserta.ID';

	
	const ID_WILAYAH = 'peserta.ID_WILAYAH';

	
	const RT = 'peserta.RT';

	
	const RW = 'peserta.RW';

	
	const KETUA_RT = 'peserta.KETUA_RT';

	
	const KETUA_RW = 'peserta.KETUA_RW';

	
	const CREATED_AT = 'peserta.CREATED_AT';

	
	const UPDATED_AT = 'peserta.UPDATED_AT';

	
	const IS_DELETED = 'peserta.IS_DELETED';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('Id', 'IdWilayah', 'Rt', 'Rw', 'KetuaRt', 'KetuaRw', 'CreatedAt', 'UpdatedAt', 'IsDeleted', ),
		BasePeer::TYPE_COLNAME => array (PesertaPeer::ID, PesertaPeer::ID_WILAYAH, PesertaPeer::RT, PesertaPeer::RW, PesertaPeer::KETUA_RT, PesertaPeer::KETUA_RW, PesertaPeer::CREATED_AT, PesertaPeer::UPDATED_AT, PesertaPeer::IS_DELETED, ),
		BasePeer::TYPE_FIELDNAME => array ('id', 'id_wilayah', 'RT', 'RW', 'ketua_RT', 'ketua_RW', 'created_at', 'updated_at', 'is_deleted', ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('Id' => 0, 'IdWilayah' => 1, 'Rt' => 2, 'Rw' => 3, 'KetuaRt' => 4, 'KetuaRw' => 5, 'CreatedAt' => 6, 'UpdatedAt' => 7, 'IsDeleted' => 8, ),
		BasePeer::TYPE_COLNAME => array (PesertaPeer::ID => 0, PesertaPeer::ID_WILAYAH => 1, PesertaPeer::RT => 2, PesertaPeer::RW => 3, PesertaPeer::KETUA_RT => 4, PesertaPeer::KETUA_RW => 5, PesertaPeer::CREATED_AT => 6, PesertaPeer::UPDATED_AT => 7, PesertaPeer::IS_DELETED => 8, ),
		BasePeer::TYPE_FIELDNAME => array ('id' => 0, 'id_wilayah' => 1, 'RT' => 2, 'RW' => 3, 'ketua_RT' => 4, 'ketua_RW' => 5, 'created_at' => 6, 'updated_at' => 7, 'is_deleted' => 8, ),
		BasePeer::TYPE_NUM => array (0, 1, 2, 3, 4, 5, 6, 7, 8, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/PesertaMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.PesertaMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = PesertaPeer::getTableMap();
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
		return str_replace(PesertaPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(PesertaPeer::ID);

		$criteria->addSelectColumn(PesertaPeer::ID_WILAYAH);

		$criteria->addSelectColumn(PesertaPeer::RT);

		$criteria->addSelectColumn(PesertaPeer::RW);

		$criteria->addSelectColumn(PesertaPeer::KETUA_RT);

		$criteria->addSelectColumn(PesertaPeer::KETUA_RW);

		$criteria->addSelectColumn(PesertaPeer::CREATED_AT);

		$criteria->addSelectColumn(PesertaPeer::UPDATED_AT);

		$criteria->addSelectColumn(PesertaPeer::IS_DELETED);

	}

	const COUNT = 'COUNT(peserta.ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT peserta.ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = PesertaPeer::doSelectRS($criteria, $con);
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
		$objects = PesertaPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return PesertaPeer::populateObjects(PesertaPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			PesertaPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = PesertaPeer::getOMClass();
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
			$criteria->addSelectColumn(PesertaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaPeer::ID_WILAYAH, WilayahPeer::ID);

		$rs = PesertaPeer::doSelectRS($criteria, $con);
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

		PesertaPeer::addSelectColumns($c);
		$startcol = (PesertaPeer::NUM_COLUMNS - PesertaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		WilayahPeer::addSelectColumns($c);

		$c->addJoin(PesertaPeer::ID_WILAYAH, WilayahPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaPeer::getOMClass();

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
										$temp_obj2->addPeserta($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initPesertas();
				$obj2->addPeserta($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(PesertaPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(PesertaPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(PesertaPeer::ID_WILAYAH, WilayahPeer::ID);

		$rs = PesertaPeer::doSelectRS($criteria, $con);
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

		PesertaPeer::addSelectColumns($c);
		$startcol2 = (PesertaPeer::NUM_COLUMNS - PesertaPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		WilayahPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + WilayahPeer::NUM_COLUMNS;

		$c->addJoin(PesertaPeer::ID_WILAYAH, WilayahPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = PesertaPeer::getOMClass();


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
					$temp_obj2->addPeserta($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initPesertas();
				$obj2->addPeserta($obj1);
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
		return PesertaPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}

		$criteria->remove(PesertaPeer::ID); 

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
			$comparison = $criteria->getComparison(PesertaPeer::ID);
			$selectCriteria->add(PesertaPeer::ID, $criteria->remove(PesertaPeer::ID), $comparison);

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
			$affectedRows += PesertaPeer::doOnDeleteCascade(new Criteria(), $con);
			$affectedRows += BasePeer::doDeleteAll(PesertaPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(PesertaPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof Peserta) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
			$criteria->add(PesertaPeer::ID, (array) $values, Criteria::IN);
		}

				$criteria->setDbName(self::DATABASE_NAME);

		$affectedRows = 0; 
		try {
									$con->begin();
			$affectedRows += PesertaPeer::doOnDeleteCascade($criteria, $con);
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

				$objects = PesertaPeer::doSelect($criteria, $con);
		foreach($objects as $obj) {


			include_once 'lib/model/PesertaLomba.php';

						$c = new Criteria();
			
			$c->add(PesertaLombaPeer::ID_PESERTA, $obj->getId());
			$affectedRows += PesertaLombaPeer::doDelete($c, $con);
		}
		return $affectedRows;
	}

	
	public static function doValidate(Peserta $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(PesertaPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(PesertaPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(PesertaPeer::DATABASE_NAME, PesertaPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = PesertaPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
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

		$criteria = new Criteria(PesertaPeer::DATABASE_NAME);

		$criteria->add(PesertaPeer::ID, $pk);


		$v = PesertaPeer::doSelect($criteria, $con);

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
			$criteria->add(PesertaPeer::ID, $pks, Criteria::IN);
			$objs = PesertaPeer::doSelect($criteria, $con);
		}
		return $objs;
	}

} 
if (Propel::isInit()) {
			try {
		BasePesertaPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/PesertaMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.PesertaMapBuilder');
}
