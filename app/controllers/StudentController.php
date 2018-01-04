<?php

namespace MyApp\Controllers;

use MyApp\Forms\StudentForm;
use MyApp\Models\Student;

// extends the Main Controller to shared functionalities

class StudentController extends ControllerMain
{
	public function indexAction()
	{
		$students = Student::find();
		$this->view->students = $students;
	}

	public function newAction()
	{
		$studentForm = new StudentForm();
		$this->view->studentForm = $studentForm;
	}

	public function createAction()
	{
		// if not post req then redirect
		if (!$this->request->isPost()) {
			$this->response->redirect('student');
		}

		$studentForm = new StudentForm();
		if (!$studentForm->isValid($_POST)) {
			foreach($studentForm->getMessages() as $msg) {
				$this->flash->error($msg);
			}

			//flash to specified action
            return $this->dispatcher->forward([
                "controller" => "student",
                "action" => "new"
            ]);
		}

		// if all good then save
		$student = new Student();
		$student->firstname = $this->request->getPost('firstname', ['trim', 'string']);
		$student->lastname = $this->request->getPost('lastname');
		$student->age = $this->request->getPost('age', 'int');
		$student->address = $this->request->getPost('address');
		$student->section_id = $this->request->getPost('section_id', 'int');

		//save here
		if ($student->save()) {
			// redirect with message
			$this->session->set('message', 'New record has been added!');
			$this->response->redirect('student');
		} else {
			// flash error muna
			$this->flash->error($student->getMessages());
            return $this->dispatcher->forward([
                "controller" => "student",
                "action" => "new"
            ]);
		}
	}

	public function detailAction($id)
	{
		// display student detail here
		$id = $this->filter->sanitize($id, 'int');
		
		$student = Student::findFirst($id);
		if (!$student) {
			// pag walang ganun
			$this->response->redirect('student');
		}

		$studentForm = new StudentForm($student);
		$this->view->studentForm = $studentForm;
	}

	public function updateAction()
	{
		// check if post request if not redirect
		if (!$this->request->isPost()) {
			$this->response->redirect('student');
		}

		$id = $this->request->getPost('id', 'int');
		$student = Student::findFirst($id);
		if (!$student) {
			// pag walang ganun ma record
			$this->response->redirect('student');
		}

		// lets do the update
		$student->firstname = $this->request->getPost('firstname', ['trim', 'string']);
		$student->lastname = $this->request->getPost('lastname');
		$student->age = $this->request->getPost('age', 'int');
		$student->address = $this->request->getPost('address');
		$student->section_id = $this->request->getPost('section_id', 'int');

		//save here
		if ($student->save()) {
			// redirect
			$this->session->set('message', 'Student details has been updated!');
			$this->response->redirect('student/detail/' . $id);
		} else {
			// flash error muna
			$this->flash->error($student->getMessages());
            return $this->dispatcher->forward([
                "controller" => "student",
                "action" => "detail",
                "params" => [$id]
            ]);
		}

	}

	public function deleteAction($id)
	{
		// delete student record here
		$id = $this->filter->sanitize($id, 'int');
		
		$student = Student::findFirst($id);
		if (!$student) {
			// pag walang ganun
			$this->response->redirect('student');
		}

		// delete here
		if ($student->delete()) {
			$this->session->set('message', 'Student record has been archived!');
			$this->response->redirect('student');
		} else {
			$this->flash->error($student->getMessages());
            return $this->dispatcher->forward([
                "controller" => "student",
                "action" => "index"
            ]);
		}
	}

}
