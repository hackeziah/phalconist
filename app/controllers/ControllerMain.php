<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

class ControllerMain extends Controller
{
    public function initialize()
    {
    	$this->tag->setTitle('Phalcon App');
    }

    public function beforeExecuteRoute()
    {
    	// if hindi pa naka login then back to index login
		if (!$this->session->has('auth')) {
			$this->response->redirect('index');
		}
    }
}
