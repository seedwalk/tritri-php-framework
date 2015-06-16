
<?php


class LogicUsers extends SeedDb {

	public static $Table = 'users';

	public function __construct() {
	}

	public static function doList($query = '1=1') {
		self::setTable(self::$Table);
		$result =  self::Where($query);

		if ($result->num_rows > 0) { return $result; } 
		return false;
	}

	public static function listAll() {
		self::setTable(self::$Table);
		$result =  self::doList('1 = 1');
		return $result;
	}

	public static function getByid($id) {
		self::setTable(self::$Table);
		$result =  parent::Where('id ='.$id);
		return $result;
	}


	private static function returnCookieHash($hash) {
		$str = md5("cookie".$hash);
		return $str;
	}

	public static function loginCookie($id, $hash) {
		self::setTable(self::$Table);
		$result =  self::Where("id = '".$id."' AND cookieHash = '".$hash."'", false);
		if ($result->num_rows > 0) { 
			return $result; 
		}
		else { 
			return false;
		}
	}

	public static function returnSeedPass($pwd) {
		$str = md5("seed-|-".$pwd);
		return $str;
	}

	public static function checkUserExist($mail) {
		self::setTable(self::$Table);
		$result =  self::Where("email = '".$mail."'");
		if ($result->num_rows > 0) { return true; } 
		return false;
	}



	public static function loginCredentials($username, $pwd) {
		self::setTable(self::$Table);
		return parent::Where(" (email = '".$username."' AND pwd = '".self::returnSeedPass($pwd)."') ", false);
	}

	public static function loginCredentialsBackend($username, $pwd) {
		self::setTable(self::$Table);
		return parent::Where(" (email = '".$username."' AND pwd = '".self::returnSeedPass($pwd)."') AND (user_type = 'admin') ", true);
	}

	public static function update($fields) {
		self::setTable(self::$Table);
		$seedfields = array();

		foreach ($fields as $key => $value) {
			if ($key != "id") {
				$seedfields[$key] = $value['value'];
			}
		}
		if ($fields['id']['value'] != 0) {
			
			unset($seedfields['pwd']);
			
			return parent::doUpdate($fields['id']['value'], $seedfields, true);
			
		}
		else {
			
			$seedfields['pwd'] = self::returnSeedPass($seedfields['pwd']);
			$seedfields['user_type'] = "normal";
			
			return parent::doInsert($seedfields, false);

		}


	}

	public static function updatePass($id, $field) {
		self::setTable(self::$Table);
		$array['pwd'] = $field['value'];
		return parent::doUpdate($id, $array, false);
	}

}


?>
