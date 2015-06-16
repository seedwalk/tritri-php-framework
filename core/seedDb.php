<?php
class SeedDb {
	public static $Table;

	// public function __construct( $consTable )
	// {
	// 	self::$Table = $consTable;
	// 	echo $consTable;
	// 	exit;

	// }

	public static function setTable($val) {
		self::$Table = $val;
	}

	public static function getTable() {
		return self::$Table;
	}

	public static function get_tables()
	{
		$tableList = array();
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$res = $mysqli->query("SHOW TABLES");
		while($cRow = mysqli_fetch_array($res))
		{
			$tableList[] = $cRow[0];
		}
		
		$mysqli->close();
		return $tableList;


	}

	public static function get_columns($val) {
		$columnList = array();
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$res = $mysqli->query("SHOW COLUMNS FROM ".$val);

		while ($obj = $res->fetch_object()) {
			$item = $obj->Field;
			array_push($columnList, $item);

		}
		$mysqli->close();
		return $columnList;
	}

	

	public static function doDelete($query) {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}

		$consulta = "DELETE FROM ".self::$Table." WHERE ".$query;

		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();

	}

	public static function leftJoin($query ,$fields ="*") {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}
		$consulta = "SELECT ".$fields." FROM ".self::$Table." as a LEFT JOIN ".$query;
		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();
		return $resultado;
	}

	public static function innerJoin($query ,$fields ="*", $debug = false) {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}
		$consulta = "SELECT ".$fields." FROM ".self::$Table." as a INNER JOIN ".$query;
		if ($debug) {
			Common::DebugThis($consulta);
		}
		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();
		return $resultado;
	}

	public static function innerJoinPerPage($query, $page, $pageSize = ITEMS_PER_PAGE, $orderBy = "id", $sort = "ASC", $fields ="*", $debug = false) {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}
		if ($page == 1) {
			$inicio = 0;
		} else {
			$inicio = ($page - 1) * $pageSize;
		}
		$consulta = "SELECT ".$fields." FROM ".self::$Table." as a INNER JOIN ".$query. " ORDER BY ".$orderBy." ".$sort." LIMIT " . $inicio . "," . $pageSize;;
		if ($debug) {
			Common::DebugThis($consulta);
		}
		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();
		return $resultado;
	}

	public static function Where($query, $debug = false, $orderBy = 'id', $sort = 'ASC') {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		/* comprobar la conexión */
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}

		$consulta = "SELECT * FROM ".self::$Table." WHERE ".$query . " ORDER BY ".$orderBy ." ". $sort;

		if ($debug) {
			Common::DebugThis($consulta);
		}
		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();
		return $resultado;
	}

	public static function WherePerPage($query, $page, $pageSize = ITEMS_PER_PAGE, $orderBy = 'id', $sort = 'ASC',$debug=false) {
		
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		/* comprobar la conexión */
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}
		if ($page == 1) {
			$inicio = 0;
		} else {
			$inicio = ($page - 1) * $pageSize;
		}
		$consulta = "SELECT * FROM ". self::$Table." WHERE " . $query . " ORDER BY ".$orderBy ." ". $sort." LIMIT " . $inicio . "," . $pageSize;

		if ($debug == true) {
			Common::DebugThis($consulta);
		}
		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();
		return $resultado;
	}

	public static function doInsert($fields, $debug = false) {
		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		$query_fields = "(";
			$query_values = "VALUES (";
				$i = 0;
				foreach ($fields as $key => $value) {
					if ($key !="created" && $key != "created_by") {
						if ($i==0) {
							$query_fields .= "`".$key."`";
							$query_values .="'".$mysqli->real_escape_string($value)."'";
						}
						else {
							$query_fields .= ", `".$key."`";
							$query_values .=", '".$mysqli->real_escape_string($value)."'";
						}
					}

					$i++;
				}
				$query_fields .= ", `created`";
				$query_values .=", now()";
				$query_fields .= ", `created_by`";
				$query_values .=", '".Session::get("userid")."'";
				$query_fields .= ") ";
$query_values .= ");";
$query = $query_fields.$query_values;
		//echo $query;

$consulta = "INSERT INTO `".self::$Table."` ".$query;

if ($debug){
	Common::DebugThis($consulta);
}
$mysqli->query($consulta);
$toreturn = $mysqli->insert_id;
$mysqli->close();
return $toreturn;
}

public static function doUpdate($id, $fields, $debug = false) {

	$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


	$query_fields = "(";
		$query = "";
		$i = 0;
		foreach ($fields as $key => $value) {
			if ($i==0) {
				$query .= "`".$key."` = '".$mysqli->real_escape_string($value)."'";
			}
			else {
				$query .= ", `".$key."` = '".$mysqli->real_escape_string($value)."'";
			}
			$i++;
		}
		$query .= ", `updated` = now() ";

		$query .= "WHERE `id` = ".$id.";";

		$consulta = "UPDATE `".self::$Table."` SET ".$query;
		if ($debug) {
			Common::DebugThis($consulta);
		}
		$mysqli->query($consulta);
		$toreturn = $mysqli->affected_rows;
		$mysqli->close();
		return $toreturn;
	}

	public static function updateWhere($where, $fields) {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);


		$query_fields = "(";
			$query = "";
			$i = 0;
			foreach ($fields as $key => $value) {
				if ($i==0) {
					$query .= "`".$key."` = '".$mysqli->real_escape_string($value)."'";
				}
				else {
					$query .= ", `".$key."` = '".$mysqli->real_escape_string($value)."'";
				}
				$i++;
			}
			$query .= ", `updated` = now() ";

			$query .= "WHERE ".$where.";";

			$consulta = "UPDATE `".self::$Table."` SET ".$query;
		//echo $consulta;
			$mysqli->query($consulta);
			$toreturn = $mysqli->affected_rows;
			$mysqli->close();
			return $toreturn;

		}

		public static function Query($query, $debug = false) {

		$mysqli = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);

		/* comprobar la conexión */
		if (mysqli_connect_errno()) {
			printf("Falló la conexión: %s\n", mysqli_connect_error());
			exit();
		}

		$consulta = $query;

		if ($debug) {
			Common::DebugThis($consulta);
		}
		$resultado = $mysqli->query($consulta);

		/* cerrar la conexión */
		$mysqli->close();
		return $resultado;
	}


	}
	?>