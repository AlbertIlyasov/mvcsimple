<?

class Task7Model extends Model
{
	protected $_input  = array();
	protected $_output = array();


	/*Дан 2-х мерный массив, количество элементов в каждой строке может быть разной и заранее не известно. Так же не известно количество строк.
	Нужно разработать алгоритм, на выходе которого получим массив, в котром будет представлены все возможные уникальные комбинации вариантов использующий по одному элементу из каждой строки.
	Пример
	Исходный массив:
	а1 а2 а3
	b1 b2
	c1 c2 c3
	d1

	Результирующий массив:
	a1 b1 c1 d1
	a1 b1 c2 d1
	a1 b1 c3 d1
	a1 b2 c1 d1
	a1 b2 c2 d1
	a1 b2 c3 d1
	a2 b1 c1 d1
	a2 b1 c2 d1
	a2 b1 c3 d1
	a2 b2 c1 d1
	a2 b2 c2 d1
	a2 b2 c3 d1
	a3 b1 c1 d1
	a3 b1 c2 d1
	a3 b1 c3 d1
	a3 b2 c1 d1
	a3 b2 c2 d1
	a3 b2 c3 d1*/
	public function setInput()
	{
		$a = 97;
		$z = 122;
		$rows = rand(2,4);//rand(1,$z-$a+1);
		for ($i=0; $i<$rows; $i++) {
			$cols = rand(1,4);

			//Получим a1, a2 и т.д.
			for ($j=1; $j<=$cols; $j++) {
				$this->_input[$i][] = chr($a+$i).$j;	
			}	
		}
		
		return $this;
	}


	public function getInput()
	{
		return $this->_input;
	}


	public function getOutput()
	{
		return $this->_output;
	}


	//При появлении ошибки "Maximum function nesting level of" нужно в php.ini увеличить
	//значение для xdebug.max_nesting_level.
	public function setOutput()
	{
		$k = 0;
		$rows = count($this->_input);
		$rowCols = array_fill(0,$rows,0);

		while ($rowCols[0] < count($this->_input[0])) {
			for ($i=0; $i<$rows; $i++) {
				$this->_output[$k][] = $this->_input[$i][$rowCols[$i]];
			}

			//Пока цикл не встретит нулевую строку и пока в строке не встретит
			//существование следующего столбца, он будет идти 
			//с последней строчки наверх, зануляя номер столбца в строке.
			while (!isset($this->_input[$i][$rowCols[$i]+1]) && $i>0) {
				$rowCols[$i] = 0;
				$i--;
			}

			//Сейчас в $i содержится номер строчки, в которой есть следующий столбец.
			$rowCols[$i]++;
			$k++;
		}
		
		return $this;
	}
}