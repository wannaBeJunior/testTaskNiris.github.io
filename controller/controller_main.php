<?php

class controller_main extends Controller
{
	function __construct()
	{
		parent::__construct();
		$this->model = new model_main();
	}

	public function index()
	{
		$data = $this->model->getData();
		$this->view->generate('view_mainPage', null, $data);
	}
}