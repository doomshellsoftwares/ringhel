<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class LanguageTable extends Table {

    public function initialize(array $config)
    {
	    $this->table('tbl_language');
	    $this->primaryKey('id');
		

	}

 


}
?>
