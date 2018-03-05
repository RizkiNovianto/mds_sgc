<?php


abstract class BaseSfGuardUserPermissionPeer {

	
	const DATABASE_NAME = 'propel';

	
	const TABLE_NAME = 'sf_guard_user_permission';

	
	const CLASS_DEFAULT = 'lib.model.SfGuardUserPermission';

	
	const NUM_COLUMNS = 2;

	
	const NUM_LAZY_LOAD_COLUMNS = 0;


	
	const USER_ID = 'sf_guard_user_permission.USER_ID';

	
	const PERMISSION_ID = 'sf_guard_user_permission.PERMISSION_ID';

	
	private static $phpNameMap = null;


	
	private static $fieldNames = array (
		BasePeer::TYPE_PHPNAME => array ('UserId', 'PermissionId', ),
		BasePeer::TYPE_COLNAME => array (SfGuardUserPermissionPeer::USER_ID, SfGuardUserPermissionPeer::PERMISSION_ID, ),
		BasePeer::TYPE_FIELDNAME => array ('user_id', 'permission_id', ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	private static $fieldKeys = array (
		BasePeer::TYPE_PHPNAME => array ('UserId' => 0, 'PermissionId' => 1, ),
		BasePeer::TYPE_COLNAME => array (SfGuardUserPermissionPeer::USER_ID => 0, SfGuardUserPermissionPeer::PERMISSION_ID => 1, ),
		BasePeer::TYPE_FIELDNAME => array ('user_id' => 0, 'permission_id' => 1, ),
		BasePeer::TYPE_NUM => array (0, 1, )
	);

	
	public static function getMapBuilder()
	{
		include_once 'lib/model/map/SfGuardUserPermissionMapBuilder.php';
		return BasePeer::getMapBuilder('lib.model.map.SfGuardUserPermissionMapBuilder');
	}
	
	public static function getPhpNameMap()
	{
		if (self::$phpNameMap === null) {
			$map = SfGuardUserPermissionPeer::getTableMap();
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
		return str_replace(SfGuardUserPermissionPeer::TABLE_NAME.'.', $alias.'.', $column);
	}

	
	public static function addSelectColumns(Criteria $criteria)
	{

		$criteria->addSelectColumn(SfGuardUserPermissionPeer::USER_ID);

		$criteria->addSelectColumn(SfGuardUserPermissionPeer::PERMISSION_ID);

	}

	const COUNT = 'COUNT(sf_guard_user_permission.USER_ID)';
	const COUNT_DISTINCT = 'COUNT(DISTINCT sf_guard_user_permission.USER_ID)';

	
	public static function doCount(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$rs = SfGuardUserPermissionPeer::doSelectRS($criteria, $con);
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
		$objects = SfGuardUserPermissionPeer::doSelect($critcopy, $con);
		if ($objects) {
			return $objects[0];
		}
		return null;
	}
	
	public static function doSelect(Criteria $criteria, $con = null)
	{
		return SfGuardUserPermissionPeer::populateObjects(SfGuardUserPermissionPeer::doSelectRS($criteria, $con));
	}
	
	public static function doSelectRS(Criteria $criteria, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if (!$criteria->getSelectColumns()) {
			$criteria = clone $criteria;
			SfGuardUserPermissionPeer::addSelectColumns($criteria);
		}

				$criteria->setDbName(self::DATABASE_NAME);

						return BasePeer::doSelect($criteria, $con);
	}
	
	public static function populateObjects(ResultSet $rs)
	{
		$results = array();
	
				$cls = SfGuardUserPermissionPeer::getOMClass();
		$cls = Propel::import($cls);
				while($rs->next()) {
		
			$obj = new $cls();
			$obj->hydrate($rs);
			$results[] = $obj;
			
		}
		return $results;
	}

	
	public static function doCountJoinSfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserPermissionPeer::USER_ID, SfGuardUserPeer::ID);

		$rs = SfGuardUserPermissionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinSfGuardPermission(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);

		$rs = SfGuardUserPermissionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinSfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SfGuardUserPermissionPeer::addSelectColumns($c);
		$startcol = (SfGuardUserPermissionPeer::NUM_COLUMNS - SfGuardUserPermissionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SfGuardUserPeer::addSelectColumns($c);

		$c->addJoin(SfGuardUserPermissionPeer::USER_ID, SfGuardUserPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserPermissionPeer::getOMClass();

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
										$temp_obj2->addSfGuardUserPermission($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSfGuardUserPermissions();
				$obj2->addSfGuardUserPermission($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinSfGuardPermission(Criteria $c, $con = null)
	{
		$c = clone $c;

				if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SfGuardUserPermissionPeer::addSelectColumns($c);
		$startcol = (SfGuardUserPermissionPeer::NUM_COLUMNS - SfGuardUserPermissionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;
		SfGuardPermissionPeer::addSelectColumns($c);

		$c->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);
		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserPermissionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SfGuardPermissionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol);

			$newObject = true;
			foreach($results as $temp_obj1) {
				$temp_obj2 = $temp_obj1->getSfGuardPermission(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
										$temp_obj2->addSfGuardUserPermission($obj1); 					break;
				}
			}
			if ($newObject) {
				$obj2->initSfGuardUserPermissions();
				$obj2->addSfGuardUserPermission($obj1); 			}
			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAll(Criteria $criteria, $distinct = false, $con = null)
	{
		$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserPermissionPeer::USER_ID, SfGuardUserPeer::ID);

		$criteria->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);

		$rs = SfGuardUserPermissionPeer::doSelectRS($criteria, $con);
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

		SfGuardUserPermissionPeer::addSelectColumns($c);
		$startcol2 = (SfGuardUserPermissionPeer::NUM_COLUMNS - SfGuardUserPermissionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SfGuardUserPeer::NUM_COLUMNS;

		SfGuardPermissionPeer::addSelectColumns($c);
		$startcol4 = $startcol3 + SfGuardPermissionPeer::NUM_COLUMNS;

		$c->addJoin(SfGuardUserPermissionPeer::USER_ID, SfGuardUserPeer::ID);

		$c->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);

		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserPermissionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);


					
			$omClass = SfGuardUserPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2 = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSfGuardUser(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSfGuardUserPermission($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj2->initSfGuardUserPermissions();
				$obj2->addSfGuardUserPermission($obj1);
			}


					
			$omClass = SfGuardPermissionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj3 = new $cls();
			$obj3->hydrate($rs, $startcol3);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj3 = $temp_obj1->getSfGuardPermission(); 				if ($temp_obj3->getPrimaryKey() === $obj3->getPrimaryKey()) {
					$newObject = false;
					$temp_obj3->addSfGuardUserPermission($obj1); 					break;
				}
			}

			if ($newObject) {
				$obj3->initSfGuardUserPermissions();
				$obj3->addSfGuardUserPermission($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doCountJoinAllExceptSfGuardUser(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);

		$rs = SfGuardUserPermissionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doCountJoinAllExceptSfGuardPermission(Criteria $criteria, $distinct = false, $con = null)
	{
				$criteria = clone $criteria;

				$criteria->clearSelectColumns()->clearOrderByColumns();
		if ($distinct || in_array(Criteria::DISTINCT, $criteria->getSelectModifiers())) {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT_DISTINCT);
		} else {
			$criteria->addSelectColumn(SfGuardUserPermissionPeer::COUNT);
		}

				foreach($criteria->getGroupByColumns() as $column)
		{
			$criteria->addSelectColumn($column);
		}

		$criteria->addJoin(SfGuardUserPermissionPeer::USER_ID, SfGuardUserPeer::ID);

		$rs = SfGuardUserPermissionPeer::doSelectRS($criteria, $con);
		if ($rs->next()) {
			return $rs->getInt(1);
		} else {
						return 0;
		}
	}


	
	public static function doSelectJoinAllExceptSfGuardUser(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SfGuardUserPermissionPeer::addSelectColumns($c);
		$startcol2 = (SfGuardUserPermissionPeer::NUM_COLUMNS - SfGuardUserPermissionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SfGuardPermissionPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SfGuardPermissionPeer::NUM_COLUMNS;

		$c->addJoin(SfGuardUserPermissionPeer::PERMISSION_ID, SfGuardPermissionPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserPermissionPeer::getOMClass();

			$cls = Propel::import($omClass);
			$obj1 = new $cls();
			$obj1->hydrate($rs);

			$omClass = SfGuardPermissionPeer::getOMClass();


			$cls = Propel::import($omClass);
			$obj2  = new $cls();
			$obj2->hydrate($rs, $startcol2);

			$newObject = true;
			for ($j=0, $resCount=count($results); $j < $resCount; $j++) {
				$temp_obj1 = $results[$j];
				$temp_obj2 = $temp_obj1->getSfGuardPermission(); 				if ($temp_obj2->getPrimaryKey() === $obj2->getPrimaryKey()) {
					$newObject = false;
					$temp_obj2->addSfGuardUserPermission($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSfGuardUserPermissions();
				$obj2->addSfGuardUserPermission($obj1);
			}

			$results[] = $obj1;
		}
		return $results;
	}


	
	public static function doSelectJoinAllExceptSfGuardPermission(Criteria $c, $con = null)
	{
		$c = clone $c;

								if ($c->getDbName() == Propel::getDefaultDB()) {
			$c->setDbName(self::DATABASE_NAME);
		}

		SfGuardUserPermissionPeer::addSelectColumns($c);
		$startcol2 = (SfGuardUserPermissionPeer::NUM_COLUMNS - SfGuardUserPermissionPeer::NUM_LAZY_LOAD_COLUMNS) + 1;

		SfGuardUserPeer::addSelectColumns($c);
		$startcol3 = $startcol2 + SfGuardUserPeer::NUM_COLUMNS;

		$c->addJoin(SfGuardUserPermissionPeer::USER_ID, SfGuardUserPeer::ID);


		$rs = BasePeer::doSelect($c, $con);
		$results = array();

		while($rs->next()) {

			$omClass = SfGuardUserPermissionPeer::getOMClass();

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
					$temp_obj2->addSfGuardUserPermission($obj1);
					break;
				}
			}

			if ($newObject) {
				$obj2->initSfGuardUserPermissions();
				$obj2->addSfGuardUserPermission($obj1);
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
		return SfGuardUserPermissionPeer::CLASS_DEFAULT;
	}

	
	public static function doInsert($values, $con = null)
	{
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} else {
			$criteria = $values->buildCriteria(); 		}


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
			$comparison = $criteria->getComparison(SfGuardUserPermissionPeer::USER_ID);
			$selectCriteria->add(SfGuardUserPermissionPeer::USER_ID, $criteria->remove(SfGuardUserPermissionPeer::USER_ID), $comparison);

			$comparison = $criteria->getComparison(SfGuardUserPermissionPeer::PERMISSION_ID);
			$selectCriteria->add(SfGuardUserPermissionPeer::PERMISSION_ID, $criteria->remove(SfGuardUserPermissionPeer::PERMISSION_ID), $comparison);

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
			$affectedRows += BasePeer::doDeleteAll(SfGuardUserPermissionPeer::TABLE_NAME, $con);
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
			$con = Propel::getConnection(SfGuardUserPermissionPeer::DATABASE_NAME);
		}

		if ($values instanceof Criteria) {
			$criteria = clone $values; 		} elseif ($values instanceof SfGuardUserPermission) {

			$criteria = $values->buildPkeyCriteria();
		} else {
						$criteria = new Criteria(self::DATABASE_NAME);
												if(count($values) == count($values, COUNT_RECURSIVE))
			{
								$values = array($values);
			}
			$vals = array();
			foreach($values as $value)
			{

				$vals[0][] = $value[0];
				$vals[1][] = $value[1];
			}

			$criteria->add(SfGuardUserPermissionPeer::USER_ID, $vals[0], Criteria::IN);
			$criteria->add(SfGuardUserPermissionPeer::PERMISSION_ID, $vals[1], Criteria::IN);
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

	
	public static function doValidate(SfGuardUserPermission $obj, $cols = null)
	{
		$columns = array();

		if ($cols) {
			$dbMap = Propel::getDatabaseMap(SfGuardUserPermissionPeer::DATABASE_NAME);
			$tableMap = $dbMap->getTable(SfGuardUserPermissionPeer::TABLE_NAME);

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

		$res =  BasePeer::doValidate(SfGuardUserPermissionPeer::DATABASE_NAME, SfGuardUserPermissionPeer::TABLE_NAME, $columns);
    if ($res !== true) {
        $request = sfContext::getInstance()->getRequest();
        foreach ($res as $failed) {
            $col = SfGuardUserPermissionPeer::translateFieldname($failed->getColumn(), BasePeer::TYPE_COLNAME, BasePeer::TYPE_PHPNAME);
            $request->setError($col, $failed->getMessage());
        }
    }

    return $res;
	}

	
	public static function retrieveByPK( $user_id, $permission_id, $con = null) {
		if ($con === null) {
			$con = Propel::getConnection(self::DATABASE_NAME);
		}
		$criteria = new Criteria();
		$criteria->add(SfGuardUserPermissionPeer::USER_ID, $user_id);
		$criteria->add(SfGuardUserPermissionPeer::PERMISSION_ID, $permission_id);
		$v = SfGuardUserPermissionPeer::doSelect($criteria, $con);

		return !empty($v) ? $v[0] : null;
	}
} 
if (Propel::isInit()) {
			try {
		BaseSfGuardUserPermissionPeer::getMapBuilder();
	} catch (Exception $e) {
		Propel::log('Could not initialize Peer: ' . $e->getMessage(), Propel::LOG_ERR);
	}
} else {
			require_once 'lib/model/map/SfGuardUserPermissionMapBuilder.php';
	Propel::registerMapBuilder('lib.model.map.SfGuardUserPermissionMapBuilder');
}
