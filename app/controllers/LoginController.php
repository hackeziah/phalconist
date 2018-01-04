<?php

namespace MyApp\Controllers;

use Phalcon\Mvc\Controller;

use MyApp\Models\User;

class LoginController extends Controller
{
	public function indexAction()
	{
		$this->response->redirect('index');
	}

	public function authenticateAction()
	{
		if (!$this->request->isPost()) {
			// redirect to index
			$this->response->redirect('index');
		}

		$username = $this->request->getPost('username');
		$password = $this->request->getPost('password');

		// next check credentials
		$user = User::findFirstByUsername($username);
		if ($user) {
			// check password using hash
			if ($this->security->checkHash($password, $user->password)) {

				// password is good so send to home
				$auth = [
					'id' => $user->id, 
					'access' => $user->access,
					'username' => $user->username
				];
				$this->session->set('auth', $auth);

				// extra here check access level (if admin then redirect to admin page else home)
				$this->response->redirect('home');
			}
		}

		// invalid usernam and password
		$this->flash->error('Invalid Authentication!');
		$this->dispatcher->forward([
			'controller' => 'index',
			'action' => 'index'
		]);
	}

}
