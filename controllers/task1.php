<?

class Task1 extends Controller
{
	public function index()
	{
		$model = new Task1Model();
		if (isset($_POST['text'])) {
			$model->parseText($_POST['text']);
		}

		$this->view->set(array(
			'title' => 'Задача 1',
			'text'  => $_POST['text'],
			'model' => $model,
		));

		$this->view->render();
		return $this;
	}
}
