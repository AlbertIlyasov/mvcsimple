<?

class Task3 extends Controller
{
	public function index()
	{
		$model = new Task3Model();
		$model->setNames();

		$this->view->set(array(
			'title'  => 'Задачи 3,4,5',
			'model'  => $model,
			'action' => 'index',
		));

		$this->view->render();
		return $this;
	}


	public function truncate()
	{
		$model = new Task3Model();
		$model->truncateNames();

		$this->view->set(array(
			'title'  => 'Задачи 3,4,5',
			'model'  => $model,
			'action' => 'truncate',
			'out'    => 'Таблица очищена.',
		));

		$this->view->render();
		return $this;
	}

	
	public function populate()
	{
		$model = new Task3Model();
		$model->populateNames();

		$this->view->set(array(
			'title'  => 'Задачи 3,4,5',
			'model'  => $model,
			'action' => 'populate',
			'out'    => 'Таблица заполнена случайными данными.',
		));

		$this->view->render();
		return $this;
	}

	
	public function create()
	{
		$model = new Task3Model();
		$model->createTableNames();

		$this->view->set(array(
			'title'  => 'Задачи 3,4,5',
			'model'  => $model,
			'out'    => 'Таблица создана.',
		));

		$this->view->render();
		return $this;
	}

	
	public function drop()
	{
		$model = new Task3Model();
		$model->dropTableNames();

		$this->view->set(array(
			'title' => 'Задачи 3,4,5',
			'model' => $model,
			'out'   => 'Таблица удалена.',
		));

		$this->view->render();
		return $this;
	}

	
	public function noParentsWithChilds()
	{
		$model = new Task3Model();
		$model->setNamesNoParentsWithChilds();

		$this->view->set(array(
			'title'  => 'Задачи 3,4,5',
			'model'  => $model,
			'action' => 'noParentsWithChilds',
		));

		$this->view->render();
		return $this;
	}

	
	public function NoChildsWithParentsGrandparents()
	{
		$model = new Task3Model();
		$model->setNamesNoChildsWithParentsGrandparents();

		$this->view->set(array(
			'title'  => 'Задачи 3,4,5',
			'model'  => $model,
			'action' => 'noChildsWithParentsGrandparents',
		));

		$this->view->render();
		return $this;
	}
}
