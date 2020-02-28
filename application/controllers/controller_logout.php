<?php 
class Controller_Logout extends Controller
{
	function action_index()
	{
		User::SessionStop();
        
        header("Location: auth");
		// $this->view->generate('auth_view.php', 'template_clear_view.php');
	}

}