<?php 
class Controller_Admin extends Controller
{
	function action_index()
	{	
		$this->view->generate('admin_view.php', 'template_view.php');
	}
}