<?php 
class Controller_Auth extends Controller
{
	function action_index()
	{
		//$data["login_status"] = "";
		if(isset($_POST['login']) && isset($_POST['password']))
		{

			$login = $_POST['login'];
			$password = $_POST['password'];
			
			
			if(User::IsUserExist($login) && User::CheckPassword($login,$password))
			{
				$data["login_status"] = "access_granted";
				
				User::SessionStart($login);
				
				header('Location: admin');
			}
			else
			{
				$data["login_status"] = "access_denied";
			}
		}
		else
		{
			$data["login_status"] = "";
		}
		
		$this->view->generate('auth_view.php', 'template_clear_view.php', $data);
	}

}