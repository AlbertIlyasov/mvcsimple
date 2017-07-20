<?

abstract class Model
{
	public function whoAmI()
	{
		echo get_parent_class();
		return $this;
	}
}