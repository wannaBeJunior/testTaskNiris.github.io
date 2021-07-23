<?php

class controller_insertCity extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new model_insertCity();
	}

	public function insertCity()
	{
		$data = $this->model->setCity($_POST['city']);
		$this->view->generate('view_addCityPage', null, $data);
	}
}