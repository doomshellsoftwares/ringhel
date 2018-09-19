<?php
namespace App\Model\Table;
use Cake\ORM\Table;
use Cake\Validation\Validator;
use Cake\Auth\DefaultPasswordHasher;

class ArticlesTable extends Table {

    public function initialize(array $config)
    {
	    $this->table('tblarticle');
	    $this->primaryKey('id');

	         $this->belongsTo('Language', [
            'foreignKey' => 'lang_id',
            'joinType' => 'INNER',
            ]);

	          $this->belongsTo('Catelang', [
            'className' => 'ss',
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER',
            ]);
             $this->hasmany('Comment', [
            'foreignKey' => 'article_id',
            'joinType' => 'INNER',
            ]);
           /*  
            $this->belongsTo('Catelang', [
            'className' => 'ssss',
            'foreignKey' => 'subcat_id',
            'foreignKey' => 'subcat_id',
            'joinType' => 'INNER',
            ]);
            

           $this->belongsTo('Catelang', [
            'className' => 'lll',
            'foreignKey' => 'subcat_id',
            'joinType' => 'left',
            ]);

              $this->belongsTo('Catelang', [
            'foreignKey' => 'cat_id',
            'joinType' => 'INNER',
            ]);

              $this->belongsTo('Catelang', [
            'foreignKey' => 'lang_id',
            'joinType' => 'INNER',
            ]);
*/
	}

 


}
?>
