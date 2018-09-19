<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class InternalTable extends Table {

    public function initialize(array $config)
    {
	    $this->table('internal');
	    $this->primaryKey('id');
		

	}

 


}
?>
