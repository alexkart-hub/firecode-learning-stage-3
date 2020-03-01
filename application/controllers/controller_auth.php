<?php
class Controller_Auth extends Controller
{
	function action_index()
	{
		if (isset($_POST['login']) && isset($_POST['password'])) {

			$login = $_POST['login'];
			$password = $_POST['password'];


			if (User::IsUserExist($login) && User::CheckPassword($login, $password)) {

				User::SessionStart($login);

				header('Location: admin');
			} else {
			}
		} else {
			$data["login_status"] = "";
		}
		if (empty($_COOKIE['admin'])) {
			$this->view->generate('auth_view.php', 'template_clear_view.php', $data);
		} else {
			header('Location: admin');
		}
	}
}
