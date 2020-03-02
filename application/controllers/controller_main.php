<?php
class Controller_Main extends Controller
{
	public function __construct()
	{
		$this->model = new Model_Main;
		$this->view = new View();
	}

	function action_index()
	{
		$data = $this->model->getData();
		$data += ['view' => 'main'];
		$this->view->generate('main_view.php', 'template_view.php', $data);
	}
}
