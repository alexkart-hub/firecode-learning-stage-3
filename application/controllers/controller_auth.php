<?php 
class Controller_Auth extends Controller
{
	function action_index()
	{	
		$this->view->generate('auth_view.php', 'template_clear_view.php');
	}
}