<?

class Task6 extends Controller
{
	public function index()
	{
		$this->view->set(array(
			'title'  => 'Задача 6',
			'model'  => $model,
		));


		$a = array(5=>1,1,2,3);
		$b = array_unique($a);
		print_r($a);print_r($b);//print_r($a-$b);
		
		$this->view->render();
		return $this;
	}
}
