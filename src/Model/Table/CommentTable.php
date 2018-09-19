<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class CommentTable extends Table {

    public function initialize(array $config)
    {
	    $this->table('tbl_comments');
	    $this->primaryKey('id');

	  
			$this->belongsTo('Users', [
            'foreignKey' => 'user_id',
            'class' => 'Users',
            ]);
		

	}

 


}
?>
