<?php

namespace MyApp\Controllers;

class LogoutController extends ControllerMain
{
	public function indexAction()
	{
		$this->session->destroy();
		$this->response->redirect('login');	
	}
}
