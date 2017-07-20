<?

class Task1Model extends Model
{
	protected $_tagsVals  = array();
	protected $_tagsDescs = array();


	/*Дан текст с включенными в него тегами следующего вида:
	[НАИМЕНОВАНИЕ_ТЕГА:описание]данные[/НАИМЕНОВАНИЕ_ТЕГА]
	На выходе нужно получить 2 массива:
	Первый:
	* Ключ - наименование тега
	* Значение - данные 
	Второй:
	* Ключ - наименование тега
	* Значение - описание

	Вложенность тегов не допускается.
	Описания может и не быть
	Обезателен закрвающий тег*/
	public function parseText($s)
	{
		if (is_string($s) && !empty($s)) {
			//[НАИМЕНОВАНИЕ_ТЕГА:описание]данные[/НАИМЕНОВАНИЕ_ТЕГА]
			$pattern = '/'
				.'\['		.'([^]:]+)'		.':?'	.'([^]]*)'		.'\]'
				.'([^[]+)'
				.'\[\/'		.'\1'		.'\]'

				.'/';
			preg_match_all($pattern, $s, $res);
			$tags  = $res[1];
			$descs = $res[2];
			$vals  = $res[3];

			for ($i=0; $i<count($tags); $i++) {
				//Если предполагается, что каждый тег в тексте встречается только один раз, тогда
				//[$i] ниже можно убрать и тогда вместо двумерного массива получится одномерный.
				$this->_tagsVals [$i][$tags[$i]] = $vals[$i];
				$this->_tagsDescs[$i][$tags[$i]] = $descs[$i];
			}
		}

		return $this;
	}


	public function getTagsVals()
	{
		return $this->_tagsVals;
	}


	public function getTagsDescs()
	{
		return $this->_tagsDescs;
	}
}
