<?php
class Db{
	private static $db;
	public static function init()
	{
		if(!self::$db)
		{
			try{
                            self::$db = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME);
                            //echo "bd ok";die(); // OK pour iode
                        } catch (mysqli_sql_exception $e) {
                            throw $e;
                            //echo "bd nok";die();
                        }
                }
                return self::$db;
	}
}
