<?

class Task3Model extends Model
{
	protected $_names = array();


	public function setNames($parentId=null, $level=0)
	{
		$sql = 'SELECT id, name, parent FROM names WHERE parent'
			.(is_null($parentId) ? ' IS NULL' : '=:parentId'); 
		$sth = DB::$dbh->prepare($sql);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->bindParam(':parentId', $parentId);
		$sth->execute();
		while ($row = $sth->fetch()) {
			$row['level'] = $level;
			$this->_names[] = $row;

			//Получим потомков.
			$this->setNames($row['id'], ($level+1));
		}

		return $this;
	}


	public function setNamesNoParentsWithChilds()
	{
		$sql = 'SELECT n.id, n.name FROM names AS n
			LEFT JOIN (
			SELECT parent, count(*) as count 
			FROM names
			GROUP BY parent
			) AS t ON n.id=t.parent
			WHERE n.parent IS NULL AND t.count>=3'; 

		$sth = DB::$dbh->prepare($sql);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$this->_names = $sth->fetchAll();

		return $this;
	}


	public function setNamesNoChildsWithParentsGrandparents()
	{
		$sql = 'SELECT n.id, n.name
			FROM names as n
			LEFT JOIN names AS p ON n.parent=p.id
			WHERE 
			n.id NOT IN (
				SELECT parent
				FROM names
				WHERE parent IS NOT NULL
				GROUP BY parent
			)
			AND p.parent IS NOT NULL';

		$sth = DB::$dbh->prepare($sql);
		$sth->setFetchMode(PDO::FETCH_ASSOC);
		$sth->execute();
		$this->_names = $sth->fetchAll();

		return $this;
	}
	

	public function getNames()
	{
		return $this->_names;
	}


	public function populateNames()
	{
		$ids = array();
		$sql = 'INSERT INTO names (name, parent) VALUES (:name, :parent)';
		$sth = DB::$dbh->prepare($sql);
		$sth->bindParam(':name'  , $name);
		$sth->bindParam(':parent', $parent);

		$qty = 50;
		for ($i=0; $i<$qty; $i++) {
			$name   = '';
			$parent = null;

			//Сгенерим длину и содержимое слова.
			$nameLen = rand(2,3);
			for ($j=0; $j<$nameLen; $j++) {
				//65-A, 90-Z, 97-a, 122-z
				$name .= chr(rand(65,90));
			}

			//Чем больше второй аргумент, тем выше вероятность появления у новой записи родителя.
			//Родитель определяется случайной выборкой из ID добавленных в цикле записей.
			if (rand(0,2)) {
				$parent = $ids[rand(0, sizeof($ids)-1)];
			}

			$sth->execute();
			$ids[] = DB::$dbh->lastInsertId();
		}
	}


	public function truncateNames()
	{
		$sql = 'TRUNCATE names';
		DB::$dbh->exec($sql);
	}


	public function createTableNames()
	{
		$sql = 'CREATE TABLE IF NOT EXISTS `names` (
				`id` INT UNSIGNED NOT NULL AUTO_INCREMENT,
				`name` VARCHAR(50) NOT NULL,
				`parent` INT UNSIGNED NULL DEFAULT NULL COMMENT "ссылка на id родителя",
				PRIMARY KEY (`id`),
				INDEX `FK_names_names` (`parent`),
				CONSTRAINT `FK_names_names` FOREIGN KEY (`parent`) REFERENCES `names` (`id`)
			)
			ENGINE=InnoDB';
		DB::$dbh->exec($sql);
	}


	public function dropTableNames()
	{
		$sql = 'DROP TABLE IF EXISTS names';
		DB::$dbh->exec($sql);
	}
}