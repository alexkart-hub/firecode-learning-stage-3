<?php
class Controller_Admin extends Controller
{
	public function __construct()
	{
		$this->model = new Model_Admin;
		$this->view = new View();
	}
	public function action_index()
	{
		$user = User::GetUser($_COOKIE['login']);
		if (!empty($_COOKIE['admin']) && ($_COOKIE['admin'] == $user['password'])) {
			$data = $this->model->getData();
			$data += ['view' => 'admin'];
			$this->load_view($data);
		} else {
			header("Location: auth");
		}
	}
	protected function load_view($data)
	{
		$this->view->generate('admin_view.php', 'template_view.php', $data);
	}
}
