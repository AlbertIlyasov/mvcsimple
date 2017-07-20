<?

class Main extends Controller
{
	public function index()
	{
		$this->view->set(array(
			'contentTitle' => 'Постановка тестовых задач от работодателя',
		));

		$this->view->render();
		return $this;
	}
}