<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Student extends Model
{
	public $id;
	public $firstname;
	public $lastname;
	public $age;
	public $address;
	public $section_id;

	public function initialize()
	{
		// point this class to student table
		$this->setSource('student');

		// map the relationship to section model
        $this->belongsTo('section_id', __NAMESPACE__ .'\Section', 'id', 
            ['foreignKey' => ['message' => 'The section does not exist'], 'alias' => 'section']
        );
	}
}
