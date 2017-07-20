<?php
namespace Laravel\Blog;

class Blog {

	protected $info;
	public $result;
	public function __construct(array $info = null)
	{
		if($info == null)
		{
			return new \InvalidArgumentException('There must be a choise for info');
		}
		$this->info = $info;
	}
	public function getName() {
		return $this->info['name'];
	}
}