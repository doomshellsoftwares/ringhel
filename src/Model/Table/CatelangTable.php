<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class CatelangTable extends Table {

    public function initialize(array $config)
    {
	    $this->table('tbl_catelang');
	    $this->primaryKey('id');

	     $this->belongsTo('Language', [
            'foreignKey' => 'lang_id',
            'joinType' => 'INNER',
            ]);

	          $this->belongsTo('Category', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER',
            ]);
	
 $this->belongsTo('Catelang', [
            'className' => 'fgh',
            'foreignKey' => 'langselect',
            'joinType' => 'left',
            ]);
	}

 


}
?>
