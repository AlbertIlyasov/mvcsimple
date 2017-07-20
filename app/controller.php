<?

abstract class Controller
{
	public $view;


	public function __construct()
	{
		$this->view = new View();
		$this->view->setViewFilename(strtolower(get_called_class()));
		DB::connect();
	}
}