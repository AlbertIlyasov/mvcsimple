<h2>Описание задачи</h2>
<fieldset>
		<?=nl2br('Дан текст в который включены ключи raz: dva: tri:
	текст может располагаться как перед ключами так и после
	 
	На выходе нужно получить массив, 
	где ключ это raz , dva , tri, а ДАННЫЕ - текст раполагающийся после ключа до следующего ключа или до конца текста, если не встретился ключ. 
	Очередность ключей может быть – произвльная. Если в тексте ключ встречается второй раз - в массиве он должен быть переписан.
	В решении должны использоваться регулярки')?>
	
</fieldset>

<p>
<form method=post>
	<div class="form-group">
		<label for="text">Введите текст:</label>
		<textarea name="text" id="text"><?=!empty($text) 
		? htmlspecialchars($text) 
		: 'текст1raz:текст2dva:текст3raz:текст4dva:
текст5
текст6'?></textarea>
	</div>
	<button type=submit class="btn btn-success">Решить</button>
</form>
<?=$out?>

<h2>Решение</h2>
<br><pre><?print_r($model->getKeysVals())?></pre>
