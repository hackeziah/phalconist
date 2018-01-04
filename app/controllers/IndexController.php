<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

class IndexController extends Controller
{
	// check if naka login na siya
	public function initialize()
	{
		$this->tag->setTitle('Login');

		if ($this->session->has('auth')) {
			$this->response->redirect('home');
		}
	}

	public function indexAction()
	{
		
	}
}
