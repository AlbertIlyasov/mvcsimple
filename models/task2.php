<?

class Task2Model extends Model
{
	/*const KEYS = array(
		'raz:',
		'dva:',
		'tri:',
		);*/
	protected $_keysVals  = array();


	static public function keys()
	{
		return array(
			'raz:',
			'dva:',
			'tri:',
		);
	}


	/*Дан текст в который включены ключи raz: dva: tri:
	текст может располагаться как перед ключами так и после
	 
	На выходе нужно получить массив, 
	где ключ это raz , dva , tri, а ДАННЫЕ - текст раполагающийся после ключа до следующего ключа или до конца текста, если не встретился ключ. 
	Очередность ключей может быть – произвльная. Если в тексте ключ встречается второй раз - в массиве он должен быть переписан.
	В решении должны использоваться регулярки.*/
	public function parseText($s)
	{
		if (is_string($s) && !empty($s)) {
			//[НАИМЕНОВАНИЕ_ТЕГА:описание]данные[/НАИМЕНОВАНИЕ_ТЕГА]
			$pattern = '/('.implode('|', self::keys()).')(.*?)(?='.implode('|', self::keys()).'|$)/m';
			preg_match_all($pattern, $s, $res);
			$keys  = $res[1];
			$vals  = $res[2];

			for ($i=0; $i<sizeof($keys); $i++) {
				$this->_keysVals[$keys[$i]] = $vals[$i];
			}
		}

		return $this;
	}


	public function getKeysVals()
	{
		return $this->_keysVals;
	}
}