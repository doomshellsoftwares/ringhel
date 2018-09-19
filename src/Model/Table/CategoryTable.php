<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class CategoryTable extends Table {

    public function initialize(array $config)
    {
	    $this->table('tbl_categories');
	    $this->primaryKey('id');

	     $this->belongsTo('Language', [
            'foreignKey' => 'lang_id',
            'joinType' => 'INNER',
            ]);

	          $this->belongsTo('Category', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER',
            ]);
		

	}

 


}
?>
