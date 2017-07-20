<h2>Описание задачи</h2>
<fieldset>
		<?=nl2br('Дана таблица в базе MySQL с полями:
    id  - ключ
    name  имя,
    parent ссылка на id родителя,

Данную таблицу нужно заполнить рандомными значениями, но так что бы получилось дерево с несколькими (от 0 до 5) уровнями вложенности

Реализовать алгоритм выводящий это дерево, вида:
').'<pre>EEE
  ->KK
  ->LK
RE
LO
  ->EW
  ->FS
DF
  ->JJJ
	  ->WW
	  ->LL
		->SS
		  ->SD
		  ->HR
			->JS
			  ->PP
			->ET		
  ->ED		
  ->AC
PPP</pre>
и т.д.'?>
	
</fieldset>


<h2>Решение</h2>
<p>
<a href="<?=URL?>task3/populate" class="btn btn-success">Заполнить таблицу случайными данными</a>
<a href="<?=URL?>task3/truncate" class="btn btn-warning">Очистить таблицу</a>
&nbsp;&nbsp;&nbsp;
<a href="<?=URL?>task3/create" class="btn btn-danger">Создать таблицу</a>
<a href="<?=URL?>task3/drop" class="btn btn-danger">Удалить таблицу</a>
</p>

<p>
<a href="<?=URL?>task3" class="btn btn-primary">3. Показать таблицу</a>
<a href="<?=URL?>task3/noparentswithchilds" class="btn btn-primary">4. Записи без родителей, с тремя и более потомками</a>
<a href="<?=URL?>task3/nochildswithparentsgrandparents" class="btn btn-primary">5. Записи без потомков, с 2-мя старшими родителями</a>
</p>

<p><?=$out?></p>
<?
if (in_array($action, array('index', 'noParentsWithChilds', 'noChildsWithParentsGrandparents'))) {

	$names = $model->getNames();
	for ($i=0; $i<sizeof($names); $i++) {
		echo ($names[$i]['level'] ? Helper::spaces($names[$i]['level'], '&nbsp;&nbsp;&nbsp;&nbsp;').'->' : '')
			 .$names[$i]['name'].'<br>';
	}
	if (!$i) {
		echo 'Таблица пуста.';
	} 
}
?>
