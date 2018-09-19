<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class UsersTable extends Table {

    public $name = 'Users';
    
    public function initialize(array $config)
    {
	    $this->table('users');
	    $this->primaryKey('id');
        $this->belongsTo('Language', [
            'foreignKey' => 'pref_language',
            'joinType' => 'INNER',
            ]);

	}


	  protected function _setPassword($password)
    {
        return (new DefaultPasswordHasher)->hash($password);
    }

}
?>
