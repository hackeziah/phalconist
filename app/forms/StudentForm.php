<?php
namespace MyApp\Forms;

use Phalcon\Forms\Form;
use Phalcon\Forms\Element\Text;
use Phalcon\Forms\Element\Select;
use Phalcon\Forms\Element\Password;
use Phalcon\Forms\Element\Hidden;

use Phalcon\Validation\Validator\PresenceOf;

use MyApp\Models\Section;

class StudentForm extends Form
{
	public function initialize($entity = null)
	{
		$id = new Hidden('id');
		$this->add($id);

		$firstname = new Text('firstname');
		$firstname->setLabel('First Name');
		$firstname->addValidators([
		new PresenceOf(['message' => 'First Name is required'])
		]);
		$this->add($firstname);

		$lastname = new Text('lastname');
		$lastname->setLabel('Last Name');
		$lastname->addValidators([
			new PresenceOf(['message' => 'Last Name is required'])
		]);
		$this->add($lastname);

		$age = new Text('age');
		$age->setLabel('Age');
		$age->addValidators([
			new PresenceOf(['message' => 'Age is required'])
		]);
		$this->add($age);

		$address = new Text('address');
		$address->setLabel('Address');
		$address->addValidators([
			new PresenceOf(['message' => 'Address is required'])
		]);
		$this->add($address);

		// pull form database
        $section_id = new Select('section_id', Section::find([
            'order' => 'name']),
            [
                'using'      => ['id', 'name'],
                'useEmpty'   => true,
                'emptyText'  => 'Select section...',
                'emptyValue' => '0'
            ]
        );
        $section_id->setLabel('Section');
        $this->add($section_id);
	}

	public function messages()
	{
        foreach ($this->getMessages() as $message) {
            $this->flash->error($message);
        }
	}
}
