<?

class Task7 extends Controller
{
	public function index()
	{
		$model = new Task7Model();
		$model->setInput();
		$model->setOutput();

		$this->view->set(array(
			'title'  => 'Задача 7',
			'model'  => $model,
		));

		$this->view->render();
		return $this;
	}
}
