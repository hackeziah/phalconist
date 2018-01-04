<?php

namespace MyApp\Models;

use Phalcon\Mvc\Model;

class Section extends Model
{
	public $id;
	public $name;
	public $address;

	public function initialize()
	{
		$this->setSource('section');
	}
}
