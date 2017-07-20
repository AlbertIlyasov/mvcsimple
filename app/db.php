<?

class DB
{
	static public $dbh;


	static public function connect()
	{
		try {
			self::$dbh = new PDO(DBDSN, DBLOGIN, DBPASSWD); 
  			self::$dbh->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION ); 
		} catch (PDOException $e) {
			echo 'Database error.';
			if (SITEMODE == DEBUG || Helper::isLocal()) {
				die($e->getMessage());
			}
			die;
		}
	}
}