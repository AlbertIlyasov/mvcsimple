<h2>Описание задачи</h2>
<fieldset>
		<?=nl2br('Дан 2-х мерный массив, количество элементов в каждой строке может быть разной и заранее не известно. Так же не известно количество строк.
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
a3 b2 c3 d1')?>
	
</fieldset>


<h2>Решение</h2>
<b>Вход:</b>
<pre><?print_r($model->getInput())?></pre>

<b>Выход:</b>
<pre><?print_r($model->getOutput())?></pre>
